
<?php // var_dump($model);    ?>
<ol class="breadcrumb">
    <li class="active">Categoria</li>
</ol>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Categorias</h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table  id="tblCategorias" class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>
                <?php echo $this->pagination->create_links(); ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- Modal Editar Categoria -->

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

 <div class="example-modal modal fade" id="modalEditCategoria" tabindex="-1" >
        <div class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal">
                    <!-- parametros ocultos -->
                    <input type="hidden" id="mIdCategoria">

                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre Categoria</label>
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
                            <label class="col-sm-3 control-label">Estado</label>
                            <div class="col-sm-9"> 
                                <!--select--><input type="text" name="mEstado" id="mEstado" class="form-control" id="mtxtNombre" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12"> 
                            <label for="exampleInputFile">Seleccione Imagen</label>
                            <input type="file" id="mImagen">
                            </div>
                        </div>

                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" id="mbtnCerrarModal" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" id="mbtnUpdCategoria">Actualizar</button>
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