@extends('layout2')


@section('content')
<!-- Banner Section Begins -->
        <section class="banner wow animated fadeInLeft" data-wow-delay="0.5s">
            <div class="container pr">
                <div class="banskew"></div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="bannerText">
                            <h1 class="slideout"> Jessica Caldeira </h1>
                            <h3> Registered dietitian </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Section Ends -->

        <!-- Scroll Down Section Begins -->
        <section class="scrollDown scrollbtn">
            <h6> <a href="#boxes"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Scroll Down </a> </h6>
        </section>
        <!-- Scroll Down Section Ends -->

    </div>

    <div class="main">

        <!-- Box Section Begins -->
        <section id="boxes" class="boxes pad-top-120 pad-bottom-110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-padding">
                        <div>
                            <figure><img src="{{ asset('public/img/images/apple_2000.jpg')}}" alt="image" /></figure>
                            <!-- <div class="boxInfo">
                                <h3> Dite Tips </h3>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-padding">
                        <div>
                            <figure><img src="{{ asset('public/img/images/salad_2000.jpg')}}" alt="image" /></figure>
                           
                            <!--<div class="boxInfo">
                                <h3> Training Like a Pro </h3>
                            </div>-->
                        </div>
                    </div>
                    <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                        <div >
                            <figure><img src="images/11small.png" alt="image" /></figure>
                            <!--<div class="boxInfo">
                                <h3> Beauty Tips </h3>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </section>
        <!-- Box Section Ends -->

        <!-- About Section Begins -->
        <?php
        foreach($pages as $page){
        if($page->slug == 'welcome'){ ?>
        <section id="about" class="about pad-top-110 pad-bottom-120">
            <div class="container-fluid no-padding">
                <div class="row no-margin">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow animated fadeInLeft" data-wow-delay="0.5s">
                        <figure><img src="{{ productImage($page->image) }}" alt="image" /></figure>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right wow animated fadeInRight" data-wow-delay="0.5s">
                                <h6 class="titleTop"> {{ $page->title }} </h6>
                                <h2 class="sectionTitle">{{ $page->excerpt }}</h2>
                                <p>{!! $page->body !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } } ?>
        <!-- About Section Ends -->

        <!-- Feature Section Begins 
        <section id="feature" class="feature pad-top-115 pad-bottom-115">
            <div class="container pr">
                <div class="secHead wow fadeInLeft animated" data-wow-delay="0.5s">
                    <div class="skewpink"></div>
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div class="titleText">
                                <h6 class="titleTop">FOUR STEPS TO REACH YOUR GOAL</h6>
                                <h2 class="sectionTitle pad-bottom-60"><span>Feature</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 wow fadeInUp animated" data-wow-delay="0.5s">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 feBox">
                            <i class="fIcons flaticon-fitness-bracelet"></i>
                            <h4> Duis aute irure dolor in </h4>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 feBox">
                            <i class="fIcons flaticon-bosu-ball"></i>
                            <h4> Duis aute irure dolor in </h4>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 feBox">
                            <i class="fIcons flaticon-waist"></i>
                            <h4> Duis aute irure dolor in </h4>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 feBox">
                            <i class="fIcons flaticon-trainer-rod"></i>
                            <h4> Duis aute irure dolor in </h4>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Feature Section Ends -->

        <!-- Class Section Begins -->
        <section id="services" class="class pad-top-115 pad-bottom-115">
            <div class="container pr">
                <div class="secHead wow fadeInLeft animated" data-wow-delay="0.5s">
                    <div class="skewpink"></div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="titleText">
                                <!--<h6 class="titleTop">FOUR STEPS TO REACH YOUR GOAL</h6> -->
                                <h2 class="sectionTitle">Services</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUp animated" data-wow-delay="0.5s">
                    <!--<div class="tabs-header">
                        <div id="filters" class="button-group isogrp" data-option-key="filter">
                            <button class="button is-checked" data-filter=".sun"><span>Sun</span></button>
                            <button class="button" data-filter=".mon"><span>Mon</span></button>
                            <button class="button" data-filter=".tue"><span>Tue</span></button>
                            <button class="button" data-filter=".wed"><span>Wed</span></button>
                            <button class="button" data-filter=".thu"><span>Thu</span></button>
                            <button class="button" data-filter=".fri"><span>Fri</span></button>
                            <button class="button" data-filter=".sat"><span>Sat</span></button>
                            <div class="border-move border"></div>
                        </div>
                    </div>-->
                    <div id="classbox" class="grid clickable clearfix">
                        <div class="elemnt celement col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <a href="https://www.dietitiansdiaries.com/page/online-consultations">
                                <div class="element">
                                <i class="fIcons flaticon-waist"></i>
                                <h4> Online Consultation </h4>
                            <!--    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod </p>
                                <div class="element-btn"><button type="button" class="element-fill-btn">Join this class</button></div> -->
                                </div>
                            </a>
                        </div>
                        <div class="elemnt celement col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <a href="https://www.dietitiansdiaries.com/page/Online-follow-up-consultation">
                                <div class="element">
                                <i class="fIcons flaticon-arm"></i>
                                <h4> Online follow up Consultation </h4>
                            <!--    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod </p>
                                <div class="element-btn"><button type="button" class="element-fill-btn">Join this class</button></div> -->
                                </div>
                            </a>
                        </div>
                        <div class="elemnt celement col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <a href="https://www.dietitiansdiaries.com/page/optifast-meal-replacements">
                                <div class="element">
                                <i class="fIcons flaticon-blender"></i>
                                    <h4> OPTIFAST® meal replacements </h4>
                        <!--        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod </p>
                                <div class="element-btn"><button type="button" class="element-fill-btn">Join this class</button></div> -->
                                </div>
                            </a>
                        </div>
                        <div class="elemnt celement col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <a href="https://www.dietitiansdiaries.com/page/body-composition">
                                <div class="element">
                                <i class="fIcons flaticon-scales"></i>
                                <h4> Body Composition assessment </h4>
                        <!--        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod </p>
                                <div class="element-btn"><button type="button" class="element-fill-btn">Join this class</button></div>-->
                                </div>
                            </a>
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- Class Section Ends -->

        <!-- Gallery Section Begins 
        <section id="gallery" class="gallery pad-top-115 pad-bottom-115 parallax">
            <div class="container pr">
                <div class="secHead wow fadeInLeft animated" data-wow-delay="0.5s">
                    <div class="skewpink"></div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="titleText">
                                <h6 class="titleTop">FOUR STEPS TO REACH YOUR GOAL</h6>
                                <h2 class="sectionTitle pad-bottom-60">Our <span>Gallery</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUp animated" data-wow-delay="0.5s">
                    <div class="gallery-isotope col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="gallery-filters" class="gallery-button-group isogrp" data-option-key="filter">
                            <button class="button is-checked" data-filter="*"><span>All</span></button>
                            <button class="button" data-filter=".fitness"><span>Fitness</span></button>
                            <button class="button" data-filter=".gymn"><span>Gym</span></button>
                            <button class="button" data-filter=".yoga"><span>Yoga</span></button>
                            <button class="button" data-filter=".running"><span>Running</span></button>
                            <button class="button" data-filter=".workout"><span>Workout</span></button>
                        </div>
                        <div id="gallery-box" class="gallery-grid clickable clearfix">
                            <div class="elemnt transition gymn yoga grid-item">
                                <div class="gImg">
                                    <div class="gImgpath">
                                        <img src="http://placehold.it/554x320" alt="images" />
                                    </div>
                                    <a class="grouped_gallery" href="http://placehold.it/554x320">
                                        <div class="circle-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="elemnt transition fitness yoga grid-item grid-item--width2">
                                <div class="gImg">
                                    <div class="gImgpath">
                                        <img src="http://placehold.it/938x320" alt="images" />
                                    </div>
                                    <a class="grouped_gallery" href="http://placehold.it/938x320">
                                        <div class="circle-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="elemnt transition fitness running grid-item">
                                <div class="gImg">
                                    <div class="gImgpath">
                                        <img src="http://placehold.it/554x320" alt="images" />
                                    </div>
                                    <a class="grouped_gallery" href="http://placehold.it/554x320">
                                        <div class="circle-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="elemnt transition workout gymn grid-item grid-item--width2">
                                <div class="gImg">
                                    <div class="gImgpath">
                                        <img src="http://placehold.it/938x320" alt="images" />
                                    </div>
                                    <a class="grouped_gallery" href="http://placehold.it/938x320">
                                        <div class="circle-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="elemnt transition running grid-item grid-item--width2">
                                <div class="gImg">
                                    <div class="gImgpath">
                                        <img src="http://placehold.it/938x320" alt="images" />
                                    </div>
                                    <a class="grouped_gallery" href="http://placehold.it/938x320">
                                        <div class="circle-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="elemnt transition fitness yoga grid-item">
                                <div class="gImg">
                                    <div class="gImgpath">
                                        <img src="http://placehold.it/554x320" alt="images" />
                                    </div>
                                    <a class="grouped_gallery" href="http://placehold.it/554x320">
                                        <div class="circle-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="elemnt transition fitness gymn grid-item grid-item--width2">
                                <div class="gImg">
                                    <div class="gImgpath">
                                        <img src="http://placehold.it/938x320" alt="images" />
                                    </div>
                                    <a class="grouped_gallery" href="http://placehold.it/938x320">
                                        <div class="circle-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="elemnt transition workout running grid-item">
                                <div class="gImg">
                                    <div class="gImgpath">
                                        <img src="http://placehold.it/554x320" alt="images" />
                                    </div>
                                    <a class="grouped_gallery" href="http://placehold.it/554x320">
                                        <div class="circle-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="elemnt transition workout grid-item">
                                <div class="gImg">
                                    <div class="gImgpath">
                                        <img src="http://placehold.it/554x320" alt="images" />
                                    </div>
                                    <a class="grouped_gallery" href="http://placehold.it/554x320">
                                        <div class="circle-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="elemnt transition workout yoga grid-item grid-item--width2">
                                <div class="gImg">
                                    <div class="gImgpath">
                                        <img src="http://placehold.it/938x320" alt="images" />
                                    </div>
                                    <a class="grouped_gallery" href="http://placehold.it/938x320">
                                        <div class="circle-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="elemnt transition fitness running grid-item">
                                <div class="gImg">
                                    <div class="gImgpath">
                                        <img src="http://placehold.it/554x320" alt="images" />
                                    </div>
                                    <a class="grouped_gallery" href="http://placehold.it/554x320">
                                        <div class="circle-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="elemnt transition grid-item grid-item--width2">
                                <div class="gImg">
                                    <div class="gImgpath">
                                        <img src="http://placehold.it/938x320" alt="images" />
                                    </div>
                                    <a class="grouped_gallery" href="http://placehold.it/938x320">
                                        <div class="circle-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Gallery Section Ends -->

        <!-- Products Section Begins
        <section id="products" class="products pad-top-115 pad-bottom-115">
            <div class="container pr">
                <div class="secHead wow fadeInLeft animated" data-wow-delay="0.5s">
                    <div class="skewpink"></div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="titleText">
                                <h6 class="titleTop">FOUR STEPS TO REACH YOUR GOAL</h6>
                                <h2 class="sectionTitle">Services</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row wow animated fadeInUp" data-wow-delay="0.5s">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="procap"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea ommodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                    </div>
                    <div id="owl-deal">
                        <div class="item">
                            <div class="element">
                                <div class="blckbox">
                                    <h6> Sale <span>20%</span> </h6>
                                </div>
                                <img src="http://placehold.it/508x424" alt="images" />
                                <h4> Cellucor C4, 30 Servings </h4>
                                <p> Advanced Pre-Workout for Increased Energy and Focus </p>
                                <div class="priceBox">
                                    <h4> <del>$74.99</del> </h4>
                                    <h4> $60.00 </h4>
                                </div>
                                <ul class="stars">
                                    <li>
                                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-star-o" aria-hidden="true"></i> </a>
                                    </li>
                                </ul>
                                <div class="buy-buttons">
                                    <button type="button" class="fill-btn">Buy Now</button>
                                    <button type="button" class="fill-btn circled"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                    <button type="button" class="fill-btn circled"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="element">
                                <div class="blckbox">
                                    <h6> Sale <span>20%</span> </h6>
                                </div>
                                <img src="http://placehold.it/508x424" alt="images" />
                                <h4> Mutant Muscle Mass </h4>
                                <p> Advanced Pre-Workout for Increased Energy and Focus </p>
                                <div class="priceBox">
                                    <h4> <del>$90.45</del> </h4>
                                    <h4> $67.34 </h4>
                                </div>
                                <ul class="stars">
                                    <li>
                                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-star-o" aria-hidden="true"></i> </a>
                                    </li>
                                </ul>
                                <div class="buy-buttons">
                                    <button type="button" class="fill-btn">Buy Now</button>
                                    <button type="button" class="fill-btn circled"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                    <button type="button" class="fill-btn circled"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="element">
                                <img src="http://placehold.it/508x424" alt="images" />
                                <h4> BPI Sports Best BCAA </h4>
                                <p> Advanced Pre-Workout for Increased Energy and Focus </p>
                                <div class="priceBox">
                                    <h4> $73.53 </h4>
                                </div>
                                <ul class="stars">
                                    <li>
                                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-star" aria-hidden="true"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-star-o" aria-hidden="true"></i> </a>
                                    </li>
                                </ul>
                                <div class="buy-buttons">
                                    <button type="button" class="fill-btn">Buy Now</button>
                                    <button type="button" class="fill-btn circled"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                    <button type="button" class="fill-btn circled"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Products Section Ends -->

        <!-- Call To Action Section Begins 
        <section id="call-to-action" class="call-to-action pad-top-115 pad-bottom-115">
            <div class="actionBg parallax"></div>
            <div class="container pr">
                <div class="secHead wow fadeInLeft animated" data-wow-delay="0.5s">
                    <div class="skewpink"></div>
                    <div class="row">
                        <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                            <div class="titleText">
                                <h6 class="titleTop">hurry up</h6>
                                <h2 class="sectionTitle">20% <span>Discount on online consultations </span></h2>
                                <h6 class="titleTop">was R400, now only R320</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <p class="procap"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi t aliquip ex ea commodo consequat. </p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow animated fadeInUp" data-wow-delay="0.5s">
                        <button type="button" class="fill-btn">Start Today</button>
                    </div>
                </div> 
            </div>
        </section>-->
        <!-- Call To Action Section Ends -->

        <!-- Plans Section Begins -->
        <section id="plans" class="plans pad-top-115 pad-bottom-120">
            <div class="container pr">
                <div class="secHead wow fadeInLeft animated" data-wow-delay="0.5s">
                    <div class="skewpink"></div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="titleText">
                                <h6 class="titleTop">READY TO GO?</h6>
                                <h2 class="sectionTitle">CHOOSE  <span>YOUR PLAN</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="pricing-tables pad-top-55">
                        <?php
                        foreach($products as $product){ ?>
                        <a href="{{ route('shop.show', $product->slug) }}">
                        
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding pricebox">
                            
                            <div class="element">
                                <div class="plan-top">
                                    <!--<div class="skewpink"></div>-->
                                    <h5> {{ $product->name }} </h5>
                                </div>
                                <div class="product-section-image">
                                    <img src="{{ productImage($product->image) }}" alt="product" style="margin-top: 60px;" class="active" id="currentImage">
                                </div>
                                <div class="plan-side">
                                    <div class="skewback">
                                        <h2> {{ $product->presentPrice() }} </h2>
                                        
                                    </div>
                                </div> 
                                
                                <!--<button type="button" class="fill-btn">explore more</button>
                                <div class="buy-buttons">
                                    <button type="button" class="fill-btn">Buy Now</button>
                                    <button type="button" class="fill-btn circled"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                    <button type="button" class="fill-btn circled"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                </div>-->
                            </div>
                        </div>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="news-fill-btn">
                            <a href="{{ route('shop.index') }}" class="fill-btn">View more Meal Plans</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Plans Section Ends -->

        <!-- testimonial Section Begins -->
        <section id="testimonial" class="testimonial pad-top-115 pad-bottom-120">
            <div class="testimonialBg parallax"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wow animated fadeInUp" data-wow-delay="0.5s">
                        <div class="titleText">
                            <h6 class="titleTop">Our Clients</h6>
                            <h2 class="sectionTitle pad-bottom-60">SUCCESS <span>STORIES</span></h2>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                            
                            <div class="clientSlide">
                                <div id="owl-testimonial" class="testimonial-slider">
                                    <?php
                            foreach($success as $story){
                            ?>
        
                                    <div class="item">
                                        <img src="{{ productImage($story->image) }}" alt="images" />
                                        <div class="spacer left">
                                            <div class="mask"></div>
                                        </div>
                                     <!--   <p> {{-- $story->body --}}</p> -->
                                        <h4> {!! $story->body !!} </h4>
                                        <h5> {{ $story->excerpt }} </h5>
                                    </div>
                            <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial Section Ends -->

        <!-- news Section Begins -->
        <section id="news" class="news products pad-top-115 pad-bottom-110">
            <div class="container pr">
                <div class="secHead wow fadeInLeft animated" data-wow-delay="0.5s">
                    <div class="skewpink"></div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="titleText">
                                <h6 class="titleTop">READY TO GO?</h6>
                                <h2 class="sectionTitle">Learn </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                foreach($pages as $page){
                if($page->slug == 'learn'){ ?>
                <div class="row wow animated fadeInUp" data-wow-delay="0.5s">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="procap"> {{ $page->excerpt }} </p>
                    </div>
                <?php
                }
                } ?>
                <div id="owl-news">
                <?php    
                foreach($learn as $learn_post){
                    //
                    $pieces = explode(",", $learn_post->meta_keywords);
                    $url = 'https://www.dietitiansdiaries.com/view_post/'.$learn_post->slug;
                
                    
                ?>
                        <div class="item">
                            <figure> <img src="{{ productImage($learn_post->image) }}" alt="images" /> </figure>
                            <h4> <a href="{{ $url }}"> {{ $learn_post->title }} </a> </h4>
                            <ul>
                                <?php
                                foreach($pieces as $piece){ 
                                    
                               ?>
                                <li> <a href="{{ $url }}"> <?php echo "#".$piece;?> </a> </li>
                            <!--<div class="news-comments">
                                <a href="#"> <i class="fa fa-comment" aria-hidden="true"></i> 27 </a>
                                <a href="#"> <i class="fa fa-eye" aria-hidden="true"></i> 343 </a>
                            </div>-->
                            <?php } ?>
                           </ul> 
                        </div>
                        
                    
                <?php } ?>
                        </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="news-fill-btn">
                            <a href="https://www.dietitiansdiaries.com/view_news" class="fill-btn">View more articles</a>
                        </div>
                    </div>
                                
                </div>
                
            </div>
        </section>
        <!-- news Section Ends -->

@endsection

        
 