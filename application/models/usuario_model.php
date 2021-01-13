<?php
class Usuario_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function NovoUsuario(){

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $cpf = $this->input->post('cpf');
        $nascimento = $this->input->post('nascimento');
        $celular = $this->input->post('celular');
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        $this->db->where('email', $email);
        $user_email = $this->db->get('usuarios');

        $this->db->where('cpf', $cpf);
        $user_cpf = $this->db->get('usuarios');

        $this->db->where('login', $login);
        $user_login = $this->db->get('usuarios');

        if($user_email->num_rows() > 0){

            return '<div class="alert alert-danger text-center">Email já cadastrado.</div>';
        }

        if($user_cpf->num_rows() > 0){

            return '<div class="alert alert-danger text-center">CPF já cadastrado.</div>';
        }

        if($user_login->num_rows() > 0){

            return '<div class="alert alert-danger text-center">Login já existe. Escolha outro.</div>';
        }

        $array_cadastro = array(
                                'nome'=>$nome,
                                'email'=>$email,
                                'cpf'=>$cpf,
                                'nascimento'=>converter_data($nascimento),
                                'celular'=>$celular,
                                'login'=>$login,
                                'senha'=>md5($senha),
                                'block'=>0,
                                'data_cadastro'=>date('Y-m-d')
                                );

        $cadastra = $this->db->insert('usuarios', $array_cadastro);

        if($cadastra){

            $html  = 'Olá <b>'.$nome.'</b>, obrigado por realizar um cadastro em nosso sistema.<br />';
            $html .= '<b>Link de acesso: </b>'.base_url('login').'<br />';
            $html .= '<b>Login: </b>'.$login.'<br />';
            $html .= '<b>Senha:</b> '.$senha;

            $this->email->to($email);
            $this->email->from(config_site('email_remetente'), config_site('nome_site'));
            $this->email->set_mailtype('html');
            $this->email->subject('Obrigado por se cadastrar');
            $this->email->message($html);
            $this->email->send();

            return '<div class="alert alert-success text-center">Usuário cadastrado com sucesso!</div> <meta http-equiv="refresh" content="1; URL='.base_url('login').'"/>';
        }

        return '<div class="alert alert-danger text-center">Não foi possível completar seu cadastro.</div>';
    }


    public function RecuperarSenha(){

        $email = $this->input->post('email');

        $this->db->where('email', $email);
        $user = $this->db->get('usuarios');

        if($user->num_rows() > 0){

            $row = $user->row();

            $s1 = rand(302, 999);
            $s2 = 'Az-';
            $s3 = rand(10, 55);
            $s4 = 'Oyk';

            $nova_senha = $s1.$s2.$s3.$s4;

            $this->db->where('id', $row->id);
            $this->db->update('usuarios', array('senha'=>md5($nova_senha)));

            $html  = 'Olá <b>'.$row->nome.'</b>, foi feito um pedido de nova senha para sua conta. Segue abaixa uma nova senha para acesso ao nosso site. <br /><br />';
            $html .= '<b>Nova senha:</b> '.$nova_senha.'<br /><br />';
            $html .= 'Após acessar sua conta com a nova senha, altere imediatamente sua senha para ela ser decorada e você usar nosso sistema com total facilidade.<br />';
            $html .= '<em>* caso você não fez o pedido de uma nova senha, por favor, entre em contato com o nosso suporte.</em>';

            $this->email->to($email);
            $this->email->from(config_site('email_remetente'), config_site('nome_site'));
            $this->email->set_mailtype('html');
            $this->email->subject('Nova senha da sua conta');
            $this->email->message($html);
            $envia = $this->email->send();

            if($envia){

                return '<div class="alert alert-success text-center">Uma nova senha foi enviada para seu email.</div>';
            }

            return '<div class="alert alert-danger text-center">Erro ao enviar nova senha. Tente novamente.</div>';

        }

        return '<div class="alert alert-danger text-center">O email informado não existe.</div>';
    }


    public function Logar(){

        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        $this->db->where('login', $login);
        $this->db->where('senha', md5($senha));

        $usuario = $this->db->get('usuarios');

        if($usuario->num_rows() > 0){

            $row = $usuario->row();

            if($row->block == 0){

                $this->native_session->set('user_id', $row->id);

                redirect('conta');

            }

            return '<div class="alert alert-danger text-center">Sua conta foi bloqueada. Entre em contato com o suporte</div>';

        }

        return '<div class="alert alert-danger text-center">Login ou senha inválidos.</div>';
    }
}
?>