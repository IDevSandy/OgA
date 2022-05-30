<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
  $ptitle=mysqli_fetch_array(mysqli_query($obj->con,"select title from laboratories where id=".$_REQUEST['lid']));

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
        <!-- Pace page -->Add References for <a href="laboratories.php?id=<?php echo $_REQUEST['lid']; ?>"><?php echo $ptitle['title'];?></a>
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="laboratories.php"><i class="fa fa-bank"></i> Laboratory</a></li>

        <li class="active">Lab References Management</li>
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
                     $BindData=$obj->select_record("lab_references",$where);
                     $mob=isset($BindData['mobile1']) && $BindData['mobile1'] != ''? explode('-',$BindData['mobile1']) : '';
                     $mob2=isset($BindData['mobile2']) && $BindData['mobile2'] != ''? explode('-',$BindData['mobile2']) : '';

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
                  <input type="hidden" name="action" value="lab_references">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                  <input type="hidden" name="lid" value="<?php echo $lid=$_REQUEST['lid'] ?? ''; ?>">
                <div class="row">

  				            <div class="form-group col-md-3 col-xs-12">
                    <label for="title">Name</label>
                    <input type="text" class="form-control input-sm" name="name" placeholder="Enter Full Name" maxlength="300" value="<?php echo $t=$BindData['name'] ?? ''; ?>" required>
                  </div>
                  <div class="form-group col-md-3 col-xs-12">
  <label for="title">Designation</label>
<input type="text"  name="designation" placeholder="Enter Designation" class="form-control input-sm" maxlength="200" value="<?php echo $cf=$BindData['designation'] ?? ''; ?>" >
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
                            <label for="title">Mobile Number1</label>
<input id="name6" type="tel"  name="mobile1" placeholder="Enter Mobile Number1" class="form-control input-sm" maxlength="10" value="<?php echo $af=$mob[1] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
                   </div>
                   <div class="form-group col-md-2 col-xs-12">
                     <label for="title">Country Code2</label>
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
                             <label for="title">Mobile Number2</label>
 <input id="name6" type="tel"  name="mobile2" placeholder="Enter Mobile Number2" class="form-control input-sm" maxlength="10" value="<?php echo $af=$mob2[1] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" >
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
                                 <tr style="color:#fff;background: #aa4b6b;background: -webkit-linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);background: linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
                                    text-transform:uppercase;">
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>name</th>
                                <th>designation</th>
                                <th>Mobile Number</th>
                            <th>Email</th>
                            <th>last Update</th>
                           <th>Status</th>
                            <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">
                                 <?php
                         $id=$_REQUEST['lid']??'';
                         $where= array(
                         "lab_id" => $id,
                         );
                         $myrow = $obj->fetch_all_record("lab_references",$where);
                         if($myrow != null) {
                         foreach ($myrow as $row) {
                         // echo $row['id']...
                         ?>
          				<tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['designation']; ?></td>
                    <td>
                      <p class="text-success"><i class = "fa fa-phone"></i> <b><?php echo $row['mobile1'];?> </b></p>
                    <p class="text-danger"><i class = "fa fa-phone"></i>  <b><?php echo $row['mobile2'];?> </b></p>

                    </td>
                    <td> <i class = "fa fa-envelope"></i> <?php  echo $row['email'];?> </td>

                            <td><p class="text-danger">Created At: <b><?php $d=date_create($row['created_at']); echo $c_at=date_format($d,'d-M-Y');?></b></p><p class="text-success">Last Updated At:  <b><?php echo $u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y') : $c_at; ?></b></p> </td>

          <td><?php echo $sts=$row['status'] != 0 ? '<small class="label bg-green">Active</small>': '<small class="label bg-red">Inactive</small>'; ?></td>

           <td> <a href="labreferences.php?id=<?php echo $row['id'];?>&lid=<?php echo $_REQUEST['lid']; ?>" style="cursor:pointer;" class="btn btn-primary btn-xs" ><i class="fa fa-edit" ></i></a>&nbsp;&nbsp;

            <a  href="javascript:void(0);" onclick="javascript:deleteThisRecord(<?php echo $row['id']; ?>,'lab_references');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>


          </td>
                          </tr>
          				<?php
          				}
                }
          				?>
                          </tbody>
                               <tfoot>
                                 <tr style="color:#fff;background: #aa4b6b;background: -webkit-linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);background: linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
                                  text-transform:uppercase;">
                                  <th>id</th>
                                  <th>name</th>
                                  <th>designation</th>
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
  	self.location="labreferences.php?m=active&lid=<?php echo $_REQUEST['lid']; ?>";
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
