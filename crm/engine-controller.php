<?php
session_start();
/*if($_SESSION['TECH_LOGIN_BY'] != "yes" ) {
    header("Location:index.php?q=session expired!");
  }*/
require_once('operations/dataOperation.php');
$obj = new DataOperation;

date_default_timezone_set('Asia/Kolkata');
$datetime=date("Y-m-d H:i:s");
$action=$_REQUEST['action'] ?? "";
switch($action) {
    default:
    echo "No cases allowed! Check your query and Try Again";
    echo "<p><a href='index.php'>Back</a></p>";
    break;
// Authentication Section Start
case "authentication":
$email=mysqli_real_escape_string($obj->con,$_POST['email']);
$password=mysqli_real_escape_string($obj->con,$_POST['password']);
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
    $_SESSION['PEL_LOGIN_BY']="yes";
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
                header("Location:products.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed");
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
/** Add Image profile**/
$allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg",
     "PNG",
     "JPG",
      "JPEG",
      "gif",
      "GIF"
 );

 // Get image file extension
 $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

    $target_file="";
            if($_FILES["source"]["name"] != "") {
              if (! in_array($file_extension, $allowed_image_extension)) {
              echo "Invalid File extension.Only jpg, jpeg and png are allowed";
                echo "<p><a href='categories.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed'>Back</a></p>";
                exit();
  }
        else {
    $source="../x_images/categories/";
          $target_file = $source.time().basename($_FILES["source"]["name"]);
          $target_file=str_replace(' ', '_', $target_file);

          if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
             echo "File upload failed".$_FILES["source"]["error"];
               echo "<p><a href='categories.php?type=error&msg=File upload failed'>Back</a></p>";
               exit();
           }
        }
      }
            else
            {
              $target_file=$_POST["old-logo"];
            }
    /** IMAGE end**/
    $target_file=str_replace("../","",$target_file);
