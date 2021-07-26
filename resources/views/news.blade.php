@extends('layout2')


@section('content')

        <!-- Banner Section Begins -->
        <section class="inner-banner">
            <div class="container pr">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="bannerText wow animated fadeInUp" data-wow-delay="0.5s">
                            <h1> Learn </h1>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Section Ends -->

    </div>

    <div class="main">

        <!-- hot-news Section Begins -->
        <section id="hot-news" class="hot-news pad-top-115">
            <div class="container pr">
                <div class="secHead wow fadeInLeft animated" data-wow-delay="0.5s">
                    <div class="skewpink"></div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="titleText">
                                <h6 class="titleTop">READY TO GO?</h6>
                                <h2 class="sectionTitle">Hot! <span>News</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row news wow animated fadeInUp pad-bottom-110" data-wow-delay="0.5s">
                    <?php
                    $x = 0;
                    foreach($posts as $post){ 
                        
                        $x++;
                        if($x > 3){
                            continue;
                        }
                        $url = 'https://www.dietitiansdiaries.com/view_post/'.$post->slug;
                        $pieces = explode(",", $post->meta_keywords);
                    
                    
                    ?> 
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="item">
                            <figure>
                                <img src="{{ productImage($post->image) }}" alt="images">
                            </figure>
                            <h4> <a href="{{ $url }}"> {{ $post->title }} </a> </h4>
                            <ul>
                                <?php
                                foreach($pieces as $piece){ 
                                    
                               ?>
                                <li> <a href="{{ $url }}"> <?php echo "#".$piece;?> </a> </li>
                                
                            </ul>
                                <?php } ?>
                            <p> {{ $post->excerpt }} </p>
                            <!--
                            <div class="news-comments">
                                <a href="#"> <i class="fa fa-heart" aria-hidden="true"></i> 325 </a>
                                <a href="#"> <i class="fa fa-comment" aria-hidden="true"></i> 27 </a>
                                <a href="#"> <i class="fa fa-eye" aria-hidden="true"></i> 343 </a>
                            </div> -->
                        </div>
                    </div>
                    <?php } ?> 
                    
                </div>
            </div>
        </section>
        <!-- hot-news Section Ends -->

        <!-- hot-news Section Begins -->
        <section id="news-list" class="news-list pad-top-120 pad-bottom-120">
            <div class="container pr">
                <div class="row news">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 news-list-left">
                        <?php
                    foreach($posts as $post){ 
                        $url = 'https://www.dietitiansdiaries.com/view_post/'.$post->slug;
                        $pieces = explode(",", $post->meta_keywords);
                    
                    
                    ?> 
                        <div class="n-listing wow animated fadeInUp" data-wow-delay="0.5s">
                            <div class="nlist-top video-iframe">
                                <figure>
                                    <img src="{{ productImage($post->image) }}" alt="images" />
                                </figure>
                            </div>
                            <div class="nlist-info">
                                <h4 class="nlist-title"> <a href="{{ $url }}">{{ $post->title }}</a> </h4>
                                <p> {!! $post->body !!} </p>
                                <!--<div class="nlist-bottom">
                                    <div class="news-comments">
                                        <a href="#"> <i class="fa fa-heart" aria-hidden="true"></i> 325 </a>
                                        <a href="#"> <i class="fa fa-comment" aria-hidden="true"></i> 27 </a>
                                        <a href="#"> <i class="fa fa-eye" aria-hidden="true"></i> 343 </a>
                                    </div>
                                    <div class="social">
                                        <ul>
                                            <li>
                                                <a href="'#" target="_blank"> <i class="fa fa-facebook" aria-hidden="true"></i> </a>
                                            </li>
                                            <li>
                                                <a href="'#" target="_blank"> <i class="fa fa-twitter" aria-hidden="true"></i> </a>
                                            </li>
                                            <li>
                                                <a href="'#" target="_blank"> <i class="fa fa-pinterest" aria-hidden="true"></i> </a>
                                            </li>
                                            <li>
                                                <a href="'#" target="_blank"> <i class="fa fa-google-plus" aria-hidden="true"></i> </a>
                                            </li>
                                            <li>
                                                <a href="'#" target="_blank"> <i class="fa fa-linkedin" aria-hidden="true"></i> </a>
                                            </li>
                                            <li>
                                                <a href="'#" target="_blank"> <i class="fa fa-youtube-play" aria-hidden="true"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    <?php } ?>    
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sidebar">
                        <!--<div class="widget widget_search wow animated fadeInUp" data-wow-delay="0.5s">
                            <h5 class="widget-title">FIND MORE NEWS & OFFERS</h5>
                            <form>
                                <input type="text" placeholder="Enter Your Search Keyword">
                                <button type="button" class="search-submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget widget_calculator wow animated fadeInUp" data-wow-delay="0.5s">
                            <h5 class="widget-title">CALCULATE YOUR BODY MASS INDEX</h5>
                            <form>
                                <div class="calc_gender">
                                    <label>Gender</label>
                                    <span><input id="gender1" name="gender" type="radio" class="with-font" value="male" /><label for="gender1"></label></span>
                                    <span><input id="gender2" name="gender" type="radio" class="with-font" value="female"><label for="gender2"></label></span>
                                </div>
                                <div class="calculate">
                                    <div class="w-cal">
                                        <label> WEIGHT </label>
                                        <input type="text" placeholder="73" />
                                    </div>
                                    <div class="w-cal">
                                        <label> HEIGHT </label>
                                        <select>
                                            <option>cm</option>
                                            <option>cm</option>
                                            <option>cm</option>
                                            <option>cm</option>
                                        </select>
                                    </div>
                                    <div class="w-cal">
                                        <label> YOUR AGE </label>
                                        <input type="text" placeholder="21" />
                                    </div>
                                    <div class="calc-result">
                                        <label>35.2</label>
                                        <span>Obese Class II</span>
                                    </div>
                                    <button type="button" class="fill-btn">Calculate</button>
                                </div>
                            </form>
                        </div>-->
                        <div class="widget widget_recent_entries wow animated fadeInUp" data-wow-delay="0.5s">
                            <h5 class="widget-title">Recent Posts</h5>
                            <ul>
                                <?php
                                $x = 0;
                                foreach($posts as $post){ 

                                    $x++;
                                    if($x > 3){
                                        continue;
                                    }
                                    $url = 'https://www.dietitiansdiaries.com/view_post/'.$post->slug;
                                    $pieces = explode(",", $post->meta_keywords);


                                ?> 
                                <li>
                                    <img src="{{ productImage($post->image) }}" alt="img">
                                    <div class="bpost">
                                        <h5> <a href="{{ $url }}"> {{ $post->excerpt }} </a> </h5>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="widget widget_tag_cloud wow animated fadeInUp" data-wow-delay="0.5s">
                            <h5 class="widget-title">FEATURED Tags</h5>
                            <div class="tagcloud">
                                <?php
                                $x = 0;
                                foreach($posts as $post){ 
                        
                                    $x++;
                                    if($x > 3){
                                        continue;
                                    }
                                    $url = 'https://www.dietitiansdiaries.com/view_post/'.$post->slug;
                                    $pieces = explode(",", $post->meta_keywords);
                    
                                    foreach($pieces as $piece){ ?>
                                        <a href="{{ $url }}" class="tag-link">{{ $piece }}</a>
                                    <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hot-news Section Ends -->
@endsection