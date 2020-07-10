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
    .modal-dialog {
        width: 90%;
        height: 90%;
        padding: 0;
    }

    /*.modal-content {*/
    /*    height: 90%;*/
    /*}*/
</style>
<header class="page-header">
    <h2>Cuentas Clientes</h2>
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
        <h2 class="panel-title">Cuentas Cliente</h2>
    </header>
    <div class="panel-body">
        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success" href="#modalAnim"> <i class="fa fa-plus-circle"></i> Registrar Nueva cuenta</a>
        <div id="modalAnim" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Agregar nuevo cuantas por cobrar</h2>
                </header>
                <div class="panel-body">
                    <div class="modal-wrapper">
                        <div class="modal-icon">
                            <i class="fa fa-question-circle"></i>
                        </div>
                        <div class="modal-text">
                            <form class="form-horizontal" action="<?=base_url()?>Cuentas/insert" method="post">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputSuccess">Cliente</label>
                                    <div class="col-md-6">
                                        <select class="form-control mb-md" required name="idCli">
                                            <option value="">Selecionar...</option>
                                            <?php
                                            $query=$this->db->query("SELECT * FROM `tbclientes` ORDER BY Nombres");
                                            foreach ($query->result() as $row){
                                                echo "<option value='$row->Cod_Aut'>$row->Nombres</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputSuccess">Pago</label>
                                    <div class="col-md-6">
                                        <input class="form-control mb-md" name="pago" type="number" placeholder="Pago..." min="0" required>
                                    </div>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-success"  > <i class="fa fa-plus-circle" style="color: white"></i> Registrar</button>
                                            <button class="btn btn-danger modal-dismiss" > <i class="fa fa-trash-o" style="color: white"></i> Cancelar </button>
                                        </div>
                                    </div>
                                </footer>
                            </form>
                        </div>
                    </div>
                </div>

            </section>
        </div>
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Nombres</th>
                <th>Telefono</th>
                <th class="hidden-phone">Pago</th>
<!--                <th class="hidden-phone">Opciones</th>-->
            </tr>
            </thead>
            <tbody>
            <?php
            $query=$this->db->query("SELECT * FROM tbclientes c
INNER JOIN tbctascow co ON c.Cod_Aut=co.idCli");
            foreach ($query->result() as $row){
                echo "<tr class='gradeX'>
                    <td>$row->fecha</td>
                    <td>$row->Nombres</td>
                    <td>$row->Telf</td>
                    <td class='center hidden-phone'>$row->pago</td>
                   
                </tr>";
            }
            ?>

            </tbody>
        </table>
    </div>
</section>
<script>
    window.onload=function (e) {
        var idcliente;
        var idproducto;
        $('#producto').change(function (e) {
            // console.log($(this).val());
            idproducto=$(this).val()
            $.ajax({
                url:'Admin/product',
                type:'POST',
                data:'id='+idproducto,
                success:function (e) {
                    // console.log(e);
                    dat = JSON.parse(e);
                    // console.log(dat);
                    $('#codigo').val(dat.CodAut);
                    $('#nombre').val(dat.Producto);
                    $('#generico').val('');
                    $('#tipo').val(dat.TipPro);
                    $('#unidad').val(dat.codUnid);
                    $('#peso').val(dat.Peso);
                    // $('#precio').val(dat.Precio);
                    // $('#precio2').val(dat.Precio3);
                    // $('#precio3').val(dat.Precio4);
                    // $('#precio4').val(dat.Precio5 );
                    // $('#preciocosto').val(dat.PreCosto);
                    $('#precio1').val(parseFloat(dat.Precio).toFixed(2));
                    $('#labelprecio1').html(parseFloat(dat.Precio).toFixed(2));

                    $('#precio2').val(parseFloat(dat.Precio_Costo).toFixed(2));
                    $('#labelprecio2').html(parseFloat(dat.Precio_Costo).toFixed(2));

                    $('#precio3').val(parseFloat(dat.Precio3).toFixed(2));
                    $('#labelprecio3').html(parseFloat(dat.Precio3).toFixed(2));

                    $('#precio4').val(parseFloat(dat.Precio4).toFixed(2));
                    $('#labelprecio4').html(parseFloat(dat.Precio4).toFixed(2));

                    $('#precio5').val(parseFloat(dat.Precio5).toFixed(2));
                    $('#labelprecio5').html(parseFloat(dat.Precio5).toFixed(2));

                    $('#precio6').val(parseFloat(dat.Precio6).toFixed(2));
                    $('#labelprecio6').html(parseFloat(dat.Precio6).toFixed(2));

                    $('#precio7').val(parseFloat(dat.Precio7).toFixed(2));
                    $('#labelprecio7').html(parseFloat(dat.Precio7).toFixed(2));

                    $('#precio8').val(parseFloat(dat.Precio8).toFixed(2));
                    $('#labelprecio8').html(parseFloat(dat.Precio8).toFixed(2));

                    $('#precio9').val(parseFloat(dat.Precio9).toFixed(2));
                    $('#labelprecio9').html(parseFloat(dat.Precio9).toFixed(2));

                    $('#precio10').val(parseFloat(dat.Precio10).toFixed(2));
                    $('#labelprecio10').html(parseFloat(dat.Precio10).toFixed(2));

                    $('#precio11').val(parseFloat(dat.Precio11).toFixed(2));
                    $('#labelprecio11').html(parseFloat(dat.Precio11).toFixed(2));

                    $('#precio12').val(parseFloat(dat.Precio12).toFixed(2));
                    $('#labelprecio12').html(parseFloat(dat.Precio12).toFixed(2));

                }
            })
        });
        // $('#modalBootstrap').on('show.bs.modal', function (e) {
        //     if (!data) return e.preventDefault() // stops modal from being shown
        // })
        $('.select').click(function (e) {
            // console.log($(this).attr('data-id'));
            idcliente=$(this).attr('data-id');
            // console.log(idcliente);
        });

        $('#formulario').submit(function (e) {

            var precio=$('input[name=precio]:checked', '#formulario').val();
            // console.log(precio);
            if( parseInt(precio)==0){
                alert('nose puede escoger un precio 0');
                return false;
            }else{
                var cantidad= parseInt( $('#cantidad').val());
                var subtotal=cantidad*parseFloat(precio);
                var nombre=$('#nombre').val();
                var extra=$('#extra').val();
                // console.log(cantidad);
                $('#contenido').append("<tr>\n" +
                    "                                    <td>"+nombre+" <input hidden name='id"+idproducto+"' value='"+idproducto+"'></td>\n" +
                    "                                    <td>"+parseFloat(precio).toFixed(2)+"<input hidden name='precio"+idproducto+"' value='"+parseFloat(precio).toFixed(2)+"'></td>\n" +
                    "                                    <td>"+cantidad+"  <input hidden name='cantidad"+idproducto+"' value='"+cantidad+"'></td>\n" +
                    "                                    <td>"+extra+"  <input hidden name='extra"+idproducto+"' value='"+extra+"'></td>\n" +
                    "                                    <td><span>"+parseFloat(subtotal).toFixed(2)+" Bs.</span><input class='subtotal' name='s"+idproducto+"' value='"+parseFloat(subtotal).toFixed(2)+"' hidden > </td>" +
                    "<td><button class='btn btn-danger p-1 eliproducto'><i class='fa fa-trash-o'></i></button></td>\n" +
                    "                                </tr>");
                calcular_total();
                $('#extra').val('')
            }
            return false;
        });
        function calcular_total() {
            importe_total = 0;
            // console.log('a');
            $(".subtotal").each(
                function(index, value) {
                    importe_total = importe_total + eval($(this).val());
                }
            );
            // $('#to').html(importe_total);
            $('#total').html(importe_total.toFixed(2)+" Bs.");
        }
        $("#contenido").on("click",".eliproducto", function(e){
            e.preventDefault();
            if (confirm("Seguro de cancelar?")){
                $(this).closest('tr').remove();
                calcular_total();
            }
        });
        $('#agregarpedido').submit(function (e) {
            var formData = $("#agregarpedido").serializeArray();
            if (formData.length==0){
                alert('Tienes que tener productos!!');
            }else{
                //console.log($("#agregarpedido").serialize());
                formData.push({name:"idcliente",value:idcliente})
                // console.log(formData);
                $.ajax({
                    type: 'POST',
                    url:'Admin/pedido',
                    data:formData,
                    success:function (e) {
                        alert("Se guardo el pedido exitosamente!!")
                        $('#contenido').html('');
                        $('#modalBootstrap').modal('hide');
                        $('#total').html('0')
                        $('#extra').val('')
                        // console.log(e);
                    }
                })
            }
            return false;
        });
    }
</script>
