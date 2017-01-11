<?php

use App\Lib\Response;

class CategoriaModel
{
    private $db;
    private $table = 'categoria';
    private $response;
    
    public function __CONSTRUCT($db)
    {
        $this->db = $db;
        $this->response = new Response();
    }
    
    public function getAll($l, $p)
    {
        $data = $this->db->from($this->table)
                         ->limit($l)
                         ->offset($p)
                         ->orderBy('cat_id DESC')
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
    
      public function update($data,$id)
    {
       
        
        $this->db->update($this->table, $data, $id)
                 ->execute();
        
        return $this->response->SetResponse(true);
    }
    
     public function eliminar($id)
    {
        $this->db->deleteFrom($this->table, $id)
                 ->execute();
        
        return $this->response->SetResponse(true);
    } 
    
    
}
