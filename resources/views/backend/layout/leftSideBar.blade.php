<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">


        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="active">
            <a href="{{route('home')}}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>




        {{------------------------------------------Product Menu Start--------------------------------------}}
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-sitemap"></i>
                <span class="menu-text"> Product Manage </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{route('product.show')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Products Add </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('product') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Products List </span>
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>


{{------------------------------------------Order list Start--------------------------------------}}
        {{-- <li class="">
            <a href="{{route('backend.order.index')}}">
                <i class="menu-icon fa fa-bolt"></i>
                <span class="menu-text"> Order List</span>
            </a>
            <b class="arrow"></b>
        </li> --}}

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bolt"></i>
                <span class="menu-text"> Manage Oreder </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="{{route('backend.order.index')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> New Order </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{route('backend.order.orderShipping')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Shipping Order </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{route('backend.order.deliveredOrder')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Delivered Order </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{route('backend.order.cancelOrder')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Cancel Order </span>
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>



{{------------------------------------------Category Menu Start--------------------------------------}}
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-paw"></i>
                <span class="menu-text"> Category Manage </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{route('category')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Category </span>
                    </a>

                    <b class="arrow"></b>

                </li>

                <li class="">
                    <a href="{{route('subcategory')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Sub Category </span>
                    </a>

                    <b class="arrow"></b>

                </li>

                <li class="">
                    <a href="{{route('subsubcategory')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Sub Sub Category </span>
                    </a>

                    <b class="arrow"></b>

                </li>

            </ul>
        </li>


{{------------------------------------------Category Menu End--------------------------------------}}




{{------------------------------------------Brand Menu Start--------------------------------------}}
        <li class="">
            <a href="{{route('brand')}}">
                <i class="menu-icon fa fa-fire"></i>
                <span class="menu-text"> Brand </span>
            </a>
            <b class="arrow"></b>
        </li>


{{------------------------------------------Coupon Start--------------------------------------}}
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> Coupon Manage </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{route('coupon.create')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Coupon Add </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('coupon') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Coupon List </span>
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>



        {{------------------------------------------Customer Manage Menu Start--------------------------------------}}


        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-file"></i>
                <span class="menu-text">Customer Manage</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{ route('backendCustomer') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Customer List </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('customers.show') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Add New Customer </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('backend.contactus.msg') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Customer Message  </span>
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>


        {{------------------------------------------Customer Manage Menu End--------------------------------------}}




        {{------------------------------------------Area Manage Menu Start--------------------------------------}}


        <li class="">
            <a href="{{route('backend.area')}}">
                <i class="menu-icon fa fa-bolt"></i>
                <span class="menu-text"> Area Manage</span>
            </a>

            <b class="arrow"></b>
        </li>


        {{------------------------------------------Area Manage Menu End--------------------------------------}}








{{------------------------------------------Client Comment Menu Start--------------------------------------}}

         <li class="">

            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-comment"></i>
                <span class="menu-text"> Client Comment </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{route('clientComment.show')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Comment Add </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('clientComment') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Comment List </span>
                    </a>


                    <b class="arrow"></b>
                </li>
            </ul>
         </li>

   {{------------------------------------------Client Menu End--------------------------------------}}



{{------------------------------------------Why Peoaple Love  Menu Start--------------------------------------}}

         <li class="">

            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-heart"></i>
                <span class="menu-text"> Why People Love </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{route('whyPeopleLove.create')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Add Image </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ route('whyPeopleLove') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Image List </span>
                    </a>


                    <b class="arrow"></b>
                </li>
            </ul>
         </li>

   {{------------------------------------------Client Menu End--------------------------------------}}







        {{------------------------------------------Admin list Start--------------------------------------}}
        <li class="">
            <a href="{{route('backend.admin.index')}}">
                <i class="menu-icon fa fa-key"></i>
                <span class="menu-text"> Admin</span>
            </a>

            <b class="arrow"></b>
        </li>

        {{------------------------------------------Admin list End--------------------------------------}}


        {{------------------------------------------Web Configuration Start--------------------------------------}}

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-file"></i>
                <span class="menu-text"> Web Configuration </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="">
                    <a href="{{route('configuration')}}">
                        <i class="menu-icon fa fa-cogs"></i>
                        <span class="menu-text"> Configuration </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{route('seo')}}">
                        <i class="menu-icon fa fa-cogs"></i>
                        <span class="menu-text"> SEO </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{route('sectiontitle')}}">
                        <i class="menu-icon fa fa-cogs"></i>
                        <span class="menu-text"> Home Section Titles </span>
                    </a>

                    <b class="arrow"></b>
                </li>


                <li class="">
                    <a href="{{route('topbackground')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> TopBackground </span>
                    </a>

                    <b class="arrow"></b>
                </li>


                <li class="">
                    <a href="{{route('topTwoOffer')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Top Two Offer Image </span>
                    </a>

                    <b class="arrow"></b>
                </li>


                <li class="">
                    <a href="{{route('howToOrder')}}">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text"> How To Order </span>
                    </a>

                    <b class="arrow"></b>
                </li>




                <li class="">
                    <a href="{{ route('backend.contactus.msg') }}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Customer Message </span>
                    </a>

                    <b class="arrow"></b>
                </li>


                <li class="">
                    <a href="{{route('footermenu')}}">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Footer Menu </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{route('quickFooter')}}">
                        <i class="menu-icon fa fa-key"></i>
                        <span class="menu-text"> Quick Footer</span>
                    </a>

                    <b class="arrow"></b>
                </li>



            </ul>
        </li>

        {{------------------------------------------Web Configuration End--------------------------------------}}







    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>




