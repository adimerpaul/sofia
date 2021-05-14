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
            $query=$this->db->query("
         SELECT t.CodAut,t.Producto,t.TipPro,t.codUnid,t.Peso,s.Saldo Cant,t.Precio,t.Precio_Costo,
         t.Precio3,t.Precio4,t.Precio5,t.Precio6,t.Precio7,t.Precio8,t.Precio9,Precio10,Precio11,t.Precio12,
         gp.Descripcion
         FROM tbproductos t INNER JOIN tbstockm s ON s.cod_prod=t.cod_prod
         INNER JOIN tbgrupos g ON t.cod_grup=g.Cod_grup
         INNER JOIN tbgrupopadre gp ON g.Cod_pdr=gp.cod_grup
         WHERE t.cod_prod='$id'");
//            if ($query->num_rows()==0){
//                echo "-1";
//            }
        echo json_encode($query->row());
    }
    public function pedido(){
//        echo $_POST['idcliente'];
//        exit;
//        $query=$this->db->query();
        $query=$this->db->query("SELECT max(NroPed) as maximo FROM `tbpedidos`");
        $row=$query->row();
        $numpedido=$row->maximo+1;
        var_dump($_POST);
        //exit;
        $CIfunc=$_SESSION['CodAut'];
        $query=$this->db->query("SELECT * FROM `tbproductos`");
        foreach ($query->result() as $row){
//            echo "id".$row->cod_prod."";
            if (isset($_POST["id".trim($row->cod_prod)])){
                //echo $row->Producto;
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
//        echo "aa";
        header('Location: '.base_url().'Admin');
    }
}
