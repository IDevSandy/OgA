<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Projects";
          $btn="Update";
          }
          else
          {
          $title="Start New Project";
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
        <!-- Pace page -->Projects Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Projects Management</li>
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
                     $BindData=$obj->select_record("projects",$where);
                     // $mob=isset($BindData['ref_mobile']) && $BindData['ref_mobile'] != ''? explode('-',$BindData['ref_mobile']) : '';

                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Projects</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="projects">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                <div class="row">
                  <div class="form-group col-md-3 col-xs-12">
                            <label for="title">Title</label>
                            <input type="text" class="form-control input-sm" name="title"  maxlength="500" placeholder="Enter Project Title" value="<?php echo $t=$BindData['title'] ?? ''; ?>" required>
                          </div>
                          <div class="form-group col-md-3 col-xs-12">
                                     <label for="status">Related Lead</label>
                                     <select class="form-control select2 input-sm" id="lead" name="lead_id" >
                               <option value="">Please Select</option>
                               <?php
                               $where= array(
                               "status" => 1,
                               );
                               $leads=$obj->fetch_all_record("leads",$where);
                               foreach ($leads as $s) {
                                 // var_dump($s);
                               ?>
                               <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['lead_id']) && $BindData['lead_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['lead_code'];?></option>
                               <?php
                             }
                               ?>
                             </select>
                                   </div>
                                   <div class="form-group col-md-3 col-xs-12">
                                              <label for="status">Related Client</label>
                                              <select class="form-control select2 input-sm" id="client" name="client_id" required>
                                        <option value="">Please Select</option>
                                        <?php
                                        $where= array(
                                        "status" => 1,
                                        );
                                        $category=$obj->fetch_all_record("clients",$where);
                                        foreach ($category as $s) {
                                          // var_dump($s);
                                        ?>
                                        <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['client_id']) && $BindData['client_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title']." ( ".$s['owner_name']." ) ";?></option>
                                        <?php
                                      }
                                        ?>
                                      </select>
                                            </div>
                           <div class="form-group col-md-3 col-xs-12">
                                      <label for="status">Related Service</label>
                                      <select class="form-control input-sm select2"  name="service_id" required>
                                             <option value="">Please Select</option>
                                             <?php
                                              $where= array(
                                              "status" => 1,
                                              );
                                              $subcategory=$obj->fetch_all_record("subcategories",$where);
                                              foreach ($subcategory as $s) {
                                                $condition= array(
                                                "subcategory_id" => $s['id'],
                                                );
                                              echo  '<optgroup label="'.$s['title'].'">';
                                              $services=$obj->fetch_all_record("services",$condition);
                                              foreach ($services as $s2) {
                                                $charges=$s2['charge'];

                                                // var_dump($s);
                                              ?>
                                              <option value="<?php echo $s2['id']; ?>" <?php echo $st=isset($BindData['service_id']) && $BindData['service_id']==$s2['id'] ? 'selected=selected' :''; ?>><?php echo $s2['title'].' ( ₹ '.$charges.' )';?></option>
                                              <?php
                                            }
                                              echo '</optgroup>';
                                            }
                                              ?>
                                           </select>
                                    </div>

                           <div class="form-group col-md-3 col-xs-12">
                                     <label for="title">Start Date</label>
                                     <input type="date" class="form-control input-sm" name="start_date"  maxlength="200" placeholder="Enter Start Date" value="<?php echo $t=$BindData['start_date'] ?? ''; ?>" required>
                                   </div>
                                   <div class="form-group col-md-3 col-xs-12">
                                             <label for="title">End Date</label>
                                             <input type="date" class="form-control input-sm" id="datefield" name="end_date"  maxlength="200" placeholder="Enter End Date" value="<?php echo $t=$BindData['end_date'] ?? ''; ?>" >
                                           </div>


                      <div class="form-group col-md-3 col-xs-12">
                      <label for="title">Total Cost</label>
                      <input type="tel"  name="total_cost" placeholder="Enter Total Cost" class="form-control input-sm" maxlength="10" value="<?php echo $cf=$BindData['total_cost'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required >
                               </div>
                               <div class="form-group col-md-3 col-xs-12">
                               <label for="title">Total Duration <small class="text-danger">*In days</small></label>
                               <input type="tel"  name="total_duration" placeholder="Enter Total Duration" class="form-control input-sm" maxlength="10" value="<?php echo $cf=$BindData['total_duration'] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
                            </div>
                              <div class="form-group col-xs-12 col-md-6">
                                  <label for="title">Payment Terms</label>
                                  <textarea class="form-control input-sm" name="payment_terms" placeholder="Enter Payment Terms"><?php echo $r=$BindData['payment_terms'] ?? ''; ?></textarea>
                                </div>
                                <div class="form-group col-xs-12 col-md-6">
                                    <label for="title">Description/ Remarks</label>
                                    <textarea class="form-control input-sm" name="description" placeholder="Enter Description/ Remarks"><?php echo $r=$BindData['description'] ?? ''; ?></textarea>
                                  </div>
                             <!-- <div class="form-group col-md-4 col-xs-12">
             <label for="title">Requirement Attachment <small class="text-danger">*accept only .jpg,.png,.pdf,.xls,xlsx files </small></label>
             <input type="file" name="source" class="form-control input-sm" accept="image/jpeg,image/png,application/pdf,image/x-eps,application/vnd.ms-excel"/>
             <?php
                if(isset($BindData['requirement_file']) && $BindData['requirement_file'] !="")
                {
                ?>
<a href="../<?php echo $BindData['requirement_file'];?>" style="cursor:pointer;" class="btn btn-success btn-xs pull-right" target="_blank"><i class="fa fa-eye" ></i> View Attachment</a>
<?php
                  }
                ?>
                                      <input type="hidden" value="<?php echo $fl=$BindData['requirement_file']?? '';?>" name="old-logo">
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                   <label for="title">Quotation/ Proposal Attachment <small class="text-danger">*accept only .jpg,.png,.pdf,.xls,xlsx files </small></label>
                                   <input type="file" name="files" class="form-control input-sm" accept="image/jpeg,image/png,application/pdf,image/x-eps,application/vnd.ms-excel"/>
                                   <?php
                                   if(isset($BindData['quotation_file']) && $BindData['quotation_file'] !="")
                                   {
                                   ?>
                                   <a href="../<?php echo $BindData['quotation_file'];?>" style="cursor:pointer;" class="btn btn-success btn-xs pull-right" target="_blank"><i class="fa fa-eye" ></i> View Attachment</a>
                                   <?php
                                   }
                                   ?>
                                             <input type="hidden" value="<?php echo $fl=$BindData['quotation_file']?? '';?>" name="old-file">
                                           </div>
 -->


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
                                <th>client</th>
                                <th>start date</th>
                                <th>end date</th>
                                <th>total cost</th>
                                <th>total duration</th>
                                <th>attachments</th>
                                  <th>project status</th>
                                <th>phases</th>
                                <th>payment schedules</th>
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
                                  <th>client</th>
                                  <th>start date</th>
                                  <th>end date</th>
                                  <th>total cost</th>
                                  <th>total duration</th>
                                  <th>attachments</th>
                                  <th>project status</th>
                                  <th>phases</th>
                                  <th>payment schedules</th>
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
  	self.location="projects.php?m=active";
}

