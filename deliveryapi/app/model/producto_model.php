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

    public function insertComp($data) {


        $query = $this->db->insertInto('componenteproducto', $data)
                ->execute();

        return $this->response->SetResponse(true, 'Exito', $query);
    }

    public function deleteComp($idProducto, $idComponente) {



        $this->db->deleteFrom('componenteproducto')
                ->where(array('cp_idProducto' => $idProducto, 'cp_idComponente' => $idComponente))
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function getAllComp($idProducto) {


        return $this->db->from("componente c")
                        ->select("c.com_id,c.com_precio,c.com_nombre,c.com_descripcion,c.com_imagen")
                        ->leftJoin('componenteproducto p ON c.com_id = p.cp_idComponente')
                        ->where('p.cp_idProducto', $idProducto)
                        ->fetchAll();
    }

    public function getAllCate() {


        return $this->db->from("Categoria")
                        ->orderBy('cat_nombre')
                        ->fetchAll();
    }

    public function getAllNotComp($idProducto) {

                 
            return $this->db->from("componente c")                     
                        ->where('c.com_id NOT IN (SELECT cp_idComponente FROM componenteproducto p WHERE cp_idProducto = ?)', $idProducto )
                        ->fetchAll();
    }

    public function getAllVar($idProducto) {


        return $this->db->from("variedad v")
                        ->select("v.var_id,v.var_nombre ,v.var_descripcion,v.var_tipo,v.var_precio")
                        ->where('v.var_idProducto', $idProducto)
                        ->fetchAll();
    }

}
