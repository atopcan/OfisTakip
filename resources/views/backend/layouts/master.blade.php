<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
    <link href="../css/takvim.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
    }
    });
</script>
@stack('afterJs')

@yield('content')
</body>


</html>