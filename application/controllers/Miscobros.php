<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Miscobros extends CI_Controller {
    public function index()
    {
        if (!isset($_SESSION['nombre1'])){
            header('Location: '.base_url());
        }
        $this->load->view('templates/header');
        $this->load->view('miscobros');
        $this->load->view('templates/footer');
    }
    public function product($id){
        $query=$this->db->query("SELECT p.codAut,Producto,p.cod_prod,p.Cant,p.Canttxt,p.precio FROM tbpedidos p INNER JOIN tbproductos pr ON p.cod_prod=pr.CodAut WHERE p.NroPed='$id'");
        echo json_encode($query->result_array());
    }
    public function pedido(){
//        $query=$this->db->query();
        $numpedido=$_POST['idpedido'];
        $query=$this->db->query("SELECT * FROM `tbproductos`");
        foreach ($query->result() as $row){
//            echo $row->CodAut."-";
            if (isset($_POST["id".$row->CodAut])){
//                echo $row->Producto;
                $this->db->query("UPDATE  tbpedidos SET
                 `Cant`='".$_POST['cantidad'.$row->CodAut]."'
                 WHERE `NroPed`='$numpedido' AND codAut='".$_POST['idpedido'.$row->CodAut]."';"
                );
            }
        }
//        echo "aa";
    }
    public function eliminarpedido($id){
        $this->db->query("DELETE FROM tbpedidos WHERE  codAut='$id'");
    }
    public function deletepedido($id){
        $this->db->query("DELETE FROM tbpedidos WHERE  NroPed='$id'");
    }
    public function enviar(){
        $query=$this->db->query("SELECT codAut FROM tbctascow GROUP BY codAut");
        foreach ($query->result() as $row){
//            echo $_POST["id".$row->codAut];
            if (isset($_POST["id".$row->codAut])){
                $this->db->query("UPDATE  tbctascow SET
                 estado='ENVIADO'
                 WHERE  codAut='$row->codAut';"
                );
            }
        }
        header('Location: '.base_url().'Miscobros');
    }
}
