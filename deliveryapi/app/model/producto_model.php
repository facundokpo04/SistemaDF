<?php

namespace App\Model;

use App\Lib\Response;

class ProductoModel {

    private $db;
    private $table = 'producto';
    private $response;

    public function __CONSTRUCT($db) {
        $this->db = $db;
        $this->response = new Response();
    }

    public function getAll() {
        $data = $this->db->from($this->table)
                ->orderBy('prod_id DESC')
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

    public function getAllCat($idCategoria) {
        $data = $this->db->from($this->table)
                ->where('prod_idCategoria', $idCategoria)
                ->orderBy('prod_id DESC')
                ->fetchAll();

        $total = $this->db->from($this->table)
                        ->where('prod_idCategoria', $idCategoria)
                        ->select('COUNT(*) Total')
                        ->fetch()
                ->Total;

        return [
            'data' => $data,
            'total' => $total
        ];
    }

    public function getAllSuc($idSucursal) {
        $data = $this->db->from($this->table)
                ->where('prod_idSucursal', $idSucursal)
                ->orderBy('prod_id DESC')
                ->fetchAll();

        $total = $this->db->from($this->table)
                        ->where('prod_idSucursal', $idSucursal)
                        ->select('COUNT(*) Total')
                        ->fetch()
                ->Total;

        return [
            'data' => $data,
            'total' => $total
        ];
    }

    public function insert($data) {


        $query = $this->db->insertInto($this->table, $data)
                ->execute();

        return $this->response->SetResponse(true, 'Exito', $query);
    }

    public function get($id) {
        return $this->db->from($this->table)
                        ->where('prod_id', $id)
                        ->fetch();
    }

    public function update($data, $id) {

        $this->db->update($this->table)
                ->set($data)
                ->where('prod_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function delete($id) {
        $this->db->deleteFrom($this->table)
                ->where('prod_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function insertComp($idProducto, $idComponente) {

        $data = array(
            'cp_idProducto' => $idProducto,
            'cp_idComponente' => $idComponente
        );
            
        $query = $this->db->insertInto('componenteproducto', $data)
                ->execute();

        return $this->response->SetResponse(true, 'Exito', $query);
    }

    public function deleteComp($idProducto, $idComponente) {

        $this->db->deleteFrom('componenteproducto')
                ->where(array('cp_idProducto'=>$idProducto,'cp_idComponente'=>$idComponente))
                ->execute();

        return $this->response->SetResponse(true);
    }

}
