<?php
namespace App\Model;

use App\Lib\Response;

class PromoModel
{
    private $db;
    private $table = 'promo';
    private $response;
    private $url ="http://localhost/proyecto2/SistemaDF/deliverybo/assets/imagenes/promos" ;
    
    public function __CONSTRUCT($db)
    {
        $this->db = $db;
        $this->response = new Response();
    }
    
    public function getAll()
    {
        $data = $this->db->from($this->table)
                         ->select('pro_id,pro_nombre,pro_descripcion,pro_descuento,DATE_FORMAT(pro_FechaInicio, "%d/%m/%Y") as pro_FechaInicio,DATE_FORMAT(pro_FechaFin, "%d/%m/%Y") as pro_FechaFin,pro_imagen')
                         ->orderBy('pro_id DESC')
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
                        ->select('pro_id,pro_nombre,pro_descripcion,pro_descuento,DATE_FORMAT(pro_FechaInicio, "%d/%m/%Y") as pro_FechaInicio,DATE_FORMAT(pro_FechaFin, "%d/%m/%Y") as pro_FechaFin,pro_imagen')
                        ->where('pro_id', $id)
                        ->fetch();
        
    }
      public function update($data,$id)
    {
        
        $this->db->update($this->table)
                 ->set($data)
                 ->where('pro_id', $id)
                 ->execute();
        
        return $this->response->SetResponse(true);
    }
    
     public function delete($id)
    {
        $this->db->deleteFrom($this->table)
                ->where('pro_id', $id)
                 ->execute();
        
        return $this->response->SetResponse(true);
    } 
    
    
}
