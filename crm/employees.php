<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Employee";
          $btn="Update";
          }
          else
          {
          $title="Add New Employee";
          $btn="Save";
          }
          $act1='';
          $act2='';
          if(isset($_REQUEST['m'])){
          $act2='active';$act1='';
          }
          else
          {$act1='active';$act2='';}
          ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- Pace page -->Employee Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Employee Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php
          require_once('include/countryCodes.php');
                 $id=$_REQUEST['id']??'';
                     $where= array(
                     "id" => $id,
                     );
                     $BindData=$obj->select_record("employees",$where);
                     $mob=isset($BindData['mobile1']) && $BindData['mobile1'] != ''? explode('-',$BindData['mobile1']) : '';
                     $mob2=isset($BindData['mobile2']) && $BindData['mobile2'] != ''? explode('-',$BindData['mobile2']) : '';
                     $zid=$BindData['zone_id']??'';
                     $conditon= array(
                     "id" => $zid,
                     );
                     $zone=$obj->select_record("zones",$conditon);
                      $dept_id=$BindData['dept_id']??'';
                     $conditon= array(
                     "id" => $dept_id,
                     );
                     $dept=$obj->select_record("departments",$conditon);
                     $designation_id=$BindData['designation_id']??'';
                    $conditon= array(
                    "id" => $designation_id,
                    );
                    $designation=$obj->select_record("designations",$conditon);
                    $condition= array(
                                "emp_id" => $id
                                );
                                $doct=array();
                     // $zone=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from zones where id=".$BindData['zone_id']));
                     // $zones=$zone['title'] !='' ? '<a href="zones.php?id='.$BindData['zone_id'].'" class="btn btn-rainbow1 btn-xs"> '.$zone['title'].'</a>' : 'No Zone Assigned';
