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
                        <!--                        <p>Are you sure that you want to delete this image?</p>-->
                        <form class="form-horizontal form-bordered" id="formulario" method="post">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Buscar producto</label>
                                <div class="col-md-6">
                                    <select data-plugin-selectTwo class="form-control populate" required id="producto">
                                        <optgroup label="Productos">
                                            <option value="">Seleccionar....</option>
                                            <?php
                                            $query=$this->db->query("SELECT * 
                                            FROM  tbproductos p
                                            INNER JOIN tbgrupos g ON p.cod_grup=g.Cod_grup
                                            INNER JOIN tbgrupopadre gp ON g.Cod_pdr=gp.cod_grup
                                            ");
                                            foreach ($query->result() as $row){
                                                echo "<option value='$row->cod_prod'>$row->cod_prod|$row->Producto</option>";
                                            }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="padding: 0 1em">
                                <div class="col-md-1">
                                    <!--                                        <div class="form-group">-->
                                    <label class="control-label">Codigo</label>
                                    <input type="text" name="codigo" id="codigo" class="form-control" required disabled>
                                    <!--                                        </div>-->
                                </div>
                                <div class="col-md-2">
                                    <!--                                        <div class="form-group">-->
                                    <label class="control-label">Tipo</label>
                                    <input type="text" name="unidad" id="unidad" class="form-control" required disabled>
                                    <!--                                        </div>-->
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">Nombre Comercial/Producto</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Cantidad disponible</label>
                                    <input type="text" name="disponible" id="disponible" class="form-control" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label">Extra</label>
                                    <textarea class="form-control" name="extra" id="extra"></textarea>
                                </div>
                            </div>
                            <div class="form-group" style="padding: 0 0.5em">
                                <div class="col-md-4">
                                    <label class="control-label">Seleccionar Precio</label>
                                    <input type="number" step="0.1" name="precioc" id="precioc" class="form-control" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="" id="labelt1" >Unidades de pollo</label>
                                    <input type="number" step="0.1" name="t1" id="t1" class="form-control" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="" id="labelt2">Corte</label>
                                    <input type="number" step="0.1" name="t2" id="t2" class="form-control" disabled>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="control-label" id="titulocant">Cantidad</label>
                                        <input type="number" value="1" name="cantidad" id="cantidad" min="1" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="control-label">Agregar</label>
                                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form id="agregarpedido">
                            <div class="table-responsive" style="padding-top: 0.5em">
                                <table class="table table-bordered mb-none">
                                    <thead>
                                    <tr class="bg bg-primary">
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Unid o Desmi</th>
                                        <th>Corte</th>
                                        <th>Extra</th>
                                        <th>Subtotal</th>
                                        <th>Cancelar</th>
                                    </tr>
                                    </thead>
                                    <tbody id="contenido">
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning "> <i class="fa fa-plus-circle"></i> Modificar pedido</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-eye"></i> Cerrar</button>
                        <a href="<?=base_url()?>Mispedidos/eliminar/" id="eliminar"  class="btn btn-danger"> <i class="fa fa-trash-o"></i> Cancelar pedido</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <script>

            var idpedido;
            var idcliente;
            var cat;

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
            function  seleccionar(id,idclien,cate){
                idpedido=id;

                idcliente=idclien;
                cat=cate;
                $('#contenido').html('');
                $.ajax({
                   url:'Mispedidos/product/'+id,
                    success:function (e) {
                        let dat =JSON.parse(e);
                        // console.log(dat);
                        dat.forEach(res=>{
                            // console.log(res);
                            //var subtotal=res.Cant*parseFloat(res.precio);
                            $('#eliminar').prop('href','<?=base_url()?>Mispedidos/eliminar/'+res.NroPed)
                            $('#contenido').append("<tr>\n" +
                            "                                    <td>"+res.Producto+" <input hidden name='id"+res.cod_prod.trim()+"' value='"+res.cod_prod.trim()+"'></td>\n" +
                            "                                    <td>"+parseFloat(res.precio).toFixed(2)+"<input hidden name='precio"+res.cod_prod.trim()+"' value='"+parseFloat(res.precio).toFixed(2)+"'></td>\n" +
                            "                                    <td>"+res.Cant+"  <input hidden name='cantidad"+res.cod_prod.trim()+"' value='"+res.Cant+"'></td>\n" +
                            "                                    <td>"+res.Tipo1+"  <input hidden name='t1"+res.cod_prod.trim()+"' value='"+res.Tipo1+"'></td>\n" +
                            "                                    <td>"+res.Tipo2+"  <input hidden name='t2"+res.cod_prod.trim()+"' value='"+res.Tipo2+"'></td>\n" +
                            "                                    <td>"+res.Canttxt+"  <input hidden name='extra"+res.cod_prod.trim()+"' value='"+res.Canttxt+"'></td>\n" +
                            //"                                    <td><span>"+parseFloat(res.subtotal).toFixed(2)+" Bs.</span><input name='subtotal"+res.cod_prod.trim()+"' value='"+parseFloat(res.subtotal).toFixed(2)+"' hidden > </td>" +
                            "                                    <td><input hidden name='subtotal"+parseInt(res.cod_prod.trim())+"' value='"+parseFloat(res.subtotal).toFixed(2)+"'><span>"+parseFloat(res.subtotal).toFixed(2)+" Bs.</span></td>" +

                            "<td><button class='btn btn-danger p-1 eliproducto'><i class='fa fa-trash-o'></i></button></td>\n" +
                            "                                </tr>");
                        })
                    }
                });
                calcular_total();
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
            $query=$this->db->query("SELECT c.Cod_Aut,c.Categoria,NroPed,Nombres,estado,count(*) cantidad 
FROM tbpedidos p 
INNER JOIN tbclientes c ON c.Cod_Aut=p.idCli 
WHERE CIfunc='".$_SESSION['CodAut']."' AND estado='CREADO'
GROUP BY NroPed,Nombres");
            foreach ($query->result() as $row){
                echo "<tr class='gradeX'>
                    <td>$row->NroPed <input name='id$row->NroPed' value='$row->NroPed' hidden></td>
                    <td>$row->Nombres $row->Categoria</td>
                    <td>$row->cantidad</td>
                    <td class='center hidden-phone'><a class='mb-xs mt-xs mr-xs btn btn-warning ' onclick='seleccionar($row->NroPed,$row->Cod_Aut,$row->Categoria)'  data-toggle='modal' data-target='#modalBootstrap'> <i class='fa fa-eye-slash'></i> Ver </a></td>
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
        $('#eliminar').click(function (e) {
            if(confirm('Seguro de eliminar?')){

            }else {
                e.preventDefault();
            }
        });

        $('#producto').change(function (e) {
            $('#t1').val('');
            $('#t2').val('');
            // console.log($(this).val());
            idproducto=$(this).val()
            $.ajax({
                url:'Admin/product',
                type:'POST',
                data:'id='+idproducto,
                success:function (e) {
                    // dat = JSON.parse(e);
                    // console.log(dat) ;
                    if (e=="null"){
                        dat={};
                        dat.CodAut='Nose tiene stock de este productos';
                        dat.Producto='Nose tiene stock de este productos';
                        dat.TipPro='Nose tiene stock de este productos';
                        dat.Descripcion='Nose tiene stock de este productos';
                        dat.Peso='Nose tiene stock de este productos';
                        dat.Cant='Nose tiene stock de este productos';
                    }else{
                        dat = JSON.parse(e);
                    }
                    $('#pre1').hide();
                    $('#pre2').hide();
                    $('#pre3').hide();
                    $('#pre4').hide();
                    $('#pre5').hide();
                    $('#pre6').hide();
                    $('#pre7').hide();
                    $('#pre8').hide();
                    $('#pre9').hide();
                    $('#pre10').hide();
                    $('#pre11').hide();
                    $('#pre12').hide();
                    // console.log( dat.codUnid);
                    $('#pre'+(cat+1)).show();
                    $( "#precio"+(cat+1)).prop( "checked", true );
                    $('#codigo').val(dat.CodAut);
                    $('#nombre').val(dat.Producto);
                    $('#generico').val('');
                    $('#tipo').val(dat.TipPro);
                    $('#unidad').val(dat.Descripcion);
                    $('#peso').val(dat.Peso);
                    $('#disponible').val(dat.Cant);
                    console.log(dat.Descripcion);
                    if (String(dat.Descripcion).trim()=='CARNE DE POLLO'||String(dat.Descripcion).trim()=='CARNE DE CERDO' ||  String(dat.Descripcion).trim()=='CARNE DE RES GANCHO'){
                        $('#precioc').removeAttr('disabled');
                    }else{
                        $('#precioc').attr('disabled','true');
                    }
                    if (String(dat.Descripcion).trim()=='CARNE DE POLLO' || String(dat.Descripcion).trim()=='BANDEJAS' || String(dat.Descripcion).trim()=='EMBUTIDOS'){
                        if(String(dat.Descripcion).trim()=='EMBUTIDOS'){
                            $('#titulocant').html('Sachets');
                            $('#labelt1').html('Cantidad');
                            $('#labelt2').html('');
                            $('#t1').removeAttr('disabled');
                            $('#t2').attr('disabled','true');
                        }else{
                            $('#titulocant').html('Caja');
                            $('#labelt1').html('Unid. pollo');
                            $('#labelt2').html('');
                            $('#t1').removeAttr('disabled');
                            $('#t2').attr('disabled','true');
                        }


                    }else if (String(dat.Descripcion).trim()=='CARNE DE CERDO' ||  String(dat.Descripcion).trim()=='CARNE DE RES GANCHO'){
                        $('#titulocant').html('Entero');
                        $('#labelt1').html('Desmiembro');
                        $('#labelt2').html('Corte');
                        $('#t1').removeAttr('disabled');
                        $('#t2').removeAttr('disabled');
                    }else{
                        $('#titulocant').html('Cantidad');
                        $('#labelt1').html('');
                        $('#labelt2').html('');
                        $('#t1').attr('disabled','true');
                        $('#t2').attr('disabled','true');
                    }
                    if (cat==0){
                        $('#precioc').val(parseFloat(dat.Precio).toFixed(2));
                    }else if(cat==1){
                        $('#precioc').val(parseFloat(dat.Precio_Costo).toFixed(2));
                    }else if(cat>=2){
                        $('#precioc').val(parseFloat(dat.Precio3).toFixed(2));
                    }else if(cat>=3){
                        $('#precioc').val(parseFloat(dat.Precio4).toFixed(2));
                    }else if(cat>=4){
                        $('#precioc').val(parseFloat(dat.Precio5).toFixed(2));
                    }else if(cat>=5){
                        $('#precioc').val(parseFloat(dat.Precio6).toFixed(2));
                    }else if(cat>=6){
                        $('#precioc').val(parseFloat(dat.Precio7).toFixed(2));
                    }else if(cat>=7){
                        $('#precioc').val(parseFloat(dat.Precio8).toFixed(2));
                    }else if(cat>=8){
                        $('#precioc').val(parseFloat(dat.Precio9).toFixed(2));
                    }else if(cat>=9){
                        $('#precioc').val(parseFloat(dat.Precio10).toFixed(2));
                    }else if(cat>=10){
                        $('#precioc').val(parseFloat(dat.Precio11).toFixed(2));
                    }else if(cat>=11){
                        $('#precioc').val(parseFloat(dat.Precio12).toFixed(2));
                    }
                    // $('#precio1').val(parseFloat(dat.Precio).toFixed(2));
                    // $('#labelprecio1').html(parseFloat(dat.Precio).toFixed(2));
                    // $('#precio2').val(parseFloat(dat.Precio_Costo).toFixed(2));
                    // $('#labelprecio2').html(parseFloat(dat.Precio_Costo).toFixed(2));
                    // $('#precio3').val(parseFloat(dat.Precio3).toFixed(2));
                    // $('#labelprecio3').html(parseFloat(dat.Precio3).toFixed(2));
                    // $('#precio4').val(parseFloat(dat.Precio4).toFixed(2));
                    // $('#labelprecio4').html(parseFloat(dat.Precio4).toFixed(2));
                    // $('#precio5').val(parseFloat(dat.Precio5).toFixed(2));
                    // $('#labelprecio5').html(parseFloat(dat.Precio5).toFixed(2));
                    // $('#precio6').val(parseFloat(dat.Precio6).toFixed(2));
                    // $('#labelprecio6').html(parseFloat(dat.Precio6).toFixed(2));
                    // $('#precio7').val(parseFloat(dat.Precio7).toFixed(2));
                    // $('#labelprecio7').html(parseFloat(dat.Precio7).toFixed(2));
                    // $('#precio8').val(parseFloat(dat.Precio8).toFixed(2));
                    // $('#labelprecio8').html(parseFloat(dat.Precio8).toFixed(2));
                    // $('#precio9').val(parseFloat(dat.Precio9).toFixed(2));
                    // $('#labelprecio9').html(parseFloat(dat.Precio9).toFixed(2));
                    // $('#precio10').val(parseFloat(dat.Precio10).toFixed(2));
                    // $('#labelprecio10').html(parseFloat(dat.Precio10).toFixed(2));
                    // $('#precio11').val(parseFloat(dat.Precio11).toFixed(2));
                    // $('#labelprecio11').html(parseFloat(dat.Precio11).toFixed(2));
                    // $('#precio12').val(parseFloat(dat.Precio12).toFixed(2));
                    // $('#labelprecio12').html(parseFloat(dat.Precio12).toFixed(2));

                }
            })
        });



        var idproducto;

        $("#contenido").on("click",".eliproducto", function(e){
            e.preventDefault();
            if (confirm("Seguro de cancelar?")){
                $(this).closest('tr').remove();
                calcular_total();
            }
        });

        $('#agregarpedido').submit(function (e) {
            var formData = $("#agregarpedido").serializeArray();
            // if (formData.length==0){
            //     alert('Tienes que tener productos!!');
            // }else{
                //console.log($("#agregarpedido").serialize());
                formData.push({name:"idpedido",value:idpedido})
                formData.push({name:"idcliente",value:idcliente})
                console.log(formData);
                //return false;
                //e.preventDefault();
                // return false;
                // console.log(formData);
                $.ajax({
                    type: 'POST',
                    url:'Mispedidos/pedido',
                    data:formData,
                    success:function (e) {
                        console.log(e);
                        alert("Se Modifico el pedido exitosamente!!")
                        location.reload();
                        // $('#contenido').html('');
                        // $('#modalBootstrap').modal('hide');
                        // $('#total').html('0')
                        // $('#extra').val('')
                        // console.log(e);
                    }
                })
            // }
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

        $('#formulario').submit(function (e) {
            // var precio=$('input[name=precio]:checked', '#formulario').val();
            let precio=$('#precioc').val();
            // console.log(precio);
            if( parseInt(precio)==0){
                alert('nose puede escoger un precio 0');
                return false;
            }else{
                var t1=$('#t1').val();
                var t2=$('#t2').val();

                if (t1==''){
                    if (t2!=''){
                        var cantidad= parseFloat( $('#t2').val());
                        var subtotal=cantidad*parseFloat(precio);
                        cantidad= parseInt( $('#cantidad').val());
                    }else{
                        var cantidad= parseFloat( $('#cantidad').val());
                        var subtotal=cantidad*parseFloat(precio);
                    }

                }else {
                    if (t2==''){
                        var cantidad= parseFloat( t1);
                        var subtotal=cantidad*parseFloat(precio);
                        cantidad= parseFloat( $('#cantidad').val());
                    }else {
                        var cantidad1= parseFloat( t1);
                        var cantidad2= parseFloat( t2);
                        var cantidad=cantidad1+cantidad2;
                        var subtotal=cantidad1*parseFloat(precio)+cantidad2*parseFloat(precio);
                        cantidad= parseFloat( $('#cantidad').val());
                    }
                }



                var nombre=$('#nombre').val();
                var extra=$('#extra').val();
                $('#contenido').append("<tr>\n" +
                "                                    <td>"+nombre+" <input hidden name='id"+parseInt(idproducto)+"' value='"+parseInt(idproducto)+"'></td>\n" +
                "                                    <td>"+parseFloat(precio).toFixed(2)+"<input hidden name='precio"+parseInt(idproducto)+"' value='"+parseFloat(precio).toFixed(2)+"'></td>\n" +
                "                                    <td>"+cantidad+"  <input hidden name='cantidad"+parseInt(idproducto)+"' value='"+parseFloat(cantidad)+"'></td>\n" +
                    "                                    <td>"+t1+"  <input hidden name='t1"+parseInt(idproducto)+"' value='"+t1+"'></td>\n" +
                    "                                    <td>"+t2+"  <input hidden name='t2"+parseInt(idproducto)+"' value='"+t2+"'></td>\n" +
                "                                    <td>"+extra+"  <input hidden name='extra"+parseInt(idproducto)+"' value='"+extra+"'></td>\n" +
                "                                    <td><input hidden name='subtotal"+parseInt(idproducto)+"' value='"+parseFloat(subtotal).toFixed(2)+"'><span>"+parseFloat(subtotal).toFixed(2)+" Bs.</span></td>" +
                                                    "<td><button class='btn btn-danger p-1 eliproducto'><i class='fa fa-trash-o'></i></button></td>\n" +
                "                                </tr>");
                calcular_total();
                $('#extra').val('')
            }
            return false;
        });


        $('#enviar').click(function (e) {
            if (!confirm('Seguro de enviar todo los pedidos'))
                e.preventDefault();
        });
    }
</script>
