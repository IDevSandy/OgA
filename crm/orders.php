<?php include('include/header.php');?>

  <!-- Left side column. contains the sidebar -->

  <?php include('include/leftsidebar.php'); ?>

  <?php

        $title='';

        $btn='';

        $disable='';

        if(isset($_REQUEST['id'])){



          $title="Edit Orders";

          $btn="Update";

          $disable='disabled';



          }

          else

          {

          $title="Add New Order";

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

        <!-- Pace page -->Orders Management

        <!-- <small>Loading example</small> -->

      </h1>

      <ol class="breadcrumb">

        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>



        <li class="active">Orders Management</li>

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">

        <!-- left column -->

        <div class="col-md-12">

          <?php

                     $id=$_REQUEST['id'] ?? '';

                     $where= array(

                     "id" => $id,

                     );

                     $BindData=$obj->select_record("orders",$where);



                     ?>

        <!-- Custom Tabs -->

        <div class="nav-tabs-custom1 tab">

            <ul class="nav nav-tabs">

              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>

              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-table"></i> List Orders</a></li>



            </ul>

            <div class="tab-content">

              <div class="tab-pane <?php echo $act1;?>" id="tab_1">

                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">

                  <input type="hidden" name="action" value="orders">

                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">

                <div class="row">

                  <div class="form-group col-xs-12">

                     <label for="status">Client Details</label> <a href="javascript:PopupCenter('clients.php','Add New Clients',700,600);" class="btn btn-danger btn-xs pull-right font-weight-bold">(+) Add New Client</a>

                     <select class="form-control select2 input-sm" id="clients" name="client_id" required>

                       <option value="">Please Select</option>

                       <?php

                       $where= array(

                       "status" => 1,

                       );

                       $category=$obj->fetch_all_record("clients",$where);

                       foreach ($category as $s) {

                         // var_dump($s);

                       ?>

                       <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['client_id']) && $BindData['client_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['owner_name']." | ".$s['title']." | ".$s['mobile']." | ".$s['email']." | ".$s['address'];?></option>

                       <?php

                     }

                       ?>

                   </select>

                  </div>

                  <div class="form-group col-md-3 col-xs-12 ">

                            <label for="title">Name</label>

                            <input type="text" class="form-control input-sm fe" name="name"  id="name" placeholder="Enter  Name" maxlength="300" value="<?php echo $t=$BindData['client_name'] ?? ''; ?>" readonly>

                          </div>

                          <div class="form-group col-md-3 col-xs-12 ">

                                    <label for="title">Mobile</label>

                                    <input type="text" class="form-control input-sm fe" name="mobile" id="mobile" placeholder="Enter  Mobile" maxlength="10" value="<?php echo $t=$BindData['mobile'] ?? ''; ?>" readonly>

                                  </div>

                                  <div class="form-group col-md-3 col-xs-12 ">

                                            <label for="title">Email</label>

                                            <input type="email" class="form-control input-sm fe" name="email" id="email" placeholder="Enter  Email" maxlength="300" value="<?php echo $t=$BindData['email'] ?? ''; ?>" readonly>

                                          </div>

                                          <div class="form-group col-md-3 col-xs-12 ">

                                                    <label for="title">Address</label>

                                                    <input type="text" class="form-control input-sm fe" name="address" id="address" placeholder="Enter  Address"  value="<?php echo $t=$BindData['address'] ?? ''; ?>" readonly>

                                                  </div>

                                              <div class="form-group col-md-3 col-xs-12">

                                                 <label for="status">Zones</label>

                                                 <select class="form-control select2 input-sm" id="zone" name="zone_id">

                                                   <option value="">Please Select</option>

                                                   <?php

                                                   $where= array(

                                                   "status" => 1,

                                                   );

                                                   $zones=$obj->fetch_all_record("zones",$where);

                                                   foreach ($zones as $s) {

                                                   ?>

                                                   <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['zone_id']) && $BindData['zone_id']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['title'];?></option>

                                                   <?php

                                                    }

                                                   ?>

                                                 </select>

                                              </div>

                                    <div class="form-group col-md-3 col-xs-12">

                                      <label for="title">Service Date</label>

                                      <input type="date" class="form-control input-sm" name="service_date"  value="<?php echo $t=$BindData['service_date'] ?? ''; ?>" required>

                                    </div>

                                    <div class="form-group  col-xs-12 col-md-3">

                                       <label for="status">Order Source</label>

                                         <select name="order_type" class="form-control input-sm" >

                                           <option value="direct" <?php echo $t=isset($BindData['order_type']) && $BindData['order_type']=='direct' ? 'selected=selected' :''; ?>>Direct</option>

                                           <option value="website" <?php echo $t=isset($BindData['order_type']) && $BindData['order_type']=='website' ? 'selected=selected' :''; ?>>Website</option>

                                           <option value="email" <?php echo $t=isset($BindData['order_type']) && $BindData['order_type']=='email' ? 'selected=selected' :''; ?>>Email</option>

                                           <option value="adwords" <?php echo $t=isset($BindData['order_type']) && $BindData['order_type']=='adwords' ? 'selected=selected' :''; ?>>Adwords</option>

                                           <option value="social media" <?php echo $t=isset($BindData['order_type']) && $BindData['order_type']=='social media' ? 'selected=selected' :''; ?>>Social Media</option>

                                           <option value="referred" <?php echo $t=isset($BindData['order_type']) && $BindData['order_type']=='referred' ? 'selected=selected' :''; ?>>Referred</option>

                                           <option value="other sources" <?php echo $t=isset($BindData['order_type']) && $BindData['order_type']=='other sources' ? 'selected=selected' :''; ?>>Other Sources</option>

                                         </select>

                                     </div>



                                     <div class="form-group col-md-3 col-xs-12">

                                      <label for="status">Services</label>

                                      <select class="form-control input-sm select2"  name="service_id" >

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

                                              ?>

                                           <option value="<?php echo $s2['id']; ?>" <?php echo $st=isset($BindData['service_id']) && $BindData['service_id']==$s2['id'] ? 'selected=selected' :''; ?>><?php echo $s2['title'].' ( ₹ '.$charges.' )';?></option>

                                              <?php

                                                }

                                                  echo '</optgroup>';

                                                }

                                              ?>

                                       </select>

                                    </div>









              <div class="col-xs-12">

                <div class="form-group">

                    <label for="title">Remarks</label>

                    <textarea class="form-control input-sm " name="remarks" placeholder="Enter Remarks"><?php echo $r=$BindData['remarks'] ?? ''; ?></textarea>

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

                               <div class="form-group col-md-2 col-xs-12">

                                  <label for="status">Lead Generated By</label>

                                  <select class="form-control select2 input-sm" id="sender_name">

                                    <option value="0">All</option>

                                    <?php

                                    $where= array(

                                    "status" => 1,

                                    "role_id" => 2

                                    );

                                    $su=$obj->fetch_all_record("system_users",$where);

                                    foreach ($su as $s) {

                                    ?>

                                    <option value="<?php echo $s['id']; ?>" ><?php echo $s['name'];?></option>

                                    <?php

                                  }

                                    ?>

                                  </select>

                                        </div>

                                        <div class="form-group  col-xs-12 col-md-2">

                                           <label for="status">Lead Source</label>

                                             <select name="lead_source" class="form-control input-sm" id="lead_source">

                                               <option value="0" >All</option>

                                               <option value="direct" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='direct' ? 'selected=selected' :''; ?>>Direct</option>

                                               <option value="website" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='website' ? 'selected=selected' :''; ?>>Website</option>

                                               <option value="email" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='email' ? 'selected=selected' :''; ?>>Email</option>

                                               <option value="adwords" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='adwords' ? 'selected=selected' :''; ?>>Adwords</option>

                                               <option value="social media" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='social media' ? 'selected=selected' :''; ?>>Social Media</option>

                                               <option value="referred" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='referred' ? 'selected=selected' :''; ?>>Referred</option>

                                               <option value="other sources" <?php echo $t=isset($BindData['lead_source']) && $BindData['lead_source']=='other sources' ? 'selected=selected' :''; ?>>Other Sources</option>

                                             </select>

                                         </div>

                                         <div class="form-group  col-xs-12 col-md-2">

                                                    <label for="status">Lead Status</label>

                                              <select name="lead_status" class="form-control input-sm" id="lead_status">

                                                <option value="0" >All</option>

                                                <option value="ongoing" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='ongoing' ? 'selected=selected' :''; ?>>On Going</option>

                                                <option value="not reachable" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='not reachable' ? 'selected=selected' :''; ?>>Not Reachable</option>

                                                <option value="won" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='won' ? 'selected=selected' :''; ?>>Won</option>

                                                <option value="loss" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='loss' ? 'selected=selected' :''; ?>>Loss</option>

                                                <option value="completed" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='completed' ? 'selected=selected' :''; ?>>Completed</option>

                                              </select>

                                             </div>

                                            <div class="form-group col-md-2 col-xs-12">

                                                <label for="title">Start Date</label>

                                                <input type="date" class="form-control input-sm" name="start_date" id="start_date" >

                                            </div>

                                            <div class="form-group col-md-2 col-xs-12">

                                                <label for="title">End Date</label>

                                                <input type="date" class="form-control input-sm" name="end_date" id="end_date" >

                                              </div>

                                                 <div class="form-group col-md-2 col-xs-12">

                                                   <label>&nbsp;</label><br/>

                                                   <button class="btn btn-default" id="btnSearch"><i class="fa fa-search"></i> Search</button> &nbsp;

                                                   <button class="btn btn-default" onclick="RefreshView();"><i class="fa fa-refresh"></i> </button>

                                                 </div>

                             </div>

                             <table id="memListTable" class="table table-hover table-striped">

                               <thead>

                                 <tr >

                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->

                                <th>id</th>

                                <th>Sno</th>

                                <th>Order id</th>

                                <th>Client</th>

                                <th>Proposal For</th>

                                <th>Type</th>

                                <th>Service Date</th>

                                <th>Operated By</th>

                                

                                <th>last Update</th>

                                <th>Action</th>
                                <th>Generated By</th>

                               </tr>

                               </thead>

                               <tbody id="tbody">



                               </tbody>

                                 <tfoot>

                                 <tr >

                                   <th>id</th>

                                   <th>Sno</th>

                                   <th>Order id</th>

                                   <th>Client</th>

                                   <th>Proposal For</th>

                                   <th>Type</th>

                                   <th>Service Date</th>

                                   <th>Operated By</th>

                                   

                                   <th>last Update</th>

                                     <th>Action</th>

                                     <th>Generated By</th>

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

  	self.location="orders.php?m=active";

}



