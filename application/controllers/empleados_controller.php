<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Empleados_controller
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class empleados_controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	}

	public function index()
	{
		$page_data['autorizaciones'] = $this->autorizaciones_model->get_autorizaciones();
		$page_data['empleados'] = $this->empleados_model->get_empleados();
		$this->load->view('autorizaciones_view', $page_data);
	}

	public function actions($options = '', $id_emp = '')
	{
		switch ($options) {
			case 'add_empleado_form':
					$this->load->view('add_empleados');
				break;

			case 'add_empleado':
				$data['nombres_emp'] = $this->input->post('nombres');
				$data['apellidos_emp'] = $this->input->post('apellidos');
				$data['tipo_documento_emp'] = $this->input->post('Tdocumento');
				$data['numero_documento_emp'] = $this->input->post('Ndocumento');
				if ($_FILES['foto']['error'] == 0) {
					$thumbnail = $this->empleados_model->cargar_img('foto', "imagenes", "jpg|jpeg|png", "1000000");
					if ($thumbnail) {
						$data['foto_emp'] = $thumbnail;
					} else {
						$data['foto_emp'] = NULL;
					}
				}
				$registro=$this->empleados_model->add_empleado($data);
				if ($registro) {
					$message='Registrado';
				} else{
					$message='Error_al_eliminar';
				}
				redirect(base_url().'index.php/autorizaciones_controller/index/'.$message,'refresh');
				break;

			case 'edit_empleado':
				$info=$this->empleados_model->get_empleado_by_id($id_emp)->row_array();
				$data['nombres_emp'] = $this->input->post('nombres');
				$data['apellidos_emp'] = $this->input->post('apellidos');
				$data['tipo_documento_emp'] = $this->input->post('Tdocumento');
				$data['numero_documento_emp'] = $this->input->post('Ndocumento');
				if ($_FILES['foto']['error'] == 0) {
					if ($info['foto_emp']) {
						unlink('imagenes/imagenes/' . $info['foto_emp']);
					}
					$thumbnail = $this->empleados_model->cambiar_img('foto', "imagenes");
					if ($thumbnail) {
						$data['foto_emp'] = $thumbnail;
					}
				}
				$registro=$this->empleados_model->edit_empleado($id_emp, $data);
				if ($registro) {
					$message='Modificado';
				} else{
					$message='Error_al_modificar';
				}
				redirect(base_url().'index.php/autorizaciones_controller/index/'.$message,'refresh');
				break;

			case 'delete_empleado':
				$info = $this->empleados_model->get_empleado_by_id($id_emp)->row_array();
				unlink(base_url() . 'imagenes/imagenes/' . $info['foto_emp']);
				$registro=$this->empleados_model->delete_empleado($id_emp);
				if ($registro) {
					$message='Eliminado';
				} else{
					$message='Error_al_eliminar';
				}
				redirect(base_url().'index.php/autorizaciones_controller/index/'.$message,'refresh');
				break;

			case 'empleado_informacion':
				$page_data['datos_empleado'] = $this->empleados_model->get_empleado_by_id($id_emp);
				$this->load->view('edit_empleados', $page_data);
				break;
		}
	}
}


/* End of file Empleados_controller.php */
/* Location: ./application/controllers/Empleados_controller.php */
