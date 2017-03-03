<!DOCTYPE html>
<html>

@include('includes.head')

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-closed">
<div id="app">
    <div class="page-wrapper">


        <div class="page-header navbar navbar-fixed-top">

            <div class="page-header-inner ">



            </div>
            <!-- END HEADER INNER -->
        </div>

        <div class="clearfix"></div>

        <div class="page-container">

            <div class="page-sidebar-wrapper-closed">

                @include('includes.sidebar')

            </div>

            <div class="page-content-wrapper">
                <div class="page-content">

                    @yield('content')

                </div>
            </div>
        </div>
    </div>
</div>


@include('includes.scripts')



</body>


</html>
