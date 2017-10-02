<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mempleado extends CI_Model{

	public function verEmpleados(){
	$this->db->order_by('idEmpleado', 'asen');
	$this->db->select('*');	
    $this->db->from('empleados');
    $this->db->join('plazas','empleados.plaza=plazas.idPlaza');
    $this->db->where('empleados.activo','1');  
    $this->db->where('plazas.activo','1');

    $query = $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    	}
	}
	
	public function verPlazas(){
    $query = $this->db->get('plazas');
    return $query->result();
    
	}


	public function addEmpleados(){
		$field = array(
			'num_emp'=>$this->input->post('num_emp'),
			'nombre'=>$this->input->post('nombre'),
			'appaterno'=>$this->input->post('appaterno'),
			'apmaterno'=>$this->input->post('apmaterno'),
			'plaza'=>$this->input->post('plaza'),
			'activo'=>$this->input->post('activo')
			);
		$this->db->insert('empleados', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	public function modificarEmpleado(){
		$id = $this->input->get('idEmpleado');
		$this->db->where('idEmpleado', $id);
		$query = $this->db->get('empleados');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

		public function updateEmpleado(){
		$id = $this->input->post('idEmpleado');
		$field = array(
			'num_emp'=>$this->input->post('num_emp'),
			'nombre'=>$this->input->post('nombre'),
			'appaterno'=>$this->input->post('appaterno'),
			'apmaterno'=>$this->input->post('apmaterno'),
			'plaza'=>$this->input->post('plaza'),
			'activo'=>$this->input->post('activo')
			);
		$this->db->where('idEmpleado', $id);
		$this->db->update('empleados', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function borrarEmpleado(){
		$id = $this->input->get('idEmpleado');
		$this->db->SET('activo', 0);
		$this->db->where('idEmpleado', $id);
		$this->db->update('empleados');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}