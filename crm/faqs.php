<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Faqs";
          $btn="Update";
          }
          else
          {
          $title="Add New Faqs";
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
        <!-- Pace page -->Faqs Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Faqs Management</li>
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
                     $BindData=$obj->select_record("faqs",$where);
                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Faqs</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
			  <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="faqs">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                <div class="row">

  				<div class="form-group col-md-6 col-xs-12">
                    <label for="question">Question</label>
                    <input type="text" class="form-control input-sm" name="question" placeholder="Enter question" maxlength="300" value="<?php echo $t=$BindData['question'] ?? ''; ?>" required>
                  </div>
                  

                  <div class="form-group col-md-6 col-xs-12">
                             <label for="status">Status</label>
                             <select name="status" class="form-control input-sm" >
                         <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Active</option>
                         <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>Inactive</option>

                       </select>
                           </div>

                           <div class="form-group  col-xs-12">
                               <label for="title">Answer</label>
                               <textarea class="form-control input-sm ckeditor" name="answer" placeholder="Enter Description/ Remarks for Categories" required><?php echo $r=$BindData['answer'] ?? ''; ?></textarea>
                             </div>
</div> <!-- End row 1-->
                             <!-- End Panel 2-->
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
                            <th>Question</th>
                            <th>Answer</th>
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
                              <th>Question</th>
                              <th>Answer</th>
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
  <!-- /.content-wrapper -->
  <?php include('include/footer.php');?>
  <script>
  
  function 	RefreshView() {
  	self.location="faqs.php?m=active";
}
$(function () {
  $('#memListTable').DataTable({
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'aaSorting' : [[0, 'desc']],
       'ajax': {
           'url':'api-controller.php?action=get_faqs'
       },
       'columns': [
         { data: 'id', name: 'id', "visible": false,searchable:false },
         { data: 'sno', name: 'sno' },
           { data: 'question', name: 'question' },
		   { data: 'answer', name: 'answer' },
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
                  action: 'get_faq_records',tbl:'faqs',id:myBookId
              },
               async: true,
               dataType: "json",
               success: function(data) {
                  // document.getElementById("loader")
                  //     .style.display = "none";
                  var dynHTML = '';
                  if (data.RESPONSE_CODE == '2XX') {
                      var allData = data.DATA;
          
          var personal_detail='<div class="table-responsive"><table class="table table-striped"><tbody class="css"><tr><th class="css1">Question</th><td>'+allData['data'].question+'</td></tr><tr><th class="css1">Answer</th><td>'+allData['data'].answer+'</td></tr></tbody></table></div>';


					
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
