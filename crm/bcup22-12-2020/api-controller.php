<?php



session_start();



require_once('operations/dataOperation.php');



$obj = new DataOperation;



date_default_timezone_set('Asia/Kolkata');



$datetime=date("Y-m-d h:i:s");



header('Content-Type: application/json');



$action=$_REQUEST['action'] ?? "";







switch($action) {



    default:



    echo "No cases allowed! Check your query and Try Again";



    //header("Location: index.php?q=Error! No Case found!");



    // echo "<p><a href='index.php'>Back</a></p>";



    break;



   case "get_records":



   $response=array();



   if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {



     $where= array(



     "id" => $_REQUEST['id'],



     );



     $myrow=$obj->select_record($_REQUEST['tbl'],$where);



     if($myrow != "" && $myrow != null ) {



       $response['RESPONSE_CODE']='2XX';



       $response['DATA']=$myrow;



     } else {



       $response['RESPONSE_CODE']='5XX';



     }



   }



   else {



     $myrow = $obj->fetch_record($_REQUEST['tbl']);



     if($myrow != "" && $myrow != null ) {



       $response['RESPONSE_CODE']='2XX';



       $response['DATA']=$myrow;



     } else {



       $response['RESPONSE_CODE']='5XX';



     }



   }







   echo safe_json_encode($response);



   break;



 case "subcategories":



 $response=array();



 $finalArray=array();



 $uuid=gen_uuid();



 if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {



   $myArray= array(



     "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),



   "category_id"=> mysqli_real_escape_string($obj->con,$_POST['category_id']),



   "status" => mysqli_real_escape_string($obj->con,$_POST['status']),



   "updated_at" => $datetime



   );



   $where= array("id"=> $_REQUEST['id']);



   if($obj-> update_record("subcategories",$where,$myArray)) {



     $finalArray=array(



       'type'=> 'success',



       'msg' => 'Record Updated Successfully!'



     );



     $response['DATA']=$finalArray;



   // header("location:products.php?type=success&msg=Record Updated Successfully!");



     } else {



   $finalArray=array(



     'type'=> 'error',



     'msg' => 'Error in Updating Record!'



   );



   $response['DATA']=$finalArray;



   }



 } else {



   $myArray= array(



   "uuid" => $uuid,



   "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),



   "category_id"=> mysqli_real_escape_string($obj->con,$_POST['category_id']),



   "status" => mysqli_real_escape_string($obj->con,$_POST['status']),



   "created_at" => $datetime



   );



   if( $obj -> insert_record('subcategories',$myArray)) {



     $finalArray=array(



       'type'=> 'success',



       'msg' => 'Record Saved Successfully!'



     );



     $response['DATA']=$finalArray;



   } else {



     $finalArray=array(



       'type'=> 'error',



       'msg' => 'Error in Saving Record!'



     );



     $response['DATA']=$finalArray;



   }



 }



 echo safe_json_encode($response);



 break;



case "categories":



$response=array();



$finalArray=array();



$uuid=gen_uuid();



if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {



  $myArray= array(



  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),



  "status" => mysqli_real_escape_string($obj->con,$_POST['status']),



  "updated_at" => $datetime



  );



  $where= array("id"=> $_REQUEST['id']);



  if($obj-> update_record("categories",$where,$myArray)) {



    $finalArray=array(



      'type'=> 'success',



      'msg' => 'Record Updated Successfully!'



    );



    $response['DATA']=$finalArray;



  // header("location:products.php?type=success&msg=Record Updated Successfully!");



    } else {



  $finalArray=array(



    'type'=> 'error',



    'msg' => 'Error in Updating Record!'



  );



  $response['DATA']=$finalArray;



  }



} else {



  $myArray= array(



  "uuid" => $uuid,



  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),



  "status" => mysqli_real_escape_string($obj->con,$_POST['status']),



  "created_at" => $datetime



  );



  if( $obj -> insert_record('categories',$myArray)) {



    $finalArray=array(



      'type'=> 'success',



      'msg' => 'Record Saved Successfully!'



    );



    $response['DATA']=$finalArray;



    // header("location:products.php?type=success&msg=Record Saved Successfully!");



  } else {



    // header("location:products.php?type=error&msg=Error in Saving Record!");



    $finalArray=array(



      'type'=> 'error',



      'msg' => 'Error in Saving Record!'



    );



    $response['DATA']=$finalArray;



  }



}



echo safe_json_encode($response);



break;



case "delete_this_record":



$response=array();



$finalArray=array();



$where= array("id"=> $_REQUEST['id']);



if($obj->delete_record($_REQUEST['tbl'],$where)) {



// if($_REQUEST['tbl'] == "categories") {



// $obj->condition= array("category_id"=> $_REQUEST['id']);



// $obj->delete_record("categories_documents_rel",$obj->condition);



// }



$finalArray=array(



  'type'=> 'success',



  'msg' => 'Record Deleted Successfully!'



);



$response['DATA']=$finalArray;



} else {



  $finalArray=array(



    'type'=> 'error',



    'msg' => 'Error in Deleting Record!'



  );



  $response['DATA']=$finalArray;



}



echo safe_json_encode($response);



break;



case "get_subcategory":



$response=array();



if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {



  $where= array(



  "category_id" => $_REQUEST['id'],



  "status" => 1



  );



  $myrow=$obj->fetch_all_record("subcategories",$where);



  if($myrow != "" && $myrow != null ) {



    $response['RESPONSE_CODE']='2XX';



    $response['DATA']=$myrow;



  } else {



    $response['RESPONSE_CODE']='5XX';



  }



} else {



  $response['RESPONSE_CODE']='5XX';



}











echo safe_json_encode($response);



break;



case "get_designation":



$response=array();



if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {



  $where= array(



  "dept_id" => $_REQUEST['id'],



  "status" => 1



  );



  $myrow=$obj->fetch_all_record("designations",$where);



  if($myrow != "" && $myrow != null ) {



    $response['RESPONSE_CODE']='2XX';



    $response['DATA']=$myrow;



  } else {



    $response['RESPONSE_CODE']='5XX';



  }



} else {



  $response['RESPONSE_CODE']='5XX';



}











echo safe_json_encode($response);



break;



case "get_city":



$response=array();



if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {



  $where= array(



  "state_id" => $_REQUEST['id'],



  "status" => 1



  );



  $myrow=$obj->fetch_all_record("cities",$where);



  if($myrow != "" && $myrow != null ) {



    $response['RESPONSE_CODE']='2XX';



    $response['DATA']=$myrow;



  } else {



    $response['RESPONSE_CODE']='5XX';



  }



} else {



  $response['RESPONSE_CODE']='5XX';



}











echo safe_json_encode($response);



break;



case "get_documents_groups":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (title like '%".$searchValue."%' or



        uuid like '%".$searchValue."%' or



        status like'%".$searchValue."%' ) ";



}







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from document_groups");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from document_groups WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from document_groups WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery);



$data = array();



while ($row = mysqli_fetch_assoc($empRecords)) {



$documents='<a href="documents.php?did='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="documents.php?did='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  '<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>&nbsp;<a href="document-groups.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'document_groups\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



   $data[] = array(



      "id" => $row['id'],



      "title"=>$row['title'],



      "documents"=> $documents,



      "last_update" => $last_update,



      "status" => $sts,



      "actions" => $varact



   );







}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);







break;



case "get_categories":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (title like '%".$searchValue."%' or



        uuid like '%".$searchValue."%' or



        status like'%".$searchValue."%' ) ";



}







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from categories");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from categories WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from categories WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery);



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {



$subcategory='<a href="subcategories.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="subcategories.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  ' <a href="#modal-default" data-id="'.$row['id'].'" data-title="'.$row['title'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs open-AddBookDialog"> <i class="fa fa-eye"></i></a>&nbsp;<a href="categories.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'categories\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



   $data[] = array(



      "id" => $row['id'],



        "sno" => $sn,



      "title"=>$row['title'],



      "subcategories"=> $subcategory,



      "last_update" => $last_update,



      "status" => $sts,



      "actions" => $varact



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);







break;



case "get_standards":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (title like '%".$searchValue."%' or



        year like '%".$searchValue."%' or



        name like'%".$searchValue."%' ) ";



}







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from standards");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from standards WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from standards WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery);



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {



// $subcategory='<a href="subcategories.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="subcategories.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  '<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>&nbsp;<a href="standards.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'standards\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



   $data[] = array(



      "id" => $row['id'],



      "sno" => $sn,



      "title"=>$row['title'],



      "name"=> $row['name'],



      "year"=> '<small class="label bg-aqua1">'.$row['year'].'</small>',



      "last_update" => $last_update,



      "status" => $sts,



      "actions" => $varact



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);







break;



case "get_services":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (title like '%".$searchValue."%' or



        service_code like '%".$searchValue."%' or



        process_layouts like'%".$searchValue."%' ) ";



}



if(isset($_POST['filter_category'], $_POST['filter_subcategory']) && $_POST['filter_category'] != '' && $_POST['filter_subcategory'] != '')