if(isset($_POST['id']) && $_POST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "file_url" => $target_file,
    "meta_title" => mysqli_real_escape_string($obj->con,$_POST['meta_title']),
    "meta_keys" => mysqli_real_escape_string($obj->con,$_POST['meta_keys']),
    "meta_desc" => mysqli_real_escape_string($obj->con,$_POST['meta_desc']),
    "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_POST['id']);
  if($obj-> update_record("categories",$where,$myArray)) {
  header("location:categories.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:categories.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "file_url" => $target_file,
  "meta_title" => mysqli_real_escape_string($obj->con,$_POST['meta_title']),
  "meta_keys" => mysqli_real_escape_string($obj->con,$_POST['meta_keys']),
  "meta_desc" => mysqli_real_escape_string($obj->con,$_POST['meta_desc']),
  "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
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
/** Add Image profile**/
$allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg",
     "PNG",
     "JPG",
      "JPEG",
      "gif",
      "GIF"
 );

 // Get image file extension
 $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

    $target_file="";
            if($_FILES["source"]["name"] != "") {
              if (! in_array($file_extension, $allowed_image_extension)) {
              echo "Invalid File extension.Only jpg, jpeg and png are allowed";
                echo "<p><a href='categories.php?cid=".$_POST['cid']."&type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed'>Back</a></p>";
                exit();
  }
        else {
    $source="../x_images/categories/";
          $target_file = $source.time().basename($_FILES["source"]["name"]);
         $target_file=str_replace(' ', '_', $target_file);
          if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
             echo "File upload failed";
               echo "<p><a href='subcategories.php?cid=".$_POST['cid']."&type=error&msg=File upload failed'>Back</a></p>";
               exit();
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
    "file_url" => $target_file,
    "meta_title" => mysqli_real_escape_string($obj->con,$_POST['meta_title']),
    "meta_keys" => mysqli_real_escape_string($obj->con,$_POST['meta_keys']),
    "meta_desc" => mysqli_real_escape_string($obj->con,$_POST['meta_desc']),
    "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
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
  "file_url" => $target_file,
  "meta_title" => mysqli_real_escape_string($obj->con,$_POST['meta_title']),
  "meta_keys" => mysqli_real_escape_string($obj->con,$_POST['meta_keys']),
  "meta_desc" => mysqli_real_escape_string($obj->con,$_POST['meta_desc']),
  "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
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
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "custom_url"=> mysqli_real_escape_string($obj->con,strtolower($_POST['custom_url'])),
  "category_id" => $_POST['category_id'],
  "subcategory_id" => $_POST['subcategory_id'],
  "charge" => mysqli_real_escape_string($obj->con,$_POST['charge']),
  "process_layouts" => mysqli_real_escape_string($obj->con,$_POST['description']),
  "offer_price" => mysqli_real_escape_string($obj->con,$_POST['offer_price']),
  "meta_title" => mysqli_real_escape_string($obj->con,$_POST['meta_title']),
  "meta_keys" => mysqli_real_escape_string($obj->con,$_POST['meta_keys']),
  "meta_desc" => mysqli_real_escape_string($obj->con,$_POST['meta_desc']),
  "hp_status" => mysqli_real_escape_string($obj->con,$_POST['hp_status']),
  "status" => $_POST['status'],
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("services",$where,$myArray)) {

  header("location:services.php?type=success&msg=Record Updated Successfully!");
  } else {
  header("location:services.php?type=error&msg=Error in Updating Record!");
  }
} else {
  $myArray= array(
    "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "custom_url"=> mysqli_real_escape_string($obj->con,strtolower($_POST['custom_url'])),
  "category_id" => $_POST['category_id'],
  "subcategory_id" => $_POST['subcategory_id'],
  "charge" => mysqli_real_escape_string($obj->con,$_POST['charge']),
  "process_layouts" => mysqli_real_escape_string($obj->con,$_POST['process_layouts']),
  "offer_price" => mysqli_real_escape_string($obj->con,$_POST['offer_price']),
  "meta_title" => mysqli_real_escape_string($obj->con,$_POST['meta_title']),
  "meta_keys" => mysqli_real_escape_string($obj->con,$_POST['meta_keys']),
  "meta_desc" => mysqli_real_escape_string($obj->con,$_POST['meta_desc']),
  "status" => mysqli_real_escape_string($obj->con,$_POST['status']),
  "hp_status" => mysqli_real_escape_string($obj->con,$_POST['hp_status']),
  "created_at" => $datetime
  );
  if( $obj -> insert_record('services',$myArray)) {
     $last_id=mysqli_insert_id($obj->con);
     if($last_id != "") {
       $where= array("id"=> $last_id);
       $NArray=array(
         "service_code" => 'PR/Services/'.date("y").'/'.sprintf("%04d", $last_id)
       );
       $obj->update_record("services",$where,$NArray);

         }

     header("location:services.php?type=success&msg=Record Saved Successfully!");
  } else {
     header("location:services.php?type=error&msg=Error in Saving Record!");
  }
}
break;
case "laboratories":
$uuid=gen_uuid();
$mobile=$_POST['countryCode'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile']);

if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "owner_name" => mysqli_real_escape_string($obj->con,$_POST['owner_name']),
  "email" => mysqli_real_escape_string($obj->con,$_POST['email']),
  "mobile" => $mobile,
  "address" => mysqli_real_escape_string($obj->con,$_POST['address']),
  "website" => mysqli_real_escape_string($obj->con,$_POST['website']),
  "country" => mysqli_real_escape_string($obj->con,$_POST['country']),
  "state" => mysqli_real_escape_string($obj->con,$_POST['state']),
  "city" => mysqli_real_escape_string($obj->con,$_POST['city']),
  "pincode" => mysqli_real_escape_string($obj->con,$_POST['pincode']),
  "status" => $_POST['status'],
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("laboratories",$where,$myArray)) {

  header("location:laboratories.php?type=success&msg=Record Updated Successfully!");
  } else {
  header("location:laboratories.php?type=error&msg=Error in Updating Record!");
  }
} else {
  // $mobile=$_POST['countryCode']'-'mysqli_real_escape_string($obj->con,$_POST['mobile']);
  $myArray= array(
    "uuid" => $uuid,
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "owner_name" => mysqli_real_escape_string($obj->con,$_POST['owner_name']),
    "email" => mysqli_real_escape_string($obj->con,$_POST['email']),
    "mobile" => $mobile,
    "address" => mysqli_real_escape_string($obj->con,$_POST['address']),
    "website" => mysqli_real_escape_string($obj->con,$_POST['website']),
    "country" => mysqli_real_escape_string($obj->con,$_POST['country']),
    "state" => mysqli_real_escape_string($obj->con,$_POST['state']),
    "city" => mysqli_real_escape_string($obj->con,$_POST['city']),
    "pincode" => mysqli_real_escape_string($obj->con,$_POST['pincode']),
    "status" => $_POST['status'],
    "created_at" => $datetime
  );
  if( $obj -> insert_record('laboratories',$myArray)) {
     $last_id=mysqli_insert_id($obj->con);
     if($last_id != "") {
       $where= array("id"=> $last_id);
       $NArray=array(
         "labcode" => 'PR/Labs/'.date("y").'/'.sprintf("%04d", $last_id)
       );
       $obj->update_record("laboratories",$where,$NArray);

         }
     header("location:laboratories.php?type=success&msg=Record Saved Successfully!");
  } else {
     header("location:laboratories.php?type=error&msg=Error in Saving Record!");
  }
}

break;
case "lab_services":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "lab_id"=> mysqli_real_escape_string($obj->con,$_POST['lid']),
    "standard_id"=> mysqli_real_escape_string($obj->con,$_POST['standard_id']),
    "timeline"=> mysqli_real_escape_string($obj->con,$_POST['timeline']),
    "testing_charge"=> mysqli_real_escape_string($obj->con,$_POST['testing_charge']),
    "sample_size"=> mysqli_real_escape_string($obj->con,$_POST['sample_size']),
  "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("lab_services",$where,$myArray)) {
  header("location:labservices.php?lid=".$_POST['lid']."&type=success&msg=Record Updated Successfully!");
} else {
  header("location:labservices.php?lid=".$_POST['lid']."&type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "lab_id"=> mysqli_real_escape_string($obj->con,$_POST['lid']),
    "standard_id"=> mysqli_real_escape_string($obj->con,$_POST['standard_id']),
    "timeline"=> mysqli_real_escape_string($obj->con,$_POST['timeline']),
    "testing_charge"=> mysqli_real_escape_string($obj->con,$_POST['testing_charge']),
    "sample_size"=> mysqli_real_escape_string($obj->con,$_POST['sample_size']),
  "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('lab_services',$myArray)) {
    header("location:labservices.php?lid=".$_POST['lid']."&type=success&msg=Record Saved Successfully!");
  } else {
    header("location:labservices.php?lid=".$_POST['lid']."&type=error&msg=Error in Saving Record!");
  }
}
break;
case "lab_references":
$mobile1=$_POST['countryCode'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile1']);
$mobile2=$_POST['countryCode2'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile2']);

$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "name"=> mysqli_real_escape_string($obj->con,$_POST['name']),
    "lab_id"=> mysqli_real_escape_string($obj->con,$_POST['lid']),
    "designation"=> mysqli_real_escape_string($obj->con,$_POST['designation']),
    "mobile1"=> $mobile1,
    "mobile2"=> $mobile2,
    "email"=> mysqli_real_escape_string($obj->con,$_POST['email']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("lab_references",$where,$myArray)) {
  header("location:labreferences.php?lid=".$_POST['lid']."&type=success&msg=Record Updated Successfully!");
} else {
  header("location:labreferences.php?lid=".$_POST['lid']."&type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "name"=> mysqli_real_escape_string($obj->con,$_POST['name']),
    "lab_id"=> mysqli_real_escape_string($obj->con,$_POST['lid']),
    "designation"=> mysqli_real_escape_string($obj->con,$_POST['designation']),
    "mobile1"=> $mobile1,
    "mobile2"=> $mobile2,
    "email"=> mysqli_real_escape_string($obj->con,$_POST['email']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('lab_references',$myArray)) {
    header("location:labreferences.php?lid=".$_POST['lid']."&type=success&msg=Record Saved Successfully!");
  } else {
    header("location:labreferences.php?lid=".$_POST['lid']."&type=error&msg=Error in Saving Record!");
  }
}
break;
case "lab_attachments":
$uuid=gen_uuid();
  /** Add Image profile**/
  $allowed_image_extension = array(
       "png",
       "jpg",
       "jpeg",
       "pdf",
       "xls",
       "xlsx",
       "doc",
       "docx",
       "PNG",
       "JPG",
        "JPEG"
   );

   // Get image file extension
   $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

  		$target_file="";
  						if($_FILES["source"]["name"] != "") {
                if (! in_array($file_extension, $allowed_image_extension)) {
                // header("location:labattachments.php?lid=".$_POST['lid']."&type=error&msg=Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed");
                echo 'Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed';
                  echo "<p><a href='labattachments.php?lid=".$_POST['lid']."&type=error&msg=Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed.'>Back</a></p>";
                  exit();
    }    // Validate image file size
    else if (($_FILES["source"]["size"] > 20000000)) {
        // header("location:labattachments.php?lid=".$_POST['lid']."&type=error&msg=Image size exceeds 2MB");
        echo 'File size exceeds 20MB';
          echo "<p><a href='labattachments.php?lid=".$_POST['lid']."&type=error&msg=File size exceeds 20MB.'>Back</a></p>";
          exit();
    }
  				else {
      $source="../x_images/laboratory/";
            $target_file = $source.time().basename($_FILES["source"]["name"]);
           $target_file=str_replace(' ', '_', $target_file);
            if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))
             {
               echo "File upload failed";
                 echo "<p><a href='labattachments.php?lid=".$_POST['lid']."&type=error&msg=File upload failed.'>Back</a></p>";
                 exit();
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
          "lab_id"=> mysqli_real_escape_string($obj->con,$_POST['lid']),
          "remarks"=> mysqli_real_escape_string($obj->con,$_POST['remarks']),
          "status" => $_POST['status'],
          "file_url" => $target_file,
          "updated_at" => $datetime
        );
        $where= array("id"=> $_REQUEST['id']);
        if($obj-> update_record("lab_attachments",$where,$myArray)) {
        header("location:labattachments.php?lid=".$_POST['lid']."&type=success&msg=Record Updated Successfully!");
      } else {
        header("location:labattachments.php?lid=".$_POST['lid']."&type=error&msg=Error in Updating Record!");
      }
      } else {
        $myArray= array(
          "uuid" => $uuid,
          "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
          "lab_id"=> mysqli_real_escape_string($obj->con,$_POST['lid']),
          "remarks"=> mysqli_real_escape_string($obj->con,$_POST['remarks']),
          "status" => $_POST['status'],
          "file_url" => $target_file,
        "created_at" => $datetime
        );
        if( $obj -> insert_record('lab_attachments',$myArray)) {
          header("location:labattachments.php?lid=".$_POST['lid']."&type=success&msg=Record Saved Successfully!");
        } else {
          header("location:labattachments.php?lid=".$_POST['lid']."&type=error&msg=Error in Saving Record!");
        }
      }
break;
// Vendors
case "vendors":
$mobile=$_POST['countryCode'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile']);
$uuid=gen_uuid();
/** Add Image profile**/
$allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg",
     "PNG",
     "JPG",
      "JPEG"
 );

 // Get image file extension
 $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

    $target_file="";
            if($_FILES["source"]["name"] != "") {
              if (! in_array($file_extension, $allowed_image_extension)) {
              // header("location:payment_schedules.php?pid=".$_POST['pid']."&type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed");
              echo "Invalid File extension.Only jpg, jpeg and png are allowed";
                echo "<p><a href='vendors.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed'>Back</a></p>";
                exit();
  }    // Validate image file size
  // else if (($_FILES["source"]["size"] > 20000000)) {
  //     header("location:clientattachments.php?cid=".$_POST['cid']."&type=error&msg=Image size exceeds 2MB");
  // }
        else {
    $source="../x_images/vendors/";
          $target_file = $source.time().basename($_FILES["source"]["name"]);
         $target_file=str_replace(' ', '_', $target_file);
          if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
             // echo "file upload failed";
             echo "File upload failed";
               echo "<p><a href='vendors.php?type=error&msg=File upload failed'>Back</a></p>";
               exit();
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
  "owner_name" => mysqli_real_escape_string($obj->con,$_POST['owner_name']),
  "email" => mysqli_real_escape_string($obj->con,$_POST['email']),
  "mobile" => $mobile,
  "address" => mysqli_real_escape_string($obj->con,$_POST['address']),
  "website" => mysqli_real_escape_string($obj->con,$_POST['website']),
  "country" => mysqli_real_escape_string($obj->con,$_POST['country']),
  "state" => mysqli_real_escape_string($obj->con,$_POST['state']),
  "city" => mysqli_real_escape_string($obj->con,$_POST['city']),
  "pincode" => mysqli_real_escape_string($obj->con,$_POST['pincode']),
  "zone_id" => mysqli_real_escape_string($obj->con,$_POST['zone_id']),
  "file_url" => $target_file,
  "status" => $_POST['status'],
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("vendors",$where,$myArray)) {

  header("location:vendors.php?type=success&msg=Record Updated Successfully!");
  } else {
  header("location:vendors.php?type=error&msg=Error in Updating Record!");
  }
} else {
  $myArray= array(
    "uuid" => $uuid,
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "owner_name" => mysqli_real_escape_string($obj->con,$_POST['owner_name']),
    "email" => mysqli_real_escape_string($obj->con,$_POST['email']),
    "mobile" => $mobile,
    "address" => mysqli_real_escape_string($obj->con,$_POST['address']),
    "website" => mysqli_real_escape_string($obj->con,$_POST['website']),
    "country" => mysqli_real_escape_string($obj->con,$_POST['country']),
    "state" => mysqli_real_escape_string($obj->con,$_POST['state']),
    "city" => mysqli_real_escape_string($obj->con,$_POST['city']),
    "pincode" => mysqli_real_escape_string($obj->con,$_POST['pincode']),
    "zone_id" => mysqli_real_escape_string($obj->con,$_POST['zone_id']),
    "file_url" => $target_file,
    "status" => $_POST['status'],
    "created_at" => $datetime
  );
  if( $obj -> insert_record('vendors',$myArray)) {
     $last_id=mysqli_insert_id($obj->con);
     if($last_id != "") {
       $where= array("id"=> $last_id);
       $NArray=array(
         "vendor_code" => 'PR/Vendor/'.date("y").'/'.sprintf("%04d", $last_id)
       );
       $obj->update_record("vendors",$where,$NArray);

         }
     header("location:vendors.php?type=success&msg=Record Saved Successfully!");
  } else {
     header("location:vendors.php?type=error&msg=Error in Saving Record!");
  }
}

break;
case "vendor_services":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "type"=> mysqli_real_escape_string($obj->con,$_POST['type']),
    "vendor_id"=> mysqli_real_escape_string($obj->con,$_POST['aid']),
    "service_id"=> mysqli_real_escape_string($obj->con,$_POST['service_id']),
    "timeline"=> mysqli_real_escape_string($obj->con,$_POST['timeline']),
    "charge"=> mysqli_real_escape_string($obj->con,$_POST['charge']),
  "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("vendor_services",$where,$myArray)) {
  header("location:vendorservices.php?aid=".$_POST['aid']."&type=success&msg=Record Updated Successfully!");
} else {
  header("location:vendorservices.php?aid=".$_POST['aid']."&type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "type"=> mysqli_real_escape_string($obj->con,$_POST['type']),
    "vendor_id"=> mysqli_real_escape_string($obj->con,$_POST['aid']),
    "service_id"=> mysqli_real_escape_string($obj->con,$_POST['service_id']),
    "timeline"=> mysqli_real_escape_string($obj->con,$_POST['timeline']),
    "charge"=> mysqli_real_escape_string($obj->con,$_POST['charge']),
  "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('vendor_services',$myArray)) {
    header("location:vendorservices.php?aid=".$_POST['aid']."&type=success&msg=Record Saved Successfully!");
  } else {
    header("location:vendorservices.php?aid=".$_POST['aid']."&type=error&msg=Error in Saving Record!");
  }
}
break;
case "vendor_references":
$uuid=gen_uuid();
$mobile1=$_POST['countryCode'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile1']);
$mobile2=$_POST['countryCode2'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile2']);

if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "name"=> mysqli_real_escape_string($obj->con,$_POST['name']),
    "vendor_id"=> mysqli_real_escape_string($obj->con,$_POST['aid']),
    "designation"=> mysqli_real_escape_string($obj->con,$_POST['designation']),
    "mobile1"=> $mobile1,
    "mobile2"=> $mobile2,
    "email"=> mysqli_real_escape_string($obj->con,$_POST['email']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("vendor_references",$where,$myArray)) {
  header("location:vendorreferences.php?aid=".$_POST['aid']."&type=success&msg=Record Updated Successfully!");
} else {
  header("location:vendorreferences.php?aid=".$_POST['aid']."&type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "name"=> mysqli_real_escape_string($obj->con,$_POST['name']),
    "vendor_id"=> mysqli_real_escape_string($obj->con,$_POST['aid']),
    "designation"=> mysqli_real_escape_string($obj->con,$_POST['designation']),
    "mobile1"=> $mobile1,
    "mobile2"=> $mobile2,
    "email"=> mysqli_real_escape_string($obj->con,$_POST['email']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('vendor_references',$myArray)) {
    header("location:vendorreferences.php?aid=".$_POST['aid']."&type=success&msg=Record Saved Successfully!");
  } else {
    header("location:vendorreferences.php?aid=".$_POST['aid']."&type=error&msg=Error in Saving Record!");
  }
}
break;
case "vendor_attachments":
$uuid=gen_uuid();
  /** Add Image profile**/
  $allowed_image_extension = array(
       "png",
       "jpg",
       "jpeg",
       "pdf",
       "xls",
       "xlsx",
       "doc",
       "docx",
       "PNG",
       "JPG",
        "JPEG"
   );

   // Get image file extension
   $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

  		$target_file="";
  						if($_FILES["source"]["name"] != "") {
                if (! in_array($file_extension, $allowed_image_extension)) {
                // header("location:authorityattachments.php?aid=".$_POST['aid']."&type=error&msg=Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed");
                echo "Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed";
                  echo "<p><a href='vendorattachments.php?aid=".$_POST['aid']."&type=error&msg=Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed'>Back</a></p>";
                  exit();
    }    // Validate image file size
    else if (($_FILES["source"]["size"] > 20000000)) {
        // header("location:authorityattachments.php?aid=".$_POST['aid']."&type=error&msg=Image size exceeds 2MB");
        echo "File size exceeds 20MB";
          echo "<p><a href='vendorattachments.php?aid=".$_POST['aid']."&type=error&msg=File size exceeds 20MB'>Back</a></p>";
          exit();
    }
  				else {
      $source="../x_images/vendors/";
            $target_file = $source.time().basename($_FILES["source"]["name"]);
           $target_file=str_replace(' ', '_', $target_file);
            if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))
             {
               echo "File upload failed";
                 echo "<p><a href='vendorattachments.php?aid=".$_POST['aid']."&type=error&msg=File upload failed'>Back</a></p>";
                 exit();
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
          "vendor_id"=> mysqli_real_escape_string($obj->con,$_POST['aid']),
          "remarks"=> mysqli_real_escape_string($obj->con,$_POST['remarks']),
          "status" => $_POST['status'],
          "file_url" => $target_file,
          "updated_at" => $datetime
        );
        $where= array("id"=> $_REQUEST['id']);
        if($obj-> update_record("vendor_attachments",$where,$myArray)) {
        header("location:vendorattachments.php?aid=".$_POST['aid']."&type=success&msg=Record Updated Successfully!");
      } else {
        header("location:vendorattachments.php?aid=".$_POST['aid']."&type=error&msg=Error in Updating Record!");
      }
      } else {
        $myArray= array(
          "uuid" => $uuid,
          "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
          "vendor_id"=> mysqli_real_escape_string($obj->con,$_POST['aid']),
          "remarks"=> mysqli_real_escape_string($obj->con,$_POST['remarks']),
          "status" => $_POST['status'],
          "file_url" => $target_file,
        "created_at" => $datetime
        );
        if( $obj -> insert_record('vendor_attachments',$myArray)) {
          header("location:vendorattachments.php?aid=".$_POST['aid']."&type=success&msg=Record Saved Successfully!");
        } else {
          header("location:vendorattachments.php?aid=".$_POST['aid']."&type=error&msg=Error in Saving Record!");
        }
      }
break;
// Client /company
case "clients":
$mobile=$_POST['countryCode'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile']);

$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "type"=> mysqli_real_escape_string($obj->con,$_POST['type']),
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "owner_name" => mysqli_real_escape_string($obj->con,$_POST['owner_name']),
  "email" => mysqli_real_escape_string($obj->con,$_POST['email']),
  "mobile" => $mobile,
  "address" => mysqli_real_escape_string($obj->con,$_POST['address']),
  "website" => mysqli_real_escape_string($obj->con,$_POST['website']),
  "country" => mysqli_real_escape_string($obj->con,$_POST['country']),
  "state_id" => mysqli_real_escape_string($obj->con,$_POST['state_id']),
  "city_id" => mysqli_real_escape_string($obj->con,$_POST['city_id']),
  "pincode" => mysqli_real_escape_string($obj->con,$_POST['pincode']),
  "industry" => mysqli_real_escape_string($obj->con,$_POST['industry']),
  "gstin_number" => mysqli_real_escape_string($obj->con,$_POST['gstin_number']),
  "status" => $_POST['status'],
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("clients",$where,$myArray)) {

  header("location:clients.php?type=success&msg=Record Updated Successfully!");
  } else {
//  header("location:clients.php?type=error&msg=Error in Updating Record!");
  }
} else {
  $myArray= array(
    "uuid" => $uuid,
    "type"=> mysqli_real_escape_string($obj->con,$_POST['type']),
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "owner_name" => mysqli_real_escape_string($obj->con,$_POST['owner_name']),
    "email" => mysqli_real_escape_string($obj->con,$_POST['email']),
    "mobile" => $mobile,
    "address" => mysqli_real_escape_string($obj->con,$_POST['address']),
    "website" => mysqli_real_escape_string($obj->con,$_POST['website']),
    "country" => mysqli_real_escape_string($obj->con,$_POST['country']),
    "state_id" => mysqli_real_escape_string($obj->con,$_POST['state_id']),
    "city_id" => mysqli_real_escape_string($obj->con,$_POST['city_id']),
    "pincode" => mysqli_real_escape_string($obj->con,$_POST['pincode']),
    "industry" => mysqli_real_escape_string($obj->con,$_POST['industry']),
    "gstin_number" => mysqli_real_escape_string($obj->con,$_POST['gstin_number']),
    "status" => $_POST['status'],
    "created_at" => $datetime
  );
  if( $obj -> insert_record('clients',$myArray)) {
     $last_id=mysqli_insert_id($obj->con);
     if($last_id != "") {
       $where= array("id"=> $last_id);
       $NArray=array(
         "client_code" => 'PR/Clients/'.date("y").'/'.sprintf("%04d", $last_id)
       );
       $obj->update_record("clients",$where,$NArray);

         }
     header("location:clients.php?type=success&msg=Record Saved Successfully!");
  } else {
     header("location:clients.php?type=error&msg=Error in Saving Record!");
  }
}

break;
case "client_references":
$uuid=gen_uuid();
$mobile1=$_POST['countryCode'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile1']);
$mobile2=$_POST['countryCode2'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile2']);

if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "name"=> mysqli_real_escape_string($obj->con,$_POST['name']),
    "client_id"=> mysqli_real_escape_string($obj->con,$_POST['cid']),
    "designation"=> mysqli_real_escape_string($obj->con,$_POST['designation']),
    "mobile1"=> $mobile1,
    "mobile2"=> $mobile2,
    "email"=> mysqli_real_escape_string($obj->con,$_POST['email']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("client_references",$where,$myArray)) {
  header("location:clientreferences.php?cid=".$_POST['cid']."&type=success&msg=Record Updated Successfully!");
} else {
  header("location:clientreferences.php?cid=".$_POST['cid']."&type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "name"=> mysqli_real_escape_string($obj->con,$_POST['name']),
    "client_id"=> mysqli_real_escape_string($obj->con,$_POST['cid']),
    "designation"=> mysqli_real_escape_string($obj->con,$_POST['designation']),
    "mobile1"=> $mobile1,
    "mobile2"=> $mobile2,
    "email"=> mysqli_real_escape_string($obj->con,$_POST['email']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('client_references',$myArray)) {
    header("location:clientreferences.php?cid=".$_POST['cid']."&type=success&msg=Record Saved Successfully!");
  } else {
    header("location:clientreferences.php?cid=".$_POST['cid']."&type=error&msg=Error in Saving Record!");
  }
}
break;

case "client_attachments":
$uuid=gen_uuid();
  /** Add Image profile**/
  $allowed_image_extension = array(
       "png",
       "jpg",
       "jpeg",
       "pdf",
       "xls",
       "xlsx",
       "doc",
       "docx",
       "PNG",
       "JPG",
        "JPEG"
   );

   // Get image file extension
   $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

  		$target_file="";
  						if($_FILES["source"]["name"] != "") {
                if (! in_array($file_extension, $allowed_image_extension)) {
                // header("location:clientattachments.php?cid=".$_POST['cid']."&type=error&msg=Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed");
                echo "Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed";
                  echo "<p><a href='clientattachments.php?cid=".$_POST['cid']."&type=error&msg=Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed'>Back</a></p>";
                  exit();
    }    // Validate image file size
    // else if (($_FILES["source"]["size"] > 20000000)) {
    //     header("location:clientattachments.php?cid=".$_POST['cid']."&type=error&msg=Image size exceeds 2MB");
    // }
  				else {
      $source="../x_images/clients/";
            $target_file = $source.time().basename($_FILES["source"]["name"]);
           $target_file=str_replace(' ', '_', $target_file);
            if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
               echo "File upload failed";
                 echo "<p><a href='clientattachments.php?cid=".$_POST['cid']."&type=error&msg=File upload failed'>Back</a></p>";
                 exit();
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
          "client_id"=> mysqli_real_escape_string($obj->con,$_POST['cid']),
          "remarks"=> mysqli_real_escape_string($obj->con,$_POST['remarks']),
          "status" => $_POST['status'],
          "file_url" => $target_file,
          "updated_at" => $datetime
        );
        $where= array("id"=> $_REQUEST['id']);
        if($obj-> update_record("client_attachments",$where,$myArray)) {
        header("location:clientattachments.php?cid=".$_POST['cid']."&type=success&msg=Record Updated Successfully!");
      } else {
        header("location:clientattachments.php?cid=".$_POST['cid']."&type=error&msg=Error in Updating Record!");
        }
      } else {
        $myArray= array(
          "uuid" => $uuid,
          "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
          "client_id"=> mysqli_real_escape_string($obj->con,$_POST['cid']),
          "remarks"=> mysqli_real_escape_string($obj->con,$_POST['remarks']),
          "status" => $_POST['status'],
          "file_url" => $target_file,
        "created_at" => $datetime
        );
        if( $obj -> insert_record('client_attachments',$myArray)) {
          header("location:clientattachments.php?cid=".$_POST['cid']."&type=success&msg=Record Saved Successfully!");
          } else {
          header("location:clientattachments.php?cid=".$_POST['cid']."&type=error&msg=Error in Saving Record!");
        }
      }
break;
case "leads":
$mobile=$_POST['countryCode'].'-'.mysqli_real_escape_string($obj->con,$_POST['ref_mobile']);
$uuid=gen_uuid();
/** Add Image profile**/
$allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg",
     "pdf",
     "xls",
     "xlsx",
     "doc",
     "docx",
     "PNG",
     "JPG",
      "JPEG"
 );

 // Get image file extension
 $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

    $target_file="";
            if($_FILES["source"]["name"] != "") {
              if (! in_array($file_extension, $allowed_image_extension)) {
              // header("location:leads.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed");
              echo "Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed";
                echo "<p><a href='leads.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed'>Back</a></p>";
                exit();
  }    // Validate image file size
  // else if (($_FILES["source"]["size"] > 20000000)) {
  //     header("location:clientattachments.php?cid=".$_POST['cid']."&type=error&msg=Image size exceeds 2MB");
  // }
        else {
    $source="../x_images/clients/";
          $target_file = $source.time().basename($_FILES["source"]["name"]);
         $target_file=str_replace(' ', '_', $target_file);
          if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
             echo "File upload failed";
               echo "<p><a href='leads.php?type=error&msg=File upload failed'>Back</a></p>";
               exit();
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
  "date"=> mysqli_real_escape_string($obj->con,$_POST['date']),
  "lead_source" => mysqli_real_escape_string($obj->con,$_POST['lead_source']),
  "ref_name" => mysqli_real_escape_string($obj->con,$_POST['ref1_name']),
  "ref_mobile" => $mobile,
  "service_id" => mysqli_real_escape_string($obj->con,$_POST['service_id']),
  "client_id" => mysqli_real_escape_string($obj->con,$_POST['client_id']),
  "proposal_cost" => mysqli_real_escape_string($obj->con,$_POST['proposal_cost']),
  "proposal_date" => mysqli_real_escape_string($obj->con,$_POST['proposal_date']),
  "client_budget" => mysqli_real_escape_string($obj->con,$_POST['client_budget']),
  "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
  "file_url" => $target_file,
  "status" => $_POST['status'],
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("leads",$where,$myArray)) {
    if($target_file != ''){
      $myNArray= array(
        "uuid" => $uuid,
        "title"=> 'Proposal for PR/Leads/'.date("y").'/'.sprintf("%04d", $_REQUEST['id']),
        "client_id"=> mysqli_real_escape_string($obj->con,$_POST['client_id']),
        "remarks"=> 'Proposal for PR/Leads/'.date("y").'/'.sprintf("%04d", $_REQUEST['id']),
        "status" => 1,
        "file_url" => $target_file,
      "created_at" => $datetime
      );
       $obj -> insert_record('client_attachments',$myNArray);
    }

  header("location:leads.php?type=success&msg=Record Updated Successfully!");
  } else {
  header("location:leads.php?type=error&msg=Error in Updating Record!");
  }
} else {
  $myArray= array(
    "uuid" => $uuid,
    "lead_status" => 'new',
    "generated_by" => $_SESSION['USER_ID'],
    "date"=> mysqli_real_escape_string($obj->con,$_POST['date']),
    "lead_source" => mysqli_real_escape_string($obj->con,$_POST['lead_source']),
    "ref_name" => mysqli_real_escape_string($obj->con,$_POST['ref1_name']),
    "ref_mobile" => $mobile,
    "service_id" => mysqli_real_escape_string($obj->con,$_POST['service_id']),
    "client_id" => mysqli_real_escape_string($obj->con,$_POST['client_id']),
    "proposal_cost" => mysqli_real_escape_string($obj->con,$_POST['proposal_cost']),
    "proposal_date" => mysqli_real_escape_string($obj->con,$_POST['proposal_date']),
    "client_budget" => mysqli_real_escape_string($obj->con,$_POST['client_budget']),
    "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
    "file_url" => $target_file,
    "status" => $_POST['status'],
    "created_at" => $datetime
  );
  if( $obj -> insert_record('leads',$myArray)) {
     $last_id=mysqli_insert_id($obj->con);
     if($last_id != "") {
       $where= array("id"=> $last_id);
       $NArray=array(
         "lead_code" => 'PR/Leads/'.date("y").'/'.sprintf("%04d", $last_id)
       );
       $obj->update_record("leads",$where,$NArray);
      }
      // Insert into client Attachments
      if($target_file != ''){
        $myNArray= array(
          "uuid" => $uuid,
          "title"=> 'Proposal for PR/Leads/'.date("y").'/'.sprintf("%04d", $last_id),
          "client_id"=> mysqli_real_escape_string($obj->con,$_POST['client_id']),
          "remarks"=> 'Proposal for PR/Leads/'.date("y").'/'.sprintf("%04d", $last_id),
          "status" => 1,
          "file_url" => $target_file,
        "created_at" => $datetime
        );
         $obj -> insert_record('client_attachments',$myNArray);
      }

     header("location:leads.php?type=success&msg=Record Saved Successfully!");
  } else {
     header("location:leads.php?type=error&msg=Error in Saving Record!");
  }
}
break;
case "followups":
$uuid=gen_uuid();
$lid=mysqli_real_escape_string($obj->con,$_POST['lid']);
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "lead_id"=> mysqli_real_escape_string($obj->con,$_POST['lid']),
    "client_id"=> mysqli_real_escape_string($obj->con,$_POST['cid']),
    "followup_to"=> mysqli_real_escape_string($obj->con,$_POST['followup_to']),
    "mode"=> mysqli_real_escape_string($obj->con,$_POST['mode']),
    "purpose"=> mysqli_real_escape_string($obj->con,$_POST['purpose']),
    "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
    "next_followup" => mysqli_real_escape_string($obj->con,$_POST['next_followup']),
    "lead_status" => mysqli_real_escape_string($obj->con,$_POST['lead_status']),
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("follow_ups",$where,$myArray)) {
    $where= array("id"=> $lid);
    $NArray=array(
      "lead_status" => mysqli_real_escape_string($obj->con,$_POST['lead_status'])
    );
    $obj->update_record("leads",$where,$NArray);
  header("location:followups.php?lid=".$_POST['lid']."&type=success&msg=Record Updated Successfully!");
} else {
  header("location:followups.php?lid=".$_POST['lid']."&type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "lead_id"=> mysqli_real_escape_string($obj->con,$_POST['lid']),
    "client_id"=> mysqli_real_escape_string($obj->con,$_POST['cid']),
    "followup_to"=> mysqli_real_escape_string($obj->con,$_POST['followup_to']),
    "lead_status"=> mysqli_real_escape_string($obj->con,$_POST['lead_status']),
    "mode"=> mysqli_real_escape_string($obj->con,$_POST['mode']),
    "purpose"=> mysqli_real_escape_string($obj->con,$_POST['purpose']),
    "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
    "next_followup" => mysqli_real_escape_string($obj->con,$_POST['next_followup']),
    "last_followup" => date("Y-m-d"),
    "followup_by" => $_SESSION['USER_ID'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('follow_ups',$myArray)) {
    $where= array("id"=> $lid);
    $NArray=array(
      "lead_status" => mysqli_real_escape_string($obj->con,$_POST['lead_status'])
    );
    $obj->update_record("leads",$where,$NArray);
    header("location:followups.php?lid=".$_POST['lid']."&type=success&msg=Record Saved Successfully!");
  } else {
    header("location:followups.php?lid=".$_POST['lid']."&type=error&msg=Error in Saving Record!");
  }
}

break;

case "orders":
$mobile=mysqli_real_escape_string($obj->con,$_POST['mobile']);

$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "service_id"=> mysqli_real_escape_string($obj->con,$_POST['service_id']),
    "client_id"=> mysqli_real_escape_string($obj->con,$_POST['client_id']),
  "order_type"=> mysqli_real_escape_string($obj->con,$_POST['order_type']),
  "service_date" => mysqli_real_escape_string($obj->con,$_POST['service_date']),
  "remarks" => mysqli_real_escape_string($obj->con,$_POST['remarks']),
  "client_name" => mysqli_real_escape_string($obj->con,$_POST['name']),
  "email" => mysqli_real_escape_string($obj->con,$_POST['email']),
  "mobile" => $mobile,
  "address" => mysqli_real_escape_string($obj->con,$_POST['address']),
  "zone_id" => mysqli_real_escape_string($obj->con,$_POST['zone_id']),
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("orders",$where,$myArray)) {

  header("location:orders.php?type=success&msg=Record Updated Successfully!");
  } else {
  header("location:orders.php?type=error&msg=Error in Updating Record!");
  }
} else {
  $myArray= array(
    "uuid" => $uuid,
    "service_id"=> mysqli_real_escape_string($obj->con,$_POST['service_id']),
    "client_id"=> mysqli_real_escape_string($obj->con,$_POST['client_id']),
  "order_type"=> mysqli_real_escape_string($obj->con,$_POST['order_type']),
  "service_date" => mysqli_real_escape_string($obj->con,$_POST['service_date']),
  "remarks" => mysqli_real_escape_string($obj->con,$_POST['remarks']),
  "client_name" => mysqli_real_escape_string($obj->con,$_POST['name']),
  "email" => mysqli_real_escape_string($obj->con,$_POST['email']),
  "mobile" => $mobile,
  "address" => mysqli_real_escape_string($obj->con,$_POST['address']),
   "zone_id" => mysqli_real_escape_string($obj->con,$_POST['zone_id']),
    "order_status" =>'new',
    "generated_by" => $_SESSION['USER_ID'],
    "created_at" => $datetime
  );
  if( $obj -> insert_record('orders',$myArray)) {
     $last_id=mysqli_insert_id($obj->con);
     if($last_id != "") {
       $where= array("id"=> $last_id);
       $day=date("z")+1;
       $NArray=array(
         "order_code" => 'ORD'.sprintf("%04d", $last_id).'PR'.date("y").$day.'-'.$_POST['client_id']
       );
       $obj->update_record("orders",$where,$NArray);

         }
     header("location:orders.php?type=success&msg=Record Saved Successfully!");
  } else {
     header("location:orders.php?type=error&msg=Error in Saving Record!");
  }
}

break;
case "invoice":
// $order_id=mysqli_real_escape_string($obj->con,$_POST['order_id']);

$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "uuid" => $uuid,
    "order_id"=> mysqli_real_escape_string($obj->con,$_POST['order_id']),
  "amount"=> mysqli_real_escape_string($obj->con,$_POST['subtotal_amt']),
  "invoice_date" => mysqli_real_escape_string($obj->con,$_POST['invoice_date']),
  "discount" => mysqli_real_escape_string($obj->con,$_POST['discount']),
  "txn_amount" => mysqli_real_escape_string($obj->con,$_POST['grand_total']),
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("invoices",$where,$myArray)) {
    $condition= array("invoice_id"=> $_REQUEST['id']);
    $obj->delete_record("invoice_items",$condition);
    for($i=0;$i < sizeof($_POST["service_id"]);$i++) {
      $nArray=array(
        "uuid" => gen_uuid(),
        "order_id"=> mysqli_real_escape_string($obj->con,$_POST['order_id']),
        "invoice_id"=>$_REQUEST['id'],
        "service_id" => $_POST['service_id'][$i],
        "quantity" => $_POST['qty'][$i],
        "charge" => $_POST['charge'][$i],
        "offer_price" => $_POST['offer_price'][$i],
        "subtotal" => $_POST['subtotal'][$i]
          );
    $obj -> insert_record('invoice_items',$nArray);
    }
  header("location:invoice.php?type=success&msg=Record Updated Successfully!");
  } else {
  header("location:invoice.php?type=error&msg=Error in Updating Record!");
  }
} else {
  $myArray= array(
    "uuid" => $uuid,
    "order_id"=> mysqli_real_escape_string($obj->con,$_POST['order_id']),
  "amount"=> mysqli_real_escape_string($obj->con,$_POST['subtotal_amt']),
  "invoice_date" => mysqli_real_escape_string($obj->con,$_POST['invoice_date']),
  "discount" => mysqli_real_escape_string($obj->con,$_POST['discount']),
  "txn_amount" => mysqli_real_escape_string($obj->con,$_POST['grand_total']),
  "generated_by" => $_SESSION['USER_ID'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('invoices',$myArray)) {
     $last_id=mysqli_insert_id($obj->con);
     if($last_id != "") {
       $where= array("id"=> $last_id);
       $NArray=array(
         "invoice_code" => 'PR/Inv/'.date("y").'/'.sprintf("%04d", $last_id)
       );
       $obj->update_record("invoices",$where,$NArray);

       for($i=0;$i < sizeof($_POST["service_id"]);$i++) {
         $nArray=array(
           "uuid" => gen_uuid(),
           "order_id"=> mysqli_real_escape_string($obj->con,$_POST['order_id']),
           "invoice_id"=>$last_id,
           "service_id" => trim($_POST['service_id'][$i]),
           "quantity" => trim($_POST['qty'][$i]),
           "charge" => trim($_POST['charge'][$i]),
           "offer_price" => trim($_POST['offer_price'][$i]),
           "subtotal" => trim($_POST['subtotal'][$i])
             );
       $obj -> insert_record('invoice_items',$nArray);
       }
       // die();
         }
     header("location:invoice.php?type=success&msg=Record Saved Successfully!");
  } else {
     header("location:invoice.php?type=error&msg=Error in Saving Record!");
  }
}

break;
case "projects":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "lead_id" => mysqli_real_escape_string($obj->con,$_POST['lead_id']),
  "service_id" => mysqli_real_escape_string($obj->con,$_POST['service_id']),
  "client_id" => mysqli_real_escape_string($obj->con,$_POST['client_id']),
  "start_date" => mysqli_real_escape_string($obj->con,$_POST['start_date']),
  "end_date" => mysqli_real_escape_string($obj->con,$_POST['end_date']),
  "total_cost" => mysqli_real_escape_string($obj->con,$_POST['total_cost']),
  "total_duration" => mysqli_real_escape_string($obj->con,$_POST['total_duration']),
  "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
  "payment_terms" => mysqli_real_escape_string($obj->con,$_POST['payment_terms']),
  "status" => $_POST['status'],
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("projects",$where,$myArray)) {
    // if($target_file != ''){
    //   $myNArray= array(
    //     "uuid" => $uuid,
    //     "title"=> 'Proposal for PR/Leads/'.date("y").'/'.sprintf("%04d", $_REQUEST['id']),
    //     "client_id"=> mysqli_real_escape_string($obj->con,$_POST['client_id']),
    //     "remarks"=> 'Proposal for PR/Leads/'.date("y").'/'.sprintf("%04d", $_REQUEST['id']),
    //     "status" => 1,
    //     "file_url" => $target_file,
    //   "created_at" => $datetime
    //   );
    //    $obj -> insert_record('client_attachments',$myNArray);
    // }

  header("location:projects.php?type=success&msg=Record Updated Successfully!");
  } else {
  header("location:projects.php?type=error&msg=Error in Updating Record!");
  }
} else {
  $myArray= array(
    "uuid" => $uuid,
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "lead_id" => mysqli_real_escape_string($obj->con,$_POST['lead_id']),
    "service_id" => mysqli_real_escape_string($obj->con,$_POST['service_id']),
    "client_id" => mysqli_real_escape_string($obj->con,$_POST['client_id']),
    "start_date" => mysqli_real_escape_string($obj->con,$_POST['start_date']),
    "end_date" => mysqli_real_escape_string($obj->con,$_POST['end_date']),
    "total_cost" => mysqli_real_escape_string($obj->con,$_POST['total_cost']),
    "total_duration" => mysqli_real_escape_string($obj->con,$_POST['total_duration']),
    "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
    "payment_terms" => mysqli_real_escape_string($obj->con,$_POST['payment_terms']),
    "project_status" => 'new',
    "status" => $_POST['status'],
    "created_at" => $datetime
  );
  if( $obj -> insert_record('projects',$myArray)) {
     $last_id=mysqli_insert_id($obj->con);
     if($last_id != "") {
       $where= array("id"=> $last_id);
       $NArray=array(
         "project_code" => 'PR/Projects/'.date("y").'/'.sprintf("%04d", $last_id)
       );
       $obj->update_record("projects",$where,$NArray);
      }
     header("location:projects.php?type=success&msg=Record Saved Successfully!");
  } else {
     header("location:projects.php?type=error&msg=Error in Saving Record!");
  }
}
break;

