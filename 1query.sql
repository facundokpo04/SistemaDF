select ppp.ppp_idPromoP,pp.pp_id,pp.pp_idVariedad,v.var_nombre,pp.pp_aclaracion,p.prod_id,p.prod_nombre,p.prod_descripcionProducto,p.prod_precioBase,p.prod_idCategoria
from productopromopedido ppp
Left Join productopedido pp ON ppp.ppp_idProductoP = pp.pp_id
left join producto p  ON pp.pp_idProducto = p.prod_id
left Join variedad v ON v.var_id=pp.pp_idVariedad
