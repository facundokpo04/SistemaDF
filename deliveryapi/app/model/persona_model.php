<?php

namespace App\Model;

use App\Lib\Response;

class PersonaModel {

    private $db;
    private $table = 'persona';
    private $response;

    public function __CONSTRUCT($db) {
        $this->db = $db;
        $this->response = new Response();
    }

    public function getAll($l, $p) {
        $data = $this->db->from($this->table)
                ->limit($l)
                ->offset($p)
                ->orderBy('per_id DESC')
                ->fetchAll();

        $total = $this->db->from($this->table)
                        ->select('COUNT(*) Total')
                        ->fetch()
                ->Total;

        return [
            'data' => $data,
            'total' => $total
        ];
    }

    public function getAlldir($idPersona) {
        return $this->db->from('direccion')
                        ->where('dir_idPersona', $idPersona)
                        ->orderBy('dir_id DESC')
                        ->fetchAll();
    }

    public function insert($data) {     
    
        $query = $this->db->insertInto($this->table, $data)
                ->execute();


        return $this->response->SetResponse(true, 'Exito', $query);
    }

    public function get($id) {
        return $this->db->from($this->table)
                        ->where('per_id', $id)
                        ->fetch();
    }

    public function update($data, $id) {

        $query = $this->db->update($this->table)
                ->set($data)
                ->where('per_id', $id)
                ->execute();

        return $this->response->SetResponse(true, 'Exito', $query);
    }

    public function delete($id) {
        $this->db->deleteFrom($this->table)
                ->where('per_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

}
