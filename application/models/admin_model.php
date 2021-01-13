<?php
class Admin_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function user($coluna){

        $sessao = $this->native_session->get('user_id_admin');

        $this->db->where('id', $sessao);
        $adm = $this->db->get('admin_login');

        $row = $adm->row();

        return $row->$coluna;
    }

    public function Login(){

        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        $this->db->where('login', $login);
        $this->db->where('senha', md5($senha));

        $login = $this->db->get('admin_login');

        if($login->num_rows() > 0){

            $this->native_session->set('user_id_admin', $login->row()->id);

            redirect('ctadmin/home');
        }

        return '<div class="alert alert-danger text-center">Usuário ou senha inválidos.</div>';
    }

    public function Usuarios(){

        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            return $usuarios->result();
        }

        return false;
    }

    public function TotalUsuarios(){

        $usuarios = $this->db->get('usuarios');

        return $usuarios->num_rows();
    }


    public function InformacaoUsuario($id){

        $this->db->where('id', $id);
        $user = $this->db->get('usuarios');

        return $user->row();
    }

    public function EditarUsuario($id){

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $cpf = $this->input->post('cpf');
        $nascimento = converter_data($this->input->post('nascimento'));
        $celular = $this->input->post('celular');
        $senha = $this->input->post('senha');
        $block = $this->input->post('block');


        $array_usuario = array(
                                                'nome'=>$nome,
                                                'email'=>$email,
                                                'cpf'=>$cpf,
                                                'nascimento'=>$nascimento,
                                                'celular'=>$celular
                                                  );

        if(!empty($senha)){
            $array_usuario['senha'] = md5($senha);
        }

        $this->db->where('id', $id);
        $update = $this->db->update('usuarios', $array_usuario);

        if($update){

            return '<div class="alert alert-success text-center">Usuário atualizado com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar usuário.</div>';
    }

    public function ExcluirUsuario($id){

        $this->db->where('id', $id);
        $this->db->delete('usuarios');

        $this->db->where('id_user', $id);
        $this->db->delete('tickets');
    }

    public function TodosTickets(){

        $tickets = $this->db->query("SELECT u.login, t.* FROM tickets AS t INNER JOIN usuarios AS u ON u.id = t.id_user");

        if($tickets->num_rows() > 0){

            return $tickets->result();
        }

        return false;
    }

    public function VisualizarTicket($id){

        $this->db->where('id', $id);
        $ticket = $this->db->get('tickets');

        return $ticket->row();
    }

    public function MensagensTicket($id){

        $mensagens = $this->db->query("SELECT u.nome, tm.* FROM tickets_mensagem AS tm INNER JOIN tickets AS t ON t.id = tm.id_ticket INNER JOIN usuarios AS u ON u.id = t.id_user WHERE tm.id_ticket = '$id' ORDER BY data ASC");

        if($mensagens->num_rows() > 0){

            return $mensagens->result();
        }

        return false;
    }

    public function EnviarMensagemTicket($id){

        $resposta = $this->input->post('resposta');

        $this->db->where('id', $id);
        $ticket = $this->db->get('tickets');
        $row = $ticket->row();

        $id_user = $row->id_user;

        $array_mensagem = array(
                                                        'id_ticket'=>$id,
                                                        'mensagem'=>$resposta,
                                                        'user'=>0,
                                                        'data'=>time()
                                                        );

        $this->db->insert('tickets_mensagem', $array_mensagem);

        $this->db->where('id', $id);
        $this->db->update('tickets', array('status'=>1));

        $array_notificacao = array(
                                                        'id_user'=>$id_user,
                                                        'mensagem'=>'Nova resposta em <b>"'.$row->titulo.'"</b>',
                                                        'visto'=>0,
                                                        'data'=>time()
                                                        );

        $this->db->insert('notificacoes', $array_notificacao);
    }

    public function FecharTicket($id){

        $ticket = $this->VisualizarTicket($id);

        $this->db->where('id', $id);
        $this->db->update('tickets', array('status'=>2));

        $array_notificacao = array(
                                                        'id_user'=>$ticket->id_user,
                                                        'mensagem'=>'Ticket fechado <b>"'.$ticket->titulo.'"</b>',
                                                        'visto'=>0,
                                                        'data'=>time()
                                                        );

        $this->db->insert('notificacoes', $array_notificacao);
    }

    public function ReabrirTicket($id){

        $ticket = $this->VisualizarTicket($id);

        $this->db->where('id', $id);
        $this->db->update('tickets', array('status'=>3));

        $array_notificacao = array(
                                                        'id_user'=>$ticket->id_user,
                                                        'mensagem'=>'Ticket Re-aberto <b>"'.$ticket->titulo.'"</b>',
                                                        'visto'=>0,
                                                        'data'=>time()
                                                        );

        $this->db->insert('notificacoes', $array_notificacao);
    }


    public function MudarSenha(){

        $sessao = $this->native_session->get('user_id_admin');

        $senha = $this->input->post('senha');

        $array_pw = array(
                                        'senha'=>md5($senha)
                                        );

        $this->db->where('id', $sessao);
        $update = $this->db->update('admin_login', $array_pw);

        if($update){

            return '<div class="alert alert-success text-center">Senha atualizada com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar senha.</div>';
    }

    public function TodosUsuariosAdmin(){

        $usuarios = $this->db->get('admin_login');

        return $usuarios->result();
    }

    public function AdicionarUsuarioAdministrativo(){

        $nome = $this->input->post('nome');
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        $array_usuario = array(
                                                    'nome'=>$nome,
                                                    'login'=>$login,
                                                    'senha'=>md5($senha)
                                                    );

        $this->db->where('login', $login);
        $users = $this->db->get('admin_login');

        if($users->num_rows() > 0){

            return '<div class="alert alert-danger text-center>O login já existe. Escolha outro.</div>';
        }

        $insert = $this->db->insert('admin_login', $array_usuario);

        if($insert){

            return '<div class="alert alert-success text-center">Usuário adicionado com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao adicionar usuário.</div>';
    }

    public function InformacaoUsuarioAdministrativo($id){

        $this->db->where('id', $id);
        $usuario = $this->db->get('admin_login');

        return $usuario->row();
    }

    public function AtualizarUsuarioAdministrativo($id){

        $nome = $this->input->post('nome');
        $senha = $this->input->post('senha');

        $array_usuario = array(
                                                    'nome'=>$nome
                                                    );

        if(!empty($senha)){

            $array_usuario['senha'] = md5($senha);
        }

        $this->db->where('id', $id);
        $update = $this->db->update('admin_login', $array_usuario);

        if($update){

            return '<div class="alert alert-success text-center">Dados atualizados com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar usuário.</div>';
    }

    public function ExcluirUsuarioAdministrativo($id){

        $this->db->where('id', $id);
        $this->db->delete('admin_login');
    }

    public function Configuracoes(){

        $config = $this->db->get('website_config');

        return $config->row();
    }

    public function AtualizarConfiguracoes(){

        $nome_site = $this->input->post('nome_site');
        $email_remetente = $this->input->post('email_remetente');


        $array_config = array(
                                                'nome_site'=>$nome_site,
                                                'email_remetente'=>$email_remetente
                                                );


        if(!empty($_FILES['logo_login']['name'])){

            $config_login['upload_path'] = 'uploads';
            $config_login['allowed_types'] = 'bmp|gif|png|jpg|jpeg|pjpeg';
            $config_login['overwrite'] = true;
            $config_login['file_name'] = 'logo_login';

            $this->upload->initialize($config_login);

            $this->upload->do_upload('logo_login');
            $upload_login = $this->upload->data();

            $array_config['imagem_logo'] = $upload_login['file_name'];

        }

        if(!empty($_FILES['logo_backoffice']['name'])){

            $config_bo['upload_path'] = 'uploads';
            $config_bo['allowed_types'] = 'bmp|gif|png|jpg|jpeg|pjpeg';
            $config_bo['overwrite'] = true;
            $config_bo['file_name'] = 'logo_backoffice';

            $this->upload->initialize($config_bo);

            $this->upload->do_upload('logo_backoffice');
            $upload_bo = $this->upload->data();

            $array_config['imagem_logo_backoffice'] = $upload_bo['file_name'];


        }

        if(!empty($_FILES['logo_admin']['name'])){

            $config_admin['upload_path'] = 'uploads';
            $config_admin['allowed_types'] = 'bmp|gif|png|jpg|jpeg|pjpeg';
            $config_admin['overwrite'] = true;
            $config_admin['file_name'] = 'logo_admin';

            $this->upload->initialize($config_admin);

            $this->upload->do_upload('logo_admin');
            $upload_admin = $this->upload->data();

            $array_config['imagem_logo_admin'] = $upload_admin['file_name'];

        }

        if(!empty($_FILES['favicon']['name'])){

            $config_fav['upload_path'] = './uploads/';
            $config_fav['allowed_types'] = 'gif|png|jpg|jpeg|pjpeg|ico';
            $config_fav['overwrite'] = true;
            $config_fav['file_name'] = 'favicon';

            $this->upload->initialize($config_fav);

            $this->upload->do_upload('favicon');
            $upload_favicon = $this->upload->data();

            $array_config['favicon'] = $upload_favicon['file_name'];

        }

        $update = $this->db->update('website_config', $array_config);

        if($update){

        return '<div class="alert alert-success text-center">Configurações salvas com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao salvar configurações.</div>';
   	}

 
}