$expertise='';
                     $dsc=$obj->fetch_all_record("employee_expertise",$condition);
                                foreach ($dsc as $tempdc) {
                                  array_push($doct,$tempdc['subcategory_id']);
                                  $ttl=mysqli_fetch_assoc(mysqli_query($obj->con,"select title from subcategories where id=".$tempdc['subcategory_id']));
                                $expertise.='<li class="list-group-item d-flex justify-content-between align-items-center">
                              <b>'.$ttl['title'].'</b>
                                  <span class="badge bg-red badge-pill"><i class="fa fa-wrench"></i></span>
                                </li>';
                                }
                     ?>
        <!-- Custom Tabs -->
        <?php
        if(isset($_REQUEST['id']) && $_REQUEST['id'] !="") {
          ?>
          <div class="row">
            <div class="col-md-4 col-xs-12">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-rainbow1">
                          <div class="widget-user-image">
                            <img class="img-responsive img-rounded" src="../<?php echo $BindData['profile_pic_url']; ?>" alt="<?php echo $BindData['name']; ?>" style="width:100px;height:100px;">
                          </div>
                          <!-- /.widget-user-image -->
                          <h3 class="widget-user-username"><?php echo $BindData['name']." <br>( ".$BindData['emp_code']." )</br>"; ?></h3>
                          <h5 class="widget-user-desc"><?php echo $designation['title']; ?></h5>
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a href="#"><?php echo $BindData['mobile1']; ?> <span class="pull-right badge bg-blue"><i class="fa fa-phone"></i></span></a></li>
                            <li><a href="#"><?php echo $BindData['mobile2']; ?> <span class="pull-right badge bg-green"><i class="fa fa-phone"></i></span></a></li>
                            <li><a href="#"><?php echo $BindData['email']; ?> <span class="pull-right badge bg-aqua"><i class="fa fa-envelope"></i></span></a></li>
                            <li><a href="#"><?php echo ucfirst($BindData['gender']); ?> <span class="pull-right badge bg-red"><i class="fa fa-odnoklassniki"></i></span></a></li>
                            <li><a href="#"><?php echo ucfirst($BindData['marital_status']); ?> <span class="pull-right badge bg-green"><i class="fa fa-odnoklassniki"></i></span></a></li>
                            <li><a href="#"><?php echo date_format(date_create($BindData['doj']),'d-M-Y'); ?> <span class="pull-right badge bg-red"><i class="fa fa-calendar"></i></span></a></li>
                            <li><a href="#"><?php echo ucfirst($BindData['type']); ?> <span class="pull-right badge bg-purple"><i class="fa fa-black-tie"></i></span></a></li>
                            <li><a href="#"><?php echo ucfirst($BindData['shift']); ?> <span class="pull-right badge bg-yellow"><i class="fa fa-industry"></i></span></a></li>
                            <li><a href="#"><?php echo ucfirst($BindData['job_type']); ?> <span class="pull-right badge bg-green"><i class="fa fa-hourglass-1"></i></span></a></li>
                          </ul>
                        </div>
                      </div>
                      <!-- /.widget-user -->
                    </div>

                    <div class="col-md-5 col-xs-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Location</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Permanent Address</dt>
                <dd><?php echo $BindData['paddress']; ?></dd>
                <dt>Permanent Pincode</dt>
                <dd><?php echo $BindData['ppincode']; ?></dd>
                <dt>Present Address</dt>
                <dd><?php echo $BindData['caddress']; ?></dd>
                <dt>Pincode</dt>
                <dd><?php echo $BindData['cpincode']; ?></dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- Zones -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Zone Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php
            if($zone['title'] != "") {
              // $city=mysqli_fetch_assoc($obj -> con, "select title from lo")
            ?>
            <dl class="dl-horizontal">
              <dt>Zone Name</dt>
              <dd><?php echo $zone['title']; ?></dd>
              <dt>Manager Name</dt>
              <dd><?php echo $zone['manager_name']; ?></dd>
              <dt>Mobile No.</dt>
              <dd><?php echo $zone['mobile']; ?></dd>
              <dt>Email Id</dt>
              <dd><?php echo $zone['email']; ?></dd>
              <dt>Phone Number</dt>
              <dd><?php echo $zone['phone_no']; ?></dd>
              <dt>Department</dt>
              <dd><?php echo $dept['title']; ?></dd>
              <dt>Designation</dt>
              <dd><?php echo $designation['title']; ?></dd>
            </dl>
            <?php
          } else {
            echo 'Zone not Assigned Yet';
          }
            ?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-3 col-xs-12">
          <!-- <img class="img-responsive img-rounded" src="../<?php echo $BindData['profile_pic_url']; ?>" alt="<?php echo $BindData['name']; ?>" style="height:250px;"> -->
          <ul class="list-group"><li class="list-group-item font-weight-bold">EXPERTISE/ SKILLS</li><?php echo $expertise;?></ul>
        </div>
          </div>
          <div class="clearfix">&nbsp;</div>
        <?php
        }
         ?>

        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-table"></i> List Employees</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="employees">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                         <div class="panel panel-primary">
  <div class="panel-heading"><h4 class="font-weight-bold">Personal Details</h4></div>
  <div class="panel-body">
    <div class="row">
      <div class="form-group col-md-4 col-xs-12">
                 <label for="status">Zones</label>
                 <select class="form-control select2 input-sm" id="zone" name="zone_id">
           <option value="">Please Select</option>
           <?php
           $where= array(
           "status" => 1,
           );
           $zones=$obj->fetch_all_record("zones",$where);
           foreach ($zones as $s) {
           ?>
           <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['zone_id']) && $BindData['zone_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
           <?php
         }
           ?>
         </select>
               </div>
               <div class="form-group col-md-4 col-xs-12">
                          <label for="status">Department</label>
                          <select class="form-control select2 input-sm" id="department" name="dept_id" onchange="javascript:getDesignation(this.value);" required>
                    <option value="">Please Select</option>
                    <?php
                    $where= array(
                    "status" => 1,
                    );
                    $dept=$obj->fetch_all_record("departments",$where);
                    foreach ($dept as $s) {
                    ?>
                    <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['dept_id']) && $BindData['dept_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                    <?php
                  }
                    ?>
                  </select>
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                                   <label for="status">Designations</label>
                                   <select class="form-control input-sm select2" id="designation" name="designation_id" >
                                          <option value="">Please Select</option>
                                          <?php
                                          $did=$BindData['dept_id'] ?? '0';
                                          $where= array(
                                          "dept_id"=> $did,
                                          "status" => 1
                                          );
                                          $desig=$obj->fetch_all_record("designations",$where);
                                          foreach ($desig as $s) {

                                          ?>
                                          <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['designation_id']) && $BindData['designation_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                                          <?php
                                        }
                                          ?>
                                        </select>
                                 </div>
      <div class="form-group col-md-4 col-xs-12">
                <label for="title">Employee Name</label>
                <input type="text" class="form-control input-sm" name="name" placeholder="Enter Employee Name" maxlength="300" value="<?php echo $t=$BindData['name'] ?? ''; ?>" required>
              </div>

              <!-- <div class="form-group col-md-3 col-xs-12">
      <label for="title">Owner Name</label>
      <input type="text"  name="owner_name" placeholder="Enter Owner Name" class="form-control input-sm" maxlength="200" value="<?php echo $cf=$BindData['owner_name'] ?? ''; ?>" >
               </div> -->

               <div class="form-group col-md-1 col-xs-12">
                 <label for="title">Country</label>
                 <select name="countryCode1" class="form-control select21 input-sm" >

                    <?php
                    foreach($countryArray as $code => $country){
                        $countryName = ucwords(strtolower($country["name"])); // Making it look good
                        ?>
                        <option  value="+<?php echo $country["code"]; ?>" <?php echo $cc=isset($mob[0]) && $mob[0]==$country["code"] ? 'selected=selected' :''; ?>><?php echo $countryName." (+".$country["code"].")"; ?> </option>
                    <?php
                    //$output .= "<option value='".$country["code"]."' ".(($code==strtoupper($defaultCountry))?"selected":"").">".$code." - ".$countryName." (+".$country["code"].")</option>";
                      }
                    ?>

                  </select>
               </div>
              <div class="form-group col-md-3 col-xs-12">
                        <label for="title">Mobile Number</label>
      <input id="name5" type="tel"  name="mobile1" placeholder="Enter Mobile Number" class="form-control input-sm" maxlength="10" value="<?php echo $af=$mob[1] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
               </div>
               <div class="form-group col-md-1 col-xs-12">
                 <label for="title">Country</label>
                 <select name="countryCode2" class="form-control select21 input-sm" >

                    <?php
                    foreach($countryArray as $code => $country){
                        $countryName = ucwords(strtolower($country["name"])); // Making it look good
                        ?>
                        <option  value="+<?php echo $country["code"]; ?>" <?php echo $cc=isset($mob2[0]) && $mob2[0]==$country["code"] ? 'selected=selected' :''; ?>><?php echo $countryName." (+".$country["code"].")"; ?> </option>
                    <?php
                    //$output .= "<option value='".$country["code"]."' ".(($code==strtoupper($defaultCountry))?"selected":"").">".$code." - ".$countryName." (+".$country["code"].")</option>";
                      }
                    ?>

                  </select>
               </div>
               <div class="form-group col-md-3 col-xs-12">
                         <label for="title">Alt Mobile Number</label>
      <input id="name6" type="tel"  name="mobile2" placeholder="Enter Alt Mobile Number" class="form-control input-sm" maxlength="10" value="<?php echo $af=$mob2[1] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" >
                </div>

               <div class="form-group col-md-3 col-xs-12">
                         <label for="title">Email</label>
                         <input type="email" class="form-control input-sm" name="email" placeholder="Enter Email" maxlength="100" value="<?php echo $t=$BindData['email'] ?? ''; ?>" required>
                       </div>

                              <div class="form-group  col-md-3 col-xs-12">
                                         <label for="status">Gender</label>
                                         <select name="gender" class="form-control input-sm" >
                                           <option value="male" <?php echo  $gt=isset($BindData['gender']) && $BindData['gender']=='male' ? 'selected=selected' :''; ?>>Male</option>
                                           <option value="female" <?php echo $gt=isset($BindData['gender']) && $BindData['gender']=='female' ? 'selected=selected' :''; ?>>Female</option>
                                     <option value="other" <?php echo $gt=isset($BindData['gender']) && $BindData['gender']=='other' ? 'selected=selected' :''; ?>>Other</option>

                                   </select>
                                       </div>
                                       <div class="form-group  col-md-3 col-xs-12">
                                                  <label for="status">Marital Status</label>
                                                  <select name="marital_status" class="form-control input-sm" >
                                                    <option value="single" <?php echo $gt=isset($BindData['marital_status']) && $BindData['marital_status']=='single' ? 'selected=selected' :''; ?>>Single</option>
                                                    <option value="married" <?php echo $gt=isset($BindData['marital_status']) && $BindData['marital_status']=='married' ? 'selected=selected' :''; ?>>Married</option>
                                              <option value="divorced" <?php echo $gt=isset($BindData['marital_status']) && $BindData['marital_status']=='divorced' ? 'selected=selected' :''; ?>>Divorced</option>

                                            </select>
                                                </div>
                                                <div class="form-group col-md-3 col-xs-12">
                                                <label for="title">Profile Picture <small class="text-danger">*accept only .jpg,.png,files </small></label>
                                                <?php
                                                if(isset($BindData['profile_pic_url']) && $BindData['profile_pic_url'] !="")
                                                {
                                                ?>
                                                <a href="../<?php echo $BindData['profile_pic_url'];?>" style="cursor:pointer;" class="btn btn-success btn-xs pull-right" target="_blank"><i class="fa fa-eye" ></i> View Attachment</a>
                                                <?php
                                                }
                                                ?>
                                                <input type="file" name="source" class="form-control input-sm" accept="image/*"/>

                                                         <input type="hidden" value="<?php echo $fl=$BindData['profile_pic_url']?? '';?>" name="old-logo">
                                                       </div>
                                                <div class="form-group col-md-3 col-xs-12">
                                                          <label for="title">Nationality</label>
                                                          <input type="text" class="form-control input-sm" name="nationality" placeholder="Enter Nationality" maxlength="50" value="<?php echo $t=$BindData['nationality'] ?? 'Indian'; ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-3 col-xs-12">
                                                            <label for="title">Aadhar Card Number</label>
                                                            <input type="text" class="form-control input-sm" name="aadhar_card_number" placeholder="Enter Aadhaar Card Number" maxlength="20" value="<?php echo $act=$BindData['aadhar_card_number'] ?? ''; ?>" required>
                                                          </div>
                                                      <div class="form-group col-md-3 col-xs-12">
                                                          <label for="title">PAN Card Number</label>
                                                          <input type="text" class="form-control input-sm" name="pan_number" placeholder="Enter PAN Card Number" maxlength="20" value="<?php echo $pt=$BindData['pan_number'] ?? ''; ?>" required>
                                                        </div>
                              <div class="form-group  col-md-3 col-xs-12">
                                         <label for="status">Status</label>
                                         <select name="status" class="form-control input-sm" >
                                     <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Active</option>
                                     <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>Inactive</option>

                                   </select>
                                       </div>
                                       <div class="form-group col-xs-12">
                               <label for="title">Password: </label>
                               <span class="text-danger"> <?php echo $p=$BindData['password'] ?? ''; ?></span>
                               <label class="col-xs-12" id="upass">
                                              <input type="checkbox" name="upass" onchange="javascript:UpdatePass(this)" value="1">
                                          Do you want to Update Password?
                                       </label>
                               <input type="text"  name="password" placeholder="Set New Password" class="form-control input-sm upass" maxlength="200" style="display:none;">
                               <input type="hidden" name="oldp" value="<?php echo $p=$BindData['password'] ?? ''; ?>">
                                </div>
    </div>
  </div>
