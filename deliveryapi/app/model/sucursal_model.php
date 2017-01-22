<?php

namespace App\Model;

use App\Lib\Response;

class SucursalModel {

    private $db;
    private $table = 'sucursal';
    private $response;

    public function __CONSTRUCT($db) {
        $this->db = $db;
        $this->response = new Response();
    }

    public function getAll($idEmpresa) {
        $data = $this->db->from($this->table)
                ->where('suc_idEmpresa', $idEmpresa)
                ->orderBy('suc_id DESC')
                ->fetchAll();

        $total = $this->db->from($this->table)
                        ->where('suc_idEmpresa', $idEmpresa)
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
                        ->where('suc_id', $id)
                        ->fetch();
    }

    public function update($data, $id) {

        $this->db->update($this->table)
                ->set($data)
                ->where('suc_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function delete($id) {
        $this->db->deleteFrom($this->table)
                ->where('suc_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

}
