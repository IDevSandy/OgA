<?php
session_start();
if($_SESSION['LOGIN_BY'] != "yes" ) {
    header("Location:index.php?q=session expired!");
  }
require_once('operations/dataOperation.php');
$obj = new DataOperation;
// $myArray=array(
//   "name" => 'Vishal',
//   "Age" => '21'
// );
// if( $obj -> insert_record('users',$myArray)) {
//   header("Location:index.php");
// }
/*
$myrow=$obj->fetch_record("table_name");
foreach($myrow as $row) {
echo $row['id']...
}
*/

/*
$where= array(
"id" => $id,
"key" => "12",
"name" => "king"
);
$obj->select_record("table_name",$where);
*/

/*
if(isset($_POST['edit'])) {
$id=$_POST['id'];
$where= array("id"=> $id);
$myArray= array(
"m_name"=> $_POST['name'],
"qty" => $_POST['qty']
);
if($obj-> update_record("tablename",$where,$myArray)){
header("location:index.php?msg=Record Updated Successfully");
}
}
*/
date_default_timezone_set('Asia/Kolkata');
$datetime=date("Y-m-d h:i:sa");
$action=$_REQUEST['action'] ?? "";
switch($action) {
    default:
    echo "No cases allowed! Check your query and Try Again";
    //header("Location: index.php?q=Error! No Case found!");
    echo "<p><a href='index.php'>Back</a></p>";
    break;
// Authentication Section Start
case "authentication":
$email=mysqli_real_escape_string($obj->con,$_POST['email']);
$password=mysqli_real_escape_string($obj->con,$_POST['password']);
// $q=mysqli_query($con,"select * from system_users where email='".$email."' AND password='".$password."' AND status=1") or die("Error in Authentication: ".mysqli_error($con));
$where= array(
"email" => $email,
"password" => $password,
"status" => "1"
);
$row=$obj->select_record("system_users",$where);
// var_dump($row);
// die();
if($row['id'] !="" ) {
$login_ip=$_SERVER['REMOTE_ADDR'];
$last_login=date('d-m-Y h:i:s');
$login_source= $_SERVER['HTTP_USER_AGENT'];
//    mysqli_query($con,"update system_users set login_ip='".$login_ip."',login_source='".$login_source."' where id='".$d['id']."'") or die("Error in update details");
$where= array("id"=> $row['id']);
$myArray= array(
"login_ip"=> $login_ip,
"login_source" => $login_source
);
$obj->update_record("system_users",$where,$myArray);
    $_SESSION['LOGIN_BY']="yes";
    $_SESSION['USER_ID']=$row['id'];
    $_SESSION['USER']=$row['name'];
    header("Location: home.php?q=Authentication Successful!");
} else {
    header("Location: index.php?q=Invalid Credentials!");
}
break;
case "delete_this_record":
$where= array("id"=> $_REQUEST['id']);
if($obj->delete_record($_REQUEST['tbl'],$where)) {
if($_REQUEST['tbl'] == "categories") {
$condition= array("category_id"=> $_REQUEST['id']);
$obj->delete_record("categories_documents_rel",$condition);
}
  echo 'success';
} else {
  echo 'error';
}
break;
case "products":
$uuid=gen_uuid();
  /** Add Image profile**/
  $allowed_image_extension = array(
       "png",
       "jpg",
       "jpeg"
   );

   // Get image file extension
   $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

  		$target_file="";
  						if($_FILES["source"]["name"] != "") {
                if (! in_array($file_extension, $allowed_image_extension)) {
                header("Location:products.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed");
    }    // Validate image file size
    else if (($_FILES["source"]["size"] > 2000000)) {
        header("Location:products.php?type=error&msg=Image size exceeds 2MB");
    }
  				else {
      $source="../x_images/media/";
            $target_file = $source.time().basename($_FILES["source"]["name"]);
           $target_file=str_replace(' ', '_', $target_file);
            if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))
             {
               echo "file upload failed";
             }
          }

  						}
  						else
  						{
  						  $target_file=$_POST["old-logo"];
  						}
  		/** IMAGE end**/
      $target_file=str_replace("../","",$target_file);


