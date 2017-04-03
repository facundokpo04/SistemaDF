select dc.dcon_idSucursal,tc.tcon_id,tc.tcon_numero,tc.tcon_descripcion,tc.tcon_tipo,tc.tcon_idDatoContacto,dc.dcon_idSucursal
from  telefonocontacto tc
left Join datocontacto dc ON dc.dcon_id = tc.tcon_idDatoContacto
where dc.dcon_idSucursal = 6
