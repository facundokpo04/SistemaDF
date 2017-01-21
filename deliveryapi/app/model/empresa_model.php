<?php
namespace App\Model;

use App\Lib\Response;

class EmpresaModel
{
    private $db;
    private $table = 'empresa';
    private $response;
    
    public function __CONSTRUCT($db)
    {
        $this->db = $db;
        $this->response = new Response();
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
                        ->where('idEmpresa', $id)
                        ->fetch();
        
    }
      public function update($data,$id)
    {
        
        $this->db->update($this->table)
                 ->set($data)
                 ->where('idEmpresa', $id)
                 ->execute();
        
        return $this->response->SetResponse(true);
    }
    
     public function delete($id)
    {
        $this->db->deleteFrom($this->table)
                ->where('idEmpresa', $id)
                 ->execute();
        
        return $this->response->SetResponse(true);
    } 
    
    
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

