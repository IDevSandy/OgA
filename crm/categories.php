<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Category";
          $btn="Update";
          }
          else
          {
          $title="Add New Category";
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
        <!-- Pace page -->Categories Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Categories Management</li>
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
                     $BindData=$obj->select_record("categories",$where);
                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Categories</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="categories">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                <div class="row">

  				<div class="form-group col-md-4 col-xs-12">
                    <label for="title">Title</label>
                    <input type="text" class="form-control input-sm" name="title" placeholder="Enter Title" maxlength="300" value="<?php echo $t=$BindData['title'] ?? ''; ?>" required>
                  </div>
                  <div class="form-group col-md-4 col-xs-12">
                  <label for="title"> File Image <small class="text-danger">*accept only .jpg,.png,files </small></label>
                  <?php
                  if(isset($BindData['file_url']) && $BindData['file_url'] !="")
                  {
                  ?>
                  <a class="example-image-link btn btn-warning btn-xs pull-right" href="../<?php echo $BindData['file_url']?>" title="<?php echo $BindData['title']; ?>" data-lightbox="example-1" style="margin-top:5px;"><i class="fa fa-eye"></i></a>
                  <?php
                  }
                  ?>
                  <input type="file" name="source" class="form-control input-sm" accept="image/*"/>

                           <input type="hidden" value="<?php echo $fl=$BindData['file_url']?? '';?>" name="old-logo">
                         </div>


                  <div class="form-group col-md-4 col-xs-12">
                             <label for="status">Status</label>
                             <select name="status" class="form-control input-sm" >
                         <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Active</option>
                         <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>Inactive</option>

                       </select>
                           </div>

                           <div class="form-group  col-xs-12">
                               <label for="title">Description</label>
                               <textarea class="form-control input-sm ckeditor" name="description" placeholder="Enter Description/ Remarks for Categories" required><?php echo $r=$BindData['description'] ?? ''; ?></textarea>
                             </div>
</div> <!-- End row 1-->
 <div class="panel panel-primary">
   <div class="panel-heading"><h4 class="font-weight-bold"> For SEO Purposes </h4></div>
   <div class="panel-body">
     <div class="row">
     <div class="form-group col-md-4 col-xs-12">
               <label for="title">Meta Title</label>
               <input type="text" class="form-control input-sm" name="meta_title" placeholder="Enter Meta Title" maxlength="100" value="<?php echo $t=$BindData['meta_title'] ?? ''; ?>" >
             </div>
             <div class="form-group col-md-4 col-xs-12">
                       <label for="title">Meta Keywords</label>
                       <input type="text" class="form-control input-sm" name="meta_keys" placeholder="Enter Keywords" maxlength="150" value="<?php echo $t=$BindData['meta_keys'] ?? ''; ?>" >
                     </div>
                     <div class="form-group col-md-4 col-xs-12">
                       <label for="title">Meta Description</label>
                       <input type="text" class="form-control input-sm" name="meta_desc" placeholder="Enter Meta Description" maxlength="200" value="<?php echo $t=$BindData['meta_desc'] ?? ''; ?>" >
                     </div>

                   </div>
                 </div>
               </div> <!-- End Panel 2-->
              <div class="row">
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
                            <th>title</th>
                            <th>Subcategories</th>
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
                              <th>title</th>
                              <th>Subcategories</th>
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
   <style>
  .css{
    border-left: 1px solid #DDDDDD;
    border-bottom: 1px solid #DDDDDD;
	    border-right: 1px solid #DDDDDD;
  }
  .css1{
	  width: 127px;
	  border-right: 1px solid #DDDDDD;
	  
  }
  </style>
  <?php include('include/footer.php');?>
  <script>
  function 	RefreshView() {
  	self.location="categories.php?m=active";
}

$(function () {
  $('#memListTable').DataTable({
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'aaSorting' : [[0, 'desc']],
       'ajax': {
           'url':'api-controller.php?action=get_categories'
       },
       'columns': [
         { data: 'id', name: 'id', "visible": false,searchable:false },
         { data: 'sno', name: 'sno' },
           { data: 'title', name: 'title' },
           { data: 'subcategories', name: 'subcategories' },
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
   //popup
   $(document).on("click", ".open-AddBookDialog", function () {
        var myBookId = $(this).data('id');
        var myBooktitle=$(this).data('title');
        var tbl=$(this).data('tbl');
		$(".modal-dialog").css("width", "60%");
        if(myBookId != "") {
          $.ajax({
              type: "POST",
              url: "api-controller.php",
              data: {
                  action: 'get_categories_records',tbl:'categories',id:myBookId
              },
               async: true,
               dataType: "json",
               success: function(data) {
                  // document.getElementById("loader")
                  //     .style.display = "none";
                  var dynHTML = '';
                  if (data.RESPONSE_CODE == '2XX') {
                      var allData = data.DATA;
          
          var personal_detail='<div class="table-responsive"><table class="table table-striped"><tbody class="css"><tr><th class="css1">Title</td><td>'+allData['data'].title+'</th></tr><tr><th class="css1">Image</th><td><img class="img-responsive img-rounded pull-left" src="../'+allData['data'].file_url+'" alt="" style="width: 150px; height: 150px;" /></td></tr><tr><th class="css1">Description</td><td>'+allData['data'].description+'</td></tr><tr><th class="css1">Meta Title</th><td>'+allData['data'].meta_title+'</td></tr><tr><th class="css1">Meta Keys</th><td>'+allData['data'].meta_keys+'</td></tr> <tr><th class="css1">Meta Desc</th><td>'+allData['data'].meta_desc+'</td></tr></tbody></table></div>';


					
                  }
                  $(".modal-body").html(  personal_detail );
        }
      });
    }
        $(".modal-title").html(myBooktitle);

        // As pointed out in comments,
        // it is unnecessary to have to manually call the modal.
        // $('#addBookDialog').modal('show');
   });
   //popup

  </script>
