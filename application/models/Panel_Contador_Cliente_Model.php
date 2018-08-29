<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_Contador_Cliente_Model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        
    }
    public function getTotalClientesAsignados($id)
    {
        $cliente = $this->db->select('COUNT(id)')
                  ->from("contadores_asignacion_cliente")
                  ->where("idContador",$id)
                  ->get()
                  ->result_array()[0]["COUNT(id)"];
        return  $cliente;
        
    }
    public function getContadorEmpresaById($id)
    {
        $empresas =array();
        $datosContadores = array();

        $empresa = (int)$this->db->select('COUNT(rfc)')
            ->from("empresa")
            ->where("id_usuario",$id)
            ->get()
            ->result_array()[0]["COUNT(rfc)"];
        
        $empresas = array(
            "numEmpresas" => $empresa
        );
        
        return $empresas ;
        
    }

    public function getInfoClientesById($id)
    {
        $Clientes = $this->db->select('id,nombre,apellido,email,telefono')
        ->from("usuario")
        ->where("id",$id)
        ->get()
        ->result_array();
        foreach ($Clientes as $key => $value) 
        {
            $Clientes[$key]["info_empresas"] = $this->getContadorEmpresaById($value['id']);
        }
        $usuarios= array(
            "cliente" => $Clientes
        );
        return $Clientes;
    }
    public function getTodosCliente($id)
    {   
        $Clientes = array();
        $idCliente = $this->db->select('idCliente')
            ->from("contadores_asignacion_cliente")
            ->where("idContador",$id)
            ->get()
            ->result_array();
        foreach ($idCliente as $key => $value) 
        {
            $cliente[] = $this->getInfoClientesById($idCliente[]['idCliente']);
        }
        $usuarios= array(
            "cliente" => $Clientes
        );
        return $Clientes;
    }   

    
}

/* End of file Panel_Contador_Cliente_Model.php */
