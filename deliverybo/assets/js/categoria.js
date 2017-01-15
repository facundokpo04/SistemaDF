
$('#tblCategorias tbody').html('');

$.ajax({
    type: "POST",
    url: baseurl + "index.php/categoria/get_categorias/1/0",
    dataType: 'json',
    data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
    success: function (res) {

        $.each(res, function (i, item) {

            $('#tblCategorias tbody').append(
                    '<tr>' +
                    '	<td>' + item.cat_id + '</td>' +
                    '	<td>' + item.cat_nombre + '</td>' +
                    '	<td>' + item.cat_descripcion + '</td>' +
                    '	<td><a href="#" class="btn btn-block btn-primary btn-sm" style="width: 80%;" data-toggle="modal" data-target="#modalEditCategoria" onClick="selCategoria(\'' + item.cat_id + '\');"><i class="fa fa-fw fa-edit"></i></a></td>' +
                    '</tr>'
                    );
        });
    }
});


selCategoria = function (idCategorias) {


    $.ajax({
        type: "POST",
        url: baseurl + "index.php/categoria/get_categoriaById/" + idCategorias,
        dataType: 'json',
        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function (res) {


            $('#mDescripcion').val(res.cat_descripcion);
            $('#mNombre').val(res.cat_nombre);
            $('#mEstado').val(res.cat_idEstado);//select
            //ajax para traer todos los estados
            $('#mIdCategoria').val(res.cat_id);
            $('#mImagen').val(res.cat_imagen);
        }
    });

};


$('#mbtnUpdCategoria').click(function () {

    $.ajax({
        type: "POST",
        url: baseurl + "index.php/categoria/updCategoria",
        dataType: 'json',
        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
            cat_nombre: $('#mNombre').val(),
            cat_descripcion: $('#mDescripcion').val(),
            cat_idEstado: $('#mEstado').val(),
            cat_id: $('#mIdCategoria').val(),
            cat_imagen: $('#mImagen').val()},
        success: function (res) {

            debugger;
            var a = 0;
            $('#mbtnCerrarModal').click();

            location.reload();
        }
    });

});
         