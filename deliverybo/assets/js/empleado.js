
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
        {data: 'emp_cargo'},
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
                        '     <li><a href="#" title="Eliminar Producto" onClick="eliminarEmpleado(\'' + row.emp_id + '\',\'' + row.emp_idPersona + '\');"><i style="color:red;" class="glyphicon glyphicon-remove"></i> Eliminar</a></li>' +
                        '    </ul>' +
                        '</div>' +
                        '</span>';
                // '<a href="#" class="btn btn-block btn-primary btn-sm" style="width: 80%;" data-toggle="modal" data-target="#modalEditEmpleado" onClick="selEmpleado(\'' + row.emp_id + '\');"><i class="fa fa-fw fa-edit"></i></a></td>';


            }

        }

    ],
    "columnDefs": [
    ],
    "order": [[0, "asc"]],
});

function cargarSucursales(idEmpresa) {
    $("#mSucursal option").remove();

    
    $.ajax({
        type: "POST",
        url: baseurl + "index.php/empleado/get_Sucursales/" + idEmpresa,
        dataType: 'json',
        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function (res) {
            if (res.estado) {
               
                $.each(res.response.data, function (key, data) {
                    $("#mSucursal").append("<option value=" + data.suc_id + ">" + data.suc_nombre + "</option>");
                });
            } else {
                console.log(res.response)
            }
        },
        error: function (request, status, error) {
            console.log(error.message);

        }

    });
}


//$.ajax({
//    type: "POST",
//    url: baseurl + "index.php/sucursales/get_sucursales/1",
//    dataType: 'json',
//    data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
//    success: function (res) {
//        debugger;
//        $('#mSucursal').append($('<option>', {
//            value: res.suc_id,
//            text: res.suc_nombre
//
//        }));
//    }
//})
selEmpleado = function (idEmpleados) {


    $.ajax({
        type: "POST",
        url: baseurl + "index.php/empleado/get_empleadoById/" + idEmpleados,
        dataType: 'json',
        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function (res) {
            var empleados = res.empleados;
            $('#mNombre').val(empleados.per_nombre);
            $('#mEmail').val(empleados.per_email);
            $('#mDocumento').val(empleados.per_documento); //select
            //ajax para traer todos los estados
            $('#mNacionalidad').val(empleados.per_nacionalidad);
            $('#mPassword').val(empleados.per_password);
            $('#mPerfilUsuario').val(empleados.per_perfilUsuario);
            $('#mIdPersona').val(empleados.emp_idPersona);
            $('#mIdEmpleado').val(empleados.emp_id);
            $('#mLegajo').val(empleados.emp_legajo);
            $('#mCargo').val(empleados.emp_cargo);
            $('#imagen').attr('src', './assets/imagenes/empleado/' + empleados.emp_imagen);
//            $('#mImagen').val(res.cat_imagen);
        },
        error: function (request, status, error) {
            console.log(error.message);

        }
    });
};
function eliminarEmpleado(idEmpleado,idPersona){
     swal({
        title: "Esta seguro?",
        text: "Se eliminara el empleado",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, Eliminar !",
        cancelButtonText: "No, Cancelar!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
            function (isConfirm) {
                debugger;

                if (isConfirm) {
                    $.ajax({
                        type: "POST",
                        url: baseurl + "index.php/empleado/eliminar" ,
                        dataType: 'json',
                        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                         emp_idPersona: idPersona,
                         emp_id: idEmpleado
                        },
                        
                        success: function (res) {
                            debugger;

                            if (res.estado) {

                                swal({
                                    title: "Eliminado",
                                    text:  "El Empleado se a eliminado!",
                                    type:  "success",
                                },
                                        function () {
                                            location.reload();
                                        });

                            } else {
                                sweetAlert("Ocurrio un Error", res.response, "error");

                            }

                        },
                        error: function (request, status, error) {
                            debugger;
                            console.log(error);
                            sweetAlert("Ocurrio un Error Inesperado", error, "error");

                        }
                    });
                } else {
                    swal("Cancelado", "El Empleado no fue Eliminado", "error");
                }
            });
    
}

//$.validator.setDefaults({
//    submitHandler: function () {
//        alert("submitted!");
//    }
//});
$("#mbtnUpdEmpleado2").click(function () {
debugger;
    $.ajax({
        url: baseurl + "index.php/empleado/updEmpleado",
        type: 'post',
        dataType: 'json',
        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
            per_nombre: $('#mNombre').val(),
            per_email: $('#mEmail').val(),
            per_documento: $('#mDocumento').val(),
            per_password: $('#mPassword').val(),
            per_nacionalidad: $('#mNacionalidad').val(),
            per_id: $('#mIdPersona').val(),
            emp_id: $('#mIdEmpleado').val(),
            emp_legajo: $('#mLegajo').val(),
            emp_cargo: $('#mCargo').val(),
            emp_idSucursal: $('#mSucursal').val(),
            per_perfilUsuario:$('#mPerfilUsuario').val()


        },
        processData: false,
        contentType: false,
        success: function (res) {
            debugger;
            
               if (res.estado) {

                swal({
                    title: "Los Datos Fueron Guardados!",
                    text: "haga click!",
                    type: "success",
                },
                        function () {
                             $('#mbtnCerrarModal').click();
                                location.reload();
                        });


            } else {
                sweetAlert("Oops...", JSON.stringify(res.response), "error");
                console.log(res.response);

            }
                  
        },
        error: function (request, status, error) {
            debugger;
             sweetAlert("Oops...", "Ocurrio un Error Inesperado!", "error");
            console.log(error.message);

        }
    });


});


$('#mCerrarModal,#mbtnCerrarModal').click(function () {

    $('#mNombre').val('');
    $('#mEmail').val('');
    $('#mDocumento').val(''); //select
    //ajax para traer todos los estados
    $('#mPassword').val('');   
    $('#mIdPersona').val('');
    $('#mIdEmpleado').val('');
    $('#mLegajo').val('');


})

//
//$("#FormCategoria").validate({
//    rules: {
//
//        mNombre: {
//            required: true,
//            minlength: 4
//        },
//        password: {
//            required: true,
//            minlength: 5
//        }
//    },
//    messages: {
//
//        mNombre: {
//            required: "Please enter a username",
//            minlength: "Your username must consist of at least 2 characters"
//        }
//    },
//    errorElement: "em",
//    errorPlacement: function (error, element) {
//        // Add the `help-block` class to the error element
//        error.addClass("help-block");
//
//        if (element.prop("type") === "checkbox") {
//            error.insertAfter(element.parent("label"));
//        } else {
//            error.insertAfter(element);
//        }
//    },
//    highlight: function (element, errorClass, validClass) {
//        $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
//    },
//    unhighlight: function (element, errorClass, validClass) {
//        $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
//    }
//});

//INIICIALIZAR

cargarSucursales(1);