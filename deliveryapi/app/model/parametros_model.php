<?php

namespace App\Model;

use App\Lib\Response;

class ParametrosModel {

    private $db;
    private $table = 'parametros';
    private $response;

    public function __CONSTRUCT($db) {
        $this->db = $db;
        $this->response = new Response();
    }

    public function getAll($idSucursal) {
        $data = $this->db->from($this->table)
                ->where('par_idSucursal', $idSucursal)
                ->orderBy('par_id DESC')
                ->fetchAll();

        $total = $this->db->from($this->table)
                        ->where('par_idSucursal', $idSucursal)
                        ->select('COUNT(*) Total')
                        ->fetch()
                ->Total;

        return [
            'data' => $data,
            'total' => $total
        ];
    }

    public function insert($data) {

        var_dump($data);
        $this->db->insertInto($this->table, $data)
                   ->execute();

        return $this->response->SetResponse(true);
    }

    public function get($idSucursal) {
        return $this->db->from($this->table)
                        ->where('par_idSucursal', $idSucursal)
                        ->fetch();
    }

    public function update($data, $idSucursal) {

        $this->db->update($this->table)
                ->set($data)
                ->where('par_idSucursal', $idSucursal)
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function delete($idSucursal) {
        $this->db->deleteFrom($this->table)
                ->where('par_idSucursal', $idSucursal)
                ->execute();

        return $this->response->SetResponse(true);
    }

}


