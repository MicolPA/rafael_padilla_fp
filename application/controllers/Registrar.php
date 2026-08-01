<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrar extends CI_Controller {

	function __construct(){
		
		parent::__construct();
        // $this->load->helper('form');
        // $this->load->helper('url');
		$this->load->model('Gestion');

        $this->getSession();
		
	}

	public function index2()
	{
		// ini_set('memory_limit', '2000M');
		// ini_set('memory_limit', '8192M'); 
		$data['title'] = 'Mis Registrados';
		$data['image'] = 'logo-fp.png';
		$data['content'] = 'registrar/index';
		$this->load->library('SmartGrid/Smartgrid');
		$id = $_SESSION['user']->id;
		//where user_id = $id 

		// $query = $this->db->query("SELECT * FROM sub_coordinadores where user_id = $id");
		// $m= $query->result();
		// $data['total'] = count($m);
		$data['total'] = '-';

		$sql = "SELECT nombre,apellido,celular,recinto_nombre,mesa,date FROM sub_coordinadores where user_id = $id"; 

		// Column settings
		$columns = array(
		// "cedula"=>array("header"=>"Cédula", "type"=>"label"),
		"nombre"=>array("header"=>"Nombre", "type"=>"label"),
		"apellido"=>array("header"=>"Apellido", "type"=>"label"),
		"celular"=>array("header"=>"Célular", "type"=>"label"),
		"recinto_nombre"=>array("header"=>"Recinto", "type"=>"label"),
		// "codigo_colegio"=>array("header"=>"Colegio", "type"=>"label"),
		"mesa"=>array("header"=>"Mesa", "type"=>"label"),
		// "date"=>array("header"=>"Fecha de Registro", "type"=>"label")
		);   
        $config = array("page_size"=> 20,  "toolbar_position"=> 'bottom');
		$this->smartgrid->set_grid($sql, $columns, $config);
		$data['grid_html'] = $this->smartgrid->render_grid(); 

 		$this->load->view('home/plantilla', $data);
	}

	public function index(){

		$data['title'] = 'Mis Registrados';
		$data['image'] = 'logo-fp.png';
		$data['content'] = 'registrar/index2';
		$id = $_SESSION['user']->id;
		$query = $this->db->query("SELECT * FROM sub_coordinadores where user_id = $id");
		$data['result'] = $query->result();
		$data['total'] = count($data['result']);


		$this->load->view('home/plantilla', $data);

	}

	public function coordinadores(){

		$data['title'] = 'Mis Registrados';
		$data['image'] = 'logo-fp.png';
		$data['content'] = 'registrar/coordinadores';
		$id = $_SESSION['user']->id;
		$query = $this->db->query("SELECT * FROM coordinadores");
		$data['result'] = $query->result();
		$data['total'] = count($data['result']);
		$data['admin'] = 1;


		$this->load->view('home/plantilla', $data);

	}
	public function listadoSub(){

		$get = $_GET;
		$data['title'] = 'Mis Registrados';
		$data['image'] = 'logo-fp.png';
		$data['content'] = 'registrar/sub_coordinadores';
		$id = $_SESSION['user']->id;
		$condiciones = array();
		$query = $this->db->query("SELECT * FROM sub_coordinadores");

		if ($get) {

			if ($get['municipio']) {
				$condiciones['municipio_id'] = $get['municipio'];
			}

			if ($get['mesa']) {
				$condiciones['mesa'] = $get['mesa'];
			}
			echo $get['circ'];
			if ($get['circ']) {
				$condiciones['circunscripcion'] = "0".$get['circ'];
			}

			$query = $this->db->get_where('sub_coordinadores', $condiciones);
			
		}




		// if ($get) {
		// 	$circ = isset($get['circ'])?$get['circ']:'';
		// 	$municipio = isset($get['municipio'])?$get['municipio']:'';

		// 	if ($circ AND $municipio AND $municipio != '1') {
		// 		$query = $this->db->query("SELECT * FROM sub_coordinadores where municipio_id = $municipio and circunscripcion = $circ");
		// 	}else{

		// 		if ($municipio == '1') {
		// 			$query = $this->db->query("SELECT * FROM sub_coordinadores where municipio_id <> 223");
		// 		}else{
		// 			$query = $this->db->query("SELECT * FROM sub_coordinadores where municipio_id = $municipio");
		// 		}

		// 		if ($circ) {
		// 			$query = $this->db->query("SELECT * FROM sub_coordinadores where circunscripcion = $circ");
		// 		}


		// 	}
			
		// }
		$data['result'] = $query->result();
		$data['total'] = count($data['result']);

		$this->load->view('home/plantilla', $data);
	}

	public function fixCed(){

		$query = $this->db->query("SELECT * FROM sub_coordinadores");
		$result = $query->result();

		foreach ($result as $r) {
			$user = $this->db->query("SELECT * FROM user where id = $r->user_id");
			$user = $user->first_row();
		}

	}

	public function indexOld()
	{
		// ini_set('memory_limit', '2000M');
		ini_set('memory_limit', '8192M'); 
		$data['title'] = 'Mis Registrados';
		$data['image'] = 'logo-fp.png';
		$data['content'] = 'registrar/index';
		$this->load->library('SmartGrid/Smartgrid');
		$id = $_SESSION['user']->id;
		require_once("application/libraries/phpGrid/conf.php");
		$data['phpgrid'] = new C_DataGrid("SELECT * FROM sub_coordinadores", "id", "sub_coordinadores");
		$data['phpgrid']-> set_query_filter("user_id = 2");

		$data['total'] = 0; 

 		$this->load->view('plantilla', $data);
	}

	public function subcoordinador(){

		$post = $_POST;
		$data['title'] = 'Registrar Sub Coordinador';
		$data['image'] = 'logo-fp.png';
		$data['content'] = 'registrar/registro';
		$this_url = base_url('registrar/subcoordinador');

		if ($post) {
			$cedula = str_replace('-', '', trim($_POST['cedula']));

			if (!$this->Gestion->get_subcoordinador($cedula)) {

				if ($result = $this->Gestion->get_person_padron($cedula)) {
					if ($this->verifyBirthDate($result->FechaNacimiento, $_POST['fecha_nacimiento'])) {
						$this->Gestion->save_subcoordinador($result, $post);
						$this->session->set_flashdata('success','Sub Coordinador Registrado Correctamente');
					}else{
						$this->session->set_flashdata('error','Fecha de nacimiento Inválida');
					}
					
				}else{
					$this->session->set_flashdata('error','Cédula Inválida');
					// header("Location: $this_url");
				}
				
			}else{
				$this->session->set_flashdata('alert','Esta persona ya se encuentra registrada');
				// header("Location: $this_url");
			}

			
			redirect($this_url);
			return;
		}

 		$this->load->view('home/plantilla', $data);

	}


	function verifyBirthDate($datePadron, $dateInput){

		$datePadron = date('d/m/Y', strtotime($datePadron));
		$dateInput = date('d/m/Y', strtotime($dateInput));
		return $datePadron != $dateInput ? false : true;
	}

	public function subcoordinadores(){
		$user_id = $_GET['id'];
		$data['title'] = 'Mis Registrados';
		$data['image'] = 'logo-fp.png';
		$data['content'] = 'registrar/coordinadores';
		$id = $_SESSION['user']->id;
		$query = $this->db->query("SELECT * FROM sub_coordinadores where user_id = $user_id");

		$data['result'] = $query->result();
		$data['total'] = count($data['result']);

		$user_query = $this->db->query("SELECT * FROM user where id = $user_id");
		$data['user_info'] = $user_query->first_row();

		$this->load->view('home/plantilla', $data);
	}

	function getSession(){
		if (!$_SESSION['user']) {
			redirect(base_url('auth/login'));
		}else{
			if (!$this->Gestion->get_user($_SESSION['user']->username)) {
			session_destroy();
			redirect(base_url('auth/login'));
				
			}
		}
	}

	

	function eliminarSub(){

		$id = $_GET['id'];
		$this->db->where('id', $id);
		$this->db->delete('sub_coordinadores');

		$this->session->set_flashdata('success','Sub Coordinador Eliminado Correctamente');
		redirect(base_url('registrar/listadoSub'));
	}

	function editar_sub(){

		$cedula = $_GET['cedula'];

		$data['title'] = 'Editar Usuario';
		$data['content'] = 'registrar/editar-subcoordinador';

		$url = base_url('registrar/listadoSub');

		$post = $_POST;
		$data['info'] = $this->Gestion->get_subcoordinador($cedula);

		if ($post) {
			$this->Gestion->updateSubCoordinador($cedula, $post['celular'], $post['mesa']);
			$this->session->set_flashdata('success','Datos Actualizados Correctamente');
			header("Location: $url");
		}

		$this->load->view('home/plantilla', $data);
	}
}
