<!DOCTYPE html>
<html lang="en">

<?php include('header.php');?>
<body>
  <?php 
	$where= array(
                "status" => 1
                );

	$c=$obj->select_record('gallery',$where);
    $s=$obj->select_record('slider',$where);
			
		?> 
        
            
<section class="news-feed">
        <div class="container">
            <div class="row row-margin">
                <div class="col-sm-3 hidden-xs col-padding">
                    <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                        <div class="post-thumb img-zoom-in">
                            <a href="#">
                                <img class="entry-thumb" src="images/slider/latest news.jpg"  alt="">
                            </a>
                        </div>
                        <div class="post-info">
                            <span class="color-1">LATEST NEWS</span>
                            <h3 class="post-title post-title-size"><a href="#" rel="bookmark">The unsanitary truth about period poverty and what governments can do</a></h3>
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> 09 Jun 2022
                                </div>
                                <!-- post comment -->
                                <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                <!-- read more -->
                                <a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-sm-6 col-padding">
                    <div id="news-feed-carousel" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                                <div class="post-thumb img-zoom-in">
                                    <a href=govermentschemes.php>
                                        <img class="entry-thumb" src="images/slider/BBBP_PIC (2).jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <span class="color-2">GOVERMENT SCHEMES</span>
                                    <h3 class="post-title"><a href=govermentschemes.php rel="bookmark">BETI BACHAO BETI PADHAO </a></h3>
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> APril 29, 2022
                                        </div>
                                        <!-- post comment -->
                                        <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                        <!-- read more -->
                                        <a class="readmore pull-right" href=govermentschemes.php><i class="pe-7s-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                                <div class="post-thumb img-zoom-in">
                                    <a href=govermentschemes.php>
                                        <img class="entry-thumb" src="images/slider/One-Stop-Centre-Scheme (1).jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <span class="color-3">GOVERMENT SCHEMES </span>
                                    <h3 class="post-title"><a href=govermentschemes.php rel="bookmark">One Stop Centre Scheme</a></h3>
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> April 29, 2022
                                        </div>
                                        <!-- post comment -->
                                        <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                        <!-- read more -->
                                        <a class="readmore pull-right" href=govermentschemes.php><i class="pe-7s-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                                <div class="post-thumb img-zoom-in">
                                    <a href="#">
                                        <img class="entry-thumb" src="images/slider/WWh (2).jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <span class="color-4">GOVERMENT SCHEMES </span>
                                    <h3 class="post-title"><a href=govermentschemes.php rel="bookmark">Women Helpline Scheme</a></h3>
                                    <div class="post-editor-date">
                                        <!-- post date -->
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> April 29, 2022
                                        </div>
                                        <!-- post comment -->
                                        <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                        <!-- read more -->
                                        <a class="readmore pull-right" href=govermentschemes.php><i class="pe-7s-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 hidden-xs col-padding">
                    <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                        <div class="post-thumb img-zoom-in">
                            <a href="#">
                                <img class="entry-thumb" src="images/slider/children.jpg" alt="">
                            </a>
                        </div>
                        <div class="post-info">
                            <span class="color-5">LATEST NEWS </span>
                            <h3 class="post-title post-title-size"><a href="#" rel="bookmark">Educate Women, Girls To Control Population, Fertility Rate": Nitish Kumar</a></h3>
                            <div class="post-editor-date">
                                <!-- post date -->
                                <div class="post-date">
                                    <i class="pe-7s-clock"></i> April 22, 2022
                                </div>
                                <!-- post comment -->
                                <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                <!-- read more -->
                                <a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <!-- left content inner -->
                <section class="recent_news_inner">
                    <h3 class="category-headding ">RECENT NEWS</h3>
                    <div class="headding-border"></div>
                    <div class="row">
                        <div id="content-slide" class="owl-carousel">
                            <!-- item-1 -->
                            <div class="item">
                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                    <!-- image -->
                                    <h3><a href="#">The ratio of men to women in engineering is 5:1.</a></h3>
                                    <div class="post-thumb">
                                        <a href="#">
                                            <img class="img-responsive" src="images/tec recent.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-info meta-info-rn">
                                        <div class="slide">
                                            <a target="_blank" href="#" class="post-badge btn_six">T</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-title-author-details">
                                    <div class="post-editor-date">
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> jun 9, 20
                                        </div>
                                        <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                    </div>
                                    <p>The ratio of men to women in engineering is 5:1. (Source: TechRadius) According to women in tech statistics for 2020, men outnumber women in the Engineering industry. A whopping 80% of those in the field are male, while only 20% are female.<a href="#">Read more...</a></p>
                                </div>
                            </div>
                            <!-- item-2 -->
                            <div class="item">
                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <!-- image -->
                                    <h3><a href="#">Girls' education is a climate solution': Malala Yousafzai joins climate protest</a></h3>
                                    <div class="post-thumb">
                                        <a href="#">
                                            <img class="img-responsive" src="images/recent.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-info meta-info-rn">
                                        <div class="slide">
                                            <a target="_blank" href="#" class="post-badge btn_sev">I</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-title-author-details">
                                    <div class="post-editor-date">
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> Oct 6, 2016
                                        </div>
                                        <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                    </div>
                                    <p>STOCKHOLM (Reuters) - The fight against climate change is also a fight for the right to education of girls, millions of whom lose access to schools due to climate-related events, Nobel Peace Prize laureate Malala Yousafzai told Reuters on Friday<a href="#">Read more...</a></p>
                                </div>
                            </div>
                            <!-- item-3 -->
                            <div class="item">
                                <div class="post-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                                    <!-- image -->
                                    <h3><a href="#">There are many variations of passages of Lorem Ipsum available</a></h3>
                                    <div class="post-thumb">
                                        <a href="#">
                                            <img class="img-responsive" src="images/recent_news_03.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-info meta-info-rn">
                                        <div class="slide">
                                            <a target="_blank" href="#" class="post-badge btn_five">B</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-title-author-details">
                                    <div class="post-editor-date">
                                        <div class="post-date">
                                            <i class="pe-7s-clock"></i> Oct 6, 2016
                                        </div>
                                        <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                    </div>
                                    <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true <a href="#">Read more...</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row rn_block">
                        <div class="col-md-4 col-sm-6 padd">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                <!-- image -->
                                <div class="post-thumb">
                                    <a href="#">
                                        <img class="img-responsive" src="images/health recen.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-info meta-info-rn">
                                    <div class="slide">
                                        <a target="_blank" href="#" class="post-badge btn_eight">H</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-title-author-details">
                                <h4><a href="#">The unsanitary truth about period poverty and what governments can do...</a></h4>
                                <div class="post-editor-date">
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                    </div>
                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 padd">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                <!-- image -->
                                <div class="post-thumb">
                                    <a href="#">
                                        <img class="img-responsive" src="images/politic.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-info meta-info-rn">
                                    <div class="slide">
                                        <a target="_blank" href="#" class="post-badge btn_nine">p</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-title-author-details">
                                <h4><a href="#">Representation of women in Indian Parliament is far less than the global average ...</a></h4>
                                <div class="post-editor-date">
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                    </div>
                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 hidden-sm padd">
                            <div class="post-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                                <!-- image -->
                                <div class="post-thumb">
                                    <a href="#">
                                        <img class="img-responsive" src="images/Miss-Universe-2021-Meet-Harnaaz-Sandh.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-info meta-info-rn">
                                    <div class="slide">
                                        <a target="_blank" href="#" class="post-badge btn_one">F</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-title-author-details">
                                <h4><a href="#">Miss Universe 2022 Miss Universe 2022 will be the 71st Miss Universe pageant. Harnaaz Sandhu of India will crown her successor at the end of the event ...</a></h4>
                                <div class="post-editor-date">
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> jun 9, 2022
                                    </div>
                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Politics Area
                    ============================================ -->
                <section class="politics_wrapper">
                    <h3 class="category-headding ">POLITICS</h3>
                    <div class="headding-border"></div>
                    <div class="row">
                        <div id="content-slide-2" class="owl-carousel">
                            <!-- item-1 -->
                            <div class="item">
                                <div class="row">
                                    <!-- main post -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="post-wrapper wow fadeIn" data-wow-duration="2s">
                                            <!-- post title -->
                                            <h3><a href="#">Press release: Women in politics: New data shows growth but also setbacks .</a></h3>
                                            <!-- post image -->
                                            <div class="post-thumb">
                                                <a href="#">
                                                    <img src="images/politics1.jpg" class="img-responsive" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-title-author-details">
                                            <div class="post-editor-date">
                                                <!-- post date -->
                                                <div class="post-date">
                                                    <i class="pe-7s-clock"></i> 10 March 2021
                                                </div>
                                                <!-- post comment -->
                                                <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                            </div>
                                            <p>Despite increases in the number of women at the highest levels of political power, widespread gender inequalities persist, according to the 2021 edition of the IPU~UN Women <a href="#">Read more...</a></p>
                                        </div>
                                    </div>
                                    <!-- right side post -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="row rn_block">
                                            <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                <!-- post image -->
                                                <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                                                    <a href="#">
                                                        <img src="images/politics2.jpg" class="img-responsive" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <!-- post image -->
                                                    <h5><a href="#">New Study Finds Disparity Between Men and Women In Politics In India Is Immense </a></h5>
                                                    <div class="post-editor-date">
                                                        <!-- post date -->
                                                        <div class="post-date">
                                                            <i class="pe-7s-clock"></i> June 10, 2022
                                                        </div>
                                                        <!-- post comment -->
                                                        <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                <!-- post image -->
                                                <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                    <a href="#">
                                                        <img src="images/politics_03.jpg" class="img-responsive" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <!-- post image -->
                                                    <h5><a href="#">If you are going to use a passage of Lorem Ipsum,</a></h5>
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
                                            <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                <!-- post image -->
                                                <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                                                    <a href="#">
                                                        <img src="images/politics_04.jpg" class="img-responsive" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <!-- post image -->
                                                    <h5><a href="#">Lorem Ipsum comes from sections</a></h5>
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
                                            <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                <!-- post image -->
                                                <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                                    <a href="#">
                                                        <img src="images/politics_05.jpg" class="img-responsive" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <!-- post image -->
                                                    <h5><a href="#">Microbus runs over 2 pedestrians in Banani</a></h5>
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
                                    </div>
                                </div>
                            </div>
                            <!-- item-2 -->
                            <div class="item">
                                <div class="row">
                                    <!-- main post -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                                            <!-- post title -->
                                            <h3><a href="#">There are many variations of passages of Lorem Ipsum available</a></h3>
                                            <!-- post image -->
                                            <div class="post-thumb">
                                                <a href="#">
                                                    <img src="images/politics_01.jpg" class="img-responsive" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-title-author-details">
                                            <div class="post-editor-date">
                                                <!-- post date -->
                                                <div class="post-date">
                                                    <i class="pe-7s-clock"></i> Oct 6, 2016
                                                </div>
                                                <!-- post comment -->
                                                <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                            </div>
                                            <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true <a href="#">Read more...</a></p>
                                        </div>
                                    </div>
                                    <!-- right side post -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="row rn_block">
                                            <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                <!-- post image -->
                                                <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                                    <a href="#">
                                                        <img src="images/politics_02.jpg" class="img-responsive" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <!-- post image -->
                                                    <h5><a href="#">Microbus runs over 2 pedestrians in Banani</a></h5>
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
                                            <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                <!-- post image -->
                                                <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                                                    <a href="#">
                                                        <img src="images/politics_03.jpg" class="img-responsive" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <!-- post image -->
                                                    <h5><a href="#">Microbus runs over 2 pedestrians in Banani</a></h5>
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
                                            <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                <!-- post image -->
                                                <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                                    <a href="#">
                                                        <img src="images/politics_04.jpg" class="img-responsive" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <!-- post image -->
                                                    <h5><a href="#">Microbus runs over 2 pedestrians in Banani</a></h5>
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
                                            <div class="col-xs-6 col-md-6 col-sm-6 post-padding">
                                                <!-- post image -->
                                                <div class="post-thumb wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                                    <a href="#">
                                                        <img src="images/politics_05.jpg" class="img-responsive" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-title-author-details">
                                                    <!-- post image -->
                                                    <h5><a href="#">Microbus runs over 2 pedestrians in Banani</a></h5>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.Politics -->
                <div class="ads">
                    <a href="#"><img src="images/banner.png" class="img-responsive center-block" alt=""></a>
                </div>
            </div>
            <!-- /.left content inner -->
            <div class="col-md-4 col-sm-4 left-padding">
                <!-- right content wrapper -->
                <div class="input-group search-area">
                    <!-- search area -->
                    <input type="text" class="form-control" placeholder="Search articles here ..." name="q">
                    <div class="input-group-btn">
                        <button class="btn btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
                <!-- /.search area -->
                <!-- twitter feed -->
                <h3 class="category-headding ">TWITTER FEED</h3>
                <div class="headding-border"></div>
                <div class="feed-inner">
                    <p>It is a long established fact that a reader will be distracted by the.</p>
                    <div class="feed-footer">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <cite><a href="#" class="social-feed__author">@newsagency</a></cite>
                        <span class="feed-date">2 hours ago</span>
                    </div>
                    <hr>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                    <div class="feed-footer">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <cite><a href="#" class="social-feed__author">@newsagency</a></cite>
                        <span class="feed-date">2 hours ago</span>
                    </div>
                    <hr>
                    <p>The standard chunk of Lorem Ipsum used since the 1500s is.</p>
                    <div class="feed-footer">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <cite><a href="#" class="social-feed__author">@newsagency</a></cite>
                        <span class="feed-date">2 hours ago</span>
                    </div>
                </div>
                <!-- /.twitter feed -->
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
            </div>
            <!-- side content end -->
        </div>
        <!-- row end -->
    </div>
    <!-- container end -->
    <!-- Weekly News Area
        ============================================ -->
    <section class="weekly-news-inner">
        <div class="container">
            <div class="row row-margin">
                <h3 class="category-headding ">WEEKLY NEWS</h3>
                <div class="headding-border bg-color-1"></div>
                <div id="content-slide-4" class="owl-carousel">
                    <div class="item">
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <div class="post-thumb img-zoom-in">
                                <a href="#">
                                    <img class="entry-thumb" src="images/weekly-news-01.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <span class="color-4">FASHION </span>
                                <h3 class="post-title"><a href="#" rel="bookmark">The 20 free things in Sydney with your girlfriend </a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                    </div>
                                    <!-- post comment -->
                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                    <!-- read more -->
                                    <a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <div class="post-thumb img-zoom-in">
                                <a href="#">
                                    <img class="entry-thumb" src="images/weekly-news-05.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <span class="color-1">SPORTS </span>
                                <h3 class="post-title"><a href="#" rel="bookmark">The 20 free things in Sydney with your girlfriend </a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                    </div>
                                    <!-- post comment -->
                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                    <!-- read more -->
                                    <a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="post-thumb img-zoom-in">
                                <a href="#">
                                    <img class="entry-thumb" src="images/weekly-news-02.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <span class="color-2">TECHNOLOGY </span>
                                <h3 class="post-title"><a href="#" rel="bookmark">The 20 free things in Sydney with your girlfriend </a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                    </div>
                                    <!-- post comment -->
                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                    <!-- read more -->
                                    <a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                            <div class="post-thumb img-zoom-in">
                                <a href="#">
                                    <img class="entry-thumb" src="images/weekly-news-03.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <span class="color-5">BUSINESS </span>
                                <h3 class="post-title"><a href="#" rel="bookmark">The 20 free things in Sydney with your girlfriend </a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                    </div>
                                    <!-- post comment -->
                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                    <!-- read more -->
                                    <a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="post-thumb img-zoom-in">
                                <a href="#">
                                    <img class="entry-thumb" src="images/weekly-news-04.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <span class="color-3">HEALTH </span>
                                <h3 class="post-title"><a href="#" rel="bookmark">The 20 free things in Sydney with your girlfriend </a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                    </div>
                                    <!-- post comment -->
                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                    <!-- read more -->
                                    <a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="post-thumb img-zoom-in">
                                <a href="#">
                                    <img class="entry-thumb" src="images/weekly-news-06.jpg" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <span class="color-2">INTERNATIONAL </span>
                                <h3 class="post-title"><a href="#" rel="bookmark">The 20 free things in Sydney with your girlfriend </a></h3>
                                <div class="post-editor-date">
                                    <!-- post date -->
                                    <div class="post-date">
                                        <i class="pe-7s-clock"></i> Oct 6, 2016
                                    </div>
                                    <!-- post comment -->
                                    <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                                    <!-- read more -->
                                    <a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- second content -->
    
   
    
</body>
<?php include('footer.php');?> 
</html>