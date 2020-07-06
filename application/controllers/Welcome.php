<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function login(){
	   $Nombre1=$_POST['name'];
	   $pasw=$_POST['password'];
	   $query=$this->db->query("SELECT * FROM personal WHERE TRIM(ci)='$Nombre1' AND TRIM(pasw)='$pasw'");
//	   echo $query->num_rows();
	   if ($query->num_rows()==1){
	       $row=$query->row();
	       $_SESSION['nombre1']=$row->Nombre1;
           $_SESSION['CodAut']=$row->CodAut;
           header('Location: '.base_url().'Admin');
       }else{
           header('Location: '.base_url().'');
       }
    }
    public function logout(){
	    session_destroy();
        header('Location: '.base_url());
    }
}