{



 $searchQuery = " and category_id = '".$_POST['filter_category']."' AND subcategory_id = '".$_POST['filter_subcategory']."'";



}







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from services");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from services WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from services WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery) or die(mysqli_error($obj->con));



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {



  if($row['category_id'] !="" && $row['category_id'] != 0){



    $category=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from categories where id=".$row['category_id']));



  }



  $subcategory=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from subcategories where id=".$row['subcategory_id']));







// $subcategory='<a href="subcategories.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="subcategories.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  '<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>&nbsp;<a href="services.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRow('.$row['id'].',\'services\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;



 $medias='<a href="medias.php?sid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="medias.php?sid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



$charges=$row['charge'];



   $data[] = array(



      "id" => $row['id'],



      "sno" => $sn,



      "code" => $row['service_code'],



      "title"=>$row['title'],



      "category"=> $category['title'],



      "subcategory"=> $subcategory['title'],



      "charges"=> '<span class="text-info">Market Rate: <i class="fa fa-inr"></i> '.$charges.'</span><p class="text-success">Offer Price: <i class="fa fa-inr"></i> '.$row['offer_price'].'</p>',



      "medias"=> $medias,



      "last_update" => $last_update,



      "status" => $sts,



      "actions" => $varact



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);







break;



case "get_laboratories":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (title like '%".$searchValue."%' or



        owner_name like '%".$searchValue."%' or



          mobile like '%".$searchValue."%' or



        email like'%".$searchValue."%' ) ";



}







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from laboratories");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from laboratories WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from laboratories WHERE 1 and is_deleted = 0 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery) or die(mysqli_error($obj->con));



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {







  $services='<a href="labservices.php?lid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="labservices.php?lid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



  $reference='<a href="labreferences.php?lid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="labreferences.php?lid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$attachment='<a href="labattachments.php?lid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="labattachments.php?lid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  $row['is_deleted'] != 0 ? '<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>':'<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>&nbsp;<a href="laboratories.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;';



$varact2= $row['is_deleted'] != 0 ? '<a href="#!" onclick="javascript:restore('.$row['id'].',\'laboratories\');" class="btn btn-info btn-xs"> <i class="fa fa-undo"></i></a>':'<a href="#!" onclick="javascript:deleteThisRow('.$row['id'].',\'laboratories\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



$details='<p class="text-danger"><i class="fa fa-phone"></i> '.$row['mobile'].'</p><p class="text-primary"><i class="fa fa-envelope"></i> '.$row['email'].'</p><p class="text-success"> <i class="fa fa-globe"></i> '.$row['website'].'</p>';







   $data[] = array(



      "id" => $row['id'],



      "sno" => $sn,



      "code" => $row['labcode'],



      "title"=>$row['title'],



      "mobile"=> $details,



      "owner_name"=> $row['owner_name'],



      "services"=> $services,



      "references"=> $reference,



      "attachments"=> $attachment,



      "last_update" => $last_update,



      "status" => $sts,



      "actions" => $varact.'&nbsp;'.$varact2



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);







break;



case "get_authorities":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (title like '%".$searchValue."%' or



        owner_name like '%".$searchValue."%' or



          mobile like '%".$searchValue."%' or



        email like'%".$searchValue."%' ) ";



}







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from authorities");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from authorities WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from authorities WHERE 1 and is_deleted = 0 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery) or die(mysqli_error($obj->con));



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {







  $services='<a href="authorityservices.php?aid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="authorityservices.php?aid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



  $reference='<a href="authorityreferences.php?aid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="authorityreferences.php?aid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$attachment='<a href="authorityattachments.php?aid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="authorityattachments.php?aid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  $row['is_deleted'] != 0 ? '<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>':'<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>&nbsp;<a href="authorities.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;';



$varact2= $row['is_deleted'] != 0 ? '<a href="#!" onclick="javascript:restore('.$row['id'].',\'authorities\');" class="btn btn-info btn-xs"> <i class="fa fa-undo"></i></a>':'<a href="#!" onclick="javascript:deleteThisRow('.$row['id'].',\'authorities\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



$details='<p class="text-danger"><i class="fa fa-phone"></i> '.$row['mobile'].'</p><p class="text-primary"><i class="fa fa-envelope"></i> '.$row['email'].'</p><p class="text-success"> <i class="fa fa-globe"></i> '.$row['website'].'</p>';



   $data[] = array(



      "id" => $row['id'],



      "sno" => $sn,



      "code" => $row['authority_code'],



      "title"=>$row['title'],



      "contact_detail"=> $details,



      "owner_name"=> $row['owner_name'],



      "services"=> $services,



      "references"=> $reference,



      "attachments"=> $attachment,



      "last_update" => $last_update,



      "status" => $sts,



      "actions" => $varact.'&nbsp;'.$varact2



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);



break;



case "get_vendors":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (title like '%".$searchValue."%' or



        owner_name like '%".$searchValue."%' or



          mobile like '%".$searchValue."%' or



        email like'%".$searchValue."%' ) ";



}







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from vendors");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from vendors WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from vendors WHERE 1 and is_deleted = 0 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery) or die(mysqli_error($obj->con));



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {



$zone=mysqli_fetch_assoc(mysqli_query($obj->con,"select id,title from zones where id=".$row['zone_id']));



$zones=$zone['title'] !='' ? '<a href="zones.php?id='.$row['zone_id'].'" class="btn btn-rainbow1 btn-xs"> '.$zone['title'].'</a>' : 'No Zone Assigned';



  $services='<a href="vendorservices.php?aid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="vendorservices.php?aid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



  $reference='<a href="vendorreferences.php?aid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="vendorreferences.php?aid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$attachment='<a href="vendorattachments.php?aid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="vendorattachments.php?aid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  $row['is_deleted'] != 0 ? '<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>':' <a href="#modal-default" data-id="'.$row['id'].'" data-title="'.$row['title'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs open-AddBookDialog"> <i class="fa fa-eye"></i></a>&nbsp;<a href="vendors.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;';



$varact2= $row['is_deleted'] != 0 ? '<a href="#!" onclick="javascript:restore('.$row['id'].',\'vendors\');" class="btn btn-info btn-xs"> <i class="fa fa-undo"></i></a>':'<a href="#!" onclick="javascript:deleteThisRow('.$row['id'].',\'vendors\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;



$profile='<a class="example-image-link btn btn-warning btn-xs" href="../'.$row['file_url'].'" title="'.$row['title'].'" data-lightbox="example-1" style="margin-top:5px;"><i class="fa fa-eye"></i></a>';



$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



$details='<p class="text-danger"><i class="fa fa-phone"></i> '.$row['mobile'].'</p><p class="text-primary"><i class="fa fa-envelope"></i> '.$row['email'].'</p><p class="text-success"> <i class="fa fa-globe"></i> '.$row['website'].'</p>';



   $data[] = array(



      "id" => $row['id'],



      "sno" => $sn,



      "code" => $row['vendor_code'],



      "title"=>$row['title'],



      "zone"=>$zones,



      "image"=>$profile,



      "contact_detail"=> $details,



      "owner_name"=> $row['owner_name'],



      "services"=> $services,



      "references"=> $reference,



      "attachments"=> $attachment,



      "last_update" => $last_update,



      "status" => $sts,



      "actions" => $varact.'&nbsp;'.$varact2



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);



break;



case "get_clients":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (title like '%".$searchValue."%' or



        owner_name like '%".$searchValue."%' or



        industry like '%".$searchValue."%' or



        type like '%".$searchValue."%' or



          mobile like '%".$searchValue."%' or



        email like'%".$searchValue."%' ) ";



}







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from clients");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from clients WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from clients WHERE 1 and is_deleted = 0 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery) or die(mysqli_error($obj->con));



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {







  $followups='<a href="clientleads.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



  $reference='<a href="clientreferences.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="clientreferences.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$attachment='<a href="clientattachments.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="clientattachments.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  $row['is_deleted'] != 0 ? '<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>':' <a href="#modal-default" data-id="'.$row['id'].'" data-title="'.$row['title'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs open-AddBookDialog"> <i class="fa fa-eye"></i></a>&nbsp;<a href="clients.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;';



$varact2= $row['is_deleted'] != 0 ? '<a href="#!" onclick="javascript:restore('.$row['id'].',\'clients\');" class="btn btn-info btn-xs"> <i class="fa fa-undo"></i></a>':'<a href="#!" onclick="javascript:deleteThisRow('.$row['id'].',\'clients\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



$details='<p class="text-danger"><i class="fa fa-phone"></i> '.$row['mobile'].'</p><p class="text-primary"><i class="fa fa-envelope"></i> '.$row['email'].'</p><p class="text-success"> <i class="fa fa-globe"></i> '.$row['website'].'</p>';







   $data[] = array(



      "id" => $row['id'],



      "sno" => $sn,



      "code" => $row['client_code'],



      "title"=>$row['title'].' <p class="text-danger">'.$row['type'].'</p>',



      "mobile"=> $details,



      "owner_name"=> $row['owner_name'],



      "industry"=> $row['industry'],



      "followups"=> $followups,



      "references"=> $reference,



      "attachments"=> $attachment,



      "last_update" => $last_update,



      "status" => $sts,



      "actions" => $varact.'&nbsp;'.$varact2



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);



break;







case "get_leads":
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value
## Search
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (ref1_name like '%".$searchValue."%' or
        ref2_name like '%".$searchValue."%' or
          lead_status like '%".$searchValue."%' or
            date like '%".$searchValue."%' or
        lead_source like'%".$searchValue."%' ) ";

}


// Custom Filter start



if(isset($_POST['lead_source'], $_POST['start_date'],$_POST['sender_name'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '' && $_POST['lead_status'] != ''&& $_POST['start_date'] != '' && $_POST['sender_name'] !='' && $_POST['end_date']!="") {



 $searchQuery = " and lead_source = '".$_POST['lead_source']."' AND lead_status= '".$_POST['lead_status']."' AND  generated_by = '".$_POST['sender_name']."' AND date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'],$_POST['sender_name'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] == '0' && $_POST['lead_status'] != ''&& $_POST['start_date'] != '' && $_POST['sender_name'] !='' && $_POST['end_date']!="") {



 $searchQuery = " and lead_status= '".$_POST['lead_status']."' AND  generated_by = '".$_POST['sender_name']."' AND date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'],$_POST['sender_name'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '' && $_POST['lead_status'] != '0' && $_POST['start_date'] != '' && $_POST['sender_name'] !='' && $_POST['end_date']!="") {



 $searchQuery = " and lead_source = '".$_POST['lead_source']."' AND  generated_by = '".$_POST['sender_name']."' AND date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'],$_POST['sender_name'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '' && $_POST['lead_status'] != ''&& $_POST['start_date'] != '' && $_POST['sender_name'] !='0' && $_POST['end_date']!="") {



 $searchQuery = " and lead_source = '".$_POST['lead_source']."' AND lead_status= '".$_POST['lead_status']."' AND  date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'],$_POST['sender_name'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '0' && $_POST['lead_status'] != '0' && $_POST['start_date'] != '' && $_POST['sender_name'] !='' && $_POST['end_date']!="") {



 $searchQuery = " and  generated_by = '".$_POST['sender_name']."' AND date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'],$_POST['sender_name'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '0' && $_POST['lead_status'] != ''&& $_POST['start_date'] != '' && $_POST['sender_name'] !='0' && $_POST['end_date']!="") {



 $searchQuery = " and  lead_status= '".$_POST['lead_status']."' AND  date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'],$_POST['sender_name'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '' && $_POST['lead_status'] != '0'&& $_POST['start_date'] != '' && $_POST['sender_name'] !='0' && $_POST['end_date']!="") {



 $searchQuery = " and lead_source = '".$_POST['lead_source']."' AND date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'],$_POST['sender_name'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '0' && $_POST['lead_status'] != '0'&& $_POST['start_date'] != '' && $_POST['sender_name'] !='0' && $_POST['end_date']!="") {



 $searchQuery = " and date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}







// Custom Filter End



## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from leads");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from leads WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from leads WHERE 1 and is_deleted = 0 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery) or die(mysqli_error($obj->con));



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {



  $c=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from clients where id=".$row['client_id']));



  $pfor=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from services where id=".$row['service_id']));



  $client='<p class="text-success"> '.$c['title'].'</p><p class="text-danger">Email: '.$c['email'].'</p><p class="text-info">Mobile No: '.$c['mobile'].'</p>';



  $fcount=mysqli_fetch_assoc(mysqli_query($obj->con,"select count(*) as allcount from follow_ups where lead_id='".$row['id']."'"));



  $f=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from follow_ups where lead_id='".$row['id']."' order by id desc limit 1"));



  $generated_by=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from system_users where id='".$row['generated_by']."'"));



  $followups='<a href="followups.php?lid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="followups.php?lid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  $row['is_deleted'] != 0 ? '<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>':'<a href="#modal-default" data-id="'.$row['id'].'" data-title="'.$row['lead_code'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs open-AddBookDialog"> <i class="fa fa-eye"></i></a>&nbsp;<a href="leads.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;';



$varact2= $row['is_deleted'] != 0 ? '<a href="#!" onclick="javascript:restore('.$row['id'].',\'leads\');" class="btn btn-info btn-xs"> <i class="fa fa-undo"></i></a>':'<a href="#!" onclick="javascript:deleteThisRow('.$row['id'].',\'leads\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



$fdate=date_format(date_create($f['last_followup']),'d-M-Y');



   $data[] = array(



      "id" => $row['id'],



      "sno" => $sn,



      "code" => $row['lead_code'],



      "client"=>$client,



      "proposal_for"=>$pfor['title'],



      "lead_source"=> $row['lead_source'],



      "creation_date"=> $row['date'],



      "total_followup"=> $fcount['allcount'],



      "last_followup"=> $fdate,



      "generated_by"=> $generated_by['name'],



      "lead_status"=> '<span class="label bg-aqua1">'.$row['lead_status'].'</span>',



      "last_update" => $last_update,



      "follow_up" => $followups,



      "status" => $sts,



      "actions" => $varact.'&nbsp;'.$varact2



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);



break;



case "get_orders":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (client_name like '%".$searchValue."%' or



   email like '%".$searchValue."%' or



        mobile like '%".$searchValue."%' or



          order_status like '%".$searchValue."%' or



            service_date like '%".$searchValue."%' or



        order_type like'%".$searchValue."%' ) ";



}



// Custom Filter start



if(isset($_POST['lead_source'], $_POST['start_date'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '' && $_POST['lead_status'] != ''&& $_POST['start_date'] != '' && $_POST['end_date']!="") {



 $searchQuery = " and order_type = '".$_POST['lead_source']."' AND order_status= '".$_POST['lead_status']."' AND date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'],$_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] == '0' && $_POST['lead_status'] != ''&& $_POST['start_date'] != '' && $_POST['end_date']!="") {



 $searchQuery = " and order_status= '".$_POST['lead_status']."' AND date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '' && $_POST['lead_status'] != '0' && $_POST['start_date'] != '' && $_POST['end_date']!="") {



 $searchQuery = " and order_type = '".$_POST['lead_source']."' AND date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'],$_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '' && $_POST['lead_status'] != ''&& $_POST['start_date'] != '' && $_POST['end_date']!="") {



 $searchQuery = " and order_type = '".$_POST['lead_source']."' AND order_status= '".$_POST['lead_status']."' AND  date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '0' && $_POST['lead_status'] != '0' && $_POST['start_date'] != ''  && $_POST['end_date']!="") {



 $searchQuery = " and  date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '0' && $_POST['lead_status'] != ''&& $_POST['start_date'] != ''  && $_POST['end_date']!="") {



 $searchQuery = " and  order_status= '".$_POST['lead_status']."' AND  date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '' && $_POST['lead_status'] != '0'&& $_POST['start_date'] != '' && $_POST['end_date']!="") {



 $searchQuery = " and order_type = '".$_POST['lead_source']."' AND date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'],$_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '0' && $_POST['lead_status'] != '0'&& $_POST['start_date'] != '' && $_POST['end_date']!="") {



 $searchQuery = " and date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}







// Custom Filter End



## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from orders");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from orders WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from orders WHERE 1 and is_deleted = 0 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery) or die(mysqli_error($obj->con));



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {



  $pfor=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from services where id=".$row['service_id']));



  $client='<p class="text-success"><i class="fa fa-user"></i> '.$row['client_name'].'</p><p class="text-danger"><i class="fa fa-envelope"></i>'.$row['email'].'</p><p class="text-info"><i class="fa fa-phone"></i> '.$row['mobile'].'</p><p class="text-primary"><i class="fa fa-map-marker"></i> '.$row['address'].'</p>';



  // $fcount=mysqli_fetch_assoc(mysqli_query($obj->con,"select count(*) as allcount from follow_ups where lead_id='".$row['id']."'"));



  $zone=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from zones where id='".$row['zone_id']."'"));



  $supervisor=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from employees where id='".$row['supervised_by']."'"));



  $technician=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from employees where id='".$row['technician_id']."'"));



  $helper=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from employees where id='".$row['helper_id']."'"));

  $gen_by=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from system_users where id='".$row['generated_by']."'"));



  // $followups='<a href="followups.php?lid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="followups.php?lid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  $row['is_deleted'] != 0 ? '<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>':'<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>&nbsp;<a href="orders.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;';



$varact2= $row['is_deleted'] != 0 ? '<a href="#!" onclick="javascript:restore('.$row['id'].',\'orders\');" class="btn btn-info btn-xs"> <i class="fa fa-undo"></i></a>':'<a href="#!" onclick="javascript:deleteThisRow('.$row['id'].',\'orders\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts='<select class="form-control input-sm" onchange="javascript:updateStatus(this.value,'.$row['id'].',\'orders\')" >



             <option '.($s=isset($row['order_status']) && $row['order_status'] == "new" ?  "selected=selected" :"").' value="new">New</option>



             <option '.($s=isset($row['order_status']) && $row['order_status'] == "assigned" ?  "selected=selected" :"").' value="assigned">Assigned</option>

             <option '.($s=isset($row['order_status']) && $row['order_status'] == "ongoing" ?  "selected=selected" :"").' value="ongoing">Ongoing</option>

             <option '.($s=isset($row['order_status']) && $row['order_status'] == "completed" ?  "selected=selected" :"").' value="completed">Completed</option>



             <option '.($s=isset($row['order_status']) && $row['order_status'] == "not resolved" ?  "selected=selected" :"").' value="not resolved">Not Resolved</option>



             <option '.($s=isset($row['order_status']) && $row['order_status'] == "cancelled" ?  "selected=selected" :"").' value="cancelled">Cancelled</option>



             </select>';



$operated_by =$zone['title'].'<p class="text-success">SuperVisior:<i class="fa fa-user-secret"></i> '.$supervisor['name'].'<br/><i class="fa fa-phone"></i>'.$supervisor['mobile1'].'</p><p class="text-danger">Technician:<i class="fa fa-user"></i> '.$technician['name'].'<br/><i class="fa fa-phone"></i>'.$technician['mobile1'].'</p><p class="text-info">Helper:<i class="fa fa-user-plus"></i> '.$helper['name'].'<br/><i class="fa fa-user-phone"></i>'.$helper['mobile1'].'</p>';

$s_at =date_format(date_create($row['service_date']),'d-M-Y ');

$msg='New Order Assigned To You!%0a%0a'.$zone['title'].'%0aAssignment Date: '.$c_at.'%0aService Date: '.$s_at.'%0aOrder No: '.$row['order_code'].'%0a%0aClient Info%0a-------------------%0aName: '.$row['client_name'].'%0aMobile No: '.$row['mobile'].'%0aAddress: '.$row['address'].'%0aService: '.$pfor['title'].'%0aRemarks: '.$row['remarks'].'%0a%0aAssigned To%0a----------------------%0aSuperVisor:  '.$supervisor['name'].'--'.$supervisor['mobile1'].'%0aTechnician:  '.$technician['name'].'--'.$technician['mobile1'].'%0aHelper:  '.$helper['name'].'--'.$helper['mobile1'].'%0a%0aNOTE%0a-> Reply Accept or Reject within 15Mins.%0a-> If Accepted Contact Client within 30Mins.%0a-> Call and Report to Operational Head after Job Completed.%0a-> Ask For Invoice and Do Share with the Client. %0a%0aCredits%0aPATNA REPAIR SALES AND SERVICES';

$msg = urlencode($msg);

$share = $row['is_deleted'] != 0 ? '<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-whatsapp"></i></a>':'<a  href="javascript:PopupCenter(\'https://web.whatsapp.com/send?text='.$msg.'\',\'Share Order Details\',900,600);" data-action="share/whatsapp/share" class="btn btn-success btn-xs"> <i class="fa fa-whatsapp"></i></a>&nbsp';

// $fdate=date_format(date_create($f['last_followup']),'d-M-Y');



   $data[] = array(



      "id" => $row['id'],



      "sno" => $sn,



      "order_id" => $row['order_code'].'<p class="text-success"></br>Order Status:</p>'.$sts,



      "client"=>$client,



      "proposal_for"=>$pfor['title'].'<p class="text-danger">Offer Price: <i class="fa fa-inr"></i>'.$pfor['offer_price'].'</p>',



      "type"=> $row['order_type'],



      "service_date"=>$s_at ,



      "operated_by"=> $operated_by,



      "last_update" => $last_update,



      "actions" => '<p>Assignment: <br><a href="#modal-default" data-id="'.$row['zone_id'].'" data-oid="'.$row['id'].'" data-title="'.$row['order_code'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs assignments"> <i class="fa fa-plus"></i></a>'.$share.'</p>'.$varact.'&nbsp;'.$varact2,

      "generated_by" =>'<i class="fa fa-user"></i> '.$gen_by['name'],

   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);



break;



case "get_invoice":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (uuid like '%".$searchValue."%' or



   invoice_code like '%".$searchValue."%' or



   invoice_date like '%".$searchValue."%' or



        payment_status like '%".$searchValue."%') ";



}



// Custom Filter start



if(isset($_POST['lead_source'], $_POST['start_date'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '' && $_POST['lead_status'] != ''&& $_POST['start_date'] != '' && $_POST['end_date']!="") {



 $searchQuery = " and order_type = '".$_POST['lead_source']."' AND order_status= '".$_POST['lead_status']."' AND date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'],$_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] == '0' && $_POST['lead_status'] != ''&& $_POST['start_date'] != '' && $_POST['end_date']!="") {



 $searchQuery = " and order_status= '".$_POST['lead_status']."' AND date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '' && $_POST['lead_status'] != '0' && $_POST['start_date'] != '' && $_POST['end_date']!="") {



 $searchQuery = " and order_type = '".$_POST['lead_source']."' AND date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'],$_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '' && $_POST['lead_status'] != ''&& $_POST['start_date'] != '' && $_POST['end_date']!="") {



 $searchQuery = " and order_type = '".$_POST['lead_source']."' AND order_status= '".$_POST['lead_status']."' AND  date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '0' && $_POST['lead_status'] != '0' && $_POST['start_date'] != ''  && $_POST['end_date']!="") {



 $searchQuery = " and  date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '0' && $_POST['lead_status'] != ''&& $_POST['start_date'] != ''  && $_POST['end_date']!="") {



 $searchQuery = " and  order_status= '".$_POST['lead_status']."' AND  date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'], $_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '' && $_POST['lead_status'] != '0'&& $_POST['start_date'] != '' && $_POST['end_date']!="") {



 $searchQuery = " and order_type = '".$_POST['lead_source']."' AND date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['lead_source'], $_POST['start_date'],$_POST['end_date'],$_POST['lead_status']) && $_POST['lead_source'] != '0' && $_POST['lead_status'] != '0'&& $_POST['start_date'] != '' && $_POST['end_date']!="") {



 $searchQuery = " and date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}







// Custom Filter End



## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from invoices");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from invoices WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from invoices WHERE 1 and is_deleted = 0 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery) or die(mysqli_error($obj->con));



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {







  $ord=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from orders where id=".$row['order_id']));



  $client='<p class="text-danger font-weight-bold">Order No: '.$ord['order_code'].'</p><p class="text-success"><i class="fa fa-user"></i> '.$ord['client_name'].'</p><p class="text-danger"><i class="fa fa-envelope"></i> '.$ord['email'].'</p><p class="text-info"><i class="fa fa-phone"></i> '.$ord['mobile'].'</p><p class="text-primary"><i class="fa fa-map-marker"></i> '.$ord['address'].'</p>';



  // $fcount=mysqli_fetch_assoc(mysqli_query($obj->con,"select count(*) as allcount from follow_ups where lead_id='".$row['id']."'"));



  $zone=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from zones where id='".$ord['zone_id']."'"));



  $supervisor=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from employees where id='".$ord['supervised_by']."'"));



  $technician=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from employees where id='".$ord['technician_id']."'"));



  $helper=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from employees where id='".$ord['helper_id']."'"));



  $payments=mysqli_fetch_array(mysqli_query($obj->con,"select SUM(amount) AS 'PaidAmount' from payment_schedules where invoice_id=".$row['id']));



    $restAmount=(float)$row['txn_amount'] - (float)$payments['PaidAmount'];

    $gen_by=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from system_users where id='".$row['generated_by']."'"));



    $varact=  $row['is_deleted'] != 0 ? '<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>':'<a href="javascript:PopupCenter(\'invoice_print.php?id='.$row['id'].'\',\'Invoice Print\',900,600);" class="btn btn-success btn-xs"> <i class="fa fa-download"></i></a>&nbsp;&nbsp;<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>&nbsp;<a href="invoice.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;';



$varact2= $row['is_deleted'] != 0 ? '<a href="#!" onclick="javascript:restore('.$row['id'].',\'invoices\');" class="btn btn-info btn-xs"> <i class="fa fa-undo"></i></a>':'';



 $c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



 $u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



// $sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



$FinalCost='<p class="text-danger">Total Cost: <b><i class="fa fa-inr"></i> '.$row['txn_amount'].'</b></p><p class="text-success">Rest Amount: <b><i class="fa fa-inr"></i> '.$restAmount.'</b></p>';



$sts='<select class="form-control input-sm" onchange="javascript:updateStatus(this.value,'.$row['id'].',\'invoices\')" >



             <option '.($s=isset($row['payment_status']) && $row['payment_status'] == "not paid" ?  "selected=selected" :"").' value="not paid">Not Paid</option>



             <option '.($s=isset($row['payment_status']) && $row['payment_status'] == "paid" ?  "selected=selected" :"").' value="paid">Paid</option>



           </select>';



   $data[] = array(



      "id" => $row['id'],



      "sno" => $sn,



      "code" => $row['invoice_code'].'<p class="font-weight-bold text-danger">'.date_format(date_create($row['invoice_date']),'d-M-Y').'</p>'.$FinalCost.'<small class="label bg-green1">'.$row['payment_status'].'</small>',



      "client"=>$client,



      "operated_by"=> $zone['title'].'<p class="text-success">Supervisor:<i class="fa fa-user-secret"></i> '.$supervisor['name'].'<br/><i class="fa fa-phone"></i>'.$supervisor['mobile1'].'</p><p class="text-danger">Technician:<i class="fa fa-user"></i> '.$technician['name'].'<br/><i class="fa fa-phone"></i>'.$technician['mobile1'].'</p><p class="text-success">Helper:<i class="fa fa-user-plus"></i> '.$helper['name'].'<br/><i class="fa fa-phone"></i>'.$helper['mobile1'].'</p>',



      "last_update" => $last_update,



      "actions" =>'<p class="text-danger font-weight-bold"><a href="javascript:PopupCenter(\'payment-schedules.php?pid='.$row['id'].'\',\'Add Payments\',700,600);" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i> Payments</a></p><p>'.$sts.'</p>'.$varact.'&nbsp;'.$varact2,

  "generated_by" =>'<i class="fa fa-user"></i> '.$gen_by['name']

   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);







break;



case "get_projects":







## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (title like '%".$searchValue."%' or



        type like '%".$searchValue."%' or



          start_date like '%".$searchValue."%' or



            end_date like '%".$searchValue."%' or



        description like'%".$searchValue."%' ) ";



}







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from projects");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from projects WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from projects WHERE 1 and is_deleted = 0 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery) or die(mysqli_error($obj->con));



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {



  $c=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from clients where id=".$row['client_id']));



  $pfor=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from services where id=".$row['service_id']));



  $client='<p class="text-success"> '.$c['title'].'</p><p class="text-danger">Email: '.$c['email'].'</p><p class="text-info">Mobile No: '.$c['mobile'].'</p>';



  $attachment='<a href="projectattachments.php?pid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="projectattachments.php?pid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



  $payments=mysqli_fetch_array(mysqli_query($obj->con,"select SUM(amount) AS 'PaidAmount' from payment_schedules where project_id=".$row['id']));



  $restAmount=(float)$row['total_cost'] - (float)$payments['PaidAmount'];



  // $fcount=mysqli_fetch_assoc(mysqli_query($obj->con,"select count(*) as allcount from follow_ups where lead_id='".$row['id']."'"));



  // $f=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from follow_ups where lead_id='".$row['id']."' order by id desc limit 1"));



  // $generated_by=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from system_users where id='".$row['generated_by']."'"));



  $phases='<a href="phases.php?pid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="phases.php?pid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



  $payment_schedules='<a href="payment-schedules.php?pid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="payment-schedules.php?pid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  $row['is_deleted'] != 0 ? '<a href="#modal-default" data-id="'.$row['id'].'" data-title="'.$row['project_code'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs open-AddBookDialog"> <i class="fa fa-eye"></i></a>':'<a href="#modal-default" data-id="'.$row['id'].'" data-title="'.$row['project_code'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs open-AddBookDialog"> <i class="fa fa-eye"></i></a>&nbsp;<a href="projects.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;';



$varact2= $row['is_deleted'] != 0 ? '<a href="#!" onclick="javascript:restore('.$row['id'].',\'projects\');" class="btn btn-info btn-xs"> <i class="fa fa-undo"></i></a>':'<a href="#!" onclick="javascript:deleteThisRow('.$row['id'].',\'projects\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



 $c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



 $u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



// $fdate=date_format(date_create($f['last_followup']),'d-M-Y');



// $attachments='<p class="text-danger">Client Requirement: <a href="../'.$row['requirement_file'].'" style="cursor:pointer;" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-eye" ></i></a>&nbsp;&nbsp;<a href="../'.$row['requirement_file'].'" style="cursor:pointer;" class="btn btn-success btn-xs" download><i class="fa fa-download" ></i></a></p><p class="text-success">Proposal/ Quotation: <a href="../'.$row['quotation_file'].'" style="cursor:pointer;" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-eye" ></i></a>&nbsp;&nbsp;<a href="../'.$row['quotation_file'].'" style="cursor:pointer;" class="btn btn-success btn-xs" download><i class="fa fa-download" ></i></a></p>';



$FinalCost='<p class="text-danger">Total Cost: <b><i class="fa fa-inr"></i> '.$row['total_cost'].'</b></p><p class="text-success">Rest Amount: <b><i class="fa fa-inr"></i> '.$restAmount.'</b></p>';



   $data[] = array(



      "id" => $row['id'],



      "sno" => $sn,



      "project_code" => $row['project_code'],



      "title"=>$row['title'],



      "clients"=>$client,



      "start_date"=> date_format(date_create($row['start_date']),'d-M-Y'),



      "end_date"=> date_format(date_create($row['end_date']),'d-M-Y'),



      "total_cost"=> $FinalCost,



      "total_duration"=> $row['total_duration'].' days',



      "attachments"=> $attachment,



      "project_status"=> '<small class="label bg-warning1">'.$row['project_status'].'</small>',



      "phases"=> $phases,



      "payment_schedules" => $payment_schedules,



      "last_update" => $last_update,



      "status" => $sts,



      "actions" => $varact.'&nbsp;'.$varact2



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);



break;







case "get_expenses":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (mode like '%".$searchValue."%' or



   credited_to like '%".$searchValue."%' or



   expense_code like '%".$searchValue."%' or



        payment_date like '%".$searchValue."%' or



        transaction_id like'%".$searchValue."%' ) ";



}



// Custom Filter start



if(isset($_POST['mode'], $_POST['start_date'],$_POST['sender_name'], $_POST['end_date']) && $_POST['mode'] != '' && $_POST['start_date'] != '' && $_POST['sender_name'] !='' && $_POST['end_date']!="") {



 $searchQuery = " and mode = '".$_POST['mode']."' AND send_by = '".$_POST['sender_name']."' AND payment_date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['mode'], $_POST['start_date'],$_POST['sender_name'], $_POST['end_date']) && $_POST['mode'] == '0' && $_POST['start_date'] != '' && $_POST['sender_name'] !='' && $_POST['end_date']!="") {



 $searchQuery = " and send_by = '".$_POST['sender_name']."' AND payment_date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['mode'], $_POST['start_date'],$_POST['sender_name'], $_POST['end_date']) && $_POST['mode'] != '' && $_POST['start_date'] != '' && $_POST['sender_name'] =='0' && $_POST['end_date']!="") {



 $searchQuery = " and  mode = '".$_POST['mode']."'  AND payment_date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}



if(isset($_POST['mode'], $_POST['start_date'],$_POST['sender_name'], $_POST['end_date']) && $_POST['mode'] == '0' && $_POST['start_date'] != '' && $_POST['sender_name'] =='0' && $_POST['end_date']!="") {



 $searchQuery = " and  payment_date between '".$_POST['start_date']."' AND  '".$_POST['end_date']."'";



}







// Custom Filter End







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from expenses");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from expenses WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from expenses WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery) or die(mysqli_error($obj->con));



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {







  $sender=mysqli_fetch_assoc(mysqli_query($obj->con,"select name from system_users where id=".$row['send_by']));







// $subcategory='<a href="subcategories.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="subcategories.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  '<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>&nbsp;<a href="expenses.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>';



//'<a href="#!" onclick="javascript:deleteThisRow('.$row['id'].',\'services\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







 $attachments='<p class="text-danger"> <a href="../'.$row['file_url'].'" style="cursor:pointer;" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-eye" ></i></a>';



 // &nbsp;&nbsp;<a href="../'.$row['requirement_file'].'" style="cursor:pointer;" class="btn btn-success btn-xs" download><i class="fa fa-download" ></i></a></p><p class="text-success">Proposal/ Quotation: <a href="../'.$row['quotation_file'].'" style="cursor:pointer;" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-eye" ></i></a>&nbsp;&nbsp;<a href="../'.$row['quotation_file'].'" style="cursor:pointer;" class="btn btn-success btn-xs" download><i class="fa fa-download" ></i></a></p>';







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



// $sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



$charges=$row['amount'];



   $data[] = array(



      "id" => $row['id'],



      "sno" => $sn,



      "code" => $row['expense_code'],



      "mode"=>$row['mode'],



      "credited_to"=> $row['credited_to'],



      "amount"=> '<span class="text-info"><i class="fa fa-inr"></i> '.$charges.'</span>',



      "transaction_id"=> $row['transaction_id'],



      "file_url"=> $attachments,



      "payment_date"=> '<span class="text-success">'.date_format(date_create($row['payment_date']),'d-M-Y').'</span>',



      "description" => '<textarea class="form-control" disabled rows="4" style="width:100%;">'.$row['description'].'</textarea>',



      "last_update" => $last_update,



      "actions" => $varact



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);







break;







case "get_employees":
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value
## Search
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (name like '%".$searchValue."%' or
        emp_code like '%".$searchValue."%' or
        mobile1 like '%".$searchValue."%' or
        mobile2 like '%".$searchValue."%' or
        email like'%".$searchValue."%' ) ";
}



// Custom Filter start



if(isset($_POST['zone_id'], $_POST['dept_id'],$_POST['designation_id'], $_POST['type']) && $_POST['zone_id'] != '' && $_POST['dept_id'] != '' && $_POST['designation_id'] !='' && $_POST['type']!="") {



 $searchQuery .= " and zone_id = '".$_POST['zone_id']."' AND dept_id = '".$_POST['dept_id']."' AND designation_id ='".$_POST['designation_id']."' AND type = '".$_POST['type']."'";



}



if(isset($_POST['zone_id'], $_POST['dept_id'],$_POST['designation_id'], $_POST['type']) && $_POST['zone_id'] == '' && $_POST['dept_id'] != '' && $_POST['designation_id'] !='' && $_POST['type']!="") {



  $searchQuery .= " and  dept_id = '".$_POST['dept_id']."' AND designation_id ='".$_POST['designation_id']."' AND type = '".$_POST['type']."'";



}



if(isset($_POST['zone_id'], $_POST['dept_id'],$_POST['designation_id'], $_POST['type']) && $_POST['zone_id'] == '' && $_POST['dept_id'] != '' && $_POST['designation_id'] !='' && $_POST['type']=='') {



  $searchQuery .= " and dept_id = '".$_POST['dept_id']."' AND designation_id ='".$_POST['designation_id']."'";



}



if(isset($_POST['zone_id'], $_POST['dept_id'],$_POST['designation_id'], $_POST['type']) && $_POST['zone_id'] != '' && $_POST['dept_id'] == '' && $_POST['designation_id'] =='' && $_POST['type']=='') {



  $searchQuery .= " and zone_id = '".$_POST['zone_id']."'";



}
if(isset($_POST['zone_id'], $_POST['dept_id'],$_POST['designation_id'], $_POST['type']) && $_POST['zone_id'] != '' && $_POST['dept_id'] == '' && $_POST['designation_id'] =='' && $_POST['type']!="") {

 $searchQuery .= " and zone_id = '".$_POST['zone_id']."'  AND type = '".$_POST['type']."'";

}

if(isset($_POST['zone_id'], $_POST['dept_id'],$_POST['designation_id'], $_POST['type']) && $_POST['zone_id'] == '' && $_POST['dept_id'] == '' && $_POST['designation_id'] =='0' && $_POST['type']!="" ) {



 $searchQuery .= " and  type = '".$_POST['type']."'";



}



// Custom Filter End











## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from employees");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



if(isset($_POST['expertise']) && $_POST['expertise'] != "") {



  $sel = mysqli_query($obj->con,"select count(*) as allcount from employees RIGHT JOIN employee_expertise



  ON employees.id = employee_expertise.emp_id WHERE employee_expertise.subcategory_id=".$_POST['expertise'].$searchQuery);



  $records = mysqli_fetch_assoc($sel);



  $totalRecordwithFilter = $records['allcount'];



} else {



  $sel = mysqli_query($obj->con,"select count(*) as allcount from employees WHERE 1 ".$searchQuery);



  $records = mysqli_fetch_assoc($sel);



  $totalRecordwithFilter = $records['allcount'];



}







## Fetch records



if(isset($_POST['expertise']) && $_POST['expertise'] != "") {



  $empQuery = "select * from employees RIGHT JOIN employee_expertise



  ON employees.id = employee_expertise.emp_id WHERE 1 and employee_expertise.subcategory_id=".$_POST['expertise'].$searchQuery." order by employees.id ".$columnSortOrder." limit ".$row.",".$rowperpage;



} else {



  $empQuery = "select * from employees WHERE 1  ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



}



$empRecords = mysqli_query($obj->con, $empQuery) or die(mysqli_error($obj->con));



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {



if(isset($_POST['expertise']) && $_POST['expertise'] != "") { $row['id']=$row['emp_id'] ;}



  $zone=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from zones where id=".$row['zone_id']));



  $department=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from departments where id=".$row['dept_id']));



  $designation=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from designations where id=".$row['designation_id']));



  $skills=mysqli_query($obj->con,"select subcategory_id from employee_expertise where emp_id=".$row['id']);



  $expertise='';



  while($s=mysqli_fetch_array($skills)) {



    $ttl=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from subcategories where id=".$s['subcategory_id']));



  $expertise.='<li class="list-group-item d-flex justify-content-between align-items-center">



<b>'.$ttl['title'].'</b>



    <span class="badge bg-red badge-pill"><i class="fa fa-wrench"></i></span>



  </li>';



  }



  $reference='<a href="employeereferences.php?eid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="employeereferences.php?eid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$attachment='<a href="employeeattachments.php?eid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="employeeattachments.php?eid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  $row['is_deleted'] != 0 ? '<a href="#modal-default" data-id="'.$row['id'].'" data-title="'.$row['emp_code'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs open-AddBookDialog"> <i class="fa fa-eye"></i></a>':'<a href="#modal-default" data-id="'.$row['id'].'" data-title="'.$row['emp_code'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs open-AddBookDialog"> <i class="fa fa-eye"></i></a>&nbsp;<a href="employees.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRow('.$row['id'].',\'employees\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







 $profile='<p class="text-danger"> <a href="../'.$row['profile_pic_url'].'" style="cursor:pointer;" class="example-image-link" data-lightbox="example-1" ><img src="../'.$row['profile_pic_url'].'" class="img-responsive img-rounded" style="width:100px;height:100px;"/></a>';







$last_update='<p class="text-danger">Created At: <br/>'.$c_at.'</p> <p class="text-success">Last Update At: <br/>'.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



$details='<ul class="list-group">



              <li class="list-group-item d-flex justify-content-between align-items-center">



            <b class="">'.$row['name'].'</b>



                <span class="badge bg-red badge-pill"><i class="fa fa-user"></i></span>



              </li>



          <li class="list-group-item d-flex justify-content-between align-items-center">



          '.$row['email'].'



            <span class="badge bg-blue badge-pill"><i class="fa fa-envelope"></i></span>



          </li>



          <li class="list-group-item d-flex justify-content-between align-items-center">



          '.$row['mobile1'].'



            <span class="badge bg-purple badge-pill"><i class="fa fa-phone"></i></span>



          </li>







          <li class="list-group-item d-flex justify-content-between align-items-center">



          '.ucfirst($row['gender']).'



            <span class="badge bg-green badge-pill"><i class="fa fa-odnoklassniki"></i></span>



          </li>



          <li class="list-group-item d-flex justify-content-between align-items-center">



          '.ucfirst($row['marital_status']).'



            <span class="badge bg-purple badge-pill"><i class="fa fa-map-signs"></i></span>



          </li>



        </ul>';



        $jobs='<ul class="list-group">



                      <li class="list-group-item d-flex justify-content-between align-items-center">



                    <b class="">'.$zone['title'].'</b>



                        <span class="badge bg-red badge-pill"><i class="fa fa-map-signs"></i></span>



                      </li>



                  <li class="list-group-item d-flex justify-content-between align-items-center">



                  '.$department['title'].'



                    <span class="badge bg-blue badge-pill"><i class="fa fa-sitemap"></i></span>



                  </li>



                  <li class="list-group-item d-flex justify-content-between align-items-center">



                  '.$designation['title'].'



                    <span class="badge bg-purple badge-pill"><i class="fa fa-user"></i></span>



                  </li>



                  <li class="list-group-item d-flex justify-content-between align-items-center">



                '.date_format(date_create($row['doj']),'d-M-Y').'



                    <span class="badge bg-red badge-pill"><i class="fa fa-calendar"></i></span>



                  </li>



                  <li class="list-group-item d-flex justify-content-between align-items-center">



                   '.ucfirst($row['type']).'



                    <span class="badge bg-red badge-pill"><i class="fa fa-black-tie"></i></span>



                  </li>



                  <li class="list-group-item d-flex justify-content-between align-items-center">



                  '.ucfirst($row['shift']).'



                    <span class="badge bg-green badge-pill"><i class="fa fa-industry"></i></span>



                  </li>



                  <li class="list-group-item d-flex justify-content-between align-items-center">



                  '.ucfirst($row['job_type']).'



                    <span class="badge bg-purple badge-pill"><i class="fa fa-hourglass-1"></i></span>



                  </li>



                </ul>';



              $bank='<ul class="list-group">



                              <li class="list-group-item d-flex justify-content-between align-items-center">



                            <b class="">'.$row['bank_name'].'</b>



                                <span class="badge bg-red badge-pill"><i class="fa fa-bank"></i></span>



                              </li>



                          <li class="list-group-item d-flex justify-content-between align-items-center">



                          '.$row['branch'].'



                            <span class="badge bg-blue badge-pill"><i class="fa fa-map-signs"></i></span>



                          </li>



                          <li class="list-group-item d-flex justify-content-between align-items-center">



                          '.$row['ifsc_code'].'



                            <span class="badge bg-purple badge-pill"><i class="fa fa-ticket"></i></span>



                          </li>



                          <li class="list-group-item d-flex justify-content-between align-items-center">



                        '.$row['acc_number'].'



                            <span class="badge bg-red badge-pill"><i class="fa  fa-file-text-o"></i></span>



                          </li>



                          <li class="list-group-item d-flex justify-content-between align-items-center">



                           '.$row['upi_id'].'



                            <span class="badge bg-red badge-pill"><i class="fa fa-terminal"></i></span>



                          </li>



                          <li class="list-group-item d-flex justify-content-between align-items-center">



                          '.$row['acc_holder_name'].'



                            <span class="badge bg-green badge-pill"><i class="fa fa-user-secret"></i></span>



                          </li>



                        </ul>';



   $data[] = array(



      "id" => $row['id'],



      "sno" => $sn,



      "emp_id" => $row['emp_code'].$profile,



      "details"=>$details,



      "job_details"=> $jobs,



      "skills"=> '<ul class="list-group">'.$expertise.'</ul>',



      "status" => $last_update.$sts,



      "actions" => '<p class="text-danger">Emergency Contact: <br/>'.$reference.'</p><p class="text-success">KYC Documents: <br/>'.$attachment.'</p><p class="font-weight-bold">Action:</p>'.$varact



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);



break;



case "get_states":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (title like '%".$searchValue."%' or



        country like '%".$searchValue."%' or



        status like'%".$searchValue."%' ) ";



}







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from states");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from states WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from states WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery);



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {



 $cities='<a href="cities.php?sid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="cities.php?sid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  '<a href="states.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'states\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



   $data[] = array(



      "id" => $row['id'],



        "sno" => $sn,



      "title"=>$row['title'],



      "country"=> $row['country'],



      "cities"=> $cities,



      "last_update" => $last_update,



      "status" => $sts,



      "actions" => $varact



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);







break;



case "get_locations":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (city like '%".$searchValue."%' or



   locality like '%".$searchValue."%' or



        pincode like '%".$searchValue."%' or



        status like'%".$searchValue."%' ) ";



}







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from locations");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from locations WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from locations WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery);



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {



// $subcategory='<a href="subcategories.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="subcategories.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$st=mysqli_fetch_array(mysqli_query($obj->con,"select * from states where id=".$row['state_id']));



$city=mysqli_fetch_array(mysqli_query($obj->con,"select * from cities where id=".$row['city_id']));







$States='<p class="text-danger">Country: '.$st['country'].'</p> <p class="text-success">State: '.$st['title'].'</p>';



$locations='<p class="text-danger">Locality: '.$row['locality'].'</p> <p class="text-success">Pincode: '.$row['pincode'].'</p>';



$varact=  '<a href="locations.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'locations\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



   $data[] = array(



      "id" => $row['id'],



        "sno" => $sn,



      "city"=>$city['title'],



      "state"=> $States,



      "locations"=> $locations,



      "last_update" => $last_update,



      "status" => $sts,



      "actions" => $varact



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);







break;







case "get_zones":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (title like '%".$searchValue."%' or



   zone_code like '%".$searchValue."%' or



   manager_name like '%".$searchValue."%' or



   mobile like '%".$searchValue."%' or



   email like '%".$searchValue."%' or



        phone_no like '%".$searchValue."%' or



        status like'%".$searchValue."%' ) ";



}







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from zones");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from zones WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from zones WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery);



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {



// $subcategory='<a href="subcategories.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="subcategories.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$st=mysqli_fetch_array(mysqli_query($obj->con,"select * from cities where id=".$row['location_id']));







// $States='<p class="text-danger">Country: '.$st['country'].'</p> <p class="text-success">State: '.$st['title'].'</p>';



$locations='<p class="text-danger">City: '.$st['title'].'</p><p class="text-primary">Address: '.$row['address'].'</p>';



$varact=  '<a href="zones.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'zones\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







 $details='<p class="text-warning"><i class="fa fa-user"></i> '.$row['manager_name'].'</p><p class="text-danger"><i class="fa fa-phone"></i> '.$row['mobile'].'</p><p class="text-primary"><i class="fa fa-envelope"></i> '.$row['email'].'</p><p class="text-success"> <i class="fa fa-tty"></i> '.$row['phone_no'].'</p>';







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



   $data[] = array(



      "id" => $row['id'],



        "sno" => $sn,



        "code"=>$row['zone_code'],



      "title"=>$row['title'],



      "details"=> $details,



      "locations"=> $locations,



      "last_update" => $last_update,



      "status" => $sts,



      "actions" => $varact



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);







break;



case "get_testimonials":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (name like '%".$searchValue."%' or



        city like '%".$searchValue."%' or



        status like'%".$searchValue."%' ) ";



}







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from testimonials");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from testimonials WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from testimonials WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery);



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {



// $subcategory='<a href="subcategories.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="subcategories.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  '<a href="testimonials.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'testimonials\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







 $attachments='<p class="text-danger"> <a href="../'.$row['file_url'].'" style="cursor:pointer;" class="btn btn-primary btn-xs example-image-link" data-lightbox="example-1" ><i class="fa fa-eye" ></i></a>';







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



   $data[] = array(



      "id" => $row['id'],



        "sno" => $sn,



      "name"=>$row['name'],



      "city"=> $row['city'],



      "image"=> $attachments,



        "feedback"=> $row['description'],



      "last_update" => $last_update,



      "status" => $sts,



      "actions" => $varact



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);

break;

##Services Faqs section 
case "get_servicefaq":
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value
## Search

$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (question like '%".$searchValue."%' or
   uuid like '%".$searchValue."%' or
   
       
        status like'%".$searchValue."%' ) ";

}

## Total number of records without filtering

$sel = mysqli_query($obj->con,"select count(*) as allcount from service_faqs");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];
## Total number of record with filtering
$sel = mysqli_query($obj->con,"select count(*) as allcount from service_faqs WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
## Fetch records
 $empQuery = "select * from service_faqs WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($obj->con, $empQuery);
$data = array();
$sn=1;
while ($row = mysqli_fetch_assoc($empRecords)) {
  $service=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from services where id=".$row['service_id']));
// $subcategory='<a href="subcategories.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="subcategories.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';

//$attachments='<p class="text-danger"> <a href="../'.$row['file_url'].'" style="cursor:pointer;" class="btn btn-primary btn-xs example-image-link" data-lightbox="example-1" ><i class="fa fa-eye" ></i></a>';
$varact=  '<a href="#modal-default" data-id="'.$row['id'].'" data-title="'.$row['question'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs open-AddBookDialog"> <i class="fa fa-eye"></i></a>&nbsp;<a href="service-faqs.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'service_faqs\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';
$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');

$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;


$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';
$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';
   $data[] = array(
      "id" => $row['id'],
        "sno" => $sn,
        "question"=>$row['question'],
        "answer"=>$row['answer'],
      "service"=>$service['title'],
      "last_update" => $last_update,
      "status" => $sts,
      "actions" => $varact
   );

$sn++;
}
## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo safe_json_encode($response);
break;
##Services Faqs section End



##Start FAQS
case "get_faqs":
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value
## Search
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (question like '%".$searchValue."%' or
        uuid like '%".$searchValue."%' or
        status like'%".$searchValue."%' ) ";
}
## Total number of records without filtering
$sel = mysqli_query($obj->con,"select count(*) as allcount from faqs");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];
## Total number of record with filtering
$sel = mysqli_query($obj->con,"select count(*) as allcount from faqs WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
## Fetch records
 $empQuery = "select * from faqs WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($obj->con, $empQuery);
$data = array();
$sn=1;
while ($row = mysqli_fetch_assoc($empRecords)) {
// $subcategory='<a href="subcategories.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="subcategories.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';
//$attachments='<p class="text-danger"> <a href="../'.$row['file_url'].'" style="cursor:pointer;" class="btn btn-primary btn-xs example-image-link" data-lightbox="example-1" ><i class="fa fa-eye" ></i></a>';
$varact=  '<a href="#modal-default" data-id="'.$row['id'].'" data-title="'.$row['question'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs open-AddBookDialog"> <i class="fa fa-eye"></i></a>&nbsp;<a href="faqs.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'faqs\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';
$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');
$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;
$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';
$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';
   $data[] = array(
      "id" => $row['id'],
        "sno" => $sn,
      "question"=>$row['question'],
        "answer"=>$row['answer'],
      "last_update" => $last_update,
      "status" => $sts,
      "actions" => $varact
   );
$sn++;
}
## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,

  "aaData" => $data
);
echo safe_json_encode($response);
break;
##End FAQS
case "get_sitepages":
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value
## Search
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (title like '%".$searchValue."%' or
        uuid like '%".$searchValue."%' or
        status like'%".$searchValue."%' ) ";
}
## Total number of records without filtering
$sel = mysqli_query($obj->con,"select count(*) as allcount from site_pages");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];
## Total number of record with filtering
$sel = mysqli_query($obj->con,"select count(*) as allcount from site_pages WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
## Fetch records
 $empQuery = "select * from site_pages WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($obj->con, $empQuery);
$data = array();
$sn=1;
while ($row = mysqli_fetch_assoc($empRecords)) {
// $subcategory='<a href="subcategories.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="subcategories.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';
//$attachments='<p class="text-danger"> <a href="../'.$row['file_url'].'" style="cursor:pointer;" class="btn btn-primary btn-xs example-image-link" data-lightbox="example-1" ><i class="fa fa-eye" ></i></a>';
$varact=  '<a href="#modal-default" data-id="'.$row['id'].'" data-title="'.$row['title'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs open-AddBookDialog"> <i class="fa fa-eye"></i></a>&nbsp;<a href="site-pages.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'site_pages\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';
$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');
$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;
$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';
$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';
   $data[] = array(
      "id" => $row['id'],
        "sno" => $sn,
      "title"=>$row['title'],
        "url"=>$row['url'],
      "last_update" => $last_update,
      "status" => $sts,
      "actions" => $varact
   );
$sn++;
}
## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,

  "aaData" => $data
);
echo safe_json_encode($response);
break;
##SITE PAGES
##ENDSITE PAGES

## PROTFOLIO
case "get_portfolio":
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value
## Search

$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (title like '%".$searchValue."%' or
   uuid like '%".$searchValue."%' or
   case_studies like '%".$searchValue."%' or
	status like'%".$searchValue."%' ) ";

}

## Total number of records without filtering

$sel = mysqli_query($obj->con,"select count(*) as allcount from portfolios");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];
## Total number of record with filtering
$sel = mysqli_query($obj->con,"select count(*) as allcount from portfolios WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
## Fetch records
 $empQuery = "select * from portfolios WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($obj->con, $empQuery);
$data = array();
$sn=1;
while ($row = mysqli_fetch_assoc($empRecords)) {
$services='';
$ser=explode(",",$row['service_id']);	
	foreach( $ser as $key => $value) {
        //echo ">>".$key." = ".$value."<br>";
$s=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from services where id=".$value));     
	 $services.=$s['title'].",";
	 }
  $services=rtrim($services,",");
// $subcategory='<a href="subcategories.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="subcategories.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';

$attachments='<p class="text-danger"> <a href="../'.$row['file_url'].'" style="cursor:pointer;" class="btn btn-primary btn-xs example-image-link" data-lightbox="example-1" ><i class="fa fa-eye" ></i></a>';
$varact=  '<a href="#modal-default" data-id="'.$row['id'].'" data-title="'.$row['title'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs open-AddBookDialog"> <i class="fa fa-eye"></i></a>&nbsp;<a href="portfolios.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'portfolios\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';
$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');
$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');

$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;


$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';
$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';
   $data[] = array(
      "id" => $row['id'],
        "sno" => $sn,
        "title"=>$row['title'].'<p class="text-success"><a href="'.$row['url'].'">'.$row['url'].'</a></p>',
      "service"=>$services,
      "file_url"=> $attachments,
      "last_update" => $last_update,
      "status" => $sts,
      "actions" => $varact
   );

$sn++;
}
## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo safe_json_encode($response);
break;
## END PROTFOLIO
case "get_blog_categories":
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value
## Search
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (title like '%".$searchValue."%' or
        uuid like '%".$searchValue."%' or
        status like'%".$searchValue."%' ) ";
}
## Total number of records without filtering
$sel = mysqli_query($obj->con,"select count(*) as allcount from blog_categories");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];
## Total number of record with filtering
$sel = mysqli_query($obj->con,"select count(*) as allcount from blog_categories WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
## Fetch records
 $empQuery = "select * from blog_categories WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($obj->con, $empQuery);
$data = array();
$sn=1;
while ($row = mysqli_fetch_assoc($empRecords)) {
// $subcategory='<a href="subcategories.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="subcategories.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';
$attachments='<p class="text-danger"> <a href="../'.$row['file_url'].'" style="cursor:pointer;" class="btn btn-primary btn-xs example-image-link" data-lightbox="example-1" ><i class="fa fa-eye" ></i></a>';
$varact=  '<a href="#modal-default" data-id="'.$row['id'].'" data-title="'.$row['title'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs open-AddBookDialog"> <i class="fa fa-eye"></i></a>&nbsp;<a href="blog-categories.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'blog_categories\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';
$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');
$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;
$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';
$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';
   $data[] = array(
      "id" => $row['id'],
        "sno" => $sn,
      "title"=>$row['title'],
      "file_url"=> $attachments,
      "last_update" => $last_update,
      "status" => $sts,
      "actions" => $varact
   );
$sn++;
}
## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,

  "aaData" => $data
);
echo safe_json_encode($response);
break;

case "get_blogs":
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value
## Search

$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (title like '%".$searchValue."%' or
   uuid like '%".$searchValue."%' or
   img_title like '%".$searchValue."%' or
   permalink like '%".$searchValue."%' or
   author like '%".$searchValue."%' or
        meta_keys like '%".$searchValue."%' or
        status like'%".$searchValue."%' ) ";

}

## Total number of records without filtering

$sel = mysqli_query($obj->con,"select count(*) as allcount from blogs");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];
## Total number of record with filtering
$sel = mysqli_query($obj->con,"select count(*) as allcount from blogs WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
## Fetch records
 $empQuery = "select * from blogs WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($obj->con, $empQuery);
$data = array();
$sn=1;
while ($row = mysqli_fetch_assoc($empRecords)) {
  $category=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from blog_categories where id=".$row['category_id']));
// $subcategory='<a href="subcategories.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="subcategories.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';

$attachments='<p class="text-danger"> <a href="../'.$row['file_url'].'" style="cursor:pointer;" class="btn btn-primary btn-xs example-image-link" data-lightbox="example-1" ><i class="fa fa-eye" ></i></a>';
$varact=  ' <a href="#modal-default" data-id="'.$row['id'].'" data-title="'.$row['title'].'" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-xs open-AddBookDialog"> <i class="fa fa-eye"></i></a>&nbsp;<a href="blogs.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'blogs\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';
$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');

$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;


$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';
$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';
   $data[] = array(
      "id" => $row['id'],
        "sno" => $sn,
        "title"=>$row['title']."<p class='text-success'>By ".$row['author']."</p>",
      "category"=>$category['title'],
      "file_url"=> $attachments,
      "last_update" => $last_update,
      "status" => $sts,
      "actions" => $varact
   );

$sn++;
}
## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo safe_json_encode($response);
break;


case "get_departments":



## Read value



$draw = $_POST['draw'];



$row = $_POST['start'];



$rowperpage = $_POST['length']; // Rows display per page



$columnIndex = $_POST['order'][0]['column']; // Column index



$columnName = $_POST['columns'][$columnIndex]['data']; // Column name



$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc



$searchValue = $_POST['search']['value']; // Search value







## Search



$searchQuery = " ";



if($searchValue != ''){



   $searchQuery = " and (title like '%".$searchValue."%' or



        uuid like '%".$searchValue."%' or



        status like'%".$searchValue."%' ) ";



}







## Total number of records without filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from departments");



$records = mysqli_fetch_assoc($sel);



$totalRecords = $records['allcount'];



## Total number of record with filtering



$sel = mysqli_query($obj->con,"select count(*) as allcount from departments WHERE 1 ".$searchQuery);



$records = mysqli_fetch_assoc($sel);



$totalRecordwithFilter = $records['allcount'];







## Fetch records



 $empQuery = "select * from departments WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($obj->con, $empQuery);



$data = array();



$sn=1;



while ($row = mysqli_fetch_assoc($empRecords)) {



$designation='<a href="designations.php?did='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="designations.php?did='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';



$varact=  '<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>&nbsp;<a href="departments.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'departments\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';



$c_at= date_format(date_create($row['created_at']),'d-M-Y h:i A');



$u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y h:i A') : $c_at;







$last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';



$sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';



   $data[] = array(



      "id" => $row['id'],



        "sno" => $sn,



      "title"=>$row['title'],



      "designations"=> $designation,



      "last_update" => $last_update,



      "status" => $sts,



      "actions" => $varact



   );



$sn++;



}







## Response



$response = array(



  "draw" => intval($draw),



  "iTotalRecords" => $totalRecords,



  "iTotalDisplayRecords" => $totalRecordwithFilter,



  "aaData" => $data



);







echo safe_json_encode($response);







break;







// AjAx Part







case "get_project_records":



$finalArray=array();



$where= array(



"id" => $_REQUEST['id'],



);



$row=$obj->select_record("projects",$where);



if($row != "" && $row != null ) {



  $c=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from clients where id=".$row['client_id']));



  $services=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from services where id=".$row['service_id']));



  $finalArray['clients']=$c;



  $finalArray['services']=$services;



  $finalArray['data']=$row;



  $response['RESPONSE_CODE']='2XX';



  $response['DATA']=$finalArray;



} else {



  $response['RESPONSE_CODE']='5XX';



}











echo safe_json_encode($response);



break;



case "get_employee_records":
  $finalArray=array();
  $where= array(
  "id" => $_REQUEST['id'],
  );
  $row=$obj->select_record("employees",$where);
  if($row != "" && $row != null ) {
    $zone=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from zones where id=".$row['zone_id']));
  $department=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from departments where id=".$row['dept_id']));
  $designation=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from designations where id=".$row['designation_id']));
  $skills=mysqli_query($obj->con,"select subcategory_id from employee_expertise where emp_id=".$row['id']);
  $expertise=array();
  while($s=mysqli_fetch_array($skills)) {
    $ttl=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from subcategories where id=".$s['subcategory_id']));
    array_push($expertise,$ttl);
  }

  $references=array();
    $ref=mysqli_query($obj->con,"select * from employee_references where emp_id=".$row['id']);
    while($re=mysqli_fetch_assoc($ref)) {
      array_push($references,$re);
    }
    $attachments=array();
    $attachment=mysqli_query($obj->con,"select * from employee_attachments where emp_id=".$row['id']);
    while($ath=mysqli_fetch_assoc($attachment)) {
      array_push($attachments,$ath);
    }
        $row['designation']=$designation['title'];
        $row['department']=$department['title'];
        $row['zone']=$zone['title'];
    $finalArray['data']=$row;
    $finalArray['reference']=$references;
    $finalArray['attachment']=$attachments;
    $finalArray['expertise']=$expertise;
    $response['RESPONSE_CODE']='2XX';
    $response['DATA']=$finalArray;
  } else {
    $response['RESPONSE_CODE']='5XX';
  }
  echo safe_json_encode($response);
  break;

case "get_employees_by_zone":
$finalArray=array();
$where= array(
"id" => $_REQUEST['orderId'],
);
$row=$obj->fetch_all_record("orders",$where);
// print_r($row);

// $supervisor=mysqli_fetch_assoc(mysqli_query($obj->con,"select name from employees where id='".$row['supervised_by']."'"));

// $technician=mysqli_fetch_assoc(mysqli_query($obj->con,"select name from employees where id='".$row['technician_id']."'"));

// $helper=mysqli_fetch_assoc(mysqli_query($obj->con,"select name from employees where id='".$row['helper_id']."'"));



// echo "SELECT a.id as sid, a.name as sname, a.mobile1 as smobile, b.id as bid, b.name as tname, b.mobile1 as tmobile, c.id as cid, c.name as hname, c.mobile1 as hmobile   FROM employees a, employees b, employees c where a.id='".$row[0]['supervised_by']."' and b.id='".$row['technician_id']."' and c.id='".$row['helper_id']."'";



$operation=mysqli_fetch_assoc(mysqli_query($obj->con,"SELECT a.id as sid, a.name as sname, a.mobile1 as smobile, b.id as bid, b.name as tname, b.mobile1 as tmobile, c.id as cid, c.name as hname, c.mobile1 as hmobile   FROM employees a, employees b, employees c where a.id='".$row[0]['supervised_by']."' and b.id='".$row[0]['technician_id']."' and c.id='".$row[0]['helper_id']."'"));



// "operated_by"=> $zone['title'].'<p class="text-success">Supervisor: '.$supervisor['name'].'<br/>'.$supervisor['mobile1'].'</p><p class="text-danger">Technician: '.$technician['name'].'<br/>'.$technician['mobile1'].'</p><p class="text-success">Helper: '.$helper['name'].'<br/>'.$helper['mobile1'].'</p>',
$row['supe_name']=$operation['sname'];

$row['tech_name']=$operation['tname'];

$row['help_name']=$operation['hname'];
$finalArray['orders']=$row;
$where= array(
"zone_id" => $_REQUEST['id'],
"status" => 1,
"dept_id" => 2,
"designation_id" => 3
);
$row=$obj->fetch_all_record("employees",$where);
$finalArray['supervisor']=$row;
$where= array(
"zone_id" => $_REQUEST['id'],
"status" => 1,
"dept_id" => 2
);
$row=$obj->fetch_all_record("employees",$where);
$finalArray['technician']=$row;
$where= array(
"zone_id" => $_REQUEST['id'],
"status" => 1,
"dept_id" => 2,
"designation_id" => 10
);
$row=$obj->fetch_all_record("employees",$where);
$finalArray['helper']=$row;
$response['RESPONSE_CODE']='2XX';
$response['DATA']=$finalArray;
echo safe_json_encode($response);
break;

case "order_assignment":



$finalArray=array();



if($_REQUEST['oid'] != "") {



  $myArray= array(



      "supervised_by"=> mysqli_real_escape_string($obj->con,$_POST['sups']),



      "technician_id"=> mysqli_real_escape_string($obj->con,$_POST['techs']),



    "helper_id"=> mysqli_real_escape_string($obj->con,$_POST['helps']),



    "order_status" => 'assigned',



    "updated_at" => $datetime



    );



    $where= array("id"=> $_REQUEST['oid']);



    if($obj-> update_record("orders",$where,$myArray)) {



      $response['RESPONSE_CODE']='2XX';



      $response['DATA']="Success";



    } else {



      $response['RESPONSE_CODE']='2XX';



      $response['DATA']="Error";



    }



}



echo safe_json_encode($response);







break;
//service Faq 

case "get_servicefaq_records":
  $finalArray=array();
  $where= array(
  "id" => $_REQUEST['id'],
  );
  $row=$obj->select_record("service_faqs",$where);
  if($row != "" && $row != null ) {
    $service=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from services where id=".$row['service_id']));
  $row['services']=$service['title'];
    $finalArray['data']=$row;
   
    $response['RESPONSE_CODE']='2XX';
    $response['DATA']=$finalArray;
  } else {
    $response['RESPONSE_CODE']='5XX';
  }
  echo safe_json_encode($response);
  break;

//END Services Faqs

// Faqs
case "get_faq_records":
  $finalArray=array();
  $where= array(
  "id" => $_REQUEST['id'],
  );
  $row=$obj->select_record("faqs",$where);
  if($row != "" && $row != null ) {
   
    $finalArray['data']=$row;
   
    $response['RESPONSE_CODE']='2XX';
    $response['DATA']=$finalArray;
  } else {
    $response['RESPONSE_CODE']='5XX';
  }
  echo safe_json_encode($response);
  break;

//END  Faqs

// Site pages 
case "get_sitepages_records":
  $finalArray=array();
  $where= array(
  "id" => $_REQUEST['id'],
  );
  $row=$obj->select_record("site_pages",$where);
  if($row != "" && $row != null ) {
   
    $finalArray['data']=$row;
   
    $response['RESPONSE_CODE']='2XX';
    $response['DATA']=$finalArray;
  } else {
    $response['RESPONSE_CODE']='5XX';
  }
  echo safe_json_encode($response);
  break;


//END site pages

//Categories
case "get_categories_records":
  $finalArray=array();
  $where= array(
  "id" => $_REQUEST['id'],
  );
  $row=$obj->select_record("categories",$where);
  if($row != "" && $row != null ) {
   
    $finalArray['data']=$row;
   
    $response['RESPONSE_CODE']='2XX';
    $response['DATA']=$finalArray;
  } else {
    $response['RESPONSE_CODE']='5XX';
  }
  echo safe_json_encode($response);
  break;
//END Categories

//Blog Categories
case "get_blog_categories_records":
  $finalArray=array();
  $where= array(
  "id" => $_REQUEST['id'],
  );
  $row=$obj->select_record("blog_categories",$where);
  if($row != "" && $row != null ) {
   
    $finalArray['data']=$row;
   
    $response['RESPONSE_CODE']='2XX';
    $response['DATA']=$finalArray;
  } else {
    $response['RESPONSE_CODE']='5XX';
  }
  echo safe_json_encode($response);
  break;

// END Blog Categories

// Vendor
case "get_vendors_records":
  $finalArray=array();
  $where= array(
  "id" => $_REQUEST['id'],
  );
  $row=$obj->select_record("vendors",$where);
  if($row != "" && $row != null ) {
  
    $finalArray['data']=$row;
   
    $response['RESPONSE_CODE']='2XX';
    $response['DATA']=$finalArray;
  } else {
    $response['RESPONSE_CODE']='5XX';
  }
  echo safe_json_encode($response);
  break;
// END Vendor

// Leads
case "get_leads_records":
  $finalArray=array();
  $where= array(
  "id" => $_REQUEST['id'],
  );
  $row=$obj->select_record("leads",$where);
  if($row != "" && $row != null ) {
  
    $finalArray['data']=$row;
   
    $response['RESPONSE_CODE']='2XX';
    $response['DATA']=$finalArray;
  } else {
    $response['RESPONSE_CODE']='5XX';
  }
  echo safe_json_encode($response);
  break;
// END Leads

// Clients
case "get_clients_records":
  $finalArray=array();
  $where= array(
  "id" => $_REQUEST['id'],
  );
  $row=$obj->select_record("clients",$where);
  if($row != "" && $row != null ) {
  
    $finalArray['data']=$row;
   
    $response['RESPONSE_CODE']='2XX';
    $response['DATA']=$finalArray;
  } else {
    $response['RESPONSE_CODE']='5XX';
  }
  echo safe_json_encode($response);
  break;
// END Clients

// Blog
case "get_blog_records":
  $finalArray=array();
  $where= array(
  "id" => $_REQUEST['id'],
  );
  $row=$obj->select_record("blogs",$where);
  if($row != "" && $row != null ) {
   $category=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from blog_categories where id=".$row['category_id']));
  $row['category']=$category['title'];
    $finalArray['data']=$row;
   
    $response['RESPONSE_CODE']='2XX';
    $response['DATA']=$finalArray;
  } else {
    $response['RESPONSE_CODE']='5XX';
  }
  echo safe_json_encode($response);
  break;
// END Blog 


//Portfolio

case "get_portfolio_records":
  $finalArray=array();
  $where= array(
  "id" => $_REQUEST['id'],
  );
  $row=$obj->select_record("portfolios",$where);
  if($row != "" && $row != null ) {
   $services='';
$ser=explode(",",$row['service_id']);	
	foreach( $ser as $key => $value) {
        //echo ">>".$key." = ".$value."<br>";
$s=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from services where id=".$value));     
	 $services.=$s['title'].",";
	 }
  $services=rtrim($services,",");
  $row['services']=$services;
    $finalArray['data']=$row;
   
    $response['RESPONSE_CODE']='2XX';
    $response['DATA']=$finalArray;
  } else {
    $response['RESPONSE_CODE']='5XX';
  }
  echo safe_json_encode($response);
  break;


//END Portfolio

}



/********* USABLE FUNCTIONS*******/







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



/********* ENDS ***************/



?>
