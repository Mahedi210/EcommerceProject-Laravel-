<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/admin')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview menu-open">
                <a href="{{url('/home')}}">
                    <i class="fa fa-dashboard"></i><span>Dashboard</span>

                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>

                    </span>

                </a>

            </li>




            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/category/add-category')}}"><i class="fa fa-circle-o"></i>Add Category</a></li>
                    <li><a href="{{url('/category/manage-category')}}"><i class="fa fa-circle-o"></i>Manage Category</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Brand</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/brand/add-brand')}}"><i class="fa fa-circle-o"></i>Add Brand</a></li>
                    <li><a href="{{url('/brand/manage-brand')}}"><i class="fa fa-circle-o"></i>Manage Brand</a></li>

                </ul>
            </li>


 <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Product</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/product/add-product')}}"><i class="fa fa-circle-o"></i>Add Product</a></li>
                    <li><a href="{{url('/product/manage-product')}}"><i class="fa fa-circle-o"></i>Manage Product</a></li>

                </ul>
            </li>


            <li class="">
                <a href="{{url('/manage-order')}}">
                    <i class="fa fa-edit"></i>
                    <span>order</span>

                </a>

            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

