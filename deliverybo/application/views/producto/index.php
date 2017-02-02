
<?php // var_dump($model);                         ?>
<ol class="breadcrumb">
    <li class="active">Productos</li>
</ol>
<div id="herramientas" class="panel panel-default">
    <div class="panel-heading">
        Herramientas
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="btn-group"> 
            <button class="btn btn-primary" type="button" id="btnAgregarProd" >Agregar</button>
        </div>


    </div>
</div>
<br/>
<div id="sucursales" class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Productos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table  id="tbProductos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Visible Menu</th>
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
<div id="producto" class="row" >   
    <div class="col-lg-12">     
        <div class="panel panel-bluedark">
            <div class="panel-heading">Datos de Producto</div>
            <div class="panel-body" >


                <input id="idProducto" name="idProducto" style="display:none;">

                <div class="col-sm-6 form-group">
                    <label for="">Nombre</label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa fa-university fa-fw"></i> </span><input class="form-control" placeholder="" name="txtNombre" id="txtNombre" type="text" autocomplete="on" autofocus="" tabindex="2" >
                    </div>	
                </div>    
                <div class="col-sm-6 form-group">
                    <label for="">Descripcion</label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa fa-building fa-fw"></i> </span><strong><input class="form-control" placeholder="" name="txtDescripcion" id="txtDescripcion" type="text" autocomplete="on" autofocus="" tabindex="1"  required=""></strong>
                    </div>
                </div>     

                <div class="col-sm-6 form-group">
                    <label for="">Codigo Producto</label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa fa-building fa-fw"></i></span><input class="form-control" placeholder="" name="txtCodigo" id="txtCodigo" type="text" autocomplete="on" autofocus="" tabindex="3" required="">
                    </div>	
                </div>     

                <div class="col-sm-6 form-group">
                    <label for="">Precio </label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa fa-map-marker fa-fw"></i> </span><input class="form-control" placeholder="" name="txtPrecio" id="txtPrecio" type="number" step="any" autocomplete="on" autofocus="" tabindex="4" >
                    </div>	
                </div>   

                <div class="col-sm-6 form-group">
                    <label for="">Max Cant Componentes </label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa fa-map-marker fa-fw"></i> </span><input class="form-control" placeholder="" name="txtMaxCompo" id="txtMaxCompo" type="number" autocomplete="on" autofocus="" tabindex="4" >
                    </div>	
                </div> 
                <div class="col-sm-6 form-group">
                    <label for="">Min Cant Componentes </label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa fa-map-marker fa-fw"></i> </span><input class="form-control" placeholder="" name="txtMinCompo" id="txtMinCompo" type="number" autocomplete="on" autofocus="" tabindex="4" >
                    </div>	
                </div> 
                <div class="col-sm-6 form-group">
                    <label for="">Estado</label>
                    <div class="input-group"> 
                        <select name="PEstado" id="PEstado" class="form-control">                       
                            <option value="1">Habilitado</option>
                            <option value="2">Deshabilitado</option>
                        </select>
                    </div>
                </div>
                <div  class="col-sm-6 form-group">
                    <label for="">Visible Menu</label>
                    <div class="input-group"> 
                        <select   name="VEstado" id="VEstado" class="form-control">                       
                            <option value="1">Visible</option>
                            <option value="2">No Visible</option>
                        </select>
                    </div>
                </div>
            </div> 

        </div> 

        <div class="col-sm-12">
            <ul class="nav nav-tabs" role="tablist" id="paneles">
                <li class="active"><a href="#tabParametros" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Parametros</h4></a></li>
                <li><a href="#tabHorarios" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Horarios Antencion</h4></a></li>

            </ul> 
            <div class="tab-content" id="panelCont">
                <div class="tab-pane active" id="tabParametros">  
                    <div class="media-body">

                        <div class="col-sm-6 form-group">
                            <label for="">Zona Entrega</label>
                            <div class="input-group">
                                <span class="input-group-addon cajaParametro "><i class="fa fa-building fa-fw"></i></span><input class="form-control width_input" placeholder="" name="txtZonaE" id="txtZonaE" type="text" autocomplete="on" autofocus="" tabindex="5" required="">
                            </div>	
                        </div>  

                        <div class="col-sm-6 form-group">
                            <label for="">Pedido Minimo</label>

                            <div class="input-group">
                                <input  id="rangepm" type="range"  max="500" min="0" step="10" onchange="txtPedidoM.value = rangepm.value" /> 
                                <span class="input-group-addon cajaParametro "><i class="fa fa-money fa-fw"></i></span><input class="form-control width_input" placeholder="" name="txtPedidoM" id="txtPedidoM" type="text" autocomplete="on" autofocus="" tabindex="6" required="">
                            </div>	

                        </div> 

                        <div class="col-sm-6 form-group">
                            <label for="">Costo de Envio</label>
                            <div class="input-group">
                                <span class="input-group-addon cajaParametro"><i class="fa fa-money  fa-fw"></i></span><input class="form-control width_input" placeholder="" name="txtCostoE" id="txtCostoE" type="text" autocomplete="on" autofocus="" tabindex="7" required=""/>
                            </div>	
                        </div> 
                        <div class="col-sm-6 form-group">
                            <label for="">Tiempo Entrega</label>

                            <div class="input-group">
                                <input  id="rangete" type="range"  max="60" min="0" step="1" onchange="txtTiempoE.value = rangete.value" /> 
                                <span class="input-group-addon cajaParametro "><i class="fa  fa-hourglass-half fa-fw"></i></span><input class="form-control width_input" placeholder="" name="txtTiempoE" id="txtTiempoE" type="text" autocomplete="on" autofocus="" tabindex="8" required=""/>
                            </div>	

                        </div> 
                    </div>
                </div>
                <div class="tab-pane" id="tabHorarios">  

                    <div class="media-body">
                        <table class="table table-bordered" id="tablahorario">
                            <!-- Cabecera de la tabla -->
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Dia</th>
                                    <th>Hora Apertura</th>
                                    <th>Hora Cierre</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>

                            <!-- Cuerpo de la tabla con los campos -->
                            <tbody>
                                <tr></tr>

                            </tbody>
                        </table>
                        <!-- Botón para agregar filas -->
                        <input type="button" class="btn btn-warning" id="agregar" value="Agregar fila" />
                        <input type="button" class="btn btn-info" id="guardarHor" value="Guardar" />


                    </div>
                </div>
            </div>



        </div> 

    </div>  

    <div class="panel-footer"><button type="button" class="btn btn-default"><a href="sucursal">Cancelar</button>
        <button type="button" class="btn btn-info" id="mbtnUpdSucursal">Actualizar</button></div>



</div> 
</div>

</div>

<script type="text/javascript">
    //Timepicker


    var baseurl = "<?php echo base_url(); ?>";




</script>