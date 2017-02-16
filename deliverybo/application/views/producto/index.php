
<?php // var_dump($model);                            ?>
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
<div id="productos" class="row">
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
 <!--Detalle de producto -->
<div id="producto" class="row" >   
    <div class="col-lg-12">     
        <div class="panel panel-bluedark">
            <div class="panel-heading">Datos del Producto</div>
            <div class="panel-body" >


                <input id="idProducto" name="idProducto" style="display:none;">

                <div class="col-sm-6 form-group">
                    <label for="">Nombre</label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa fa-th-list fa-fw"></i> </span><input class="form-control" placeholder="" name="txtNombre" id="txtNombre" type="text" autocomplete="on" autofocus="" tabindex="2" >
                    </div>	
                </div>    
                <div class="col-sm-6 form-group">
                    <label for="">Descripcion</label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa fa-th-list fa-fw"></i> </span><strong><input class="form-control" placeholder="" name="txtDescripcion" id="txtDescripcion" type="text" autocomplete="on" autofocus="" tabindex="1"  required=""></strong>
                    </div>
                </div>     

                <div class="col-sm-6 form-group">
                    <label for="">Codigo Producto</label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa fa-th-list fa-fw"></i></span><input class="form-control" placeholder="" name="txtCodigo" id="txtCodigo" type="text" autocomplete="on" autofocus="" tabindex="3" required="">
                    </div>	
                </div>     

                <div class="col-sm-6 form-group">
                    <label for="">Precio </label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa  fa-dollar fa-fw"></i> </span><input class="form-control" placeholder="" name="txtPrecio" id="txtPrecio" type="number" step="any" autocomplete="on" autofocus="" tabindex="4" >
                    </div>	
                </div>   

                <div class="col-sm-6 form-group">
                    <label for="">Max Cant Componentes </label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa  fa-plus-circle fa-fw"></i> </span><input class="form-control" placeholder="" name="txtMaxCompo" id="txtMaxCompo" type="number" autocomplete="on" autofocus="" tabindex="4" >
                    </div>	
                </div> 
                <div class="col-sm-6 form-group">
                    <label for="">Min Cant Componentes </label>
                    <div class="input-group">
                        <span class="input-group-addon cajaParametro"><i class="fa  fa-minus-circle fa-fw"></i> </span><input class="form-control" placeholder="" name="txtMinCompo" id="txtMinCompo" type="number" autocomplete="on" autofocus="" tabindex="4" >
                    </div>	
                </div> 
                <div class="col-sm-6 form-group">
                    <label for="">Estado</label>
                    <div class="input-group col-sm-12"> 
                        <select name="PEstado" id="PEstado" class="form-control">                       
                            <option value="1">Habilitado</option>
                            <option value="2">Deshabilitado</option>
                        </select>
                    </div>
                </div>
                <div  class="col-sm-6 form-group">
                    <label for="">Visible Menu</label>
                    <div class="input-group col-sm-12" > 
                        <select   name="VEstado" id="VEstado" class="form-control">                       
                            <option value="1">Visible</option>
                            <option value="2">No Visible</option>
                        </select>
                    </div>
                </div>
                 <div  class="col-sm-6 form-group">
                    <label for="">Categoria</label>
                    <div class="input-group col-sm-12" > 
                        <select   name="Pcategoria" id="Pcategoria" class="form-control">                       
                            <option value="">Selecciona una Categoria</option>
                        </select>
                    </div>
                </div>
 <!-- /.paneles de Variedad/componente/imagen -->
                <div class="col-sm-12">
                    <ul class="nav nav-tabs" role="tablist" id="paneles">
                        <li class="active"><a href="#tabVariedad" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Variedades</h4></a></li>
                        <li><a href="#tabComponentes" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Componentes</h4></a></li>
                        <li><a href="#tabImagen" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Imagen Producto</h4></a></li>

                    </ul> 
                    <div class="tab-content" id="panelCont">
                        <div class="tab-pane active" id="tabVariedad">  
                            <div class="media-body">

                                <div class="media-body">
                                    <div class="box-body table-responsive no-padding">
                                        <table  id="tblVariedades" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Descripcion</th>
                                                    <th>Precio</th>                                     
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>

                                        </table>

                                    </div>
                                    <!-- Botón para agregar filas -->
                                    <button class="btn btn-warning"  type="button" data-toggle="modal" data-target="#modalEditVariedad" >Agregar Variedad</button>
                                    <input type="button" class="btn btn-info" id="guardarVar" value="Guardar" />


                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabComponentes">  

                            <div class="media-body">
                                <div class="box-body table-responsive no-padding">
                                    <table  id="tblComponentes" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Precio</th>                                     
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                    </table>

                                </div>
                                <!-- Botón para agregar filas -->
                                <button type="button" class="btn btn-warning"  id="agregarCom"> Agregar Componente</button>
                                <input type="button" class="btn btn-info" id="guardarCom" value="Guardar" />


                            </div>

                        </div>
                        <div class="tab-pane" id="tabImagen">  

                            <div class="media-body">
                                <div class="panel panel-bluedark">


                                    <div class="col-lg-12 form-group">
                                        <label for="">Imagen Producto</label>
                                        <span class="label label-primary">La imagen debe ser de 76 x 76</span>     
                                        <div class="input-group">
                                            <span class="input-group-addon cajaParametro"><i class="fa fa-picture-o fa-fw"></i> </span>
                                            <input class="form-control" type="file" name="txtImagen" id="txtLogo" tabindex="16">  
                                        </div>  

                                        <div class="form-group">    
                                            <br>	
                                            <div class="thumbnail">
                                                <!--Foto de 76 x 76 -->
                <!--									<img src="assets/img/Logo-impresion.png" alt="logo">-->
                                                <img id="imagen" src="" alt="logo">	
                                            </div>
                                        </div> 
                                    </div>

                                    <div style="height:35px;">
                                    </div>
                                </div>    
                                <!-- Botón para agregar filas -->
                                <input type="button" class="btn btn-info" id="guardarImg" value="Guardar" />


                            </div>
                        </div>
                    </div>



                </div> 


            </div> 

        </div> 



    </div>  

    <div class="panel-footer"><button type="button" class="btn btn-default"><a href="producto">Cancelar</button>
        <button type="button" class="btn btn-info" id="mbtnUpdProducto">Actualizar</button></div>
