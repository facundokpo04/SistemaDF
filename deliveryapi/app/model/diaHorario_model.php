<?php

namespace App\Model;

use App\Lib\Response;

class DiahorarioModel {

    private $db;
    private $table = 'diahorario';
    private $response;

    public function __CONSTRUCT($db) {
        $this->db = $db;
        $this->response = new Response();
    }

    public function getAll($idSucursal) {
        $data = $this->db->from($this->table)
                   ->where('dh_idSucursal', $idSucursal)
                ->orderBy('dh_id DESC')
                ->fetchAll();

        $total = $this->db->from($this->table)
                        ->where('dh_idSucursal', $idSucursal)
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

    public function get($id) {
        return $this->db->from($this->table)
                        ->where('dh_id', $id)
                        ->fetch();
    }

    public function update($data, $id) {

        $this->db->update($this->table)
                ->set($data)
                ->where('dh_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function delete($id) {
        $this->db->deleteFrom($this->table)
                ->where('dh_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

}
