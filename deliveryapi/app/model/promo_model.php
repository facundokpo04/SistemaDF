<?php
namespace App\Model;

use App\Lib\Response;

class PromoModel
{
    private $db;
    private $table = 'promo';
    private $response;
    private $url ="http://35.184.187.29/delBo/assets/assets/imagenes/promos" ;
    
    public function __CONSTRUCT($db)
    {
        $this->db = $db;
        $this->response = new Response();
    }
    
     public function getUrl() {
            return urlencode($this->url);
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
        
        $query = $this->db->insertInto($this->table, $data)
                 ->execute();
        
          return $this->response->SetResponse(true, 'Exito', $query);
    }
      public function get($id)
    {
        return $this->db->from($this->table)
                        ->select('pro_id,pro_nombre,pro_descripcion,pro_descuento,DATE_FORMAT(pro_FechaInicio, "%d/%m/%Y") as pro_FechaInicio,DATE_FORMAT(pro_FechaFin, "%d/%m/%Y") as pro_FechaFin,pro_imagen')
                        ->where('pro_id', $id)
                        ->fetch();
        
    }
      public function update($data,$id)
    {      $this->db->update($this->table)
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
    
    public function insertProd($data) {


        $query = $this->db->insertInto('productopromo', $data)
                ->execute();

        return $this->response->SetResponse(true, 'Exito', $query);
    }
    
    public function deleteProd($idPromo, $idProducto) {

       $query =  $this->db->deleteFrom('productopromo')
                ->where(array('ppro_idPromo' => $idPromo, 'ppro_idProducto' => $idProducto))
                ->execute();

       return $this->response->SetResponse(true, 'Exito', $query);
    }
    
     public function deleteProdId($idPPromo) {

       $query =  $this->db->deleteFrom('productopromo')
                 ->where('ppro_id', $idPPromo)
                ->execute();

       return $this->response->SetResponse(true, 'Exito', $query);
    }
    
   public function getAllProd($idPromo) {

//revisar la query
        return $this->db->from("productopromo pp")
                        ->select("p.prod_id,p.prod_nombre,p.prod_descripcionProducto,p.prod_precioBase,p.prod_imagen")
                        ->leftJoin('producto p ON pp.ppro_idProducto = p.prod_id')
                        ->where('pp.ppro_idPromo', $idPromo)
                        ->fetchAll();
    }

}
