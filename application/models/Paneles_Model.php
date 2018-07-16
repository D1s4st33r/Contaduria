<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Paneles_Model extends CI_Model 
{
    public function __construct()
	{
		parent::__construct();
	}

    public function getInfoUsuarioPorId($id)
    {
        $usuario = $this->db->select("nombre,apellido,email,telefono")
        ->from("usuario")
        ->where('id',$id)
        ->get()
        ->result_array()[0];
        return $usuario;	
    }

    public function getCategorias()
    {
        $seccions=$this->db->select("categoria,id")
        ->from("categorias_preguntas")
        ->get()
        ->result_array();
        return $seccions;
    }

    public function getSecciones()
    {
        $categories=$this->db->select("seccion")
        ->from("secciones_preguntas")
        ->get()
        ->result_array();
        return $categories;
    }

    public function getPreguntas()
    {
        $preguntas=$this->db->select("categoria,seccion,texto")
        ->from("preguntas")
        ->get()
        ->result_array();
        return $preguntas;
    }

    public function getSpecificPreguntas($categoria)
    {
        $dato = $this->db->select('id,seccion,texto')->from('preguntas')->where('categoria',$categoria)->get()->result_array();
			return $dato;
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

    public function actualizarDatosUsuario($usuario)
    {
        $hecho = $this->db->update('usuario', $usuario);
        return $hecho;
        
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

    public function getContadoresEmp()
    {
        $sumaEmContadores = $this->db->select('COUNT(id)')
            ->from("usuario")
            ->where("roll",1)
            ->get()
            ->result_array()[0]["COUNT(id)"];
        $usuarios= array(
            "Contadores" => $sumaEmContadores
        );
        return $usuarios;
    }
    public function getContadoresEmpleados()
    {

        $Empleados = $this->db->select('id,nombre,apellido,email,telefono')
            ->from("usuario")
            ->where("roll",1)
            ->get()
            ->result_array();
        
        $usuarios= array(
            "Contadores" => $Empleados
        );
        return $usuarios;
    }
    public function actualizarUsuarioById($usuario,$id)
    {
        $registrado = $this->db->where('id', $id)->update("usuario",$usuario);
        return $registrado;
    }
    public function EliminarUsuarioById($id)
    {
        $registrado = $this->db->where('id', $id)->delete('usuario');
        return $registrado;
    }
    public function RegistrarContador($datos)
    {
        $datos['roll'] = 1;
        $registrado = $this->db->insert('usuario', $datos);
        return $registrado;   
    }

    //SECCION DE  CRUD DE LAS CATEGORIAS, SECCIONES y PREGUNTAS

    public function registrarCategoria($datos)
    {
        $registrado= $this->db->insert('categorias_preguntas',$datos);
        return $registrado;
    }

    public function actualizarCategoria($nombre,$id)
    {
        $registrado=$this->db->where('id',$id)->update("categorias_preguntas",$nombre);
        return $registrado;
    }

    public function eliminarCategoria($id)
    {
        $registrado=$this->db->where('id',$id)->delete('categorias_preguntas');
        return $registrado;
    }

    public function registrarSeccion($datos)
    {
        $registrado=$this->db->insert('secciones_preguntas',$datos);
        return $registrado;
    }

    public function actualizarSeccion($nombre,$id)
    {
        $registrado=$this->db->where('id',$id)->update("secciones_preguntas",$nombre);
        return $registrado;
    }

    public function eliminarSeccion($id)
    {
        $registrado=$this->db->where('id',$id)->delete('secciones_preguntas');
        return $registrado;
    }

    public function registrarPregunta($datos)
    {
        $registrado=$this->db->insert('preguntas',$datos);
        return $registrado;
    }
    public function registrarDetalles($datos)
    {
        $registrado=$this->db->insert('preguntas',$datos);
        return $registrado;
    }

}