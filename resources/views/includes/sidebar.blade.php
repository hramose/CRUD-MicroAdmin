<!-- BEGIN SIDEBAR -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->

<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu  page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->





        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">General</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">

                <li class="nav-item  ">
                    <a href="/home/" class="nav-link ">
                        <span class="title">Home</span>
                    </a>
                </li>


                <li class="nav-item  ">
                    <a href="/users/" class="nav-link ">
                        <span class="title">Users</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="/items/" class="nav-link ">
                        <span class="title">Items</span>
                    </a>
                </li>
            </ul>


        </li>



        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-wallet"></i>
                <span class="title">Finance</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="/users/" class="nav-link ">
                        <span class="title">Sales</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="/items/" class="nav-link ">
                        <span class="title">Relatories</span>
                    </a>
                </li>
            </ul>


        </li>



    </ul>
    </li>
    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>

<!--sidebar-menu
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>

        if(Request::path() == 'customers')
            <li class="active"><a href="/customers"><span>Customers</span></a></li>
        endif

        <li><a href="/customers"><span>{{ Route::current()->getName() }}</span></a> </li>
        <li><a href="/customers"><span>Products</span></a> </li>
        <li><a href="/customers"><span>Customers</span></a> </li>


    </ul>
</div>
-->
