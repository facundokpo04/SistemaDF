
<?php // var_dump($model);                     ?>
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

<script type="text/javascript">
    //Timepicker


    var baseurl = "<?php echo base_url(); ?>";




</script>