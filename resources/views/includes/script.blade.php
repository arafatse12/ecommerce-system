<!--App JS Start-->
<?php
//We'll merge all css and js into sigle files. If you want to use the css separately, you can use it.

$js = [
    'assets/js/jquery-1.11.3.min.js',
    'assets/bootstrap/js/bootstrap.min.js',
    'assets/js/jquery-validation/jquery.validate.min.js',
    'assets/js/jquery-validation/jquery.form.js',
    'assets/js/perfect-scrollbar/perfect-scrollbar.min.js',
    'assets/js/datatable/js/jquery.dataTables.min.js',
    'assets/js/datatable/responsive.dataTables.min.js',
    'assets/js/datatable/TableTools/js/dataTables.tableTools.min.js',
    'assets/js/datatable/TableTools/js/dataTables.buttons.min.js',
    'assets/js/datatable/TableTools/js/buttons.html5.min.js',
    'assets/js/datatable/TableTools/js/buttons.print.min.js',
    'assets/js/datatable/TableTools/js/jszip.min.js',
    'assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js',
    'assets/js/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
    'assets/js/fullcalendar/moment.min.js',
    'assets/js/dropzone/dropzone.min.js',
    'assets/js/magnific-popup/jquery.magnific-popup.min.js',
    'assets/js/sortable/sortable.min.js',
    'assets/js/flot/jquery.flot.min.js',
    'assets/js/flot/jquery.flot.pie.min.js',
    'assets/js/flot/jquery.flot.resize.min.js',
    'assets/js/flot/jquery.flot.categories.min.js',
    'assets/js/flot/curvedLines.js',
    'assets/js/flot/jquery.flot.tooltip.min.js',
    'assets/js/easypiechart/jquery.easypiechart.min.js',
    'assets/js/atwho/caret/jquery.caret.min.js',
    'assets/js/atwho/js/jquery.atwho.min.js',
    'assets/js/notification_handler.js',
    'assets/js/general_helper.js',
    'assets/js/app.js',
    'assets/js/cropbox/cropbox-min.js',
];

foreach ($js as $js) {
    echo "<script type='text/javascript' src='" . assets($js) . "?v=$version" . "'></script>";
}


?>
<script>
    $(document).ready(function() {
        $(document).on("click", "#sidebar-menu > li", function() {
            $("#sidebar-menu > li").removeClass('open active')
            $(this).addClass("open active");

        });

        //show/hide disable login help message
        $("#disable_login").click(function() {
            if ($(this).is(":checked")) {
                $("#disable-login-help-block").removeClass("hide");
            } else {
                $("#disable-login-help-block").addClass("hide");
            }
        });

    });
</script>
<script>
    $(document).ready(function() {
        //modify design for mobile devices
        if (isMobile()) {
            $("#profile-image-section").children("div").each(function() {
                $(this).addClass("p0");
                $(this).removeClass("box-content");
            });
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0">
<script >
        var data = {};
    data[AppHelper.csrfTokenName] = AppHelper.csrfHash;
    $.ajaxSetup({
        data: data
    });
</script>

<script>

</script>
<script>
    @auth
        window.user = {!! json_encode(auth()->user(), true) !!};
    @else
        window.user = [];
    @endauth
    window.baseUrl = '{{ url('/') }}';
    window.publicPath = '{{ env('PUBLIC_PATH') }}';
</script>
<script src="{{ assets('js/app.js') . '?v=' . $version }}"></script>
