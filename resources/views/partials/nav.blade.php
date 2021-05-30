<!--<header>
    <div class="top-nav container">
      <div class="top-nav-left">
          <div class="logo"><a href="/">Ecommerce</a></div>
          @if (! (request()->is('checkout') || request()->is('guestCheckout')))
          {{ menu('main', 'partials.menus.main') }}
          @endif
      </div>
      <div class="top-nav-right">
          @if (! (request()->is('checkout') || request()->is('guestCheckout')))
          @include('partials.menus.main-right')
          @endif
      </div>
    </div> 
</header>
-->
<!-- Header Section Begins -->
        <header id="header" class="float-panel" data-top="0" data-scroll="100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-menu">
                        <div class="menuBar scrollbtn">
                            <nav class="navbar navbar-default">
                                <div class="skewbox"> </div>
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <div class="logo">
                                            <a class="navbar-brand" href="index.html"><img src="{{ asset('public/img/images/logo2.png')}}" alt="logo" /></a>
                                        </div>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        {{ menu('main', 'partials.menus.main') }}
                                        
                                    </div> 
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Section Ends -->