</div>    <!-- End Panel 1-->
<div class="panel panel-primary">
  <div class="panel-heading"><h4 class="font-weight-bold"> Address </h4></div>
  <div class="panel-body">
    <div class="row">
      <div class="form-group col-xs-12">
                <label for="title">Permanent Address</label>
                 <textarea class="form-control input-sm" name="paddress" placeholder="Enter Address" id="paddress"required><?php echo $r=$BindData['paddress'] ?? ''; ?></textarea>
       </div>

       <div class="form-group col-xs-12 col-md-4">
                  <label for="status">State</label>
                  <select class="form-control input-sm select2"  name="pstate_id" id="pstate_id" onchange="javascript:getCity(this.value);" required>
                         <option value="">Please Select</option>
                         <?php

                          $country=mysqli_query($obj->con,"SELECT country FROM `states` where status=1 group by country");
                          foreach ($country as $s) {
                            $condition= array(
                            "country" => $s['country'],
                             "status" => 1
                            );
                          echo  '<optgroup label="'.$s['country'].'">';
                          $states=$obj->fetch_all_record("states",$condition);
                          foreach ($states as $s2) {
                          ?>
                          <option value="<?php echo $s2['id']; ?>" <?php echo $st=isset($BindData['pstate_id']) && $BindData['pstate_id']==$s2['id'] ? 'selected=selected' :''; ?>><?php echo $s2['title'];?></option>
                          <?php
                        }
                          echo '</optgroup>';
                        }
                          ?>
                       </select>
                </div>

                         <div class="form-group col-md-4 col-xs-12">
                                    <label for="status">City</label>
                                    <select class="form-control input-sm select2" id="city" name="pcity_id" >
                                           <option value="">Please Select</option>
                                           <?php
                                           $sid=$BindData['pstate_id'] ?? '0';
                                           $where= array(
                                           "state_id"=> $sid,
                                           "status" => 1
                                           );
                                           $city=$obj->fetch_all_record("cities",$where);
                                           foreach ($city as $s) {

                                           ?>
                                           <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['pcity_id']) && $BindData['pcity_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                                           <?php
                                         }
                                           ?>
                                         </select>
                                  </div>
         <div class="form-group col-md-4 col-xs-12">
                   <label for="title">Pincode</label>
       <input  type="tel"  name="ppincode" id="ppincode" placeholder="Enter Pincode " class="form-control input-sm" maxlength="6" value="<?php echo $af=$BindData['ppincode'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
     </div>
     <label class=" col-xs-12" id="saddress">
                    <input type="checkbox" name="saddress" id="scheck" onchange="javascript:CheckUpdate(this)" value="1">
                  Is Permanent Address is Same as Present Address?
             </label>
