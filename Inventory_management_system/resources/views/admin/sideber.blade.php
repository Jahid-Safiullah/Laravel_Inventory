<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img style="width: 60%; padding-left: 10px;" src="admin/assets/images/Trunk-removebg-preview.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img style="width: 100%; padding-left: 10px;" src="admin/assets/images/TR.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="admin/assets/images/faces/jahid.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Jahidul Islam</h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>

          <li class="nav-item menu-items">
           <a class="nav-link" href="{{url('/')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-Suppliers" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="fa-solid fa-person" style="color: #cf02d6;"></i>
              </span>
              <span class="menu-title">Manage Suppliers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Suppliers">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('index_supplier')}}">Add Supplier</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('all_supplier')}}">All Supplier</a></li>
               
              </ul>
            </div>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-Customers" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="fa-solid fa-people-roof" style="color: #7b71ff;"></i>
              </span>
              <span class="menu-title">Manage Customers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Customers">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/view_cusomer')}}">Add Cusotmer</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('all_customer')}}">All Customer </a></li>
                <li class="nav-item"> <a class="nav-link" href="">All Customer Report</a></li>

              </ul>
            </div>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Basic UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages">Typography</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('units')}}">
              <span class="menu-icon">
                <i class="fa-solid fa-weight-hanging" style="color: #727171;"></i>
              </span>
              <span class="menu-title">Manage Units</span>
            </a>
          </li>



          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('catagory')}}">
              <span class="menu-icon">
                <i class="fa-solid fa-diagram-next" style="color: #0354e0;"></i>
              </span>
              <span class="menu-title">Manage Catagories</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('product')}}">
              <span class="menu-icon">
                <i class="fa-brands fa-product-hunt" style="color: #dc00b7;"></i>
              </span>
              <span class="menu-title">Manage Product</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-Purchase" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="fa-solid fa-cart-shopping" style="color: #da8405;"></i>
              </span>
              <span class="menu-title">Manage Purchase</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Purchase">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages">All Purchase</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages">Aproval Purchase</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages">Daily Purchase Report</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-Invoice" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="fa-solid fa-file-invoice" style="color: #e2cf00;"></i>
              </span>
              <span class="menu-title">Manage Invoice</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Invoice">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages">All Invoice</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages">Aproval Invoice</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages">Daily Invoice Report</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-Stock" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="fa-solid fa-cubes-stacked" style="color: #5be300;"></i>
              </span>
              <span class="menu-title">Manage Stock</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Stock">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages">Stock Report</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages">Supplier wise Report</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages">product wise Report</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="page"> Blank Page </a></li>
                <li class="nav-item"> <a class="nav-link" href="pag"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pa"> 500 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pag"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="page"> Register </a></li>
              </ul>
            </div>
          </li>

        </ul>
      </nav>
