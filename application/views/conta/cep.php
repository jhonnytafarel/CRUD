                <h3 class="page-title">Busca de CEP Json</h3>
                <div class="page-bar">
                </div>
                <!-- END PAGE HEADER-->
                <div class="clearfix">
                </div>

                    <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-car"></i>Busca de CEP Via Json
                                </div>
                            </div>
                            <div class="portlet-body">

                                <?php
                                if(!$this->input->post('submit2') && !$this->input->post('submit')){
                                ?>
                                <form action="" method="post" class="form-horizontal">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Insira o seu CEP</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="cep" id="cep" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                            <input type="submit" name="submit2" class="btn green" value="Continuar">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                }elseif($this->input->post('submit2') && !$this->input->post('submit')){
                                ?>
                                <?php
                                $cep = $this->input->post('cep');

                                $json = file_get_contents("https://viacep.com.br/ws/$cep/json/");
                                $json = json_decode($json);

                                if($json->erro > 0){
                                ?>

                                <div class="alert alert-danger text-center">Infelizmente não achamos nenhum resultado com o cep informado</div>
                                
                                <?php
                                }else{
                                ?>
                                <center><div class="alert alert-info text-center">Os seguintes dados forão encontrados</div></center>

                                <form action="" method="post" class="form-horizontal">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nome da Rua</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="<?php echo $json->logradouro;?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Complemento</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="<?php echo $json->complemento;?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Bairro</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="<?php echo $json->bairro;?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Localidade</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="<?php echo $json->localidade;?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Estado</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="<?php echo $json->uf;?>" required>
                                            </div>
                                        </div>


                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                }elseif(!$this->input->post('submit2') && $this->input->post('submit')){
                                    echo $message;
                                }
                               ?>
                                <!-- END FORM-->
                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>
                </div>
                </div>
                 <!-- PORTLET LIGHT -->


                <div class="clearfix">
                </div>
            </div>
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <!--Cooming Soon...-->
        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
