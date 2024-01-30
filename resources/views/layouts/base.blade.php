<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{--<meta http-equiv="refresh" content="10">--}}
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="../../css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

    <title>@yield('page.title' , config('app.name'))</title>

    <style>
        ul{
            margin: 0;
            padding: 0;
        }

        li{
            list-style: none;
        }

        li{
            text-decoration: none;
        }
        .message-wrapper{
            padding: 10px;
            background: #eeeeee;
        }
        .messages .message{
            margin-bottom: 15px;
        }

        .messages .message:last-child{
            margin-bottom: 0;
        }

        .received, .sent{
            width: 45%;
            padding: 3px 10px;
            border-radius: 10px;
        }
        .received{
            background-color: #ffffff;
        }
        .sent{
            background-color: #3bebff;
            float: right;
            text-align: right;
        }

        .message p{
            margin: 5px 0;
        }
        .date{
            color: #777777;
            font-size: 10px;
        }
    </style>
</head>

<body>

<div class="d-flex flex-column justify-content-between min-vh-100">

    @include('includes.alert')
    @include('includes.header')

    <main class="flex-grow-1 py-3 container">

        @yield('content')

    </main>

    @include('includes.footer')

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    var receiver_id = '';
    var my_id = '{{ \Illuminate\Support\Facades\Auth::id() }}';
    $(document).ready(function (){
    });
</script>
</body>

</html>
