<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cempleado extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('mempleado');
	}

	public function index()
	{
		$data['plazas'] = $this->mempleado->verPlazas();
		$this->load->view('layout/header');
		$this->load->view('vempleado', $data);
		$this->load->view('layout/footer');
	}

	public function verEmpleados(){
		$result = $this->mempleado->verEmpleados();
		echo json_encode($result);
	}

	public function addEmpleados(){
		$result = $this->mempleado->addEmpleados();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function modificarEmpleado(){
		$result = $this->mempleado->modificarEmpleado();
		echo json_encode($result);
	}

	public function updateEmpleado(){
		$result = $this->mempleado->updateEmpleado();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function borrarEmpleado(){
		$result = $this->mempleado->borrarEmpleado();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
}
