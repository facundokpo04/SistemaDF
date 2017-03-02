<?php
namespace App\Model;

use App\Lib\Response;

class ComponenteModel
{
    private $db;
    private $table = 'componente';
    private $response;
    private $url ="http://localhost/proyecto2/SistemaDF/deliverybo/assets/imagenes/componentes" ;
    
    public function __CONSTRUCT($db)
    {
        $this->db = $db;
        $this->response = new Response();
    }
    
      
      public function getUrl() {
            return urlencode($this->url);
    }
    public function getAll($l, $p)
    {
        $data = $this->db->from($this->table)
                         ->limit($l)
                         ->offset($p)
                         ->orderBy('com_id DESC')
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
                        ->where('com_id', $id)
                        ->fetch();
        
    }
      public function update($data,$id)
    {
        
        $this->db->update($this->table)
                 ->set($data)
                 ->where('com_id', $id)
                 ->execute();
        
        return $this->response->SetResponse(true);
    }
    
     public function delete($id)
    {
        $this->db->deleteFrom($this->table)
                ->where('com_id', $id)
                 ->execute();
        
        return $this->response->SetResponse(true);
    } 
    
    
}
