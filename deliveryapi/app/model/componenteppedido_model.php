<?php
namespace App\Model;

use App\Lib\Response;

class ComponentePPedidoModel
{
    private $db;
    private $table = 'componenteppedido';
    private $response;
   // private $url ="http://localhost/proyecto2/SistemaDF/deliverybo/assets/imagenes/componenteppedido" ;
     
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
                       
                         ->orderBy('cpp_id DESC')
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
        
        $this->db->insertInto($this->table, $data)
                 ->execute();
        
        return $this->response->SetResponse(true);
    }
      public function get($id)
    {
        return $this->db->from($this->table)
                        ->where('cpp_id', $id)
                        ->fetch();
        
    }
      public function update($data,$id)
    {
        
        $this->db->update($this->table)
                 ->set($data)
                 ->where('cpp_id', $id)
                 ->execute();
        
        return $this->response->SetResponse(true);
    }
    
     public function delete($id)
    {
        $this->db->deleteFrom($this->table)
                ->where('cpp_id', $id)
                 ->execute();
        
        return $this->response->SetResponse(true);
    } 
    
    
}
