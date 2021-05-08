<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mispedidos extends CI_Controller {
    public function index()
    {
        if (!isset($_SESSION['nombre1'])){
            header('Location: '.base_url());
        }
        $this->load->view('templates/header');
        $this->load->view('mispedidos');
        $this->load->view('templates/footer');
    }
    public function product($id){
        $query=$this->db->query("
SELECT *
FROM tbpedidos p 
INNER JOIN tbproductos pr ON p.cod_prod=pr.cod_prod 
WHERE p.NroPed='$id'");
        echo json_encode($query->result_array());
    }
    public function eliminar($id){
        $this->db->query("DELETE FROM tbpedidos WHERE  NroPed='$id'");
        header('Location: '.base_url().'Mispedidos');
    }
    public function pedido(){
//        $query=$this->db->query();
        $numpedido=$_POST['idpedido'];
//        $query=$this->db->query("SELECT * FROM `tbproductos`");
//        foreach ($query->result() as $row){
////            echo $row->CodAut."-";
//            if (isset($_POST["id".$row->CodAut])){
////                echo $row->Producto;
//                $this->db->query("UPDATE  tbpedidos SET
//                 `Cant`='".$_POST['cantidad'.$row->CodAut]."'
//                 WHERE `NroPed`='$numpedido' AND codAut='".$_POST['idpedido'.$row->CodAut]."';"
//                );
//            }
//        }
//        echo "aa";


        $this->db->query("DELETE FROM tbpedidos WHERE NroPed='$numpedido'");
        $CIfunc=$_SESSION['CodAut'];
        $query=$this->db->query("SELECT * FROM `tbproductos`");
//        var_dump($_POST);
        foreach ($query->result() as $row){
            if (isset($_POST["id".trim($row->cod_prod)])){
                echo trim($row->cod_prod)."-XXXXXX";

                $this->db->query("INSERT INTO tbpedidos SET
`NroPed`='$numpedido',
`cod_prod`='".trim($row->cod_prod)."',
`CIfunc`='$CIfunc',
 `idCli`='".$_POST['idcliente']."',
 `impreso`='0',
 `pagado`='0',
 `Cant`='".$_POST['cantidad'.trim($row->cod_prod)]."',
 `Tipo1`='".$_POST['t1'.trim($row->cod_prod)]."',
 `Tipo2`='".$_POST['t2'.trim($row->cod_prod)]."',
 `precio`='".$_POST['precio'.trim($row->cod_prod)]."',
  `subtotal`='".$_POST['subtotal'.trim($row->cod_prod)]."',
 `Canttxt`='".$_POST['extra'.trim($row->cod_prod)]."',
 `fecha`='".date("Y-m-d H:i:s")."';");
            }
        }

//        $this->db->query("SELECT NroPed FROM tbpedidos GROUP BY NroPed");
//        $query=$this->db->query("SELECT NroPed FROM tbpedidos GROUP BY NroPed");
//        foreach ($query->result() as $row){
////            echo $_POST["id".$row->NroPed];
//            if (isset($_POST["id".$row->NroPed])){
//                $this->db->query("UPDATE  tbpedidos SET
//                 estado='ENVIADO'
//                 WHERE  NroPed='$row->NroPed';"
//                );
//            }
//        }
    }
    public function eliminarpedido($id){
        $this->db->query("DELETE FROM tbpedidos WHERE  codAut='$id'");
    }
    public function deletepedido($id){
        $this->db->query("DELETE FROM tbpedidos WHERE  NroPed='$id'");
    }
    public function enviar(){
        $query=$this->db->query("SELECT NroPed FROM tbpedidos GROUP BY NroPed");
        foreach ($query->result() as $row){
//            echo $_POST["id".$row->NroPed];
            if (isset($_POST["id".$row->NroPed])){
                $this->db->query("UPDATE  tbpedidos SET
                 estado='ENVIADO'
                 WHERE  NroPed='$row->NroPed';"
                );
            }
        }
        header('Location: '.base_url().'Miscobros');
    }
}