case "phases":
$uuid=gen_uuid();
$pid=mysqli_real_escape_string($obj->con,$_POST['pid']);
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "project_id"=> mysqli_real_escape_string($obj->con,$_POST['pid']),
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
    "start_date" => mysqli_real_escape_string($obj->con,$_POST['start_date']),
    "end_date" => mysqli_real_escape_string($obj->con,$_POST['end_date']),
      "project_status" => mysqli_real_escape_string($obj->con,$_POST['project_status']),
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("phases",$where,$myArray)) {
    $where= array("id"=> $pid);
    $NArray=array(
      "project_status" => mysqli_real_escape_string($obj->con,$_POST['project_status'])
    );
    $obj->update_record("projects",$where,$NArray);
  header("location:phases.php?pid=".$_POST['pid']."&type=success&msg=Record Updated Successfully!");
} else {
  header("location:phases.php?pid=".$_POST['pid']."&type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "project_id"=> mysqli_real_escape_string($obj->con,$_POST['pid']),
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
    "start_date" => mysqli_real_escape_string($obj->con,$_POST['start_date']),
    "end_date" => mysqli_real_escape_string($obj->con,$_POST['end_date']),
    "project_status" => mysqli_real_escape_string($obj->con,$_POST['project_status']),
  "created_at" => $datetime
  );
  if( $obj -> insert_record('phases',$myArray)) {
    $where= array("id"=> $pid);
    $NArray=array(
      "project_status" => mysqli_real_escape_string($obj->con,$_POST['project_status'])
    );
    $obj->update_record("projects",$where,$NArray);
    header("location:phases.php?pid=".$_POST['pid']."&type=success&msg=Record Saved Successfully!");
  } else {
    header("location:phases.php?pid=".$_POST['pid']."&type=error&msg=Error in Saving Record!");
  }
}

