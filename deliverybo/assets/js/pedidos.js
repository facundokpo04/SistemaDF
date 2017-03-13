

$('#tblPedidos').DataTable({
    "lengthMenu": [[6, 10, 15, -1], [5, 10, 15, "Todo"]],
    'paging': true,
    'info': true,
    'filter': true,
    'stateSave': true,
    'ajax': {
        "url": baseurl + "index.php/pedido/get_pedidos/",
        "type": "POST",
        "dataType": 'json',
        "data": {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
    },
    'columns': [
        {data: 'pe_id', 'sClass': 'dt-body-center'},
        {data: 'pe_idEstado'},
        {data: 'per_nombre'},
        {data:'pe_cli_tel'},
        {data: 'dir_direccion'},
        {data: 'dir_telefonoFijo'},
        {"orderable": true,
            render: function (data, type, row) {

                return '<span class="pull-right" >' +
                        '<div class="dropdown">' +
                        '  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
                        '    Acciones' +
                        '  <span class="caret"></span>' +
                        '  </button>' +
                        '    <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">' +
                        '    <li><a href="#" title="Cambiar Estado" data-toggle="modal" data-target="#" onClick="selPedido(\'' + row.pe_id + '\');"><i style="color:#555;" class="glyphicon glyphicon-edit"></i>Estado</a></li>' +
                        '    <li><a href="#" onClick="selPedido(\'' + row.pe_id + '\')><i class="glyphicon glyphicon-eye-open" style="color:#006699"></i> Ver Pedido</a></li>' +                     
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
            "data": "pe_idEstado",
            "render": function (data, type, row) {

                if (data == 1) {
                    return "<span class='label label-warning'>Pendiente</span>";
                } else if (data == 2) {
                    return "<span class='label label-succes'>Enviado</span>";
                }

            }
        },
        {
            "targets": [0],
            "data": "pe_id",
            "orderData": [1, 0],
            "render": function (data, type, row) {
                return '<a href="pedido/verDetalle/'+ data +'">PED' + data +'</a>'

            }
        },
        
    ],
    "order": [[0, "asc"]],
});


selPedido = function (idPedido) {

$('#cliente').empty();
$('#cliente').append('<strong>Admin, Inc.</strong><br>'+
                     '795 Folsom Ave, Suite 600<br>'+
                     'San Francisco, CA 94107<br>'+
                     'Telefono: (804) 123-5432<br>'+
                     'Email: info@almasaeedstudio.com');
                     


      
//    $.ajax({
//        type: "POST",
//        url: baseurl + "index.php/persona/get_personaById/" + idPersonas,
//        dataType: 'json',
//        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
//        success: function (res) {
//
//
//            $('#mNombre').val(res.per_nombre);
//            $('#mEmail').val(res.per_email);
//            $('#mDocumento').val(res.per_documento);//select
//            //ajax para traer todos los estados
//            $('#mNacionalidad').val(res.per_nacionalidad);
//            $('#mPassword').val(res.per_password);
//            $('#mPerfilUsuario').val(res.per_perfilUsuario);
//            $('#mIdPersona').val(res.per_id);
////            $('#mImagen').val(res.cat_imagen);
//        }
//    });

};
