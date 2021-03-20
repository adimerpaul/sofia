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
    <h2>Clientes</h2>
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
        <h2 class="panel-title">Buscar cliente</h2>
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
<!--                                        <optgroup label="Pacific Time Zone">-->
<!--                                            <option value="CA">California</option>-->
<!--                                            <option value="NV">Nevada</option>-->
<!--                                            <option value="OR">Oregon</option>-->
<!--                                            <option value="WA">Washington</option>-->
<!--                                        </optgroup>-->
<!--                                        <optgroup label="Mountain Time Zone">-->
<!--                                            <option value="AZ">Arizona</option>-->
<!--                                            <option value="CO">Colorado</option>-->
<!--                                            <option value="ID">Idaho</option>-->
<!--                                            <option value="MT">Montana</option>-->
<!--                                            <option value="NE">Nebraska</option>-->
<!--                                            <option value="NM">New Mexico</option>-->
<!--                                            <option value="ND">North Dakota</option>-->
<!--                                            <option value="UT">Utah</option>-->
<!--                                            <option value="WY">Wyoming</option>-->
<!--                                        </optgroup>-->
<!--                                        <optgroup label="Central Time Zone">-->
<!--                                            <option value="AL">Alabama</option>-->
<!--                                            <option value="AR">Arkansas</option>-->
<!--                                            <option value="IL">Illinois</option>-->
<!--                                            <option value="IA">Iowa</option>-->
<!--                                            <option value="KS">Kansas</option>-->
<!--                                            <option value="KY">Kentucky</option>-->
<!--                                            <option value="LA">Louisiana</option>-->
<!--                                            <option value="MN">Minnesota</option>-->
<!--                                            <option value="MS">Mississippi</option>-->
<!--                                            <option value="MO">Missouri</option>-->
<!--                                            <option value="OK">Oklahoma</option>-->
<!--                                            <option value="SD">South Dakota</option>-->
<!--                                            <option value="TX">Texas</option>-->
<!--                                            <option value="TN">Tennessee</option>-->
<!--                                            <option value="WI">Wisconsin</option>-->
<!--                                        </optgroup>-->
<!--                                        <optgroup label="Eastern Time Zone">-->
<!--                                            <option value="CT">Connecticut</option>-->
<!--                                            <option value="DE">Delaware</option>-->
<!--                                            <option value="FL">Florida</option>-->
<!--                                            <option value="GA">Georgia</option>-->
<!--                                            <option value="IN">Indiana</option>-->
<!--                                            <option value="ME">Maine</option>-->
<!--                                            <option value="MD">Maryland</option>-->
<!--                                            <option value="MA">Massachusetts</option>-->
<!--                                            <option value="MI">Michigan</option>-->
<!--                                            <option value="NH">New Hampshire</option>-->
<!--                                            <option value="NJ">New Jersey</option>-->
<!--                                            <option value="NY">New York</option>-->
<!--                                            <option value="NC">North Carolina</option>-->
<!--                                            <option value="OH">Ohio</option>-->
<!--                                            <option value="PA">Pennsylvania</option>-->
<!--                                            <option value="RI">Rhode Island</option>-->
<!--                                            <option value="SC">South Carolina</option>-->
<!--                                            <option value="VT">Vermont</option>-->
<!--                                            <option value="VA">Virginia</option>-->
<!--                                            <option value="WV">West Virginia</option>-->
<!--                                        </optgroup>-->
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
<!--                                    <div class="row " style="padding: 0 0.5em" hidden>-->
<!--                                        <div class="radio col-md-1" id="pre1">-->
<!--                                                <input type="radio" name="precio" required id="precio1" checked >-->
<!--                                                <small id="labelprecio1">00.00</small>-->
<!--                                        </div>-->
<!--                                        <div class="radio col-md-1" id="pre2">-->
<!--                                                <input type="radio" name="precio" required id="precio2">-->
<!--                                            <small id="labelprecio2">00.00</small>-->
<!--                                        </div>-->
<!--                                        <div class="radio col-md-1" id="pre3">-->
<!--                                                <input type="radio" name="precio" required id="precio3">-->
<!--                                            <small id="labelprecio3">00.00</small>-->
<!--                                        </div>-->
<!--                                        <div class="radio col-md-1" id="pre4">-->
<!--                                                <input type="radio" name="precio" required id="precio4">-->
<!--                                            <small id="labelprecio4">00.00</small>-->
<!--                                        </div>-->
<!--                                        <div class="radio col-md-1" id="pre5">-->
<!--                                                <input type="radio" name="precio" required id="precio5">-->
<!--                                                <small id="labelprecio5">00.00</small>-->
<!--                                        </div>-->
<!--                                        <div class="radio col-md-1" id="pre6">-->
<!--                                                <input type="radio" name="precio" required id="precio6">-->
<!--                                                <small id="labelprecio6">00.00</small>-->
<!--                                        </div>-->
<!--                                        <div class="radio col-md-1" id="pre7">-->
<!--                                                <input type="radio" name="precio" required id="precio7">-->
<!--                                                <small id="labelprecio7">00.00</small>-->
<!--                                        </div>-->
<!--                                        <div class="radio col-md-1" id="pre8">-->
<!--                                                <input type="radio" name="precio" required id="precio8">-->
<!--                                                <small id="labelprecio8">00.00</small>-->
<!--                                        </div>-->
<!--                                        <div class="radio col-md-1" id="pre9">-->
<!--                                                <input type="radio" name="precio" required id="precio9">-->
<!--                                                <small id="labelprecio9">00.00</small>-->
<!--                                        </div>-->
<!--                                        <div class="radio col-md-1" id="pre10">-->
<!--                                                <input type="radio" name="precio" required id="precio10">-->
<!--                                                <small id="labelprecio10">00.00</small>-->
<!--                                        </div>-->
<!--                                        <div class="radio col-md-1" id="pre11">-->
<!--                                                <input type="radio" name="precio" required id="precio11">-->
<!--                                                <small id="labelprecio11">00.00</small>-->
<!--                                        </div>-->
<!--                                        <div class="radio col-md-1" id="pre12">-->
<!--                                                <input type="radio" name="precio" required id="precio12">-->
<!--                                                <small id="labelprecio12">00.00</small>-->
<!--                                        </div>-->
<!--                                    </div>-->
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
<!--                                <div class="col-md-2">-->
<!--                                    <div class="form-group">-->
<!--                                    <label class="control-label">Precio al publico</label>-->
<!--                                    <input type="radio" name="precio" required id="precio" class="form-control">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-1" id=>-->
<!--                                    <div class="form-group">-->
<!--                                        <label class="control-label">2do Precio</label>-->
<!--                                        <input type="text" name="precio2" id="precio2" class="form-control">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-1">-->
<!--                                    <div class="form-group">-->
<!--                                        <label class="control-label">3er precio</label>-->
<!--                                        <input type="text" name="precio3" id="precio3" class="form-control">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-1">-->
<!--                                    <div class="form-group">-->
<!--                                        <label class="control-label">4to Precio</label>-->
<!--                                        <input type="text" name="precio4" id="precio4" class="form-control">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-1">-->
<!--                                    <div class="form-group">-->
<!--                                        <label class="control-label">Prec. Costo</label>-->
<!--                                        <input type="text" name="preciocosto" id="preciocosto" class="form-control">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-1">-->
<!--                                    <div class="form-group">-->
<!--                                        <label class="control-label">Util. stock</label>-->
<!--                                        <input type="text" name="stock" id="stock" class="form-control">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-2">-->
<!--                                    <div class="form-group">-->
<!--                                        <label class="control-label">Fecha venci.</label>-->
<!--                                        <input type="text" name="vencimiento" id="vencimiento" class="form-control">-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="control-label" id="titulocant">Cantidad</label>
                                        <input type="number" value="1" step="0.1" name="cantidad" id="cantidad"  class="form-control">
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
<!--                                <tfooter>-->
<!--                                    <tr class="bg bg-warning">-->
<!--                                        <th></th>-->
<!--                                        <th></th>-->
<!--                                        <th></th>-->
<!--                                        <th>Total</th>-->
<!--                                        <th id="total">0</th>-->
<!--                                        <th></th>-->
<!--                                    </tr>-->
<!--                                </tfooter>-->
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary "> <i class="fa fa-plus-circle"></i> Confirmar pedido</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash-o"></i> Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            var idcliente;
            var cat;
            function  seleccionar(id,cate){
                idcliente=id;
                cat=cate;
                // console.log(cat);
            }
        </script>
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Telefono</th>
                <th class="hidden-phone">Direccion</th>
                <th class="hidden-phone">Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query=$this->db->query("SELECT * FROM tbclientes");
            foreach ($query->result() as $row){
                echo "<tr class='gradeX'>
                    <td>$row->Id</td>
                    <td>$row->Nombres</td>
                    <td>$row->Telf</td>
                    <td class='center hidden-phone'>$row->Direccion</td>
                    <td class='center hidden-phone'><a class='mb-xs mt-xs mr-xs btn btn-info ' onclick='seleccionar($row->Cod_Aut,$row->Categoria)' data-id='$row->Cod_Aut' data-cat='$row->Categoria' data-toggle='modal' data-target='#modalBootstrap'> <i class='fa fa-truck'></i>Productos</a></td>
                </tr>";
            }
            ?>

            </tbody>
        </table>
    </div>
