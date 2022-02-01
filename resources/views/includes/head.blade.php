<head>
    <!--Meta Start-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="fairsketch">
    <link rel="icon" href="{{ assets('assets/images/favicon.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>
    <!--Meta End-->

    <!--Helper JS Start-->
    <script type="text/javascript">
        AppHelper = {};
        AppHelper.baseUrl = "{{ url('/') }}";
        AppHelper.assetsDirectory = "{{ assets('assets') }}";
        AppHelper.settings = {};
        AppHelper.settings.firstDayOfWeek = 0 || 0;
        AppHelper.settings.currencySymbol = "Tk";
        AppHelper.settings.currencyPosition = "left" || "left";
        AppHelper.settings.decimalSeparator = ".";
        AppHelper.settings.thousandSeparator = "";
        AppHelper.settings.noOfDecimals = ("2" == "0") ? 0 : 2;
        AppHelper.settings.displayLength = "10";
        AppHelper.settings.dateFormat = "Y-m-d";
        AppHelper.settings.timeFormat = "small";
        AppHelper.settings.scrollbar = "jquery";
        AppHelper.settings.enableRichTextEditor = "0";
        AppHelper.settings.notificationSoundVolume = "";
        AppHelper.settings.disableKeyboardShortcuts = "";
        AppHelper.userId = "";
        AppHelper.notificationSoundSrc = "{{ assets('files/system/notification.mp3') }}";

        //push notification
        AppHelper.settings.enablePushNotification = "";
        AppHelper.settings.userEnableWebNotification = "0";
        AppHelper.settings.userDisablePushNotification = "";
        AppHelper.settings.pusherKey = "";
        AppHelper.settings.pusherCluster = "";
        AppHelper.settings.pushNotficationMarkAsReadUrl = "{{ url('notifications/set_notification_status_as_read') }}";
        AppHelper.https = "0";

        AppHelper.settings.disableResponsiveDataTableForMobile = "";
        AppHelper.settings.disableResponsiveDataTable = "";

        AppHelper.csrfTokenName = "_tocken";
        AppHelper.csrfHash = "{{ csrf_token() }}";

        AppHelper.settings.defaultThemeColor = "1d2632";

        AppHelper.settings.timepickerMinutesInterval = 5;

        AppHelper.settings.weekends = "";
    </script>
    <!--Helper JS End-->

    <!--plugin language js Start-->
    <script type="text/javascript">
        AppLanugage = {};
        AppLanugage.locale = "en";
        AppLanugage.localeLong = "en-US";

        AppLanugage.days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        AppLanugage.daysShort = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        AppLanugage.daysMin = ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"];

        AppLanugage.months = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
            "October", "November", "December"
        ];
        AppLanugage.monthsShort = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        AppLanugage.today = "Today";
        AppLanugage.yesterday = "Yesterday";
        AppLanugage.tomorrow = "Tomorrow";

        AppLanugage.search = "Search";
        AppLanugage.noRecordFound = "No record found.";
        AppLanugage.print = "Print";
        AppLanugage.excel = "Excel";
        AppLanugage.printButtonTooltip = "Press escape when finished.";

        AppLanugage.fileUploadInstruction = "Drag-and-drop documents here <br /> (or click to browse...)";
        AppLanugage.fileNameTooLong = "Filename is too long.";

        AppLanugage.custom = "Custom";
        AppLanugage.clear = "Clear";

        AppLanugage.total = "Total";
        AppLanugage.totalOfAllPages = "Total of all pages";

        AppLanugage.all = "All";

        AppLanugage.preview_next_key = "Next (Right arrow key)";
        AppLanugage.preview_previous_key = "Previous (Left arrow key)";

        AppLanugage.filters = "Filters";
    </script>
    <!--plugin language js End-->

    <!--App CSS Start-->
    <?php

    $css_files = [
        'assets/bootstrap/css/bootstrap.min.css',
        'assets/js/font-awesome/css/font-awesome.min.css', //don't combine this css because of the fonts path
        'assets/js/datatable/css/jquery.dataTables.min.css', //don't combine this css because of the images path
        'assets/css/app.all.css',
    ];

    array_push($css_files, 'assets/css/custom-style.css'); //add to last. custom style should not be merged

    foreach ($css_files as $uri) {
        echo "<link rel='stylesheet' type='text/css' href='" . assets($uri) . "?v=$version' />";
    }
    ?>
    <!--App CSS End-->
</head>