<hr/>
<div class="form-group col-xs-12 fe">
          <label for="title">Present/ Current Address</label>
           <textarea class="form-control input-sm" name="caddress" id="caddress" placeholder="Enter Present/ Current  Address"><?php echo $r=$BindData['caddress'] ?? ''; ?></textarea>
 </div>

 <div class="form-group col-xs-12 col-md-4 fe">
            <label for="status">State</label>
            <select class="form-control input-sm select2"  name="cstate_id" id="cstate_id" onchange="javascript:getCity(this.value,1);">
                   <option value="">Please Select</option>
                   <?php

                    $country=mysqli_query($obj->con,"SELECT country FROM `states` where status=1 group by country");
                    foreach ($country as $s) {
                      $condition= array(
                      "country" => $s['country'],
                       "status" => 1
                      );
                    echo  '<optgroup label="'.$s['country'].'">';
                    $states=$obj->fetch_all_record("states",$condition);
                    foreach ($states as $s2) {
                    ?>
                    <option value="<?php echo $s2['id']; ?>" <?php echo $st=isset($BindData['cstate_id']) && $BindData['cstate_id']==$s2['id'] ? 'selected=selected' :''; ?>><?php echo $s2['title'];?></option>
                    <?php
                  }
                    echo '</optgroup>';
                  }
                    ?>
                 </select>
          </div>

                   <div class="form-group col-md-4 col-xs-12 fe">
                              <label for="status">City</label>
                              <select class="form-control input-sm select2" id="ccity" name="ccity_id" >
                                     <option value="">Please Select</option>
                                     <?php
                                     $sid=$BindData['cstate_id'] ?? '0';
                                     $where= array(
                                     "state_id"=> $sid,
                                     "status" => 1
                                     );
                                     $city=$obj->fetch_all_record("cities",$where);
                                     foreach ($city as $s) {

                                     ?>
                                     <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['ccity_id']) && $BindData['ccity_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                                     <?php
                                   }
                                     ?>
                                   </select>
                            </div>
   <div class="form-group col-md-4 col-xs-12 fe">
             <label for="title">Pincode</label>
 <input type="tel"  name="cpincode" placeholder="Enter Pincode " id="cpincode" class="form-control input-sm" maxlength="6" value="<?php echo $af=$BindData['cpincode'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" >
</div>

    </div>
  </div>
</div> <!-- End Panel 2-->
<div class="panel panel-primary">
  <div class="panel-heading"><h4 class="font-weight-bold"> Job Details </h4></div>
  <div class="panel-body">
    <div class="row">
      <div class="form-group col-md-4 col-xs-12">
        <label for="title">Date of Joining</label>
        <input type="date"  name="doj" placeholder="Enter Joining Date " class="form-control input-sm" maxlength="60" value="<?php echo $af=$BindData['doj'] ?? ''; ?>">
       </div>
       <div class="form-group  col-md-4 col-xs-12">
                  <label for="status">Qualification</label>
                  <select name="qualification" class="form-control">
                        <option  value="">Please Select</option>
                        <option <?php if(isset($BindData['qualification']) && $BindData['qualification'] == 'Below 10th') { echo 'selected=selected'; }?> value="Below 10th">Below 10th</option>
                        <option <?php if(isset($BindData['qualification']) && $BindData['qualification'] == '10th Pass') { echo 'selected=selected'; }?> value="10th Pass">10th Pass</option>
                        <option <?php if(isset($BindData['qualification']) && $BindData['qualification'] == '10+2 Pass') { echo 'selected=selected'; }?> value="10+2 Pass">10+2 Pass</option>
                        <option <?php if(isset($BindData['qualification']) && $BindData['qualification'] == 'Diploma') { echo 'selected=selected'; }?> value="Diploma">Diploma</option>
                        <option <?php if(isset($BindData['qualification']) && $BindData['qualification'] == 'Graduate') { echo 'selected=selected'; }?> value="Graduate">Graduate</option>
                        <option <?php if(isset($BindData['qualification']) && $BindData['qualification'] == 'Masters') { echo 'selected=selected'; }?> value="Masters">Masters</option>
                        <option <?php if(isset($BindData['qualification']) && $BindData['qualification'] == 'Phd') { echo 'selected=selected'; }?> value="Phd">Phd</option>
                   </select>
                </div>
                <div class="form-group  col-md-4 col-xs-12">
                           <label for="status">Experience</label>
                           <select class="form-control" name="experience">
                          <option  value="">Please Select</option>
                           <option <?php if(isset($BindData['experience']) && $BindData['experience'] == 'Less than 1 Year') { echo 'selected=selected'; }?> value="Less than 1 Year">Less than 1 Year</option>
                           <option <?php if(isset($BindData['experience']) && $BindData['experience'] == '2 Year') { echo 'selected=selected'; }?> value="2 Year">2 Year</option>
                           <option <?php if(isset($BindData['experience']) && $BindData['experience'] == '3 Year') { echo 'selected=selected'; }?> value="3 Year">3 Year</option>
                           <option <?php if(isset($BindData['experience']) && $BindData['experience'] == '4 Year') { echo 'selected=selected'; }?> value="4 Year">4 Year</option>
                           <option <?php if(isset($BindData['experience']) && $BindData['experience'] == '5 Year') { echo 'selected=selected'; }?> value="5 Year">5 Year</option>
                           <option <?php if(isset($BindData['experience']) && $BindData['experience'] == 'Over 5 Year') { echo 'selected=selected'; }?> value="Over 5 Year">Over 5 Year</option>
                         </select>
                         </div>
         <div class="form-group  col-md-4 col-xs-12">
                    <label for="status">Employee Type</label>
                    <select name="type" class="form-control input-sm" >
                      <option value="inhouse" <?php echo $gt=isset($BindData['type']) && $BindData['type']=='inhouse' ? 'selected=selected' :''; ?>>Inhouse</option>
                      <option value="outsource" <?php echo $gt=isset($BindData['type']) && $BindData['type']=='outsource' ? 'selected=selected' :''; ?>>Outsource</option>
              </select>
                  </div>

                  <div class="form-group  col-md-4 col-xs-12">
                             <label for="status">Shift Type</label>
                             <select name="shift" class="form-control input-sm" >
                               <option value="day" <?php echo $gt=isset($BindData['shift']) && $BindData['shift']=='day' ? 'selected=selected' :''; ?>>Day</option>
                               <option value="night" <?php echo $gt=isset($BindData['shift']) && $BindData['shift']=='night' ? 'selected=selected' :''; ?>>Night</option>

                       </select>
                           </div>
                           <div class="form-group  col-md-4 col-xs-12">
                                      <label for="status">Job Type</label>
                                      <select name="job_type" class="form-control input-sm" >
                                        <option value="fulltime" <?php echo $gt=isset($BindData['job_type']) && $BindData['job_type']=='fulltime' ? 'selected=selected' :''; ?>>Full Time</option>
                                        <option value="parttime" <?php echo $gt=isset($BindData['job_type']) && $BindData['job_type']=='parttime' ? 'selected=selected' :''; ?>>Part Time</option>

                                </select>
                                    </div>
                        <div class="form-group col-md-4 col-xs-12">
                          <label for="title">Biometric Employee Code</label>
                          <input type="tel"  name="bio_empcode" placeholder="Enter Biometric Employee Code< " class="form-control input-sm" maxlength="60" value="<?php echo $af=$BindData['bio_empcode'] ?? ''; ?>">
                         </div>
                         <div class="form-group col-md-4 col-xs-12">
                           <label for="title">Provident Fund Account No.</label>
                           <input type="text"  name="pf_no" placeholder="Enter Provident Fund Account No " class="form-control input-sm" maxlength="60" value="<?php echo $af=$BindData['pf_no'] ?? ''; ?>">
                          </div>
                          <div class="form-group col-md-4 col-xs-12">
                            <label for="title">ESIC Number</label>
                            <input type="text"  name="esic_no" placeholder="Enter ESIC No " class="form-control input-sm" maxlength="60" value="<?php echo $af=$BindData['esic_no'] ?? ''; ?>">
                           </div>

        </div>
  </div>
