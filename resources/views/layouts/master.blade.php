<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>SupplyCart</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <style>
            .container {
                width: auto;
                max-width: 680px;
                padding: 0 15px;
            }
            * {box-sizing: border-box;}

            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
            }

            .header {
                overflow: hidden;
                background-color: #f1f1f1;
                padding: 20px 10px;
            }

            .header a {
                float: left;
                color: black;
                text-align: center;
                padding: 12px;
                text-decoration: none;
                font-size: 18px;
                line-height: 25px;
                border-radius: 4px;
            }

            .header a.logo {
                font-size: 25px;
                font-weight: bold;
            }

            .header a:hover {
                background-color: #ddd;
                color: black;
            }

            .header a.active {
                background-color: dodgerblue;
                color: white;
            }

            .header-right {
                float: right;
            }

            @media screen and (max-width: 500px) {
                .header a {
                    float: none;
                    display: block;
                    text-align: left;
                }

                .header-right {
                    float: none;
                }
            }
        </style>
    </head>

    <body>
        <div class="header">
            <a href="#default" class="logo">SupplyCart</a>
            <div class="header-right">
                <a href="/products">List Products</a>
                @if(!auth()->check())
                    <a href="/">Login</a>
                @endif
                @if(auth()->check())
                    <a href="/cart">My Cart</a>
                    <a href="/orders">Order History</a>
                    <a href="#">Hi {{ auth()->user()->name }}</a>
                    <a href="/logout">Logout</a>
                @endif
            </div>
        </div>

        <div class="container">
            @yield('content')
        </div>

        @yield('scripts')

        <script type="text/javascript">
            $( document ).ready(function() {
                $('a[href="/<?php echo Route::getFacadeRoot()->current()->uri(); ?>"]').addClass('active');
                if('<?php echo Route::getFacadeRoot()->current()->uri(); ?>' == '/') {
                    $('a[href="/"]').addClass('active');
                }
            });
        </script>
    </body>
</html>
