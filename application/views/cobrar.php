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
    <h2>Cuentas</h2>
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
        <h2 class="panel-title">Cuentas por cobrar</h2>
    </header>
    <div class="panel-body">


        <div class="modal fade" id="modalBootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cuentas por cobrar?</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal form-bordered" id="formulario" method="post">
                            <div class="form-group">
                                <div class="col-xs-3">
                                    <label class="control-label">CINIT</label>
                                    <input type="text" name="ci" id="ci" class="form-control" required>
                                </div>
                                <div class="col-xs-9">
                                    <label class="control-label">Nombre Completo</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                                </div>
<!--                            </div>-->
<!--                            <div class="form-group">-->

<!--                                <div class="col-md-3">-->
<!--                                    <label class="control-label">A cuenta</label>-->
<!--                                    <input type="text" name="acuenta" id="acuenta" class="form-control" required>-->
<!--                                </div>-->
<!--                                <div class="col-md-2">-->
<!--                                    <label class="control-label">A cuentas</label>-->
<!--                                    <button class="btn btn-success"><i class="fa fa-money"></i> A cuenta</button>-->
<!--                                </div>-->
<!--                                <div class="col-md-5">-->
<!--                                    <label class="control-label">Nombre generico</label>-->
<!--                                    <input type="text" name="generico" id="generico" class="form-control">-->
<!--                                </div>-->
<!--                                <div class="col-md-2">-->
<!--                                    <label class="control-label">Tipo de producto</label>-->
<!--                                    <input type="text" name="tipo" id="tipo" class="form-control">-->
<!--                                </div>-->
                            </div>

                        </form>
                        <form class="form-horizontal form-bordered" method="post" action="<?=base_url()?>Cobrar/insertcobro">
                            <div class="form-group col-xs-12" id="cuentas">
