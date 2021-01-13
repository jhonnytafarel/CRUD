
                <!-- BEGIN PAGE HEADER-->
                <h3 class="page-title">
                Tickets</h3>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-ticket"></i>
                            <a href="#">Tickets</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="<?php echo base_url('#');?>">Todos</a>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE HEADER-->
                <div class="clearfix">
                </div>

                <div class="portlet light">

                <a href="<?php echo base_url('tickets/novo');?>" class="btn green pull-right">Novo Ticket</a>

                <div class="clearfix">
                </div>

                <br />

                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-globe"></i> Todos os Tickets
                                </div>
                                <div class="tools">
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>

                                    <th>
                                        ID
                                    </th>
                                    <th>
                                         Título
                                    </th>
                                    <th>
                                         Data
                                    </th>
                                    <th>
                                         Status
                                    </th>
                                    <th>
                                        Ação
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($tickets !== false){

                                $status = array(0=>'<b><font color="orange">Pendente</font></b>', 1=>'<b><font color="green">Pago</font></b>', 2=>'<b><font color="red">Estornado</font></b>');	

                                    foreach($tickets as $ticket){

                                    ?>
                                    <tr>
                                    <td>
                                        #<?php echo $ticket->id;?>
                                    </td>
                                    <td>
                                         <?php echo $ticket->titulo;?>
                                    </td>
                                    <td>
                                        <?php echo converter_data($ticket->data, "-", "/");?>
                                    </td>
                                    <td>
                                         <?php echo StatusUser($ticket->status);?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('tickets/visualizar/'.$ticket->id);?>">Visualizar</a>
                                    </td>
                                </tr>
                                    <?php
                                    }
                                }
                                ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END SAMPLE TABLE PORTLET-->

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
