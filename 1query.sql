select p.prod_id,p.prod_nombre,p.prod_descripcionProducto,p.prod_precioBase,p.prod_imagen
from productopromo pp
Left Join producto p
ON pp.ppro_idProducto = p.prod_id
