<?php

namespace App\Model;

use App\Lib\Response;

class EmpleadoModel {

    private $db;
    private $table = 'empleado';
    private $response;

    public function __CONSTRUCT($db) {
        $this->db = $db;
        $this->response = new Response();
    }

    public function getAll($l, $p) {
      
        $data = $this->db->from($this->table.' e')
                ->select('p.*,s.*')
                ->innerJoin('persona p ON e.emp_idPersona =  p.per_id')
                ->innerJoin('sucursal s ON e.emp_idSucursal =  s.suc_id')
                ->innerJoin('persona p ON e.emp_idPersona =  p.per_id')
                ->innerJoin('empresa emp ON s.suc_idEmpresa =  emp.emp_id')
                ->limit($l)
                ->offset($p)
                ->orderBy('e.emp_id DESC')
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
        return $this->db->from($this->table . ' e')
                        ->select('p.*,s.*,emp.*')
                        ->innerJoin('persona p ON e.emp_idPersona =  p.per_id')
                        ->innerJoin('sucursal s ON e.emp_idSucursal =  s.suc_id')
                        ->innerJoin('persona p ON e.emp_idPersona =  p.per_id')
                        ->leftJoin('empresa emp ON s.suc_idEmpresa =  emp.emp_id')
                        ->where('e.emp_id', $id)
                        ->fetch();
    }

    public function update($data, $id) {

        $this->db->update($this->table)
                ->set($data)
                ->where('emp_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

    public function delete($id) {
        $this->db->deleteFrom($this->table)
                ->where('emp_id', $id)
                ->execute();

        return $this->response->SetResponse(true);
    }

}
