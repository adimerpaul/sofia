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
//    public function deuda($ci){
//        $query=$this->db->query("
//SELECT * FROM tbctascobrar c
//INNER JOIN tbclientes cli ON cli.Id=c.CINIT
//WHERE c.CINIT='$ci'
//ORDER BY c.comanda");
//        echo json_encode($query->result_array());
//    }
    public function deudas($ci){
        $query=$this->db->query("
SELECT * FROM tbctascobrar c
INNER JOIN tbclientes cli ON cli.Id=c.CINIT
INNER JOIN tbventas v ON c.comanda=v.Comanda
INNER JOIN tbproductos p ON p.cod_prod=v.cod_pro
WHERE c.CINIT='$ci' AND c.Nrocierre=0
ORDER BY c.comanda");
        echo json_encode($query->result_array());
    }
    public function deudas2($ci){
        $query=$this->db->query("
SELECT * FROM tbctascobrar c
INNER JOIN tbclientes cli ON cli.Id=c.CINIT
WHERE c.CINIT='$ci' AND c.Nrocierre=0
ORDER BY c.comanda");
        echo json_encode($query->result_array());
    }
    public function pagado($ci,$monto){
        if (!isset($_SESSION['nombre1'])){
            header('Location: '.base_url());
        }

        $CIfunc=$_SESSION['CodAut'];
        $this->db->query("INSERT INTO tbctascow SET
        `idCli`='$ci',
        `pago`='".$monto."',
        `CIfunc`='$CIfunc',
         `fecha`='".date("Y-m-d H:i:s")."';");

        $query=$this->db->query("
        SELECT * FROM tbctascobrar c
        INNER JOIN tbclientes cli ON cli.Id=c.CINIT
        WHERE c.CINIT='$ci' AND  c.Nrocierre=0
        ORDER BY c.comanda");
        foreach ($query->result() as $row){
//            if($row->Acuenta>=$row->Importe && $monto==0){
//
//            }else{
//                if($row->Acuenta!=0 && $monto!=0){
//                    $diferencia=$row->Importe-$row->Acuenta;
//                    if($monto>=$diferencia && $monto!=0){
//                        $this->db->query("UPDATE tbctascobrar SET Acuenta=Importe WHERE codAuto='$row->CodAuto'");
//                        $monto=$monto-$diferencia;
//                    }else{
//                        $this->db->query("UPDATE tbctascobrar SET Acuenta=Acuenta+$monto WHERE codAuto='$row->CodAuto'");
//                        $monto=0;
//                    }
////                    $this->db->query("UPDATE tbctascobrar SET Acuenta=Importe WHERE codAuto='$row->CodAuto'");
//                }else if($monto>=$row->Importe && $monto!=0){
//                    $this->db->query("UPDATE tbctascobrar SET Acuenta=Importe WHERE codAuto='$row->CodAuto'");
//                    $monto=$monto-$row->Importe;
//                }else{
//                    $this->db->query("UPDATE tbctascobrar SET Acuenta=$monto WHERE codAuto='$row->CodAuto'");
//                    $monto=0;
//                }
//            }
            $saldo=$row->Importe-$row->Acuenta;
            if($monto>0 && $saldo!=0){
                if ($monto>$saldo){
                    $this->db->query("UPDATE tbctascobrar SET Acuenta=Importe WHERE codAuto='$row->CodAuto'");
                    $monto=$monto-$saldo;
                }else{
                    $this->db->query("UPDATE tbctascobrar SET Acuenta=Acuenta+$monto WHERE codAuto='$row->CodAuto'");
                    $monto=0;
                }
            }
        }
        echo 1;
    }
    public function insertcobro(){
//        var_dump($_POST);
//        exit();
        $ci=$_POST['ci'];
        $monto=$_POST['monto'];
        $CIfunc=$_SESSION['CodAut'];
//        $this->db->query("INSERT INTO tbctascow SET
//        `idCli`='$ci',
//        `pago`='".$monto."',
//        `CIfunc`='$CIfunc',
//         `fecha`='".date("Y-m-d H:i:s")."';");

        $query=$this->db->query("
SELECT * FROM tbctascobrar c
WHERE c.CINIT='$ci' AND c.Nrocierre=0");
        foreach ($query->result() as $row){
            if (isset($_POST['id'.$row->CodAuto]) && $_POST['id'.$row->CodAuto]!='' && $_POST['id'.$row->CodAuto]!=null){
                $monto=$_POST['id'.$row->CodAuto];
                $comanda=$row->CodAuto;
//                echo $monto."---$row->CodAuto<br>";
//                if($monto>0 && $saldo!=0){
////                    if ($monto>$saldo){
//                        $this->db->query("UPDATE tbctascobrar SET Acuenta=Importe WHERE codAuto='$row->CodAuto'");
//                        $monto=$monto-$saldo;
////                    }else{
                        $this->db->query("INSERT INTO tbctascow 
                        SET 
                        pago='$monto',
                        idCli='$ci',
                        CIfunc='$CIfunc',
                         fecha='".date("Y-m-d H:i:s")."',
                         comanda='$comanda'
                        ");
////                        $monto=0;
////                    }
//                }
            }
        }
//        $query=$this->db->query("
//SELECT * FROM tbctascobrar c
//INNER JOIN tbclientes cli ON cli.Id=c.CINIT
//WHERE c.CINIT='$ci' AND c.Nrocierre=0
//ORDER BY c.comanda");
//        if ($monto>0)
//            foreach ($query->result() as $row){
////                if (isset($_POST['id'.$row->comanda])){
//                    $saldo=$row->Importe-$row->Acuenta;
////                    echo $row->Importe."  ".$row->Acuenta."<br>";
//                    if($monto>0 &&  intval( $saldo)!=0){
//                        $this->db->query("UPDATE tbctascobrar SET Acuenta=Acuenta+$monto WHERE codAuto='$row->CodAuto'");
//                        $monto=0;
////                    }
//                }
//            }
        header('Location: '.base_url().'Cobrar');
    }
}
