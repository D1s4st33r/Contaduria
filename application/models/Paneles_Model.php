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

    public function getPreguntas($categoria)
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

    public function actualizarDatosUsuario($usuario,$id)
    {
        $this->db->where('id', $id);
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

    public function getRollById($id)
    {
        $roll = $this->db->select("roll")
        ->from("usuario")
        ->where("id",$id)
        ->get()
        ->result_array()[0]['roll'];
        return $roll;
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
    public function RegistrarCliente($datos)
    {
        $datos['roll'] = 2;
        $registrado = $this->db->insert('usuario', $datos);
        return $registrado;   
    }
    



    //SECCION DE  CRUD DE LAS CATEGORIAS, SECCIONES y PREGUNTAS

    public function registrarCategoria($datos)
    {
        $registrado= $this->db->insert('cat_categorias_preguntas',$datos);
        return $registrado;
    }

    public function actualizarCategoria($nombre,$id)
    {
        $registrado=$this->db->where('id',$id)->update("cat_categorias_preguntas",$nombre);
        return $registrado;
    }

    public function eliminarCategoria($id)
    {
        $registrado=$this->db->where('id',$id)->delete('cat_categorias_preguntas');
        return $registrado;
    }

    public function registrarSeccion($datos)
    {
        $registrado=$this->db->insert('cat_secciones_preguntas',$datos);
        return $registrado;
    }

    public function actualizarSeccion($nombre,$id)
    {
        $registrado=$this->db->where('id',$id)->update("cat_secciones_preguntas",$nombre);
        return $registrado;
    }

    public function eliminarSeccion($id)
    {
        $registrado=$this->db->where('id',$id)->delete('cat_secciones_preguntas');
        return $registrado;
    }

    public function registrarPregunta($datos)
    {
        $this->db->insert('preguntas',$datos);
        $insertId=$this->db->insert_id();
        return $insertId;
    }

    public function registrarDetalles($datos)
    {
        $registrado=$this->db->insert('detalles_preguntas',$datos);
        return $registrado;
    }

    public function getSpecificPregunta($id)
    {
        $pregunta= $this->db->select('categoria,seccion,texto')
        ->from("preguntas")
        ->where('id',$id)
        ->get()
        ->result_array()[0];
        return  $pregunta;
    }

    public function validacionDetalles($id)
    {
        $preguntas=$this->db->select("COUNT(id_pregunta)")
        ->from("detalles_preguntas")
        ->where('id_pregunta',$id)
        ->get()
        ->result_array()[0]["COUNT(id_pregunta)"];
        return $preguntas;
    }

    public function getCatalogo()
    {
        $preguntas=$this->db->select("tipo")
        ->from("cat_input_preguntas")
        ->get()
        ->result_array();
        return $preguntas;
    }

    public function getSpecificSecciones($categoria)
    {
        $preguntas=$this->db->select("seccion,id")
        ->from("cat_secciones_preguntas")
        ->where('categoria',$categoria)
        ->get()
        ->result_array();
        return $preguntas;
    }

    public function getDetallesPregunta($id)
    {
        $detalles= $this->db->select('tipo,obligatorio,soliarchivo,preguntaOpcional,tipoPreOpcional')
        ->from("detalles_preguntas")
        ->where('id_pregunta',$id)
        ->get()
        ->result_array()[0];
        return $detalles;
    }

    public function getDetallesporCat($categoria)
    {
        $detalles= $this->db->select('tipo,obligatorio,soliarchivo,preguntaOpcional,tipoPreOpcional')
        ->from("detalles_preguntas")
        ->where('categoria',$categoria)
        ->get()
        ->result_array();
        return $detalles;
    }


    public function actualizarPregunta($datos,$id)
    {
        $registrado=$this->db->where('id',$id)->update("preguntas",$datos);
        return  $registrado;
    }

    public function actualizarDetallesPregunta($datos,$id)
    {
        $registrado=$this->db->where('id_pregunta',$id)->update("detalles_preguntas",$datos);
        return $registrado;
    }

    public function eliminarPregunta($id)
    {
        $registrado=$this->db->where('id',$id)->delete('preguntas');
        return $registrado;
    }

    public function eliminarDetalles($id)
    {
        $registrado=$this->db->where('id_pregunta',$id)->delete('detalles_preguntas');
        return $registrado;
    }
    
    //Empieza la seccion de clientes
    public function getContadorEmpresa($id_usuario)
    {
        $sumaEmpresas = $this->db->select('COUNT(rfc)')
        ->from("empresa")
        ->where("id_usuario",$id_usuario)
        ->get()
        ->result_array()[0]["COUNT(rfc)"];
    $usuarios= array(
        "Empresas" => $sumaEmpresas
    );
    return $usuarios;
         
    }
    public function getInfoEmpresas($id_usuario)
    {

        $Empleados = $this->db->select('rfc,razonSocial,correo,telefono,representantelegal,telrepresentante')
            ->from("empresa")
            ->where("id_usuario",$id_usuario)
            ->get()
            ->result_array();
        
        $usuarios= array(
            "Empresas" => $Empleados
        );
        return $usuarios;
    }
    public function EliminarClaveRegistro($clave){

        $registrado = $this->db->where('ClaveRegistro',$clave)->delete("claves_solicitadas");
        return $registrado;
    }


    public function getContadoresClientes()
    {
        $Clientes = $this->db->select('COUNT(id)')
            ->from("usuario")
            ->where("roll",2)
            ->get()
            ->result_array()[0]["COUNT(id)"];
        $usuarios= array(
            "Clientes" => $Clientes
        );
        return $usuarios;
    }

    public function getInfoClientes()
    {

        $Clientes = $this->db->select('id,nombre,apellido,email,telefono')
            ->from("usuario")
            ->where("roll",2)
            ->get()
            ->result_array();
        foreach ($Clientes as $key => $value) {
            $Clientes[$key]["EmpresasRegistradas"]= $this->getContadorEmpresaById($value['id']);
        }
        $usuarios= array(
            "Clientes" => $Clientes
        );
        return $usuarios;
    }

    public function getContadorEmpresaById($id)
    {
        $empresas =array();
        $datosContador = array();
        $empresa = $this->db->select('COUNT(rfc)')
        ->from("empresa")
        ->where("id_usuario",$id)
        ->get()
        ->result_array()[0]["COUNT(rfc)"];
       
        $contador = $this->db->select('contadorAsignado')
        ->from("empresa")
        ->where("id_usuario",$id)
        ->get()
        ->result_array()[0]["contadorAsignado"];
        
        if($empresa != "0"){
            $empresas["numEmpresas"] =$empresa;
            if($contador!="0")
            {
                $datosContador = $this->db->select('nombre,apellido')->from("usuario")->where("id",$contador)->get()->result_array()[0];
                var_dump($datosContador);
            }else{
                $empresas["Contador"] = "0";
            }
        }else{
            $empresas["numEmpresas"] =0;
        }
         
        return $empresas;
    }

    public function EmpresasByCliente($id)
    {
        $empresas = $this->db->select('rfc,razonSocial,domicilio,correo,telefono')->from("empresa")->where("id_usuario",$id)->get()->result_array();
        return $empresas;
    }
}
