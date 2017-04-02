<?php

namespace App\Model;

use App\Lib\Response;

class PromoPedidoModel {

    private $db;
    private $table = 'promopedido';
    private $response;

    // private $url ="http://localhost/proyecto2/SistemaDF/deliverybo/assets/imagenes/pedidoencabezado" ;

    public function __CONSTRUCT($db) {
        $this->db = $db;
        $this->response = new Response();
    }


    public function getAll() {
        $data = $this->db->from($this->table)
                ->orderBy('ppro_id DESC')
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

    public function getAllped($idPedido) {
        
        // trae todas las promospedidas con sus productospedidos
        

    }

    public function insert($data) {

        $query = $this->db->insertInto($this->table, $data)
                ->execute();

        return $this->response->SetResponse(true, 'Exito', $query);
    }

    public function get($id) {
        return $this->db->from($this->table)
                        ->where('ppro_id', $id)
                        ->fetch();
    }

    public function update($data, $id) {

        $this->db->update($this->table)
                ->set($data)
                ->where('ppro_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function delete($id) {
        $this->db->deleteFrom($this->table)
                ->where('ppro_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

}
