<?php
defined('BASEPATH') or exit('No direct script access allowed');

class empleados_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	}

	public function get_empleados()
	{
		return $this->db->get("empleados");
	}

	public function get_empleado_by_id($id)
	{
		$this->db->where("id_emp", $id);
		return $this->db->get("empleados");
	}

	public function add_empleado($data)
	{
		return $this->db->insert('empleados', $data);
	}

	public function edit_empleado($id, $data)
	{
		$this->db->where('id_emp', $id);
		return $this->db->update('empleados', $data);
	}

	public function delete_empleado($id)
	{
		$this->db->where('id_emp', $id);
		return $this->db->delete('empleados');
	}

	public function cargar_img($file, $path, $types, $size)
	{
		$root = "imagenes";
		if (!file_exists($root . "/" . $path)) {
			mkdir($root . "/" . $path, 0777, true);
		}
		$config['upload_path'] = $root . "/" . $path;
		$config['file_name'] = mt_rand(1, mt_getrandmax()) . strtotime("now");
		$config['allowed_types'] = $types;
		$config['max_size'] = $size;
		$this->upload->initialize($config);
		if ($this->upload->do_upload($file)) {
			return $this->upload->data()['file_name'];
		}
	}

	public function cambiar_img($file, $path)
	{
		$root = "imagenes";
		if (!file_exists($root . "/" . $path)) {
			mkdir($root . "/" . $path, 0777, true);
		}
		$config['upload_path'] = $root . "/" . $path;
		$config['file_name'] = mt_rand(1, mt_getrandmax()) . strtotime("now");
		$config['allowed_types'] = "jpg|jpeg|png";
		$config['max_size'] = 1000000;
		$this->upload->initialize($config);
		if ($this->upload->do_upload($file)) {
			return $this->upload->data()['file_name'];
		}
	}

	// ------------------------------------------------------------------------

}

/* End of file Empleados_model.php */
/* Location: ./application/models/Empleados_model.php */
