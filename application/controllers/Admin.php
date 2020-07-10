<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function index()
    {
        if (!isset($_SESSION['nombre1'])){
            header('Location: '.base_url());
        }
        $this->load->view('templates/header');
        $this->load->view('admin');
        $this->load->view('templates/footer');
    }
    public function product(){
        $id= $_POST['id'];
        $query=$this->db->query("SELECT * FROM tbproductos WHERE CodAut='$id'");
        echo json_encode($query->row());
    }
    public function pedido(){
//        $query=$this->db->query();
        $query=$this->db->query("SELECT max(NroPed) as maximo FROM `tbpedidos`");
        $row=$query->row();
        $numpedido=$row->maximo+1;
        $CIfunc=$_SESSION['CodAut'];
        $query=$this->db->query("SELECT * FROM `tbproductos`");
        foreach ($query->result() as $row){
            if (isset($_POST["id".$row->CodAut])){
//                echo $row->Producto;
                $this->db->query("INSERT INTO tbpedidos SET
`NroPed`='$numpedido',
`cod_prod`='".$row->CodAut."',
`CIfunc`='$CIfunc',
 `idCli`='".$_POST['idcliente']."',
 `Cant`='".$_POST['cantidad'.$row->CodAut]."',
 `precio`='".$_POST['precio'.$row->CodAut]."',
 `Canttxt`='".$_POST['extra'.$row->CodAut]."',
 `fecha`='".date("Y-m-d H:i:s")."';");
            }
        }
//        echo "aa";
    }
}
