<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Edit Settings";
          $btn="Update";
          }
          else
          {
          $title="Add New Settings";
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
        <!-- Pace page -->Website Settings
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Website Settings </li>
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
                     $BindData=$obj->select_record("website_settings",$where);
                     $mob=isset($BindData['contact_no']) && $BindData['contact_no'] != ''? explode('-',$BindData['contact_no']) : '';
                     $mob2=isset($BindData['contact_no_2']) && $BindData['contact_no_2'] != ''? explode('-',$BindData['contact_no_2']) : '';
                     $mob3=isset($BindData['admin_mobile_no']) && $BindData['admin_mobile_no'] != ''? explode('-',$BindData['admin_mobile_no']) : '';
                     ?>
        <!-- Custom Tabs -->

        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <!-- <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-table"></i> List Employees</a></li> -->

            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="settings">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                         <div class="panel panel-primary">
  <div class="panel-heading"><h4 class="font-weight-bold">General Settings</h4></div>
  <div class="panel-body">
    <div class="row">



      <div class="form-group col-md-4 col-xs-12">
                <label for="title">Site Name</label>
                <input type="text" class="form-control input-sm" name="site_name" placeholder="Enter Site Name" maxlength="300" value="<?php echo $t=$BindData['site_name'] ?? ''; ?>" required>
              </div>

               <div class="form-group col-md-1 col-xs-12">
                 <label for="title">Country</label>
                 <select name="countryCode1" class="form-control select21 input-sm" >

                    <?php
                    foreach($countryArray as $code => $country){
                        $countryName = ucwords(strtolower($country["name"])); // Making it look good
                        ?>
                        <option  value="+<?php echo $country["code"]; ?>" <?php echo $cc=isset($mob[0]) && $mob[0]==$country["code"] ? 'selected=selected' :''; ?>><?php echo $countryName." (+".$country["code"].")"; ?> </option>
                    <?php
                      }
                    ?>

                  </select>
               </div>
              <div class="form-group col-md-3 col-xs-12">
                        <label for="title">Customer Support Number</label>
      <input id="name5" type="tel"  name="mobile1" placeholder="Enter Mobile Number" class="form-control input-sm" maxlength="10" value="<?php echo $af=$mob[1] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" required>
               </div>

               <div class="form-group col-md-1 col-xs-12">
                 <label for="title">Country</label>
                 <select name="countryCode2" class="form-control select21 input-sm" >

                    <?php
                    foreach($countryArray as $code => $country){
                        $countryName = ucwords(strtolower($country["name"])); // Making it look good
                        ?>
                        <option  value="+<?php echo $country["code"]; ?>" <?php echo $cc=isset($mob2[0]) && $mob2[0]==$country["code"] ? 'selected=selected' :''; ?>><?php echo $countryName." (+".$country["code"].")"; ?> </option>
                    <?php
                      }
                    ?>

                  </select>
               </div>
               <div class="form-group col-md-3 col-xs-12">
                         <label for="title">Alternate Mobile Number</label>
      <input id="name6" type="tel"  name="mobile2" placeholder="Enter Alt Mobile Number" class="form-control input-sm" maxlength="10" value="<?php echo $af=$mob2[1] ?? ''; ?>" onkeypress="javascript:allowNumeric(this,event);" >
                </div>

               <div class="form-group col-md-4 col-xs-12">
                         <label for="title">Email</label>
                         <input type="email" class="form-control input-sm" name="email" placeholder="Enter Email" maxlength="100" value="<?php echo $t=$BindData['email'] ?? ''; ?>" required>
                       </div>

      <div class="form-group col-md-4 col-xs-12">
      <label for="title">Copyright Text</label>
      <input type="text" class="form-control input-sm" name="copyright_text" placeholder="Enter Copyright Text" maxlength="200" value="<?php echo $t=$BindData['copyright_text'] ?? ''; ?>" required>
      </div>
      <div class="form-group col-md-4 col-xs-12">
      <label for="title">Site Logo <small class="text-danger">*accept only .jpg,.png,files </small></label>
      <?php
      if(isset($BindData['file_url']) && $BindData['file_url'] !="")
      {
      ?>
      <a href="../<?php echo $BindData['file_url'];?>" style="cursor:pointer;" class="btn btn-success btn-xs pull-right example-image-link" data-lightbox="example-1" ><i class="fa fa-eye" ></i> View Logo</a>
      <?php
      }
      ?>
      <input type="file" name="source" class="form-control input-sm" accept="image/*"/>

               <input type="hidden" value="<?php echo $fl=$BindData['file_url']?? '';?>" name="old-logo">
             </div>
      <div class="form-group col-md-3 col-xs-12">
              <label for="title">Head Office Address</label>
               <textarea class="form-control input-sm" name="address" placeholder="Enter Head Office Address" id="paddress"required><?php echo $r=$BindData['address'] ?? ''; ?></textarea>
      </div>
      <div class="form-group col-md-3 col-xs-12">
               <label for="title">Branch Office Address</label>
                <textarea class="form-control input-sm" name="address_2" placeholder="Enter Branch Office Address" ><?php echo $r=$BindData['address_2'] ?? ''; ?></textarea>
      </div>
      <div class="form-group col-md-3 col-xs-12">
                <label for="title">Head Office Location Map</label>
                 <textarea class="form-control input-sm" name="location" placeholder="Enter Head Office Location Map" ><?php echo $r=$BindData['location'] ?? ''; ?></textarea>
       </div>
       <div class="form-group col-md-3 col-xs-12">
           <label for="title">Branch Office Location Map</label>
            <textarea class="form-control input-sm" name="location_2" placeholder="Enter Branch Office Location Map" ><?php echo $r=$BindData['location_2'] ?? ''; ?></textarea>
        </div>

    </div>
  </div>
</div>    <!-- End Panel 1-->
<div class="panel panel-primary">
  <div class="panel-heading"><h4 class="font-weight-bold"> Email Settings </h4></div>
  <div class="panel-body">
    <div class="row">
      <div class="form-group col-md-4 col-xs-12">
                <label for="title">Goes From Name</label>
                <input type="text" class="form-control input-sm" name="goes_from_name" placeholder="Enter Goes From Name" maxlength="50" value="<?php echo $t=$BindData['goes_from_name'] ?? ''; ?>" required>
              </div>
              <div class="form-group col-md-4 col-xs-12">
                        <label for="title">Goes From Email</label>
                        <input type="email" class="form-control input-sm" name="goes_from_email" placeholder="Enter Goes From Email" maxlength="100" value="<?php echo $t=$BindData['goes_from_email'] ?? ''; ?>" required>
                      </div>
                      <div class="form-group col-md-4 col-xs-12">
                                <label for="title">Contact Email</label>
                                <input type="email" class="form-control input-sm" name="contact_email" placeholder="Enter Contact Email" maxlength="100" value="<?php echo $t=$BindData['contact_email'] ?? ''; ?>" required>
                              </div>
                    <div class="form-group col-md-4 col-xs-12">
                              <label for="title">Support Email</label>
                              <input type="email" class="form-control input-sm" name="support_email" placeholder="Enter Support Email" maxlength="100" value="<?php echo $t=$BindData['customer_support_email'] ?? ''; ?>" required>
                            </div>

                    <div class="form-group col-md-4 col-xs-12">
                              <label for="title">Sales Email</label>
                              <input type="email" class="form-control input-sm" name="sales_email" placeholder="Enter Sales Email" maxlength="100" value="<?php echo $t=$BindData['sales_email'] ?? ''; ?>" required>
                            </div>
                    <div class="form-group col-md-4 col-xs-12">
                              <label for="title">Career Email</label>
                              <input type="email" class="form-control input-sm" name="career_email" placeholder="Enter Career Email" maxlength="100" value="<?php echo $t=$BindData['careers_email'] ?? ''; ?>" required>
                            </div>

    </div>
  </div>
</div> <!-- End Panel 2-->
<div class="panel panel-primary">
  <div class="panel-heading"><h4 class="font-weight-bold">Social Settings</h4></div>
  <div class="panel-body">
    <div class="row">
      <div class="form-group col-md-4 col-xs-12">
                <label for="title">Facebook Url</label>
                <input type="text" class="form-control input-sm" name="facebook_url" placeholder="Enter Facebook Url" maxlength="200" value="<?php echo $t=$BindData['facebook_url'] ?? ''; ?>" >
              </div>
        <div class="form-group col-md-4 col-xs-12">
        <label for="title">Twitter Url</label>
        <input type="text" class="form-control input-sm" name="twitter_url" placeholder="Enter Twitter Url" maxlength="200" value="<?php echo $t=$BindData['twitter_url'] ?? ''; ?>" >
        </div>
        <div class="form-group col-md-4 col-xs-12">
        <label for="title">Instagram Url</label>
        <input type="text" class="form-control input-sm" name="instagram_url" placeholder="Enter Instagram url" maxlength="200" value="<?php echo $t=$BindData['instagram_url'] ?? ''; ?>" >
        </div>
        <div class="form-group col-md-4 col-xs-12">
        <label for="title">Pinterest_url</label>
        <input type="text" class="form-control input-sm" name="pinterest_url" placeholder="Enter Pinterest Url" maxlength="200" value="<?php echo $t=$BindData['pinterest_url'] ?? ''; ?>" >
        </div>
        <div class="form-group col-md-4 col-xs-12">
        <label for="title">Youtube Url</label>
        <input type="text" class="form-control input-sm" name="youtube_url" placeholder="Enter Youtube Url" maxlength="200" value="<?php echo $t=$BindData['youtube_url'] ?? ''; ?>" >
        </div>
        <div class="form-group col-md-4 col-xs-12">
        <label for="title">LinkedIn Url</label>
        <input type="text" class="form-control input-sm" name="linkedin_url" placeholder="Enter Linkedin Url" maxlength="200" value="<?php echo $t=$BindData['linkedin_url'] ?? ''; ?>" >
        </div>
    </div>
  </div>
</div> <!-- panel 5-->
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
  	self.location="settings.php?id=1";

}

    $(document).on("click", ".open-AddBookDialog", function () {
        var myBookId = $(this).data('id');
        var myBooktitle="Employee ID: "+$(this).data('title');
        var tbl=$(this).data('tbl');
		$(".modal-dialog").css("width", "80%");
        if(myBookId != "") {
          $.ajax({
              type: "POST",
              url: "api-controller.php",
              data: {
                  action: 'get_employee_records',tbl:'employees',id:myBookId
              },
               async: true,
               dataType: "json",
               success: function(data) {
                  // document.getElementById("loader")
                  //     .style.display = "none";
                  var dynHTML = '';
                  if (data.RESPONSE_CODE == '2XX') {
                      var allData = data.DATA;


					var job_detail = '<tr><th>Employee Name</th><td>'+allData['data'].name+'</td><th>Designation</th><td>'+allData['data'].designation+'</td></tr><tr><th>Zone</th><td>'+allData['data'].zone+'</td><th>Department</th><td>'+allData['data'].department+'</td></tr><tr><th>Date of Joining</th><td>'+allData['data'].doj+'</td><th>Qualification</th><td style="text-transform:capitalize;">'+allData['data'].qualification+'</td></tr><tr><th>Job Type</th><td style="text-transform:capitalize;">'+allData['data'].type+'-'+allData['data'].shift+'-'+allData['data'].job_type+'</td><th>Experience</th><td>'+allData['data'].experience+'</td></tr>';

          var bank_detail = '<tr><th>Bank Name</th><td>'+allData['data'].bank_name+'</td><th>Branch</th><td>'+allData['data'].branch+'</td></tr><tr><th>Account Number</th><td>'+allData['data'].acc_number+'</td><th>IFSC Code</th><td>'+allData['data'].ifsc_code+'</td></tr><tr><th>Account Holder Name</th><td>'+allData['data'].acc_holder_name+'</td><th>UPI ID</th><td>'+allData['data'].upi_id+'</td></tr>';

          var  references='<tr><th>Name</th><th>Relation</th><th>Mobile No.</th><th>Email</th></tr>';
					var ref=allData['reference'];
					for(i=0;i< ref.length;i++) {
						//console.log(ser[i].standard);
							references +='<tr><td><p class="text-success"><i class="fa fa-user"></i> '+ref[i].name+'</p></td><td>'+ref[i].relation+'</td><td><p class="text-danger"><i class ="fa fa-phone"></i>'+ref[i].mobile1+'</p><p class="text-success"><i class="fa fa-phone"></i>'+ref[i].mobile2+'</p></td><td><i class ="fa fa-envelope"></i> '+ref[i].email+'</td></tr>';
					}

          var exp=allData['expertise'];
          exps='';

          for(i=0;i<exp.length; i++) {
            exps+='<div class="col-md-3 col-xs-6" style="font-size:13px;margin:2px;"><p class="label label-success" ><i class="fa fa-wrench"></i> '+ exp[i].title+'</p></div>';
          }
          var expertise='<div class="row">'+exps+'</div>';
          var bike= (allData['data'].bike_available =='yes') ? '<span class="label label-success" ><i class="fa fa-check"></i>Yes</span>': '<span class="label label-danger" ><i class="fa fa-times"></i>No</span>';
          var dl= (allData['data'].driving_licence =='yes') ? '<span class="label label-success" ><i class="fa fa-check"></i>Yes</span>': '<span class="label label-danger" ><i class="fa fa-times"></i>No</span>';
          var tool= (allData['data'].tools_available =='yes') ? '<span class="label label-success" ><i class="fa fa-check"></i>Yes</span>': '<span class="label label-danger" ><i class="fa fa-times"></i>No</span>';
          var computer= (allData['data'].computer =='yes') ? '<span class="label label-success" ><i class="fa fa-check"></i>Yes</span>': '<span class="label label-danger" ><i class="fa fa-times"></i>No</span>';

          var amenities='<tr><th>Bike Available?</th><td>'+bike+'</td><th>Driving Licence Available?</th><td>'+dl+'</td></tr><tr><th> Tools Available?</th><td>'+tool+'</td><th>Computer Skill?</th><td>'+computer+'</td></tr>';



          var personal_detail='<tr><th>Permanent Address</th><td>'+allData['data'].paddress+'</td><th>Current Address</th><td>'+allData['data'].caddress+'</td></tr><tr><th>Mobile</th><td>'+allData['data'].mobile1+'</td><th>Alt. Mobile</th><td>'+allData['data'].mobile2+'</td></tr><tr><th>Email ID</th><td>'+allData['data'].email+'</td><th>Nationality</th><td>'+allData['data'].nationality+'</td></tr><tr><th>Gender</th><td style="text-transform:capitalize;">'+allData['data'].gender+'</td><th>Marital Status</th><td style="text-transform:capitalize;">'+allData['data'].marital_status+'</td></tr><tr><th>Adhaar Number</th><td>'+allData['data'].aadhar_card_number+'</td><th>PAN Card Number</th><td>'+allData['data'].pan_number+'</td></tr>';

					var attachments='<tr><th>Title</th><th>Files</th><th>Remarks</th></tr>';
					var at=allData['attachment'];
					// console.log(allData['attachment']);
					for(i=0;i< at.length;i++) {
						// console.log(at);
							attachments +='<tr><td>'+at[i].title+'</td><th><a href="../'+at[i].file_url+'" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i> View File</a></th><td>'+at[i].remarks+'</td></tr>';
					}

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
					imgHTML ='<div class="row card bg-green1" style="padding:2%;"><div class="col-md-8 col-xs-6 "><h1 class="text-white font-weight-bold">'+allData['data'].name+'</h1><h2 class="text-white font-weight-bold">'+allData['data'].designation+'</h2><h4 class="font-weight-bold text-white">'+allData['data'].department+'</h4></div><div class="widget-user-image col-md-4 col-xs-6"><img class="img-responsive img-rounded pull-right" src="../'+allData['data'].profile_pic_url+'" alt="" style="width:150px;height:150px;"></div></div>';

					dynHTML='<div class="table-responsive" style="height:500px;overflow-y:auto;"><table class="table table-bordered">'+imgHTML+'</table><table class="table table-bordered"><tr><p><b>Job Details</b></p></tr>'+job_detail+'</table><table class="table table-bordered"><tr><p><b>Expertise</b></p></tr>'+expertise+'</table><table class="table table-bordered"><tr><p><b>Amenities</b></p></tr>'+amenities+'</table><table class="table table-bordered"><tr><p><b>Personal Information</b></p></tr>'+personal_detail+'</table><table class="table table-bordered"><tr><p><b>Bank Details</b></p></tr>'+bank_detail+'</table><table class="table table-bordered"><tr><p><b>Emergency Contacts</b></p></tr>'+references+'</table><table class="table table-bordered"><tr><p><b>KYC Documents</b></p></tr>'+attachments+'</table></div>';
                  } else {
                  dynHTML='No Record Available';
                  }
                  $(".modal-body").html(  dynHTML );
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
// }

</script>
