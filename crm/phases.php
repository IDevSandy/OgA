<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
  $ptitle=mysqli_fetch_array(mysqli_query($obj->con,"select * from projects where id=".$_REQUEST['pid']));
  $c=mysqli_fetch_array(mysqli_query($obj->con,"select * from clients where id=".$ptitle['client_id']));

        $title='';
        $btn='';
        if(isset($_REQUEST['id'])){

          $title="Update Phase";
          $btn="Update";
          }
          else
          {
          $title="New Phase";
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
        <!-- Pace page --> Working Phases for <a href="projects.php?id=<?php echo $_REQUEST['pid']; ?>"><?php echo $ptitle['title'];?></a>
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="projects.php"><i class="fa fa-tags"></i>Projects</a></li>
        <li class="active">Project Phases</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Details for <a href="projects.php?id=<?php echo $_REQUEST['pid']; ?>"><?php echo $ptitle['title'];?></a></h3>
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
                  <td>Project Code</td>
                  <td><?php echo $ptitle['project_code'];?></td>
                  <td>Name</td>
                  <td>
                  <?php
                  echo $c['owner_name'];
                   ?>
                  </td>


                </tr>
                <tr>
                  <td>Project For</td>
                  <td>
                  <?php
                  $pfor=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from services where id=".$ptitle['service_id']));
                  // $st=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from standards where id=".$pfor['standard_id']));

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
<tr>
  <td>Start Date</td>
  <td>
    <?php echo $ptitle['start_date']; ?>
  </td>
  <td>End Date</td>
  <td>
    <?php echo $ptitle['end_date']; ?>
  </td>
</tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="clearfix">&nbsp;</div>
          <?php
                     $id=$_REQUEST['id']??'';
                     $where= array(
                     "id" => $id,
                     );
                     $BindData=$obj->select_record("phases",$where);
                     // $mob=isset($BindData['mobile1']) && $BindData['mobile1'] != ''? explode('-',$BindData['mobile1']) : '';
                     // $mob2=isset($BindData['mobile2']) && $BindData['mobile2'] != ''? explode('-',$BindData['mobile2']) : '';

                     ?>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom1 tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"> <i class="fa fa-plus"></i> <?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab"> <i class="fa fa-table"></i> List Phases</a></li>
              </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="phases">
                  <input type="hidden" name="id" value="<?php echo $id=$_REQUEST['id'] ?? ''; ?>">
                  <input type="hidden" name="pid" value="<?php echo $pid=$ptitle['id'] ?? ''; ?>">
                <div class="row">
                  <div class="form-group col-md-3 col-xs-12">
                            <label for="title">Title</label>
                            <input type="text" class="form-control input-sm" name="title"  maxlength="400" placeholder="Enter title" value="<?php echo $t=$BindData['title'] ?? ''; ?>" required>
                  </div>

                  <div class="form-group col-md-3 col-xs-12">
                            <label for="title">Start Date</label>
                            <input type="date" class="form-control input-sm" name="start_date"  maxlength="200" placeholder="Enter Start Date" value="<?php echo $t=$BindData['start_date'] ?? ''; ?>" required>
                          </div>
                          <div class="form-group col-md-3 col-xs-12">
                                    <label for="title">End Date</label>
                                    <input type="date" class="form-control input-sm" name="end_date" id="datefield1" maxlength="200" placeholder="Enter End Date" value="<?php echo $t=$BindData['end_date'] ?? ''; ?>" >
                                  </div>

                                  <div class="form-group  col-xs-12 col-md-3">
                                             <label for="status">Project Status</label>
                                       <select name="project_status" class="form-control input-sm" >
                                         <option value="ongoing" <?php echo $ls=isset($BindData['project_status']) && $BindData['project_status']=='ongoing' ? 'selected=selected' :''; ?>>On Going</option>
                                         <option value="submitted" <?php echo $ls=isset($BindData['project_status']) && $BindData['project_status']=='submitted' ? 'selected=selected' :''; ?>>Submitted</option>
                                         <option value="queried" <?php echo $ls=isset($BindData['project_status']) && $BindData['project_status']=='queried' ? 'selected=selected' :''; ?>>Queried</option>
                                         <option value="approved" <?php echo $ls=isset($BindData['project_status']) && $BindData['project_status']=='approved' ? 'selected=selected' :''; ?>>Approved</option>
                                         <option value="rejected" <?php echo $ls=isset($BindData['project_status']) && $BindData['project_status']=='rejected' ? 'selected=selected' :''; ?>>Rejected</option>
                                       </select>
                                      </div>
                                     <div class="form-group  col-xs-12">
                                         <label for="title">Description/ Remarks</label>
                                         <textarea class="form-control input-sm" name="description" placeholder="Enter Description/ Remarks for Project" required><?php echo $r=$BindData['description'] ?? ''; ?></textarea>
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
                                <th>title</th>
                                <th>Remarks</th>
                                <th>Schedules</th>
                                <th>Project Status</th>
                            <th>last Update</th>

                            <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">
                                 <?php
                         $id=$_REQUEST['pid']??'';
                         $where= array(
                         "project_id" => $id,
                         );
                         $myrow = $obj->fetch_all_record("phases",$where);
                         if($myrow != null) {
                         foreach ($myrow as $row) {
                         // echo $row['id']...
                         ?>
          				<tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
<td><textarea class="form-control" disabled style="width:100%" rows="4"><?php echo $row['description']; ?></textarea></td>

<td><p class="text-danger">Start Date: <b><?php $d=date_create($row['start_date']); echo $c_at=date_format($d,'d-M-Y');?></b></p><p class="text-success">End Date:  <b><?php echo $u_at= $row['end_date'] != null ? date_format(date_create($row['end_date']),'d-M-Y') : 'on working'; ?></b></p> </td>
<td><small class="label bg-rainbow1"><?php echo $row['project_status'];?></small> </td>

          <td><p class="text-danger">Created At: <b><?php $d=date_create($row['created_at']); echo $c_at=date_format($d,'d-M-Y');?></b></p><p class="text-success">Last Updated At:  <b><?php echo $u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y') : $c_at; ?></b></p> </td>

           <td> <a href="phases.php?id=<?php echo $row['id'];?>&pid=<?php echo $_REQUEST['pid']; ?>" style="cursor:pointer;" class="btn btn-primary btn-xs" ><i class="fa fa-edit" ></i></a>&nbsp;&nbsp;

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
                                  <th>title</th>
                                  <th>Remarks</th>
                                  <th>Schedules</th>
                                  <th>Project Status</th>
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
  	self.location="phases.php?m=active&pid=<?php echo $_REQUEST['pid']; ?>";
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
