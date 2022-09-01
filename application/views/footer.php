    <!--<div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
        </div>
    </div>-->
</div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url() ?>template/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>template/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url() ?>template/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>template/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>template/assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="<?= base_url() ?>template/plugins/highlight/highlight.pack.js"></script>
    <script src="<?= base_url() ?>template/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="<?= base_url() ?>template/plugins/apex/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>template/assets/js/dashboard/dash_1.js"></script>
    <script src="<?= base_url() ?>template/plugins/table/datatable/datatables.js"></script>
    <script src="<?= base_url() ?>template/assets/js/scrollspyNav.js"></script>
    <script src="<?= base_url() ?>template/plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>template/plugins/sweetalerts/custom-sweetalert.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Mostrando página _PAGE_ de _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Buscar...",
               "sLengthMenu": "Resultados :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script>
    <script>
        $('#Modal_IMG').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var imagen = button.data('imagen');
            var titulo = button.data('title');
            var imagen2 = imagen.substr(-3);
            var rutapdf= $("#rutadni").val();
            var nombre_archivo= rutapdf+imagen;

            if (imagen!=""){
                if (imagen2=="PDF" || imagen2=="pdf")
                {
                    document.getElementById("dni").innerHTML = "<iframe height='350px' width='100%' src='"+nombre_archivo+"'></iframe>";
                }
                else
                {
                    document.getElementById("dni").innerHTML = "<img style='max-width:100%;' src='"+nombre_archivo+"'>";
                    //document.getElementById("dni").innerHTML = "<div id='demo-test-gallery' class='demo-gallery' data-pswp-uid='1'><a class='img-1' href='"+nombre_archivo+"' data-size='1600x1068' data-med="+nombre_archivo+" data-med-size='1024x683' data-author='Metalikas'><img src="+nombre_archivo+" alt='image-gallery'><figure>Plan de Calidad</figure></a></div>";
                }
            }
            else
            {
                document.getElementById("dni").innerHTML = "No se ha registrado ningún archivo";
            }

            var modal = $(this)
            modal.find('.modal-title').text(titulo)
            $('.alert').hide();//Oculto alert
        })
    </script>
</body>
</html>