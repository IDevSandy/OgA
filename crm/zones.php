<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Zone";
          $btn="Update";
          }
          else
          {
          $title="Add New Zone";
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
        <!-- Pace page -->Zones Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Zones Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php
                     $id=$_REQUEST['id']??'';
                     $where= array(
                     "id" => $id,
                     );
                     $BindData=$obj->select_record("zones",$where);
                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Zones</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="zones">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                <div class="row">
                  <div class="form-group col-xs-12">
                             <label for="status">Locations</label>
                             <select class="form-control input-sm select2"  name="location_id" >
                                    <option value="">Please Select</option>
                                    <?php
                                     // $where= array(
                                     // "status" => 1,
                                     // );
                                     // $country=$obj->fetch_all_record("states",$where);
                                     $country=mysqli_query($obj->con,"SELECT * FROM states where status=1");

                                     while ($s=mysqli_fetch_array($country)) {
                                       // var_dump($s);
                                       $condition= array(
                                       "state_id" => $s['id'],
                                        "status" => 1
                                       );
                                       $tct=$s['title']." ( ".$s['country']." ) ";
                                     echo  '<optgroup label="'.$tct.'">';
                                     $loc=$obj->fetch_all_record("cities",$condition);
                                     foreach ($loc as $s2) {

                                     ?>
                                     <option value="<?php echo $s2['id']; ?>" <?php echo $st=isset($BindData['location_id']) && $BindData['location_id']==$s2['id'] ? 'selected=selected' :''; ?>><?php echo $s2['title'];?></option>
                                     <?php
                                   }
                                     echo '</optgroup>';
                                   }
                                     ?>
                                  </select>
                           </div>
  				<div class="form-group col-md-4 col-xs-12">
                    <label for="title">Zone Name</label>
                    <input type="text" class="form-control input-sm" name="title" placeholder="Enter Zone Name" maxlength="300" value="<?php echo $ct=$BindData['title'] ?? ''; ?>" required>
                  </div>
                  <div class="form-group col-md-4 col-xs-12">
                            <label for="title">Manager Name</label>
                            <input type="text" class="form-control input-sm" name="manager_name" placeholder="Enter Manager name" maxlength="300" value="<?php echo $t=$BindData['manager_name'] ?? ''; ?>" required>
                          </div>

                          <div class="form-group col-md-4 col-xs-12">
                                    <label for="title">Mobile Number</label>
                        <input  type="tel"  name="mobile" placeholder="Enter Mobile Number " class="form-control input-sm" maxlength="10" value="<?php echo $af=$BindData['mobile'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
                      </div>
                      <div class="form-group col-md-4 col-xs-12">
                                <label for="title">Email</label>
                                <input type="email" class="form-control input-sm" name="email" placeholder="Enter Email" maxlength="100" value="<?php echo $t=$BindData['email'] ?? ''; ?>" required>
                              </div>

                               <div class="form-group col-md-4 col-xs-12">
                                         <label for="title">Phone Number</label>
                             <input  type="tel"  name="phone_no" placeholder="Enter Phone Number " class="form-control input-sm" maxlength="15" value="<?php echo $af=$BindData['phone_no'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
                           </div>
                  <div class="form-group col-md-4 col-xs-12">
                             <label for="status">Status</label>
                             <select name="status" class="form-control input-sm" >
                         <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Active</option>
                         <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>Inactive</option>

                       </select>
                           </div>
                           <div class="form-group col-xs-12">
                                     <label for="title">Address</label>
                                     <textarea class="form-control input-sm" name="address" placeholder="Enter Address"><?php echo $r=$BindData['address'] ?? ''; ?></textarea>
                            </div>
              <div class="col-xs-12">
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
                             <table id="memListTable" class="table table-hover table-striped">
                               <thead>
                                 <tr>
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>sno</th>
                                <th>code</th>
                            <th>title</th>
                            <th>details</th>
                            <th>Locations</th>
                            <th>last Update</th>
                           <th>Status</th>
                            <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">

                               </tbody>
                                 <tfoot>
                                 <tr>
                                  <th>id</th>
                                  <th>sno</th>
                                  <th>code</th>
                                  <th>title</th>
                                  <th>details</th>
                                  <th>Locations</th>
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
  	self.location="zones.php?m=active";
}

$(function () {
  $('#memListTable').DataTable({
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'aaSorting' : [[0, 'desc']],
       'ajax': {
           'url':'api-controller.php?action=get_zones'
       },
       'columns': [
         { data: 'id', name: 'id', "visible": false,searchable:false },
         { data: 'sno', name: 'sno' },
         { data: 'code', name: 'code' },
           { data: 'title', name: 'title' },
           { data: 'details', name: 'details' },
            { data: 'locations', name: 'locations' },
           { data: 'last_update', name: 'last_update' },
           { data: 'status', name: 'status' },
           { data: 'actions', name: 'actions', orderable: true, searchable: true }
           ]
           // table.on( 'draw', function () {
           //        $('.livicon').each(function(){
           //            $(this).updateLivicon();
           //        });
           //    });
    });
   });
  </script>