break;
case "project_attachments":
$uuid=gen_uuid();
  /** Add Image profile**/
  $allowed_image_extension = array(
       "png",
       "jpg",
       "jpeg",
       "pdf",
       "xls",
       "xlsx",
       "doc",
       "docx",
       "PNG",
       "JPG",
        "JPEG"
   );

   // Get image file extension
   $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

  		$target_file="";
  						if($_FILES["source"]["name"] != "") {
                if (! in_array($file_extension, $allowed_image_extension)) {
                // header("location:projectattachments.php?pid=".$_POST['pid']."&type=error&msg=Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed");
                echo "Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed";
                  echo "<p><a href='projectattachments.php?pid=".$_POST['pid']."&type=error&msg=Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed'>Back</a></p>";
                  exit();
    }    // Validate image file size
    // else if (($_FILES["source"]["size"] > 20000000)) {
    //     header("location:clientattachments.php?cid=".$_POST['cid']."&type=error&msg=Image size exceeds 2MB");
    // }
  				else {
      $source="../x_images/projects/";
            $target_file = $source.time().basename($_FILES["source"]["name"]);
           $target_file=str_replace(' ', '_', $target_file);
            if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
              echo "File upload failed";
                echo "<p><a href='projectattachments.php?pid=".$_POST['pid']."&type=error&msg=File upload failed'>Back</a></p>";
                exit();
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
          "project_id"=> mysqli_real_escape_string($obj->con,$_POST['pid']),
          "remarks"=> mysqli_real_escape_string($obj->con,$_POST['remarks']),
          "status" => $_POST['status'],
          "file_url" => $target_file,
          "updated_at" => $datetime
        );
        $where= array("id"=> $_REQUEST['id']);
        if($obj-> update_record("project_attachments",$where,$myArray)) {
        header("location:projectattachments.php?pid=".$_POST['pid']."&type=success&msg=Record Updated Successfully!");
      } else {
        header("location:projectattachments.php?pid=".$_POST['pid']."&type=error&msg=Error in Updating Record!");
        }
      } else {
        $myArray= array(
          "uuid" => $uuid,
          "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
          "project_id"=> mysqli_real_escape_string($obj->con,$_POST['pid']),
          "remarks"=> mysqli_real_escape_string($obj->con,$_POST['remarks']),
          "status" => $_POST['status'],
          "file_url" => $target_file,
        "created_at" => $datetime
        );
        if( $obj -> insert_record('project_attachments',$myArray)) {
          header("location:projectattachments.php?pid=".$_POST['pid']."&type=success&msg=Record Saved Successfully!");
          } else {
          header("location:projectattachments.php?pid=".$_POST['pid']."&type=error&msg=Error in Saving Record!");
        }
      }
