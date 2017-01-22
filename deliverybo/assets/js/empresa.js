



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
            

        }
    });

};


iniciar(1);
