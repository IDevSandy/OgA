<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Laboratory";
          $btn="Update";
          }
          else
          {
          $title="Add New Laboratory";
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
        <!-- Pace page -->Laboratory Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Laboratory Management</li>
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
                     $BindData=$obj->select_record("laboratories",$where);
                     $mob=isset($BindData['mobile']) && $BindData['mobile'] != ''? explode('-',$BindData['mobile']) : '';

                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Labs</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="laboratories">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                <div class="row">
                  <div class="form-group col-md-3 col-xs-12">
                            <label for="title">Laboratory Name</label>
                            <input type="text" class="form-control input-sm" name="title" placeholder="Enter Laboratory Name" maxlength="300" value="<?php echo $t=$BindData['title'] ?? ''; ?>" required>
                          </div>
                          <div class="form-group col-md-3 col-xs-12">
          <label for="title">Owner Name</label>
 <input type="text"  name="owner_name" placeholder="Enter Owner Name" class="form-control input-sm" maxlength="200" value="<?php echo $cf=$BindData['owner_name'] ?? ''; ?>" >
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
 <input id="name6" type="tel"  name="mobile" placeholder="Enter Mobile Number"class="form-control input-sm" maxlength="10" value="<?php echo $af=$mob[1] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
                           </div>

                           <div class="form-group col-md-4 col-xs-12">
                                     <label for="title">Email</label>
                                     <input type="email" class="form-control input-sm" name="email" placeholder="Enter Email" maxlength="100" value="<?php echo $t=$BindData['email'] ?? ''; ?>" required>
                                   </div>
                            <div class="form-group col-md-4 col-xs-12">
            <label for="title">Website</label>
   <input type="text"  name="website" placeholder="Enter Website" class="form-control input-sm" maxlength="100" value="<?php echo $cf=$BindData['website'] ?? ''; ?>" >
                             </div>
                             <div class="form-group col-md-4 col-xs-12">
                                       <label for="title">Address</label>
                                       <textarea class="form-control input-sm" name="address" placeholder="Enter Address"><?php echo $r=$BindData['address'] ?? ''; ?></textarea>
                              </div>
                             <div class="form-group col-md-3 col-xs-12">
             <label for="title">Country</label>
    <input type="text"  name="country" placeholder="Enter Country" class="form-control input-sm" maxlength="100" value="<?php echo $cf=$BindData['country'] ?? ''; ?>" >
                              </div>
                              <div class="form-group col-md-3 col-xs-12">
              <label for="title">State</label>
     <input type="text"  name="state" placeholder="Enter State" class="form-control input-sm" maxlength="100" value="<?php echo $cf=$BindData['state'] ?? ''; ?>" >
                               </div>
                               <div class="form-group col-md-3 col-xs-12">
               <label for="title">City</label>
      <input type="text"  name="city" placeholder="Enter City" class="form-control input-sm" maxlength="100" value="<?php echo $cf=$BindData['city'] ?? ''; ?>" >
                                </div>
                                <div class="form-group col-md-3 col-xs-12">
                                          <label for="title">Pincode</label>
                              <input id="name9" type="tel"  name="pincode" placeholder="Enter Pincode" class="form-control input-sm" maxlength="6" value="<?php echo $af=$BindData['pincode'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
                            </div>

                  <div class="form-group  col-xs-12">
                             <label for="status">Status</label>
                             <select name="status" class="form-control input-sm" >
                         <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Active</option>
                         <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>Inactive</option>

                       </select>
                           </div>

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
                             <table id="memListTable" class="table table-hover table-striped">
                               <thead>
                                 <tr style="color:#fff;background: #aa4b6b;background: -webkit-linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);background: linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
                                    text-transform:uppercase;">
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>Sno</th>
                                <th>Code</th>
                                <th>title</th>
                                <th>contact details</th>
                                <th>owner name</th>
                                <th>services</th>
                                <th>references</th>
                                <th>attachments</th>
                            <th>last Update</th>
                           <th>Status</th>
                            <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">

                               </tbody>
                                 <tfoot>
                                 <tr style="color:#fff;background: #aa4b6b;background: -webkit-linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);background: linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
                                  text-transform:uppercase;">
                                  <th>id</th>
                                  <th>Sno</th>
                                  <th>Code</th>
                              <th>title</th>
                              <th>contact details</th>
                              <th>owner name</th>
                              <th>services</th>
                              <th>references</th>
                              <th>attachments</th>
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
  	self.location="laboratories.php?m=active";
}

$(function () {
  $('#memListTable').DataTable({
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'aaSorting' : [[0, 'desc']],
       'ajax': {
           'url':'api-controller.php?action=get_laboratories'
       },
       'columns': [
         { data: 'id', name: 'id', "visible": false,searchable:false },
           { data: 'sno', name: 'sno' },
            { data: 'code', name: 'code' },
          { data: 'title', name: 'title' },
           { data: 'mobile', name: 'mobile' },
           { data: 'owner_name', name: 'owner_name' },
           { data: 'services', name: 'services' },
           { data: 'references', name: 'references' },
            { data: 'attachments', name: 'attachments' },
           { data: 'last_update', name: 'last_update' },
           { data: 'status', name: 'status' },
           { data: 'actions', name: 'actions', orderable: true, searchable: true }
           ]
           // "columnDefs": [
           //          {
           //              "targets": [ 0 ],
           //              "visible": false,
           //              "searchable": false
           //          }
           //      ]
           // table.on( 'draw', function () {
           //        $('.livicon').each(function(){
           //            $(this).updateLivicon();
           //        });
           //    });
    });
   });
  </script>
