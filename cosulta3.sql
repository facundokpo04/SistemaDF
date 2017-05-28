select  c.*,count(p.prod_id) as cantProd
from categoria c 
left Join producto p ON p.prod_idCategoria = c.cat_id
where c.cat_idEstado = 1
group by c.cat_id
               