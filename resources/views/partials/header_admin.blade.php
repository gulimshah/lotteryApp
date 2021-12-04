<header>
    <div id="sticky-header" class="main-header">
        <div class="container-fluid container-full-padding">
            <div class="row">
                <div class="col-12">
                    <div class="main-menu">
                        <nav>
                            <div class="logo">
                                <a href="#home"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo"></a>
                            </div>
                            <div id="mobile-menu" class="navbar-wrap d-none d-lg-flex">
                                <ul>
                                    <li class="show"><a href="{{ route('home') }}">Home</a>

                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                            Logout
                                        </a>
                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                            </div>
                            <div class="header-action">
                                <ul>
                                    <li class=""><a href="#"><i
                                                class=""></i><span></span></a>
                                        <ul class="minicart">
                                            <li class="d-flex align-items-start">
                                                <div class="">
                                                    <a href="#">

                                                    </a>
                                                </div>
                                                <div class="cart-content">
                                                    <h4>

                                                    </h4>
                                                    <div class="cart-price">

                                                        <span>

                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="del-icon">
                                                    <a href="#">

                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="total-price">


                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkout-link">

                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
</header>
