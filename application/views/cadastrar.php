<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo config_site('nome_site');?> - Cadastrar-me</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url();?>assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url();?>assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url();?>assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/admin/layou2/csssweetalert.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="<?php echo base_url('uploads/'.config_site('favicon'));?>"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="<?php echo site_url();?>">
    <img src="<?php echo base_url('uploads/'.config_site('imagem_logo'));?>" alt=""/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <form class="register-form" action="" method="post" style="display:block;">
        <h3>Cadastrar</h3>
        <p class="hint">
             Informe seus dados pessoais
        </p>
        <?php
        if(isset($message)) echo $message;
        ?>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Nome</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="Nome completo" name="nome" required/>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input class="form-control placeholder-no-fix" type="email" placeholder="Email" name="email" required/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">CPF</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="CPF" id="cpf" name="cpf" required/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Nascimento</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="Data de nascimento" name="nascimento" id="data" required/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Celular</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="Celular" id="celular" name="celular" required/>
        </div>

        <p class="hint">
             Entre com os dados de login para sua conta
        </p>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Login</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="Login" name="login" required/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Senha</label>
            <input class="form-control placeholder-no-fix" type="password" placeholder="Senha" name="senha" required/>
        </div>
        <div class="form-actions">
            <button type="button" id="register-back-btn" class="btn btn-default" onclick="window.location.href='<?php echo base_url();?>login'">Voltar</button>
            <input type="submit" id="register-submit-btn" name="submit" class="btn btn-success uppercase pull-right" value="Cadastrar">
        </div>
    </form>
    <!-- END REGISTRATION FORM -->
</div>
<div class="copyright">
     <?php echo date('Y');?> ©  Todos os direitos reservados
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout2/scripts/sweetalert.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout2/scripts/jquery.maskedinput.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
    jQuery(function($){
   $("#data").mask("99/99/9999");
   $("#celular").mask("(99) 99999-999?9");
   $("#cpf").mask("999.999.999-99");
});
</script>

<script>
jQuery(document).ready(function() {
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>