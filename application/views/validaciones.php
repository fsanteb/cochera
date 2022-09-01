</div>
<script>
    $(document).ready(function() {
        var msgDate = '';
        var inputFocus = '';
    });

    function soloNumeros(e) {
        var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        //letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        letras = "0123456789",
        especiales = [8, 37, 39, 46],
        tecla_especial = false;

        for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
        }

        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
        }
    }

    function validar_Archivo(v){
        var archivoInput = document.getElementById(v);
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.jpg|.jpeg|.png|.pdf)$/i;
        if(!extPermitidas.exec(archivoRuta)){
                swal.fire(
                    '!Archivo no permitido!',
                    'El archivo debe ser JPG ,JPEG ,PNG o PDF',
                    'error'
                )
            archivoInput.value = '';
            return false;
        }
    }

    function validar_ArchivoPDF(v){
        var archivoInput = document.getElementById(v);
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.pdf)$/i;
        if(!extPermitidas.exec(archivoRuta)){
                swal.fire(
                    '!Archivo no permitido!',
                    'El archivo debe ser PDF',
                    'error'
                )
            archivoInput.value = '';
            return false;
        }
    }

    function Validar_Email(email){
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    /* 
    if(Validar_Email($('#email').val().trim())==false){
        Swal(
            '¡Advertencia!',
            'Correo inválido',
            'warning'
        ).then(function() {});
        return false;
    }
    */
    
    //---------------------------------------------------AREA--------------------------------------------------
    function Insert_Tipo_Vehiculo(){
        var dataString = new FormData(document.getElementById('formulario_tvehiculo'));
        var url="<?php echo site_url(); ?>Kasnet/Insert_Tipo_Vehiculo";
        //alert(url);
        if (Valida_Tipo_Vehiculo('1')) {
            $.ajax({
                type:"POST",
                url: url,
                data:dataString,
                processData: false,
                contentType: false,
                success:function (data) {
                    if(data=="error"){
                        swal.fire(
                            'Registro Denegado!',
                            'Existe un registro con los mismos datos!',
                            'error'
                        ).then(function() {
                        });
                    }else{
                       swal.fire(
                        'Registro Exitoso!',
                        '',
                        'success'
                    ).then(function() {
                        window.location = "<?php echo site_url(); ?>Cochera/Tipo_Vehiculo";
                    }); 
                    }
                }
            });
        } 
    }

    function Valida_Tipo_Vehiculo(t) {
        v="";
        if(t==2){
            v="e";
        }
        if($('#nom_tipo'+v).val().trim() === '') {
            swal({
                title: 'Debe ingresar nombre',
                animation: false,
                customClass: 'animated tada',
                padding: '2em'
            })
            return false;
        }
        if($('#precio_abonado'+v).val().trim() === '') {
            swal({
                title: 'Debe ingresar precio abonado',
                animation: false,
                customClass: 'animated tada',
                padding: '2em'
            })
            return false;
        }
        if($('#precio_noabonado'+v).val().trim() === '') {
            swal({
                title: 'Debe ingresar precio no abonado',
                animation: false,
                customClass: 'animated tada',
                padding: '2em'
            })
            return false;
        }
        return true;
    }

    function Update_Tipo_Vehiculo(){
        var dataString = new FormData(document.getElementById('formulario_bancoe'));
        var url="<?php echo site_url(); ?>Kasnet/Update_Tipo_Vehiculo";
        if (Valida_Tipo_Vehiculo('2')) {
            $.ajax({
                type:"POST",
                url: url,
                data:dataString,
                processData: false,
                contentType: false,
                success:function (data) {
                    if(data=="error"){
                        swal.fire(
                            'Actualización Denegada!',
                            'Existe un registro con los mismos datos!',
                            'error'
                        ).then(function() {
                        });
                    }else{
                      swal.fire(
                        'Actualización Exitosa!',
                        '',
                        'success'
                    ).then(function() {
                        window.location = "<?php echo site_url(); ?>Cochera/Tipo_Vehiculo";
                        
                    });  
                    }
                    
                }
            });
        }    
        else{
            bootbox.alert(msgDate)
            var input = $(inputFocus).parent();
            $(input).addClass("has-error");
            $(input).on("change", function () {
                if ($(input).hasClass("has-error")) {
                    $(input).removeClass("has-error");
                }
            });
        }
    }

    function Delete_Tipo_Vehiculo(id){
        var id = id;
        var url="<?php echo site_url(); ?>Kasnet/Delete_Tipo_Vehiculo";
        const swalWithBootstrapButtons = swal.mixin({
            confirmButtonClass: 'btn btn-success btn-rounded',
            cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
            buttonsStyling: false,
        })

        swalWithBootstrapButtons({
            title: '¿Realmente desea eliminar el registro?',
            text: "El registro será eliminado permanentemente!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true,
            padding: '2em'
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type:"POST",
                    url: url,
                    data: {'id_banco':id},
                    success:function () {
                        Swal(
                            'Eliminado!',
                            'El registro ha sido eliminado satisfactoriamente.',
                            'success'
                        ).then(function() {
                            window.location = "<?php echo site_url(); ?>Cochera/Tipo_Vehiculo";
                        });
                    }
                });

            
            } else if (
            result.dismiss === swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons(
                    'Cancelado',
                    'El registro está a salvo :)',
                    'error'
                )
            }
        });

    }
</script>