</div> <!-- panel 5-->
<div class="panel panel-primary">
  <div class="panel-heading"><h4 class="font-weight-bold"> Bank Details </h4></div>
  <div class="panel-body">
  <div class="row">
    <div class="form-group col-md-4 col-xs-12">
        <label for="title">Bank Name</label>
        <input type="text" class="form-control input-sm" name="bank_name" placeholder="Enter Bank Name" maxlength="200" value="<?php echo $pt=$BindData['bank_name'] ?? ''; ?>" >
      </div>
      <div class="form-group col-md-4 col-xs-12">
          <label for="title">Account Holder Name</label>
          <input type="text" class="form-control input-sm" name="acc_holder_name" placeholder="Enter Account Holder Name" maxlength="200" value="<?php echo $pt=$BindData['acc_holder_name'] ?? ''; ?>" >
        </div>
        <div class="form-group col-md-4 col-xs-12">
            <label for="title">Branch</label>
            <input type="text" class="form-control input-sm" name="branch" placeholder="Enter Branch" maxlength="100" value="<?php echo $pt=$BindData['branch'] ?? ''; ?>" >
          </div>
          <div class="form-group col-md-4 col-xs-12">
              <label for="title">IFSC Code</label>
              <input type="text" class="form-control input-sm" name="ifsc_code" placeholder="Enter IFSC Code" maxlength="100" value="<?php echo $pt=$BindData['ifsc_code'] ?? ''; ?>" >
            </div>
            <div class="form-group col-md-4 col-xs-12">
                <label for="title">Account Number</label>
                <input type="text" class="form-control input-sm" name="acc_number" placeholder="Enter Account Number" maxlength="100" value="<?php echo $pt=$BindData['acc_number'] ?? ''; ?>" >
              </div>
              <div class="form-group col-md-4 col-xs-12">
                  <label for="title">UPI ID</label>
                  <input type="text" class="form-control input-sm" name="upi_id" placeholder="Enter UPI ID" maxlength="100" value="<?php echo $pt=$BindData['upi_id'] ?? ''; ?>" >
                </div>

  </div>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading"><h4 class="font-weight-bold"> Skills/ Expertise </h4></div>
<div class="panel-body">
  <div class="row">
    <?php
                   $where= array(
                   "status" => 1
                   );
                   $sc=$obj->fetch_all_record("subcategories",$where);
                   foreach ($sc as $d) {

                   ?>
                   <label class="col-md-3 col-sm-3 col-xs-12" id="mysubtype">
              <input type="checkbox" value="<?php echo $d['id']; ?>" <?php echo $scd=(in_array($d['id'], $doct)) ? 'checked' : '' ; ?> class="flat-red" name="skill[]" >
             <?php echo $d['title']; ?>
       </label>
                   <?php
                   }
                   ?>
  </div>
</div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading"><h4 class="font-weight-bold"> Amenities </h4></div>
  <div class="panel-body">
    <div class="row">
      <div class="form-group col-md-3 col-xs-12">
            <p for="title" class="font-weight-bold">Bike Available?  </p>
            <label>
                 <input type="radio" name="bike_available" class="flat-red" <?php echo $bk=isset($BindData['bike_available']) && $BindData['bike_available']=='yes' ? 'checked' :''; ?> value="yes"> Yes
               </label>&nbsp; &nbsp;
               <label>
                 <input type="radio" name="bike_available" class="flat-red" value="no" <?php echo $bk=isset($BindData['bike_available']) && $BindData['bike_available']=='no' ? 'checked' :''; ?>> No
               </label>

      </div>
      <div class="form-group col-md-3 col-xs-12">
            <p for="title" class="font-weight-bold">Driving Licence Available?  </p>
            <label>
                 <input type="radio" name="driving_licence" class="flat-red" <?php echo $bk=isset($BindData['driving_licence']) && $BindData['driving_licence']=='yes' ? 'checked' :''; ?> value="yes" > Yes
               </label>&nbsp; &nbsp;
               <label>
                 <input type="radio" name="driving_licence" class="flat-red" value="no" <?php echo $bk=isset($BindData['driving_licence']) && $BindData['driving_licence']=='no' ? 'checked' :''; ?> > No
               </label>

      </div>
      <div class="form-group col-md-3 col-xs-12">
            <p for="title" class="font-weight-bold">Tools Available?  </p>
            <label>
                 <input type="radio" name="tools_available" class="flat-red" <?php echo $bk=isset($BindData['tools_available']) && $BindData['tools_available']=='yes' ? 'checked' :''; ?>  value="yes"> Yes
               </label>&nbsp; &nbsp;
               <label>
                 <input type="radio" name="tools_available" class="flat-red" value="no" <?php echo $bk=isset($BindData['tools_available']) && $BindData['tools_available']=='no' ? 'checked' :''; ?>> No
               </label>

      </div>
      <div class="form-group col-md-3 col-xs-12">
            <p for="title" class="font-weight-bold">Computer Skill?  </p>
            <label>
                 <input type="radio" name="computer_skill" class="flat-red"  value="yes" <?php echo $bk=isset($BindData['computer_skill']) && $BindData['computer_skill']=='yes' ? 'checked' :''; ?>> Yes
               </label>&nbsp; &nbsp;
               <label>
                 <input type="radio" name="computer_skill" class="flat-red" value="no" <?php echo $bk=isset($BindData['computer_skill']) && $BindData['computer_skill']=='no' ? 'checked' :''; ?>> No
               </label>
      </div>
    </div>
  </div>
