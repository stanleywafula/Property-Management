<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>Property Management Software</title>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css') }}" />
  </head>

  <body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">
        <div class="row">

          <section class="col-lg-5 navbar-mobile">
            <nav class="nav nav-navbar mr-auto">
              <a class="nav-link" href="#pricing">Pricing</a>
              <a class="nav-link active" href="#crm">Property Management</a>
            </nav>
          </section>

          <div class="col-auto col-lg-auto1 mr-auto mx-lg-auto d-flex align-items-center">
            <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="#">
            <img class="logo-dark" src="{{ asset('img/logo-dark.png') }}" alt="logo">
            <img class="logo-light" src="{{ asset('img/logo-light.png') }}" alt="logo">
          </a>
          </div>

          <div class="col-auto col-lg-5 text-right">


            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-sm btn-round btn-success">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-round btn-outline-success d-none d-lg-inline-block mr-2">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-sm btn-round btn-success">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

          </div>

        </div>
      </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
    <header class="header text-white h-fullscreen pb-0 overflow-hidden" style="background-image: url({{ asset('img/16.png') }}); background-color: #262a37;">
      <div class="overlay opacity-95" style="background-image: linear-gradient(to bottom, #09203f 0%, #537895 100%);"></div>
      <div class="container text-center">
        <div class="row align-items-center h-100">

          <div class="col-md-8 mx-auto">
            <h1>The all-in-one property management software
                with more “all.”</h1>
            <p class="lead mt-4 mb-7">Accounting, communications, leasing, highly-rated mobile apps—get everything you need…and then some.</p>
            <a class="btn btn-xl btn-round btn-primary px-8" href="{{ route('register') }}">Try For Free</a>
          </div>

          <div class="col-md-8 mx-auto align-self-end">
            <img class="mt-7" src="{{ asset('img/cps1.png') }}" alt="img" data-aos="fade-up">
          </div>

        </div>
      </div>
    </header><!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">

      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Features
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section bg-gray overflow-hidden">
        <div class="container-fluid">
          <div class="row gap-y align-items-center">

            <div class="col-md-4 mx-auto text-center">
              <img class="border shadow-7" src="{{ asset('img/client.png') }}" alt="..." data-aos="fade-right">
            </div>


            <div class="col-md-4 mx-auto">
              <h3 id="crm">Client Relationship Management</h3>
              <p>As soon as your client walks through your property’s (physical or digital) door, get their  details through automated client intake forms. .</p>

            </div>

          </div>
        </div>
      </section>


      <section class="section overflow-hidden">
        <div class="container-fluid">
          <div class="row gap-y align-items-center">

            <div class="col-md-4 mx-auto text-center">
              <img class="border shadow-7" src="{{ asset('img/cps1.png') }}" alt="..." data-aos="fade-left">
            </div>


            <div class="col-md-4 mx-auto order-md-first">
              <h3>Your residents expect more than ever before</h3>
              <p>Access need-to-know data anytime, anywhere.
                In the office or on the road, access case details via your smartphone, tablet, notebook, or desktop.<br></p>

            </div>

          </div>
        </div>
      </section>


      <section class="section bg-gray overflow-hidden">
        <div class="container-fluid">
          <div class="row gap-y align-items-center">

            <div class="col-md-4 mx-auto text-center">
              <img class="border shadow-7" src="{{ asset('img/why.png') }}" alt="..." data-aos="fade-right">
            </div>


            <div class="col-md-4 mx-auto">
              <h3>Safe, secure, and reliable</h3>
              <p>We keep your information secure through a 256-bit military grade encryption.

                Just as safe as your online bank.
                As soon as you log in, data is transmitted using an encrypted connection and boom — even Jason Bourne couldn’t get in.</p>

            </div>

          </div>
        </div>
      </section>


      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Teamwork To The Next Level
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section">
        <div class="container">
          <header class="section-header">
            <small>Features</small>
            <h2>All portfolios. All unit counts.</h2>
            <hr>
            <p class="lead">Whether you manage five doors or five thousand, you need a simple, unified platform that powers you to be your best</p>
            <br>
          </header>

          <div class="row gap-y text-center">

            <div class="col-md-6 col-xl-4 feature-1">
              <p class="feature-icon lead-8 text-info"><i class="fa fa-calendar"></i></p>
              <h5>Maintenance Managent</h5>
              <p class="text-muted">Residents, owners, or employees can submit work orders, and attach videos, documents, and images. Get status updates from your phone, tablet or desktop.</p>
            </div>

            <div class="col-md-6 col-xl-4 feature-1">
              <p class="feature-icon lead-8 text-danger"><i class="fa fa-money"></i></p>
              <h5>Billing</h5>
              <p class="text-muted">We’ve partnered with MPesa to bring you an easy way to make, receive and process cash payments.</p>
            </div>

            <div class="col-md-6 col-xl-4 feature-1">
              <p class="feature-icon lead-8 text-success"><i class="fa fa-comments"></i></p>
              <h5>Dedicated live support</h5>
              <p class="text-muted">Whether you need help getting started or have a question regarding the product, our Customer Success Managers are available LIVE during  business hours. We're always ready to give you answers via live chat, phone support, and email.</p>
            </div>

          </div>

        </div>
      </section>


      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Pricing
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section bg-gray" id="pricing">
        <div class="container">
          <div class="row gap-y align-items-center">

            <div class="col-md-4">
              <p class="lead-7 text-dark fw-600 lh-2">Choose the perfect plan</p>

              <div class="btn-group btn-group-toggle my-7" data-toggle="buttons">
                <label class="btn btn-round btn-outline-dark w-150">
                  <input type="radio" name="pricing" value="monthly" autocomplete="off"> Monthly
                </label>
                <label class="btn btn-round btn-outline-dark w-150 active">
                  <input type="radio" name="pricing" value="yearly" autocomplete="off" checked> Yearly
                </label>
              </div>

              <p class="lead">Flexible plans to fit your firm, with no surprises.</p>
              <p class="fw-400"><a href="tel:0715754281">Call for full pricing details <i class="fa fa-phone"></i></a></p>
            </div>


            <div class="col-md-7 ml-auto">
              <div class="row gap-y">

                <div class="col-md-6">
                  <div class="card text-center shadow-1 hover-shadow-9">
                    <div class="card-img-top text-white bg-img h-200 d-flex align-items-center" style="background-image: url({{ asset('img/3.jpg') }})" data-overlay="1">
                      <div class="position-relative w-100">
                        <p class="lead-4 fw-600 ls-1 mb-0">Essential</p>
                        <p><span data-bind-radio="pricing" data-monthly="Monthly" data-yearly="Yearly">Monthly</span> Package</p>
                      </div>
                    </div>
                    <div class="card-body py-6">
                      <p class="lead-7 fw-600 text-dark mb-0">
                        <span data-bind-radio="pricing" data-monthly="Kes 6000" data-yearly="Kes 5000">KES 5000</span>
                      </p>
                      <p class="text-lighter">/ user / month</p>
                      <p>
                        Your portfolio is taking off and you’re ready to up your game. Get the essentials to automate your day-to-day and get your business running from a central platform.
                      </p>
                      <br>
                      <div>
                        <a class="btn btn-round btn-outline-secondary w-200" href="#" data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">Sign up</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card text-center shadow-1 hover-shadow-9">
                    <div class="card-img-top text-white bg-img h-200 d-flex align-items-center" style="background-image: url({{ asset('img/11.jpg') }})" data-overlay="2">
                      <div class="position-relative w-100">
                        <p class="lead-4 fw-600 ls-1 mb-0">Growth</p>
                        <p><span data-bind-radio="pricing" data-monthly="Monthly" data-yearly="Yearly">Monthly</span> Package</p>
                      </div>
                    </div>
                    <div class="card-body py-6">
                      <p class="lead-7 fw-600 text-dark mb-0">
                        <span data-bind-radio="pricing" data-monthly="Kes 8000" data-yearly="Kes 10000">KES 10000</span>
                      </p>
                      <p class="text-lighter">/ user / month</p>
                      <p>
                        ou’re growing and need the right tools to take you there. Grow from Essential with additional features, support, and performance insights to help you optimize.
                      </p>
                      <br>
                      <div>
                        <a class="btn btn-round btn-secondary w-200" href="#" data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">Sign up</a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </section>


      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Partners
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section">
        <div class="container">
          <header class="section-header">
            <h2>Our Customers</h2>
            <hr>
            <p class="lead">Join more than 50 teams using TheSaaS Business</p>
          </header>

          <div class="pb-7" data-provide="slider" data-autoplay="true" data-slides-to-show="4" data-dots="true">
            <div><img src="{{ asset('img/partner/1.png') }}" alt="partner 1"></div>
            <div><img src="{{ asset('img/partner/2.png') }}" alt="partner 2"></div>
            <div><img src="{{ asset('img/partner/3.png') }}" alt="partner 3"></div>
            <div><img src="{{ asset('img/partner/4.png') }}" alt="partner 4"></div>
            <div><img src="{{ asset('img/partner/5.png') }}" alt="partner 5"></div>
            <div><img src="{{ asset('img/partner/6.png') }}" alt="partner 6"></div>
          </div>

        </div>
      </section>



      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | CTA
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section bg-gray text-center">
        <div class="container">
          <h2 class="mb-6"><strong>.Start Your Free Trial Today</strong></h2>
          <p class="lead text-muted">Join over 30 Companies that trust us</p>
          <hr class="w-5 my-7">
          <a class="btn btn-lg btn-round btn-primary" href="{{ route('register') }}">Try free for 30 days</a>
        </div>
      </section>


    </main>


    <!-- Footer -->
    <footer class="footer text-white bt-0 py-7" style="background-image: linear-gradient(135deg, #4481eb 0%, #04befe 100%);">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-md-6">
            <div class="nav nav-bold nav-uppercase justify-content-center justify-content-md-end">
              <a class="nav-link" href="#">About</a>
              <a class="nav-link" href="#">Email us</a>
              <a class="nav-link" href="#">Contact us</a>
            </div>
          </div>

          <div class="col-md-6 text-center text-md-left mt-5 mt-md-0">
            <div class="social social-bg-dark">
              <a class="social-facebook" href="#"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="#"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram" href="#"><i class="fa fa-instagram"></i></a>
              <a class="social-youtube" href="#"><i class="fa fa-youtube"></i></a>
              <a class="social-dribbble" href="#"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>

          <div class="col-12 text-center">
            <br>
            <small>© Stanley Wafula 2023, All rights reserved.</small>
          </div>

        </div>
      </div>
    </footer><!-- /.footer -->


    <!-- Scripts -->
    <script src="{{ asset('js/page.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

  </body>
</html>
