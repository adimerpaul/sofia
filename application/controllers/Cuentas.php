<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cuentas extends CI_Controller {
    public function index(){
        if (!isset($_SESSION['nombre1'])){
            header('Location: '.base_url());
        }
        $this->load->view('templates/header');
        $this->load->view('cuentas');
        $this->load->view('templates/footer');
    }
    public function insert(){
        $idCli=$_POST['idCli'];
        $pago=$_POST['pago'];
        $CIfunc=$_SESSION['CodAut'];
                $this->db->query("INSERT INTO tbctascow SET
        `idCli`='$idCli',
        `pago`='".$pago."',
        `CIfunc`='$CIfunc',
         `fecha`='".date("Y-m-d H:i:s")."';");
        header('Location: '.base_url().'Cuentas');
    }
}
