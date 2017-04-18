
select pe.*,p.per_nombre,p.per_documento,d.dir_telefonoFijo,d.dir_direccion,tr.relacion,tr.descripcion
from pedidoencabezado pe
left Join persona p ON p.per_id = pe.pe_idPersona
left Join direccion d ON d.dir_id = pe.pe_idDireccion
left Join tablasrelacion tr ON pe.pe_idEstado = tr.valor
where tr.relacion='pedidoestado' and pe.pe_fechaPedido  BETWEEN '2017-04-17 00:00:00' AND '2017-04-17 23:59:59'