<!--                                <div class="checkbox-custom checkbox-default">-->
<!--                                    <input type="checkbox" checked="" id="checkboxExample1">-->
<!--                                    <label for="checkboxExample1">Checkbox Default</label>-->
<!--                                </div>-->
                            </div>
                            <div class="col-xs-12">
                                <label > <span id="totalcuentas">0</span> Bs</label>
                                <input type="text" class="form-control" name="monto" id="montopagado"  placeholder="Monto recibido">
                                <input type="text" id="cicliente" hidden name="ci">
                                <label class="bg bg-primary ">TOTAL <span id="total"></span></label>
                                <!--                                    <input type="text" name="total" id="total" class="form-control"  disabled>-->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="btncobro" disabled class="btn btn-warning" > <i class="fa fa-check-circle"></i> Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash-o"></i> Close</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <script>
            var idcliente;
            var total=0;
            function datosfun() {
                $('#accordionSuccess').html('');
                $('#contenido').html('');
                // console.log(idcliente);
                $.ajax({
                    url:'Cobrar/deudas2/'+idcliente,
                    success:function (e) {
                        // console.log(e);
                        if (e=="[]"){
                            $('#ci').val('SIN DEUDAS');
                            $('#nombre').val('SIN DEUDAS');
                        }else{
                            datos=JSON.parse(e);
                            // console.log(datos);
                            $('#ci').val(datos[0].CINIT);
                            $('#nombre').val(datos[0].Nombres);
                            let comanda="";
                            let cont=0;
                            total=0;
                            $('#cuentas').html('');
                            datos.forEach((res)=>{
                                $('#cuentas').append('' +
                                    '              <div class="checkbox-custom checkbox-primary">\n' +
                                    '                  <input type="checkbox" name="id'+res.comanda+'" class="calcularacuenta" value="'+parseFloat(res.Importe-res.Acuenta).toFixed(2)+'" >\n' +
                                    '                  <label for="checkboxExample3"><div class="label label-default">Comanda'+res.comanda+'</div> <label class="label label-default"> Saldo'+parseFloat(res.Importe-res.Acuenta).toFixed(2)+'</label></label>' +
                                    '              </div>' +
                                    '                 ')
                                // console.log(res);
                                // if(comanda!=res.Comanda){
                                //     // console.log(res.Comanda);
                                //     comanda=res.Comanda;
                                //     cont=cont+1;
                                    total=total+ parseFloat( parseFloat(res.Importe-res.Acuenta).toFixed(2));
                                //     $('#accordionSuccess').append("" +
                                //         "<div class=\"panel panel-accordion panel-accordion-success\">\n" +
                                //         "      <div class=\"panel-heading\">\n" +
                                //         "                                            <h4 class=\"panel-title\">\n" +
                                //         "                                                <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordionSuccess\" href=\"#collapse"+cont+"\">\n" +
                                //         "                                                    Comanda N°" +comanda+ "  <span class='badge ' >Importe "+parseFloat(res.Importe).toFixed(2)+" </span><span class='badge '> A cuenta "+parseFloat(res.Acuenta).toFixed(2)+" </span><div class='text-right'><span class='badge '> Saldo  "+parseFloat(res.Importe-res.Acuenta).toFixed(2)+"</span></div>"+
                                //         "                                                </a>\n" +
                                //         "                                            </h4>\n" +
                                //         "                                        </div>\n" +
                                //         "                                        <div id=\"collapse"+cont+"\" class=\"accordion-body collapse\">\n" +
                                //         "                                            <div class=\"panel-body\" >\n" +
                                //         "                                                <table>" +
                                //         "<thead>" +
                                //         "<tr><th>Productos</th></tr>" +
                                //         "</thead>" +
                                //         "<tbody id='co"+comanda+"'>" +
                                //         "</table>" +
                                //         "</tbody>" +
                                //         "                                            </div>\n" +
                                //         "      </div>\n" +
                                //         "</div>" +
                                //         "");
                                //
                                // }else{
                                //     $('#co'+comanda).append("<tr>" +
                                //         "<td>"+res.Producto+"</td>" +
                                //         "</tr>" );
                                // }

                                // $('#contenido').append("<tr>" +
                                //     "<td>"+res.Comanda+"</td>" +
                                //     "<td>"+res.Nombres+"</td>" +
                                //     "<td>"+res.Importe+"</td>" +
                                //     "<td>"+res.Acuenta+"</td>" +
                                //     "<td>"+(parseFloat(res.Importe)-parseFloat(res.Acuenta)).toFixed(2)+"</td>" +
                                //     "<td>"+res.Producto+"</td>" +
                                //     "</tr>");$('#contenido').append("<tr>" +
                                //     "<td>"+res.Comanda+"</td>" +
                                //     "<td>"+res.Nombres+"</td>" +
                                //     "<td>"+res.Importe+"</td>" +
                                //     "<td>"+res.Acuenta+"</td>" +
                                //     "<td>"+(parseFloat(res.Importe)-parseFloat(res.Acuenta)).toFixed(2)+"</td>" +
                                //     "<td>"+res.Producto+"</td>" +
                                //     "</tr>");
                            });
                            $('#total').html(total.toFixed(2))
                        }
                    }
                })
            }
            function  seleccionar(id){
                idcliente=id;
                $('#cicliente').val(id);
                // console.log(idcliente);
                datosfun();

            }
        </script>
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
            <tr>
                <th>CINIT</th>
                <th>Deudor</th>
<!--                <th>Telefono </th>-->
<!--                <th class="hidden-phone">A cuenta</th>-->
                <th class="hidden-phone">Deuda</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query=$this->db->query("SELECT * FROM tbclientes");
            foreach ($query->result() as $row){
                echo "<tr class='gradeX'>
                    <td>$row->Id</td>
                    <td>$row->Nombres</td>
                 
                    <td class='center hidden-phone'><a class='mb-xs mt-xs mr-xs btn btn-dark ' onclick='seleccionar($row->Id)'  data-toggle='modal' data-target='#modalBootstrap'> <i class='fa fa-money'></i>Cuentas por cobrar</a></td>
                </tr>";
            }
            ?>

            </tbody>
        </table>
    </div>
