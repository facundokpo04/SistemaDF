
<?php // var_dump($model); ?>
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
              <table class="table table-hover">
                <tr>
                  <th></th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
               <?php foreach($model as $m): ?>
                <tr>
                  <td><?php echo $m->cat_id; ?></td>
                  <td><?php echo $m->cat_nombre; ?></td>
                  <td><?php echo $m->cat_descripcion; ?></td>
                  <td><?php echo $m->cat_idEstado; ?></td>
                  
                 
                <td class="text-center">
                <a class="btn btn-sm btn-success" href="<?php echo site_url('empleado/crud/' . $m->cat_id); ?>">
                   &nbsp  Editar  &nbsp 
                </a>
                <a class="btn btn-sm btn-danger" href="<?php echo site_url('empleado/eliminar/' . $m->cat_id); ?>">
                    Eliminar
                </a>
                </td>
                </tr>
                 <?php endforeach; ?>
              </table>
              <?php echo $this->pagination->create_links(); ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
