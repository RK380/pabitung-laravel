<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/ma.png" alt="">
        <img src="assets/img/pa.png" alt="">
        <h1 class="sitename">PA Bitung</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/monperkara">Monitoring Perkara</a></li>
          <li><a href="/monipendis">Monitoring Pendistribusian Berkas</a></li>
          <li><a href="/monpihakmed">Monitoring Pihak Mediasi</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      @guest
          <a class="btn-getstarted flex-md-shrink-0"
            href="{{ route('login') }}">
              Login
          </a>
      @endguest

      @auth
          <div class="d-flex align-items-center gap-2">
              <span style="font-size:14px;margin-left:20px;color: #056e4f;">
                  {{ auth()->user()->name }}
                  ({{ auth()->user()->role_label }})
              </span>
              <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit"
                          class="btn-getstarted border-0">
                      Logout
                  </button>
              </form>
          </div>
      @endauth

    </div>
</header>