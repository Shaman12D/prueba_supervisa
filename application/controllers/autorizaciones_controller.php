<?php
defined('BASEPATH') or exit('No direct script access allowed');

class autorizaciones_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	}

	public function index($message='')
	{
		$page_data['autorizaciones'] = $this->autorizaciones_model->get_autorizaciones();
		$page_data['empleados'] = $this->empleados_model->get_empleados();
		$page_data['historial'] = $this->autorizaciones_model->get_historial_autorizaciones();
		if ($message!=null) {
			$page_data['mensaje']=$message;
		} else{
			$page_data['mensaje']=NULL;
		}
		$this->load->view('autorizaciones_view', $page_data);
	}

	public function actions($option = '', $id_auto = '')
	{
		switch ($option) {

			case 'add_autorizacion_form':
				$this->load->view('add_empleados');
				break;

			case 'autorizacion_informacion':
				$page_data['datos_autorizacion'] = $this->autorizaciones_model->get_autorizaciones_by_id($id_auto);
				$this->load->view('edit_autorizaciones', $page_data);
				break;

			case 'add_autorizacion':
				$data['id_emp'] = $this->input->post('id_emp');
				date_default_timezone_set("America/Bogota");
				$data['fecha_auto'] = date('Y-m-d');
				$ingreso = date('H:i:s', time());
				$data['ingreso_auto'] = $ingreso;
				$data['salida_auto'] = Null;
				if ($data['ingreso_auto'] <= '08:00:00') {
					$data['autorizacion_auto'] = 'Denegado';
				} else {
					$data['autorizacion_auto'] = 'Activo';
				}
				$registro=$this->autorizaciones_model->add_autorizacion($data);
				if ($registro) {
					$message='Registrado';
				} else{
					$message='Error_al_eliminar';
				}
				redirect(base_url().'index.php/autorizaciones_controller/index/'.$message,'refresh');
				break;

			case 'edit_autorizacion':
				date_default_timezone_set("America/Bogota");
				$data['fecha_auto'] = $this->input->post('fecha_auto');
				$data['ingreso_auto'] = $this->input->post('ingreso_auto');
				$salida = $this->input->post('salida_auto');
				if ($salida!=NULL) {
					$data['salida_auto'] = $salida;
				} else {
					$data['salida_auto'] = Null;
				}
				if (($data['ingreso_auto'] <= '08:00:00' AND $data['salida_auto']>='18:00:00')) {
					$data['autorizacion_auto'] = 'Denegado';
				} elseif ($data['ingreso_auto']>='18:00:00') {
					$data['autorizacion_auto'] = 'Denegado';
				} else {
					$data['autorizacion_auto'] = 'Activo';
				}
				$registro=$this->autorizaciones_model->edit_autorizacion($id_auto,$data);
				if ($registro) {
					$message='Modificado';
				} else{
					$message='Error_al_modificar';
				}
				redirect(base_url().'index.php/autorizaciones_controller/index/'.$message,'refresh');
				break;

			case 'delete_autorizacion':
				$registro=$this->autorizaciones_model->delete_autorizacion($id_auto);
				if ($registro) {
					$message='Eliminado';
				} else{
					$message='Error_al_eliminar';
				}
				redirect(base_url().'index.php/autorizaciones_controller/index/'.$message,'refresh');
				break;

			case 'marcar_salida':
				date_default_timezone_set("America/Bogota");
				$salida = date('H:i:s', time());
				$data['salida_auto'] = $salida;
				$registro=$this->autorizaciones_model->marcar_salida($id_auto,$salida);
				if ($registro) {
					$message='Salida_marcada';
				} else{
					$message='Error_al_marcar_salida';
				}
				redirect(base_url().'index.php/autorizaciones_controller/index/'.$message,'refresh');
				break;
		}
	}
}
