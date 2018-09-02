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
        if( !empty($Clientes[0]) )
        {
            return $Clientes[0];
        }else
        {
            return array();
        }
        // $Clientes$[$key]["info_empresas"] = $this->getContadorEmpresaById(resultado['id']);
        // $usuarios= array(
        //     "cliente" => $Clientes
        // );
        
    }
    public function empresasAsignadas($id){
        $cliente = $this->db->select('COUNT(id)')
                  ->from("contadores_asignacion_empresa")
                  ->where("idContador",$id)
                  ->get()
                  ->result_array()[0]["COUNT(id)"];
        return  $cliente;
    }
    public function getTodosCliente($id)
    {   
        $Cliente = array();
        $idCliente = $this->db->select('idCliente')
            ->from("contadores_asignacion_cliente")
            ->where("idContador",$id)
            ->get()
            ->result_array();
        foreach ($idCliente as $key => $value) 
        {
            $pivote = $this->getInfoClientesById($idCliente[$key]['idCliente']);
            if(!empty($pivote))
            {
                $Cliente[] = $pivote;
            }
        }

        return $Cliente;
    }   
    public function RegistrarCliente($datos,$id)
    {
        $datos['roll'] = 2;
        $registrado = $this->db->insert('usuario', $datos);
        $insert_id = $this->db->insert_id();
        $cliente= array(
            "idContador" =>  $id,
            "idCliente"  => $insert_id
        );
        $registrado = $this->db->insert('contadores_asignacion_cliente', $cliente);
        
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
    public function nombreClienteById($id)
    {
        $usuario = $this->db->select('nombre,apellido')->from("usuario")->where("id",$id)->get()->result_array()[0];
        $usuario = $usuario['nombre'] . " " . $usuario['apellido'];
        return $usuario;
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
    public function EliminarEmpresa($rfc)
    {
        $registrado = $this->db->where('rfc', $rfc )->delete('contadores_asignacion_empresa');        
        $registrado = $this->db->where('rfc', $rfc)->delete('empresa');
        $registrado = $this->db->where('empresarfc', $rfc)->delete('formulario');
        return $registrado;
    }

    public function GetClienteLike($search,$id)
    {
        $resultado =$this->db->select('id,nombre,apellido')
                ->from('usuario')
                ->where('roll', 2)
                ->like("nombre", $search)
                ->get()->result_array();
       $pivote="";
        foreach ($resultado as $key => $value) 
        {
            $existe = (int)$this->db->select('COUNT(id)')
                  ->from("contadores_asignacion_cliente")
                  ->where("idCliente",$value['id'])
                  ->where("idContador",$id)
                  ->get()
                  ->result_array()[0]["COUNT(id)"];
            if($existe)
            {
                $pivote[] = $resultado[$key];
            }
        }
        return $pivote;
       
    }

    public function EmpresasAsignadasDirectamente($id)
    {
        
        $frcs = $this->db->select('rfc')->from("contadores_asignacion_empresa")->where("idContador",$id)->get()->result_array();
        $empresas= array();
        foreach ($frcs as $key => $value) 
        {
            // var_dump($value);
            $empresas[] = $this->EmpresaByRFC($value['rfc']);
        }
        return $empresas;   
    }
   
}

/* End of file Panel_Contador_Cliente_Model.php */
