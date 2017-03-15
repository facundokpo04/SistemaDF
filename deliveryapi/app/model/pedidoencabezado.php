<?php

namespace App\Model;

use App\Lib\Response;

class PedidoEncabezadoModel {

    private $db;
    private $table = 'pedidoencabezado';
    private $response;

    // private $url ="http://localhost/proyecto2/SistemaDF/deliverybo/assets/imagenes/pedidoencabezado" ;

    public function __CONSTRUCT($db) {
        $this->db = $db;
        $this->response = new Response();
    }

//      public function getUrl() {
//            return urlencode($this->url);
//    }
    public function getAll() {
//        $data = $this->db->from($this->table)
//                         
//                         ->orderBy('pe_id DESC')
//                         ->fetchAll();


        $data = $this->db->from("pedidoencabezado pe")
                ->select("pe.pe_id,pe.pe_idEstado,pe.pe_cli_tel,p.per_nombre,p.per_documento,d.dir_telefonoFijo,d.dir_direccion,tr.relacion,tr.descripcion")
                ->leftJoin('persona p ON p.per_id = pe.pe_idPersona')
                ->leftJoin('direccion d ON d.dir_id = pe.pe_idDireccion')
                ->leftJoin('tablasrelacion tr ON pe.pe_idEstado = tr.valor')
                ->where("tr.relacion='pedidoestado'")
                
                ->orderBy('pe.pe_id ASC')
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


        $query = $this->db->insertInto($this->table, $data)
                ->execute();

        return $this->response->SetResponse(true, 'Exito', $query);
    }

    public function get($id) {
        return $this->db->from("pedidoencabezado pe")
                ->select("pe.pe_id,pe.pe_idEstado,pe.pe_cli_tel,p.per_nombre,p.per_documento,d.dir_telefonoFijo,d.dir_direccion,tr.relacion,tr.descripcion")
                ->leftJoin('persona p ON p.per_id = pe.pe_idPersona')
                ->leftJoin('direccion d ON d.dir_id = pe.pe_idDireccion')
                ->leftJoin('tablasrelacion tr ON pe.pe_idEstado = tr.valor')
               ->where('pe_id', $id)
                ->fetch();
    }

    public function getCliente($id) {
        
        return $this->db->from('persona p')
                        ->select('p.per_id,p.per_nombre,p.per_email,p.per_documento,p.per_celular,p.per_nacionalidad,d.dir_direccion,d.dir_telefonoFijo')
                        ->leftJoin('pedidoencabezado pe ON p.per_id = pe.pe_idPersona')
                        ->leftJoin('direccion d ON d.dir_id = pe.pe_idDireccion')
                        ->where('pe_id', $id)
                        ->fetch();
    }

    public function update($data, $id) {

        $this->db->update($this->table)
                ->set($data)
                ->where('pe_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function delete($id) {
        $this->db->deleteFrom($this->table)
                ->where('pe_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

}
