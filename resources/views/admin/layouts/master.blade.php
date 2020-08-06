<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/matrix-media.css')}}" />
    <link href="{{asset('backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('backend/css/jquery.gritter.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap-wysihtml5.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/select2.css')}}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    @toastr_css
    @stack('css')
</head>
<body>

@include('admin.layouts.header')
@include('admin.layouts.sidebar')

@yield('content')

@stack('js')
<script src="{{asset('backend/js/excanvas.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.ui.custom.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.flot.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.peity.min.js')}}"></script>
<script src="{{asset('backend/js/fullcalendar.min.js')}}"></script>
<script src="{{asset('backend/js/matrix.js')}}"></script>
<script src="{{asset('backend/js/matrix.dashboard.js')}}"></script>
<script src="{{asset('backend/js/jquery.gritter.min.js')}}"></script>
<script src="{{asset('backend/js/matrix.interface.js')}}"></script>
<script src="{{asset('backend/js/matrix.chat.js')}}"></script>
<script src="{{asset('backend/js/jquery.validate.js')}}"></script>
<script src="{{asset('backend/js/matrix.form_validation.js')}}"></script>
<script src="{{asset('backend/js/jquery.wizard.js')}}"></script>
<script src="{{asset('backend/js/jquery.uniform.js')}}"></script>
<script src="{{asset('backend/js/select2.min.js')}}"></script>
<script src="{{asset('backend/js/matrix.popover.js')}}"></script>
<script src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/js/matrix.tables.js')}}"></script>

<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<script>
    $(document).ready(function(){
        $('#table_id').DataTable();
    });
</script>

<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('summary-ckeditor');
</script>

</body>
@jquery
@toastr_js
@toastr_render
</html>
