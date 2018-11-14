<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Boveda_Model extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }
    
    
    public function CrearCarpeta($obj)
    {
        $object = array(
            "folder"     => $obj['folder'],
            "id_cliente" => $obj['id_cliente'],
            "ruta"       => $obj['path'].$obj['folder']."/",
            "id_folder"  => $obj['id_folder'],
            "tipo_folder "=> -1
        );
        
        $this->db->insert('boveda_cliente_folder', $object);
    }
    public function getEmpresasAdmin()
    {
        $usuarios= $this->db->select('id,nombre,apellido,id_folder')
        ->from("usuario")
        ->where("roll",2)
        ->get()->result_array();
        foreach ($usuarios as $key => $usuario) 
        {
           
            foreach ($usuarios as $key => $usuario) 
            {
                $this->db->select('ruta');
                $this->db->where('id', $usuario['id_folder']);
                $usuarios[$key]['path'] = $this->db->from('boveda_cliente_folder')->get()->result_array()[0]['ruta'];
                // $this->db->select('titulo_archivo,nombre_archivo,fecha_subida,id_usuario_mod,fecha_modificacion');
                // $this->db->where('id_folder', $usuario['id_folder']);
                // $usuarios[$key]['archivos'] = $this->db->from('boveda_cliente_archivo')->get()->result_array();
                // $this->db->select('id,folder,ruta');
                // $this->db->where('id_folder', $usuario['id_folder']);
                // $usuarios[$key]['empresas'] = $this->db->from('boveda_cliente_folder')->get()->result_array();
            }

        }
        
        return $usuarios;
    }
    public function getFoldersYCarpetas($array)
    {
        $this->db->select('tipo_folder');
        $this->db->where('id', $array['id_folder']);
        $esRaiz = (int)$this->db->from('boveda_cliente_folder')->get()->result_array()[0]['tipo_folder'];
        if($esRaiz == 0){
            $this->db->select('id,folder,id_cliente,ruta,tipo_folder');
            $this->db->where('id_folder', $array['id_folder']);
            $content["folders"] = $this->db->from('boveda_cliente_folder')->get()->result_array();

            $this->db->select('id,titulo_archivo,nombre_archivo,fecha_subida,id_usuario_mod,fecha_modificacion');
            $this->db->where('id_folder', $array['id_folder']);
            $content["documentos"] = $this->db->from('boveda_cliente_archivo')->get()->result_array();
            $content['folderParen'] = $array;
            return $content;
        }else{
            $this->db->select('id,folder,id_cliente,ruta,tipo_folder');
            $this->db->where('id_folder', $array['id_folder']);
            $content["folders"] = $this->db->from('boveda_cliente_folder')->get()->result_array();

            $this->db->select('id,titulo_archivo,nombre_archivo,fecha_subida,id_usuario_mod,fecha_modificacion');
            $this->db->where('id_folder', $array['id_folder']);
            $content["documentos"] = $this->db->from('boveda_cliente_archivo')->get()->result_array();
            $content['folderParen'] = $array;
            
            return $content;
        }
        
    }

    public function getRazonSocial($rfc)
    {
        $empresa  = $this->db->select('razonSocial')
                 ->where("rfc",$rfc)
                 ->from("empresa")
                 ->get()->result_array()[0];
        return $empresa;
    }
    public function registrarArchivo($obj)
    {
        $this->db->insert('boveda_cliente_archivo', $obj);
    }
    

}

/* End of file Boveda_Model.php */
