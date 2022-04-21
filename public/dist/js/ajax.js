$(document).ready(function () {
    // Obtengo la url base del proyecto
    var base_url = $("#base_url").val();
    
    // var base_url = $(this).data('base_url');
    // Evento en al hacer click en el boton borrar
    $(document).on('click','#borrar',function (e) { 
        e.preventDefault();
        // obtengo el id donde se hiso clic
        var id = $(this).data('registro');
        var controlador = $(this).data('controlador');
        //Confirmo la accion
        Swal.fire({
            title: '¿Eliminar registro?',
            text: "Una ves eliminado no podre recuperarse",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
            //Si se confirma eliminare el registro por medio de ajax
            $.ajax({
                type: "POST",
                url: base_url + "/" + controlador + "/delete",
                data: {"id": id},      
                success: function (response) {
                    var result = JSON.parse(response);
                    // console.log(response);                    
                    if(result.resultado == "correcto"){
                        Swal.fire('¡ELiminado!','Registro eliminado con exito.','success');
                        jQuery('[data-registro="' + result.id + '"]').parents('tr').remove();
                        $(this).data('registro').parent().parent().remove();    
                    }else{
                        Swal.fire( '¡Error!', 'El registro no se pudo eliminar.', 'warning');
                    }              
                }
            });                       
            }
        })
        
    }); //Fin del evento

    // Al hacer clic en agregar producto
    $("#agregarAlaLista").click(function(){
        agregar();        
    });

    // Evento al elegir un proveedor
    $("#proveedorid").change(function (e) { 
        var idproveedor =  this.value;
        var idproducto = $("#productoid option:selected").val();
              
        // Valido que el campo productos este seleccionado
        if(idproducto === ""){           
            //Agrego la clase is-invalid y la quito despues de pasar 5 segundos
               $("#productoid").addClass("is-invalid");               
               $("#proveedorid option:contains(---SELECCIONE-PROVEEDOR---)").removeAttr("selected");
               $("#proveedorid option:contains(---SELECCIONE-PROVEEDOR---)").attr('selected', true);
               setTimeout(function() { $('#productoid').removeClass('is-invalid'); }, 5000);         
        }else{
            // Realizo la consulta en el catalogo de los precios via ajax
            $.ajax({
                type: "GET",
                url: base_url+"/precios/obtenerprecio",
                data: {"idproveedor": idproveedor, "idproducto": idproducto},      
                success: function (response) {
                    var result = JSON.parse(response);
                    if(result.respuesta != "vacia"){
                        $("#precio").val(result[0].precio);
                        $("#precio").addClass("is-valid");
                        $("#cantidad").focus();
                    }else{
                        toastr.warning('No ha reistrado un precio para ese producto')
                   
                    }
                    // console.log(result[0]);                    

                    // if(result.resultado == "correcto"){
                    //     Swal.fire('¡ELiminado!','Registro eliminado con exito.','success');
                    // $("#borrar").parent().parent().remove();     
                    // }else{
                    //     Swal.fire( '¡Error!', 'El registro no se pudo eliminar.', 'warning');
                    // }              
                }
            }); 
        }       
    });

});

// Funcion para limpiar un campo
function limpiarCampos() {
    $("#productoid option:contains(---SELECCIONE PRODUCTO---)").removeAttr("selected");
    $("#proveedorid option:contains(---SELECCIONE-PROVEEDOR---)").removeAttr("selected");
    $("#proveedorid option:contains(---SELECCIONE-PROVEEDOR---)").attr('selected', true);       
    $("#productoid option:contains(---SELECCIONE PRODUCTO---)").attr('selected', true);       
    $("#precio").val("");
    $("#precio").removeClass("is-valid");
    $("#cantidad").val("");
}

// Variables para el total de la compra
var cont=0;
total=0;
subtotal=[];
// Desactivo el boton de registro
$("#guardar").attr("disabled", true);
// Funcion para agregar productos a la lista de compras
function agregar(){
    cantidad = $("#cantidad").val();
    producto= $("#productoid option:selected").text();
    productoid= $("#productoid").val();    
    precio_compra = $("#precio").val();
    proveedor = $("#proveedorid option:selected").text();
    proveedorid= $("#proveedorid").val();
      
    if(producto !="" && cantidad != "" && cantidad > 0 && precio_compra !=""){      
       subtotal[cont] = cantidad * precio_compra;
       total = total + subtotal[cont];   
       fila = `
       <tr class="selected" id="fila${cont}">
            <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('${cont}');"><i class="fas fa-trash-alt"></i></button></td>
            <td><input type="hidden" name="cantidad[]" value="${cantidad}">${cantidad}</td>
            <td><input type="hidden" name="productoid[]" value="${productoid}" > ${producto} </td>
            <td><input type="hidden"  id="precio[]" name="precio[]"  value="${precio_compra}"> ${precio_compra}</td>                                                  
            <td><input type="hidden"  name="proveedorid[]"  value="${proveedorid}"> ${proveedor} </td>                                                  
            <td>${ parseFloat(subtotal[cont]).toFixed(2)}</td>
        </tr>
        `;           
       cont++;
      //Agrego los totales
       totales();
      //Limpio los campos
       limpiarCampos();
      //evaluo si hay registro para controlar el btn guardar
       evaluar();
       $('#detalles').append(fila);
      
      }else{
        toastr.error('Rellene todos los campos del detalle de la compra, revise los datos del producto')
      }
   
}
// Funcion que obtiene el total de la compra
function totales(){
    $("#total").html("$" + total.toFixed(2));   
    $("#total_pagar_html").html("$ " + total.toFixed(2));
    $("#total_pagar").val(total.toFixed(2));        
 }

// Funcion que evalua el total y controla el boton guardar
function evaluar(){
    if(total>0){
    $("#guardar").removeAttr("disabled", false);
    } else{              
    $("#guardar").attr("disabled", true);
    }
}

// Funcion que elimina un registro de la lista a comprar
function eliminar(index){
    total=total-subtotal[index];
    total_impuesto= total*20/100;
    total_pagar_html = total + total_impuesto;   
    $("#total").html("USD$" + total);
    $("#total_impuesto").html("USD$" + total_impuesto);
    $("#total_pagar_html").html("USD$" + total_pagar_html);
    $("#total_pagar").val(total_pagar_html.toFixed(2));   
    $("#fila" + index).remove();
    evaluar();
 }