break;
case "payment_schedules":
$uuid=gen_uuid();
  /** Add Image profile**/
  $allowed_image_extension = array(
       "png",
       "jpg",
       "jpeg",
       "PNG",
       "JPG",
        "JPEG"
   );

   // Get image file extension
   $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

  		$target_file="";
  						if($_FILES["source"]["name"] != "") {
                if (! in_array($file_extension, $allowed_image_extension)) {
                // header("location:payment_schedules.php?pid=".$_POST['pid']."&type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed");
                echo "Invalid File extension.Only jpg, jpeg and png are allowed";
                  echo "<p><a href='payment_schedules.php?pid=".$_POST['pid']."&type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed'>Back</a></p>";
                  exit();
    }    // Validate image file size
    // else if (($_FILES["source"]["size"] > 20000000)) {
    //     header("location:clientattachments.php?cid=".$_POST['cid']."&type=error&msg=Image size exceeds 2MB");
    // }
  				else {
      $source="../x_images/payments/";
            $target_file = $source.time().basename($_FILES["source"]["name"]);
           $target_file=str_replace(' ', '_', $target_file);
            if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
               // echo "file upload failed";
               echo "File upload failed";
                 echo "<p><a href='payment_schedules.php?pid=".$_POST['pid']."&type=error&msg=File upload failed'>Back</a></p>";
                 exit();
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
          "mode"=> mysqli_real_escape_string($obj->con,$_POST['mode']),
          "invoice_id"=> mysqli_real_escape_string($obj->con,$_POST['pid']),
          "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
          "credited_to"=> mysqli_real_escape_string($obj->con,$_POST['credited_to']),
          "received_by"=> $_SESSION['USER_ID'],
          "amount"=> mysqli_real_escape_string($obj->con,$_POST['amount']),
          "transaction_id"=> mysqli_real_escape_string($obj->con,$_POST['transaction_id']),
          "payment_date"=> mysqli_real_escape_string($obj->con,$_POST['payment_date']),
          "next_payment_date"=> mysqli_real_escape_string($obj->con,$_POST['next_payment_date']),
          "file_url" => $target_file,
          "updated_at" => $datetime
        );
        $where= array("id"=> $_REQUEST['id']);
        if($obj-> update_record("payment_schedules",$where,$myArray)) {
          $myNArray= array(
            "mode"=> mysqli_real_escape_string($obj->con,$_POST['mode']),
            "invoice_id"=> mysqli_real_escape_string($obj->con,$_POST['pid']),
            "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
            "credited_to"=> mysqli_real_escape_string($obj->con,$_POST['credited_to']),
            "received_by"=> $_SESSION['USER_ID'],
            "amount"=> mysqli_real_escape_string($obj->con,$_POST['amount']),
            "transaction_id"=> mysqli_real_escape_string($obj->con,$_POST['transaction_id']),
            "payment_date"=> mysqli_real_escape_string($obj->con,$_POST['payment_date']),
            "next_payment_date"=> mysqli_real_escape_string($obj->con,$_POST['next_payment_date']),
            "file_url" => $target_file,
          "created_at" => $datetime
          );
           $obj -> insert_record('pay_history',$myNArray);
        header("location:payment-schedules.php?pid=".$_POST['pid']."&type=success&msg=Record Updated Successfully!");
      } else {
        header("location:payment-schedules.php?pid=".$_POST['pid']."&type=error&msg=Error in Updating Record!");
        }
      } else {
        $myArray= array(
          "uuid" => $uuid,
          "mode"=> mysqli_real_escape_string($obj->con,$_POST['mode']),
          "invoice_id"=> mysqli_real_escape_string($obj->con,$_POST['pid']),
          "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
          "credited_to"=> mysqli_real_escape_string($obj->con,$_POST['credited_to']),
          "received_by"=> $_SESSION['USER_ID'],
          "transaction_id"=> mysqli_real_escape_string($obj->con,$_POST['transaction_id']),
          "amount"=> mysqli_real_escape_string($obj->con,$_POST['amount']),
          "payment_date"=> mysqli_real_escape_string($obj->con,$_POST['payment_date']),
          "next_payment_date"=> mysqli_real_escape_string($obj->con,$_POST['next_payment_date']),
          "file_url" => $target_file,
        "created_at" => $datetime
        );
        if( $obj -> insert_record('payment_schedules',$myArray)) {
          $myNArray= array(
            "mode"=> mysqli_real_escape_string($obj->con,$_POST['mode']),
            "project_id"=> mysqli_real_escape_string($obj->con,$_POST['pid']),
            "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
            "credited_to"=> mysqli_real_escape_string($obj->con,$_POST['credited_to']),
            "received_by"=> $_SESSION['USER_ID'],
            "amount"=> mysqli_real_escape_string($obj->con,$_POST['amount']),
            "transaction_id"=> mysqli_real_escape_string($obj->con,$_POST['transaction_id']),
            "payment_date"=> mysqli_real_escape_string($obj->con,$_POST['payment_date']),
            "next_payment_date"=> mysqli_real_escape_string($obj->con,$_POST['next_payment_date']),
            "file_url" => $target_file,
          "created_at" => $datetime
          );
           $obj -> insert_record('pay_history',$myNArray);
          header("location:payment-schedules.php?pid=".$_POST['pid']."&type=success&msg=Record Saved Successfully!");
          } else {
          header("location:payment-schedules.php?pid=".$_POST['pid']."&type=error&msg=Error in Saving Record!");
        }
      }
break;
case "payment_terms":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("payment_terms",$where,$myArray)) {
  header("location:payment-terms.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:payment-terms.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('payment_terms',$myArray)) {
    header("location:payment-terms.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:payment-terms.php?type=error&msg=Error in Saving Record!");
  }
}
break;
case "process_layouts":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("process_layouts",$where,$myArray)) {
  header("location:process-layouts.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:process-layouts.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('process_layouts',$myArray)) {
    header("location:process-layouts.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:process-layouts.php?type=error&msg=Error in Saving Record!");
  }
}
break;
case "expenses":
$uuid=gen_uuid();
/** Add Image profile**/
$allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg",
     "pdf",
     "xls",
     "xlsx",
     "doc",
     "docx",
     "PNG",
     "JPG",
      "JPEG"
 );

 // Get image file extension
 $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

    $target_file="";
            if($_FILES["source"]["name"] != "") {
              if (! in_array($file_extension, $allowed_image_extension)) {
              echo "Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed";
                echo "<p><a href='expenses.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed'>Back</a></p>";
                exit();
  }    // Validate image file size
  // else if (($_FILES["source"]["size"] > 20000000)) {
  //     header("location:clientattachments.php?cid=".$_POST['cid']."&type=error&msg=Image size exceeds 2MB");
  // }
        else {
    $source="../x_images/expenses/";
          $target_file = $source.time().basename($_FILES["source"]["name"]);
         $target_file=str_replace(' ', '_', $target_file);
          if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
             echo "File upload failed";
               echo "<p><a href='expenses.php?type=error&msg=File upload failed'>Back</a></p>";
               exit();
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
  "payment_date"=> mysqli_real_escape_string($obj->con,$_POST['payment_date']),
  "mode" => mysqli_real_escape_string($obj->con,$_POST['mode']),
  "send_by" => $_SESSION['USER_ID'],
  "credited_to" => mysqli_real_escape_string($obj->con,$_POST['credited_to']),
  "amount" => mysqli_real_escape_string($obj->con,$_POST['amount']),
  "transaction_id" => mysqli_real_escape_string($obj->con,$_POST['transaction_id']),
  "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
  "file_url" => $target_file,
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("expenses",$where,$myArray)) {
      $myNArray= array(
         "expense_code" => 'PR/Expenses/'.date("y").'/'.sprintf("%04d", $_REQUEST['id']),
        "payment_date"=> mysqli_real_escape_string($obj->con,$_POST['payment_date']),
        "mode" => mysqli_real_escape_string($obj->con,$_POST['mode']),
        "send_by" => $_SESSION['USER_ID'],
        "credited_to" => mysqli_real_escape_string($obj->con,$_POST['credited_to']),
        "amount" => mysqli_real_escape_string($obj->con,$_POST['amount']),
        "transaction_id" => mysqli_real_escape_string($obj->con,$_POST['transaction_id']),
        "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
        "file_url" => $target_file,
      "created_at" => $datetime
      );
       $obj -> insert_record('exp_history',$myNArray);

  header("location:expenses.php?type=success&msg=Record Updated Successfully!");
  } else {
  header("location:expenses.php?type=error&msg=Error in Updating Record!");
  }
} else {
  $myArray= array(
    "uuid" => $uuid,
    "payment_date"=> mysqli_real_escape_string($obj->con,$_POST['payment_date']),
    "mode" => mysqli_real_escape_string($obj->con,$_POST['mode']),
    "send_by" => $_SESSION['USER_ID'],
    "credited_to" => mysqli_real_escape_string($obj->con,$_POST['credited_to']),
    "amount" => mysqli_real_escape_string($obj->con,$_POST['amount']),
    "transaction_id" => mysqli_real_escape_string($obj->con,$_POST['transaction_id']),
    "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
    "file_url" => $target_file,
    "created_at" => $datetime
  );
  $last_id='';
  if( $obj -> insert_record('expenses',$myArray)) {
     $last_id=mysqli_insert_id($obj->con);
     if($last_id != "") {
       $where= array("id"=> $last_id);
       $NArray=array(
         "expense_code" => 'PR/Expenses/'.date("y").'/'.sprintf("%04d", $last_id)
       );
       $obj->update_record("expenses",$where,$NArray);
      }

      $myNArray= array(
         "expense_code" => 'PR/Expenses/'.date("y").'/'.sprintf("%04d", $last_id),
        "payment_date"=> mysqli_real_escape_string($obj->con,$_POST['payment_date']),
        "mode" => mysqli_real_escape_string($obj->con,$_POST['mode']),
        "send_by" => $_SESSION['USER_ID'],
        "credited_to" => mysqli_real_escape_string($obj->con,$_POST['credited_to']),
        "amount" => mysqli_real_escape_string($obj->con,$_POST['amount']),
        "transaction_id" => mysqli_real_escape_string($obj->con,$_POST['transaction_id']),
        "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
        "file_url" => $target_file,
      "created_at" => $datetime
      );
       $obj -> insert_record('exp_history',$myNArray);

     header("location:expenses.php?type=success&msg=Record Saved Successfully!");
  } else {
     header("location:expenses.php?type=error&msg=Error in Saving Record!");
  }
}
break;
case "states":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "country"=> mysqli_real_escape_string($obj->con,$_POST['country']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("states",$where,$myArray)) {
  header("location:states.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:states.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "country"=> mysqli_real_escape_string($obj->con,$_POST['country']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('states',$myArray)) {
    header("location:states.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:states.php?type=error&msg=Error in Saving Record!");
  }
}
break;

