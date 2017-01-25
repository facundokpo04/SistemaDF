
<?php // var_dump($model);        ?>
<ol class="breadcrumb">
    <li class="active">Sucursal</li>
</ol>
<div class="panel panel-default">
    <div class="panel-heading">
        Herramientas
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="btn-group"> 
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalEditSucursal" >Agregar</button>
        </div>
        <div class="btn-group"> 
            <button class="btn btn-danger" type="button" onClick="">Eliminar</button>
        </div>

    </div>
</div>
<br/>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Sucursales</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table  id="tbSucursales" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Cuilt</th>
                            <th>Razon Social</th>
                            <th>Direccion</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<div class="row" style="display:block;">               
    <div class="col-lg-12">     
        <div class="panel panel-bluedark">
            <div class="panel-heading">Datos de la Sucursal</div>
            <div class="panel-body" >


                <input id="idEmpresa" name="idEmpresa" style="display:none;">

                <div class="col-sm-6 form-group">
                    <label for="">Nombre</label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa fa-university fa-fw"></i> </span><input class="form-control" placeholder="" name="txtNombre" id="txtNombre" type="text" autocomplete="on" autofocus="" tabindex="2" >
                    </div>	
                </div>    
                <div class="col-sm-6 form-group">
                    <label for="">Razon Social</label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa fa-building fa-fw"></i> </span><strong><input class="form-control" placeholder="" name="txtRazonSocial" id="txtRazonSocial" type="text" autocomplete="on" autofocus="" tabindex="1"  required=""></strong>
                    </div>
                </div>     

                <div class="col-sm-6 form-group">
                    <label for="">Cuilt</label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa fa-building fa-fw"></i></span><input class="form-control" placeholder="" name="txtCuit" id="txtCuit" type="text" autocomplete="on" autofocus="" tabindex="3" required="">
                    </div>	
                </div>     

                <div class="col-sm-6 form-group">
                    <label for="">Direccion</label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa fa-map-marker fa-fw"></i> </span><input class="form-control" placeholder="" name="txtDomicilio" id="txtDomicilio" type="text" autocomplete="on" autofocus="" tabindex="4" >
                    </div>	
                </div>    
                <div class="col-sm-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#tabParametros" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Parametros</h4></a></li>
                        <li><a href="#tabHorarios" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Horarios Antencion</h4></a></li>

                    </ul> 
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabParametros">  
                            <div class="media-body">

                                <div class="col-sm-6 form-group">
                                    <label for="">Zona Entrega</label>
                                    <div class="input-group">
                                        <span class="input-group-addon cajaParametro "><i class="fa fa-building fa-fw"></i></span><input class="form-control width_input" placeholder="" name="txtZona" id="txtZona" type="text" autocomplete="on" autofocus="" tabindex="1" required="">
                                    </div>	
                                </div>  
                                <div class="col-sm-6 form-group">
                                    <label for="">Pedido Minimo</label>
                                    <div class="input-group">
                                        <span class="input-group-addon cajaParametro "><i class="fa fa-building fa-fw"></i></span><input class="form-control width_input" placeholder="" name="txtPedidoM" id="txtPedidoM" type="text" autocomplete="on" autofocus="" tabindex="2" required="">
                                    </div>	
                                </div>  
                                <div class="col-sm-6">
                                   <input type="text" value="-180,-45" class="slider form-control" data-slider-min="-200" data-slider-max="200" data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red" data-value="-180,-45" >


                                   
                                </div> 

                                <div class="col-sm-6 form-group">
                                    <label for="">Costo de Envio</label>
                                    <div class="input-group">
                                        <span class="input-group-addon cajaParametro"><i class="fa fa-building fa-fw"></i></span><input class="form-control width_input" placeholder="" name="txtCostoE" id="txtCostoE" type="text" autocomplete="on" autofocus="" tabindex="3" required="">
                                    </div>	
                                </div>  
                            </div>
                        </div>
                        <div class="tab-pane active" id="tabHorarios">  
                            <div class="media-body">


                            </div>
                        </div>
                    </div>

                    <div class="tab-pane active" id="tabHorarios">  
                        <div class="media-body">


                        </div>
                    </div>

                </div> 

            </div>  



        </div> 
    </div>  
</div>   
</div>	


<style>


    .reviews {
        color: #555;    
        font-weight: bold;
        margin: 10px auto 20px;
    }
    .tab-content {
        padding: 50px 15px;
        border: 1px solid #ddd;
        border-top: 0;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .width_input{
        max-width: 50%;
    }
</style>
<script>
  $(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').slider();


 
  });
</script>
<script type="text/javascript">
    var baseurl = "<?php echo base_url(); ?>";
</script>