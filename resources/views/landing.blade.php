@extends('layouts.master')
@section('title', 'Welcome to Lottery App')
@section('contents')
    @include('partials.header')
    <main>
        <!-- slider-area -->
        <div id="home" class="home segments">
            @if (\Session::has('error'))
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 mt-2">
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                        {{ \Session::forget('error') }}
                    </div>
                </div>
            @endif
            @if (\Session::has('success'))
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 mt-2">
                        <div class="alert alert-success">{{ \Session::get('success') }}</div>
                        {{ \Session::forget('success') }}
                    </div>
                </div>
            @endif
            <section class="slider-area slider-bg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9">
                            <div class="slider-content text-center">
                                <h6 class="wow fadeInDown" data-wow-delay=".2s">Canuck Auctions </h6>
                                <h2 class="tlt fix" data-in-effect="fadeInLeft">Razzes <span>and Waffles </span>
                                </h2>
                                <p class="wow fadeInUp" data-wow-delay="2s"> The opportunity to win rare and exclusive
                                    items for a fraction of their value!</p>
                                <a href="#" class="btn wow fadeInUp" data-wow-delay="2.2s">Buy a Square</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- slider-area-end -->
            <!-- area-bg-one -->
            <div id="about" class="about segments">
                <div class="area-bg-one">
                    <!----------about us------------>
                    <section id="about-us" class="pt-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="about-img">
                                        <img src="{{ asset('assets/img/images/post.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="section-title title-style-two mb-45">
                                        <span>what we do</span>
                                        <h2>Canuck<span> Razzes <span>and Waffles</span> </h2>
                                        <br>
                                        <br>
                                        <p>Pick a box that is available, or multiple boxes if you wish.<br>
                                            Click the PAY NOW button<br>
                                            Make your payment and the box is yours.<br>



                                            <br>
                                            *Please note your spot is only reserved for 5 minutes from the time you
                                            click
                                            the box to make the payment, otherwise the spot becomes available again.
                                        </p>
                                        <div class="about-btn">
                                            <a href="#lucky" class="btn">BUY A SQUARE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!----------end about us------------>
                    <!-- about-us-area -->
                    <div id="overiview" class="overiview segments">
                        <section class="about-us-area pt-90 pb-120">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 order-0 order-lg-2">
                                        <div class="about-img">
                                            <img src="{{ asset('assets/img/images/post.jpg') }}" alt="">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="section-title title-style-two mb-45">
                                            <span>Razzes and Waffles</span>
                                            <h2>Razzes and Waffles<span> of the<span> Day</span> </h2>
                                        </div>
                                        <div class="about-content">
                                            <p>The Mega Millions lottery offers some of the biggest jackpots in the
                                                world
                                                and with Mega Millions Scratch you can win an incredible $150,000
                                                jackpot
                                                instantly!</p>
                                            <p>Match your numbers with those drawn and you’ll win a mega prize! Scratch
                                                your
                                                way to lottery winnings!</p>
                                            <div class="about-btn">
                                                <a href="#lucky" class="btn">BUY A SQUARE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- about-us-area-end -->
                        <!--------------- Button Box Slider------------->
                        <div id="lucky" class="lucky segments">
                            <section id="button-box">
                                <div class="container">
                                    <div class="row">
                                        <div class="section-title title-style-two mb-45">
                                            <span></span>
                                            <div>
                                                <h2><span>Pick </span> a Square </h2> </span>
                                            </div>
                                            <span>$90 CDN Per Square</span>
                                        </div>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="btn-box">
                                        @php
                                            $colors = ['org', 'red', 'bogon', 'grn', 'blue', 'yllw', 'libo', 'liy', 'ping', 'lsky'];
                                        @endphp
                                        @forelse ($lotteries as $lottery)
                                            <a href="@if ($lottery->is_deleted == false){{ route('processTransaction', [$lottery]) }}@else {!! '#' !!}@endif"
                                                @if ($lottery->is_deleted == true){!! 'aria-disabled="true" class="disabledLink"' !!}@else{!! 'class="' . $colors[$loop->index] . '"' !!}@endif">{{ $lottery->ticket_no }}</a>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                                <div id="smart-button-container">
                                    <div style="text-align: center;">
                                        <div id="paypal-button-container"></div>
                                    </div>
                                </div>
                                <center><span>Please pay Via PayPal.<br> Pay as friends and family.<br>
                                        Please confirm the number of boxes you desire in PayPal message.
                                        <br>At this time we cannot guarantee a specific box number I.e box #7</span>
                                </center>
                            </section>
                            <!--------------- End Button Box Slider------------->
                        </div>
                        <!-- area-bg-one-end -->
                        <!-- game-manage-area -->
                        <div id="cominggames" class="cominggames segments">
                            <section class="game-manage-area game-mange-bg pt-120 pb-120">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-7 col-lg-8">
                                            <div class="section-title title-style-two text-center mb-60">
                                                <span></span>
                                                <h2>Upcoming<span> Razzes and Waffles</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="coming-match-item mb-30">
                                                <div class="coming-match-team">
                                                    <div class="match-team-info">
                                                        <div class="match-team-logo">
                                                            <a href="#"><img
                                                                    src="{{ asset('assets/img/team/team_logo01.png') }}"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="match-team-name">
                                                            <a href="#"></a>
                                                        </div>
                                                    </div>
                                                    <div class="coming-match-status">
                                                        <img src="{{ asset('assets/img/team/match_vs.png') }}" alt="">
                                                    </div>
                                                    <div class="match-team-info">
                                                        <div class="match-team-logo">
                                                            <a href="#"><img
                                                                    src="{{ asset('assets/img/team/team_logo02.png') }}"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="match-team-name">
                                                            <a href="#"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="coming-match-info">
                                                    <h5>Forza <span>Horizon ii</span></h5>
                                                    <div class="match-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="match-info-action">

                                                    </div>
                                                </div>
                                                <div class="coming-match-time">
                                                    <div class="coming-time" data-countdown="2021/11/25"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="coming-match-item mb-30">
                                                <div class="coming-match-team">
                                                    <div class="match-team-info">
                                                        <div class="match-team-logo">
                                                            <a href="#"><img
                                                                    src="{{ asset('assets/img/team/team_logo03.png') }}"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="match-team-name">
                                                            <a href="#"></a>
                                                        </div>
                                                    </div>
                                                    <div class="coming-match-status">
                                                        <img src="{{ asset('assets/img/team/match_vs.png') }}" alt="">
                                                    </div>
                                                    <div class="match-team-info">
                                                        <div class="match-team-logo">
                                                            <a href="#"><img
                                                                    src="{{ asset('assets/img/team/team_logo04.png') }}"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="match-team-name">
                                                            <a href="#"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="coming-match-info">
                                                    <h5>Thanos <span>Sky ii</span></h5>
                                                    <div class="match-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="match-info-action">

                                                    </div>
                                                </div>
                                                <div class="coming-match-time">
                                                    <div class="coming-time" data-countdown="2021/12/30"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="coming-match-item mb-30">
                                                <div class="coming-match-team">
                                                    <div class="match-team-info">
                                                        <div class="match-team-logo">
                                                            <a href="#"><img
                                                                    src="{{ asset('assets/img/team/team_logo05.png') }}"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="match-team-name">
                                                            <a href="#"></a>
                                                        </div>
                                                    </div>
                                                    <div class="coming-match-status">
                                                        <img src="{{ asset('assets/img/team/match_vs.png') }}" alt="">
                                                    </div>
                                                    <div class="match-team-info">
                                                        <div class="match-team-logo">
                                                            <a href="#"><img
                                                                    src="{{ asset('assets/img/team/team_logo06.png') }}"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="match-team-name">
                                                            <a href="#"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="coming-match-info">
                                                    <h5>Hunter <span>Killer ii</span></h5>
                                                    <div class="match-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="match-info-action">

                                                    </div>
                                                </div>
                                                <div class="coming-match-time">
                                                    <div class="coming-time" data-countdown="2021/12/10"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('partials.footer')
@endsection
@push('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
@endpush
