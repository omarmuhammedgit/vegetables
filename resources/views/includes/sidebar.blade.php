<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashoard') }}" class="brand-link">
        <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">مزاد الخضار</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/admin/dist/img/user1.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li
                    class="nav-item has-treeview {{ request()->is('customer*') || request()->is('Suppler*') ? 'menu-open' : '' }}">
                    <a href=""
                        class="nav-link {{ request()->is('customer*') || request()->is('Suppler*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            العملاء والموردين

                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('customer.index') }}"
                                class="nav-link {{ request()->is('customer*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    العملاء
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Suppler.index') }}"
                                class="nav-link {{ request()->is('Suppler*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    الموردين
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li
                    class="nav-item has-treeview {{ request()->is('Product*') || request()->is('invoiceSuppler*') ? 'menu-open' : '' }}">
                    <a href=""
                        class="nav-link {{ request()->is('Product*') || request()->is('invoiceSuppler*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            المنتجات والفواتير

                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('Product.index') }}"
                                class="nav-link {{ request()->is('Product*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    المنتجات
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('invoiceSuppler.index') }}"
                                class="nav-link {{ request()->is('invoiceSuppler*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    اضافة فاتورة
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>


               <li class="nav-item has-treeview {{ (request()->is('CatchSupport*')|| request()->is('Exchanges*'))?'menu-open':'' }}">
                <a href="" class="nav-link {{ (request()->is('CatchSupport*')|| request()->is('Exchanges*'))?'active':'' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        سندات الصرف والقبض

                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('Exchanges.index') }}" class="nav-link {{ (request()->is('Exchanges*'))?'active':'' }}">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                                 سند الصرف
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('CatchSupport.index') }}" class="nav-link {{ (request()->is('CatchSupport*'))?'active':'' }}">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                             سند القبض
                          </p>
                        </a>
                      </li>

                </ul>
               </li>

                <li
                    class="nav-item has-treeview {{ request()->is('report-suppler*') || request()->is('report-customer*') ? 'menu-open' : '' }}">
                    <a href=""
                        class="nav-link {{ request()->is('report-suppler*') || request()->is('report-customer*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            تقارير

                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('report-customer') }}"
                                class="nav-link {{ request()->is('report-customer*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    تقرير العملاء
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('report-suppler') }}"
                                class="nav-link {{ request()->is('report-suppler*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    تقرير الموردين
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->is('Setting*') ? 'menu-open' : '' }}">
                    <a href="" class="nav-link {{ request()->is('Setting*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            الاعدادات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('Setting.index') }}"
                                class="nav-link {{ request()->is('Setting*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    الاعدادات
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
