<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctadmin extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('admin_model', 'admin');
        $this->load->helper('tickets');
    }

    public function index(){

        if($this->native_session->get('user_id_admin')){

            redirect('ctadmin/home');
        }

        redirect('ctadmin/login');
    }

    public function login(){

        $data = array();

        if($this->input->post('submit')){

            $data['message'] = $this->admin->Login();
        }

        $this->load->view('admin/login', $data);
    }

    public function home(){

        $data['titulo'] = 'Página inicial';

        $data['pg_home'] = true;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/index');
        $this->load->view('admin/templates/footer');
    }

    public function usuarios(){

        $data['titulo'] = 'Usuários';

        $data['pg_usuarios'] = true;

        $data['usuarios'] = $this->admin->Usuarios();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/usuarios/todos');
        $this->load->view('admin/templates/footer');
    }

    public function visualizar_usuario($id){

        $data['titulo'] = 'Visualizar usuário';

        $data['pg_usuarios'] = true;

        $data['usuario'] = $this->admin->InformacaoUsuario($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/usuarios/visualizar');
        $this->load->view('admin/templates/footer');

    }

    public function editar_usuario($id){

        $data['titulo'] = 'Editar usuário';

        $data['pg_usuarios'] = true;

        if($this->input->post('submit')){

            $data['message'] = $this->admin->EditarUsuario($id);
        }

        $data['usuario'] = $this->admin->InformacaoUsuario($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/usuarios/editar');
        $this->load->view('admin/templates/footer');

    }

    public function excluir_usuario($id){

        $this->admin->ExcluirUsuario($id);

        redirect('ctadmin/usuarios');
    }


    public function tickets(){

        $data['titulo'] = 'Todos Tickets';

        $data['pg_tickets'] = true;

        $data['tickets'] = $this->admin->TodosTickets();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/tickets/todos');
        $this->load->view('admin/templates/footer');
    }

    public function visualizar_ticket($id){

        $data['titulo'] = 'Visualizar Ticket';

        $data['pg_tickets'] = true;

        if($this->input->post('submit')){

            $this->admin->EnviarMensagemTicket($id);
        }

        $data['ticket'] = $this->admin->VisualizarTicket($id);
        $data['mensagens_ticket'] = $this->admin->MensagensTicket($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/tickets/visualizar');
        $this->load->view('admin/templates/footer');

    }

    public function fechar_ticket($id){

        $this->admin->FecharTicket($id);

        redirect('ctadmin/tickets');
    }

    public function reabrir_ticket($id){

        $this->admin->ReabrirTicket($id);

        redirect('ctadmin/tickets');
    }

    public function senha(){

        $data['titulo'] = 'Alterar Senha';

        if($this->input->post('submit')){

            $data['message'] = $this->admin->MudarSenha();
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/senha');
        $this->load->view('admin/templates/footer');
    }


    public function users(){

        $data['titulo'] = 'Usuários administrativos';

        $data['usuarios'] = $this->admin->TodosUsuariosAdmin();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/usuarios_admin/todos');
        $this->load->view('admin/templates/footer');

    }

    public function novo_user_admin(){

        $data['titulo'] = 'Novo usuário administrativo';

        if($this->input->post('submit')){

            $data['message'] = $this->admin->AdicionarUsuarioAdministrativo();
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/usuarios_admin/novo');
        $this->load->view('admin/templates/footer');

    }

    public function editar_user_admin($id){

        $data['titulo'] = 'Editar usuário administrativo';

        if($this->input->post('submit')){

            $data['message'] = $this->admin->AtualizarUsuarioAdministrativo($id);
        }

        $data['usuario'] = $this->admin->InformacaoUsuarioAdministrativo($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/usuarios_admin/editar');
        $this->load->view('admin/templates/footer');
    }

    public function excluir_user_admin($id){

        $this->admin->ExcluirUsuarioAdministrativo($id);

        redirect('ctadmin/users');
    }

    public function configuracoes(){

        $data['titulo'] = 'Configurações do site';

         $data['pg_configuracoes'] = true;

        if($this->input->post('submit')){

            $data['message'] = $this->admin->AtualizarConfiguracoes();
        }

        $data['config'] = $this->admin->Configuracoes();


        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/configuracoes/configuracoes');
        $this->load->view('admin/templates/footer');
    }

    public function logout(){

        $this->native_session->unset_userdata('user_id_admin');

        redirect('ctadmin/login');
    }
}