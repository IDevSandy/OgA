<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goverment Schemes</title>
</head>
<?php include('header.php');?>
<body>
<?php 
	$where= array(
                "id" => 5
                );

	$c=$obj->select_record('blogs',$where);
  
			
		?>
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
                    <div class="post-style2 archive-post-style-2">
                        <a href="#"><img src=<?php echo $c['file_url'] ?> alt=""></a>
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
                            <p>The trend of decline in the Child Sex Ratio (CSR), defined as number of girls per 1000 of boys between 0-6 years of age, has been unabated since 1961. <a href=dummy.php>Read more...</a></p>
                        </div>
                    </div>
                    <!-- archive post -->
                    <div class="post-style2 archive-post-style-2">
                        <a href="#"><img src="images/archive/archive-02.jpg" alt=""></a>
                        <div class="post-style2-detail">
                            <h4><a href="#" title="">It uses a dictionary of over 200 Latin words, combined with</a></h4>
                            <div class="date">
                                <ul>
                                    <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                    <li><a title="" href="#">11 Nov 2015</a> --</li>
                                    <li>
                                        <div class="comments"><a href="#">0</a></div>
                                    </li>
                                </ul>
                            </div>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit. <a href="#">Read more...</a></p>
                        </div>
                    </div>
                    <!-- archive post -->
                    <div class="post-style2 archive-post-style-2">
                        <a href="#"><img src="images/archive/archive-03.jpg" alt=""></a>
                        <div class="post-style2-detail">
                            <h4><a href="#" title="">It uses a dictionary of over 200 Latin words, combined with</a></h4>
                            <div class="date">
                                <ul>
                                    <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                    <li><a title="" href="#">11 Nov 2015</a> --</li>
                                    <li>
                                        <div class="comments"><a href="#">0</a></div>
                                    </li>
                                </ul>
                            </div>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit. <a href="#">Read more...</a></p>
                        </div>
                    </div>
                    <!-- archive post -->
                    <div class="post-style2 archive-post-style-2">
                        <a href="#"><img src="images/archive/archive-04.jpg" alt=""></a>
                        <div class="post-style2-detail">
                            <h4><a href="#" title="">It uses a dictionary of over 200 Latin words, combined with</a></h4>
                            <div class="date">
                                <ul>
                                    <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                    <li><a title="" href="#">11 Nov 2015</a> --</li>
                                    <li>
                                        <div class="comments"><a href="#">0</a></div>
                                    </li>
                                </ul>
                            </div>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit. <a href="#">Read more...</a></p>
                        </div>
                    </div>
                    <!-- archive post -->
                    <div class="post-style2 archive-post-style-2">
                        <a href="#"><img src="images/archive/archive-05.jpg" alt=""></a>
                        <div class="post-style2-detail">
                            <h4><a href="#" title="">It uses a dictionary of over 200 Latin words, combined with</a></h4>
                            <div class="date">
                                <ul>
                                    <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                    <li><a title="" href="#">11 Nov 2015</a> --</li>
                                    <li>
                                        <div class="comments"><a href="#">0</a></div>
                                    </li>
                                </ul>
                            </div>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit. <a href="#">Read more...</a></p>
                            <!--<a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>-->
                        </div>
                    </div>
                    <!-- archive post -->
                    <div class="post-style2 archive-post-style-2">
                        <a href="#"><img src="images/archive/archive-06.jpg" alt=""></a>
                        <div class="post-style2-detail">
                            <h4><a href="#" title="">It uses a dictionary of over 200 Latin words, combined with</a></h4>
                            <div class="date">
                                <ul>
                                    <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                    <li><a title="" href="#">11 Nov 2015</a> --</li>
                                    <li>
                                        <div class="comments"><a href="#">0</a></div>
                                    </li>
                                </ul>
                            </div>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit. <a href="#">Read more...</a></p>
                            <!--<a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>-->
                        </div>
                    </div>
                </div>
                <!-- right content -->
                <div class="col-sm-12 col-md-6">
                    <!-- archive post -->
                    <div class="post-style2 archive-post-style-2">
                        <a href="#"><img src="images/archive/archive-07.jpg" alt=""></a>
                        <div class="post-style2-detail">
                            <h4><a href="#" title="">It uses a dictionary of over 200 Latin words, combined with</a></h4>
                            <div class="date">
                                <ul>
                                    <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                    <li><a title="" href="#">11 Nov 2015</a> --</li>
                                    <li>
                                        <div class="comments"><a href="#">0</a></div>
                                    </li>
                                </ul>
                            </div>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit. <a href="#">Read more...</a></p>
                            <!--<a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>-->
                        </div>
                    </div>
                    <!-- archive post -->
                    <div class="post-style2 archive-post-style-2">
                        <a href="#"><img src="images/archive/archive-08.jpg" alt=""></a>
                        <div class="post-style2-detail">
                            <h4><a href="#" title="">It uses a dictionary of over 200 Latin words, combined with</a></h4>
                            <div class="date">
                                <ul>
                                    <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                    <li><a title="" href="#">11 Nov 2015</a> --</li>
                                    <li>
                                        <div class="comments"><a href="#">0</a></div>
                                    </li>
                                </ul>
                            </div>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit. <a href="#">Read more...</a></p>
                            <!--<a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>-->
                        </div>
                    </div>
                    <!-- archive post -->
                    <div class="post-style2 archive-post-style-2">
                        <a href="#"><img src="images/archive/archive-09.jpg" alt=""></a>
                        <div class="post-style2-detail">
                            <h4><a href="#" title="">It uses a dictionary of over 200 Latin words, combined with</a></h4>
                            <div class="date">
                                <ul>
                                    <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                    <li><a title="" href="#">11 Nov 2015</a> --</li>
                                    <li>
                                        <div class="comments"><a href="#">0</a></div>
                                    </li>
                                </ul>
                            </div>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit. <a href="#">Read more...</a></p>
                            <!--<a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>-->
                        </div>
                    </div>
                    <!-- archive post -->
                    <div class="post-style2 archive-post-style-2">
                        <a href="#"><img src="images/archive/archive-10.jpg" alt=""></a>
                        <div class="post-style2-detail">
                            <h4><a href="#" title="">It uses a dictionary of over 200 Latin words, combined with</a></h4>
                            <div class="date">
                                <ul>
                                    <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                    <li><a title="" href="#">11 Nov 2015</a> --</li>
                                    <li>
                                        <div class="comments"><a href="#">0</a></div>
                                    </li>
                                </ul>
                            </div>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit. <a href="#">Read more...</a></p>
                            <!--<a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>-->
                        </div>
                    </div>
                    <!-- archive post -->
                    <div class="post-style2 archive-post-style-2">
                        <a href="#"><img src="images/archive/archive-11.jpg" alt=""></a>
                        <div class="post-style2-detail">
                            <h4><a href="#" title="">It uses a dictionary of over 200 Latin words, combined with</a></h4>
                            <div class="date">
                                <ul>
                                    <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                    <li><a title="" href="#">11 Nov 2015</a> --</li>
                                    <li>
                                        <div class="comments"><a href="#">0</a></div>
                                    </li>
                                </ul>
                            </div>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit. <a href="#">Read more...</a></p>
                            <!--<a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>-->
                        </div>
                    </div>
                    <!-- archive post -->
                    <div class="post-style2 archive-post-style-2">
                        <a href="#"><img src="images/archive/archive-12.jpg" alt=""></a>
                        <div class="post-style2-detail">
                            <h4><a href="#" title="">It uses a dictionary of over 200 Latin words, combined with</a></h4>
                            <div class="date">
                                <ul>
                                    <li>By<a title="" href="#"><span>Jone Kilna</span></a> --</li>
                                    <li><a title="" href="#">11 Nov 2015</a> --</li>
                                    <li>
                                        <div class="comments"><a href="#">0</a></div>
                                    </li>
                                </ul>
                            </div>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit. <a href="#">Read more...</a></p>
                            <!--<a class="readmore pull-right" href="#"><i class="pe-7s-angle-right"></i></a>-->
                        </div>
                    </div>
                </div>
                <!-- pagination -->
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="pagination">
                            <li>
                                <a href="#" class="prev">
                                    <i class="pe-7s-angle-left"></i>
                                </a>
                            </li>
                            <li> <a href="#">1</a></li>
                            <li> <a href="#" class="active">2</a></li>
                            <li> <a href="#">3</a></li>
                            <li> <a href="#">4</a></li>
                            <li> ... </li>
                            <li> <a href="#">5</a></li>
                            <li>
                                <a href="#" class="next"> <i class="pe-7s-angle-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    
</body>
<?php include('footer.php');?>
</html>