<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit service Faq";
          $btn="Update";
          }
          else
          {
          $title="Add New service Faq";
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
		<!-- Pace page -->Service Faqs Management
		<!-- <small>Loading example</small> -->
		</h1>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active">service Faq Management</li>
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
               $BindData=$obj->select_record("service_faqs",$where);
               ?>
	<!-- Custom Tabs -->
	<div class="nav-tabs-custom1 tab">
		<ul class="nav nav-tabs">
			<li class="<?php echo $act1;?>">
				<a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"><i class="fa fa-plus"></i>  <?php echo $title; ?> </a>
			</li>
			<li class="<?php echo $act2;?>">
				<a href="#tab_2" data-toggle="tab"><i class="fa fa-table"></i> Manage service Faq</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane <?php echo $act1;?>" id="tab_1">
				<form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="action" value="servicefaq">
					<input type="hidden" name="id" value="<?php echo $id;?>">

					<div class="col-md-6 col-xs-12">
            <div class="form-group">
               <label for="status">service</label>
               <select class="form-control select2 input-sm" id="service" name="service_id" required>
                 <option value="">Please Select</option>
                 <?php
                 $where= array(
                 "status" => 1,
                 );
                 $cat=$obj->fetch_all_record("services",$where);
                 foreach ($cat as $s) {
                 ?>
                 <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['service_id']) && $BindData['service_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                 <?php
               }
                 ?>
               </select>
                     </div>
					</div> <!-- End col 1-->
					<div class="col-md-6 col-xs-12">
                <div class="form-group ">
                       <label for="status">Status</label>
                       <select name="status" class="form-control input-sm" >
                   <option value="1" <?php echo $t=isset($BindData['status']) && $BindData['status']=='1' ? 'selected=selected' :''; ?>>Active</option>
                   <option value="0" <?php echo $t=isset($BindData['status']) && $BindData['status']=='0' ? 'selected=selected' :''; ?>>Inactive</option>
                 </select>
                     </div>
					</div> 
					<!-- End Col-2 -->
					 <div class="col-xs-12">
						<div class="form-group">
							<label for="title">Question</label>
							<input type="text" class="form-control input-sm" name="question" required value="<?php echo $t=$BindData['question'] ?? ''; ?>" onchange="UpdateLink(this.value);"/>
						</div>
						</div>
					<div class="col-xs-12">
           
						<div class="form-group">
							<label for="meta Keywords">Answer</label>
							<textarea name="answer" class="ckeditor"><?php echo $BindData['answer'];?></textarea>
						</div>
					</div>
					<div class="form-group text-center">
					<button type="submit" class="btn btn-primary btn-lg" ><?php echo $btn; ?></button>
					</div>
				</form>
			</div>
			<!-- /.tab-pane -->
			<div class="tab-pane <?php echo $act2;?>" id="tab_2">
				<div class="box">
					<div class="box-header">
					</div>
				<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table id="memListTable" class="table table-hover table-striped">
							<thead>
								<tr >
                  <th>id</th>
                  <th>sno</th>
                <th>Question</th>
									<th>Services</th>
									<th>Last Update</th>
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
								<th>Services</th>
								
                <th>Last Update</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</tfoot>
						</table>
					</div>
				<!-- /.box-body -->
				</div>
			</div>
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
  <?php include('include/footer.php'); ?>
  <script>
  function 	RefreshView() {
  	self.location="service-faq.php?m=active";
}

$(function () {
  $('#memListTable').DataTable({
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'aaSorting' : [[0, 'desc']],
       'ajax': {
           'url':'api-controller.php?action=get_servicefaq'
       },
       'columns': [
         { data: 'id', name: 'id', "visible": false,searchable:false },
         { data: 'sno', name: 'sno' },
         { data: 'question', name: 'question' },
           { data: 'service', name: 'service' },
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
   function UpdateLink(e) {
     var link=e.replace(" ","-");
     if(e !="") {
       document.getElementById("plink").value=link;
     }
   }
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
                  action: 'get_servicefaq_records',tbl:'service_faqs',id:myBookId
              },
               async: true,
               dataType: "json",
               success: function(data) {
                  // document.getElementById("loader")
                  //     .style.display = "none";
                  var dynHTML = '';
                  if (data.RESPONSE_CODE == '2XX') {
                      var allData = data.DATA;

          var exp=allData['expertise'];
          exps='';
          var personal_detail='<div class="table-responsive"><table class="table table-striped"><tbody class="css"><tr><th class="css1">Service</th><td>'+allData['data'].services+'</td></tr><tr><th class="css1">Question</th><td>'+allData['data'].question+'</td></tr><tr><th class="css1">Answer</th><td>'+allData['data'].answer+'</td></tr></tbody></table></div>';

					
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
