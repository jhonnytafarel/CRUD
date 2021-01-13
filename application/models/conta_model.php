<?php
class Conta_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function user($coluna, $parametro = null){

        if(!$this->native_session->get('user_id')) redirect('login');

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id', $sessao);
        $user = $this->db->get('usuarios');

        $row = $user->row();

        if(is_null($parametro)){

            return $row->$coluna;
        }

        preg_match('/[^\s]*/i', $row->$coluna, $matches);

        return $matches[0];
    }

    public function TodosTickets(){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $tickets = $this->db->get('tickets');

        if($tickets->num_rows() > 0){

            return $tickets->result();
        }

        return false;
    }

    public function NovoTicket(){

        $sessao = $this->native_session->get('user_id');

        $assunto = $this->input->post('assunto');
        $mensagem = $this->input->post('mensagem');

        $array_ticket = array(
                                                'id_user'=>$sessao,
                                                'titulo'=>$assunto,
                                                'data'=>date('Y-m-d'),
                                                'status'=>0
                                                );

        $this->db->insert('tickets', $array_ticket);

        $array_ticket_mensagem = array(
                                                                    'id_ticket'=>$this->db->insert_id(),
                                                                    'mensagem'=>$mensagem,
                                                                    'user'=>1,
                                                                    'data'=>time()
                                                                    );

        $finish = $this->db->insert('tickets_mensagem', $array_ticket_mensagem);

        if($finish){

            return '<div class="alert alert-success text-center">Ticket aberto com sucesso, em breve responderemos.</div><meta http-equiv="refresh" content="1; URL='.base_url('conta').'"/>';
        }

        return '<div class="alert alert-danger text-center">Erro ao abrir ticket.</div>';
    }

    public function InformacaoTicket($id){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id', $id);
        $this->db->where('id_user', $sessao);

        $ticket = $this->db->get('tickets');

        if($ticket->num_rows() > 0){

            return $ticket->row();

        }

        return false;
    }

    public function MensagensTicket($id){

        $this->db->order_by('data', 'ASC');
        $this->db->where('id_ticket', $id);
        $tickets_mensagens = $this->db->get('tickets_mensagem');

        if($tickets_mensagens->num_rows() > 0){

            return $tickets_mensagens->result();
        }

        return false;
    }

    public function AdicionarMensagemTicket($id){

        $resposta = $this->input->post('resposta');

        $array_mensagem = array(
                                                        'id_ticket'=>$id,
                                                        'mensagem'=>$resposta,
                                                        'user'=>1,
                                                        'data'=>time()
                                                        );

        $this->db->insert('tickets_mensagem', $array_mensagem);

        $this->db->where('id', $id);
        $this->db->update('tickets', array('status'=>0));
    }

    public function AtualizaNotificacoes(){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $atualiza = $this->db->update('notificacoes', array('visto'=>1));

        if($atualiza){

            return true;
        }

        return false;
    }

}