
<?php // var_dump($model);        ?>
<ol class="breadcrumb">
    <li class="active">Pedidos Hoy</li>
</ol>

<br/>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">PEDIDOS</h3>
            </div>
            <!-- /.box-header -->
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Ultimos Pedidos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin" id="tblPedidos">
                  <thead>
                  <tr>
                    <th>Pedido ID</th>
                    <th>Estado</th>
                    <th>Cliente</th>                 
                    <th>Celular</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- Modal Editar Persona -->



<script type="text/javascript">
    var baseurl = "<?php echo base_url(); ?>";
</script>