<!-- BEGIN PAGE CONTENT -->
<?php
 $s_n =array(0=>'Não', 1=>'Sim');
?>
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="<?php echo base_url('ctadmin');?>">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('ctadmin/configuracoes');?>">Configurações</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Editar configurações
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" action="" method="post" enctype="multipart/form-data">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-pencil font-green-sharp"></i>
                                    <span class="caption-subject font-green-sharp bold uppercase">
                                    Editar configurações do site</span>
                                </div>
                                <div class="actions btn-set">
                                    <input type="submit" name="submit" class="btn green-haze btn-circle" value="Salvar configurações">

                                </div>
                            </div>

                            <?php if(isset($message)) echo $message; ?>

                            <div class="portlet-body">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_geral" data-toggle="tab">
                                            Informações básicas </a>
                                        </li>
                                        <li>
                                            <a href="#tab_email" data-toggle="tab">
                                            Email </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content no-space">
                                        <div class="tab-pane active" id="tab_geral">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Nome do site
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="nome_site" value="<?php echo $config->nome_site;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Logo tela de login <br /><small>(104x17)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="logo_login">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Logo Backoffice <br /><small>(94x14)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="logo_backoffice">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Logo Admin <br /><small>(104x17)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="logo_admin">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Favicon <br /><small>(16x16)</small>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="favicon">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_email">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Remetente de emails:
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="email_remetente" class="form-control" value="<?php echo $config->email_remetente;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>