$(function () {

    fill_datatable();

    function fill_datatable(start_date = '', end_date = '' , sender_name= '', lead_source='' , lead_status=''){

  $('#memListTable').DataTable({

       'processing': true,

       'serverSide': true,

       'serverMethod': 'post',

       'aaSorting' : [[0, 'desc']],

       'ajax': {

           'url':'api-controller.php?action=get_orders',

           'type':'POST',

           'data':{

            start_date:start_date,end_date:end_date,lead_source:lead_source,sender_name:sender_name,lead_status:lead_status

           }

       },

       'columns': [

         { data: 'id', name: 'id', "visible": false,searchable:false },

           { data: 'sno', name: 'sno' },

            { data: 'order_id', name: 'order_id' },

            { data: 'client', name: 'client' },

           { data: 'proposal_for', name: 'proposal_for' },

           { data: 'type', name: 'type' },

           { data: 'service_date', name: 'service_date' },

           { data: 'operated_by', name: 'operated_by' },


            { data: 'last_update', name: 'last_update' },

           { data: 'actions', name: 'actions', orderable: true, searchable: true },
           { data: 'generated_by', name: 'generated_by' },

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

  }

    $('#btnSearch').click(function(){

    var start_date = $('#start_date').val();

    var end_date = $('#end_date').val();

    var lead_source = $('#lead_source').val();

    var sender_name = $('#sender_name').val();

    var lead_status = $('#lead_status').val();

    if(start_date != '' && end_date != '' && sender_name != "" && lead_source !="" && lead_status !="")

    {

    $('#memListTable').DataTable().destroy();

    fill_datatable(start_date, end_date, sender_name, lead_source,lead_status);

    }

    else

    {

    alert('Select All filter option');

    $('#memListTable').DataTable().destroy();

    fill_datatable();

    }

    });

    // Auto Complete

    $( ".ttl" ).autocomplete({

       source: 'api-controller.php?action=get_title&tbl=services',

     });





     // Get Client Details

     $('#clients').on('change', function () {

  //ways to retrieve selected option and text outside handler

  // console.log('Changed option value ' + this.value);

  // console.log('Changed option text ' + $(this).find('option').filter(':selected').text());

  var sel=$(this).find('option').filter(':selected').text().split("|");

  $('#name').val(sel[0]);

  $('#mobile').val(sel[2]);

  $('#email').val(sel[3]);

  $('#address').val(sel[4]);

});











   });



   // Assign Now

   function assignNow() {

     // alert("Hii");

        $.ajax({

         type:'post',

        cache:false,

         url:'api-controller.php',

         data:$('.form1').serialize(),

         success:function(data) {

         if(data.RESPONSE_CODE == "2XX") {

          // $('.register-form').trigger("reset");

            $("#modal-default").modal('hide');

            // $('#memListTable').DataTable().destroy();

            // fill_datatable();

            RefreshView();

          toastr["success"]("Updated Successully!", "Success!")

          toastr.options = {

              "closeButton": true,

              "debug": false,

              "newestOnTop": true,

              "progressBar": true,

              "positionClass": "toast-top-right",

              "preventDuplicates": false,

              "onclick": null,

              "showDuration": "300",

              "hideDuration": "1000",

              "timeOut": "5000",

              "extendedTimeOut": "1000",

              "showEasing": "swing",

              "hideEasing": "linear",

              "showMethod": "fadeIn",

              "hideMethod": "fadeOut"

              }



             } else {

               // $('.register-form').trigger("reset");

               //alert(data.DATA[0].message);

               // var err=data.DATA[0].message;

               toastr["danger"]("Error in Assign! Try Again", "Error!")

              toastr.options = {

                  "closeButton": true,

                  "debug": false,

                  "newestOnTop": true,

                  "progressBar": true,

                  "positionClass": "toast-top-right",

                  "preventDuplicates": false,

                  "onclick": null,

                  "showDuration": "300",

                  "hideDuration": "1000",

                  "timeOut": "5000",

                  "extendedTimeOut": "1000",

                  "showEasing": "swing",

                  "hideEasing": "linear",

                  "showMethod": "fadeIn",

                  "hideMethod": "fadeOut"

                  }

             }

           },

        error : function (errormsg) {

          // serverError();

         }

         });



       }



   // Assignments

   $(document).on("click", ".assignments", function () {

     var orderId = $(this).data('oid');

           var myBookId = $(this).data('id');

           var myBooktitle=$(this).data('title');

           var tbl= 'orders';         //$(this).data('tbl');

           // var mobile=$(this).data('mobile');

           // var sts=$(this).data('status');





           if(myBookId != "") {

             $.ajax({

                 type: "POST",

                 url: "api-controller.php",

                 data: {

                     action: 'get_employees_by_zone',id:myBookId,orderId:orderId

                 },

                  async: true,

                  dataType: "json",

                  success: function(data) {

                     // document.getElementById("loader")

                     //     .style.display = "none";

                     var dynHTML = '';

                     if (data.RESPONSE_CODE == '2XX') {

                         var allData = data.DATA;

   // console.log(allData['supervisor']);

   var ord=allData['orders'];

   var orders='<p class="text-danger">Supervisor: <span class="font-weight-bold">'+ord.supe_name+'</span></p><p class="text-danger">Technician: <span class="font-weight-bold">'+ord.tech_name+'</span></p><p class="text-danger">Helper: <span class="font-weight-bold">'+ord.help_name+'</span></p>';



   var supervisor=allData['supervisor'];

   var sup='';

   for(i=0;i<supervisor.length; i++) {

     sup+='<option value="'+supervisor[i].id+'">'+supervisor[i].name+'</option>';

   }

   var technician=allData['technician'];

   var tech='';

   for(i=0;i<technician.length; i++) {

     tech+='<option value="'+technician[i].id+'">'+technician[i].name+'</option>';

   }

   var helper=allData['helper'];

   var help='';

   for(i=0;i<helper.length; i++) {

     help+='<option value="'+helper[i].id+'">'+helper[i].name+'</option>';

   }



   var sups='<div class="col-xs-12 form-group"><select class="form-control input-sm" name="sups"><option  value="">Select Supervisor</option>'+sup+'</select></div>';

   var techs='<div class="col-xs-12 form-group"><select class="form-control input-sm" name="techs"><option  value="">Select Technician</option>'+tech+'</select></div>';

var helps='<div class="col-xs-12 form-group"><select class="form-control input-sm" name="helps"><option  value="">Select Helpers</option>'+help+'</select></div>';

// var status='<div class="col-xs-12 form-group"><select class="form-control input-sm"   name="order_status"><option  value="new">New</option><option  value="assigned">Assigned</option><option  value="completed">Completed</option><option value="not resolved">Not Resolved</option><option value="cancelled">Cancelled</option></select></div>';

// dynHTML='<form class="form1" method="post" action="#"><input type="hidden" name="action" value="order_assignment"><input type="hidden" name="oid" value="'+orderId+'">'+sups+techs+helps+status+'<div class="form-group col-xs-12 text-center"><button type="button" class="btn btn-primary btn-sm " onclick="javascript:assignNow();">Assign Now</button></div></form>';

dynHTML=orders+'<form class="form1" method="post" action="#"><input type="hidden" name="action" value="order_assignment"><input type="hidden" name="oid" value="'+orderId+'">'+sups+techs+helps+'<div class="form-group col-xs-12 text-center"><button type="button" class="btn btn-primary btn-sm " onclick="javascript:assignNow();">Assign Now</button></div></form>';



                                     } else {

                     dynHTML='No Record Available';

                     }

                     $(".modal-body").html( dynHTML );



           }



         });

       }



          // $(".modal-body").html( dynHTML );

          $(".modal-title").html(myBooktitle);

   //        $("#order_status").val(sts);

   //

   //         // As pointed out in comments,

   //         // it is unnecessary to have to manually call the modal.

   //         // $('#addBookDialog').modal('show');

      });

     </script>