case "locations":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "state_id"=> mysqli_real_escape_string($obj->con,$_POST['state_id']),
    "city_id"=> mysqli_real_escape_string($obj->con,$_POST['city']),
    "locality"=> mysqli_real_escape_string($obj->con,$_POST['locality']),
    "pincode"=> mysqli_real_escape_string($obj->con,$_POST['pincode']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("locations",$where,$myArray)) {
  header("location:locations.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:locations.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "state_id"=> mysqli_real_escape_string($obj->con,$_POST['state_id']),
    "city_id"=> mysqli_real_escape_string($obj->con,$_POST['city']),
    "locality"=> mysqli_real_escape_string($obj->con,$_POST['locality']),
    "pincode"=> mysqli_real_escape_string($obj->con,$_POST['pincode']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('locations',$myArray)) {
    header("location:locations.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:locations.php?type=error&msg=Error in Saving Record!");
  }
}
break;
case "zones":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "location_id"=> mysqli_real_escape_string($obj->con,$_POST['location_id']),
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "manager_name"=> mysqli_real_escape_string($obj->con,$_POST['manager_name']),
    "mobile"=> mysqli_real_escape_string($obj->con,$_POST['mobile']),
    "email"=> mysqli_real_escape_string($obj->con,$_POST['email']),
    "phone_no"=> mysqli_real_escape_string($obj->con,$_POST['phone_no']),
    "address"=> mysqli_real_escape_string($obj->con,$_POST['address']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("zones",$where,$myArray)) {
  header("location:zones.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:zones.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "location_id"=> mysqli_real_escape_string($obj->con,$_POST['location_id']),
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "manager_name"=> mysqli_real_escape_string($obj->con,$_POST['manager_name']),
    "mobile"=> mysqli_real_escape_string($obj->con,$_POST['mobile']),
    "email"=> mysqli_real_escape_string($obj->con,$_POST['email']),
    "phone_no"=> mysqli_real_escape_string($obj->con,$_POST['phone_no']),
    "address"=> mysqli_real_escape_string($obj->con,$_POST['address']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('zones',$myArray)) {
    $last_id=mysqli_insert_id($obj->con);
    if($last_id != "") {
      $where= array("id"=> $last_id);
      $NArray=array(
        "zone_code" => 'PR/Zones/'.date("y").'/'.sprintf("%04d", $last_id)
      );
      $obj->update_record("zones",$where,$NArray);
     }

    header("location:zones.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:zones.php?type=error&msg=Error in Saving Record!");
  }
}
break;

case "UpdateCityList":

require_once("include/statesanddistrict.min.php");


foreach ($IndianStates as $key => $value) {
 // echo $key." = ".$value."<br>";
$code=$key;
// print_r($value);
// echo sizeof($value);
 $states=$value['name'];
$city=$value['districts'];
$uuid=gen_uuid();
      $nArray=array(
        "uuid" => $uuid,
        "title" => $states,
        "country"=> 'India',
        "status" => 1
          );
    // if($obj -> insert_record('states',$nArray)){
    //   $last_id=mysqli_insert_id($obj->con);
    //   foreach($city as $key => $value) {
    //     echo ">>".$key." = ".$value."<br>";
    //     $uuid=gen_uuid();
    //           $nMArray=array(
    //             "uuid" => $uuid,
    //             "title" => $value,
    //             "state_id"=> $last_id,
    //           "status" => 1
    //               );
    //         $obj -> insert_record('cities',$nMArray);
    //   }
    // }


}
break;

case "medias":
if(isset($_REQUEST['sid']) && $_REQUEST['sid'] != "") {

  for($i=0;$i < sizeof($_FILES["source"] ["name"]);$i++) {
      /** Add Image**/
$uuid=gen_uuid();
/** Add Image profile**/
$allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg",
     "PNG",
     "JPG",
      "JPEG",
	  "gif",
	  "GIF"
 );

 // Get image file extension
 $file_extension = pathinfo($_FILES["source"]["name"] [$i], PATHINFO_EXTENSION);

    $target_file="";
            if($_FILES["source"]["name"][$i] != "") {
              if (! in_array($file_extension, $allowed_image_extension)) {
              echo "Invalid File extension.Only jpg, jpeg and png are allowed";
                echo "<p><a href='medias.php?sid=".$_POST['sid']."&type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed'>Back</a></p>";
                exit();
  }    // Validate image file size

        else {
    $source="../x_images/medias/";
          $target_file = $source.time().basename($_FILES["source"]["name"][$i]);
         $target_file=str_replace(' ', '_', $target_file);
          if(!move_uploaded_file($_FILES["source"]["tmp_name"][$i], $target_file))   {
             echo "File upload failed";
               echo "<p><a href='medias.php?sid=".$_POST['sid']."&type=error&msg=File upload failed'>Back</a></p>";
               exit();
           }
        }
      }
            else
            {
              $target_file=$_POST["old-logo"];
            }
    /** IMAGE end**/
    $target_file=str_replace("../","",$target_file);

      $nArray=array(
        "uuid" => $uuid,
        "title" => $_POST['title'],
        "service_id"=> $_POST['sid'],
        "file_url" => $target_file
          );
    $obj -> insert_record('medias',$nArray);
    }
    header("location:medias.php?&sid=".$_POST['sid']."&type=success&msg=Record Updated Successfully!");

} else {
header("location:medias.php?&sid=".$_POST['sid']."&type=error&msg=Error in Updating Record!");
}
break;
case "testimonials":
$uuid=gen_uuid();
/** Add Image profile**/
$allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg",
     "PNG",
     "JPG",
      "JPEG"
 );

 // Get image file extension
 $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

    $target_file="";
            if($_FILES["source"]["name"] != "") {
              if (! in_array($file_extension, $allowed_image_extension)) {
              echo "Invalid File extension.Only jpg, jpeg and png are allowed";
                echo "<p><a href='testimonials.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed'>Back</a></p>";
                exit();
  }
        else {
    $source="../x_images/testimonial/";
          $target_file = $source.time().basename($_FILES["source"]["name"]);
         $target_file=str_replace(' ', '_', $target_file);
          if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
             echo "File upload failed";
               echo "<p><a href='testimonials.php?type=error&msg=File upload failed'>Back</a></p>";
               exit();
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
  "name"=> mysqli_real_escape_string($obj->con,$_POST['name']),
  "city" => mysqli_real_escape_string($obj->con,$_POST['city']),
    "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
  "file_url" => $target_file,
  "status" => $_POST['status'],
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("testimonials",$where,$myArray)) {

  header("location:testimonials.php?type=success&msg=Record Updated Successfully!");
  } else {
  header("location:testimonials.php?type=error&msg=Error in Updating Record!");
  }
} else {
  $myArray= array(
    "uuid" => $uuid,
    "name"=> mysqli_real_escape_string($obj->con,$_POST['name']),
    "city" => mysqli_real_escape_string($obj->con,$_POST['city']),
      "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
    "file_url" => $target_file,
  "status" => $_POST['status'],
    "created_at" => $datetime
  );
  $last_id='';
  if( $obj -> insert_record('testimonials',$myArray)) {
         header("location:testimonials.php?type=success&msg=Record Saved Successfully!");
  } else {
     header("location:testimonials.php?type=error&msg=Error in Saving Record!");
  }
}
break;
/**gallery***/
case "gallery":
$uuid=gen_uuid();
/** Add Image profile**/
$allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg",
     "PNG",
     "JPG",
      "JPEG"
 );

 // Get image file extension
 $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

    $target_file="";
            if($_FILES["source"]["name"] != "") {
              if (! in_array($file_extension, $allowed_image_extension)) {
              echo "Invalid File extension.Only jpg, jpeg and png are allowed";
                echo "<p><a href='gallery.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed'>Back</a></p>";
                exit();
  }
        else {
    $source="../x_images/gallery/";
          $target_file = $source.time().basename($_FILES["source"]["name"]);
         $target_file=str_replace(' ', '_', $target_file);
          if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
             echo "File upload failed";
               echo "<p><a href='gallery.php?type=error&msg=File upload failed'>Back</a></p>";
               exit();
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
  "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
  "file_url" => $target_file,
  "status" => $_POST['status'],
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("gallery",$where,$myArray)) {

  header("location:gallery.php?type=success&msg=Record Updated Successfully!");
  } else {
  header("location:gallery.php?type=error&msg=Error in Updating Record!");
  }
} else {
  $myArray= array(
    "uuid" => $uuid,
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "description"=> mysqli_real_escape_string($obj->con,$_POST['description']),
    "file_url" => $target_file,
  "status" => $_POST['status'],
    "created_at" => $datetime
  );
  $last_id='';
  if( $obj -> insert_record('gallery',$myArray)) {
         header("location:gallery.php?type=success&msg=Record Saved Successfully!");
  } else {
     header("location:gallery.php?type=error&msg=Error in Saving Record!");
  }
}
break;
/**END gallery***/
/***Add Brands***/
case "brands":
$uuid=gen_uuid();
/** Add Image profile**/
$allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg",
     "PNG",
     "JPG",
      "JPEG"
 );

 // Get image file extension
 $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

    $target_file="";
            if($_FILES["source"]["name"] != "") {
              if (! in_array($file_extension, $allowed_image_extension)) {
              echo "Invalid File extension.Only jpg, jpeg and png are allowed";
                echo "<p><a href='testimonials.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed'>Back</a></p>";
                exit();
  }
        else {
    $source="../x_images/brands/";
          $target_file = $source.time().basename($_FILES["source"]["name"]);
         $target_file=str_replace(' ', '_', $target_file);
          if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
             echo "File upload failed";
               echo "<p><a href='brands.php?type=error&msg=File upload failed'>Back</a></p>";
               exit();
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
  "website_url" => mysqli_real_escape_string($obj->con,$_POST['website_url']),
  "file_url" => $target_file,
  "status" => $_POST['status'],
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("brands",$where,$myArray)) {

  header("location:brands.php?type=success&msg=Record Updated Successfully!");
  } else {
  header("location:brands.php?type=error&msg=Error in Updating Record!");
  }
} else {
  $myArray= array(
    "uuid" => $uuid,
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "website_url" => mysqli_real_escape_string($obj->con,$_POST['website_url']),
    "file_url" => $target_file,
    "status" => $_POST['status'],
    "created_at" => $datetime
  );
  $last_id='';
  if( $obj -> insert_record('brands',$myArray)) {
         header("location:brands.php?type=success&msg=Record Saved Successfully!");
  } else {
     header("location:brands.php?type=error&msg=Error in Saving Record!");
  }
}
break;
/***End Add Brands***/
case "blog_categories":
$uuid=gen_uuid();
/** Add Image profile**/
$allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg",
     "PNG",
     "JPG",
      "JPEG",
      "gif",
      "GIF"
 );

 // Get image file extension
 $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

    $target_file="";
            if($_FILES["source"]["name"] != "") {
              if (! in_array($file_extension, $allowed_image_extension)) {
              echo "Invalid File extension.Only jpg, jpeg and png are allowed";
                echo "<p><a href='blog-categories.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed'>Back</a></p>";
                exit();
  }
        else {
    $source="../x_images/blog_categories/";
          $target_file = $source.time().basename($_FILES["source"]["name"]);
          $target_file=str_replace(' ', '_', $target_file);

          if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
             echo "File upload failed".$_FILES["source"]["error"];
               echo "<p><a href='blog-categories.php?type=error&msg=File upload failed'>Back</a></p>";
               exit();
           }
        }
      }
            else
            {
              $target_file=$_POST["old-logo"];
            }
    /** IMAGE end**/
    $target_file=str_replace("../","",$target_file);
