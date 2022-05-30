<?php
header('Access-Control-Allow-Origin: *');
// array holding allowed Origin domains
// $allowedOrigins = array(
//   '(http(s)://)?(www\.)?my\-domain\.com'
// );
//
// if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] != '') {
//   foreach ($allowedOrigins as $allowedOrigin) {
//     if (preg_match('#' . $allowedOrigin . '#', $_SERVER['HTTP_ORIGIN'])) {
//       header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
//       header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
//       header('Access-Control-Max-Age: 1000');
//       header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
//       break;
//     }
//   }
// }
session_start();
include('database.php');
$obj=new query();
header('Content-Type: application/json');
date_default_timezone_set('Asia/Kolkata');
$datetime=date("Y-m-d H:i:s");
$action=$_REQUEST['action'] ?? "";
switch($action) {
    default:
    echo "No such query exist! Check your query and Try Again";
  //  header("Location: index.php?q=Error! No Case found!");
    break;
case "get_categories":
	$response=array();
	$finalArray=array();
	if(isset($_REQUEST['uuid']) && $_REQUEST['uuid'] !="")
	{  
		 $where= array(
				"uuid" => $_REQUEST['uuid'],
                "status" => 1

                );

		$count=$obj->getCount("categories",$where);

	
	if($count['records'] > 0)
	{
$finalArray=$obj->getData('categories','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	} else {
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
	else
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("categories",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('categories','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;

// Start Services
case "get_services":
	$response=array();
	$finalArray=array();
	if(isset($_REQUEST['uuid']) && $_REQUEST['uuid'] !="")
	{
		 $where= array(
				"uuid" => $_REQUEST['uuid'],
                "status" => 1

                );

		$count=$obj->getCount("services",$where);

	
	if($count['records'] > 0)
	{
$finalArray=$obj->getData('services','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	} else {
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
	else
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("services",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('services','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;
// End Services

// start Services by cat
case "get_services_by_subcat":
	$response=array();
	$finalArray=array();
	if(isset($_REQUEST['subcategory_id']) && $_REQUEST['subcategory_id'] !="")
	{
		 $where= array(
				"subcategory_id" => $_REQUEST['subcategory_id'],
                "status" => 1
                );

		$count=$obj->getCount("services",$where);

	
	if($count['records'] > 0)
	{
$finalArray=$obj->getData('services','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	} else {
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
	else
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("services",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('services','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;
// start Services by cat
case "get_services_by_cat":
	$response=array();
	$finalArray=array();
	if(isset($_REQUEST['category_id']) && $_REQUEST['category_id'] !="")
	{
		 $where= array(
				"category_id" => $_REQUEST['category_id'],
                "status" => 1

                );

		$count=$obj->getCount("services",$where);

	
	if($count['records'] > 0)
	{
$finalArray=$obj->getData('services','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	} else {
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
	else
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("services",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('services','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;
// End Services by cat

// Start Orders
case "get_orders":
	$response=array();
	$finalArray=array();
	if(isset($_REQUEST['order_type']) && $_REQUEST['order_type'] !="")
	{
		 $where= array(
				"order_type" => $_REQUEST['order_type'],

                );

		$count=$obj->getCount("orders",$where);

	
	if($count['records'] > 0)
	{
$finalArray=$obj->getData('orders','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	} else {
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
	else
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("orders",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('orders','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;

// END Orders
// Start Blog_categories
case "get_blog_categories":
	$response=array();
	$finalArray=array();
	if(isset($_REQUEST['uuid']) && $_REQUEST['uuid'] !="")
	{
		 $where= array(
				"uuid" => $_REQUEST['uuid'],
                "status" => 1

                );

		$count=$obj->getCount("blog_categories",$where);

	
	if($count['records'] > 0)
	{
$finalArray=$obj->getData('blog_categories','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	} else {
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
	else
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("blog_categories",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('blog_categories','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;
// END Blog_categories

// Start Blog
case "get_blogs":
	$response=array();
	$finalArray=array();
	if(isset($_REQUEST['uuid']) && $_REQUEST['uuid'] !="")
	{
		 $where= array(
				"uuid" => $_REQUEST['uuid'],
                "status" => 1

                );

		$count=$obj->getCount("blogs",$where);

	
	if($count['records'] > 0)
	{
$finalArray=$obj->getData('blogs','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	} else {
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
	else
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("blogs",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('blogs','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;
// End Blog

// Start Location
case "get_locations":
	$response=array();
	$finalArray=array();
	if(isset($_REQUEST['uuid']) && $_REQUEST['uuid'] !="")
	{
		 $where= array(
				"uuid" => $_REQUEST['uuid'],
                "status" => 1

                );

		$count=$obj->getCount("locations",$where);

	
	if($count['records'] > 0)
	{
$finalArray=$obj->getData('locations','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	} else {
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
	else
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("locations",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('locations','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;

// END Location

// Start portfolio
case "get_portfolios":
	$response=array();
	$finalArray=array();
	if(isset($_REQUEST['uuid']) && $_REQUEST['uuid'] !="")
	{
		 $where= array(
				"uuid" => $_REQUEST['uuid'],
                "status" => 1

                );

		$count=$obj->getCount("portfolios",$where);

	
	if($count['records'] > 0)
	{
$finalArray=$obj->getData('portfolios','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	} else {
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
	else
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("portfolios",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('portfolios','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;

//END portfolio

// Start sitepages
case "get_site_pages":
	$response=array();
	$finalArray=array();
	if(isset($_REQUEST['uuid']) && $_REQUEST['uuid'] !="")
	{
		 $where= array(
				"uuid" => $_REQUEST['uuid'],
                "status" => 1

                );

		$count=$obj->getCount("site_pages",$where);

	
	if($count['records'] > 0)
	{
$finalArray=$obj->getData('site_pages','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	} else {
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
	else
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("site_pages",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('site_pages','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;

// END sitepages

// Start faqs
case "get_faqs":
	$response=array();
	$finalArray=array();
	if(isset($_REQUEST['uuid']) && $_REQUEST['uuid'] !="")
	{
		 $where= array(
				"uuid" => $_REQUEST['uuid'],
                "status" => 1

                );

		$count=$obj->getCount("faqs",$where);

	
	if($count['records'] > 0)
	{
$finalArray=$obj->getData('faqs','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	} else {
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
	else
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("faqs",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('faqs','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;
// END faqs

// Start services_faq
case "get_service_faqs":
	$response=array();
	$finalArray=array();
	if(isset($_REQUEST['uuid']) && $_REQUEST['uuid'] !="")
	{
		 $where= array(
				"uuid" => $_REQUEST['uuid'],
                "status" => 1

                );

		$count=$obj->getCount("service_faqs",$where);

	
	if($count['records'] > 0)
	{
$finalArray=$obj->getData('service_faqs','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	} else {
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
	else
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("service_faqs",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('service_faqs','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;

// END services_faq

// Start client
case "get_ clients":
	$response=array();
	$finalArray=array();
	if(isset($_REQUEST['uuid']) && $_REQUEST['uuid'] !="")
	{
		 $where= array(
				"uuid" => $_REQUEST['uuid'],
                "status" => 1

                );

		$count=$obj->getCount("clients",$where);

	
	if($count['records'] > 0)
	{
$finalArray=$obj->getData('clients','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	} else {
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
	else
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("clients",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('clients','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;

// END client

// Start leads
case "get_ leads":
	$response=array();
	$finalArray=array();
	if(isset($_REQUEST['uuid']) && $_REQUEST['uuid'] !="")
	{
		 $where= array(
				"uuid" => $_REQUEST['uuid'],
                "status" => 1

                );

		$count=$obj->getCount("leads",$where);

	
	if($count['records'] > 0)
	{
$finalArray=$obj->getData('leads','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	} else {
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
	else
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("leads",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('leads','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;

// END leads

// Start testimonials
case "get_testimonials":
	$response=array();
	$finalArray=array();
	{
	$where= array(
                "status" => 1
                );

		$count=$obj->getCount("testimonials",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('testimonials','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}
	}
break;
// END testimonials

// start website settings
case "get_website_settings":
	$response=array();
	$finalArray=array();
	
	$where= array(
                "id" => 1
                );

		$count=$obj->getCount("website_settings",$where);

	if($count['records'] > 0)
	{
$finalArray=$obj->getData('website_settings','*',$where,'id','desc');

	$response['RESPONSE_CODE']='2XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']=$finalArray;
	echo safe_json_encode($response);
	}
	else
	{
	$response['RESPONSE_CODE']='5XX';
	$response['ACTIVE_RECORDS']=$count['records'];
	$response['DATA']='';
	echo safe_json_encode($response);
	}

break;
// end website settings

// search api
case "get_suggestion":
$keyword=$_REQUEST["keyword"];
$allResults=array();
$lists=array();
$category=array();
if($_REQUEST["keyword"] != "") {
  /*
  For searching multiple tables
  $query = "(SELECT content, title, 'msg' as type FROM messages WHERE content LIKE '%" .
             $keyword . "%' OR title LIKE '%" . $keyword ."%')
             UNION
             (SELECT content, title, 'topic' as type FROM topics WHERE content LIKE '%" .
             $keyword . "%' OR title LIKE '%" . $keyword ."%')
             UNION
             (SELECT content, title, 'comment' as type FROM comments WHERE content LIKE '%" .
             $keyword . "%' OR title LIKE '%" . $keyword ."%')";

  */
   $q = "(SELECT title,title_hi,uuid,id, 'products' as type FROM products WHERE title_hi LIKE '%" .
             $keyword . "%' OR title LIKE '%" . $keyword ."%' and status=1)
             UNION
             (SELECT title,title_hi,uuid,id, 'categories' as category FROM categories WHERE title_hi LIKE '%" .
             $keyword . "%' OR title LIKE '%" . $keyword ."%' and parent_id <> 0 and status=1)";
      $query=mysqli_query($con,$q);
        while($data=mysqli_fetch_assoc($query))  {
$file=array();
          if($data['type']=='products') {
            $file=mysqli_fetch_array(mysqli_query($con,"select file_url from product_medias where product_id='".$data['id']."' and status=1"));
          }

            array_push($lists,$data);
        }
       $allResults['RESPONSE_CODE']='2XX';
       $allResults['DATA']=$lists;
       echo safe_json_encode($allResults);
       }
       else{
        $err=array();
        array_push($err,"No keyword found");
       $allResults['RESPONSE_CODE']='5XX';
       $allResults['DATA']=$err;
       echo safe_json_encode($allResults);
       }
break;
}
 /********* USABLE FUNCTIONS*******/
function getConnection()
{
  $connect=mysqli_connect(HOST,DBUSER,DBPASSWORD,DBNAME) or die("Error in Connect database");
    return $connect;
}
function closeConnection($connectionInstance)
{
    if($connectionInstance)
    {
        mysqli_close($connectionInstance);
    }
}
function report_error($msg)
{
	$errorMsg="Internal Server Error";
    // send email to servers admin for error...
	$from="support@rasonwala.com";
	$to="techabilit.vishal@gmail.com";
	$subject = ' - Error & Exceptions';
	$headers = "From: Rasonwala.com <" .$from. ">\r\n";
	$headers .= "Reply-To: ".$to."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	$message ='<table><tr>
	    <td style="padding:15px;color:#444;font-family:calibri;font-size:17px">Hi Admin<u></u>,</td>
        </tr>
        <tr>
        	<td style="padding:0 15px 15px;color:#444;font-family:calibri;font-size:17px">There is issue coming in Webservices of Rasonwala. Kindly Check that.</td>
        </tr>
                     <tr>
                    	<th style="padding:0 15px 15px;color:#444;font-family:calibri;font-size:17px">Issue Name:&nbsp;&nbsp; '.$msg.'</th>
                    </tr>
                    <tr>
                     <th style="padding:0 15px 15px;color:#444;font-family:calibri;font-size:17px">File Name:&nbsp;&nbsp; '.$_SERVER['PHP_SELF'].'</th>
                   </tr>
                   <tr>
                    <th style="padding:0 15px 15px;color:#444;font-family:calibri;font-size:17px">URL:&nbsp;&nbsp; '.$_SERVER['SERVER_NAME'].'</th>
                  </tr>
                  <tr>
                   <th style="padding:0 15px 15px;color:#444;font-family:calibri;font-size:17px">Host Name:&nbsp;&nbsp; '.$_SERVER['HTTP_HOST'].'</th>
                 </tr>
                 <tr>
                  <th style="padding:0 15px 15px;color:#444;font-family:calibri;font-size:17px">Referrer:&nbsp;&nbsp; '.$_SERVER['HTTP_REFERER'].'</th>
                </tr>
                <tr>
                 <th style="padding:0 15px 15px;color:#444;font-family:calibri;font-size:17px">User Agent:&nbsp;&nbsp; '.$_SERVER['HTTP_USER_AGENT'].'</th>
               </tr>
               <tr>
                <th style="padding:0 15px 15px;color:#444;font-family:calibri;font-size:17px">Script  Name:&nbsp;&nbsp; '.$_SERVER['SCRIPT_NAME'].'</th>
              </tr>

             <tr>
              <th style="padding:0 15px 15px;color:#444;font-family:calibri;font-size:17px">Query String:&nbsp;&nbsp; '.$_SERVER['QUERY_STRING'].'</th>
            </tr>
            <tr>
             <th style="padding:0 15px 15px;color:#444;font-family:calibri;font-size:17px">Issued URI:&nbsp;&nbsp; '.$_SERVER['SCRIPT_URI'].'</th>
           </tr>
           <tr>
            <th style="padding:0 15px 15px;color:#444;font-family:calibri;font-size:17px">Remote IP:&nbsp;&nbsp; '.$_SERVER['REMOTE_ADDR'].'</th>
          </tr>
                   <tr>
                    	<td style="padding:0 15px 15px;color:#444;font-family:calibri;font-size:17px">To check <a href="http://www.rasonwala.com/" target="_blank">click here</a>.</td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody></table>';
mail($to, $subject, $message, $headers);
    return $errorMsg;
}
function sendMail($orderId, $ordernumber)
{
  $con=getConnection();
if($orderId != "")
{
  $o=mysqli_fetch_array(mysqli_query($con,"select * from orders where id='".$orderId."' ORDER BY id DESC"));
  $address=mysqli_fetch_array(mysqli_query($con,"select * from address_book where user_id='".$o['user_id']."' and status=1 ORDER BY id DESC"));
$user=mysqli_fetch_array(mysqli_query($con,"select * from users where id='".$o['user_id']."' and status=1 ORDER BY id DESC"));
}
$Amount = $o['txn_amount'];
$Orderlist=$o['order_csv'];
$finalOrder='';
$finalprc=0;
$name=$address['full_name']; //$o['FNAME'];
	$orderStr=explode("@",$Orderlist);
	for($i=0;$i<sizeof($orderStr);$i++)
		 {
		$perOrder=explode("$",$orderStr[$i]);
		$title=$perOrder[1];
		$image=$perOrder[2];
		$price=$perOrder[3];
		$qty=$perOrder[4];
		$weight=$perOrder[5];
		$sbtlprc=(int)$qty * (int)$price;
		$finalprc=(int)$finalprc + (int)$sbtlprc;
$finalOrder.='
          <tr>
            <td class="no"><span align="left"><img alt="'.$title.'" src="'.$image.'" width="100" height="100"/></span></td>
            <td class="desc"><h3>'.$title.'</h3>
			<p><small> Weight: '.$weight.' </small></p>

			</td>
            <td class="unit">Rs. '.$price.'</td>
            <td class="qty">'.$qty.'</td>
            <td class="total">Rs. '.$sbtlprc.'</td>
          </tr>

      ';
		 }
$tempgst= 0; //(18/100) * $finalprc;
			$gst=round($tempgst);
			$grandtotl=$Amount;

$pstatus=$o['payment_method'];

$status=$o['order_status'];
$d=date_create($o['created_at']);
$orderdate=date_format($d,'d-M-Y');

$file='<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>

	<!--<link rel="stylesheet" href="style.css" media="all" />-->
	<style>
	@font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #fa668d;
  text-decoration: none;
}

body {
  position: relative;
  width: 21cm;
  height: 29.7cm;
  margin: 0 auto;
  color: #555555;
  background: #FFFFFF;
  font-family: Arial, sans-serif;
  font-size: 14px;
  font-family: SourceSansPro;
}

header {
  padding: 0px 0;
  margin-bottom: 121px;
  border-bottom: 2px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 74px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #fa668d;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #fa668d;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #fa668d;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #555555;
  font-size: 1.6em;
  background: #EEEEEE;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background: #fa668d;
  color: #ffffff;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap;
  border-top: 1px solid #AAAAAA;
}

table tfoot tr:first-child td {
  border-top: none;
}

table tfoot tr:last-child td {
  color: #fa668d;
  font-size: 1.4em;
  border-top: 1px solid #fa668d;
}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #fa668d;
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}
	</style>

  </head>
  <body>
    <header class="clearfix">
      <div id="logo" style="margin-left:20px;background-color:#74d9bf; padding:10px;">
        <img src="http://rasonwala.com/assets/img/logo.png" alt="logo"">
      </div>
      <div id="company">
        <h2 class="name"style="color:#fa668d;">Rasonwala.com</h2>
        <div>Munger,Bihar, India</div>
        <div><a href="mailto: support@rasonwala.com"> support@rasonwala.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to"style="color:#fa668d;">DELIVERY ADDRESS:</div>
          <h2 class="name">'.$address['full_name'].'</h2>
          <div class="address"><span>'.$address['address'].'</span></div>
          <div class="address"><span>'.$address['city'].'</span></div>
          <div class="address"><span>'.$address['state'].'</span></div>
		  <div><span>Pincode -</span>'.$address['pincode'].'</div>
		  <div><span>Landmark -</span>'.$address['landmark'].'</div>
      <div class="email"><a href="mailto:'.$user['email'].'">'.$user['email'].'</a></div>
		  <div style="margin-bottom:20px;"><span>Contact No-</span>'.$address['mobile_no'].'</div>
        </div>
		<p>&nbsp;</p>
        <div id="invoice" style="margin-bottom:20px;">
          <div class="date"style="color:#fa668d;">Payment Mode</div>
          <div class="date">'.ucwords($o['payment_method']).'</div>
		  <div class="date"style="color:#fa668d;">Order Date & Time</div>
          <div class="date">'.$orderdate.'</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="desc">IMAGE</th>
            <th class="desc">TITLE</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
		'.$finalOrder.'
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td> '.$Amount.' INR</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <!--<div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>-->
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>';
// send mail
	$from='support@rasonwala.com';
	$to = $user['email'];
	$subject = "Rasonwala.com | Thank you for choosing Rasonwala";
	$headers = "From: ".$from."\r\n";
	$headers .= "Reply-To: ". $to. "\r\n";
	$headers .= "Bcc: vishal.aryan025@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$message = $file;
	mail($to, $subject, $message, $headers);
}
function safe_json_encode($value){
    if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
        $encoded = json_encode($value, JSON_PRETTY_PRINT);
    } else {
        $encoded = json_encode($value);
    }
    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            return $encoded;
        case JSON_ERROR_DEPTH:
            return 'Maximum stack depth exceeded'; // or trigger_error() or throw new Exception()
        case JSON_ERROR_STATE_MISMATCH:
            return 'Underflow or the modes mismatch'; // or trigger_error() or throw new Exception()
        case JSON_ERROR_CTRL_CHAR:
            return 'Unexpected control character found';
        case JSON_ERROR_SYNTAX:
            return 'Syntax error, malformed JSON'; // or trigger_error() or throw new Exception()
        case JSON_ERROR_UTF8:
            $clean = utf8ize($value);
            return safe_json_encode($clean);
        default:
            return 'Unknown error'; // or trigger_error() or throw new Exception()
    }
}

function utf8ize($mixed) {
    if (is_array($mixed)) {
        foreach ($mixed as $key => $value) {
            if($mixed[$key] !="")
            $mixed[$key] = utf8ize($value);
        }
    } else if (is_string ($mixed)) {
        return utf8_encode($mixed);
    }
    return $mixed;
}
function array_sort($array, $on, $order=SORT_ASC){

    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }
    return $new_array;
}

// Global Functions
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

function gen_referral(){
  $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
$res = "";
for ($i = 0; $i < 4 ; $i++) {
    $res .= $chars[mt_rand(0, strlen($chars)-1)];
}
return $res;
}
/********* ENDS ***************/
?>
