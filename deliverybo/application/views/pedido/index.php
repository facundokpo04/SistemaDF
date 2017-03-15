
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
           
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <br/>

</div>
<div id="pedido" class="row" style="display:block;"> 
    <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Pizza Color Delivery.
          <small class="pull-right">Date: 2/10/2014</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Cliente:
        <address id="cliente">
        
        </address>
      </div>
      <!-- /.col -->
    
      <!-- /.col -->
      <div id="pedidoE" class="col-sm-4 invoice-col">
        
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Cant</th>
            <th>Item</th>
            <th>Nombre</th>
            <th>Aclaracion</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>1</td>
            <td>Call of Duty</td>
            <td>455-981-221</td>
            <td>El snort testosterone trophy driving gloves handsome</td>
            <td>$64.50</td>
          </tr>
        
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
       
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Amount Due 2/22/2014</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>$250.30</td>
            </tr>        
            <tr>
              <th>Envio:</th>
              <td>$5.80</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>$265.24</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
</div>


<script type="text/javascript">
    var baseurl = "<?php echo base_url(); ?>";
</script>