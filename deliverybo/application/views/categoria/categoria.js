


$.post(baseurl + "/application/controllers/categoria/getCategorias",
        function (data) {
            //alert(data);
            var p = JSON.parse(data);
            $.each(p, function (i, item) {
                $('#tblCategoria tbody').append(
                        '<tr>' +
                        '	<td>' + item.cat_id + '</td>' +
                        '	<td>' + item.cat_nombre + '</td>' +
                        '	<td>' + item.cat_descripcion + '</td>' +
                        '	<td><a href="#" class="btn btn-block btn-primary btn-sm" style="width: 80%;" data-toggle="modal" data-target="#modalEditPersona" onClick="selPersona(\'' + item.cat_id + '\);"><i class="fa fa-fw fa-edit"></i></a></td>' +
                        '</tr>'
                        );
            });
        });
        
         