if(isset($_POST['id']) && $_POST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "file_url" => $target_file,
    "meta_title" => mysqli_real_escape_string($obj->con,$_POST['meta_title']),
    "meta_keys" => mysqli_real_escape_string($obj->con,$_POST['meta_keys']),
    "meta_desc" => mysqli_real_escape_string($obj->con,$_POST['meta_desc']),
    "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_POST['id']);
  if($obj-> update_record("blog_categories",$where,$myArray)) {
  header("location:blog-categories.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:blog-categories.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "file_url" => $target_file,
  "meta_title" => mysqli_real_escape_string($obj->con,$_POST['meta_title']),
  "meta_keys" => mysqli_real_escape_string($obj->con,$_POST['meta_keys']),
  "meta_desc" => mysqli_real_escape_string($obj->con,$_POST['meta_desc']),
  "description" => mysqli_real_escape_string($obj->con,$_POST['description']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('blog_categories',$myArray)) {
    header("location:blog-categories.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:blog-categories.php?type=error&msg=Error in Saving Record!");
  }
}
break;
/* start service Faq*/
case "servicefaq":
$uuid=gen_uuid();
if(isset($_POST['id']) && $_POST['id'] != "") {
  $myArray= array(
    "question"=> mysqli_real_escape_string($obj->con,$_POST['question']),
    "service_id"=> mysqli_real_escape_string($obj->con,$_POST['pid']),
    "answer" => mysqli_real_escape_string($obj->con,$_POST['answer']),
    "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_POST['id']);
  if($obj-> update_record("service_faqs",$where,$myArray)) {
  header("location:service-faqs.php?pid=".$_POST['pid']."&type=success&msg=Record Updated Successfully!");
} else {
  header("location:service-faqs.php?pid=".$_POST['pid']."&type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "question"=> mysqli_real_escape_string($obj->con,$_POST['question']),
    "service_id"=> mysqli_real_escape_string($obj->con,$_POST['pid']),
    "answer" => mysqli_real_escape_string($obj->con,$_POST['answer']),
    "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('service_faqs',$myArray)) {
    header("location:service-faqs.php?pid=".$_POST['pid']."&type=success&msg=Record Saved Successfully!");
  } else {
    header("location:service-faqs.php?pid=".$_POST['pid']."&type=error&msg=Error in Saving Record!");
  }
}
break;
/* end service Faq*/

/* Start FAQ*/
case "faqs":
$uuid=gen_uuid();
if(isset($_POST['id']) && $_POST['id'] != "") {
  $myArray= array(
    "question"=> mysqli_real_escape_string($obj->con,$_POST['question']),
    "answer" => mysqli_real_escape_string($obj->con,$_POST['answer']),
    "status" => $_POST['status'],
	"ip" => $_SERVER['REMOTE_ADDR'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_POST['id']);
  if($obj-> update_record("faqs",$where,$myArray)) {
  header("location:faqs.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:faqs.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "question"=> mysqli_real_escape_string($obj->con,$_POST['question']),
    "answer" => mysqli_real_escape_string($obj->con,$_POST['answer']),
    "status" => $_POST['status'],
    "ip" => $_SERVER['REMOTE_ADDR'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('faqs',$myArray)) {
    header("location:faqs.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:faqs.php?type=error&msg=Error in Saving Record!");
  }
}
break;
/* End FAQ*/


/* Start Site Pages*/
case "site_pages":
$uuid=gen_uuid();
if(isset($_POST['id']) && $_POST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "url" => mysqli_real_escape_string($obj->con,$_POST['url']),
	"meta_title" => mysqli_real_escape_string($obj->con,$_POST['meta_title']),
    "meta_keys" => mysqli_real_escape_string($obj->con,$_POST['meta_keys']),
    "meta_desc" => mysqli_real_escape_string($obj->con,$_POST['meta_desc']),
    "html" => mysqli_real_escape_string($obj->con,$_POST['html']),
    "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_POST['id']);
  if($obj-> update_record("site_pages",$where,$myArray)) {
  header("location:site-pages.php?type=success&msg=Record Updated Successfully!");
} else {
   header("location:site-pages.php?type=error&msg=Error in Saving Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "url" => mysqli_real_escape_string($obj->con,$_POST['url']),
	"meta_title" => mysqli_real_escape_string($obj->con,$_POST['meta_title']),
    "meta_keys" => mysqli_real_escape_string($obj->con,$_POST['meta_keys']),
    "meta_desc" => mysqli_real_escape_string($obj->con,$_POST['meta_desc']),
    "html" => mysqli_real_escape_string($obj->con,$_POST['html']),
    "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('site_pages',$myArray)) {
    header("location:site-pages.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:site-pages.php?type=error&msg=Error in Saving Record!");
  }
}
break;
/* End Site  pages*/


/* START PORTFOLIO*/
case "portfolio":
$uuid=gen_uuid();

/** Add Image profile**/
$allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg",
     "PNG",
     "JPG",
      "JPEG",
      "gif",
      "GIF"
 );

 // Get image file extension
 $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

    $target_file="";
            if($_FILES["source"]["name"] != "") {
              if (! in_array($file_extension, $allowed_image_extension)) {
              echo "Invalid File extension.Only jpg, jpeg and png are allowed";
                echo "<p><a href='portfolio.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed'>Back</a></p>";
                exit();
  }
        else {
    $source="../x_images/portfolio_pics/";
          $target_file = $source.time().basename($_FILES["source"]["name"]);
          $target_file=str_replace(' ', '_', $target_file);

          if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
             echo "File upload failed".$_FILES["source"]["error"];
               echo "<p><a href='portfolio.php?type=error&msg=File upload failed'>Back</a></p>";
               exit();
           }
        }
      }
            else
            {
              $target_file=$_POST["old-logo"];
            }
    /** IMAGE end**/
    $target_file=str_replace("../","",$target_file);
if(isset($_POST['id']) && $_POST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "url"=> mysqli_real_escape_string($obj->con,$_POST['url']),
    "service_id"=> implode(",",$_POST['service_id']),
    "file_url" => $target_file,
    "year" => mysqli_real_escape_string($obj->con,$_POST['year']),
    "case_studies" => mysqli_real_escape_string($obj->con,$_POST['case_studies']),
    "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_POST['id']);
  if($obj-> update_record("portfolios",$where,$myArray)) {
  header("location:portfolios.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:portfolios.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "url"=> mysqli_real_escape_string($obj->con,$_POST['url']),
    "service_id"=> implode(",",$_POST['service_id']),
    "file_url" => $target_file,
    "year" => mysqli_real_escape_string($obj->con,$_POST['year']),
    "case_studies" => mysqli_real_escape_string($obj->con,$_POST['case_studies']),
    "status" => $_POST['status'],
    "created_at" => $datetime
  );
  if( $obj -> insert_record('portfolios',$myArray)) {
    header("location:portfolios.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:portfolios.php?type=error&msg=Error in Saving Record!");
  }
}
break;
/* END PORTFOLIO*/

case "blogs":
$uuid=gen_uuid();
/** Add Image profile**/
$allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg",
     "PNG",
     "JPG",
      "JPEG",
      "gif",
      "GIF"
 );

 // Get image file extension
 $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

    $target_file="";
            if($_FILES["source"]["name"] != "") {
              if (! in_array($file_extension, $allowed_image_extension)) {
              echo "Invalid File extension.Only jpg, jpeg and png are allowed";
                echo "<p><a href='blogs.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed'>Back</a></p>";
                exit();
  }
        else {
    $source="../x_images/blog_pics/";
          $target_file = $source.time().basename($_FILES["source"]["name"]);
          $target_file=str_replace(' ', '_', $target_file);

          if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
             echo "File upload failed".$_FILES["source"]["error"];
               echo "<p><a href='blogs.php?type=error&msg=File upload failed'>Back</a></p>";
               exit();
           }
        }
      }
            else
            {
              $target_file=$_POST["old-logo"];
            }
    /** IMAGE end**/
    $target_file=str_replace("../","",$target_file);
if(isset($_POST['id']) && $_POST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "category_id"=> mysqli_real_escape_string($obj->con,$_POST['category_id']),
    "permalink"=> mysqli_real_escape_string($obj->con,strtolower($_POST['permalink'])),
    "img_title"=> mysqli_real_escape_string($obj->con,$_POST['img_title']),
    "file_url" => $target_file,
    "meta_title" => mysqli_real_escape_string($obj->con,$_POST['meta_title']),
    "meta_keys" => mysqli_real_escape_string($obj->con,$_POST['meta_keys']),
    "meta_desc" => mysqli_real_escape_string($obj->con,$_POST['meta_desc']),
    "content" => mysqli_real_escape_string($obj->con,$_POST['content']),
    "author" => mysqli_real_escape_string($obj->con,$_POST['author']),
    "status" => $_POST['status'],
  "hp_status" => $_POST['hp_status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_POST['id']);
  if($obj-> update_record("blogs",$where,$myArray)) {
  header("location:blogs.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:blogs.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
    "category_id"=> mysqli_real_escape_string($obj->con,$_POST['category_id']),
    "permalink"=> mysqli_real_escape_string($obj->con,strtolower($_POST['permalink'])),
    "img_title"=> mysqli_real_escape_string($obj->con,$_POST['img_title']),
    "file_url" => $target_file,
    "meta_title" => mysqli_real_escape_string($obj->con,$_POST['meta_title']),
    "meta_keys" => mysqli_real_escape_string($obj->con,$_POST['meta_keys']),
    "meta_desc" => mysqli_real_escape_string($obj->con,$_POST['meta_desc']),
    "content" => mysqli_real_escape_string($obj->con,$_POST['content']),
    "author" => mysqli_real_escape_string($obj->con,$_POST['author']),
    "status" => $_POST['status'],
  "hp_status" => $_POST['hp_status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('blogs',$myArray)) {
    header("location:blogs.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:blogs.php?type=error&msg=Error in Saving Record!");
  }
}
break;
case "settings":
$uuid=gen_uuid();
$mobile1=$_POST['countryCode1'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile1']);
$mobile2=$_POST['countryCode2'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile2']);
// $mobile3=$_POST['countryCode3'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile3']);

/** Add Image profile**/
$allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg",
     "PNG",
     "JPG",
      "JPEG",
      "gif",
      "GIF"
 );

 // Get image file extension
 $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

    $target_file="";
            if($_FILES["source"]["name"] != "") {
              if (! in_array($file_extension, $allowed_image_extension)) {
              echo "Invalid File extension.Only jpg, jpeg and png are allowed";
                echo "<p><a href='settings.php?id=1&type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed'>Back</a></p>";
                exit();
  }
        else {
    $source="../x_images/";
          $target_file = $source.time().basename($_FILES["source"]["name"]);
          $target_file=str_replace(' ', '_', $target_file);

          if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
             echo "File upload failed".$_FILES["source"]["error"];
               echo "<p><a href='settings.php?id=1&type=error&msg=File upload failed'>Back</a></p>";
               exit();
           }
        }
      }
            else
            {
              $target_file=$_POST["old-logo"];
            }
    /** IMAGE end**/
    $target_file=str_replace("../","",$target_file);
if(isset($_POST['id']) && $_POST['id'] != "") {
  $myArray= array(
    "site_name"=> mysqli_real_escape_string($obj->con,$_POST['site_name']),
    "email"=> mysqli_real_escape_string($obj->con,$_POST['email']),
    "contact_no"=> $mobile1,
    "contact_no_2"=> $mobile2,
    "file_url" => $target_file,
    "meta_title" => mysqli_real_escape_string($obj->con,$_POST['meta_title']),
    "meta_keys" => mysqli_real_escape_string($obj->con,$_POST['meta_keys']),
    "meta_desc" => mysqli_real_escape_string($obj->con,$_POST['meta_desc']),
    "copyright_text" => mysqli_real_escape_string($obj->con,$_POST['copyright_text']),
    "address" => mysqli_real_escape_string($obj->con,$_POST['address']),
    "address_2" => mysqli_real_escape_string($obj->con,$_POST['address_2']),
    "location" => mysqli_real_escape_string($obj->con,$_POST['location']),
    "location_2" => mysqli_real_escape_string($obj->con,$_POST['location_2']),
    "goes_from_name" => mysqli_real_escape_string($obj->con,$_POST['goes_from_name']),
    "goes_from_email" => mysqli_real_escape_string($obj->con,$_POST['goes_from_email']),
    "contact_email" => mysqli_real_escape_string($obj->con,$_POST['contact_email']),
    "customer_support_email" => mysqli_real_escape_string($obj->con,$_POST['support_email']),
    "sales_email" => mysqli_real_escape_string($obj->con,$_POST['sales_email']),
    "careers_email" => mysqli_real_escape_string($obj->con,$_POST['career_email']),
    "facebook_url" => mysqli_real_escape_string($obj->con,$_POST['facebook_url']),
    "twitter_url" => mysqli_real_escape_string($obj->con,$_POST['twitter_url']),
    "instagram_url" => mysqli_real_escape_string($obj->con,$_POST['instagram_url']),
    "pinterest_url" => mysqli_real_escape_string($obj->con,$_POST['pinterest_url']),
    "youtube_url" => mysqli_real_escape_string($obj->con,$_POST['youtube_url']),
    "linkedin_url" => mysqli_real_escape_string($obj->con,$_POST['linkedin_url']),
    "updated_at" => $datetime
  );
  $where= array("id"=> $_POST['id']);
  if($obj-> update_record("website_settings",$where,$myArray)) {
  header("location:settings.php?id=1&type=success&msg=Record Updated Successfully!");
} else {
  header("location:settings.php?id=1&type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "site_name"=> mysqli_real_escape_string($obj->con,$_POST['site_name']),
    "email"=> mysqli_real_escape_string($obj->con,$_POST['email']),
    "contact_no"=> $mobile1,
    "contact_no_2"=> $mobile2,
    "file_url" => $target_file,
    "meta_title" => mysqli_real_escape_string($obj->con,$_POST['meta_title']),
    "meta_keys" => mysqli_real_escape_string($obj->con,$_POST['meta_keys']),
    "meta_desc" => mysqli_real_escape_string($obj->con,$_POST['meta_desc']),
    "copyright_text" => mysqli_real_escape_string($obj->con,$_POST['copyright_text']),
    "address" => mysqli_real_escape_string($obj->con,$_POST['address']),
    "address_2" => mysqli_real_escape_string($obj->con,$_POST['address_2']),
    "location" => mysqli_real_escape_string($obj->con,$_POST['location']),
    "location_2" => mysqli_real_escape_string($obj->con,$_POST['location_2']),
    "goes_from_name" => mysqli_real_escape_string($obj->con,$_POST['goes_from_name']),
    "goes_from_email" => mysqli_real_escape_string($obj->con,$_POST['goes_from_email']),
    "contact_email" => mysqli_real_escape_string($obj->con,$_POST['contact_email']),
    "customer_support_email" => mysqli_real_escape_string($obj->con,$_POST['support_email']),
    "sales_email" => mysqli_real_escape_string($obj->con,$_POST['sales_email']),
    "careers_email" => mysqli_real_escape_string($obj->con,$_POST['career_email']),
    "facebook_url" => mysqli_real_escape_string($obj->con,$_POST['facebook_url']),
    "twitter_url" => mysqli_real_escape_string($obj->con,$_POST['twitter_url']),
    "instagram_url" => mysqli_real_escape_string($obj->con,$_POST['instagram_url']),
    "pinterest_url" => mysqli_real_escape_string($obj->con,$_POST['pinterest_url']),
    "youtube_url" => mysqli_real_escape_string($obj->con,$_POST['youtube_url']),
    "linkedin_url" => mysqli_real_escape_string($obj->con,$_POST['linkedin_url']),
  "created_at" => $datetime
  );
  if( $obj -> insert_record('website_settings',$myArray)) {
    header("location:settings.php?id=1&type=success&msg=Record Saved Successfully!");
  } else {
    header("location:settings.php?id=1&type=error&msg=Error in Saving Record!");
  }
}
break;

case "departments":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("departments",$where,$myArray)) {
  header("location:departments.php?type=success&msg=Record Updated Successfully!");
} else {
  header("location:departments.php?type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('departments',$myArray)) {
    header("location:departments.php?type=success&msg=Record Saved Successfully!");
  } else {
    header("location:departments.php?type=error&msg=Error in Saving Record!");
  }
}
break;
case "designations":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "dept_id"=> mysqli_real_escape_string($obj->con,$_POST['did']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("designations",$where,$myArray)) {
  header("location:designations.php?did=".$_POST['did']."&type=success&msg=Record Updated Successfully!");
} else {
  header("location:designations.php?did=".$_POST['did']."&type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "dept_id"=> mysqli_real_escape_string($obj->con,$_POST['did']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('designations',$myArray)) {
    header("location:designations.php?did=".$_POST['did']."&type=success&msg=Record Saved Successfully!");
  } else {
    header("location:designations.php?did=".$_POST['did']."&type=error&msg=Error in Saving Record!");
  }
}
break;

case "cities":
$uuid=gen_uuid();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "state_id"=> mysqli_real_escape_string($obj->con,$_POST['sid']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("cities",$where,$myArray)) {
  header("location:cities.php?sid=".$_POST['sid']."&type=success&msg=Record Updated Successfully!");
} else {
  header("location:cities.php?sid=".$_POST['sid']."&type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
  "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
  "state_id"=> mysqli_real_escape_string($obj->con,$_POST['sid']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('cities',$myArray)) {
    header("location:cities.php?sid=".$_POST['sid']."&type=success&msg=Record Saved Successfully!");
  } else {
    header("location:cities.php?sid=".$_POST['sid']."&type=error&msg=Error in Saving Record!");
  }
}
break;
case "employees":
$mobile1=$_POST['countryCode1'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile1']);
$mobile2=$_POST['countryCode2'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile2']);
$uuid=gen_uuid();
/** Add Image profile**/
$allowed_image_extension = array(
     "png",
     "jpg",
     "jpeg",
     "PNG",
     "JPG",
      "JPEG"
 );

 // Get image file extension
 $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

    $target_file="";
            if($_FILES["source"]["name"] != "") {
              if (! in_array($file_extension, $allowed_image_extension)) {
              echo "Invalid File extension.Only jpg, jpeg and png are allowed";
                echo "<p><a href='employees.php?type=error&msg=Invalid File extension.Only jpg, jpeg and png are allowed'>Back</a></p>";
                exit();
  }
        else {
    $source="../x_images/employees/";
          $target_file = $source.time().basename($_FILES["source"]["name"]);
         $target_file=str_replace(' ', '_', $target_file);
          if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))   {
             echo "File upload failed";
               echo "<p><a href='employees.php?type=error&msg=File upload failed'>Back</a></p>";
               exit();
           }
        }
      }
            else
            {
              $target_file=$_POST["old-logo"];
            }
    /** IMAGE end**/
    $target_file=str_replace("../","",$target_file);
if(isset($_POST['saddress']) && $_POST['saddress'] == 1 ) {
  $caddress=mysqli_real_escape_string($obj->con,$_POST['paddress']);
  $cstate=mysqli_real_escape_string($obj->con,$_POST['pstate_id']);
  $ccity=mysqli_real_escape_string($obj->con,$_POST['pcity_id']);
  $cpincode=mysqli_real_escape_string($obj->con,$_POST['ppincode']);
} else {
  $caddress=mysqli_real_escape_string($obj->con,$_POST['caddress']);
  $cstate=mysqli_real_escape_string($obj->con,$_POST['cstate_id']);
  $ccity=mysqli_real_escape_string($obj->con,$_POST['ccity_id']);
  $cpincode=mysqli_real_escape_string($obj->con,$_POST['cpincode']);
}
$options = [
  'cost' => 11
];
$hash=password_hash(mysqli_real_escape_string($obj->con,$_POST['password']), PASSWORD_BCRYPT, $options);
$pass=isset($_POST['upass']) && $_POST['upass'] == 1 ? $hash : $_POST['oldp'];
if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
  "zone_id"=> mysqli_real_escape_string($obj->con,$_POST['zone_id']),
  "dept_id"=> mysqli_real_escape_string($obj->con,$_POST['dept_id']),
  "designation_id"=> mysqli_real_escape_string($obj->con,$_POST['designation_id']),
  "name" => mysqli_real_escape_string($obj->con,$_POST['name']),
  "password" => $pass,
  "email" => mysqli_real_escape_string($obj->con,$_POST['email']),
  "mobile1" => $mobile1,
  "mobile2" =>$mobile2,
  "gender" => mysqli_real_escape_string($obj->con,$_POST['gender']),
  "marital_status" => mysqli_real_escape_string($obj->con,$_POST['marital_status']),
  "nationality" => mysqli_real_escape_string($obj->con,$_POST['nationality']),
  "pan_number" => mysqli_real_escape_string($obj->con,$_POST['pan_number']),
  "aadhar_card_number" => mysqli_real_escape_string($obj->con,$_POST['aadhar_card_number']),
  "paddress" => mysqli_real_escape_string($obj->con,$_POST['paddress']),
  "pstate_id" => mysqli_real_escape_string($obj->con,$_POST['pstate_id']),
  "pcity_id" => mysqli_real_escape_string($obj->con,$_POST['pcity_id']),
  "ppincode" => mysqli_real_escape_string($obj->con,$_POST['ppincode']),
  "caddress" => $caddress,
  "cstate_id" => $cstate,
  "ccity_id" => $ccity,
  "cpincode" => $cpincode,
  "type" => mysqli_real_escape_string($obj->con,$_POST['type']),
  "shift" => mysqli_real_escape_string($obj->con,$_POST['shift']),
  "job_type" => mysqli_real_escape_string($obj->con,$_POST['job_type']),
  "bio_empcode" => mysqli_real_escape_string($obj->con,$_POST['bio_empcode']),
  "pf_no" => mysqli_real_escape_string($obj->con,$_POST['pf_no']),
  "esic_no" => mysqli_real_escape_string($obj->con,$_POST['esic_no']),
  "doj" => mysqli_real_escape_string($obj->con,$_POST['doj']),
  "qualification" => mysqli_real_escape_string($obj->con,$_POST['qualification']),
  "experience" => mysqli_real_escape_string($obj->con,$_POST['experience']),
  "bank_name" => mysqli_real_escape_string($obj->con,$_POST['bank_name']),
  "acc_holder_name" => mysqli_real_escape_string($obj->con,$_POST['acc_holder_name']),
  "branch" => mysqli_real_escape_string($obj->con,$_POST['branch']),
  "ifsc_code" => mysqli_real_escape_string($obj->con,$_POST['ifsc_code']),
  "acc_number" => mysqli_real_escape_string($obj->con,$_POST['acc_number']),
  "upi_id" => mysqli_real_escape_string($obj->con,$_POST['upi_id']),
  "bike_available" => mysqli_real_escape_string($obj->con,$_POST['bike_available']),
  "driving_licence" => mysqli_real_escape_string($obj->con,$_POST['driving_licence']),
  "tools_available" => mysqli_real_escape_string($obj->con,$_POST['tools_available']),
  "computer_skill" => mysqli_real_escape_string($obj->con,$_POST['computer_skill']),
  "profile_pic_url" => $target_file,
  "status" => $_POST['status'],
  "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("employees",$where,$myArray)) {
    // $obj->update_record("employees",$where,$NArray);
    $condition= array("emp_id"=> $_REQUEST['id']);
    $obj->delete_record("employee_expertise",$condition);

           foreach($_POST['skill'] as $dcs) {
             $nArray=array(
               "emp_id"=> $_REQUEST['id'],
               "subcategory_id" => $dcs
                 );
           $obj -> insert_record('employee_expertise',$nArray);
           }

  header("location:employees.php?type=success&msg=Record Updated Successfully!");
  } else {
  header("location:employees.php?type=error&msg=Error in Updating Record!");
  }
} else {
  $myArray= array(
    "uuid" => $uuid,
    "zone_id"=> mysqli_real_escape_string($obj->con,$_POST['zone_id']),
    "dept_id"=> mysqli_real_escape_string($obj->con,$_POST['dept_id']),
    "designation_id"=> mysqli_real_escape_string($obj->con,$_POST['designation_id']),
    "name" => mysqli_real_escape_string($obj->con,$_POST['name']),
    "password" => $pass,
    "email" => mysqli_real_escape_string($obj->con,$_POST['email']),
    "mobile1" => $mobile1,
    "mobile2" => $mobile2,
    "gender" => mysqli_real_escape_string($obj->con,$_POST['gender']),
    "marital_status" => mysqli_real_escape_string($obj->con,$_POST['marital_status']),
    "nationality" => mysqli_real_escape_string($obj->con,$_POST['nationality']),
    "pan_number" => mysqli_real_escape_string($obj->con,$_POST['pan_number']),
    "aadhar_card_number" => mysqli_real_escape_string($obj->con,$_POST['aadhar_card_number']),
    "paddress" => mysqli_real_escape_string($obj->con,$_POST['paddress']),
    "pstate_id" => mysqli_real_escape_string($obj->con,$_POST['pstate_id']),
    "pcity_id" => mysqli_real_escape_string($obj->con,$_POST['pcity_id']),
    "ppincode" => mysqli_real_escape_string($obj->con,$_POST['ppincode']),
    "caddress" => $caddress,
    "cstate_id" => $cstate,
    "ccity_id" => $ccity,
    "cpincode" => $cpincode,
    "type" => mysqli_real_escape_string($obj->con,$_POST['type']),
    "shift" => mysqli_real_escape_string($obj->con,$_POST['shift']),
    "job_type" => mysqli_real_escape_string($obj->con,$_POST['job_type']),
    "bio_empcode" => mysqli_real_escape_string($obj->con,$_POST['bio_empcode']),
    "pf_no" => mysqli_real_escape_string($obj->con,$_POST['pf_no']),
    "esic_no" => mysqli_real_escape_string($obj->con,$_POST['esic_no']),
    "doj" => mysqli_real_escape_string($obj->con,$_POST['doj']),
    "qualification" => mysqli_real_escape_string($obj->con,$_POST['qualification']),
    "experience" => mysqli_real_escape_string($obj->con,$_POST['experience']),
    "bank_name" => mysqli_real_escape_string($obj->con,$_POST['bank_name']),
    "acc_holder_name" => mysqli_real_escape_string($obj->con,$_POST['acc_holder_name']),
    "branch" => mysqli_real_escape_string($obj->con,$_POST['branch']),
    "ifsc_code" => mysqli_real_escape_string($obj->con,$_POST['ifsc_code']),
    "acc_number" => mysqli_real_escape_string($obj->con,$_POST['acc_number']),
    "upi_id" => mysqli_real_escape_string($obj->con,$_POST['upi_id']),
    "bike_available" => mysqli_real_escape_string($obj->con,$_POST['bike_available']),
    "driving_licence" => mysqli_real_escape_string($obj->con,$_POST['driving_licence']),
    "tools_available" => mysqli_real_escape_string($obj->con,$_POST['tools_available']),
    "computer_skill" => mysqli_real_escape_string($obj->con,$_POST['computer_skill']),
    "profile_pic_url" => $target_file,
    "status" => $_POST['status'],
    "created_at" => $datetime
  );
  $last_id='';
  if( $obj -> insert_record('employees',$myArray)) {
    $last_id=mysqli_insert_id($obj->con);
    if($last_id != "") {
      $where= array("id"=> $last_id);
      $NArray=array(
        "emp_code" => 'PR/Employees/'.date("y").'/'.sprintf("%04d", $last_id)
      );
      $obj->update_record("employees",$where,$NArray);
      $condition= array("emp_id"=> $last_id);
      $obj->delete_record("employee_expertise",$condition);

             foreach($_POST['skill'] as $dcs) {
               $nArray=array(
                 "emp_id"=> $last_id,
                 "subcategory_id" => $dcs
                   );
             $obj -> insert_record('employee_expertise',$nArray);
             }
           }
       header("location:employees.php?type=success&msg=Record Saved Successfully!");
  } else {
     header("location:employees.php?type=error&msg=Error in Saving Record!");
  }
}
break;
case "employee_references":
$uuid=gen_uuid();
$mobile1=$_POST['countryCode'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile1']);
$mobile2=$_POST['countryCode2'].'-'.mysqli_real_escape_string($obj->con,$_POST['mobile2']);

if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
  $myArray= array(
    "name"=> mysqli_real_escape_string($obj->con,$_POST['name']),
    "emp_id"=> mysqli_real_escape_string($obj->con,$_POST['eid']),
    "relation"=> mysqli_real_escape_string($obj->con,$_POST['relation']),
    "mobile1"=> $mobile1,
    "mobile2"=> $mobile2,
    "email"=> mysqli_real_escape_string($obj->con,$_POST['email']),
  "status" => $_POST['status'],
    "updated_at" => $datetime
  );
  $where= array("id"=> $_REQUEST['id']);
  if($obj-> update_record("employee_references",$where,$myArray)) {
  header("location:employeereferences.php?eid=".$_POST['eid']."&type=success&msg=Record Updated Successfully!");
} else {
  header("location:employeereferences.php?eid=".$_POST['eid']."&type=error&msg=Error in Updating Record!");
}
} else {
  $myArray= array(
    "uuid" => $uuid,
    "name"=> mysqli_real_escape_string($obj->con,$_POST['name']),
    "emp_id"=> mysqli_real_escape_string($obj->con,$_POST['eid']),
    "relation"=> mysqli_real_escape_string($obj->con,$_POST['relation']),
    "mobile1"=> $mobile1,
    "mobile2"=> $mobile2,
    "email"=> mysqli_real_escape_string($obj->con,$_POST['email']),
  "status" => $_POST['status'],
  "created_at" => $datetime
  );
  if( $obj -> insert_record('employee_references',$myArray)) {
    header("location:employeereferences.php?eid=".$_POST['eid']."&type=success&msg=Record Saved Successfully!");
  } else {
    header("location:employeereferences.php?eid=".$_POST['eid']."&type=error&msg=Error in Saving Record!");
  }
}
break;
case "employee_attachments":
$uuid=gen_uuid();
  /** Add Image profile**/
  $allowed_image_extension = array(
       "png",
       "jpg",
       "jpeg",
       "pdf",
       "xls",
       "xlsx",
       "doc",
       "docx",
       "PNG",
       "JPG",
        "JPEG"
   );

   // Get image file extension
   $file_extension = pathinfo($_FILES["source"]["name"], PATHINFO_EXTENSION);

  		$target_file="";
  						if($_FILES["source"]["name"] != "") {
                if (! in_array($file_extension, $allowed_image_extension)) {
                echo "Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed";
                  echo "<p><a href='employeeattachments.php?eid=".$_POST['eid']."&type=error&msg=Invalid File extension.Only jpg, jpeg and png,xlsx,xls,pdf,doc,docx are allowed'>Back</a></p>";
                  exit();
    }    // Validate image file size
    else if (($_FILES["source"]["size"] > 20000000)) {
        echo "File size exceeds 20MB";
          echo "<p><a href='employeeattachments.php?eid=".$_POST['eid']."&type=error&msg=File size exceeds 20MB'>Back</a></p>";
          exit();
    }
  				else {
      $source="../x_images/employees/";
            $target_file = $source.time().basename($_FILES["source"]["name"]);
           $target_file=str_replace(' ', '_', $target_file);
            if(!move_uploaded_file($_FILES["source"]["tmp_name"], $target_file))
             {
               echo "File upload failed";
                 echo "<p><a href='employeeattachments.php?eid=".$_POST['eid']."&type=error&msg=File upload failed'>Back</a></p>";
                 exit();
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
          "emp_id"=> mysqli_real_escape_string($obj->con,$_POST['eid']),
          "remarks"=> mysqli_real_escape_string($obj->con,$_POST['remarks']),
          "status" => $_POST['status'],
          "file_url" => $target_file,
          "updated_at" => $datetime
        );
        $where= array("id"=> $_REQUEST['id']);
        if($obj-> update_record("employee_attachments",$where,$myArray)) {
        header("location:employeeattachments.php?eid=".$_POST['eid']."&type=success&msg=Record Updated Successfully!");
      } else {
        header("location:employeeattachments.php?eid=".$_POST['eid']."&type=error&msg=Error in Updating Record!");
      }
      } else {
        $myArray= array(
          "uuid" => $uuid,
          "title"=> mysqli_real_escape_string($obj->con,$_POST['title']),
          "emp_id"=> mysqli_real_escape_string($obj->con,$_POST['eid']),
          "remarks"=> mysqli_real_escape_string($obj->con,$_POST['remarks']),
          "status" => $_POST['status'],
          "file_url" => $target_file,
        "created_at" => $datetime
        );
        if( $obj -> insert_record('employee_attachments',$myArray)) {
          header("location:employeeattachments.php?eid=".$_POST['eid']."&type=success&msg=Record Saved Successfully!");
        } else {
          header("location:employeeattachments.php?eid=".$_POST['eid']."&type=error&msg=Error in Saving Record!");
        }
      }
break;

// Set featured Image
case "set_featured":
if($_REQUEST['pid'] != "") {
  $where= array("service_id"=> $_POST['pid']);
  $myArray= array(
  "status" => 0
  );
  if($obj -> update_record("medias",$where,$myArray)) {
    $nArray= array(
    "status" => $_POST['sts']
    );
    $condition= array("id"=> $_POST['id']);
    $obj -> update_record("medias",$condition,$nArray);
    echo "success";
  } else {
    echo "Error";
  }
}
break;
//Update Status
case "update_status":
$myArray=array();
$where= array("id"=> $_REQUEST['id']);
if($_REQUEST['tbl'] == 'orders') {
  $myArray=array(
        "order_status" => $_REQUEST['sts']
          );
} else if($_REQUEST['tbl'] == 'invoices') {
  $myArray=array(
        "payment_status" => $_REQUEST['sts']
          );
} else {
  $myArray=array(
        "status" => $_REQUEST['sts']
          );
}

if($obj-> update_record($_REQUEST['tbl'],$where,$myArray)) {
echo 'success';
} else {
echo 'error';
}
break;
// Move to Bin
case "move_to_bin":
$myArray=array(
      "is_deleted"=>1,
      "status" => 0
        );
$where= array("id"=> $_REQUEST['id']);
if($obj-> update_record($_REQUEST['tbl'],$where,$myArray)) {
echo 'success';
} else {
echo 'error';
}
break;
case "restore":
$myArray=array(
      "is_deleted"=>0,
      "status" => 0
        );
$where= array("id"=> $_REQUEST['id']);
if($obj-> update_record($_REQUEST['tbl'],$where,$myArray)) {
echo 'success';
} else {
echo 'error';
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