</section>
<script>
    window.onload=function (e) {
        var idproducto;
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
                        $('#titulocant').html('Caja');
                        $('#labelt1').html('Unid. pollo');
                        $('#labelt2').html('');
                        $('#t1').removeAttr('disabled');
                        $('#t2').attr('disabled','true');
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
        // $('#modalBootstrap').on('show.bs.modal', function (e) {
        //     if (!data) return e.preventDefault() // stops modal from being shown
        // })
        $('.select').click(function (e) {
            // console.log($(this).attr('data-id'));
            // idcliente=$(this).attr('data-id');
            // cat=$(this).attr('data-cat');
            // console.log(idcliente);
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
                        var cantidad= parseInt( $('#t2').val());
                        var subtotal=cantidad*parseFloat(precio);
                        cantidad= parseInt( $('#cantidad').val());
                    }else{
                        var cantidad= parseInt( $('#cantidad').val());
                        var subtotal=cantidad*parseFloat(precio);
                    }

                }else {
                    if (t2==''){
                        var cantidad= parseInt( t1);
                        var subtotal=cantidad*parseFloat(precio);
                        cantidad= parseInt( $('#cantidad').val());
                    }else {
                        var cantidad1= parseInt( t1);
                        var cantidad2= parseInt( t2);
                        var cantidad=cantidad1+cantidad2;
                        var subtotal=cantidad1*parseFloat(precio)+cantidad2*parseFloat(precio);
                        cantidad= parseInt( $('#cantidad').val());
                    }
                }



                var nombre=$('#nombre').val();
                var extra=$('#extra').val();
                $('#contenido').append("<tr>\n" +
                "                                    <td>"+nombre+" <input hidden name='id"+idproducto+"' value='"+idproducto+"'></td>\n" +
                "                                    <td>"+parseFloat(precio).toFixed(2)+"<input hidden name='precio"+idproducto+"' value='"+parseFloat(precio).toFixed(2)+"'></td>\n" +
                "                                    <td>"+cantidad+"  <input hidden name='cantidad"+idproducto+"' value='"+cantidad+"'></td>\n" +
                    "                                    <td>"+t1+"  <input hidden name='t1"+idproducto+"' value='"+t1+"'></td>\n" +
                    "                                    <td>"+t2+"  <input hidden name='t2"+idproducto+"' value='"+t2+"'></td>\n" +
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
                // console.log(idcliente);
                $.ajax({
                    type: 'POST',
                    url:'Admin/pedido',
                    data:formData,
                    success:function (e) {
                        console.log(e);
                        // return false;
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
