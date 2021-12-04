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
                                    <li class="show"><a href="http://canuckauctions.ca/">Home</a>

                                    </li>
                                    <li><a href="#about">About</a>

                                    </li>
                                    <li><a href="#overiview">Overview</a></li>
                                    <li><a href="#lucky">Buy a Square</a></li>
                                    <li><a href="#cominggames">Upcoming Items</a></li>
                                    <li><a href="#news">NewsLetter</a></li>
                                    <li><a href="{{ route('login') }}">Login</a></li>

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
                                    <li class="header-search"><a href="#" data-toggle="modal"
                                            data-target="#search-modal"><i class="fas fa-search"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="mobile-menu"></div>
                </div>
                <!-- Modal Search -->
                <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form>
                                <input type="text" placeholder="Search here...">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
