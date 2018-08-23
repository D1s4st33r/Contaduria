<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_Admin_Perfil_Model extends CI_Model 
{    
    
    public function __construct()
    {
        parent::__construct();
    }
    

    public function getContadoresUsuarios()
    {
        $sumaAdmin = $this->db->select('COUNT(id)')
                  ->from("usuario")
                  ->where("roll",0)
                  ->get()
                  ->result_array()[0]["COUNT(id)"];
        $sumaEmContadores = $this->db->select('COUNT(id)')
                  ->from("usuario")
                  ->where("roll",1)
                  ->get()
                  ->result_array()[0]["COUNT(id)"];
        $sumaClientes = $this->db->select('COUNT(id)')
                  ->from("usuario")
                  ->where("roll",2)
                  ->get()
                  ->result_array()[0]["COUNT(id)"];
        $empresa = $this->db->select('COUNT(rfc)')
                  ->from("empresa")
                  ->get()
                  ->result_array()[0]["COUNT(rfc)"];
        $usuarios= array(
            "Administradores" => $sumaAdmin,
            "Contadores" => $sumaEmContadores,
            "Clientes" => $sumaClientes,
            "Empresas" => $empresa
        );
        return $usuarios;
    }
    
    public function getCategorias()
    {
        $seccions=$this->db->select("categoria,id")
        ->from("cat_categorias_preguntas")
        ->get()
        ->result_array();
        return $seccions;
    }

    public function getNumSecciones()
    {
        $categories=$this->db->select("COUNT(seccion)")
        ->from("cat_secciones_preguntas")
        ->get()
        ->result_array()[0]["COUNT(seccion)"];
        return $categories;
    }

    public function getNumPreguntas()
    {
        $preguntas=$this->db->select("COUNT(id)")
        ->from("preguntas")
        ->get()
        ->result_array()[0]["COUNT(id)"];
        return $preguntas;
    }

    public function getSoliArchivo()
    {
        $categories=$this->db->select("id_pregunta")
        ->from("detalles_preguntas")
        ->where('soliarchivo',1)
        ->get()
        ->result_array();
        return $categories;
    }
    
    public function getObliArchivo()
    {
        $obligatorio=$this->db->select("id_pregunta")
        ->from("detalles_preguntas")
        ->where('obligatorio',1)
        ->get()
        ->result_array();
        return $obligatorio;
    }

}

/* End of file Panel_Admin_Perfil_Model.php */
