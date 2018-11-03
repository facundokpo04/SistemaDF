<?php

namespace App\Model;

use App\Lib\Response;

class AderezosModel {

    private $db;
    private $table = 'aderezos';
    private $response;

    public function __CONSTRUCT($db) {
        $this->db = $db;
        $this->response = new Response();
    }

    //sin paginacion
    public function getAll1($l, $p) {
        $data = $this->db->from($this->table)
                ->orderBy('ade_id DESC')
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

//SOLO aderezos HABILITADOS
    public function getAll2($l, $p) {

        $data = $this->db->from($this->table)
                ->where('ade_idEstado', 1)
                ->orderBy('ade_id DESC')
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

    public function insert($data) {

        $this->db->insertInto($this->table, $data)
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function get($id) {
        return $this->db->from($this->table)
                        ->where('ade_id', $id)
                        ->fetch();
    }

    public function update($data, $id) {

        $this->db->update($this->table)
                ->set($data)
                ->where('ade_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function delete($id) {
        $this->db->deleteFrom($this->table)
                ->where('ade_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

}