$(function () {
  setDate();
  $('#memListTable').DataTable({
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'aaSorting' : [[0, 'desc']],
       'ajax': {
           'url':'api-controller.php?action=get_projects'
       },
       'columns': [
         { data: 'id', name: 'id', "visible": false,searchable:false },
           { data: 'sno', name: 'sno' },
            { data: 'project_code', name: 'project_code' },
            { data: 'title', name: 'title' },
           { data: 'clients', name: 'clients' },
           { data: 'start_date', name: 'start_date' },
           { data: 'end_date', name: 'end_date' },
           { data: 'total_cost', name: 'total_cost' },
           { data: 'total_duration', name: 'total_duration' },
           { data: 'attachments', name: 'attachments' },
            { data: 'project_status', name: 'project_status' },
            { data: 'phases', name: 'phases' },
            { data: 'payment_schedules', name: 'payment_schedules' },
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
   $(document).on("click", ".open-AddBookDialog", function () {
        var myBookId = $(this).data('id');
        var myBooktitle=$(this).data('title');
        var tbl=$(this).data('tbl');
        if(myBookId != "") {
          $.ajax({
              type: "POST",
              url: "api-controller.php",
              data: {
                  action: 'get_project_records',tbl:'projects',id:myBookId
              },
               async: true,
               dataType: "json",
               success: function(data) {
                  // document.getElementById("loader")
                  //     .style.display = "none";
                  var dynHTML = '';
                  if (data.RESPONSE_CODE == '2XX') {
                      var allData = data.DATA;
// console.log(allData);
                      // id = allData[i].id;
                      // pttl = allData[i].title;
                      // st = allData[i].status;
                      //
                      // dynHTML += '<tr class="gradeX"><td>'+id+'</td><td>' + pttl + '</td><td>' + sts + '</td><td><a href="categories.php?id=' + id + '"><i class="material-icons">edit</i></a></td><td><a href="javascript:void(0);" class="cs-delete" onclick="javascript:deleteRow(' + id + ',\'categories\')" ><i class="material-icons">delete_sweep</i></a></td></tr>';
                    var  projects='<tr><td>Code</td><th>'+allData['data'].project_code+'</th></tr><tr><td>Title</td><th>'+allData['data'].title+'</th></tr><tr><td>Start Date</td><th>'+allData['data'].start_date+'</th><tr><td>End Date</td><th>'+allData['data'].end_date+'</th></tr><tr><td>Total Cost</td><th><i class="fa fa-inr"></i>'+allData['data'].total_cost+'</th><tr><td>Total Time</td><th>'+allData['data'].total_duration+' days</th><tr><td>Payment Terms</td><th><p>'+allData['data'].payment_terms+'</p></th></tr><tr><td>Description/ Remarks</td><th><p>'+allData['data'].description+'</p></th></tr><tr><td>Requirement File</td><th><a href="../'+allData['data'].requirement_file+'" class="btn btn-success">View File</a></th></tr><tr><td>Quotation File</td><th><a href="../'+allData['data'].quotation_file+'" class="btn btn-success">View File</a></th></tr>';
                    dynHTML='<div class="table-responsive"><table class="table table-bordered"><tr><th>Fields</th><th>Data</th></tr>'+projects+'</table></div>';
                  } else {
                  dynHTML='No Record Available';
                  }
                  $(".modal-body").html( dynHTML );
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
//    }



  </script>