</div> 
 <!-- modal agregar componente -->
<div class="modal fade" id="modalAgregarComp" role="dialog"  style="overflow-y: scroll;" >
   
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="mCerrarModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Agregar Componentes</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body table-responsive no-padding">
                        <table  id="tblComponentes2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>                                     
                                    <th>Elegir</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="mbtnCerrarModal" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" onclick="ActualizarComponentes($('#idProducto').val())">Guardar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->  
</div>
 
  
 <!-- modal agregar variedad -->
<style>
    .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
    }

    .example-modal .modal {
        background: transparent !important;
    }
</style>

<div class="example-modal modal fade" id="modalEditVariedad" tabindex="-1" >
    <div class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="mCerrarModalVar" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Agregar/ Eliminar Variedad</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <!-- parametros ocultos -->
                        <input type="hidden" id="mIdVariedad">
                         

                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nombre Variedad</label>
                                <div class="col-sm-9"> 
                                    <input type="text" name="mNombre" id="mNombre" class="form-control" id="mtxtNombre" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Descripci&oacute;n</label>
                                <div class="col-sm-9"> 
                                    <input type="text" name="mDescripcion" id="mDescripcion" class="form-control" id="mtxtNombre" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tipo</label>
                                <div class="col-sm-9"> 
                                   <input type="text" name="mTipo" id="mTipo" class="form-control" id="mtxtTipo" placeholder="">
                               
                                       </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">Precio</label>
                                <div class="col-sm-9"> 
                                   <input type="text" name="mPrecio" id="mPrecio" class="form-control" id="mtxtPrecio" placeholder="">
                               
                                       </div>
                            </div>
                           

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="mbtnCerrarModalVar" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" id="mbtnUpdVariedad">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
   <!-- /.example-modal -->


<script type="text/javascript">
    //Timepicker


    var baseurl = "<?php echo base_url(); ?>";




</script>