</div>


                <div class="row">
              <div class="col-xs-12">
                <!-- <div class="form-group">
                    <label for="title">Process Layouts</label>
                    <textarea class="form-control input-sm ckeditor" name="remarks" placeholder="Enter Process Layouts"><?php echo $r=$BindData['process_layouts'] ?? ''; ?></textarea>
                  </div> -->
                <div class="form-group text-center ">
                <button type="submit" class="btn btn-primary" ><?php echo $btn; ?></button>
                </div>
              </div><!-- End Col 3 -->
            </div><!-- end row-->
              </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php echo $act2;?>" id="tab_2">
                <div class="box">

                           <!-- /.box-header -->
                           <div class="box-body table-responsive">
                             <div class="row">
                               <div class="form-group col-xs-12">
                                          <label for="status">Skills</label>
                                          <select class="form-control input-sm select2" id="subCategory"  >
                                                 <option value="">Please Select</option>
                                                 <?php
                                                 $where= array(
                                                 "status" => 1
                                                 );
                                                 $subcategory=$obj->fetch_all_record("subcategories",$where);
                                                 foreach ($subcategory as $s) {

                                                 ?>
                                                 <option value="<?php echo $s['id']; ?>"><?php echo $s['title'];?></option>
                                                 <?php
                                               }
                                                 ?>
                                               </select>
                                        </div>
                               <div class="form-group col-md-2 col-xs-12">
                                          <label for="status">Zones</label>
                                          <select class="form-control select2 input-sm" id="zones" name="zone_id">
                                    <option value="">All</option>
                                    <?php
                                    $where= array(
                                    "status" => 1,
                                    );
                                    $zones=$obj->fetch_all_record("zones",$where);
                                    foreach ($zones as $s) {
                                    ?>
                                    <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['zone_id']) && $BindData['zone_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                                    <?php
                                  }
                                    ?>
                                  </select>
                                        </div>
                                        <div class="form-group col-md-3 col-xs-12">
                                                   <label for="status">Department</label>
                                                   <select class="form-control select2 input-sm" id="dept" name="dept_id" onchange="javascript:getDesignation(this.value,1);">
                                             <option value="">All</option>
                                             <?php
                                             $where= array(
                                             "status" => 1,
                                             );
                                             $dept=$obj->fetch_all_record("departments",$where);
                                             foreach ($dept as $s) {
                                             ?>
                                             <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['dept_id']) && $BindData['dept_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                                             <?php
                                           }
                                             ?>
                                           </select>
                                                 </div>
                                                 <div class="form-group col-md-3 col-xs-12">
                                                            <label for="status">Designations</label>
                                                            <select class="form-control input-sm select2" id="desig" name="designation_id" >
                                                                   <option value="">All</option>
                                                                   <?php
                                                                   $did=$BindData['dept_id'] ?? '0';
                                                                   $where= array(
                                                                   "dept_id"=> $did,
                                                                   "status" => 1
                                                                   );
                                                                   $desig=$obj->fetch_all_record("designations",$where);
                                                                   foreach ($desig as $s) {

                                                                   ?>
                                                                   <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['designation_id']) && $BindData['designation_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                                                                   <?php
                                                                 }
                                                                   ?>
                                                                 </select>
                                                          </div>
                                                          <div class="form-group  col-md-2 col-xs-12">
                                                                     <label for="status">Employee Type</label>
                                                                     <select name="type" class="form-control input-sm select2" id="type" >
                                                                       <option value="">All</option>
                                                                       <option value="inhouse" <?php echo $gt=isset($BindData['type']) && $BindData['type']=='inhouse' ? 'selected=selected' :''; ?>>Inhouse</option>
                                                                       <option value="outsource" <?php echo $gt=isset($BindData['type']) && $BindData['type']=='outsource' ? 'selected=selected' :''; ?>>Outsource</option>
                                                               </select>
                                                          </div>
                             <div class="form-group col-md-2 col-xs-12">
                               <label>&nbsp;</label><br/>
                               <button class="btn btn-default" id="btnSearch"><i class="fa fa-search"></i> Search</button> &nbsp;
                               <button class="btn btn-default" onclick="RefreshView();"><i class="fa fa-refresh"></i> </button>
                             </div>
                           </div>

                             <table id="memListTable" class="table table-hover table-striped">
                               <thead>
                                 <tr>
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>Sno</th>
                                <th>emp id</th>
                                <th>details</th>
                                <th>job details</th>
                                <th>skills</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                               </thead>
                               <tbody id="tbody">

                               </tbody>
                                 <tfoot>
                                 <tr>
                                 <th>id</th>
                                 <th>Sno</th>
                                 <th>emp id</th>
                                 <th>Details</th>
                                 <th>job details</th>
                                 <th>skills</th>
                                 <th>Status</th>
                                  <th>Action</th>
                               </tr>
                               </tfoot>
                             </table>
                           </div>
                           <!-- /.box-body -->
                      </div>
              </div>
              <!-- /.tab-pane -->
              <!-- <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div> -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
      </div>
