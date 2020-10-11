<style>
    /*.modal-dialog {*/
    /*    width: 100%;*/
    /*    height: 100%;*/
    /*    margin: 0;*/
    /*    padding: 0;*/
    /*}*/

    /*.modal-content {*/
    /*    height: auto;*/
    /*    min-height: 100%;*/
    /*    border-radius: 0;*/
    /*}*/
    /*.modal-dialog {*/
    /*    width: 90%;*/
    /*    height: 90%;*/
    /*    padding: 0;*/
    /*}*/

    /*.modal-content {*/
    /*    height: 90%;*/
    /*}*/
</style>
<header class="page-header">
    <h2>Mis pedidos</h2>
    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="<?=base_url()?>Admin">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Sistema</span></li>
            <!--                        <li><span>Advanced</span></li>-->
        </ol>
        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>
<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>
        <div class="row">
            <div class="col-xs-6"><h2 class="panel-title">Buscar cliente</h2></div>
            <div class="col-xs-6"><a href="<?=base_url()?>Mispedidos" class="btn btn-sm btn-info"> <i class="fa fa-refresh"></i> Actualizar</a></div>
        </div>
    </header>
    <div class="panel-body">
        <div class="modal fade" id="modalBootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Realizar pedidos</h4>
                    </div>
                    <div class="modal-body">
                        <form id="agregarpedido">
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                    <tr class="bg bg-primary">
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Extra</th>
                                        <th>Cancelar</th>
                                    </tr>
                                    </thead>
                                    <tbody id="contenido">
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning "> <i class="fa fa-pencil"></i> Modificar</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal"> <i class="fa fa-eye"></i> Ocultar</button>
                        <button type="button" id="deletepedido" class="btn btn-danger "> <i class="fa fa-trash-o"></i> Eliminar </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            var idpedido;
            function  seleccionar(id){
                idpedido=id;
                $('#contenido').html('');
                $.ajax({
                   url:'Mispedidos/product/'+id,
                    success:function (e) {
                        let dat =JSON.parse(e);
                        // console.log(dat);
                        dat.forEach(res=>{
                            $('#contenido').append("<tr>\n" +
                                "<td>"+res.Producto+" <input hidden name='id"+res.cod_prod+"' value='"+res.cod_prod+"'></td>\n" +
                                "<td>"+parseFloat(res.precio).toFixed(2)+"<input hidden name='idpedido"+res.cod_prod+"' value='"+res.codAut+"'></td>\n" +
                                "<td><input type='number' class='form-control'  name='cantidad"+res.cod_prod+"' value='"+res.Cant+"'></td>\n" +
                                "<td>"+res.Canttxt+"  <input hidden name='extra"+res.cod_prod+"' value='"+res.Canttxt+"'></td>\n" +
                                "<td><button class='btn btn-danger p-1 eliproducto' id-pedido='"+res.codAut+"'><i class='fa fa-trash-o'></i></button></td>\n" +
                                "</tr>");
                        })
                    }
                });
                // console.log(idcliente);
            }
        </script>
        <form action="<?=base_url()?>Mispedidos/enviar" method="post">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombres</th>
                <th>Cant.</th>
                <th class="hidden-phone">Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query=$this->db->query("SELECT NroPed,Nombres,estado,count(*) cantidad 
FROM tbpedidos p 
INNER JOIN tbclientes c ON c.Cod_Aut=p.idCli 
WHERE CIfunc='7' AND estado='CREADO'
GROUP BY NroPed,Nombres");
            foreach ($query->result() as $row){
                echo "<tr class='gradeX'>
                    <td>$row->NroPed <input name='id$row->NroPed' value='$row->NroPed' hidden></td>
                    <td>$row->Nombres</td>
                    <td>$row->cantidad</td>
                    <td class='center hidden-phone'><a class='mb-xs mt-xs mr-xs btn btn-warning ' onclick='seleccionar($row->NroPed)'  data-toggle='modal' data-target='#modalBootstrap'> <i class='fa fa-eye-slash'></i> Ver </a></td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
            <button id="enviar" class="btn btn-success btn-block btn-sm"><i class="fa fa-check"></i>Enviar Todos los productos</button>
        </form>
    </div>
</section>
<script>
    window.onload=function (e) {
        var idproducto;

        $("#contenido").on("click",".eliproducto", function(e){
            e.preventDefault();
            if (confirm("Seguro de eliminar?")){
                let idpedi=($(this).attr('id-pedido'));
                $.ajax({
                    url:'Mispedidos/eliminarpedido/'+idpedi,
                    success:function (e) {
                        // console.log(e);
                        // $(this).closest('tr').remove();
                        $('#modalBootstrap').modal('hide');
                    }
                })
            }
        });
        $('#agregarpedido').submit(function (e) {
            var formData = $("#agregarpedido").serializeArray();
            if (formData.length==0){
                alert('Tienes que tener productos!!');
            }else{
                //console.log($("#agregarpedido").serialize());
                formData.push({name:"idpedido",value:idpedido})
                // console.log(formData);
                // return false;
                // console.log(formData);
                $.ajax({
                    type: 'POST',
                    url:'Mispedidos/pedido',
                    data:formData,
                    success:function (e) {
                        // console.log(e);
                        alert("Se Modifico el pedido exitosamente!!")
                        // $('#contenido').html('');
                        $('#modalBootstrap').modal('hide');
                        // $('#total').html('0')
                        // $('#extra').val('')
                        // console.log(e);
                    }
                })
            }
            return false;
        });
        $('#deletepedido').click(function () {
            if (confirm("Seguro de eliminar?")){
                $.ajax({
                    url:'Mispedidos/deletepedido/'+idpedido,
                    success:function (e) {
                        // $('#modalBootstrap').modal('hide');
                        location.reload();
                    }
                })
            }
        });
        $('#enviar').click(function (e) {
            if (!confirm('Seguro de enviar todo los pedidos'))
                e.preventDefault();
        });
    }
</script>
