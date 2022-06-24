<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goverment Schemes</title>
    
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

    
<section class="block-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>GOVERNMENT SCHEMES</h1>
                    <div class="breadcrumbs">
                        <ul>
                            <li><i class="pe-7s-home"></i> <a href="index.php" title="">Home</a></li>
                            <li><a href="govermentschemes.php" title="">Government Schemes</a></li>
                        </ul>
                    </div>
                    <!-- <form>
                        <div class="form-group">
                            <label for="from">From</label>
                            <input class="form-control" type="text" id="from" name="from">
                            <label for="to">To</label>
                            <input class="form-control" type="text" id="to" name="to">
                            <a href="#" class="btn btn-style">Search</a>
                        </div>
                    </form> -->
                </div>
            </div>
        </div>
    </section>
    <section class="archive">
        <!-- left content -->
        <div class="container">
            <div class="row">
                <!-- Left content -->
                <div class="col-sm-12 col-md-6">
                    <!-- archive post -->
                    <?php $where =array(
                        "category_id"=> $_REQUEST['id'],
                       
                    );
                    $c=$obj->getData('blogs','*',$where,'id','desc');
                    foreach(array_slice($c,0,5) as $c){
                    ?>
                    <div class="post-style2 archive-post-style-2">
                        <a href="#"><img src=<?php echo $c['file_url'] ?> alt="" width="218" height="165"></a>
                        <div class="post-style2-detail">
                            <h4><a href="#" title=""><?php echo $c['title'] ?></a></h4>
                            <div class="date">
                                <ul>
                                    <li>By<a title="" href="#"><span><?php echo $c['author'] ?></span></a> --</li>
                                    <li><a title="" href="#">11 Nov 2015</a> --</li>
                                    <li>
                                        <div class="comments"><a href="#">0</a></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="text"><?php echo $c['content']?></div> <a href=detail.php?id=<?php echo $c['id']?>&<?php echo $c['permalink'] ?> >Read more...</a>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div> 
                <!-- right content -->
                <div class="col-sm-12 col-md-6">
                <?php $where =array(
                       "category_id"=> $_REQUEST['id'],
                       
                    );
                    $c=$obj->getData('blogs','*',$where,'id','desc');
                    foreach(array_slice($c,6) as $c){
                    ?>
                    <!-- archive post -->
                    <div class="post-style2 archive-post-style-2">
                        <a href="#"><img src=<?php echo $c['file_url'] ?> alt=""width="218" height="165"></a>
                        <div class="post-style2-detail">
                            <h4><a href="#" title=""><?php echo $c['title'] ?></a></h4>
                            <div class="date">
                                <ul>
                                    <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                    <li><a title="" href="#">11 Nov 2015</a> --</li>
                                    <li>
                                        <div class="comments"><a href="#">0</a></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="text"><?php echo $c['content']?></div> <a href=detail.php?id=<?php echo $c['id']?>&<?php echo $c['permalink'] ?> >Read more...</a>
                        
                            <!--<a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>-->
                        </div>
                    </div>
                    <?php } ?>
                    
            </div>
        </div>
    </section>
     
    
    
    
</body>
<?php include('footer.php');?>
</html>