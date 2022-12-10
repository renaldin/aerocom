<aside id="sidebar" class="sidebar">
  <div class="sidebar-img">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-heading">Dashboard</li>
    <li class="nav-item">
      <a class="nav-link {{ $sidebarTitle === 'Dashboard' ? '':'collapsed'  }}" href="{{ route('home') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-heading">Maste Data</li>
    <li class="nav-item">
      <a class="nav-link {{ $sidebarTitle === 'Users' ? '':'collapsed'  }}" href="{{ route('users') }}">
        <i class="bi bi-people"></i>
        <span>Manage Users</span>
      </a>
    <li class="nav-item">
      <a class="nav-link {{ $sidebarTitle === 'Products' ? '':'collapsed'  }}" href="{{ route('products') }}">
        <i class="bi bi-layers"></i>
        <span>Manage Products</span>
      </a>
    </li><!-- End Profile Page Nav -->
    <li class="nav-item">
      <a class="nav-link {{ $sidebarTitle === 'Categories' ? '':'collapsed'  }}" href="{{ route('categories') }}">
        <i class="bi bi-intersect"></i>
        <span>Manage Categories</span>
      </a>
    </li><!-- End Profile Page Nav -->
    <li class="nav-item">
      <a class="nav-link {{ $sidebarTitle === 'News' ? '':'collapsed'  }}" href="{{ route('news') }}">
        <i class="bi bi-boxes"></i>
        <span>Manage News</span>
      </a>
    </li><!-- End Profile Page Nav -->

  </ul>
</div>
</aside>