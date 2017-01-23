
$('#tblEmpleados').DataTable({
    "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "Todo"]],
    'paging': true,
    'info': true,
    'filter': true,
    'stateSave': true,
    'ajax': {
        "url": baseurl + "index.php/empleado/get_empleados/1",
        "type": "POST",
        "dataType": 'json',
        "data": {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
    },
    'columns': [
        {data: 'emp_id', 'sClass': 'dt-body-center'},
        {data: 'emp_legajo'},
        {data: 'per_nombre'},
        {data: 'per_email'},
        {data: 'suc_nombre'},
        {"orderable": true,
            render: function (data, type, row) {

                return '<span class="pull-right" >' +
                        '<div class="dropdown">' +
                        '  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
                        '    Acciones' +
                        '  <span class="caret"></span>' +
                        '  </button>' +
                        '    <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">' +
                        '    <li><a href="#" title="Editar informacion" data-toggle="modal" data-target="#modalEditEmpleado" onClick="selEmpleado(\'' + row.emp_id + '\');"><i style="color:#555;" class="glyphicon glyphicon-edit"></i> Editar</a></li>' +
                        '    <li><a href="#"><i class="glyphicon glyphicon-eye-open" style="color:#006699"></i> Ver</a></li>' +
                        '    <li><a href="#" title="Eliminar Empleado" onClick=""><i style="color:red;" class="glyphicon glyphicon-remove"></i> Eliminar</a></li>' +
                        '    </ul>' +
                        '</div>' +
                        '</span>';
                // '<a href="#" class="btn btn-block btn-primary btn-sm" style="width: 80%;" data-toggle="modal" data-target="#modalEditEmpelado" onClick="selEmpleado(\'' + row.emp_id + '\');"><i class="fa fa-fw fa-edit"></i></a></td>';


            }

        }

    ],
    "columnDefs": [
    ],
    "order": [[0, "asc"]],
});



selEmpleado = function (idEmpleados) {


    $.ajax({
        type: "POST",
        url: baseurl + "index.php/empleado/get_empleadoById/" + idEmpleados,
        dataType: 'json',
        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function (res) {

            var sucursales = res.sucursales.data;
            var empleados = res.empleados;

            $('#mNombre').val(empleados.per_nombre);
            $('#mEmail').val(empleados.per_email);
            $('#mDocumento').val(empleados.per_documento);//select
            //ajax para traer todos los estados
            $('#mNacionalidad').val(empleados.per_nacionalidad);
            $('#mPassword').val(empleados.per_password);
            $('#mPerfilUsuario').val(empleados.per_perfilUsuario);
            $('#mIdPersona').val(empleados.per_id);
            $('#mLegajo').val(empleados.emp_legajo);
            $('#mCargo').val(empleados.emp_cargo);
            debugger;
            for (var i = 0; i < sucursales.length; i++) {

                $('#mSucursal').append($('<option>', {
                    value: sucursales[i].suc_id,
                    text: sucursales[i].suc_nombre
                }));

            }
            $('#mSucursal option[value='+empleados.suc_id+']').attr('selected','selected');


            $('#mImagen').val(res.cat_imagen);
        }
    });

};


$('#mbtnUpdPersona').click(function () {

    $.ajax({
        type: "POST",
        url: baseurl + "index.php/persona/updPersona",
        dataType: 'json',
        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
            per_nombre: $('#mNombre').val(),
            per_email: $('#mEmail').val(),
            per_documento: $('#mDocumento').val(),
            per_password: $('#mPassword').val(),
            per_Nacionalidad: $('#mNacionalidad').val(),
            per_id: $('#mIdPersona').val(),
            per_perfilUsuario: $('#mPerfilUsuario').val()},
        success: function (res) {


            var a = 0;
            $('#mbtnCerrarModal').click();

            location.reload();
        }
    });

});

         