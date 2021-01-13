<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="<?php echo base_url('ctadmin');?>">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('ctadmin/usuarios');?>">Usuários</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Visualizar Usuário
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Begin: life time stats -->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-user font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">
                                <?php echo $usuario->nome;?> </span>
                                <span class="caption-helper">Membro desde <?php echo date('d/m/Y', strtotime($usuario->data_cadastro));?></span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-lg">
                                    <li class="active">
                                        <a href="#tab_1" data-toggle="tab">
                                        Detalhes Principais </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet yellow-crusta box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Dados Pessoais
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Nome
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo $usuario->nome;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Email
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo $usuario->email;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 CPF
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo $usuario->cpf;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Data de nascimento
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo date('d/m/Y', strtotime($usuario->nascimento));?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Celular
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo $usuario->celular;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet blue-hoki box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Dados de acesso
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Login
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo $usuario->login;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Senha
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <span class="label label-danger">Criptografada com MD5</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                 </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div> 
</div>
</div>
</div>
</div>
</div>