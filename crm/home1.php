<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/leftsidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-warning1">
            <div class="inner">
              <h3><?php
                $where= array(
                "status" => 1
                );

        $BindData=$obj->getCount("clients",$where);

            echo  $BindData['records'];
            ?>
          </h3>

              <p>Total Active Clients</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="clients.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-success1">
            <div class="inner">
              <h3>
                <?php
                  $where= array(
                  "status" => 1,
                  );

                $BindData=$obj->getCount("laboratories",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total Laboratories</p>
            </div>
            <div class="icon">
              <i class="fa fa-trademark"></i>
            </div>
            <a href="laboratories.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-purple1">
            <div class="inner">
              <h3>
                <?php
                  $where= array(
                  "status" => 1
                  );

                $BindData=$obj->getCount("authorities",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total Authorities</p>
            </div>
            <div class="icon">
              <i class="fa fa-bank"></i>
            </div>
            <a href="authorities.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-marine1">
            <div class="inner">
              <h3>
                <?php
                  $where= array(
                  "status" => 1
                  );

                $BindData=$obj->getCount("standards",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total Standards</p>
            </div>
            <div class="icon">
              <i class="fa fa-copyright"></i>
            </div>
            <a href="standards.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-rainbow1">
            <div class="inner">
              <h3>
                <?php
                  $where= array(
                  "status" => 1
                  );

                $BindData=$obj->getCount("services",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total Services</p>
            </div>
            <div class="icon">
              <i class="fa fa-send"></i>
            </div>
            <a href="services.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-green1">
            <div class="inner">
              <h3>
                <?php
                  $where= array(
                  "status" => 1
                  );

                $BindData=$obj->getCount("leads",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total Active Leads</p>
            </div>
            <div class="icon">
              <i class="fa fa-clipboard"></i>
            </div>
            <a href="leads.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-green1">
            <div class="inner">
              <h3>
                <?php
                  $where= array(
                  "status" => 1,
                  "lead_status" => 'new'
                  );

                $BindData=$obj->getCount("leads",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total New Leads</p>
            </div>
            <div class="icon">
              <i class="fa fa-plus"></i>
            </div>
            <a href="leads.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-yellow1">
            <div class="inner">
              <h3>
                <?php
                $where= array(
                "status" => 1,
                "lead_status" => 'on going'
                );

                $BindData=$obj->getCount("leads",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total On Going Leads</p>
            </div>
            <div class="icon">
              <i class="fa fa-clock-o"></i>
            </div>
            <a href="leads.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-green1">
            <div class="inner">
              <h3>
                <?php
                $where= array(
                "status" => 1,
                "lead_status" => 'won'
                );


                $BindData=$obj->getCount("leads",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total Won Leads</p>
            </div>
            <div class="icon">
              <i class="fa fa-thumbs-up"></i>
            </div>
            <a href="leads.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-success1">
            <div class="inner">
              <h3>
                <?php
                $where= array(
                "status" => 1,
                "lead_status" => 'loss'
                );

                $BindData=$obj->getCount("leads",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total Lost Leads</p>
            </div>
            <div class="icon">
              <i class="fa fa-thumbs-down"></i>
            </div>
            <a href="leads.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-red1">
            <div class="inner">
              <h3>
                <?php
                $where= array(
                "status" => 1,
                "lead_status" => 'not reachable'
                );

                $BindData=$obj->getCount("leads",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total Not Reachable Leads</p>
            </div>
            <div class="icon">
              <i class="fa fa-phone"></i>
            </div>
            <a href="leads.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-rainbow1">
            <div class="inner">
              <h3>
                <?php
                $where= array(
                "status" => 1,
                "lead_status" => 'completed'
                );

                $BindData=$obj->getCount("leads",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total Completed Leads</p>
            </div>
            <div class="icon">
              <i class="fa fa-check-circle-o"></i>
            </div>
            <a href="leads.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col ->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-success-alt1">
            <div class="inner">
              <h3>
                <?php
                  $where= array(
                  "status" => 1
                  );

                $BindData=$obj->getCount("projects",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total Active Projects</p>
            </div>
            <div class="icon">
              <i class="fa fa-tags"></i>
            </div>
            <a href="projects.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-blue1">
            <div class="inner">
              <h3>
                <?php
                  $where= array(
                  "status" => 1,
                  "project_status" => 'new'
                  );

                $BindData=$obj->getCount("projects",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total New Projects</p>
            </div>
            <div class="icon">
              <i class="fa fa-plus"></i>
            </div>
            <a href="projects.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-warning1">
            <div class="inner">
              <h3>
                <?php
                  $where= array(
                  "status" => 1,
                  "project_status" => 'ongoing'
                  );

                $BindData=$obj->getCount("projects",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total Ongoing Projects</p>
            </div>
            <div class="icon">
              <i class="fa fa-hourglass-end"></i>
            </div>
            <a href="projects.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple1">
          <div class="inner">
            <h3>
              <?php
                $where= array(
                "status" => 1,
                "project_status" => 'submitted'
                );

              $BindData=$obj->getCount("projects",$where);

              echo  $BindData['records'];
              ?>
            </h3>

            <p>Total Submitted Projects</p>
          </div>
          <div class="icon">
            <i class="fa fa-check"></i>
          </div>
          <a href="projects.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-warning1">
        <div class="inner">
          <h3>
            <?php
              $where= array(
              "status" => 1,
              "project_status" => 'queried'
              );

            $BindData=$obj->getCount("projects",$where);

            echo  $BindData['records'];
            ?>
          </h3>

          <p>Total Queried Projects</p>
        </div>
        <div class="icon">
          <i class="fa fa-exclamation-circle"></i>
        </div>
        <a href="projects.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-rainbow1">
            <div class="inner">
              <h3>
                <?php
                  $where= array(
                  "status" => 1,
                  "project_status" => 'approved'
                  );

                $BindData=$obj->getCount("projects",$where);

                echo  $BindData['records'];
                ?>
              </h3>

              <p>Total Approved Projects</p>
            </div>
            <div class="icon">
              <i class="fa fa-smile-o"></i>
            </div>
            <a href="projects.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-success1">
          <div class="inner">
            <h3>
              <?php
                $where= array(
                "status" => 1,
                "project_status" => 'rejected'
                );

              $BindData=$obj->getCount("projects",$where);

              echo  $BindData['records'];
              ?>
            </h3>

            <p>Total Rejected Projects</p>
          </div>
          <div class="icon">
            <i class="fa  fa-close"></i>
          </div>
          <a href="projects.php?m=active" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

        <!-- ./col ->
            <div class="col-md-3 col-sm-6 col-xs-12">

                      <div class="info-box">
                        <span class="info-box-icon bg-aqua1"><i class="fa fa-book"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text"></span>
                          <span class="info-box-number"></span><br>
                          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <!-- /.info-box-content ->
                      </div>
                      <!-- /.info-box ->
                    </div>-->

      </div>
      <!-- /.row -->
	  <div class="row">
	  
	<div class="col-md-12 col-xs-12">
    <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Upcoming Followups</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
						<th>Next Followup Date</th>
                        <th>Lead Id</th>
                        <th>Client </th>
                        <th>Lead Generated</th>
                        <th>Total Followup</th>
                        <th>Last Followup</th>
                        <th>Purpose</th>
						<th>Last Conversation</th>

                      </tr>
                      </thead>
                      <tbody>
                        <?php
						$q=mysqli_query($obj->con,"SELECT *, (DATEDIFF(next_followup,CURDATE())) AS diff FROM follow_ups WHERE DATEDIFF(next_followup,CURDATE()) between 0 and 7 ORDER BY next_followup DESC");
               while($row=mysqli_fetch_array($q)) {
                // echo $row['id']...
                
                $lead=mysqli_fetch_array(mysqli_query($obj->con,"select id,lead_code,generated_by,date from leads where id=".$row['lead_id']));
				$r_by=mysqli_fetch_array(mysqli_query($obj->con,"select name from system_users where id=".$lead['generated_by']));
$fcount=mysqli_fetch_assoc(mysqli_query($obj->con,"select count(*) as allcount from follow_ups where lead_id='".$row['lead_id']."'"));
$fdate=date_format(date_create($row['last_followup']),'d-M-Y');
$f_by=mysqli_fetch_array(mysqli_query($obj->con,"select name from system_users where id=".$row['followup_by']));
                ?>
         <tr>
		 <td><?php $d=date_create($row['next_followup']); echo $f_at=date_format($d,'d-M-Y');?> </td>
           <td><a href="leads.php?id=<?php echo $lead['id']; ?>"><?php echo $lead['lead_code'];?></a></td>
           <td><?php
                   if($row['followup_to'] != "0") {
                     $where= array(
                     "id" => $row['followup_to'],
                     );
                     $st=$obj->select_record("client_references",$where);
                  echo  $client='<p class="text-success"> <i class="fa fa-user"></i> '.$st['name'].'</p><p class="text-danger"><i class="fa fa-envelope"></i> '.$st['email'].'</p><p class="text-info"><i class="fa fa-phone"></i> '.$st['mobile1'].'</p>';

                   } else {
                     echo "No Reference Details";
                   }

                    ?></td>
					
           <td><p class="text-danger"><i class="fa fa-calendar"></i> <b><?php $d=date_create($lead['date']); echo $g_at=date_format($d,'d-M-Y');?></b></p><p class="text-success"><i class="fa fa-user"></i> <b><?php echo $r_by['name']; ?></b></p></td>
           <td><?php echo $fcount['allcount']; ?></td>
           <td><p class="text-danger"><i class="fa fa-calendar"></i> <b><?php echo $fdate; ?></b></p><p class="text-success"><i class="fa fa-user"></i> <b><?php echo $f_by['name']; ?></b></p></td>
		   <td><textarea class="form-control" disabled style="width:100%" rows="4"><?php echo $row['purpose']; ?></textarea></td>
		   <td><textarea class="form-control" disabled style="width:100%" rows="4"><?php echo $row['description']; ?></textarea></td>
           
			</tr>
            <?php
              }
            
            ?>
                    </tbody>
                  </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                  <!-- <a href="javascript:void(0)" class="btn btn-sm btn-primary btn-flat pull-left">Add New Payments</a>
                  <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Payments</a> -->
                </div>
                <!-- /.box-footer -->
              </div>
  </div> <!---col 1-->
	  </div>
	  <!--! row -->
      

<!-- Related Tables  -->
<div class="row">
  <div class="col-md-12 col-xs-12">
    <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Clients</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>Client ID</th>
                        <th>Company</th>
                        <th>contact details</th>
                        <th>owner name</th>
                        <th>industry</th>
                        <th>Leads</th>
                        <th>references</th>
                        <th>attachments</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                $where= array(
                "status" => 1,
                );
                $myrow = $obj->fetch_all_record_by_limit("clients",$where);
                if($myrow != null) {
                foreach ($myrow as $row) {
                  $details='<p class="text-danger"><i class="fa fa-phone"></i> '.$row['mobile'].'</p><p class="text-primary"><i class="fa fa-envelope"></i> '.$row['email'].'</p><p class="text-success"> <i class="fa fa-globe"></i> '.$row['website'].'</p>';
                  $followups='<a href="clientleads.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';
                  $reference='<a href="clientreferences.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="clientreferences.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';
                $attachment='<a href="clientattachments.php?cid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="clientattachments.php?cid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';

                ?>
                      <tr>
                        <td><a href="clients.php?id=<?php echo $row['id']; ?>"><?php echo $row['client_code'];?></a></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $details; ?></td>
                        <td><?php echo $row['owner_name']; ?></td>
                        <td><?php echo $row['industry'];?></td>
                        <td><?php echo $followups; ?></td>
                        <td><?php echo $reference; ?></td>
                        <td><?php echo $attachment; ?></td>

                      </tr>
                    <?php
                      }
                    }
                    ?>
                    </tbody>
                  </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="clients.php" class="btn btn-sm btn-primary btn-flat pull-left">Add New Client</a>
                  <a href="clients.php?m=active" class="btn btn-sm btn-default btn-flat pull-right">View All Clients</a>
                </div>
                <!-- /.box-footer -->
              </div>
  </div>  <!-- /.col 3 -->

  <div class="col-md-12 col-xs-12">
    <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Projects</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>project id</th>
                        <th>title</th>
                        <th>client</th>
                        <th>start date</th>
                        <th>end date</th>
                        <th>total cost</th>
                        <th>total duration</th>
                          <th>Project status</th>

                      </tr>
                      </thead>
                      <tbody>
                        <?php
                $where= array(
                "status" => 1,
                );
                $myrow = $obj->fetch_all_record_by_limit("projects",$where);
                if($myrow != null) {
                foreach ($myrow as $row) {
                  $c=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from clients where id=".$row['client_id']));
                  $pfor=mysqli_fetch_assoc(mysqli_query($obj->con,"select * from services where id=".$row['service_id']));
                  $client='<p class="text-success"><i class="fa fa-suitcase"></i> '.$c['title'].'</p><p class="text-danger"><i class="fa fa-envelope"></i> '.$c['email'].'</p><p class="text-info"><i class="fa fa-phone"></i> '.$c['mobile'].'</p>';
                  $attachment='<a href="projectattachments.php?pid='.$row['id'].'" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="projectattachments.php?pid='.$row['id'].'&m=active" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';
                  $payments=mysqli_fetch_array(mysqli_query($obj->con,"select SUM(amount) AS 'PaidAmount' from payment_schedules where project_id=".$row['id']));
                  $restAmount=(float)$row['total_cost'] - (float)$payments['PaidAmount'];
                  $FinalCost='<p class="text-danger">Total Cost: <b><i class="fa fa-inr"></i> '.$row['total_cost'].'</b></p><p class="text-success">Rest Amount: <b><i class="fa fa-inr"></i> '.$restAmount.'</b></p>';

                ?>
                      <tr>
                        <td><a href="projects.php?id=<?php echo $row['id']; ?>"><?php echo $row['project_code'];?></a></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $client; ?></td>
                        <td><?php echo date_format(date_create($row['start_date']),'d-M-Y'); ?></td>
                        <td><?php echo date_format(date_create($row['end_date']),'d-M-Y');?></td>
                        <td><?php echo $FinalCost; ?></td>
                        <td><?php echo $row['total_duration'].' days'; ?></td>
                        <td><?php echo '<small class="label bg-purple1">'.$row['project_status'].'</small>'; ?></td>

                      </tr>
                    <?php
                      }
                    }
                    ?>
                    </tbody>
                  </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="projects.php" class="btn btn-sm btn-primary btn-flat pull-left">Add New Projects</a>
                  <a href="projects.php?m=active" class="btn btn-sm btn-default btn-flat pull-right">View All Projects</a>
                </div>
                <!-- /.box-footer -->
              </div>
  </div>  <!-- /.col 3-->




  <div class="col-md-12 col-xs-12">
    <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Payments</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>Project Id</th>
                        <th>mode</th>
                        <th>Receiving</th>
                        <th>amount</th>
                        <th>Remarks</th>
                        <th>Schedules</th>

                      </tr>
                      </thead>
                      <tbody>
                        <?php
                          $q=mysqli_query($obj->con,"select * from payment_schedules order by id desc limit 10");
						  
						 while($row=mysqli_fetch_array($q)) {
                // echo $row['id']...
                $r_by=mysqli_fetch_array(mysqli_query($obj->con,"select name from system_users where id=".$row['received_by']));
                $project=mysqli_fetch_array(mysqli_query($obj->con,"select id,project_code from projects where id=".$row['project_id']));

                ?>
         <tr>
           <td><a href="projects.php?id=<?php echo $project['id']; ?>"><?php echo $project['project_code'];?></a></td>
           <td><?php echo $row['mode']; ?></td>
           <td><p class="text-danger">Credited to: <b><?php echo $row['credited_to']; ?></b></p><p class="text-success">Received By: <b><?php echo $r_by['name']; ?></b></p></td>
           <td><p class="text-danger">Transaction Id: <b><?php echo $row['transaction_id']; ?></b></p><p class="text-success">Amount: <b><i class="fa fa-inr"></i> <?php echo $row['amount']; ?></b></p></td>
              <td><textarea class="form-control" disabled style="width:100%" rows="4"><?php echo $row['description']; ?></textarea></td>
              <td><p class="text-danger">Last Payment Date: <b><?php $d=date_create($row['payment_date']); echo $c_at=date_format($d,'d-M-Y');?></b></p><p class="text-success">Next Payment Date:  <b><?php echo $u_at= $row['next_payment_date'] != null ? date_format(date_create($row['next_payment_date']),'d-M-Y') : ''; ?></b></p> </td>
            </tr>
            <?php
              }
           
            ?>
                    </tbody>
                  </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                  <!-- <a href="javascript:void(0)" class="btn btn-sm btn-primary btn-flat pull-left">Add New Payments</a>
                  <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Payments</a> -->
                </div>
                <!-- /.box-footer -->
              </div>
  </div> <!---col 5-->



</div>


              </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php'); ?>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
  <!-- Morris.js charts ->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="plugins/morris/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/knob/jquery.knob.js"></script>


  <script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        // $('#example').DataTable({
        //     dom: 'Bfrtip',
        //     buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
        // });

        // The Calender
        var date = new Date();
var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

$('#calendar').datepicker({
format: "mm/dd/yyyy",
todayHighlight: true,
startDate: today,
endDate: end,
autoclose: true
});
$('#calendar').datepicker('setDate', today);
        // $('#calendar')
        // .datepicker();

         // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $('#salesChart')
        .get(0)
        .getContext('2d');
        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas);
        var salesChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July']
        , datasets: [{
            label: 'Electronics'
            , fillColor: 'rgb(210, 214, 222)'
            , strokeColor: 'rgb(210, 214, 222)'
            , pointColor: 'rgb(210, 214, 222)'
            , pointStrokeColor: '#c1c7d1'
            , pointHighlightFill: '#fff'
            , pointHighlightStroke: 'rgb(220,220,220)'
            , data: [65, 59, 80, 81, 56, 55, 40]
        }, {
            label: 'Digital Goods'
            , fillColor: 'rgba(60,141,188,0.9)'
            , strokeColor: 'rgba(60,141,188,0.8)'
            , pointColor: '#3b8bba'
            , pointStrokeColor: 'rgba(60,141,188,1)'
            , pointHighlightFill: '#fff'
            , pointHighlightStroke: 'rgba(60,141,188,1)'
            , data: [28, 48, 40, 19, 86, 27, 90]
        }]
        };
        var salesChartOptions = {
            // Boolean - If we should show the scale at all
            showScale: true
        , // Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false
        , // String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)'
        , // Number - Width of the grid lines
            scaleGridLineWidth: 1
        , // Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true
        , // Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true
        , // Boolean - Whether the line is curved between points
            bezierCurve: true
        , // Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3
        , // Boolean - Whether to show a dot for each point
            pointDot: false
        , // Number - Radius of each point dot in pixels
            pointDotRadius: 4
        , // Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1
        , // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20
        , // Boolean - Whether to show a stroke for datasets
            datasetStroke: true
        , // Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2
        , // Boolean - Whether to fill the dataset with a color
            datasetFill: true
         , // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true
        , // Boolean - whether to make the chart responsive to window resizing
            responsive: true
        };
        // Create the line chart
        salesChart.Line(salesChartData, salesChartOptions);
        // ---------------------------
        // - END MONTHLY SALES CHART -
        // ---------------------------

    });

</script>
