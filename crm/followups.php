<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
  $ptitle=mysqli_fetch_array(mysqli_query($obj->con,"select * from leads where id=".$_REQUEST['lid']));
  $c=mysqli_fetch_array(mysqli_query($obj->con,"select * from clients where id=".$ptitle['client_id']));

        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Update Followup";
          $btn="Update";
          }
          else
          {
          $title="New Followup";
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
        <!-- Pace page --> Followups for <a href="leads.php?id=<?php echo $_REQUEST['lid']; ?>"><?php echo $ptitle['lead_code'];?></a>
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="leads.php"><i class="fa fa-clipboard"></i>Leads</a></li>
        <li class="active">Clients Follow Up</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Details for <a href="leads.php?id=<?php echo $_REQUEST['lid']; ?>"><?php echo $ptitle['lead_code'];?></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding table-responsive">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                  <th>Fields</th>
                  <th>Data</th>
                  <th>Fields</th>
                  <th>Data</th>
                </tr>
                <tr>
                  <td>Lead Code</td>
                  <td><?php echo $ptitle['lead_code'];?></td>
                  <td>Name</td>
                  <td>
                  <?php
                  echo $c['owner_name'];
                   ?>
                  </td>


                </tr>
                <tr>
                  <td>Lead For</td>
                  <td>
                  <?php
                  $pfor=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from services where id=".$ptitle['service_id']));
                  echo $pfor['title'];
                   ?>
                  </td>
                  <td>Mobile</td>
                  <td>
                    <?php echo $c['mobile']; ?>
                  </td>

                </tr>
<tr>
  <td>
    Company Name
  </td>
  <td>
    <?php echo $c['title']; ?>
  </td>

  <td>Email</td>
  <td>
    <?php echo $c['email']; ?>
  </td>
</tr>
<tr>
  <td>Address</td>
  <td>
    <?php echo $c['address']; ?>
  </td>
  <td>Website</td>
  <td>
    <?php echo $c['website']; ?>
  </td>
</tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="clearfix">&nbsp;</div>
          <?php
            require_once('include/countryCodes.php');
                     $id=$_REQUEST['id']??'';
                     $where= array(
                     "id" => $id,
                     );
                     $BindData=$obj->select_record("follow_ups",$where);
                     $mob=isset($BindData['mobile1']) && $BindData['mobile1'] != ''? explode('-',$BindData['mobile1']) : '';
                     // $mob2=isset($BindData['mobile2']) && $BindData['mobile2'] != ''? explode('-',$BindData['mobile2']) : '';

                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Followups</a></li>
              </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="followups">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                  <input type="hidden" name="cid" value="<?php echo $cid=$ptitle['client_id'] ?? ''; ?>">
                  <input type="hidden" name="lid" value="<?php echo $lid=$ptitle['id'] ?? ''; ?>">
                <div class="row">

                           <div class="form-group  col-xs-12 col-md-3">
                                      <label for="status">Mode of Followup</label>
                                <select name="mode" class="form-control input-sm" >
                                  <option value="By Call" <?php echo $t=isset($BindData['mode']) && $BindData['mode']=='By Call' ? 'selected=selected' :''; ?>>By Call</option>
                                  <option value="By Mail" <?php echo $t=isset($BindData['mode']) && $BindData['mode']=='By Mail' ? 'selected=selected' :''; ?>>By Mail</option>
                                  <option value="By WhatsApp" <?php echo $t=isset($BindData['mode']) && $BindData['mode']=='By WhatsApp' ? 'selected=selected' :''; ?>>By WhatsApp</option>
                                  <option value="Personal Meeting" <?php echo $t=isset($BindData['mode']) && $BindData['mode']=='Personal Meeting' ? 'selected=selected' :''; ?>>Personal Meeting</option>
                                  <option value="Video Conference" <?php echo $t=isset($BindData['mode']) && $BindData['mode']=='Video Conference' ? 'selected=selected' :''; ?>>Video Conference</option>
                                </select>
                               </div>
                               <div class="form-group col-md-3 col-xs-12">
                                         <label for="title">Next Follow Up Date</label>
                                         <input type="date" class="form-control input-sm" name="next_followup" id="datefield" placeholder="" value="<?php echo $nft=$BindData['next_followup'] ?? ''; ?>" required>
                               </div>
                               <div class="form-group  col-xs-12 col-md-3">
                                          <label for="status">Lead Status</label>
                                    <select name="lead_status" class="form-control input-sm" >
                                      <option value="ongoing" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='ongoing' ? 'selected=selected' :''; ?>>On Going</option>
                                      <option value="not reachable" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='not reachable' ? 'selected=selected' :''; ?>>Not Reachable</option>
                                      <option value="won" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='won' ? 'selected=selected' :''; ?>>Won</option>
                                      <option value="loss" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='loss' ? 'selected=selected' :''; ?>>Loss</option>
                                      <option value="completed" <?php echo $ls=isset($BindData['lead_status']) && $BindData['lead_status']=='completed' ? 'selected=selected' :''; ?>>Completed</option>
                                    </select>
                                   </div>
                                   <div class="form-group col-md-3 col-xs-12">
                                              <label for="status">Follow Up to</label>
                                              <select class="form-control select2 input-sm"  name="followup_to" required>
                                        <option value="">Please Select</option>
                                        <?php
                                        $where= array(
                                        "status" => 1,
                                        "client_id"=>$ptitle['client_id']
                                        );
                                        $ref=$obj->fetch_all_record("client_references",$where);
                                        foreach ($ref as $s) {
                                          // var_dump($s);
                                        ?>
                                        <option value="<?php echo $s['id']; ?>" <?php echo $st=isset($BindData['followup_to']) && $BindData['followup_to']==$s['id'] ? 'selected=selected' :''; ?>><?php echo $s['name']." ( ".$s['mobile1']." ) ";?></option>
                                        <?php
                                      }
                                        ?>
                                      </select>
                                            </div>
                                   <div class="form-group col-md-6 col-xs-12">
                                       <label for="title">Purposes</label>
                                       <textarea class="form-control input-sm" name="purpose" placeholder="Enter Purposes" required><?php echo $r=$BindData['purpose'] ?? ''; ?></textarea>
                                     </div>
                                     <div class="form-group col-md-6 col-xs-12">
                                         <label for="title">Description/ Conversation</label>
                                         <textarea class="form-control input-sm" name="description" placeholder="Enter Description/ Remarks given by Client" required><?php echo $dr=$BindData['description'] ?? ''; ?></textarea>
                                       </div>
              <div class="col-xs-12">
                <!-- <div class="form-group">
                    <label for="title">Description</label>
                    <textarea class="form-control input-sm" name="description" placeholder="Enter Description/ Remarks"><?php echo $r=$BindData['description'] ?? ''; ?></textarea>
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
                             <table id="example2" class="table table-hover table-striped">
                               <thead>
                                 <tr style="color:#fff;background: #aa4b6b;background: -webkit-linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);background: linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
                                    text-transform:uppercase;">
                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>id</th>
                                <th>Follow Up to</th>
                                <th>Mode</th>
                                <th>Lead Status</th>
                                <th>Next Follow up</th>
                                <th>Purpose</th>
                            <th>Conversation/Remarks</th>
                            <th>Follow Up By</th>
                            <th>last Update</th>

                            <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">
                                 <?php
                         $id=$_REQUEST['lid']??'';
                         $where= array(
                         "lead_id" => $id,
                         );
                         $myrow = $obj->fetch_all_record("follow_ups",$where);
                         if($myrow != null) {
                         foreach ($myrow as $row) {
                         // echo $row['id']...
                         ?>
          				<tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php
                   if($row['followup_to'] != "0") {
                     $where= array(
                     "id" => $row['followup_to'],
                     );
                     $st=$obj->select_record("client_references",$where);
                  echo  $client='<p class="text-success"> Name: '.$st['name'].'</p><p class="text-danger">Email: '.$st['email'].'</p><p class="text-info">Mobile No: '.$st['mobile1'].'</p>';

                   } else {
                     echo "No Reference Details";
                   }

                    ?></td>
                    <td><?php echo $row['mode']; ?></td>

                    <td><small class="label bg-green"><?php echo $row['lead_status'];?></small> </td>
                    <td><?php echo $row['next_followup']; ?></td>
<td><textarea class="form-control" disabled rows="4"><?php echo $row['purpose']; ?></textarea></td>
<td><textarea class="form-control" disabled rows="4"><?php echo $row['description']; ?></textarea></td>
          <td><?php
         if($row['followup_by'] != "0") {
           $where= array(
           "id" => $row['followup_by'],
           );
           $st=$obj->select_record("system_users",$where);
           // $client='<p class="text-success"> Name: '.$st['name'].'</p><p class="text-danger">Email: '.$st['email'].'</p><p class="text-info">Mobile No: '.$st['mobile1'].'</p>';
        echo $st['name'];
         } else {
           echo "No Details Available";
         }

          ?></td>
          <td><p class="text-danger">Created At: <b><?php $d=date_create($row['created_at']); echo $c_at=date_format($d,'d-M-Y');?></b></p><p class="text-success">Last Updated At:  <b><?php echo $u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y') : $c_at; ?></b></p> </td>

           <td> <a href="followups.php?id=<?php echo $row['id'];?>&lid=<?php echo $_REQUEST['lid']; ?>" style="cursor:pointer;" class="btn btn-primary btn-xs" ><i class="fa fa-edit" ></i></a>&nbsp;&nbsp;

            <!-- <a  href="javascript:void(0);" onclick="javascript:deleteThisRecord(<?php echo $row['id']; ?>,'client_references');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a> -->


          </td>
                          </tr>
          				<?php
          				}
                }
          				?>
                          </tbody>
                               <tfoot>
                                 <tr style="color:#fff;background: #aa4b6b;background: -webkit-linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);background: linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
                                  text-transform:uppercase;">
                                  <th>id</th>
                                  <th>Follow Up to</th>
                                  <th>Mode</th>
                                  <th>Lead Status</th>
                                  <th>Next Follow up</th>
                                  <th>Purpose</th>
                              <th>Conversation/Remarks</th>
                              <th>Follow Up By</th>
                              <th>last Update</th>

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
  	self.location="followups.php?m=active&lid=<?php echo $_REQUEST['lid']; ?>";
}
$(function () {
  setDate();
$('#example2').DataTable({
   "order": [[ 0, "desc" ]],
  "columnDefs": [
           {
               "targets": [ 0 ],
               "visible": false,
               "searchable": false
           }
       ]
});
});
  </script>
