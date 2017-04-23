select ppp.*,pp.*,p.*,v.*
from productopromopedido ppp
left join productopedido pp ON ppp.ppp_idProductoP  = pp.pp_id
left join producto p ON p.prod_id = pp.pp_idProducto
left join variedad v ON v.var_id = pp.pp_idVariedad

where ppp.ppp_idPromoP = 1
