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