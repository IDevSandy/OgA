<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OgA Feed</title>
</head>
<?php include('header.php');?>
<?php 
	$where= array(
                "id" => $_REQUEST['id']
                );

	$c=$obj->select_record('blogs',$where);
  
			
		?>
<body>
<div class="se-pre-con"></div>
<div class="container">
        <div class="row">
            <div class="col-sm-8">
                <article class="content">
                    <div class="post-thumb">
                        <img src=<?php echo $c['file_url']?> class="img-responsive post-image" alt="">
                        <div class="social">
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa  fa-facebook"></i><span>3987</span> </a></li>
                                <li><a href="#" class="twitter"><i class="fa  fa-twitter"></i><span>3987</span></a></li>
                                <li><a href="#" class="google"><i class="fa  fa-google-plus"></i><span>3987</span></a></li>
                                <li><a href="#" class="flickr"><i class="fa fa-flickr"></i><span>3987</span> </a></li>
                            </ul>
                        </div>
                        <!-- /.social icon -->
                    </div>
                    <h1><?php echo $c['title']?></h1>
                    <!-- <div class="date">
                        <ul>
                            <li>By<a title="" href="#"><span><?php echo $c['author']?></span></a> --</li>
                            <li><a title="" href="#">11 Nov 2015</a> --</li>
                            
                        </ul>
                    </div> -->
                    <p><?php echo $c['content']?></p>
                    <!-- <p> Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem .</p>
                    <p>Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, or avoids pleasure itself, because it is pleasure, but because those</p>
                    quoto -->
                    <!-- <div class="qtrotator">
                        <div class="qtcontent">
                            <blockquote>
                                here are many variations of passages of Lorem Ipsum available, but the majority <a href="#">have suffered alteration</a> in some form
                            </blockquote>
                        </div>
                    </div>
                    <p>which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure</p>
                    <figure class="imgright">
                        <img class="img-responsive" src="images/details-02.jpg" alt="">
                    </figure>
                    <p>There was that beautiful <i>Italian Vogue</i> story and the girls that were in that ended up doing really well the classic lace-up shoe is a true.</p>
                    <p>pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever un dertakes laborious physical exercise advan tage from it? </p>
                    <p>They cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing.</p>
                    <p>prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated. </p>
                    <h3>TWO COLUMNS TEXT</h3>
                    <p>Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, or avoids pleasure itself, because it is pleasure, but because those</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years. </p>
                        </div>
                        <div class="col-sm-6">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years.</p>
                        </div>
                    </div>
                    <p>Denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the mas ter-builder of human happiness. No one rejects, or avoids pleasure itself, because it is plea sure, but because those </p>
                    <h3>UNORDERED LIST</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                    <ul class="unorder-list">
                        <li><i class="fa fa-check" aria-hidden="true"></i>There are many variations of passages of Lorem Ipsum available, but the majority </li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>It is a long established fact that a reader will be distracted by the readable </li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary,</li>
                    </ul> -->
                    <!-- tags -->
                    <!-- <div class="tags">
                        <ul>
                            <li> <a href="#">Education</a></li>
                            <li> <a href="#">Health &amp; Fitness</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Collage</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Music</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Lifestyle</a></li>
                        </ul>
                    </div> -->
                    <!-- Related news area
                        ============================================ -->
                    <!-- <div class="related-news-inner">
                        <h3 class="category-headding ">RELATED NEWS</h3>
                        <div class="headding-border"></div>
                        <div class="row">
                            <div id="content-slide-5" class="owl-carousel"> -->
                                <!-- item-1 -->
                                <!-- <div class="item">
                                    <div class="row rn_block">
                                        <div class="col-xs-12 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s"> -->
                                                <!-- image -->
                                                <!-- <div class="post-thumb">
                                                    <a href="#">
                                                        <img class="img-responsive" src="images/articale.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="#" class="post-badge btn_five">B</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <h4><a href="#">World Econmy Changing and Affecting in 3rd ...</a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                                    </div>
                                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s"> -->
                                                <!-- image -->
                                                <!-- <div class="post-thumb">
                                                    <a href="#">
                                                        <img class="img-responsive" src="images/articale02.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="#" class="post-badge btn_three">S</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <h4><a href="#">World Econmy Changing and Affecting in 3rd ...</a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                                    </div>
                                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s"> -->
                                                <!-- image -->
                                                <!-- <div class="post-thumb">
                                                    <a href="#">
                                                        <img class="img-responsive" src="images/articale03.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="#" class="post-badge btn_one">F</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <h4><a href="#">World Econmy Changing and Affecting in 3rd ...</a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                                    </div>
                                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- item-2 -->
                                <!-- <div class="item">
                                    <div class="row rn_block">
                                        <div class="col-xs-12 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s"> -->
                                                <!-- image -->
                                                <!-- <div class="post-thumb">
                                                    <a href="#">
                                                        <img class="img-responsive" src="images/articale04.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="#" class="post-badge btn_eight">H</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <h4><a href="#">World Econmy Changing and Affecting in 3rd ...</a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                                    </div>
                                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s" data-wow-delay="0.8s"> -->
                                                <!-- image -->
                                                <!-- <div class="post-thumb">
                                                    <a href="#">
                                                        <img class="img-responsive" src="images/articale05.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="#" class="post-badge btn_four">L</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <h4><a href="#">World Econmy Changing and Affecting in 3rd ...</a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                                    </div>
                                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-md-4 col-sm-4 padd">
                                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s" data-wow-delay="1s"> -->
                                                <!-- image -->
                                                <!-- <div class="post-thumb">
                                                    <a href="#">
                                                        <img class="img-responsive" src="images/articale06.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-info meta-info-rn">
                                                    <div class="slide">
                                                        <a target="_blank" href="#" class="post-badge btn_two">T</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-title-author-details">
                                                <h4><a href="#">World Econmy Changing and Affecting in 3rd ...</a></h4>
                                                <div class="post-editor-date">
                                                    <div class="post-date">
                                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                                    </div>
                                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                  
                    
                    
                   
                    
                </article>
            </div>
        

            
            <div class="col-sm-4 left-padding">
                <aside class="sidebar">
                    <!-- <div class="input-group search-area">
                         search area 
                        <input type="text" class="form-control" placeholder="Search articles here ..." name="q">
                        <div class="input-group-btn">
                            <button class="btn btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div> -->
                    <!-- /.search area -->
                    <div class="banner-add">
                        <!-- add -->
                        <span class="add-title">- Empowered Girl Empowered Nation -</span>
                        <a href="#"><img src="images/banner2.jpg" class="img-responsive center-block" alt=""></a>
                    </div>
                    <div class="tab-inner">
                        <ul class="tabs">
                            <li><a href="#">POPULAR</a></li>
                            <li><a href="#">MOST VIEWED</a></li>
                        </ul>
                        <hr>
                        <!-- tabs -->
                        <div class="tab_content">
                            <div class="tab-item-inner">
                                <div class="box-item wow fadeIn" data-wow-duration="1s">
                                    <div class="img-thumb">
                                        <a href="#" rel="bookmark"><img class="entry-thumb" src="images/popular_news_01.jpg" alt="" height="80" width="90"></a>
                                    </div>
                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-1">
                                                <a href="#">SPORTS</a>
                                            </h6>
                                        <h3 class="td-module-title"><a href="#">It is a long established fact that a reader will</a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i> Oct 6, 2016
                                            </div>
                                            <!-- post comment -->
                                            <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                                    <div class="img-thumb">
                                        <a href="#" rel="bookmark"><img class="entry-thumb" src="images/popular_news_02.jpg" alt="" height="80" width="90"></a>
                                    </div>
                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-2">
                                                <a href="#">TECHNOLOGY </a>
                                            </h6>
                                        <h3 class="td-module-title"><a href="#">The generated Lorem Ipsum is therefore</a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i> Oct 6, 2016
                                            </div>
                                            <!-- post comment -->
                                            <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <div class="img-thumb">
                                        <a href="#" rel="bookmark"><img class="entry-thumb" src="images/popular_news_03.jpg" alt="" height="80" width="90"></a>
                                    </div>
                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-3">
                                                <a href="#">HEALTH</a>
                                            </h6>
                                        <h3 class="td-module-title"><a href="#">The standard chunk of Lorem Ipsum used since</a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i> Oct 6, 2016
                                            </div>
                                            <!-- post comment -->
                                            <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                                    <div class="img-thumb">
                                        <a href="#" rel="bookmark"><img class="entry-thumb" src="images/popular_news_04.jpg" alt="" height="80" width="90"></a>
                                    </div>
                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-4">
                                                <a href="#">FASHION</a>
                                            </h6>
                                        <h3 class="td-module-title"><a href="#">Lorem Ipum therefore always free from</a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i> Oct 6, 2016
                                            </div>
                                            <!-- post comment -->
                                            <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- / tab item -->
                            <div class="tab-item-inner">
                                <div class="box-item">
                                    <div class="img-thumb">
                                        <a href="#" rel="bookmark"><img class="entry-thumb" src="images/popular_news_01.jpg" alt="" height="80" width="90"></a>
                                    </div>
                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-5">
                                                <a href="#">BUSINESS</a>
                                            </h6>
                                        <h3 class="td-module-title"><a href="#">It is a long established fact that a reader will</a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i> Oct 6, 2016
                                            </div>
                                            <!-- post comment -->
                                            <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="img-thumb">
                                        <a href="#" rel="bookmark"><img class="entry-thumb" src="images/popular_news_02.jpg" alt="" height="80" width="90"></a>
                                    </div>
                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-2">
                                                <a href="#">TECHNOLOGY </a>
                                            </h6>
                                        <h3 class="td-module-title"><a href="#">The generated Lorem Ipsum is therefore</a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i> Oct 6, 2016
                                            </div>
                                            <!-- post comment -->
                                            <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="img-thumb">
                                        <a href="#" rel="bookmark"><img class="entry-thumb" src="images/popular_news_03.jpg" alt="" height="80" width="90"></a>
                                    </div>
                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-3">
                                                <a href="#">HEALTH</a>
                                            </h6>
                                        <h3 class="td-module-title"><a href="#">The standard chunk of Lorem Ipsum used since</a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i> Oct 6, 2016
                                            </div>
                                            <!-- post comment -->
                                            <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="img-thumb">
                                        <a href="#" rel="bookmark"><img class="entry-thumb" src="images/popular_news_04.jpg" alt="" height="80" width="90"></a>
                                    </div>
                                    <div class="item-details">
                                        <h6 class="sub-category-title bg-color-4">
                                                <a href="#">FASHION</a>
                                            </h6>
                                        <h3 class="td-module-title"><a href="#">Lorem Ipum therefore always free from</a></h3>
                                        <div class="post-editor-date">
                                            <!-- post date -->
                                            <div class="post-date">
                                                <i class="pe-7s-clock"></i> Oct 6, 2016
                                            </div>
                                            <!-- post comment -->
                                            <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- / tab item -->
                        </div>
                        <!-- / tab_content -->
                    </div>
                    <!-- / tab -->
                    
                    <!-- slider widget -->
                    <div class="widget-slider-inner">
                        <h3 class="category-headding ">Slider Widget</h3>
                        <div class="headding-border"></div>
                        <div id="widget-slider" class="owl-carousel owl-theme">
                            <!-- widget item -->
                            <div class="item">
                                <a href="#"><img src="images/slider-widget-1.jpg" alt=""></a>
                                <h4><a href="#">For good results must be make good plan</a></h4>
                                <div class="date">
                                    <ul>
                                        <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                        <li><a title="" href="#">11 Nov 2015</a></li>
                                    </ul>
                                </div>
                                <p>Dhaka: Dhaka Metropolitan Sessions a Judge Court on Wednesday issued warrants for the arrest of 29 BNP leaders, including some ina senior leaders...</p>
                            </div>
                            <!-- widget item -->
                            <div class="item">
                                <a href="#"><img src="images/slider-widget-2.jpg" alt=""></a>
                                <h4><a href="#">Dog invason sparks chaos at IPL match</a></h4>
                                <div class="date">
                                    <ul>
                                        <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                        <li><a title="" href="#">11 Nov 2015</a></li>
                                    </ul>
                                </div>
                                <p>Dhaka: Dhaka Metropolitan Sessions a Judge Court on Wednesday issued warrants for the arrest of 29 BNP leaders, including some ina senior leaders ...</p>
                            </div>
                            <!-- widget item -->
                            <div class="item">
                                <a href="#"><img src="images/slider-widget-3.jpg" alt=""></a>
                                <h4><a href="#">For good results must be make good plan</a></h4>
                                <div class="date">
                                    <ul>
                                        <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                        <li><a title="" href="#">11 Nov 2015</a></li>
                                    </ul>
                                </div>
                                <p>Dhaka: Dhaka Metropolitan Sessions a Judge Court on Wednesday issued warrants for the arrest of 29 BNP leaders, including some ina senior leaders ...</p>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</body>
<?php include('footer.php');?>
</html>