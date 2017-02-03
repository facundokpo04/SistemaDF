


function VerForm() {
    $("#producto").show();// Mostramos el formulario
    $("#herramientas").hide();// ocultamos el boton nuevo
    $("#productos").hide();
}


function OcultarForm() {
    $("#producto").hide();// Mostramos el formulario
    $("#herramientas").show();// ocultamos el boton nuevo
    $("#productos").show();
}

function cargarDataProducto(idProducto) {// funcion que llamamos del archivo ajax/CategoriaAjax.php linea 52
   VerForm();
    $.ajax({
        type: "POST",
        url: baseurl + "index.php/producto/get_productoById/" + idProducto,
        dataType: 'json',
        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function (res) {
            $('#txtNombre').val(res.prod_nombre);
            $('#txtDescripcion').val(res.prod_descripcionProducto);
            $('#txtCodigo').val(res.prod_codigoProducto);//select
            //ajax para traer todos los estados
            $('#txtPrecio').val(res.prod_precioBase);
            $('#txtMaxCompo').val(res.prod_maxComponente);//select
            $('#txtMinCompo').val(res.prod_maxComponente);//select
            $('#PEstado').val(res.prod_idEstado);//selec
            $('#VEstado').val(res.prod_idEstadoVisible);//selec
            $('#imagen').attr('src', '../assets/imagenes/producto/' + res.prod_imagen);

        }
    });
    cargarComponentes(idProducto);
    cargarVariedades(idProducto);
   



}

function cargarComponentes(idProducto) {

    $.ajax({
        type: "POST",
        url: baseurl + "index.php/producto/get_ComponentesById/" + idProducto,
        dataType: 'json',
        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function (res) {
            debugger;
            $.each(res, function (key, data) {
                debugger;

                $('#tblComponentes tbody').append('<tr>' +
                        ' <td>' +
                        data.com_id +
                        ' </td>' +
                        ' <td>' +
                        data.com_nombre +
                        ' </td>' +
                        ' <td>' +
                        data.com_descripcion +
                        ' </td>' +
                        ' <td>' + '$&nbsp;' +
                        data.com_precio +
                        ' </td>' +
                        ' <td class="eliminar"><a href="#"  onClick=""><i style="color:red;" class="glyphicon glyphicon-remove"></i></a></td>' +
                        '</tr>'
                        );
            });



        }
    });

}

function cargarVariedades(idProducto) {

    $.ajax({
        type: "POST",
        url: baseurl + "index.php/producto/get_VariedadesById/" + idProducto,
        dataType: 'json',
        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function (res) {
            debugger;
            $.each(res, function (key, data) {
                debugger;

                $('#tblVariedades tbody').append('<tr>' +
                        ' <td>' +
                        data.var_id +
                        ' </td>' +
                        ' <td>' +
                        data.var_nombre +
                        ' </td>' +
                        ' <td>' +
                        data.var_descripcion +
                        ' </td>' +
                        ' <td>' + '$&nbsp;' +
                        data.var_precio +
                        ' </td>' +
                        ' <td class="eliminar"><a href="#"  onClick=""><i style="color:red;" class="glyphicon glyphicon-remove"></i></a></td>' +
                        '</tr>'
                        );
            });



        }
    });

}

OcultarForm();
debugger;
$('#tbProductos').DataTable({
    "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "Todo"]],
    'paging': true,
    'info': true,
    'filter': true,
    'stateSave': true,
    'ajax': {
        "url": baseurl + "index.php/producto/get_Productos/4",
        "type": "POST",
        "dataType": 'json',
        "data": {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},

    },
    'columns': [
        {data: 'prod_id', 'sClass': 'dt-body-center'},
        {data: 'prod_nombre'},
        {data: 'prod_descripcionProducto'},
        {data: 'prod_idCategoria'},
        {data: 'prod_precioBase'},
        {data: 'prod_idEstado'},
        {data: 'prod_idEstadoVisible'},
        {"orderable": true,
            render: function (data, type, row) {

                return '<span class="pull-right" >' +
                        '<div class="dropdown">' +
                        '  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
                        '    Acciones' +
                        '  <span class="caret"></span>' +
                        '  </button>' +
                        '    <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">' +
                        '    <li><a href="#" title="Editar informacion"   onClick="cargarDataProducto(\'' + row.prod_id + '\');"><i style="color:#555;" class="glyphicon glyphicon-edit"></i> Editar</a></li>' +
                        '    <li><a href="#"><i class="glyphicon glyphicon-eye-open" style="color:#006699"></i> Ver</a></li>' +
                        '    <li><a href="#" title="Eliminar Producto" onClick="eliminarProducto(\'' + row.prod_id + '\');"><i style="color:red;" class="glyphicon glyphicon-remove"></i> Eliminar</a></li>' +
                        '    </ul>' +
                        '</div>' +
                        '</span>';
                // '<a href="#" class="btn btn-block btn-primary btn-sm" style="width: 80%;" data-toggle="modal" data-target="#modalEditCategoria" onClick="selCategoria(\'' + row.cat_id + '\');"><i class="fa fa-fw fa-edit"></i></a></td>';
                ocultarForm();
            }

        }

    ],
    "columnDefs": [

        {
            "targets": [1],
            "data": "prod_nombre",
            "orderData": [1, 0],
            "render": function (data, type, row) {
                return "<span style='color:#006699;'></i>&nbsp;&nbsp;" + data + "</span>"

            }
        },
        {
            "targets": [4],
            "data": "prod_precio",
            "orderData": [1, 0],
            "render": function (data, type, row) {
                return "<span ></i>$&nbsp;&nbsp; " + data + "</span>"

            }
        },
        {
            "targets": [5],
            "data": "prod_idEstado",
            "render": function (data, type, row) {

                if (data == 1) {
                    return "<span class='label label-success'>Habilitado</span>";
                } else if (data == 2) {
                    return "<span class='label label-danger'>Deshabilitado</span>";
                }

            }
        },
        {
            "targets": [6],
            "data": "prod_idEstadoVisible",
            "render": function (data, type, row) {

                if (data == 1) {
                    return "<span class='label label-success'>Visible</span>";
                } else if (data == 2) {
                    return "<span class='label label-danger'>No Visible</span>";
                }

            }
        },
    ],
    "order": [[0, "asc"]],

});
