

<ol class="breadcrumb">
  <li class="active">Empleados</li>
</ol>
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Empleados</h3>

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
                  <th>Empeado</th>
                  <th>Correo</th>
                  <th>Es Admin</th>
                  <th></th>
                </tr>
               <?php foreach($model as $m): ?>
                <tr>
                <td> <?php if(!empty($m->Imagen)): ?>
                <img style="width:60px;" src="<?php echo $m->Imagen; ?>"  alt="?php echo $m->Nombre; ?>" />
                <?php endif; ?>
                </td>
                  <td><?php echo $m->Nombre; ?></td>
                  <td><?php echo $m->Correo; ?></td>
                  <td><span class="label label-primary"><?php echo $m->EsAdmin == '1' ? 'SI' : 'NO'; ?></span></td>
                <td class="text-center">
                <a class="btn btn-sm btn-success" href="<?php echo site_url('empleado/crud/' . $m->id); ?>">
                   &nbsp  Editar  &nbsp 
                </a>
                <a class="btn btn-sm btn-danger" href="<?php echo site_url('empleado/eliminar/' . $m->id); ?>">
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



