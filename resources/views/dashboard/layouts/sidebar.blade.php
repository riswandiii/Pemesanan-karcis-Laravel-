<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">
              <span data-feather="home"></span>
              Home
            </a>
          </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('data-karcis*') ? 'active' : '' }}" href="/data-karcis">
              <span data-feather="file"></span>
              Data karcis
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('data-fasilitas*') ? 'active' : '' }}" href="/data-fasilitas">
              <span data-feather="file"></span>
              Data fasilitas
            </a>
          </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('data-pesanan*') ? 'active' : '' }}" href="/data-pesanan">
            <span data-feather="file"></span>
            Laporan data pemesanan fasilitas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('data-bukti-transfer') ? 'active' : '' }}" href="/data-bukti-transfer">
            <span data-feather="file"></span>
            Laporan transaksi penjualan
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link {{ Request::is('data-users') ? 'active' : '' }}" href="/data-users">
            <span data-feather="users"></span>
            Customers
          </a>
        </li> --}}
      </ul>
    </div>
  </nav>