<?php $titulo = 'Nuevo registro'; 
$titulo = 'Nuevo registro';
    $esAdmin = false;
    
    if(is_object($model)){
        $titulo = $model->Nombre;
        $esAdmin = ($model->EsAdmin === '1');
    }?>


<ol class="breadcrumb">
    <li>
        <a href="<?php echo site_url('empleado'); ?>">Empleados</a>
    </li>
   
</ol>

 <div class="col-xs-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> <?php echo $titulo; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

        <?php echo form_open('empleado/guardar', ['enctype' => 'multipart/form-data']); ?>
        <input type="hidden" name="id" value="<?php echo is_object($model) ? $model->id : ''; ?>" />
            <form class="form-horizontal">
              <div class="box-body">
                  <div class="form-group">
                <label class="col-sm-2 control-label">Es Admin</label>
                <div class="col-sm-10">
                <select name="EsAdmin" class="form-control">
                 <option <?php !$esAdmin ? 'selected' : ''; ?> value="0">NO</option>
                 <option <?php $esAdmin ? 'selected' : ''; ?> value="1">SI</option>
                  </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" name="Nombre" class="form-control" id="inputPassword3" placeholder="Nombre" 
                    value="<?php echo is_object($model) ? $model->Nombre : ''; ?>">
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Correo</label>

                  <div class="col-sm-10">
                    <input type="email" name="Correo" class="form-control" id="inputPassword3" placeholder="Correo"
                      value="<?php echo is_object($model) ? $model->Correo : ''; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" name="Password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Imagen</label>
                  <div class="col-sm-10">
                    <input type="file" name="File" id="exampleInputFile">
                  </div>
                </div>
            
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
          
                <button type="submit" class="btn btn-info pull-right">Enviar</button>
              </div>
              <!-- /.box-footer -->
            </form>
            <?php echo form_close(); ?>
          </div>
       
        </div>
</div>
