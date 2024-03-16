<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-radioactive menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/category/view')}}">View Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/category/add')}}">Add Category</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/product/view')}}"> View Product </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/product/add')}}"> Add Product  </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/slider/view')}}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">SLIDER IMAGES</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartjs.html">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Charts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Icons</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>
