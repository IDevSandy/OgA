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
                            <li><a href="career.php" title="">CAREER</a></li>
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
                            <h3><a href=detail.php?id=<?php echo $c['id']?>&<?php echo $c['permalink'] ?>><?php echo $c['img_title'] ?></a></h3>
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
            
           
               
            </div>
                
        </div>       
        
    </section>
    
</body>
<?php include('footer.php');?>
</html>