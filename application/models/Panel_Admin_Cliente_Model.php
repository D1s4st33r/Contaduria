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

    public function getContadorEmpresaById($id)
    {
        $empresas =array();
        $datosContadores = array();

        $empresa = (int)$this->db->select('COUNT(rfc)')
            ->from("empresa")
            ->where("id_usuario",$id)
            ->get()
            ->result_array()[0]["COUNT(rfc)"];
       
        if($empresa)
        {
            $rfcs = $this->db->select('rfc')
                ->from("empresa")
                ->where("id_usuario",$id)
                ->get()
                ->result_array();
            foreach ($rfcs as $key => $value) 
            {
                $contadoresAxu =  (int)$this->db->select('COUNT(id)')
                ->from("contadores_asignacion_empresa")
                ->where("rfc",$value['rfc'])
                ->get()
                ->result_array()[0]["COUNT(id)"];
            }
        }
        
        $contadores = (int)$this->db->select('COUNT(id)')
            ->from("contadores_asignacion_cliente")
            ->where("idCliente",$id)
            ->get()
            ->result_array()[0]["COUNT(id)"];
            
        
        $empresas = array(
            "numEmpresas" => $empresa,
            'numContadores' =>   $contadores 
        );
        if(isset($contadoresAxu ))
        {
                
            $empresas['numContadores'] = $empresas['numContadores'] + $contadoresAxu;
        }
        
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
        $registrado = $this->db->where('id_Cliente', $id)->delete('formulario');
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
    public function GetClienteLike($search)
    {
        $this->db->select('id,nombre,apellido');
        $this->db->from('usuario');
        $this->db->where('roll', "2");
        $this->db->like("nombre", $search);
        $resultado = $this->db->get()->result_array();
        if (!empty($resultado)){

            return $resultado;
        }
        return array();
    }

    public function setContadorCliente($ids)
    {
        if(!empty($ids) && isset($ids['IdCliente']) && isset($ids['IdContador']))
        {
            $existe =  (int)$this->db->select('COUNT(id)')
                ->from("contadores_asignacion_cliente")
                ->where("idCliente",$ids['IdCliente'])
                ->where("idContador",$ids['IdContador'])
                ->get()
                ->result_array()[0]["COUNT(id)"];
            if(
                $existe ==0
            )
            {
                $cre =  array( "idContador" => $ids['IdContador'] , "idCliente" => $ids['IdCliente']);
                $this->db->insert('contadores_asignacion_cliente', $cre);           
            }
            
        }
    }

    public function getContadoresClienteByIdCliente($id)
    {
        $this->db->select('idContador');
        $this->db->where('idCliente', $id);
        $this->db->from('contadores_asignacion_cliente');
        $contadorID =$this->db->get()->result_array();
        
        if(!empty($contadorID))
        {
            foreach ($contadorID as $key => $value) 
            {
                $this->db->select('id,nombre,apellido,telefono,email');
                $this->db->where('id', $value['idContador']);
                $this->db->from('usuario');
                $contador[] =$this->db->get()->result_array()[0];
            }
            if(isset($contador) && !empty($contador))
            {
                return $contador;
            }else{
                return NULL;
            }
        }else{
            return NULL;
        }
        
    }
    public function EmpresasByCliente($id)
    {
        $empresas=[];
        $frcs = $this->db->select('rfc')->from("empresa")->where("id_usuario",$id)->get()->result_array();
        $empresas= array();
        foreach ($frcs as $key => $value) 
        {
            // var_dump($value);
            $empresas[] = $this->EmpresaByRFC($value['rfc']);
        }
        return $empresas;
    }
    
    public function EliminarContadorPorId($id,$idContador)
    {
        
        $registrado = $this->db->where('idCliente', $id)->where("idContador",$idContador)->delete('contadores_asignacion_cliente');
        
    }
    public function getCamposEmpresa(){
        $campos = $this->db->list_fields("empresa");
        return $campos ;
    }

    public function ActualizarEmpresa($empresa)
    {
        
        $empresExiste =(int)$this->db->select('COUNT(rfc)')->from("empresa")->where("rfc",$empresa['rfc'])->get()->result_array()[0]['COUNT(rfc)'];
        if($empresExiste)
        {
            $this->db->where("rfc",$empresa['rfc']);
            $this->db->update('empresa', $empresa);
            $aver =$this->db->affected_rows();
            if($aver)
            {
                return true;
            }else{
                return false;
            }
            
        }
    }

    public function EmpresaByRFC($rfc)
    {
        $empresa= $this->db->select('rfc,razonSocial,domicilio,correo,telefono,id_usuario,representantelegal,telrepresentante')
        ->from("empresa")
        ->where("rfc",$rfc)
        ->get()->result_array()[0];
        $empresa["cuestionario"] = $this->db->select('fecha_ini,fecha_fini,ponderacion')
        ->from("formulario")
        ->where('empresarfc', $rfc)
        ->get()->result_array()[0];
        return $empresa;
    }
    
    public function EliminarEmpresa($rfc)
    {
        $registrado = $this->db->where('rfc', $rfc )->delete('contadores_asignacion_empresa');        
        $registrado = $this->db->where('rfc', $rfc)->delete('empresa');
        $registrado = $this->db->where('empresarfc', $rfc)->delete('formulario');
        return $registrado;
    }
}

/* End of file ModelName.php */