if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
  "title"=> mysqli_real_escape_string($obj->con,$_POST['name']),
  "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
  "status" => mysqli_real_escape_string($obj->con,$_POST['status']),
  "file_url" => $target_file,
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("products",$where,$myArray)) {
  header("location:products.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:products.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
  "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['name']),
  "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
  "status" => mysqli_real_escape_string($obj->con,$_POST['status']),
  "file_url" => $target_file,
  "created_at" => $datetime
  );
  if( $obj -> insert_record('products',$myArray)) {
    header("location:products.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:products.php?type=error&msg=Error in Saving Record!");
  }
}
break;
case "standards":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "name"=> mysqli_real_escape_string($obj->con,$_POST['name']),
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "year" => mysqli_real_escape_string($obj->con,$_POST['year']),
  "remarks" => mysqli_real_escape_string($obj->con,$_POST['remarks']),
  "status" => mysqli_real_escape_string($obj->con,$_POST['status']),
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("standards",$where,$myArray)) {
  header("location:standards.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:standards.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "name"=> mysqli_real_escape_string($obj->con,$_POST['name']),
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "year" => mysqli_real_escape_string($obj->con,$_POST['year']),
    "remarks" => mysqli_real_escape_string($obj->con,$_POST['remarks']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('standards',$myArray)) {
    header("location:standards.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:standards.php?type=error&msg=Error in Saving Record!");
  }
}
break;
case "documents":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "group_id"=> mysqli_real_escape_string($obj->con,$_POST['did']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("documents",$where,$myArray)) {
  header("location:documents.php?did=".$_POST['did']."&type=success&msg=Record Updated Successfully!");
} else {
  header("location:documents.php?did=".$_POST['did']."&type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "group_id"=> mysqli_real_escape_string($obj->con,$_POST['did']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('documents',$myArray)) {
    header("location:documents.php?did=".$_POST['did']."&type=success&msg=Record Saved Successfully!");
  } else {
    header("location:documents.php?did=".$_POST['did']."&type=error&msg=Error in Saving Record!");
  }
}
break;
case "document_groups":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("document_groups",$where,$myArray)) {
  header("location:document-groups.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:document-groups.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('document_groups',$myArray)) {
    header("location:document-groups.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:document-groups.php?type=error&msg=Error in Saving Record!");
  }
}
break;
case "categories":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("categories",$where,$myArray)) {
  header("location:categories.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:categories.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('categories',$myArray)) {
    header("location:categories.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:categories.php?type=error&msg=Error in Saving Record!");
  }
}
break;
case "subcategories":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "category_id"=> mysqli_real_escape_string($obj->con,$_POST['cid']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("subcategories",$where,$myArray)) {
  header("location:subcategories.php?cid=".$_POST['cid']."&type=success&msg=Record Updated Successfully!");
} else {
  header("location:subcategories.php?cid=".$_POST['cid']."&type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "category_id"=> mysqli_real_escape_string($obj->con,$_POST['cid']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('subcategories',$myArray)) {
    header("location:subcategories.php?cid=".$_POST['cid']."&type=success&msg=Record Saved Successfully!");
  } else {
    header("location:subcategories.php?cid=".$_POST['cid']."&type=error&msg=Error in Saving Record!");
  }
}
break;
case "services":
$uuid=gen_uuid();
  /** Add Image profile**/
  $allowed_image_extension = array(
       "png",
       "jpg",
       "jpeg"
   );

   // Get image file extension
   $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

  		$target_file="";
  						if($_FILES["source"]["name"] != "") {
                if (! in_array($file_extension, $allowed_image_extension)) {
                header("Location:services.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed");
                }    // Validate image file size
                else if (($_FILES["source"]["size"] > 2000000)) {
                    header("Location:services.php?type=error&msg=Image size exceeds 2MB");
                }
  				     else {
                 $source="../x_images/media/";
                  $target_file = $source.time().basename($_FILES["source"]["name"]);
                 $target_file=str_replace(' ', '_', $target_file);
                  if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))
                   {
                     echo "file upload failed";
                   }
          }

  		}
  						else
  						{
  						  $target_file=$_POST["old-logo"];
  						}
  		/** IMAGE end**/
      $target_file=str_replace("../","",$target_file);


if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "category_id" => $_POST['category_id'],
  "subcategory_id" => $_POST['subcategory_id'],
  "standard_id" => mysqli_real_escape_string($obj->con,$_POST['standard_id']),
  "authority_fee" => mysqli_real_escape_string($obj->con,$_POST['authority_fee']),
  "testing_fee" => mysqli_real_escape_string($obj->con,$_POST['testing_fee']),
  "consultancy_fee" => mysqli_real_escape_string($obj->con,$_POST['consultancy_fee']),
  "payment_terms" => mysqli_real_escape_string($obj->con,$_POST['payment_terms']),
  "process_layouts" => mysqli_real_escape_string($obj->con,$_POST['process_layouts']),
  "timeline" => mysqli_real_escape_string($obj->con,$_POST['timeline']),
  "status" => $_POST['status'],
  "file_url" => $target_file,
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("services",$where,$myArray)) {
    // $conditions= array("category_id"=> $_REQUEST['id']);
    // $obj->delete_record("categories_documents_rel",$conditions);
    //
    //   foreach($_POST['docs'] as $dcs) {
    //     // echo $dcs;
    //     $nArray=array(
    //       "category_id"=>$_REQUEST['id'],
    //       "document_id" => $dcs
    //         );
    //   $obj -> insert_record('categories_documents_rel',$nArray);
    // }
  header("location:services.php?type=success&msg=Record Updated Successfully!");
  } else {
  header("location:services.php?type=error&msg=Error in Updating Record!");
  }
} else {
  $myArray= array(
  "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "category_id" => $_POST['category_id'],
  "subcategory_id" => $_POST['subcategory_id'],
  "standard_id" => $_POST['standard_id'],
  "authority_fee" => mysqli_real_escape_string($obj->con,$_POST['authority_fee']),
  "testing_fee" => mysqli_real_escape_string($obj->con,$_POST['testing_fee']),
  "consultancy_fee" => mysqli_real_escape_string($obj->con,$_POST['consultancy_fee']),
  "payment_terms" => mysqli_real_escape_string($obj->con,$_POST['payment_terms']),
  "process_layouts" => mysqli_real_escape_string($obj->con,$_POST['process_layouts']),
  "timeline" => mysqli_real_escape_string($obj->con,$_POST['timeline']),
  "status" => mysqli_real_escape_string($obj->con,$_POST['status']),
  "file_url" => $target_file,
  "created_at" => $datetime
  );
  if( $obj -> insert_record('services',$myArray)) {
     // $last_id=mysqli_insert_id($obj->con);
     // if($last_id != "") {
     //   // $where= array("category_id"=> $last_id);
     //   // $obj->delete_record("categories_documents_rel",$where);
     //
     //     foreach($_POST['docs'] as $dcs) {
     //       // echo $dcs;
     //       $nArray=array(
     //         "category_id"=> $last_id,
     //         "document_id" => $dcs
     //           );
     //     $obj -> insert_record('categories_documents_rel',$nArray);
     //     }
     // }
     header("location:services.php?type=success&msg=Record Saved Successfully!");
  } else {
     header("location:services.php?type=error&msg=Error in Saving Record!");
  }
}
break;
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

?>
