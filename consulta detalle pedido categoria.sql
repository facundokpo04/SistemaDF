
select dp_id,dp_Cantidad,dp_PrecioUnitario,dp_idPedidoEncabezado,pp.*,p.prod_nombre,p.prod_codigoProducto,p.prod_precioBase,p.prod_idCategoria,v.var_nombre,v.var_precio,c.cat_nombre
from detallepedido dp
left Join  productopedido pp ON dp.dp_idProductoPedido = pp.pp_id
left Join producto p ON p.prod_id = pp.pp_idProducto
left Join categoria c ON p.prod_idCategoria = c.cat_id
left Join variedad v ON v.var_id = pp.pp_idVariedad
where dp_idPedidoEncabezado=13
                