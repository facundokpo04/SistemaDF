
debugger;

getUsuario = function () {
    $.ajax({
        type: "POST",
        url: baseurl + "index.php/auth/getUser",
        dataType: 'json',
        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function (res) {
            debugger;


            $('#nombreEmp1').append(res.NombreCompleto);

            $('#detalleEmp').append(res.NombreCompleto+'Administrador' +
                    '<small>Administrador del Sistema</small>');
            $('#nombreEmp2').append(res.NombreCompleto);
            getUsuarioimg(res.id);



        },
        error: function (request, status, error) {
            debugger;
            console.log(error.message);
            //direccionar al login?
            

        }
    });


}
getUsuarioimg = function (idEmpleado) {
    $.ajax({
        type: "POST",
        url: baseurl + "index.php/empleado/get_empleadoById/"+ idEmpleado,
        dataType: 'json',
        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function (res) {
debugger;

         $('#empimg').attr('src', './assets/imagenes/empleado/' + res.response.emp_imagen);
         $('#empimg1').attr('src', './assets/imagenes/empleado/' + res.response.emp_imagen);
         $('#empimg2').attr('src', './assets/imagenes/empleado/' + res.response.emp_imagen);



        },
        error: function (request, status, error) {
            debugger;
           
            console.log(error.message);
            
            

        }
    });


}; 
getUsuario();



  