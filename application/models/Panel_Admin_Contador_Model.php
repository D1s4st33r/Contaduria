<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_Admin_Contador_Model extends CI_Model 
{
    public function __construct()
	{
		parent::__construct();
    }
    public function getSumaContadoresEnSistemas()
    {
        $sumaEmContadores = $this->db->select('COUNT(id)')
            ->from("usuario")
            ->where("roll",1)
            ->get()
            ->result_array()[0]["COUNT(id)"];
        $usuarios= array(
            "contadoresRegistradosEnSistema" => $sumaEmContadores
        );
        return $usuarios;
    }

    public function getContadorSeleccionado($id)
    {
        $sumaEmContadores = $this->db->select('COUNT(id)')
            ->from("usuario")
            ->where("roll",1)
            ->get()
            ->result_array()[0]["COUNT(id)"];
        $usuarios= array(
            "contadoresRegistradosEnSistema" => $sumaEmContadores
        );
        return $usuarios;
    }

    public function GetContadoreLike($search)
    {
        $this->db->select('id,nombre,apellido');
        $this->db->from('usuario');
        $this->db->where('roll', "1");
        $this->db->like("nombre", $search);
        $resultado = $this->db->get()->result_array();
        if (!empty($resultado)){

            return $resultado;
        }
        return array();
    }

    public function getContadorRegistradoPorId($id)
    {
        $Existe =(int) $this->db->select('COUNT(id)')
                            ->where('id',$id)
                            ->from("usuario")
                            ->get()->result_array()[0]['COUNT(id)'];
        
        $Empleados = $this->db->select('id,nombre,apellido,email,telefono')
            ->from("usuario")
            ->where("id",$id)
            ->get()
            ->result_array();
            foreach ($Empleados as $key => $value) {
                $hayClientes = (int)$this->db->select('COUNT(id)')
                    ->from("contadores_asignacion_cliente")
                    ->where('idContador',$value['id'])->get()->result_array()[0]['COUNT(id)'];
                
                if($hayClientes>0)
                {
                    $Empleados[$key]['clientes'] = array( "total" =>$hayClientes );
                }else{
                    $Empleados[$key]['clientes'] = array("total"=>0); // se asigna la empresa
                }
                $hayEmpresas = (int)$this->db->select('COUNT(id)')
                    ->from("contadores_asignacion_empresa")
                    ->where('idContador',$value['id'])->get()->result_array()[0]['COUNT(id)'];
                if($hayEmpresas>0)
                {
                    $Empleados[$key]['auxiliando'] = array("total"=>$hayEmpresas );   
                }else{
                    $Empleados[$key]['auxiliando'] = array("total"=>0); // se asigna la empresa
                }
            }
            $usuarios= array(
                "contadores" => $Empleados
            );
    
            return $usuarios;
    }

    public function getContadoresRegistradosEnSistema()
    {

        $Empleados = $this->db->select('id,nombre,apellido,email,telefono')
            ->from("usuario")
            ->where("roll",1)
            ->get()
            ->result_array();
        foreach ($Empleados as $key => $value) {
            $hayClientes = (int)$this->db->select('COUNT(id)')
                ->from("contadores_asignacion_cliente")
                ->where('idContador',$value['id'])->get()->result_array()[0]['COUNT(id)'];
            
            if($hayClientes>0)
            {
                $Empleados[$key]['clientes'] = array( "total" =>$hayClientes );
            }else{
                $Empleados[$key]['clientes'] = array("total"=>0); // se asigna la empresa
            }
            $hayEmpresas = (int)$this->db->select('COUNT(id)')
                ->from("contadores_asignacion_empresa")
                ->where('idContador',$value['id'])->get()->result_array()[0]['COUNT(id)'];
            if($hayEmpresas>0)
            {
                $Empleados[$key]['auxiliando'] = array("total"=>$hayEmpresas );   
            }else{
                $Empleados[$key]['auxiliando'] = array("total"=>0); // se asigna la empresa
            }
        }
        $usuarios= array(
            "contadores" => $Empleados
        );

        return $usuarios;
    }

    public function RegistrarContador($datos)
    {
        $datos['roll'] = 1;
        $registrado = $this->db->insert('usuario', $datos);
        return $registrado;   
    }

    public function ActualizarContador( $usuario , $id )
    {
        $registrado = $this->db->where('id', $id)->update("usuario",$usuario);
        return $registrado;
    }
    public function EliminarContador($id)
    {
        $registrado = $this->db->where('id', $id)->delete('usuario');
        $registrado = $this->db->where('idContador', $id)->delete('contadores_asignacion_cliente');
        $registrado = $this->db->where('idContador', $id)->delete('contadores_asignacion_empresa');
        return $registrado;
    }

    public function getClientesContadoresById($id)
    {
        $cliente = $this->db->select('idCliente')
                        ->from("contadores_asignacion_cliente")
                        ->where("idContador",$id)
                        ->get()->result_array();
                        
       foreach ($cliente as $key => $value) {
            $datosTemp=  $this->db->select('id,nombre,apellido,telefono,email')
                    ->from("usuario")
                    ->where("id",$value['idCliente'])
                    ->get()
                    ->result_array()[0];

            $datos[] = $datosTemp;
       }
       if(!empty($datos))
        {
        return $datos;
        }
        
    }
    public function getEmpresasContadoresById($id)
    {
        $empresa = $this->db->select('rfc')
            ->from("contadores_asignacion_empresa")
            ->where("idContador",$id)
            ->get()->result_array();
            foreach ($empresa as $key => $value) {
                $datosTemp=  $this->db->select('rfc,razonSocial,domicilio,correo,telefono,representantelegal,telrepresentante')
                        ->from("empresa")
                        ->where("rfc",$value['rfc'])
                        ->get()
                        ->result_array()[0];
    
                $datos[] = $datosTemp;
           }
           if(!empty($datos))
            {
            return $datos;
            }
    }
    public function TieneEmpresasByIdContador($id)
    {
        $hayClientes = (int)$this->db->select('COUNT(id)')
        ->from("contadores_asignacion_cliente")
        ->where('idContador',$id)->get()->result_array()[0]['COUNT(id)'];
    
        if($hayClientes>0)
        {
            $Empleados['clientes'] = array( "total" =>$hayClientes );
        }else{
            $Empleados['clientes'] = array("total"=>0); // se asigna la empresa
        }
        $hayEmpresas = (int)$this->db->select('COUNT(id)')
            ->from("contadores_asignacion_empresa")
            ->where('idContador',$id)->get()->result_array()[0]['COUNT(id)'];
        if($hayEmpresas>0)
        {
            $Empleados['auxiliando'] = array("total"=>$hayEmpresas );   
        }else{
            $Empleados['auxiliando'] = array("total"=>0); // se asigna la empresa
        }
        return $Empleados;
        
    }
}



/* End of file Panel_Admin_Contador.php */
