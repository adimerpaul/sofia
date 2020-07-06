<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cobrar extends CI_Controller {
    public function index()
    {
        if (!isset($_SESSION['nombre1'])){
            header('Location: '.base_url());
        }
        $this->load->view('templates/header');
        $this->load->view('cobrar');
        $this->load->view('templates/footer');
    }
    public function deudas($ci){
        $query=$this->db->query("
SELECT * FROM tbctascobrar c
INNER JOIN tbclientes cli ON cli.Id=c.CINIT
INNER JOIN tbventas v ON c.comanda=v.Comanda
INNER JOIN tbproductos p ON p.cod_prod=v.cod_pro
WHERE c.CINIT='$ci'
ORDER BY c.comanda");
        echo json_encode($query->result_array());
    }
}