</section>
<script>
    window.onload=function (e) {
        $('#montopagado').keyup(function (e) {
            let total=parseFloat($('#total').html());
            let monto=parseFloat($(this).val());
            let acuenta=parseFloat($('#totalcuentas').html());
            console.log(monto>acuenta && monto<=total);
            if (monto>acuenta && monto<=total){
                $('#btncobro').prop("disabled", false);
            }else{
                $('#btncobro').prop('disabled',true);
            }
        });
        // var idcliente;
        var idproducto;
        // $('#producto').change(function (e) {
        //     // console.log($(this).val());
        //     idproducto=$(this).val()
        //     $.ajax({
        //         url:'Admin/product',
        //         type:'POST',
        //         data:'id='+idproducto,
        //         success:function (e) {
        //             // console.log(e);
        //             dat = JSON.parse(e);
        //             // console.log(dat);
        //             $('#codigo').val(dat.CodAut);
        //             $('#nombre').val(dat.Producto);
        //             $('#generico').val('');
        //             $('#tipo').val(dat.TipPro);
        //             $('#unidad').val(dat.codUnid);
        //             $('#peso').val(dat.Peso);
        //             // $('#precio').val(dat.Precio);
        //             // $('#precio2').val(dat.Precio3);
        //             // $('#precio3').val(dat.Precio4);
        //             // $('#precio4').val(dat.Precio5 );
        //             // $('#preciocosto').val(dat.PreCosto);
        //             $('#precio1').val(parseFloat(dat.Precio).toFixed(2));
        //             $('#labelprecio1').html(parseFloat(dat.Precio).toFixed(2));
        //
        //             $('#precio2').val(parseFloat(dat.Precio_Costo).toFixed(2));
        //             $('#labelprecio2').html(parseFloat(dat.Precio_Costo).toFixed(2));
        //
        //             $('#precio3').val(parseFloat(dat.Precio3).toFixed(2));
        //             $('#labelprecio3').html(parseFloat(dat.Precio3).toFixed(2));
        //
        //             $('#precio4').val(parseFloat(dat.Precio4).toFixed(2));
        //             $('#labelprecio4').html(parseFloat(dat.Precio4).toFixed(2));
        //
        //             $('#precio5').val(parseFloat(dat.Precio5).toFixed(2));
        //             $('#labelprecio5').html(parseFloat(dat.Precio5).toFixed(2));
        //
        //             $('#precio6').val(parseFloat(dat.Precio6).toFixed(2));
        //             $('#labelprecio6').html(parseFloat(dat.Precio6).toFixed(2));
        //
        //             $('#precio7').val(parseFloat(dat.Precio7).toFixed(2));
        //             $('#labelprecio7').html(parseFloat(dat.Precio7).toFixed(2));
        //
        //             $('#precio8').val(parseFloat(dat.Precio8).toFixed(2));
        //             $('#labelprecio8').html(parseFloat(dat.Precio8).toFixed(2));
        //
        //             $('#precio9').val(parseFloat(dat.Precio9).toFixed(2));
        //             $('#labelprecio9').html(parseFloat(dat.Precio9).toFixed(2));
        //
        //             $('#precio10').val(parseFloat(dat.Precio10).toFixed(2));
        //             $('#labelprecio10').html(parseFloat(dat.Precio10).toFixed(2));
        //
        //             $('#precio11').val(parseFloat(dat.Precio11).toFixed(2));
        //             $('#labelprecio11').html(parseFloat(dat.Precio11).toFixed(2));
        //
        //             $('#precio12').val(parseFloat(dat.Precio12).toFixed(2));
        //             $('#labelprecio12').html(parseFloat(dat.Precio12).toFixed(2));
        //
        //         }
        //     })
        // });
        // $('#modalBootstrap').on('show.bs.modal', function (e) {
        //     if (!data) return e.preventDefault() // stops modal from being shown
        // })
        // $('.select').click(function (e) {
        //     // console.log($(this).attr('data-id'));
        //     idcliente=$(this).attr('data-id');
        //     console.log(idcliente);
        //     $.ajax({
        //         url:'Cobrar/deudas/'+idcliente,
        //         success:function (e) {
        //             // alert("Se guardo el pedido exitosamente!!")
        //             // $('#contenido').html('');
        //             // $('#modalBootstrap').modal('hide');
        //             // $('#total').html('0')
        //             console.log(e);
        //         }
        //     })
            // $('#contenido').append("<tr>\n" +
            //     "<td>"+nombre+" <input hidden name='id"+idproducto+"' value='"+idproducto+"'></td>\n" +
            //     "<td>"+parseFloat(precio).toFixed(2)+"<input hidden name='precio"+idproducto+"' value='"+parseFloat(precio).toFixed(2)+"'></td>\n" +
            //     "<td>"+cantidad+"  <input hidden name='cantidad"+idproducto+"' value='"+cantidad+"'></td>\n" +
            //     "<td><span>"+parseFloat(subtotal).toFixed(2)+" Bs.</span><input class='subtotal' name='s"+idproducto+"' value='"+parseFloat(subtotal).toFixed(2)+"' hidden > </td>" +
            //     "<td><button class='btn btn-danger p-1 eliproducto'><i class='fa fa-trash-o'></i></button></td>\n" +
            //     "</tr>");
            // calcular_total();
            // console.log(idcliente);
        // });



        // $('#formulario').submit(function (e) {
        //     // console.log(parseFloat($('#total').val())<=parseFloat($('#acuenta').val()));
        //     if ( parseFloat($('#total').val())>=parseFloat($('#acuenta').val()) && $('#acuenta').val()!=0){
        //         $.ajax({
        //             url:'Cobrar/pagado/'+idcliente+'/'+$('#acuenta').val(),
        //             success:function (e) {
        //                 // console.log(e);
        //                 $('#acuenta').val('');
        //                 alert('Insertado correctamente!!!');
        //                 datosfun();
        //             }
        //         })
        //     }else{
        //         alert('Lo siento el sistema aun no permite adelantos!!!!!')
        //     }

            // console.log(idcliente);
            // console.log($('#acuenta').val());
            // var precio=$('input[name=precio]:checked', '#formulario').val();
            // // console.log(precio);
            // if( parseInt(precio)==0){
            //     alert('nose puede escoger un precio 0');
            //     return false;
            // }else{
            //     var cantidad= parseInt( $('#cantidad').val());
            //     var subtotal=cantidad*parseFloat(precio);
            //     var nombre=$('#nombre').val();
            //     // console.log(cantidad);
            //     $('#contenido').append("<tr>\n" +
            //         "                                    <td>"+nombre+" <input hidden name='id"+idproducto+"' value='"+idproducto+"'></td>\n" +
            //         "                                    <td>"+parseFloat(precio).toFixed(2)+"<input hidden name='precio"+idproducto+"' value='"+parseFloat(precio).toFixed(2)+"'></td>\n" +
            //         "                                    <td>"+cantidad+"  <input hidden name='cantidad"+idproducto+"' value='"+cantidad+"'></td>\n" +
            //         "                                    <td><span>"+parseFloat(subtotal).toFixed(2)+" Bs.</span><input class='subtotal' name='s"+idproducto+"' value='"+parseFloat(subtotal).toFixed(2)+"' hidden > </td>" +
            //         "<td><button class='btn btn-danger p-1 eliproducto'><i class='fa fa-trash-o'></i></button></td>\n" +
            //         "                                </tr>");
            //     // calcular_total();
            // }
        //     return false;
        // });

        function calcular_total() {
            importe_total = 0;
            // console.log('a');
            $(".subtotalacuenta").each(
                function(index, value) {
                    importe_total = importe_total + eval($(this).val());
                }
            );
            // $('#to').html(importe_total);
            $('#totalcuentas').html(importe_total.toFixed(2));
        }
        $("#cuentas").on("click",".calcularacuenta", function(e){
            // console.log('aaa');
            // console.log($(this).prop());
            if ($(this).is(":checked"))
            {
                // console.log('esta marcado');
                $(this).addClass('subtotalacuenta');
            }else{
                // console.log('no esta marcado');
                $(this).removeClass('subtotalacuenta');
            }
            calcular_total();
            // e.preventDefault();
            // if (confirm("Seguro de cancelar?")){
            //     $(this).closest('tr').remove();
            //     calcular_total();
            // }
        });
        // $('#agregarpedido').submit(function (e) {
        //     var formData = $("#agregarpedido").serializeArray();
        //     if (formData.length==0){
        //         alert('Tienes que tener productos!!');
        //     }else{
        //         //console.log($("#agregarpedido").serialize());
        //         formData.push({name:"idcliente",value:idcliente})
        //         console.log(formData);
        //         $.ajax({
        //             type: 'POST',
        //             url:'Admin/pedido',
        //             data:formData,
        //             success:function (e) {
        //                 alert("Se guardo el pedido exitosamente!!")
        //                 $('#contenido').html('');
        //                 $('#modalBootstrap').modal('hide');
        //                 $('#total').html('0')
        //                 // console.log(e);
        //             }
        //         })
        //     }
        //     return false;
        // });
    }
</script>
