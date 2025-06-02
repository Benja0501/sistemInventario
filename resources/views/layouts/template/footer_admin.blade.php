<!-- Essential javascripts for application to work-->
<script src="{{ asset('build/assets/js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('build/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('build/assets/js/main.js') }}"></script>
<script src="{{ asset('build/assets/js/fontawesome.js') }}"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
<!-- Data table plugin-->
<script type="text/javascript" src="{{ asset('build/assets/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('build/assets/js/plugins/dataTables.bootstrap.min.js') }}""></script>
<script>
    $(document).ready(function() {
        $('#sampleTable').DataTable({
            // Puedes ajustar estas opciones si lo necesitas:
            pageLength: 5, // Mostrar 5 filas por página
            lengthMenu: [5, 10, 25, 50],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
                // Esto carga el archivo de traducciones al español
            }
        });
    });
</script>

</body>

</html>
