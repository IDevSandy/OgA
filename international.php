<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>International</title>
</head>
<?php include('header.php');?>

<body>
<?php 
	$where= array(
                "status" => 1
                );

	$c=$obj->select_record('blog_categories',$where);
  
			
		?>
<div class="se-pre-con"></div>
<div class="se-pre-con"></div>

<section class="headding-news">

        <div class="container">
            <div class="row row-margin">
            
            
                <div class="col-sm-6 col-padding">
                
                    <div class="post-wrapper post-grid-6 wow fadeIn" data-wow-duration="2s">
                        <div class="post-thumb img-zoom-in">
                            <a href=ogafeed.php?id=5>
                                <img class="entry-thumb-top" src="images/slider/slide-11.jpg" alt="">
                            </a>
                        </div>
                        <div class="post-info">
                            <span class="color-3">SPORTS </span>
                            <h3 class="post-title post-title-size"><a href=ogafeed.php?id=5 rel="bookmark"> Latest International Sports News . </a></h3>
                            <div class="post-editor-date">
  
                                <a class="readmore pull-right" href=ogafeed.php?id=5><i class="pe-7s-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                   
                </div>
                
                <div class="col-sm-6 col-padding">
                    <div class="post-wrapper post-grid-7 wow fadeIn" data-wow-duration="2s">
                        <div class="post-thumb img-zoom-in">
                            <a href=ogafeed.php?id=6>
                                <img class="entry-thumb-top" src="images/slider/slide-12.jpg" alt="">
                            </a>
                        </div>
                        <div class="post-info">
                            <span class="color-5">BUSINESS</span>
                            <h3 class="post-title post-title-size"><a href=ogafeed.php?id=6 rel="bookmark">Latest International Business News </a></h3>
                            <div class="post-editor-date">

                                <a class="readmore pull-right" href=ogafeed.php?id=6><i class="pe-7s-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-margin">
                <div id="content-slide-4" class="owl-carousel">
                    <div class="item">
                        <div class="post-wrapper post-grid-8 wow fadeIn" data-wow-duration="2s">
                            <div class="post-thumb img-zoom-in">
                                <a href=ogafeed.php?id=7>
                                    <img class="entry-thumb-bottom" src="images/slider/Fashion (1).jpg" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <span class="color-4">FASHION</span>
                                <h3 class="post-title post-title-size"><a href=ogafeed.php?id=7 rel="bookmark">Latest International Fashion News </a></h3>
                                <div class="post-editor-date">
                                    
                                    <a class="readmore pull-right" href=ogafeed.php?id=7><i class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="post-wrapper post-grid-9 wow fadeIn" data-wow-duration="2s">
                            <div class="post-thumb img-zoom-in">
                                <a href=ogafeed.php?id=8>
                                    <img class="entry-thumb-bottom" src="images/slider/slide-14.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <span class="color-2">TECHNOLOGY</span>
                                <h3 class="post-title post-title-size"><a href=ogafeed.php?id=8 rel="bookmark">Latest International Technology News </a></h3>
                                <div class="post-editor-date">
                                    
                                    <!-- read more -->
                                    <a class="readmore pull-right" href=ogafeed.php?id=8><i class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="post-wrapper post-grid-10 wow fadeIn" data-wow-duration="2s">
                            <div class="post-thumb img-zoom-in">
                                <a href=ogafeed.php?id=9>
                                    <img class="entry-thumb-bottom" src="images/slider/health (3).jpg" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <span class="color-1">HEALTH</span>
                                <h3 class="post-title post-title-size"><a href=ogafeed.php?id=9 rel="bookmark">Latest International Health News</a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    
                                    <a class="readmore pull-right" href=ogafeed.php?id=9><i class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="post-wrapper post-grid-10 wow fadeIn" data-wow-duration="2s">
                            <div class="post-thumb img-zoom-in">
                                <a href=ogafeed.php?id=10>
                                    <img class="entry-thumb-bottom" src="images/slider/politics.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <span class="color-f">POLITICS</span>
                                <h3 class="post-title post-title-size"><a href=ogafeed.php?id=10 rel="bookmark">Latest International Politics News</a></h3>
                                <div class="post-editor-date">
                                    
                                    <!-- read more -->
                                    <a class="readmore pull-right" href=ogafeed.php?id=10><i class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="post-wrapper post-grid-10 wow fadeIn" data-wow-duration="2s">
                            <div class="post-thumb img-zoom-in">
                                <a href=ogafeed.php?id=11>
                                    <img class="entry-thumb-bottom" src="images/slider/Education.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <span class="color-l">EDUCATION</span>
                                <h3 class="post-title post-title-size"><a href=ogafeed.php?id=11 rel="bookmark">Latest International Education News</a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                    </div>
                                    <!-- post comment -->
                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                    <!-- read more -->
                                    <a class="readmore pull-right" href=ogafeed.php?id=11><i class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
   
   
</body>
<?php include('footer.php');?>
</html>