<?php
defined('BASEPATH') or exit('No direct script access allowed');

class autorizaciones_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	}

	public function get_autorizaciones()
	{
		$this->db->where('salida_auto', NULL);
		return $this->db->get("vw_autorizaciones_empleados");
	}

	public function get_historial_autorizaciones(){
		return $this->db->get("vw_autorizaciones_empleados");
	}

	public function get_autorizaciones_by_id($id)
	{
		$this->db->where("id_auto", $id);
		return $this->db->get("autorizaciones");
	}

	public function add_autorizacion($data){
		return $this->db->insert('autorizaciones',$data);
	}

	public function edit_autorizacion($id, $data){
		$this->db->where("id_auto", $id);
		return $this->db->update("autorizaciones",$data);
	}

	public function delete_autorizacion($id){
		$this->db->where('id_auto',$id);
		return $this->db->delete("autorizaciones");
	}

	public function marcar_salida($id,$salida){
		$this->db->where('id_auto',$id);
		$this->db->set('salida_auto',$salida);
		return $this->db->update("autorizaciones",);
	}
}


?>
