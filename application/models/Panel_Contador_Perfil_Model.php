<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_Contador_Perfil_Model extends CI_Model 
{    
    
    public function __construct()
    {
        parent::__construct();
    }
    public function ActualizarPerfil($usuario,$id)
    {
        $this->db->where('id', $id);
        $hecho = $this->db->update('usuario', $usuario);
        return $hecho;
    }

        
    public function CambiarContrasena( $var)
    {
         $claveAdmin =$this->db->select('clave')
                 ->from("usuario")
                 ->where("id",$var['id'])->get()->result_array()[0]['clave'];
        
        if(!empty($claveAdmin) && $claveAdmin == $var['actual'])
        {
            $this->db->where('id', $var['id']);
            $this->db->update('usuario', array('clave'=>$var['nueva']));
            return $this->db->affected_rows();
            
        }
            
    }
    public function getContadoresClientes($id)
    {
        $cliente = $this->db->select('COUNT(id)')
                  ->from("contadores_asignacion_cliente")
                  ->where("idContador",$id)
                  ->get()
                  ->result_array()[0]["COUNT(id)"];
        $empresa = $this->db->select('COUNT(id)')
                  ->from("contadores_asignacion_empresa")
                  ->where("idContador",$id)
                  ->get()
                  ->result_array()[0]["COUNT(id)"];
        $clientes= array(
            "Clientes" => $cliente,
            "Empresas" => $empresa,
        );
        return $clientes;
    }
    
}