</section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php');?>
  <script>
  function 	RefreshView() {
  	self.location="employees.php?m=active";

}
$(function () {
fill_datatable();
function fill_datatable(zone = '', dept = '' , designation=' ', type= '', subcategory=''){
$('#memListTable').DataTable({
     'processing': true,
     'serverSide': true,
     'serverMethod': 'post',
     'aaSorting' : [[0, 'desc']],
     'ajax': {
         'url':'api-controller.php?action=get_employees',
         'type':'POST',
         'data':{
          zone_id:zone,dept_id:dept,designation_id:designation,type:type,expertise:subcategory
         }
     },
     'columns': [
       { data: 'id', name: 'id', "visible": false,searchable:false },
         { data: 'sno', name: 'sno' },
          { data: 'emp_id', name: 'emp_id' },
          { data: 'details', name: 'title' },
          { data: 'job_details', name: 'job_details' },
         { data: 'skills', name: 'skills' },
         { data: 'status', name: 'status' },
         { data: 'actions', name: 'actions', orderable: true, searchable: true }
         ]
  });
}
  $('#btnSearch').click(function(){
  var zone = $('#zones').val();
  var dept = $('#dept').val();
  var designation = $('#desig').val();
  var type = $('#type').val();
  var subcategory = $('#subCategory').val();
  if(zone != '' || dept != '' || designation != "" || type !="" || subcategory !='')
  {
  $('#memListTable').DataTable().destroy();
  fill_datatable(zone, dept, designation, type, subcategory);
  }
  else
  {
  alert('Select All filter option');
  $('#memListTable').DataTable().destroy();
  fill_datatable();
  }
  });
 });
