<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
  $ptitle=mysqli_fetch_array(mysqli_query($obj->con,"select * from employees where id=".$_REQUEST['eid']));

        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Reference";
          $btn="Update";
          }
          else
          {
          $title="Add New Reference";
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
        <!-- Pace page -->Add References for <a href="employees.php?id=<?php echo $_REQUEST['eid']; ?>"><?php echo $ptitle['name'];?></a>
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="employees.php"><i class="fa fa-group"></i> Employees</a></li>
        <li class="active">Emergency Contacts</li>
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
                     $BindData=$obj->select_record("employee_references",$where);
                     $mob=isset($BindData['mobile1']) && $BindData['mobile1'] != ''? explode('-',$BindData['mobile1']) : '';
                     $mob2=isset($BindData['mobile2']) && $BindData['mobile2'] != ''? explode('-',$BindData['mobile2']) : '';

                     $zid=$ptitle['zone_id']??'';
                     $conditon= array(
                     "id" => $zid,
                     );
                     $zone=$obj->select_record("zones",$conditon);
                      $dept_id=$ptitle['dept_id']??'';
                     $conditon= array(
                     "id" => $dept_id,
                     );
                     $dept=$obj->select_record("departments",$conditon);
                     $designation_id=$ptitle['designation_id']??'';
                    $conditon= array(
                    "id" => $designation_id,
                    );
                    $designation=$obj->select_record("designations",$conditon);
                    $condition= array(
                                "emp_id" => $_REQUEST['eid']
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
                     <?php
                     if(isset($_REQUEST['eid']) && $_REQUEST['eid'] !="") {
                       ?>
                       <div class="row">
                         <div class="col-md-4 col-xs-12">
                                   <!-- Widget: user widget style 1 -->
                                   <div class="box box-widget widget-user-2">
                                     <!-- Add the bg color to the header using any of the bg-* classes -->
                                     <div class="widget-user-header bg-rainbow1">
                                       <div class="widget-user-image">
                                         <img class="img-responsive img-rounded" src="../<?php echo $ptitle['profile_pic_url']; ?>" alt="<?php echo $ptitle['name']; ?>" style="width:100px;height:100px;">
                                       </div>
                                       <!-- /.widget-user-image -->
                                       <h3 class="widget-user-username"><?php echo $ptitle['name']." <br> ( ".$ptitle['emp_code']." ) </ br>"; ?></h3>
                                       <h5 class="widget-user-desc"><?php echo $designation['title']; ?></h5>
                                     </div>
                                     <div class="box-footer no-padding">
                                       <ul class="nav nav-stacked">
                                         <li><a href="#"><?php echo $ptitle['mobile1']; ?> <span class="pull-right badge bg-blue"><i class="fa fa-phone"></i></span></a></li>
                                         <li><a href="#"><?php echo $ptitle['mobile2']; ?> <span class="pull-right badge bg-green"><i class="fa fa-phone"></i></span></a></li>
                                         <li><a href="#"><?php echo $ptitle['email']; ?> <span class="pull-right badge bg-aqua"><i class="fa fa-envelope"></i></span></a></li>
                                         <li><a href="#"><?php echo ucfirst($ptitle['gender']); ?> <span class="pull-right badge bg-red"><i class="fa fa-odnoklassniki"></i></span></a></li>
                                         <li><a href="#"><?php echo ucfirst($ptitle['marital_status']); ?> <span class="pull-right badge bg-green"><i class="fa fa-odnoklassniki"></i></span></a></li>
                                         <li><a href="#"><?php echo date_format(date_create($ptitle['doj']),'d-M-Y'); ?> <span class="pull-right badge bg-red"><i class="fa fa-calendar"></i></span></a></li>
                                         <li><a href="#"><?php echo ucfirst($ptitle['type']); ?> <span class="pull-right badge bg-purple"><i class="fa fa-black-tie"></i></span></a></li>
                                         <li><a href="#"><?php echo ucfirst($ptitle['shift']); ?> <span class="pull-right badge bg-yellow"><i class="fa fa-industry"></i></span></a></li>
                                         <li><a href="#"><?php echo ucfirst($ptitle['job_type']); ?> <span class="pull-right badge bg-green"><i class="fa fa-hourglass-1"></i></span></a></li>
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
                             <dd><?php echo $ptitle['paddress']; ?></dd>
                             <dt>Permanent Pincode</dt>
                             <dd><?php echo $ptitle['ppincode']; ?></dd>
                             <dt>Present Address</dt>
                             <dd><?php echo $ptitle['caddress']; ?></dd>
                             <dt>Pincode</dt>
                             <dd><?php echo $ptitle['cpincode']; ?></dd>
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
                      <!-- <img class="img-responsive img-rounded" src="../<?php echo $ptitle['profile_pic_url']; ?>" alt="<?php echo $ptitle['name']; ?>" style="height:250px;"> -->
                       <ul class="list-group"><li class="list-group-item font-weight-bold">EXPERTISE/ SKILLS</li><?php echo $expertise;?></ul>
                     </div>
                       </div>
                       <div class="clearfix">&nbsp;</div>
                     <?php
                     }
                      ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List References</a></li>
              </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="employee_references">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                  <input type="hidden" name="eid" value="<?php echo $eid=$_REQUEST['eid'] ?? ''; ?>">
                <div class="row">

  				            <div class="form-group col-md-3 col-xs-12">
                    <label for="title">Name</label>
                    <input type="text" class="form-control input-sm" name="name" placeholder="Enter Full Name" maxlength="300" value="<?php echo $t=$BindData['name'] ?? ''; ?>" required>
                  </div>
                  <div class="form-group col-md-3 col-xs-12">
  <label for="title">Relation</label>
<input type="text"  name="relation" placeholder="Enter Relation" class="form-control input-sm" maxlength="200" value="<?php echo $cf=$BindData['relation'] ?? ''; ?>" >
                   </div>

                   <div class="form-group col-md-2 col-xs-12">
                     <label for="title">Country Code</label>
                     <select name="countryCode" class="form-control select21 input-sm" id="">

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
                  <div class="form-group col-md-4 col-xs-12">
                            <label for="title">Mobile Number</label>
<input id="name6" type="tel"  name="mobile1" placeholder="Enter Mobile Number1" class="form-control input-sm" maxlength="10" value="<?php echo $af=$mob[1] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
                   </div>
                   <div class="form-group col-md-2 col-xs-12">
                     <label for="title">Country Code</label>
                     <select name="countryCode2" class="form-control select21 input-sm" id="">

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
                   <div class="form-group col-md-4 col-xs-12">
                             <label for="title">Alternate Mobile Number</label>
 <input id="name6" type="tel"  name="mobile2" placeholder="Enter Alternate Mobile Number" class="form-control input-sm" maxlength="10" value="<?php echo $af=$mob2[1] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" >
                    </div>

                   <div class="form-group col-md-3 col-xs-12">
                             <label for="title">Email</label>
                             <input type="email" class="form-control input-sm" name="email" placeholder="Enter Email" maxlength="100" value="<?php echo $t=$BindData['email'] ?? ''; ?>" >
                           </div>
                  <div class="form-group col-md-3 col-xs-12">
                             <label for="status">Status</label>
                             <select name="status" class="form-control input-sm" >
                         <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Active</option>
                         <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>Inactive</option>

                       </select>
                           </div>

              <div class="col-xs-12">
                <!-- <div class="form-group">
                    <label for="title">Description</label>
                    <textarea class="form-control input-sm" name="description" placeholder="Enter Description/ Remarks"><?php echo $r=$BindData['description'] ?? ''; ?></textarea>
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
                             <table id="example2" class="table table-hover table-striped">
                               <thead>
                                 <tr >
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>name</th>
                                <th>relation</th>
                                <th>Mobile Number</th>
                            <th>Email</th>
                            <th>last Update</th>
                           <th>Status</th>
                            <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">
                                 <?php
                         $id=$_REQUEST['eid']??'';
                         $where= array(
                         "emp_id" => $id,
                         );
                         $myrow = $obj->fetch_all_record("employee_references",$where);
                         if($myrow != null) {
                         foreach ($myrow as $row) {
                         // echo $row['id']...
                         ?>
          				<tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['relation']; ?></td>
                    <td>
                      <p class="text-success"><i class = "fa fa-phone"></i> <b><?php echo $row['mobile1'];?> </b></p>
                    <p class="text-danger"><i class = "fa fa-phone"></i>  <b><?php echo $row['mobile2'];?> </b></p>

                    </td>
                    <td> <i class = "fa fa-envelope"></i> <?php  echo $row['email'];?> </td>

                            <td><p class="text-danger">Created At: <b><?php $d=date_create($row['created_at']); echo $c_at=date_format($d,'d-M-Y');?></b></p><p class="text-success">Last Updated At:  <b><?php echo $u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y') : $c_at; ?></b></p> </td>

          <td><?php echo $sts=$row['status'] != 0 ? '<small class="label bg-green">Active</small>': '<small class="label bg-red">Inactive</small>'; ?></td>

           <td> <a href="employeereferences.php?id=<?php echo $row['id'];?>&eid=<?php echo $_REQUEST['eid']; ?>" style="cursor:pointer;" class="btn btn-primary btn-xs" ><i class="fa fa-edit" ></i></a>&nbsp;&nbsp;

            <a  href="javascript:void(0);" onclick="javascript:deleteThisRecord(<?php echo $row['id']; ?>,'employee_references');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>


          </td>
                          </tr>
          				<?php
          				}
                }
          				?>
                          </tbody>
                               <tfoot>
                                 <tr>
                                  <th>id</th>
                                  <th>name</th>
                                  <th>relation</th>
                                  <th>Mobile Number</th>
                              <th>Email</th>
                              <th>last Update</th>
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
  	self.location="employeereferences.php?m=active&eid=<?php echo $_REQUEST['eid']; ?>";
}
$(function () {
$('#example2').DataTable({
   "order": [[ 0, "desc" ]],
  "columnDefs": [
           {
               "targets": [ 0 ],
               "visible": false,
               "searchable": false
           }
       ]
});
});
  </script>
