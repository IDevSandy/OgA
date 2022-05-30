<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
  $BindData=array();
  $title="";
  $btn="";
  $id="";
  $BindData['role_id']='';
  $BindData['name']='';
  $BindData['email']='';
  $BindData['password']='';
  $BindData['mobile_no']='';
  $BindData['status']='';
  if(isset($_REQUEST['id'])){
  $BindData=mysqli_fetch_array(mysqli_query($con,"select * from system_users where id=".$_REQUEST['id']));
  $title="Edit System User";
  $btn="Update";
  $id=$_REQUEST['id'];
  }
  else
  {
  $title="Add New System User";
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
        <!-- Pace page -->System Users Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">System Users Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <?php
        if(isset($_REQUEST['q']) && $_REQUEST['q'] == "success" ) {
          echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> Yippe!</h4>
         '.$_REQUEST['msg'].'
        </div>';
        } else if(isset($_REQUEST['q']) && $_REQUEST['q'] == "error"){
          echo '<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Error!</h4>
          Something went Wrong. Try Again Later.
        </div>';
        } else {
          echo '<div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-info"></i>Welcome!</h4>
          Welcome to System Users Management. Here you can add/update the System users.
        </div>';
        }
        ?>

        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"><?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab">Manage System Users</a></li>
              <!-- <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Dropdown <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo $act1;?>" id="tab_1">
                <form role="form" action="engine-controller.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="system_users">
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                <div class="row">
        <div class="col-md-6 col-xs-12">
          <div class="form-group">
                   <label for="Roles">Roles</label>
                   <select name="role_id" class="form-control select2 input-sm">
                       <option value="">Select</option>
                     <?php
                      $p=mysqli_query($con,"select name,id from roles where is_deleted=0 AND status=1");
                      while($prole=mysqli_fetch_assoc($p)){
                      ?>
                      <option <?php if($BindData['role_id'] == $prole['id']) { echo 'selected=selected'; }?> value="<?php echo $prole['id']?>"><?php echo $prole['name'];?></option>
                      <?php
                      }
                     ?>
                  </select>
                 </div>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control input-sm" name="name" placeholder="Enter Name" maxlength="200" required value="<?php echo $BindData['name'];?>">
                  </div>


                         <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control input-sm">
                           <option <?php if($BindData['status'] == "1") { echo 'selected=selected'; }?> value="1">Active</option>
                           <option <?php if($BindData['status'] == "0") { echo 'selected=selected'; }?> value="0">Inactive</option>
                           </select>
                                  </div>

                       </div> <!-- End col 1-->
                       <div class="col-md-6 col-xs-12">

  				<div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control input-sm" name="email" placeholder="Enter Email" maxlength="200" value="<?php echo $BindData['email'];?>">
                  </div>


  				<div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control input-sm"  placeholder="Enter password" maxlength="200" value="<?php echo $BindData['password'];?>">
                  </div>
                  <div class="form-group">
                            <label for="mobile_no">Mobile Number</label>
                            <input type="tel" name="mobile_no" class="form-control input-sm"  placeholder="Enter Mobile Number" maxlength="10" value="<?php echo $BindData['mobile_no'];?>">
                          </div>

              </div> <!-- End Col-2 -->

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
                             <table id="example1" class="table table-hover table-striped">
                               <thead>
                                 <tr style="color:#fff;background: #667db6;  /* fallback for old browsers */
                                 background: -webkit-linear-gradient(to top, #667db6, #0082c8, #0082c8, #667db6);  /* Chrome 10-25, Safari 5.1-6 */
                                 background: linear-gradient(to top, #667db6, #0082c8, #0082c8, #667db6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                                 text-transform:uppercase;">                              <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                              <th>Roles</th>
                          <th>User Details</th>
                         <th>Security</th>
                           <th>Registered at</th>
                           <th>Status</th>
                            <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">
                          <?php
          				$data=mysqli_query($con,"select * from system_users ORDER BY id DESC");
          				while($d1=mysqli_fetch_array($data))
          				{
          				?>
          				<tr>
          				 <!-- <td><input type="checkbox" class="arc_id" value="<?php echo $d1 ['id'];?>"> -->
                   <td><?php
                   if($d1['role_id'] !='' && $d1['role_id'] != "0") {
                     $parent=mysqli_fetch_array(mysqli_query($con,"select name from roles where id='".$d1['role_id']."'"));
                     echo $parent['name'];
                   } else {
                     echo "No Role Selected Yet";
                   }
                   ?>
                   </td>
                            <td><?php echo $d1['name'];?><p class="text-danger"> <?php echo $d1['email'];?></p><p class="text-success"> <?php echo $d1['mobile_no'];?></p> </td>
                            <td><p class="text-danger">Last Login: <b><?php $d=date_create($d1['last_login']); echo date_format($d,'d-M-Y');?></b></p><p class="text-success">Login IP:  <b><?php echo $d1['login_ip'];?></b></p> Login Source: <b> <?php echo $d1['login_source']; ?> </b> </td>

          <td><small class="label bg-red"><?php $d=date_create($d1['created_at']); echo date_format($d,'d-M-Y');?></small></td>
                     <td>
                       <select class="form-control input-sm" onchange="javascript:updateStatus(this.value,<?php echo $d1['id']; ?>,'system_users')" <?php echo $val=$d1['is_deleted']!="1"?'':'disabled'; ?>>
             <option <?php if($d1['status'] == "1") { echo 'selected=selected'; }?> value="1">Active</option>
             <option <?php if($d1['status'] == "0") { echo 'selected=selected'; }?> value="0">Inactive</option>
             </select>

           </td>
           <td> <a href="system_users.php?id=<?php echo $d1['id'];?>" style="cursor:pointer;" class="btn btn-primary btn-xs" <?php echo $val=$d1['is_deleted']!="1"?'':'disabled'; ?>><i class="fa fa-edit" ></i></a>&nbsp;&nbsp;
          <?php
          if($d1['is_deleted']!="1") {
            ?>
            <a  href="javascript:void(0);" onclick="javascript:deleteThisRow(<?php echo $d1['id']; ?>,'system_users');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>

            <?php
          } else {

            ?>
            <a  href="javascript:void(0);" onclick="javascript:restore(<?php echo $d1['id']; ?>,'system_users');" class="btn btn-info btn-xs"><span ><i class="fa fa-undo"></i></span></a>
            <?php
          }
           ?>
          </td>
                          </tr>
          				<?php
          				}
          				?>
                          </tbody>
                               <tfoot>
                                 <tr style="color:#fff;background: #667db6;  /* fallback for old browsers */
                                 background: -webkit-linear-gradient(to top, #667db6, #0082c8, #0082c8, #667db6);  /* Chrome 10-25, Safari 5.1-6 */
                                 background: linear-gradient(to top, #667db6, #0082c8, #0082c8, #667db6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                                 text-transform:uppercase;">
                                 <th>Roles</th>
                             <th>User Details</th>
                            <th>Security</th>
                              <th>Registered at</th>
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
  	self.location="system_users.php?m=active";
}
  </script>
