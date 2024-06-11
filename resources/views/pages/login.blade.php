@extends('layouts.auth')

@section('content')
<div class="body-bg">
    <section class="crancy-wc crancy-wc__full crancy-bg-cover">
        <div class="crancy-wc__form">
            <!-- Welcome Banner -->
            <div class="crancy-wc__form--middle">
                <div class="crancy-wc__form-inner">
                    <div class="crancy-wc__logo mx-auto ">
                        <a href="{{route('login')}}">
                            <img src="{{asset('img/kartun.png')}}" width="100" />
                        </a>
                    </div>
                    <div class="crancy-wc__form-inside">
                        <div class="crancy-wc__form-middle">
                            <div class="crancy-wc__form-top">
                                <div class="crancy-wc__heading pd-btm-20">
                                    <h3 class="crancy-wc__form-title crancy-wc__form-title__one m-0">
                                        Masuk Anggota
                                    </h3>
                                </div>
                                <!-- Sign in Form -->
                                <form class="crancy-wc__form-main" action="{{route('login')}}"
                                    method="POST">
                                    @csrf
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <div class="form-group__input">
                                            <input class="crancy-wc__form-input" type="email" name="email"
                                                placeholder="Email" required="required" />
                                        </div>
                                    </div>
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <div class="form-group__input">
                                            <input class="crancy-wc__form-input" placeholder="Password"
                                                id="password-field" type="password" name="password" maxlength="8"
                                                required="required" />
                                        </div>
                                    </div>
                                    <!-- Form Group -->
                                    <div class="form-group mg-top-30">
                                        <div class="crancy-wc__button">
                                            <button class="ntfmax-wc__btn" type="submit">
                                                Masuk
                                            </button>
                                        </div>

                                    </div>

                                </form>
                                <!-- End Sign in Form -->
                            </div>
                            <!-- Footer Top -->
                            <div class="crancy-wc__footer--top">
                                <p class="crancy-wc__footer--copyright">
                                    @ 2024 <a href="#">Kelompok 10 Pemrograman Website.</a> All Right Reserved.
                                </p>
                            </div>
                            <!-- End Footer Top -->
                        </div>
                    </div>
                </div>
                <div class="crancy-wc__banner crancy-bg-cover"
                    style="background-image: url('img/welcome-vector-shape.png')">
                    <div class="crancy-wc__banner--img">
                        <img src="img/welcome-vector.png" alt="#" />
                    </div>
                    <div class="crancy-wc__slider">
                        <!-- Sinlge Slider -->
                        <div class="single-slider">
                            <div class="crancy-wc__slider--single">
                                <div class="crancy-wc__slider--content">
                                    <h4 class="crancy-wc__slider--title">
                                        Kartun 11
                                    </h4>
                                    <p class="crancy-wc__slider--text">
                                        Sistem Informasi Internal Karang Taruna <br> Desa Beton RT 1 RW 1
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Welcome Banner -->
        </div>
    </section>
</div>
@endsection
