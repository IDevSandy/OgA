<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career</title>
</head>
<?php include('header.php');?>
<style>
 .text {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 3; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical;
}
</style>
<body>
<div class="se-pre-con"></div>
<section class="block-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>CHOOSING THE RIGHT STREAM</h1>
                    <div class="breadcrumbs">
                        <ul>
                            <li><i class="pe-7s-home"></i> <a href="index.php" title="">Home</a></li>
                            <li><a href="feed.php" title="">CAREER</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="all-category-inner">
        <div class="container">
            <div class="row">
            <?php $where =array(
                        "category_id"=>4,
                    );
                    $c=$obj->getData('blogs','*',$where,'id','asc');
                    foreach(array_slice($c,0,3) as $c){
                    ?>
                <div class="col-md-4 col-sm-4">
               
                    <!-- sports -->
                    <div class="sports-inner">
                        <h3 class="category-headding "> <?php echo $c['title'] ?></h3>
                        <div class="headding-border bg-color-1"></div>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="#"><?php echo $c['img_title'] ?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">
                                <a href="#">
                                    <img src=<?php echo $c['file_url'] ?> class="img-responsive" alt=""width="500" height="300">
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
                                <div class="post-author-comment"><i class="pe-7s-comment"></i> </div>
                            </div>
                            <div class="text"><?php echo $c['content']?></div> <a href=detail.php?id=<?php echo $c['id']?>&<?php echo $c['permalink'] ?> >Read more...</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- /.sports -->
                <!-- <div class="col-md-4 col-sm-4"> -->
                    <!-- fashion -->
                    <!-- <div class="fashion-inner">
                        <h3 class="category-headding ">How to start IAS preparation </h3>
                        <div class="headding-border bg-color-4"></div>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s"> -->
                            <!-- post title -->
                            <!-- <h3><a href="#"> Beginner's Guide to Clear Indian Administrative Services(IAS) Exam</a></h3> -->
                            <!-- post image -->
                            <!-- <div class="post-thumb">
                                <a href="#">
                                    <img src="images/ias1 (2).png" class="img-responsive" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date"> -->
                                <!-- post date -->
                                <!-- <div class="post-date">
                                    <i class="pe-7s-clock"></i> Oct 6, 2016
                                </div> -->
                                <!-- post comment -->
                                <!-- <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                            </div>
                            <p>How should you start IAS exam preparation? Read this beginner's guide for success in the UPSC Civil Services Examination (CSE). <a href="#">Read more...</a></p>
                        </div>
                    </div>
                </div> -->
                <!-- /.fashion -->
                <!-- <div class="col-md-4 col-sm-4">
                    travel -->
                    <!-- <div class="travel-inner">
                        <h3 class="category-headding "> Career Options After 12th </h3>
                        <div class="headding-border bg-color-3"></div>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s"> -->
                            <!-- post title -->
                            <!-- <h3><a href="#">Top 10 Career Options For Science Students After 12th with PCM</a></h3> -->
                            <!-- post image -->
                            <!-- <div class="post-thumb">
                                <a href="#">
                                    <img src="images/12th (1).jpg" class="img-responsive" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date"> -->
                                <!-- post date -->
                                <!-- <div class="post-date">
                                    <i class="pe-7s-clock"></i> Oct 6, 2016
                                </div> -->
                                <!-- post comment -->
                                <!-- <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                            </div>
                            <p>Todays, Education is most important thing to make a good career.Most of the students are used to wandering for looking  <a href="#">Read more...</a></p>
                        </div>
                    </div>
                </div> -->
                <!-- /.travel -->
            </div>
            <div class="row">
            <?php $where =array(
                        "category_id"=>4,
                    );
                    $c=$obj->getData('blogs','*',$where,'id','asc');
                    foreach(array_slice($c,3) as $c){
                    ?>
                <div class="col-md-4 col-sm-4">
               
                    <!-- sports -->
                    <div class="sports-inner">
                        <h3 class="category-headding "> <?php echo $c['title'] ?></h3>
                        <div class="headding-border bg-color-1"></div>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s">
                            <!-- post title -->
                            <h3><a href="#"><?php echo $c['img_title'] ?></a></h3>
                            <!-- post image -->
                            <div class="post-thumb">
                                <a href="#">
                                    <img src=<?php echo $c['file_url'] ?> class="img-responsive" alt=""width="500" height="300">
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
                                <div class="post-author-comment"><i class="pe-7s-comment"></i> </div>
                            </div>
                            <div class="text"><?php echo $c['content']?></div> <a href=detail.php?id=<?php echo $c['id']?>&<?php echo $c['permalink'] ?> >Read more...</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            
                <!-- <div class="col-md-4 col-sm-4"> -->
                    <!-- food -->
                    <!-- <div class="food-inner"> -->
                        <!-- <h3 class="category-headding "></h3>
                        <div class="headding-border bg-color-4"></div>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s"> -->
                            <!-- post title -->
                            <!-- <h3><a href="#"></a></h3> -->
                            <!-- post image -->
                            <!-- <div class="post-thumb"> -->
                                <!-- <a href="#">
                                    <img src= class="img-responsive" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date"> -->
                                <!-- post date -->
                                <!-- <div class="post-date">
                                    <i class="pe-7s-clock"></i> Oct 6, 2016
                                </div> -->
                                <!-- post comment -->
                                <!-- <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                            </div>
                            <div class="text"></div> <a href=detail.php?id=>Read more...</a>
                        </div>
                    </div>
                </div> -->
               
            </div>
                <!-- /.food -->
                <!-- <div class="col-md-4 col-sm-4"> -->
                    <!-- politics -->
                    <!-- <div class="politics-inner">
                        <h3 class="category-headding ">CAREER IN POLITICS</h3>
                        <div class="headding-border bg-color-5"></div>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s"> -->
                            <!-- post title -->
                            <!-- <h3><a href="#">There are many variations of passages of Lorem Ipsum available</a></h3> -->
                            <!-- post image -->
                            <!-- <div class="post-thumb">
                                <a href="#">
                                    <img src="images/politics_06.jpg" class="img-responsive" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date"> -->
                                <!-- post date -->
                                <!-- <div class="post-date">
                                    <i class="pe-7s-clock"></i> Oct 6, 2016
                                </div> -->
                                <!-- post comment -->
                                <!-- <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                            </div>
                            <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true <a href="#">Read more...</a></p>
                        </div>
                    </div>
                </div> -->
                <!-- /.politics -->
                <!-- <div class="col-md-4 col-sm-4"> -->
                    <!-- health -->
                    <!-- <div class="health-inner">
                        <h3 class="category-headding ">CAREER IN BUSINESS</h3>
                        <div class="headding-border bg-color-3"></div>
                        <div class="post-wrapper wow fadeIn" data-wow-duration="1s"> -->
                            <!-- post title -->
                            <!-- <h3><a href="#">There are many variations of passages of Lorem Ipsum available</a></h3> -->
                            <!-- post image -->
                            <!-- <div class="post-thumb">
                                <a href="#">
                                    <img src="images/health.jpg" class="img-responsive" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="post-title-author-details">
                            <div class="post-editor-date"> -->
                                <!-- post date -->
                                <!-- <div class="post-date">
                                    <i class="pe-7s-clock"></i> Oct 6, 2016
                                </div> -->
                                <!-- post comment -->
                                <!-- <div class="post-author-comment"><i class="pe-7s-comment"></i> 13 </div>
                            </div>
                            <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true <a href="#">Read more...</a></p>
                        </div>
                    </div>
                </div> -->
        </div>       <!-- /.health -->
        
    </section>
    
</body>
<?php include('footer.php');?>
</html>