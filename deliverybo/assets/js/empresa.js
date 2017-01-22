



iniciar = function (idEmpresa) {

    $.ajax({
        type: "POST",
        url: baseurl + "index.php/empresa/get_EmpresaById/" + idEmpresa,
        dataType: 'json',
        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function (res) {

            $('#idEmpresa').val(res.idEmpresa);
            $('#txtRazonSocial').val(res.razonSocial);
            $('#txtRubro').val(res.Rubro);
            $('#txtCuit').val(res.cuilt);
            $('#txtDomicilio').val(res.Domicilio);
            $('#txtTelefono').val(res.telefono);
            $('#txtEmail').val(res.Email);//select
            //ajax para traer todos los estados
            $('#txtPais').val(res.Pais);
             $('#imagen').attr('src', '../assets/imagenes/empresa/'+res.logo);;
            


        }
    });

};

$('#btnUpdEmpresa').click(function () {
    debugger;
    var inputFile = $('input#txtLogo');

    var fileToUpload = inputFile[0].files[0];
    // make sure there is file to upload

    // provide the form data
    // that would be sent to sever through ajax
    if (fileToUpload !== 'undefined') {
        var formData = new FormData();
        formData.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
        formData.append('razonSocial', $('#txtRazonSocial').val());
        formData.append('Rubro', $('#txtRubro').val());
        formData.append('cuilt', $('#txtCuit').val());
        formData.append('Domicilio', $('#txtDomicilio').val());
        formData.append('telefono', $('#txtTelefono').val());
        formData.append('Email', $('#txtEmail').val());
        formData.append('Pais', $('#txtPais').val());
        formData.append('idEmpresa', $('#idEmpresa').val());
        formData.append('logo', fileToUpload);

        // now upload the file using $.ajax
        $.ajax({
            url: baseurl + "index.php/empresa/updEmpresa",
            type: 'post',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
             

                location.reload();
            }
        });
    } else {
        $.ajax({
            type: "POST",
            url: baseurl + "index.php/empresa/updEmpresa",
            dataType: 'json',
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                razonSocial: $('#txtRazonSocial').val(),
                Rubro: $('#txtRubro').val(),
                cuilt: $('#txtCuit').val(),
                Domicilio: $('#txtDomicilio').val(),
                telefono: $('#txtTelefono').val(),
                Email: $('#txtEmail').val(),
                Pais: $('#txtPais').val(),
                idEmpresa: $('#idEmpresa').val()
               
            },
            success: function (res) {


               

                location.reload();
            }
        });


    }



});
iniciar(1);
