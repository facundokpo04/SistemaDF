<?php

namespace App\Model;

use App\Lib\Response;

class DatoContactoModel {

    private $db;
    private $table = 'datocontacto';
    private $response;

    public function __CONSTRUCT($db) {
        $this->db = $db;
        $this->response = new Response();
    }

    public function insert($data) {

        $query = $this->db->insertInto($this->table, $data)
                ->execute();


        return $this->response->SetResponse(true, 'Exito', $query);
    }

    public function insertTelCon($data) {

        $query = $this->db->insertInto('telefonocontacto', $data)
                ->execute();
        return $this->response->SetResponse(true, 'Exito', $query);
    }

    public function updateTelCon($data, $idtcon) {
        $this->db->update('telefonocontacto')
                ->set($data)
                ->where('tcon_id', $idtcon)
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function deleteTelCon($idtcon) {
        $this->db->deleteFrom('telefonocontacto')
                ->where('tcon_id', $idtcon)
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function getAllTelCon($idSucursal) {
        return $this->db->from("telefonocontacto tc")
                        ->select("dc.dcon_idSucursal,tc.tcon_id,tc.tcon_numero,tc.tcon_descripcion,tc.tcon_tipo,tc.tcon_idDatoContacto")
                        ->leftJoin('datocontacto dc  ON dc.dcon_id = tc.tcon_idDatoContacto')
                        ->where('dc.dcon_idSucursal', $idSucursal)
                        ->fetchAll();
    }

    public function get($id) {
        return $this->db->from($this->table)
                        ->where('dcon_id', $id)
                        ->fetch();
    }

    public function getDcSuc($idSucursal) {
        return $this->db->from($this->table)
                        ->where('dcon_idSucursal', $idSucursal)
                        ->fetch();
    }

    public function update($data, $id) {
        $this->db->update($this->table)
                ->set($data)
                ->where('dcon_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function delete($id) {
        $this->db->deleteFrom($this->table)
                ->where('dcon_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

}
