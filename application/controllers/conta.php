<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conta extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){

        $this->load->helper('tickets');

        $data['titulo'] = 'Backoffice';

        $data['tickets'] = $this->conta_model->TodosTickets();

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/index');
        $this->load->view('conta/templates/footer');
    }

    public function novo_ticket(){

        $data['titulo'] = 'Novo Ticket';

        if($this->input->post('submit')){

            $data['message'] = $this->conta_model->NovoTicket();
        }

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/tickets/novo');
        $this->load->view('conta/templates/footer');
    }

    public function visualizar_ticket($id){

        $data['titulo'] = 'Visualizar Ticket';

        if($this->input->post('submit')){

            $this->conta_model->AdicionarMensagemTicket($id);
        }

        $data['ticket'] = $this->conta_model->InformacaoTicket($id);
        $data['ticket_mensagens'] = $this->conta_model->MensagensTicket($id);

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/tickets/visualizar');
        $this->load->view('conta/templates/footer');
    }

    public function atualiza_notificacao(){
	
	echo $this->conta_model->AtualizaNotificacoes();
    
    }

    public function sair(){

    $this->native_session->unset_userdata('user_id');
    
    redirect('login');
    }

}