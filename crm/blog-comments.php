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
		<!-- Pace page -->Blogs Management
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
               <label for="status">Category</label>
               <select class="form-control select2 input-sm" id="category" name="blog_cat_id" required>
                 <option value="">Please Select</option>
                 <?php
                 $where= array(
                 "status" => 1,
                 );
                 $cat=$obj->fetch_all_record("blog_categories",$where);
                 foreach ($cat as $s) {
                 ?>
                 <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['category_id']) && $BindData['blog_cat_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
                 <?php
               }
                 ?>
               </select>
                     </div>
            <div class="form-group">
               <label for="status">Blogs</label>
               <select class="form-control select2 input-sm" id="service" name="service_id" required>
                 <option value="">Please Select</option>
                 <?php
                 $where= array(
                 "status" => 1,
                 );
                 $cat=$obj->fetch_all_record("blogs",$where);
                 foreach ($cat as $s) {
                 ?>
                 <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['blog_id']) && $BindData['blogs_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>
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
					 <div class="col-md-6 col-xs-12">
						<div class="form-group">
							<label for="title">Name</label>
							<input type="text" class="form-control input-sm" name="name" required value="<?php echo $t=$BindData['name'] ?? ''; ?>" onchange="UpdateLink(this.value);"/>
						</div>
						<div class="form-group">
							<label for="title">Email</label>
							<input type="text" class="form-control input-sm" name="email" required value="<?php echo $t=$BindData['email'] ?? ''; ?>" onchange="UpdateLink(this.value);"/>
						</div>
						</div>
					<div class="col-xs-12">
           
						<div class="form-group">
							<label for="meta Keywords">comment</label>
							<textarea name="comment" class="ckeditor"><?php echo $BindData['comment'];?></textarea>
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
  </script>
