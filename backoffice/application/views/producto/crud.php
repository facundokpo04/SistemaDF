<?php $titulo = 'Nuevo registro'; ?>
    <h1 class="page-header">
    <?php echo $titulo; ?>
</h1>

<ol class="breadcrumb">
    <li>
        <a href="<?php echo site_url('producto'); ?>">Productos</a>
    </li>
    <li class="active">
        <?php echo $titulo; ?>
    </li>
</ol>

<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="Nombre" class="form-control" placeholder="Ingrese el nombre">
</div>

<div class="form-group">
    <label>Precio</label>
    <input type="text" name="Precio" class="form-control" placeholder="Ingrese el precio">
</div>
<div class="form-group">
    <label>Imagen</label>
    <input type="file" name="File" class="form-control">
</div>

<button class="btn btn-primary" type="submit">
    Enviar
</button>