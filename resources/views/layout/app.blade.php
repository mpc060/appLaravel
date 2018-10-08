<html>
    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Amigo X</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            body {
                padding: 10px;          
            }
            .card-deck {
                margin: auto;
            }
            .navbar {
                margin-bottom: 20px;
            }
            h4 {
                margin-top: 2px;
                margin-left: 40px;
            }
            h2 {
                padding: 20px;
                margin-left: 20px;
            }
         
        </style>
    </head>
<body>
    <div class="containder">
        @component('navbar', ["current" => "$current"])
        @endcomponent
        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif
        </main>
    </div>
    <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
   
    @hasSection('javascript')
        @yield('javascript')
    @endif
    
</body>
</html>