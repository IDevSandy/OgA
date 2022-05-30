<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Services";
          $btn="Update";
          }
          else
          {
          $title="Add New Services";
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
        <!-- Pace page -->Services Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Services Management</li>
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
                     $BindData=$obj->select_record("services",$where);
                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-table"></i> List Services</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="services">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                <div class="row">
                  <div class="form-group col-md-6 col-xs-12">
                             <label for="status">Categories</label>
                             <select class="form-control select2 input-sm" id="category" name="category_id" onchange="javascript:getSubcategory(this.value);" required>
                       <option value="">Please Select</option>
                       <?php
                       $where= array(
                       "status" => 1,
                       );
                       $category=$obj->fetch_all_record("categories",$where);
                       foreach ($category as $s) {
                         // var_dump($s);
                       ?>
                       <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['category_id']) && $BindData['category_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                       <?php
                     }
                       ?>
                     </select>
                           </div>
                           <div class="form-group col-md-6 col-xs-12">
                                      <label for="status">Subcategories</label>
                                      <select class="form-control input-sm select2" id="subcategory" name="subcategory_id" >
                                             <option value="">Please Select</option>
                                             <?php
                                             $cid=$BindData['category_id'] ?? '0';
                                             $where= array(
                                             "category_id"=> $cid,
                                             "status" => 1
                                             );
                                             $subcategory=$obj->fetch_all_record("subcategories",$where);
                                             foreach ($subcategory as $s) {
                                               // var_dump($s);
                                             ?>
                                             <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['subcategory_id']) && $BindData['subcategory_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                                             <?php
                                           }
                                             ?>
                                           </select>
                                    </div>
                                    <!-- <div class="form-group col-md-4 col-xs-12">
                                               <label for="status">Standards</label>
                                               <select class="form-control input-sm select2"  name="standard_id" >
                                                      <option value="">Please Select</option>
                                                      <?php
                                                       $where= array(
                                                       "status" => 1,
                                                       );
                                                       $standard=$obj->fetch_all_record("standards",$where);
                                                       foreach ($standard as $s) {
                                                         // var_dump($s);
                                                       ?>
                                                       <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['standard_id']) && $BindData['standard_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                                                       <?php
                                                     }
                                                       ?>
                                                    </select>
                                             </div> -->
                  <div class="form-group col-md-3 col-xs-12">
                            <label for="title">Service Name</label>
                            <input type="text" class="form-control input-sm" name="title" placeholder="Enter Service Name" maxlength="300" value="<?php echo $t=$BindData['title'] ?? ''; ?>" required>
                          </div>

                          <!--   <div class="form-group col-md-4 col-xs-12">
                                    <label for="title">Authority Fee (<i class = "fa fa-inr"></i>)</label>
 <input id="name6" type="tel"  name="authority_fee" placeholder="Enter Authority Fee" class="form-control input-sm" maxlength="6" value="<?php echo $af=$BindData['authority_fee'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
                           </div> -->
                           <div class="form-group col-md-3 col-xs-12">
                                     <label for="title">Charge (<i class = "fa fa-inr"></i>)</label>
  <input id="name7" type="tel"  name="charge"  placeholder="Enter Charge" class="form-control input-sm" maxlength="6" value="<?php echo $cf=$BindData['charge'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
                            </div>
                            <div class="form-group col-md-3 col-xs-12">
                                      <label for="title">Duration Timeline (* In days)</label>
   <input id="name8" type="tel"  name="timeline" placeholder="Enter Timeline"class="form-control input-sm" maxlength="6" value="<?php echo $tl=$BindData['timeline'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
                             </div>



                  <div class="form-group col-md-3 col-xs-12">

                             <label for="status">Status</label>
                             <select name="status" class="form-control input-sm" >
                         <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Active</option>
                         <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>Inactive</option>

                       </select>
                           </div>

              <div class="col-xs-12">
                <div class="form-group">
                    <label for="title">Process Layouts</label>
                    <textarea class="form-control input-sm ckeditor" name="process_layouts" placeholder="Enter Process Layouts"><?php echo $r=$BindData['process_layouts'] ?? ''; ?></textarea>
                  </div>
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
                               <div class="form-group col-md-4 col-xs-12">
                                          <label for="status">Categories</label>
                                          <select class="form-control select2 input-sm" id="Category" onchange="javascript:getFilterSubcategory(this.value);">
                                    <option value="">Please Select</option>
                                    <?php
                                    $where= array(
                                    "status" => 1,
                                    );
                                    $category=$obj->fetch_all_record("categories",$where);
                                    foreach ($category as $s) {
                                      // var_dump($s);
                                    ?>
                                    <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['category_id']) && $BindData['category_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                                    <?php
                                  }
                                    ?>
                                  </select>
                                        </div>
                                        <div class="form-group col-md-4 col-xs-12">
                                                   <label for="status">Subcategories</label>
                                                   <select class="form-control input-sm select2" id="subCategory"  >
                                                          <option value="">Please Select</option>
                                                          <?php
                                                          $cid=$BindData['category_id'] ?? '0';
                                                          $where= array(
                                                          "category_id"=> $cid,
                                                          "status" => 1
                                                          );
                                                          $subcategory=$obj->fetch_all_record("subcategories",$where);
                                                          foreach ($subcategory as $s) {
                                                            // var_dump($s);
                                                          ?>
                                                          <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['subcategory_id']) && $BindData['subcategory_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                                                          <?php
                                                        }
                                                          ?>
                                                        </select>
                                                 </div>
                                                 <div class="form-group col-md-4 col-xs-12">
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
                                <th>Code</th>
                            <th>title</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>timeline</th>
                            <th>charges</th>
                            <th>last Update</th>
                           <th>Status</th>
                            <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">

                               </tbody>
                                 <tfoot>
                                 <tr >
                                  <th>id</th>
                                  <th>Sno</th>
                                  <th>Code</th>
                              <th>title</th>
                              <th>Category</th>
                              <th>Subcategory</th>
                              <th>timeline</th>
                              <th>charges</th>
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
  	self.location="services.php?m=active";
}

