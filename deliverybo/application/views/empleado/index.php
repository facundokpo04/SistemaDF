
<?php // var_dump($model);             ?>
<ol class="breadcrumb">
    <li class="active">Empleado</li>
</ol>
<div class="panel panel-default">
    <div class="panel-heading">
        Herramientas
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="btn-group"> 
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalEditEmpleado" >Agregar</button>
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
                <h3 class="box-title">Empleados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table  id="tblEmpleados" class="table table-bordered table-striped">
                    <thead>
                        <tr>  
                            <th>#</th>
                            <th>Legajo</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Sucursal</th>
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

<!-- Modal Editar Empleado -->

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

<div class="example-modal modal fade" id="modalEditEmpleado" tabindex="-1" >
    <div class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="mCerrarModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Agregar/ Eliminar Categor&iacute;a</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <!-- parametros ocultos -->
                        <input type="hidden" id="mIdEmpleado">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nombre Persona</label>
                                <div class="col-sm-9"> 
                                    <input type="text" name="mNombre" id="mNombre" class="form-control" id="mtxtNombre" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Legajo</label>
                                <div class="col-sm-9"> 
                                    <input type="text" name="mLegajo" id="mLegajo" class="form-control" id="mtxtNombre" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Documento</label>
                                <div class="col-sm-9"> 
                                    <input type="text" name="mDocumento" id="mDocumento" class="form-control" id="mtxtNombre" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9"> 
                                    <input type="text" name="mEmail" id="mEmail" class="form-control" id="mtxtNombre" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9"> 
                                    <input type="text" name="mPassword" id="mPassword" class="form-control" id="mtxtNombre" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nacionalidad</label>
                                <div class="col-sm-9"> 
                                    <input type="text" name="mNacionalidad" id="mNacionalidad" class="form-control" id="mtxtNombre" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Perfil Usuario</label>
                                <div class="col-sm-9"> 
                                    <input type="text" name="mPerfilUsuario" id="mPerfilUsuario" class="form-control" id="mtxtNombre" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Cargo</label>
                                <div class="col-sm-9"> 
                                    <input type="text" name="mCargo" id="mCargo" class="form-control" id="mtxtNombre" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Sucursal</label>
                                <div class="col-sm-9"> 
                                    <select class="form-control" id="mSucursal" name="mSucursal">
                                        <option value="1">1</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">

                                <label class="col-sm-3 control-label">Imagen</label>
                                <div class="col-sm-9">
                                    <input   type="file"  id="mImagen">
                                </div>
                            </div>



                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="mbtnCerrarModal" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" id="mbtnUpdEmpleado2">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

<script type="text/javascript">
    var baseurl = "<?php echo base_url(); ?>";
</script>