function CheckUpdate(ele) {
        if(ele.checked) {
          var address= $('#paddress').val() ? $('#paddress').val() : 'undefined';
          var state= $('#pstate_id').val() ? $('#pstate_id').val() : 'undefined';
          var city= $('#city').val() ? $('#city').val() : 'undefined';
          var pincode= $('#ppincode').val() ? $('#ppincode').val() : 'undefined';
            if( address != "undefined"  && state != "undefined" && city != "undefined" && pincode != "undefined") {
              // alert($('#paddress').val()+" "+$('#pstate_id').val()+" "+$('#city').val()+" "+$('#ppincode').val());

              $('.fe').hide();
              // $('#cstate_id').hide();
              // $('#ccity').hide();
              // $('#cpincode').hide();
            } else {
              ele.checked=false;
              alert("Permanent Address, state, city and pincode should not be blank");
            }
        } else {
          // alert("unchecked");
            // $(".select2").select2();
          $('.fe').show();

        }

    }

    function UpdatePass(ele) {
      if(ele.checked) {
        $('.upass').show();
      } else {
        ele.checked=false;
        $('.upass').hide();
      }
    }

    $(document).on("click", ".open-AddBookDialog", function () {
        var myBookId = $(this).data('id');
        var myBooktitle="Employee ID: "+$(this).data('title');
        var tbl=$(this).data('tbl');
		$(".modal-dialog").css("width", "80%");
        if(myBookId != "") {
          $.ajax({
              type: "POST",
              url: "api-controller.php",
              data: {
                  action: 'get_employee_records',tbl:'employees',id:myBookId
              },
               async: true,
               dataType: "json",
               success: function(data) {
                  // document.getElementById("loader")
                  //     .style.display = "none";
                  var dynHTML = '';
                  if (data.RESPONSE_CODE == '2XX') {
                      var allData = data.DATA;


					var job_detail = '<tr><th>Employee Name</th><td>'+allData['data'].name+'</td><th>Designation</th><td>'+allData['data'].designation+'</td></tr><tr><th>Zone</th><td>'+allData['data'].zone+'</td><th>Department</th><td>'+allData['data'].department+'</td></tr><tr><th>Date of Joining</th><td>'+allData['data'].doj+'</td><th>Qualification</th><td style="text-transform:capitalize;">'+allData['data'].qualification+'</td></tr><tr><th>Job Type</th><td style="text-transform:capitalize;">'+allData['data'].type+'-'+allData['data'].shift+'-'+allData['data'].job_type+'</td><th>Experience</th><td>'+allData['data'].experience+'</td></tr>';

          var bank_detail = '<tr><th>Bank Name</th><td>'+allData['data'].bank_name+'</td><th>Branch</th><td>'+allData['data'].branch+'</td></tr><tr><th>Account Number</th><td>'+allData['data'].acc_number+'</td><th>IFSC Code</th><td>'+allData['data'].ifsc_code+'</td></tr><tr><th>Account Holder Name</th><td>'+allData['data'].acc_holder_name+'</td><th>UPI ID</th><td>'+allData['data'].upi_id+'</td></tr>';

          var  references='<tr><th>Name</th><th>Relation</th><th>Mobile No.</th><th>Email</th></tr>';
					var ref=allData['reference'];
					for(i=0;i< ref.length;i++) {
						//console.log(ser[i].standard);
							references +='<tr><td><p class="text-success"><i class="fa fa-user"></i> '+ref[i].name+'</p></td><td>'+ref[i].relation+'</td><td><p class="text-danger"><i class ="fa fa-phone"></i>'+ref[i].mobile1+'</p><p class="text-success"><i class="fa fa-phone"></i>'+ref[i].mobile2+'</p></td><td><i class ="fa fa-envelope"></i> '+ref[i].email+'</td></tr>';
					}

          var exp=allData['expertise'];
          exps='';

          for(i=0;i<exp.length; i++) {
            exps+='<div class="col-md-3 col-xs-6" style="font-size:13px;margin:2px;"><p class="label label-success" ><i class="fa fa-wrench"></i> '+ exp[i].title+'</p></div>';
          }
          var expertise='<div class="row">'+exps+'</div>';
          var bike= (allData['data'].bike_available =='yes') ? '<span class="label label-success" ><i class="fa fa-check"></i>Yes</span>': '<span class="label label-danger" ><i class="fa fa-times"></i>No</span>';
          var dl= (allData['data'].driving_licence =='yes') ? '<span class="label label-success" ><i class="fa fa-check"></i>Yes</span>': '<span class="label label-danger" ><i class="fa fa-times"></i>No</span>';
          var tool= (allData['data'].tools_available =='yes') ? '<span class="label label-success" ><i class="fa fa-check"></i>Yes</span>': '<span class="label label-danger" ><i class="fa fa-times"></i>No</span>';
          var computer= (allData['data'].computer =='yes') ? '<span class="label label-success" ><i class="fa fa-check"></i>Yes</span>': '<span class="label label-danger" ><i class="fa fa-times"></i>No</span>';

          var amenities='<tr><th>Bike Available?</th><td>'+bike+'</td><th>Driving Licence Available?</th><td>'+dl+'</td></tr><tr><th> Tools Available?</th><td>'+tool+'</td><th>Computer Skill?</th><td>'+computer+'</td></tr>';



          var personal_detail='<tr><th>Permanent Address</th><td>'+allData['data'].paddress+'</td><th>Current Address</th><td>'+allData['data'].caddress+'</td></tr><tr><th>Mobile</th><td>'+allData['data'].mobile1+'</td><th>Alt. Mobile</th><td>'+allData['data'].mobile2+'</td></tr><tr><th>Email ID</th><td>'+allData['data'].email+'</td><th>Nationality</th><td>'+allData['data'].nationality+'</td></tr><tr><th>Gender</th><td style="text-transform:capitalize;">'+allData['data'].gender+'</td><th>Marital Status</th><td style="text-transform:capitalize;">'+allData['data'].marital_status+'</td></tr><tr><th>Adhaar Number</th><td>'+allData['data'].aadhar_card_number+'</td><th>PAN Card Number</th><td>'+allData['data'].pan_number+'</td></tr>';

					var attachments='<tr><th>Title</th><th>Files</th><th>Remarks</th></tr>';
					var at=allData['attachment'];
					// console.log(allData['attachment']);
					for(i=0;i< at.length;i++) {
						// console.log(at);
							attachments +='<tr><td>'+at[i].title+'</td><th><a href="../'+at[i].file_url+'" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i> View File</a></th><td>'+at[i].remarks+'</td></tr>';
					}

					// var phases='<tr><th>Title</th><th>Description</th><th>Start Date</th><th>End Date</th><th>Status</th></tr>';
					// var ph=allData['phases'];
					// console.log(allData['phases']);
					// for(i=0;i< ph.length;i++) {
					// 	console.log(at);
					// 		phases +='<tr><td>'+ph[i].title+'</td><td>'+ph[i].description+'</td><td>'+date_format(ph[i].start_date)+'</td><td>'+date_format(ph[i].end_date)+'</td><td>'+ph[i].project_status+'</td></tr>';
					// }
					// var payment='<tr><th>Transaction ID</th><th>Amount</th><th>Mode</th><th>Payment Date</th><th>Attachment</th><th>Description</th><th>Credited to/Received by</th></tr>';
					// var ps=allData['payment'];
					// console.log(allData['payment']);
					// for(i=0;i< ps.length;i++) {
					// 	console.log(at);
					// 		payment +='<tr><td>'+ps[i].transaction_id+'</td><td><p class="text-success"> <i class="fa fa-inr"></i> '+ps[i].amount+'</p></td><td>'+ps[i].mode+'</td><td>'+date_format(ps[i].payment_date)+'</td><td><a href="../'+ps[i].file_url+'" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i> View File</a></td><td>'+ps[i].description+'</td><td><p>Credited to:'+ps[i].credited_to+' </p><p>Received By:'+ps[i].received_by+'</p></td></tr>';
					// }
					//var attachments='<tr><td>Requirement File</td><th><a href="../'+allData['data'].requirement_file+'" class="btn btn-success">View File</a></th></tr><tr><td>Quotation File</td><th><a href="../'+allData['data'].quotation_file+'" class="btn btn-success">View File</a></th></tr>';

					//var payment_terms=allData['data'].payment_terms;

					//var description=allData['data'].description;
					imgHTML ='<div class="row card bg-green1" style="padding:2%;"><div class="col-md-8 col-xs-6 "><h1 class="text-white font-weight-bold">'+allData['data'].name+'</h1><h2 class="text-white font-weight-bold">'+allData['data'].designation+'</h2><h4 class="font-weight-bold text-white">'+allData['data'].department+'</h4></div><div class="widget-user-image col-md-4 col-xs-6"><img class="img-responsive img-rounded pull-right" src="../'+allData['data'].profile_pic_url+'" alt="" style="width:150px;height:150px;"></div></div>';

					dynHTML='<div class="table-responsive" style="height:500px;overflow-y:auto;"><table class="table table-bordered">'+imgHTML+'</table><table class="table table-bordered"><tr><p><b>Job Details</b></p></tr>'+job_detail+'</table><table class="table table-bordered"><tr><p><b>Expertise</b></p></tr>'+expertise+'</table><table class="table table-bordered"><tr><p><b>Amenities</b></p></tr>'+amenities+'</table><table class="table table-bordered"><tr><p><b>Personal Information</b></p></tr>'+personal_detail+'</table><table class="table table-bordered"><tr><p><b>Bank Details</b></p></tr>'+bank_detail+'</table><table class="table table-bordered"><tr><p><b>Emergency Contacts</b></p></tr>'+references+'</table><table class="table table-bordered"><tr><p><b>KYC Documents</b></p></tr>'+attachments+'</table></div>';
                  } else {
                  dynHTML='No Record Available';
                  }
                  $(".modal-body").html(  dynHTML );
        }
      });
    }
        $(".modal-title").html(myBooktitle);

        // As pointed out in comments,
        // it is unnecessary to have to manually call the modal.
        // $('#addBookDialog').modal('show');
   });
//    function date_calculator(){
//      var d1=document.getElementById('').value;
//      var d2=document.getElementById('').value;
//      var date1 = new Date(d1);
// var date2 = new Date(d2);
//
// // To calculate the time difference of two dates
// var Difference_In_Time = date2.getTime() - date1.getTime();
//
// // To calculate the no. of days between two dates
// var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
//   document.getElementById('').value;
// //To display the final no. of days (result)
// // document.write("Total number of days between dates  <br>"
// //                + date1 + "<br> and <br>"
// //                + date2 + " is: <br> "
// //                + Difference_In_Days);
// }

</script>
