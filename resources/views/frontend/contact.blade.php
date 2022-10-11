@extends('frontend.master')

@section('title')
    Contact Me
@endsection

@section('content')

<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">Contact us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__wrap__icon">
            <ul>
                <li><img src="assets/img/icons/breadcrumb_icon01.png" alt=""></li>
                
            </ul>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- contact-map -->
    <div id="contact-map">
        <iframe src="https://maps.google.com/maps?q=Jalan%20BTN%20Tabariah%20Blok%20E8%20No.%207&t=&z=13&ie=UTF8&iwloc=&output=embed"
            allowfullscreen loading="lazy"></iframe>
    </div>
    <!-- contact-map-end -->
  
    <!-- contact-area -->
    <div class="contact-area">
        <div class="container">
            <form action="{{ route('contact.message') }}" method="post" class="contact__form">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="name" placeholder="Enter your name*">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" placeholder="Enter your mail*">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="subject" placeholder="Enter your subject*">
                        @error('subject')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="phone" placeholder="Phone Number">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <textarea name="message" id="message" name="message" placeholder="Enter your massage*"></textarea>
                @error('message')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <br><br><br>
                <button type="submit" class="btn">send massage</button>
            </form>
        </div>
    </div>
    <!-- contact-area-end -->

    <!-- contact-info-area -->
    <section class="contact-info-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="contact__info">
                        <div class="contact__info__icon">
                            <img src="{{ asset('frontend/assets/img/icons/contact_icon01.png') }}" alt="">
                        </div>
                        <div class="contact__info__content">
                            <h4 class="title">address line</h4>
                            <span>{{ $setting->address }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact__info">
                        <div class="contact__info__icon">
                            <img src="{{ asset('frontend/assets/img/icons/contact_icon02.png') }}" alt="">
                        </div>
                        <div class="contact__info__content">
                            <h4 class="title">Phone Number</h4>
                            <span>{{ $setting->phone }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact__info">
                        <div class="contact__info__icon">
                            <img src="{{ asset('frontend/assets/img/icons/contact_icon03.png') }}" alt="">
                        </div>
                        <div class="contact__info__content">
                            <h4 class="title">Mail Address</h4>
                            <span>{{ $setting->email }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-info-area-end -->

    <!-- contact-area -->
    <section class="homeContact homeContact__style__two">
        <div class="container">
            <div class="homeContact__wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section__title">
                            <span class="sub-title">07 - Say hello</span>
                            <h2 class="title">Any questions? Feel free <br> to contact</h2>
                        </div>
                        <div class="homeContact__content">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                            <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="homeContact__form">
                            <form action="#">
                                <input type="text" placeholder="Enter name*">
                                <input type="email" placeholder="Enter mail*">
                                <input type="number" placeholder="Enter number*">
                                <textarea name="message" placeholder="Enter Massage*"></textarea>
                                <button type="submit">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

</main>

@endsection