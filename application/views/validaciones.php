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
        var url="<?php echo site_url(); ?>Cochera/Insert_Tipo_Vehiculo";
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
        var dataString = new FormData(document.getElementById('formulario_tvehiculoe'));
        var url="<?php echo site_url(); ?>Cochera/Update_Tipo_Vehiculo";
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
                        window.location.reload();
                        
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
        var url="<?php echo site_url(); ?>Cochera/Delete_Tipo_Vehiculo";
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
                    data: {'id_tipo':id},
                    success:function () {
                        Swal(
                            'Eliminado!',
                            'El registro ha sido eliminado satisfactoriamente.',
                            'success'
                        ).then(function() {
                            window.location.reload();
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

    //------------dueño
    function Insert_Dueno(){
        var dataString = new FormData(document.getElementById('formulario_dueno'));
        var url="<?php echo site_url(); ?>Cochera/Insert_Dueno";
        //alert(url);
        if (Valida_Dueno('1')) {
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
                            'Existe un registro con el mismo número de documento!',
                            'error'
                        ).then(function() {
                        });
                    }else{
                       swal.fire(
                        'Registro Exitoso!',
                        '',
                        'success'
                    ).then(function() {
                        window.location.reload();
                    }); 
                    }
                }
            });
        } 
    }

    function Valida_Dueno(t) {
        v="";
        if(t==2){
            v="e";
        }
        if(t==1){
            if($('#id_nivel'+v).val() == '0') {
                swal({
                    title: 'Debe seleccionar Nivel',
                    animation: false,
                    customClass: 'animated tada',
                    padding: '2em'
                })
                return false;
            }
            if($('#num_doc'+v).val().trim() === '') {
                swal({
                    title: 'Debe ingresar número de documento',
                    animation: false,
                    customClass: 'animated tada',
                    padding: '2em'
                })
                return false;
            }
        }else{
            if($('#num_doc'+v).val().trim() === '') {
                swal({
                    title: 'Debe ingresar número de documento',
                    animation: false,
                    customClass: 'animated tada',
                    padding: '2em'
                })
                return false;
            } 
        }
        
        return true;
    }

    function Update_Dueno(){
        var dataString = new FormData(document.getElementById('formulario_duenoe'));
        var url="<?php echo site_url(); ?>Cochera/Update_Dueno";
        if (Valida_Dueno('2')) {
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
                        window.location.reload();
                        
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

    function Delete_Dueno(id){
        var id = id;
        var url="<?php echo site_url(); ?>Cochera/Delete_Tipo_Vehiculo";
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
                    data: {'id_usuario':id},
                    success:function () {
                        Swal(
                            'Eliminado!',
                            'El registro ha sido eliminado satisfactoriamente.',
                            'success'
                        ).then(function() {
                            window.location.reload();
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

    //-----------perfil
    function GDatosP() {
        $(document)
        .ajaxStart(function() {
            $.blockUI({
                message: '<svg> ... </svg>',
                fadeIn: 800,
                overlayCSS: {
                    backgroundColor: '#1b2024',
                    opacity: 0.8,
                    zIndex: 1200,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    color: '#fff',
                    zIndex: 1201,
                    padding: 0,
                    backgroundColor: 'transparent'
                }
            });
        })
        .ajaxStop(function() {
            $.blockUI({
                message: '<svg> ... </svg>',
                fadeIn: 800,
                timeout: 100,
                overlayCSS: {
                    backgroundColor: '#1b2024',
                    opacity: 0.8,
                    zIndex: 1200,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    color: '#fff',
                    zIndex: 1201,
                    padding: 0,
                    backgroundColor: 'transparent'
                }
            });
        });

        var dataString = new FormData(document.getElementById('edatos'));
        var url = "<?php echo site_url(); ?>Cochera/Update_GDatosP";

        if (Valida_GDatosP()) {
            $.ajax({
                url: url,
                data: dataString,
                type: "POST",
                processData: false,
                contentType: false,
                success: function(data) {
                    swal.fire(
                        'Actualización Exitosa!',
                        'Haga clic en el botón!',
                        'success'
                    ).then(function() {
                        Lista_GDatosP();
                        //Validar_Datos_Completos();
                    });
                }
            });
        }
    }

    function Valida_GDatosP() {
        if($('#usuario_apater').val().trim() == '') {
            swal({
                title: 'Debe ingresar Apellido Paterno',
                animation: false,
                customClass: 'animated tada',
                padding: '2em'
            })
            return false;
        }
        if($('#usuario_amater').val().trim() === '') {
            swal({
                title: 'Debe ingresar Apellido Materno',
                animation: false,
                customClass: 'animated tada',
                padding: '2em'
            })
            return false;
        }
        if($('#usuario_nombres').val().trim() === '') {
            swal({
                title: 'Debe ingresar Nombres',
                animation: false,
                customClass: 'animated tada',
                padding: '2em'
            })
            return false;
        }
        if($('#num_doc').val().trim() === '') {
            swal({
                title: 'Debe ingresar N° Documento',
                animation: false,
                customClass: 'animated tada',
                padding: '2em'
            })
            return false;
        }
        return true;
    }

    function Lista_GDatosP(){
        $(document)
        .ajaxStart(function() {
            $.blockUI({
                message: '<svg> ... </svg>',
                fadeIn: 800,
                overlayCSS: {
                    backgroundColor: '#1b2024',
                    opacity: 0.8,
                    zIndex: 1200,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    color: '#fff',
                    zIndex: 1201,
                    padding: 0,
                    backgroundColor: 'transparent'
                }
            });
        })
        .ajaxStop(function() {
            $.blockUI({
                message: '<svg> ... </svg>',
                fadeIn: 800,
                timeout: 100,
                overlayCSS: {
                    backgroundColor: '#1b2024',
                    opacity: 0.8,
                    zIndex: 1200,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    color: '#fff',
                    zIndex: 1201,
                    padding: 0,
                    backgroundColor: 'transparent'
                }
            });
        });

        var dataString = new FormData(document.getElementById('edatos'));
        var url = "<?php echo site_url(); ?>Cochera/Lista_GDatosP";

        $.ajax({
            url: url,
            data: dataString,
            type: "POST",
            processData: false,
            contentType: false,
            success: function(data) {
                $('#mdatos').html(data);
            }
        });
    }

    function Estado_Civil(){
        
        if ($('#id_estado_civil').val() == '7') {
            $("#otro_estado_civil").prop('disabled', false);
        }else{
            $("#otro_estado_civil").prop('disabled', true);
            $("#otro_estado_civil").val('');
        }
    } 
</script>
