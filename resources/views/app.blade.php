<!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!-- Styles -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    {{--  --}}

    {{-- pour ziggy --}}
    @routes
    @vite('resources/js/app.js')
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/highlight/styles/github-gist.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/plugins/pace/pace.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('assets/plugins/highlight/styles/github-gist.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/date-picker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/dropzone/min/dropzone.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    @inertiaHead
  </head>
  <body>
    @inertia 
    <script src="{{asset("assets/plugins/jquery/jquery-3.5.1.min.js")}}"></script>
    <script src="{{asset("assets/plugins/bootstrap/js/popper.min.js")}}"></script> 
    <script src="{{asset("assets/plugins/bootstrap/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/plugins/apexcharts/apexcharts.min.js")}}"></script>
    <script src="{{asset("assets/plugins/perfectscroll/perfect-scrollbar.min.js")}}"></script>
    {{-- <script src="{{asset("assets/plugins/datatables/datatables.min.js")}}"></script> --}}
    {{-- <script src="{{asset("assets/js/pages/datatables.js")}}"></script>  --}}
    <script src="{{asset("assets/js/date-picker/moment.min.js")}}"></script>
    <script src="{{asset("assets/js/date-picker/daterangepicker.js")}}"></script>
    <script src="{{asset("assets/plugins/highlight/highlight.pack.js")}}"></script>
    <script src="{{asset("assets/plugins/dropzone/min/dropzone.min.js")}}"></script>
    
    <script src="{{asset("assets/js/main.min.js")}}"></script>
    <script src="{{asset("assets/js/custom.js")}}"></script>
    {{-- <script src="{{asset("assets/js/pages/widgets.js")}}"></script> --}}
</body>


  
  </body>
</html>


