<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Dashboard - Ace Admin</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    @include('backend.layout.css')
</head>

<body class="no-skin">
    @include('backend.layout.menu')

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    @include('backend.layout.leftSideBar')


    <div class="main-content">
        <div class="main-content-inner">
            @include('backend.layout.breadcrumb')

            @include('backend.layout.message')

            <div class="page-content">


                @yield('content')

            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    @include('backend.layout.footer')

    @include('backend.layout.downToUpLink')


</div><!-- /.main-container -->

    @include('backend.layout.script')

    @yield('script')

</body>
</html>
