

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
                return "<span ></i>$&nbsp;&nbsp; "  + data + "</span>"

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


