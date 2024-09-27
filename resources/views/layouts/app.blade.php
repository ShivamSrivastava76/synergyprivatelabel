<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title> Moxxpharma</title>
        <!-- meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="meta description">
        <link rel="shortcut icon" href="{{url('asset/img/favicon.png')}}" type="image/favicon">
        <!-- fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <!-- all css -->
    
        <link rel="stylesheet" href="{{url('asset/css/vendor.css')}}">
        <link rel="stylesheet" href="{{url('asset/css/style.css')}}">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="body-wrapper">
            <!-- announcement bar start -->
            <div class="announcement-bar bg-1 py-1 py-lg-2">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-3 d-lg-block d-none">
                            <div class="announcement-call-wrapper">
                                <div class="announcement-call">
                                    <a class="announcement-text text-white" href="tel:+6494461709">Call: +91 000 000 0000</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="announcement-text-wrapper d-flex align-items-center justify-content-center">
                                <p class="announcement-text text-white">New year sale - 30% off</p>
                            </div>
                        </div>
                        <div class="col-lg-3 d-lg-block d-none">
                            <div class="announcement-meta-wrapper d-flex align-items-center justify-content-end">
                                <div class="announcement-meta d-flex align-items-center">
                                    <a class="announcement-login announcement-text text-white" href="{{url('login')}}">
                                        <svg class="icon icon-user" width="10" height="11" viewBox="0 0 10 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 0C3.07227 0 1.5 1.57227 1.5 3.5C1.5 4.70508 2.11523 5.77539 3.04688 6.40625C1.26367 7.17188 0 8.94141 0 11H1C1 8.78516 2.78516 7 5 7C7.21484 7 9 8.78516 9 11H10C10 8.94141 8.73633 7.17188 6.95312 6.40625C7.88477 5.77539 8.5 4.70508 8.5 3.5C8.5 1.57227 6.92773 0 5 0ZM5 1C6.38672 1 7.5 2.11328 7.5 3.5C7.5 4.88672 6.38672 6 5 6C3.61328 6 2.5 4.88672 2.5 3.5C2.5 2.11328 3.61328 1 5 1Z"
                                                fill="#fff" />
                                        </svg>
                                        <span>Login</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- announcement bar end -->
