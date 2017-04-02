<?php
namespace App\Model;

use App\Lib\Response;

class ProductoPedidoModel
{
    private $db;
    private $table = 'productopedido';
    private $response;
   // private $url ="http://localhost/proyecto2/SistemaDF/deliverybo/assets/imagenes/productopedido" ;
     
    public function __CONSTRUCT($db)
    {
        $this->db = $db;
        $this->response = new Response();
    }
    
      
//      public function getUrl() {
//            return urlencode($this->url);
//    }
    public function getAll()
    {
        $data = $this->db->from($this->table)
                        
                         ->orderBy('pp_id DESC')
                         ->fetchAll();
        
        $total = $this->db->from($this->table)
                          ->select('COUNT(*) Total')
                          ->fetch()
                          ->Total;
        
        return [
            'data'  => $data,
            'total' => $total
        ];
    }
    
    public function insert($data)
    {
        
       // insertar un productoPedido
       $productop_id = $this->db->insertInto($this->table, [           
            'pp_precioBase' => $data['precioBase'],
            'pp_idProducto' => $data['idProducto'],
            'pp_idVariedad' => $data['idVariedad'], // No podemos asumir que esta data enviada desde el cliente es CORRECTA,
            'pp_precioCalc' => $data['precioCalc']
             //FALTA ACLARACION
             //ID PROMO EN 0 ESTE CASO
             ])->execute();
       //insertar los componentes del Ppedido
       foreach($data['componentes'] as $d){
            $this->db->insertInto('componenteppedido', [
                'cpp_idProductoPedido' => $productop_id,
                'cpp_idComponente' => $d['id_comp']                
            ])->execute();
        }
       
        
        return $this->response->SetResponse(true,'Exito',$productop_id);
        
        
    }
    
     public function insertprom($data)
    {
        
       // insertar un productoPedido
       $productop_id = $this->db->insertInto($this->table,$data)->execute();
         return $this->response->SetResponse(true,'Exito',$productop_id);
        
        
    }
      public function get($id)
    {
        return $this->db->from($this->table)
                        ->where('pp_id', $id)
                        ->fetch();
        
    }
      public function update($data,$id)
    {
        
        $this->db->update($this->table)
                 ->set($data)
                 ->where('pp_id', $id)
                 ->execute();
        
        return $this->response->SetResponse(true);
    }
    
     public function delete($id)
    {
        $this->db->deleteFrom($this->table)
                ->where('pp_id', $id)
                 ->execute();
        
        return $this->response->SetResponse(true);
    } 
    
    
}
