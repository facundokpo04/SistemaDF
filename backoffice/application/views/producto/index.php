<h1 class="page-header">
    <a class="pull-right btn btn-primary" href="<?php echo site_url('producto/crud'); ?>">Registrar</a>
    Productos
</h1>

<ol class="breadcrumb">
  <li class="active">Pedido</li>
</ol>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width:60px;"></th>
            <th>Nombre</th>
            <th style="width:160px;" class="text-right">Precio (USD)</th>
            <th style="width:160px;"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td>Combo familiar de Popcorn</td>
            <td class="text-right">14.00</td>
            <td class="text-center">
                <a class="btn btn-xs btn-success" href="<?php echo site_url('producto/crud/1'); ?>">
                    Editar
                </a>
                <a class="btn btn-xs btn-danger" href="<?php echo site_url('producto/eliminar/1'); ?>">
                    Eliminar
                </a>
            </td>
        </tr>
    </tbody>
</table>