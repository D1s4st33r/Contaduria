<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_Admin_Cliente_Model extends CI_Model 
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getCuentaClientesEnSistema()
    {
        $Clientes = $this->db->select('COUNT(id)')
            ->from("usuario")
            ->where("roll",2)
            ->get()
            ->result_array()[0]["COUNT(id)"];
        
        return $Clientes;
    }
    public function getInfoClientes()
    {
        $Clientes = $this->db->select('id,nombre,apellido,email,telefono')
            ->from("usuario")
            ->where("roll",2)
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

    public function getContadorEmpresaById($id)
    {
        $empresas =array();
        $datosContadores = array();

        $empresa = (int)$this->db->select('COUNT(rfc)')
            ->from("empresa")
            ->where("id_usuario",$id)
            ->get()
            ->result_array()[0]["COUNT(rfc)"];
        if($empresa){
            $contadores = (int)$this->db->select('COUNT(id)')
            ->from("contadores_asignacion_cliente")
            ->where("idCliente",$id)
            ->get()
            ->result_array()[0]["COUNT(id)"];
            $rfcs = $this->db->select('rfc')
                ->from("empresa")
                ->where("id_usuario",$id)
                ->get()
                ->result_array();
            foreach ($rfcs as $key => $value) 
            {
                $contadores = $contadores + (int)$this->db->select('COUNT(id)')
                ->from("contadores_asignacion_empresa")
                ->where("rfc",$value['rfc'])
                ->get()
                ->result_array()[0]["COUNT(id)"];
            }
        }
        $empresas = array(
            "numEmpresas" => $empresa,
            'numContadores' =>  (isset($contadores )) ? $contadores  : 0 
        );
        return $empresas ;
        
    }

    public function RegistrarCliente($datos)
    {
        $datos['roll'] = 2;
        $registrado = $this->db->insert('usuario', $datos);
        return $registrado;   
    }
    public function ActualizarCliente( $usuario , $id )
    {
        $registrado = $this->db->where('id', $id)->update("usuario",$usuario);
        return $registrado;
    }
    public function EliminarCliente($id)
    {
        $registrado = $this->db->where('id', $id)->delete('usuario');
        $registrado = $this->db->where('idCliente', $id)->delete('contadores_asignacion_cliente');
        foreach ($this->getTodasEmpresasByID($id) as $key => $value) 
        {
            $registrado = $this->db->where('rfc', $value['rfc'])->delete('contadores_asignacion_empresa');        
            $registrado = $this->db->where('rfc', $value['rfc'])->delete('empresa');        
        }
        
        return $registrado;
    }

    public function getTodasEmpresasByID($id)
    {
        $empresa = $this->db->select('rfc')
            ->from("empresa")
            ->where("id_usuario",$id)
            ->get()->result_array();
        return $empresa;
            
    }
}

/* End of file ModelName.php */
