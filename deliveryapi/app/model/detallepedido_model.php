<?php

namespace App\Model;

use App\Lib\Response;

class DetallePedidoModel {

    private $db;
    private $table = 'detallepedido';
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
        $data = $this->db->from($this->table)
                ->orderBy('dp_id DESC')
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
        
        
        $resultado = array();

        $data = $this->db->from("detallepedido dp")
                ->select("dp_id,dp_Cantidad,dp_PrecioUnitario,dp_idPedidoEncabezado,p.prod_nombre,p.prod_codigoProducto,p.prod_precioBase,v.var_nombre,v.var_precio")
                ->leftJoin('productopedido pp ON dp.dp_idProductoPedido = pp.pp_id')
                ->leftJoin('producto p ON p.prod_id = pp.pp_idProducto')
                ->leftJoin('variedad v ON v.var_id = pp.pp_idVariedad')
                ->where('dp_idPedidoEncabezado', $idPedido)
                ->fetchAll();
        
        foreach($data as $d){
            
           $componentes = $this->db->from("componenteppedido cp")
                ->select("cpp_id,cpp_idProductoPedido,c.com_precio,c.com_nombre")
                ->leftJoin('componente c ON cp.cpp_idComponente=c.com_id')              
                ->where('cpp_idProductoPedido', $d->dp_idProductoPedido)
                ->fetchAll();
//           
           $item = [
               'producto' => $d,
               'componentes'=>$componentes
           ];
           array_push($resultado,$item);
           
//           
//select cpp_id,cpp_idProductoPedido,c.com_precio,c.com_nombre from componenteppedido cp
//left join componente c ON cp.cpp_idComponente=c.com_id
//where cp.cpp_idProductoPedido = 6
        }        
        return $resultado;
        
//         return [
//            'data' => $data,
//            'componentes' => $componentes
//        ];


//select dp_id,dp_Cantidad,dp_PrecioUnitario,dp_idPedidoEncabezado,p.prod_nombre,p.prod_codigoProducto,p.prod_precioBase,v.var_nombre,v.var_precio from
//detallepedido dp
//left join productopedido pp ON dp.dp_idProductoPedido = pp.pp_id
//left join producto p ON p.prod_id = pp.pp_idProducto
//left join variedad v ON v.var_id = pp.pp_idVariedad
//where dp_idPedidoEncabezado = 13
    }

    public function insert($data) {

        $query = $this->db->insertInto($this->table, $data)
                ->execute();

        return $this->response->SetResponse(true, 'Exito', $query);
    }

    public function get($id) {
        return $this->db->from($this->table)
                        ->where('dp_id', $id)
                        ->fetch();
    }

    public function update($data, $id) {

        $this->db->update($this->table)
                ->set($data)
                ->where('dp_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function delete($id) {
        $this->db->deleteFrom($this->table)
                ->where('dp_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

}
