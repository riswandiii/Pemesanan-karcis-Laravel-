<header class="site-header">
    <div class="top-header">
        <div class="container">
            <div class="top-header-left">
                <div class="top-header-block">
                    <a href="mailto:info@educationpro.com" itemprop="email"><i class="fas fa-envelope"></i> salupajaan@gmail.com</a>
                </div>
                <div class="top-header-block">
                    <a href="tel:+9779813639131" itemprop="telephone"><i class="fas fa-phone"></i> +977 9813639131</a>
                </div>
            </div>
            <div class="top-header-right">
                <div class="social-block">
                    <ul class="social-list">
                        <li><a href=""><i class="fab fa-viber"></i></a></li>
                        <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href=""><i class="fab fa-facebook-square"></i></a></li>
                        <li><a href=""><i class="fab fa-facebook-messenger"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href=""><i class="fab fa-skype"></i></a></li>
                    </ul>
                </div>
                <div class="login-block">
                    @auth
                    <a href=""><i class="bi bi-person-lines-fill"></i> Welcome, {{ auth()->user()->fullname }}</a>
                    @else 
                    <a href="/login">Login /</a>
                    <a href="/registrasi">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <!-- Top header Close -->
    <div class="main-header">
        <div class="container">
            <div class="logo-wrap" itemprop="logo">
                <img src="/images/site-logo.jpg" alt="Logo Image">
                <!-- <h1>Education</h1> -->
            </div>
            <div class="nav-wrap">
                <nav class="nav-desktop">
                    <ul class="menu-list">
                        <li><a href="/">Home</a></li>
                        
                        <li class="menu-parent">Pesanan
                            <ul class="sub-menu">
                                <li><a href="/pesanan-karcis">Pesanan karcis</a></li>
                                <li><a href="/pesanan-fasilitas-user">Pesanan fasilitas</a></li>
                                <li><a href="/history-pemesanan">History pemesanan</a></li>
                                @can('admin')
                                <li><a href="/dashboard">Dashboard admin</a></li>
                                @endcan
                                @auth
                                <li>
                                    <form action="/logout" method="post" class="d-inline">
                                        @csrf 
                                        <button class="dropdown-item" type="submit" onclick="return confirm('Yakin ingin keluar?')">Logout</button>
                                    </form>
                                </li>
                                @endauth
                            </ul>
                        </li>
                        <li><a href="/gallery">Gallery</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><hr class="dropdown-divider"></li>
                    </ul>
                </nav>
                <div id="bar">
                    <i class="fas fa-bars"></i>
                </div>
                <div id="close">
                    <i class="fas fa-times"></i>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Close -->