$(function () {
  fill_datatable();
  function fill_datatable(category = '', subcategory = ''){
  $('#memListTable').DataTable({
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'aaSorting' : [[0, 'desc']],
       'ajax': {
           'url':'api-controller.php?action=get_services',
           'type':'POST',
           'data':{
            filter_category:category,filter_subcategory:subcategory
           }
       },
       'columns': [
         { data: 'id', name: 'id', "visible": false,searchable:false },
           { data: 'sno', name: 'sno' },
            { data: 'code', name: 'code' },
          { data: 'title', name: 'title' },
           { data: 'category', name: 'category' },
           { data: 'subcategory', name: 'subcategory' },
           { data: 'timeline', name: 'timeline' },
            { data: 'charges', name: 'charges' },
           { data: 'last_update', name: 'last_update' },
           { data: 'status', name: 'status' },
           { data: 'actions', name: 'actions', orderable: true, searchable: true }
           ]

    });
  }
    //Apply Custom search on jQuery DataTables here
        // oTable = $('#memListTable').DataTable();
        // $('#btnSearch').click(function () {
        //     //Apply search for Employee Name // DataTable column index 0
        //     oTable.columns(4).search($('#Category').val().trim());
        //     //Apply search for Country // DataTable column index 3
        //     oTable.columns(5).search($('#subCategory').val().trim());
        //     //hit search on server
        //     oTable.draw();
        // });
            $('#btnSearch').click(function(){
       var category = $('#Category').val();
       var subcategory = $('#subCategory').val();
       if(category != '' && subcategory != '')
       {
        $('#memListTable').DataTable().destroy();
        fill_datatable(category, subcategory);
       }
       else
       {
        alert('Select Both filter option');
        $('#memListTable').DataTable().destroy();
        fill_datatable();
       }
      });

 });
  </script>
