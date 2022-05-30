<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>
  <?php
  $BindData=array();
  $title="";
  $btn="";
  $id="";
  $BindData['name']='';
  $BindData['url']='';
  $BindData['status']='';
  $BindData['icons']='';
  if(isset($_REQUEST['id'])){
  $BindData=mysqli_fetch_array(mysqli_query($con,"select * from system_modules where id=".$_REQUEST['id']));
  $title="Edit Module";
  $btn="Update";
  $id=$_REQUEST['id'];
  }
  else
  {
  $title="Add New Module";
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
        <!-- Pace page -->Modules Management
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Modules Management</li>
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
          Welcome to Modules Management. Here you can add/update the system modules.
        </div>';
        }
        ?>

        <!-- Custom Tabs -->
        <div class="nav-tabs-custom tab">
            <ul class="nav nav-tabs">
              <li class="<?php echo $act1;?>"><a href="#tab_1" data-toggle="tab" onclick="javascript:btnHide();"><?php echo $title; ?> </a></li>
              <li class="<?php echo $act2;?>"><a href="#tab_2" data-toggle="tab">Manage Modules</a></li>
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
                  <input type="hidden" name="action" value="modules">
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                  <div class="form-group">
                    <label for="url">Module Name</label>
                    <input type="text" class="form-control input-sm" name="name" placeholder="Module Name" required value="<?php echo $BindData['name'];?>">
                  </div>

                  <div class="form-group">
                     <label for="icon">Icons</label>
                     <select name="icons" class="form-control input-sm fa" required>
                    <option  value="">Select Icons</option>
                    <option <?php if($BindData['icons'] == "fa-align-left") { echo 'selected=selected'; }?> value="fa-align-left">&#xf036; fa-align-left</option>
                         <option  <?php if($BindData['icons'] == "fa-align-right") { echo 'selected=selected'; }?> value="fa-align-right">&#xf038; fa-align-right</option>
                         <option <?php if($BindData['icons'] == "fa-amazon") { echo 'selected=selected'; }?> value="fa-amazon">&#xf270; fa-amazon</option>
                         <option <?php if($BindData['icons'] == "fa-ambulance") { echo 'selected=selected'; }?> value="fa-ambulance">&#xf0f9; fa-ambulance</option>
                         <option <?php if($BindData['icons'] == "fa-anchor") { echo 'selected=selected'; }?> value="fa-anchor">&#xf13d; fa-anchor</option>
                         <option <?php if($BindData['icons'] == "fa-android") { echo 'selected=selected'; }?> value="fa-android">&#xf17b; fa-android</option>
                         <option <?php if($BindData['icons'] == "fa-angellist") { echo 'selected=selected'; }?> value="fa-angellist">&#xf209; fa-angellist</option>
                         <option <?php if($BindData['icons'] == "fa-angle-double-down") { echo 'selected=selected'; }?> value="fa-angle-double-down">&#xf103; fa-angle-double-down</option>
                         <option <?php if($BindData['icons'] == "fa-angle-double-left") { echo 'selected=selected'; }?> value="fa-angle-double-left">&#xf100; fa-angle-double-left</option>
                         <option <?php if($BindData['icons'] == "fa-angle-double-right") { echo 'selected=selected'; }?> value="fa-angle-double-right">&#xf101; fa-angle-double-right</option>
                         <option <?php if($BindData['icons'] == "fa-angle-double-up") { echo 'selected=selected'; }?>value="fa-angle-double-up">&#xf102; fa-angle-double-up</option>
                         <option <?php if($BindData['icons'] == "fa-angle-left") { echo 'selected=selected'; }?> value="fa-angle-left">&#xf104; fa-angle-left</option>
                         <option <?php if($BindData['icons'] == "fa-angle-right") { echo 'selected=selected'; }?> value="fa-angle-right">&#xf105; fa-angle-right</option>
                         <option <?php if($BindData['icons'] == "fa-angle-up") { echo 'selected=selected'; }?> value="fa-angle-up">&#xf106; fa-angle-up</option>
                         <option <?php if($BindData['icons'] == "fa-apple") { echo 'selected=selected'; }?> value="fa-apple">&#xf179; fa-apple</option>
                         <option <?php if($BindData['icons'] == "fa-archive") { echo 'selected=selected'; }?> value="fa-archive">&#xf187; fa-archive</option>
                         <option <?php if($BindData['icons'] == "fa-area-chart") { echo 'selected=selected'; }?> value="fa-area-chart">&#xf1fe; fa-area-chart</option>
                         <option <?php if($BindData['icons'] == "fa-arrow-circle-down") { echo 'selected=selected'; }?> value="fa-arrow-circle-down">&#xf0ab; fa-arrow-circle-down</option>
                         <option <?php if($BindData['icons'] == "fa-arrow-circle-left") { echo 'selected=selected'; }?> value="fa-arrow-circle-left">&#xf0a8; fa-arrow-circle-left</option>
                         <option <?php if($BindData['icons'] == "fa-arrow-circle-o-down") { echo 'selected=selected'; }?> value="fa-arrow-circle-o-down">&#xf01a; fa-arrow-circle-o-down</option>
                         <option <?php if($BindData['icons'] == "fa-arrow-circle-o-left") { echo 'selected=selected'; }?> value="fa-arrow-circle-o-left">&#xf190; fa-arrow-circle-o-left</option>
                         <option <?php if($BindData['icons'] == "fa-arrow-circle-o-right") { echo 'selected=selected'; }?> value="fa-arrow-circle-o-right">&#xf18e; fa-arrow-circle-o-right</option>
                         <option <?php if($BindData['icons'] == "fa-arrow-circle-o-up") { echo 'selected=selected'; }?> value="fa-arrow-circle-o-up">&#xf01b; fa-arrow-circle-o-up</option>
                         <option <?php if($BindData['icons'] == "fa-arrow-circle-right") { echo 'selected=selected'; }?> value="fa-arrow-circle-right">&#xf0a9; fa-arrow-circle-right</option>
                         <option <?php if($BindData['icons'] == "fa-arrow-circle-up") { echo 'selected=selected'; }?> value="fa-arrow-circle-up">&#xf0aa; fa-arrow-circle-up</option>
                         <option <?php if($BindData['icons'] == "fa-arrow-down") { echo 'selected=selected'; }?> value="fa-arrow-down">&#xf063; fa-arrow-down</option>
                         <option <?php if($BindData['icons'] == "fa-arrow-left") { echo 'selected=selected'; }?> value="fa-arrow-left">&#xf060; fa-arrow-left</option>
                         <option <?php if($BindData['icons'] == "fa-arrow-right") { echo 'selected=selected'; }?> value="fa-arrow-right">&#xf061; fa-arrow-right</option>
                         <option <?php if($BindData['icons'] == "fa-arrow-up") { echo 'selected=selected'; }?> value="fa-arrow-up">&#xf062; fa-arrow-up</option>
                         <option <?php if($BindData['icons'] == "fa-arrows") { echo 'selected=selected'; }?> value="fa-arrows">&#xf047; fa-arrows</option>
                         <option <?php if($BindData['icons'] == "fa-arrows-alt") { echo 'selected=selected'; }?> value="fa-arrows-alt">&#xf0b2; fa-arrows-alt</option>
                         <option <?php if($BindData['icons'] == "fa-arrows-h") { echo 'selected=selected'; }?> value="fa-arrows-h">&#xf07e; fa-arrows-h</option>
                         <option <?php if($BindData['icons'] == "fa-arrows-v") { echo 'selected=selected'; }?> value="fa-arrows-v">&#xf07d; fa-arrows-v</option>
                         <option <?php if($BindData['icons'] == "fa-asterisk") { echo 'selected=selected'; }?> value="fa-asterisk">&#xf069; fa-asterisk</option>
                         <option <?php if($BindData['icons'] == "fa-at") { echo 'selected=selected'; }?> value="fa-at">&#xf1fa; fa-at</option>
                         <option <?php if($BindData['icons'] == "fa-automobile") { echo 'selected=selected'; }?> value="fa-automobile">&#xf1b9; fa-automobile</option>
                         <option <?php if($BindData['icons'] == "fa-backward") { echo 'selected=selected'; }?> value="fa-backward">&#xf04a; fa-backward</option>
                         <option <?php if($BindData['icons'] == "fa-balance-scale") { echo 'selected=selected'; }?> value="fa-balance-scale">&#xf24e; fa-balance-scale</option>
                         <option <?php if($BindData['icons'] == "fa-ban") { echo 'selected=selected'; }?> value="fa-ban">&#xf05e; fa-ban</option>
                         <option <?php if($BindData['icons'] == "fa-bank") { echo 'selected=selected'; }?> value="fa-bank">&#xf19c; fa-bank</option>
                         <option <?php if($BindData['icons'] == "fa-bar-chart") { echo 'selected=selected'; }?> value="fa-bar-chart">&#xf080; fa-bar-chart</option>
                         <option <?php if($BindData['icons'] == "fa-bar-chart-o") { echo 'selected=selected'; }?> value="fa-bar-chart-o">&#xf080; fa-bar-chart-o</option>
                         <option <?php if($BindData['icons'] == "fa-battery-full") { echo 'selected=selected'; }?> value="fa-battery-full">&#xf240; fa-battery-full</option>
                         <option <?php if($BindData['icons'] == "fa-beer") { echo 'selected=selected'; }?> value="fa-beer">&#xf0fc; fa-beer</option>
                         <option <?php if($BindData['icons'] == "fa-behance") { echo 'selected=selected'; }?> value="fa-behance">&#xf1b4; fa-behance</option>
                         <option <?php if($BindData['icons'] == "fa-behance-square") { echo 'selected=selected'; }?> value="fa-behance-square">&#xf1b5; fa-behance-square</option>
                         <option <?php if($BindData['icons'] == "fa-bell") { echo 'selected=selected'; }?> value="fa-bell">&#xf0f3; fa-bell</option>
                         <option <?php if($BindData['icons'] == "fa-bell-o") { echo 'selected=selected'; }?> value="fa-bell-o">&#xf0a2; fa-bell-o</option>
                         <option <?php if($BindData['icons'] == "fa-bell-slash") { echo 'selected=selected'; }?> value="fa-bell-slash">&#xf1f6; fa-bell-slash</option>
                         <option <?php if($BindData['icons'] == "fa-bell-slash-o") { echo 'selected=selected'; }?> value="fa-bell-slash-o">&#xf1f7; fa-bell-slash-o</option>
                         <option <?php if($BindData['icons'] == "fa-bicycle") { echo 'selected=selected'; }?> value="fa-bicycle">&#xf206; fa-bicycle</option>
                         <option <?php if($BindData['icons'] == "fa-binoculars") { echo 'selected=selected'; }?> value="fa-binoculars">&#xf1e5; fa-binoculars</option>
                         <option <?php if($BindData['icons'] == "fa-birthday-cake") { echo 'selected=selected'; }?> value="fa-birthday-cake">&#xf1fd; fa-birthday-cake</option>
                         <option <?php if($BindData['icons'] == "fa-bitbucket") { echo 'selected=selected'; }?> value="fa-bitbucket">&#xf171; fa-bitbucket</option>
                         <option <?php if($BindData['icons'] == "fa-bitbucket-square") { echo 'selected=selected'; }?> value="fa-bitbucket-square">&#xf172; fa-bitbucket-square</option>
                         <option <?php if($BindData['icons'] == "fa-bitcoin") { echo 'selected=selected'; }?> value="fa-bitcoin">&#xf15a; fa-bitcoin</option>
                         <option <?php if($BindData['icons'] == "fa-black-tie") { echo 'selected=selected'; }?> value="fa-black-tie">&#xf27e; fa-black-tie</option>
                         <option <?php if($BindData['icons'] == "fa-bold") { echo 'selected=selected'; }?> value="fa-bold">&#xf032; fa-bold</option>
                         <option <?php if($BindData['icons'] == "fa-bolt") { echo 'selected=selected'; }?> value="fa-bolt">&#xf0e7; fa-bolt</option>
                         <option <?php if($BindData['icons'] == "fa-bomb") { echo 'selected=selected'; }?> value="fa-bomb">&#xf1e2; fa-bomb</option>
                         <option <?php if($BindData['icons'] == "fa-book") { echo 'selected=selected'; }?> value="fa-book">&#xf02d; fa-book</option>
                         <option <?php if($BindData['icons'] == "fa-bookmark") { echo 'selected=selected'; }?> value="fa-bookmark">&#xf02e; fa-bookmark</option>
                         <option <?php if($BindData['icons'] == "fa-bookmark-o") { echo 'selected=selected'; }?> value="fa-bookmark-o">&#xf097; fa-bookmark-o</option>
                         <option <?php if($BindData['icons'] == "fa-briefcase") { echo 'selected=selected'; }?> value="fa-briefcase">&#xf0b1; fa-briefcase</option>
                         <option <?php if($BindData['icons'] == "fa-btc") { echo 'selected=selected'; }?> value="fa-btc">&#xf15a; fa-btc</option>
                         <option <?php if($BindData['icons'] == "fa-bug") { echo 'selected=selected'; }?> value="fa-bug">&#xf188; fa-bug</option>
                         <option <?php if($BindData['icons'] == "fa-building") { echo 'selected=selected'; }?> value="fa-building">&#xf1ad; fa-building</option>
                         <option <?php if($BindData['icons'] == "fa-building-o") { echo 'selected=selected'; }?> value="fa-building-o">&#xf0f7; fa-building-o</option>
                         <option <?php if($BindData['icons'] == "fa-bullhorn") { echo 'selected=selected'; }?> value="fa-bullhorn">&#xf0a1; fa-bullhorn</option>
                         <option <?php if($BindData['icons'] == "fa-bullseye") { echo 'selected=selected'; }?> value="fa-bullseye">&#xf140; fa-bullseye</option>
                         <option <?php if($BindData['icons'] == "fa-bus") { echo 'selected=selected'; }?> value="fa-bus">&#xf207; fa-bus</option>
                         <option <?php if($BindData['icons'] == "fa-cab") { echo 'selected=selected'; }?> value="fa-cab">&#xf1ba; fa-cab</option>
                         <option <?php if($BindData['icons'] == "fa-calendar") { echo 'selected=selected'; }?> value="fa-calendar">&#xf073; fa-calendar</option>
                         <option <?php if($BindData['icons'] == "fa-camera") { echo 'selected=selected'; }?> value="fa-camera">&#xf030; fa-camera</option>
                         <option <?php if($BindData['icons'] == "fa-car") { echo 'selected=selected'; }?> value="fa-car">&#xf1b9; fa-car</option>
                         <option <?php if($BindData['icons'] == "fa-caret-up") { echo 'selected=selected'; }?> value="fa-caret-up">&#xf0d8; fa-caret-up</option>
                         <option <?php if($BindData['icons'] == "fa-cart-plus") { echo 'selected=selected'; }?> value="fa-cart-plus">&#xf217; fa-cart-plus</option>
                         <option <?php if($BindData['icons'] == "fa-cc") { echo 'selected=selected'; }?> value="fa-cc">&#xf20a; fa-cc</option>
                         <option <?php if($BindData['icons'] == "fa-cc-amex") { echo 'selected=selected'; }?> value="fa-cc-amex">&#xf1f3; fa-cc-amex</option>
                         <option <?php if($BindData['icons'] == "fa-cc-jcb") { echo 'selected=selected'; }?> value="fa-cc-jcb">&#xf24b; fa-cc-jcb</option>
                         <option <?php if($BindData['icons'] == "fa-cc-paypal") { echo 'selected=selected'; }?> value="fa-cc-paypal">&#xf1f4; fa-cc-paypal</option>
                         <option <?php if($BindData['icons'] == "fa-cc-stripe") { echo 'selected=selected'; }?> value="fa-cc-stripe">&#xf1f5; fa-cc-stripe</option>
                         <option <?php if($BindData['icons'] == "fa-cc-visa") { echo 'selected=selected'; }?> value="fa-cc-visa">&#xf1f0; fa-cc-visa</option>
                         <option <?php if($BindData['icons'] == "fa-chain") { echo 'selected=selected'; }?> value="fa-chain">&#xf0c1; fa-chain</option>
                         <option <?php if($BindData['icons'] == "fa-check") { echo 'selected=selected'; }?> value="fa-check">&#xf00c; fa-check</option>
                         <option <?php if($BindData['icons'] == "fa-chevron-left") { echo 'selected=selected'; }?> value="fa-chevron-left">&#xf053; fa-chevron-left</option>
                         <option <?php if($BindData['icons'] == "fa-chevron-right") { echo 'selected=selected'; }?> value="fa-chevron-right">&#xf054; fa-chevron-right</option>
                         <option <?php if($BindData['icons'] == "fa-chevron-up") { echo 'selected=selected'; }?> value="fa-chevron-up">&#xf077; fa-chevron-up</option>
                         <option <?php if($BindData['icons'] == "fa-child") { echo 'selected=selected'; }?> value="fa-child">&#xf1ae; fa-child</option>
                         <option <?php if($BindData['icons'] == "fa-chrome") { echo 'selected=selected'; }?> value="fa-chrome">&#xf268; fa-chrome</option>
                         <option <?php if($BindData['icons'] == "fa-circle") { echo 'selected=selected'; }?> value="fa-circle">&#xf111; fa-circle</option>
                         <option <?php if($BindData['icons'] == "fa-circle-o") { echo 'selected=selected'; }?> value="fa-circle-o">&#xf10c; fa-circle-o</option>
                         <option <?php if($BindData['icons'] == "fa-circle-o-notch") { echo 'selected=selected'; }?> value="fa-circle-o-notch">&#xf1ce; fa-circle-o-notch</option>
                         <option <?php if($BindData['icons'] == "fa-circle-thin") { echo 'selected=selected'; }?> value="fa-circle-thin">&#xf1db; fa-circle-thin</option>
                         <option <?php if($BindData['icons'] == "fa-clipboard") { echo 'selected=selected'; }?> value="fa-clipboard">&#xf0ea; fa-clipboard</option>
                         <option <?php if($BindData['icons'] == "fa-clock-o") { echo 'selected=selected'; }?> value="fa-clock-o">&#xf017; fa-clock-o</option>
                         <option <?php if($BindData['icons'] == "fa-clone") { echo 'selected=selected'; }?> value="fa-clone">&#xf24d; fa-clone</option>
                         <option <?php if($BindData['icons'] == "fa-close") { echo 'selected=selected'; }?> value="fa-close">&#xf00d; fa-close</option>
                         <option <?php if($BindData['icons'] == "fa-cloud") { echo 'selected=selected'; }?> value="fa-cloud">&#xf0c2; fa-cloud</option>
                         <option <?php if($BindData['icons'] == "fa-cloud-download") { echo 'selected=selected'; }?> value="fa-cloud-download">&#xf0ed; fa-cloud-download</option>
                         <option <?php if($BindData['icons'] == "fa-code") { echo 'selected=selected'; }?> value="fa-code">&#xf121; fa-code</option>
                         <option <?php if($BindData['icons'] == "fa-cloud-upload") { echo 'selected=selected'; }?> value="fa-cloud-upload">&#xf0ee; fa-cloud-upload</option>0
                         <option <?php if($BindData['icons'] == "fa-cny") { echo 'selected=selected'; }?> value="fa-cny">&#xf157; fa-cny</option>
                         <option <?php if($BindData['icons'] == "fa-code-fork") { echo 'selected=selected'; }?> value="fa-code-fork">&#xf126; fa-code-fork</option>
                         <option <?php if($BindData['icons'] == "fa-codepen") { echo 'selected=selected'; }?> value="fa-codepen">&#xf1cb; fa-codepen</option>
                         <option <?php if($BindData['icons'] == "fa-coffee") { echo 'selected=selected'; }?> value="fa-coffee">&#xf0f4; fa-coffee</option>
                         <option <?php if($BindData['icons'] == "fa-cog") { echo 'selected=selected'; }?>  value="fa-cog">&#xf013; fa-cog</option>
                         <option <?php if($BindData['icons'] == "fa-cogs") { echo 'selected=selected'; }?> value="fa-cogs">&#xf085; fa-cogs</option>
                         <option <?php if($BindData['icons'] == "fa-columns") { echo 'selected=selected'; }?> value="fa-columns">&#xf0db; fa-columns</option>
                         <option <?php if($BindData['icons'] == "fa-comment") { echo 'selected=selected'; }?> value="fa-comment">&#xf075; fa-comment</option>
                         <option <?php if($BindData['icons'] == "fa-comment-o") { echo 'selected=selected'; }?> value="fa-comment-o">&#xf0e5; fa-comment-o</option>
                         <option <?php if($BindData['icons'] == "fa-commenting") { echo 'selected=selected'; }?> value="fa-commenting">&#xf27a; fa-commenting</option>
                         <option <?php if($BindData['icons'] == "fa-commenting-o") { echo 'selected=selected'; }?> value="fa-commenting-o">&#xf27b; fa-commenting-o</option>
                         <option <?php if($BindData['icons'] == "fa-comments") { echo 'selected=selected'; }?> value="fa-comments">&#xf086; fa-comments</option>
                         <option <?php if($BindData['icons'] == "fa-comments-o") { echo 'selected=selected'; }?> value="fa-comments-o">&#xf0e6; fa-comments-o</option>
                         <option <?php if($BindData['icons'] == "fa-compass") { echo 'selected=selected'; }?> value="fa-compass">&#xf14e; fa-compass</option>
                         <option <?php if($BindData['icons'] == "fa-compress") { echo 'selected=selected'; }?> value="fa-compress">&#xf066; fa-compress</option>
                         <option <?php if($BindData['icons'] == "fa-connectdevelop") { echo 'selected=selected'; }?> value="fa-connectdevelop">&#xf20e; fa-connectdevelop</option>
                         <option <?php if($BindData['icons'] == "fa-contao") { echo 'selected=selected'; }?> value="fa-contao">&#xf26d; fa-contao</option>
                         <option <?php if($BindData['icons'] == "fa-copy") { echo 'selected=selected'; }?> value="fa-copy">&#xf0c5; fa-copy</option>
                         <option <?php if($BindData['icons'] == "fa-copyright") { echo 'selected=selected'; }?> value="fa-copyright">&#xf1f9; fa-copyright</option>
                         <option <?php if($BindData['icons'] == "fa-creative-commons") { echo 'selected=selected'; }?> value="fa-creative-commons">&#xf25e; fa-creative-commons</option>
                         <option <?php if($BindData['icons'] == "fa-credit-card") { echo 'selected=selected'; }?> value="fa-credit-card">&#xf09d; fa-credit-card</option>
                         <option <?php if($BindData['icons'] == "fa-crop") { echo 'selected=selected'; }?> value="fa-crop">&#xf125; fa-crop</option>
                         <option <?php if($BindData['icons'] == "fa-crosshairs") { echo 'selected=selected'; }?> value="fa-crosshairs">&#xf05b; fa-crosshairs</option>
                         <option <?php if($BindData['icons'] == "fa-css3") { echo 'selected=selected'; }?> value="fa-css3">&#xf13c; fa-css3</option>
                         <option  <?php if($BindData['icons'] == "fa-cube") { echo 'selected=selected'; }?>  value="fa-cube">&#xf1b2; fa-cube</option>
                         <option <?php if($BindData['icons'] == "fa-cubes") { echo 'selected=selected'; }?> value="fa-cubes">&#xf1b3; fa-cubes</option>
                         <option <?php if($BindData['icons'] == "fa-cut") { echo 'selected=selected'; }?> value="fa-cut">&#xf0c4; fa-cut</option>
                         <option <?php if($BindData['icons'] == "fa-cutlery") { echo 'selected=selected'; }?> value="fa-cutlery">&#xf0f5; fa-cutlery</option>
                         <option <?php if($BindData['icons'] == "fa-dashboard") { echo 'selected=selected'; }?> value="fa-dashboard">&#xf0e4; fa-dashboard</option>
                         <option <?php if($BindData['icons'] == "fa-dashcube") { echo 'selected=selected'; }?> value="fa-dashcube">&#xf210; fa-dashcube</option>
                         <option <?php if($BindData['icons'] == "fa-database") { echo 'selected=selected'; }?> value="fa-database">&#xf1c0; fa-database</option>
                         <option <?php if($BindData['icons'] == "fa-dedent") { echo 'selected=selected'; }?>  value="fa-dedent">&#xf03b; fa-dedent</option>
                         <option <?php if($BindData['icons'] == "fa-delicious") { echo 'selected=selected'; }?>  value="fa-delicious">&#xf1a5; fa-delicious</option>
                         <option <?php if($BindData['icons'] == "fa-desktop") { echo 'selected=selected'; }?> value="fa-desktop">&#xf108; fa-desktop</option>
                         <option <?php if($BindData['icons'] == "fa-deviantart") { echo 'selected=selected'; }?> value="fa-deviantart">&#xf1bd; fa-deviantart</option>
                         <option <?php if($BindData['icons'] == "fa-diamond") { echo 'selected=selected'; }?> value="fa-diamond">&#xf219; fa-diamond</option>
                         <option <?php if($BindData['icons'] == "fa-digg") { echo 'selected=selected'; }?>  value="fa-digg">&#xf1a6; fa-digg</option>
                         <option <?php if($BindData['icons'] == "fa-dollar") { echo 'selected=selected'; }?> value="fa-dollar">&#xf155; fa-dollar</option>
                         <option <?php if($BindData['icons'] == "fa-download") { echo 'selected=selected'; }?> value="fa-download">&#xf019; fa-download</option>
                         <option <?php if($BindData['icons'] == "fa-dribbble") { echo 'selected=selected'; }?> value="fa-dribbble">&#xf17d; fa-dribbble</option>
                         <option <?php if($BindData['icons'] == "fa-dropbox") { echo 'selected=selected'; }?> value="fa-dropbox">&#xf16b; fa-dropbox</option>
                         <option <?php if($BindData['icons'] == "fa-drupal") { echo 'selected=selected'; }?> value="fa-drupal">&#xf1a9; fa-drupal</option>
                         <option <?php if($BindData['icons'] == "fa-edit") { echo 'selected=selected'; }?> value="fa-edit">&#xf044; fa-edit</option>
                         <option <?php if($BindData['icons'] == "fa-eject") { echo 'selected=selected'; }?> value="fa-eject">&#xf052; fa-eject</option>
                         <option <?php if($BindData['icons'] == "fa-ellipsis-h") { echo 'selected=selected'; }?> value="fa-ellipsis-h">&#xf141; fa-ellipsis-h</option>
                         <option <?php if($BindData['icons'] == "fa-ellipsis-v") { echo 'selected=selected'; }?> value="fa-ellipsis-v">&#xf142; fa-ellipsis-v</option>
                         <option <?php if($BindData['icons'] == "fa-empire") { echo 'selected=selected'; }?> value="fa-empire">&#xf1d1; fa-empire</option>
                         <option <?php if($BindData['icons'] == "fa-envelope") { echo 'selected=selected'; }?>  value="fa-envelope">&#xf0e0; fa-envelope</option>
                         <option <?php if($BindData['icons'] == "fa-envelope-o") { echo 'selected=selected'; }?>  value="fa-envelope-o">&#xf003; fa-envelope-o</option>
                         <option <?php if($BindData['icons'] == "fa-eur") { echo 'selected=selected'; }?>  value="fa-eur">&#xf153; fa-eur</option>
                         <option <?php if($BindData['icons'] == "fa-euro") { echo 'selected=selected'; }?>  value="fa-euro">&#xf153; fa-euro</option>
                         <option <?php if($BindData['icons'] == "fa-exclamation") { echo 'selected=selected'; }?> value="fa-exclamation">&#xf12a; fa-exclamation</option>
                         <option <?php if($BindData['icons'] == "fa-euro") { echo 'selected=selected'; }?>  value="fa-euro">&#xf153; fa-euro</option>
                         <option <?php if($BindData['icons'] == "fa-exchange") { echo 'selected=selected'; }?>  value="fa-exchange">&#xf0ec; fa-exchange</option>
                         <option <?php if($BindData['icons'] == "fa-exclamation") { echo 'selected=selected'; }?> value="fa-exclamation">&#xf12a; fa-exclamation</option>
                         <option <?php if($BindData['icons'] == "fa-exclamation-circle") { echo 'selected=selected'; }?> value="fa-exclamation-circle">&#xf06a; fa-exclamation-circle</option>
                         <option <?php if($BindData['icons'] == "fa-exclamation-triangle") { echo 'selected=selected'; }?> value="fa-exclamation-triangle">&#xf071; fa-exclamation-triangle</option>
                         <option <?php if($BindData['icons'] == "fa-expand") { echo 'selected=selected'; }?> value="fa-expand">&#xf065; fa-expand</option>
                         <option <?php if($BindData['icons'] == "fa-expeditedssl") { echo 'selected=selected'; }?> value="fa-expeditedssl">&#xf23e; fa-expeditedssl</option>
                         <option <?php if($BindData['icons'] == "fa-external-link") { echo 'selected=selected'; }?> value="fa-external-link">&#xf08e; fa-external-link</option>
                         <option <?php if($BindData['icons'] == "fa-external-link-square") { echo 'selected=selected'; }?> value="fa-external-link-square">&#xf14c; fa-external-link-square</option>
                         <option <?php if($BindData['icons'] == "fa-eye") { echo 'selected=selected'; }?> value="fa-eye">&#xf06e; fa-eye</option>
                         <option <?php if($BindData['icons'] == "fa-eye-slash") { echo 'selected=selected'; }?> value="fa-eye-slash">&#xf070; fa-eye-slash</option>
                         <option <?php if($BindData['icons'] == "fa-eyedropper") { echo 'selected=selected'; }?>value="fa-eyedropper">&#xf1fb; fa-eyedropper</option>
                         <option <?php if($BindData['icons'] == "fa-facebook") { echo 'selected=selected'; }?> value="fa-facebook">&#xf09a; fa-facebook</option>
                         <option <?php if($BindData['icons'] == "fa-facebook-f") { echo 'selected=selected'; }?> value="fa-facebook-f">&#xf09a; fa-facebook-f</option>
                         <option <?php if($BindData['icons'] == "fa-facebook-official") { echo 'selected=selected'; }?> value="fa-facebook-official">&#xf230; fa-facebook-official</option>
                         <option <?php if($BindData['icons'] == "fa-facebook-square") { echo 'selected=selected'; }?> value="fa-facebook-square">&#xf082; fa-facebook-square</option>
                         <option <?php if($BindData['icons'] == "fa-fast-backward") { echo 'selected=selected'; }?> value="fa-fast-backward">&#xf049; fa-fast-backward</option>
                         <option <?php if($BindData['icons'] == "fa-fast-forward") { echo 'selected=selected'; }?> value="fa-fast-forward">&#xf050; fa-fast-forward</option>
                         <option <?php if($BindData['icons'] == "fa-fax") { echo 'selected=selected'; }?> value="fa-fax">&#xf1ac; fa-fax</option>
                         <option <?php if($BindData['icons'] == "fa-feed") { echo 'selected=selected'; }?> value="fa-feed">&#xf09e; fa-feed</option>
                         <option <?php if($BindData['icons'] == "fa-female") { echo 'selected=selected'; }?> value="fa-female">&#xf182; fa-female</option>
                         <option <?php if($BindData['icons'] == "fa-fighter-jet") { echo 'selected=selected'; }?> value="fa-fighter-jet">&#xf0fb; fa-fighter-jet</option>
                         <option <?php if($BindData['icons'] == "fa-file") { echo 'selected=selected'; }?> value="fa-file">&#xf15b; fa-file</option>
                         <option <?php if($BindData['icons'] == "fa-file-archive-o") { echo 'selected=selected'; }?> value="fa-file-archive-o">&#xf1c6; fa-file-archive-o</option>
                         <option <?php if($BindData['icons'] == "fa-file-audio-o") { echo 'selected=selected'; }?> value="fa-file-audio-o">&#xf1c7; fa-file-audio-o</option>
                         <option <?php if($BindData['icons'] == "fa-file-code-o") { echo 'selected=selected'; }?>value="fa-file-code-o">&#xf1c9; fa-file-code-o</option>
                         <option <?php if($BindData['icons'] == "fa-file-excel-o") { echo 'selected=selected'; }?> value="fa-file-excel-o">&#xf1c3; fa-file-excel-o</option>
                         <option <?php if($BindData['icons'] == "fa-file-image-o") { echo 'selected=selected'; }?> value="fa-file-image-o">&#xf1c5; fa-file-image-o</option>
                         <option <?php if($BindData['icons'] == "fa-file-movie-o") { echo 'selected=selected'; }?>  value="fa-file-movie-o">&#xf1c8; fa-file-movie-o</option>
                         <option <?php if($BindData['icons'] == "fa-file-o") { echo 'selected=selected'; }?>  value="fa-file-o">&#xf016; fa-file-o</option>
                         <option <?php if($BindData['icons'] == "fa-file-pdf-o") { echo 'selected=selected'; }?> value="fa-file-pdf-o">&#xf1c1; fa-file-pdf-o</option>
                         <option <?php if($BindData['icons'] == "fa-file-photo-o") { echo 'selected=selected'; }?> value="fa-file-photo-o">&#xf1c5; fa-file-photo-o</option>
                         <option value="fa-file-picture-o">&#xf1c5; fa-file-picture-o</option>
                         <option value="fa-file-powerpoint-o">&#xf1c4; fa-file-powerpoint-o</option>
                         <option value="fa-file-sound-o">&#xf1c7; fa-file-sound-o</option>
                         <option value="fa-file-text">&#xf15c; fa-file-text</option>
                         <option value="fa-file-text-o">&#xf0f6; fa-file-text-o</option>
                         <option value="fa-file-video-o">&#xf1c8; fa-file-video-o</option>
                         <option value="fa-file-word-o">&#xf1c2; fa-file-word-o</option>
                         <option value="fa-file-zip-o">&#xf1c6; fa-file-zip-o</option>
                         <option value="fa-files-o">&#xf0c5; fa-files-o</option>
                         <option value="fa-film">&#xf008; fa-film</option>
                         <option value="fa-filter">&#xf0b0; fa-filter</option>
                         <option value="fa-fire">&#xf06d; fa-fire</option>
                         <option value="fa-fire-extinguisher">&#xf134; fa-fire-extinguisher</option>
                         <option value="fa-firefox">&#xf269; fa-firefox</option>
                         <option value="fa-flag">&#xf024; fa-flag</option>
                         <option value="fa-flag-checkered">&#xf11e; fa-flag-checkered</option>
                         <option value="fa-flag-o">&#xf11d; fa-flag-o</option>
                         <option value="fa-flash">&#xf0e7; fa-flash</option>
                         <option value="fa-flask">&#xf0c3; fa-flask</option>
                         <option value="fa-flickr">&#xf16e; fa-flickr</option>
                         <option value="fa-floppy-o">&#xf0c7; fa-floppy-o</option>
                         <option value="fa-folder">&#xf07b; fa-folder</option>
                         <option value="fa-folder-o">&#xf114; fa-folder-o</option>
                         <option value="fa-folder-open">&#xf07c; fa-folder-open</option>
                         <option value="fa-folder-open-o">&#xf115; fa-folder-open-o</option>
                         <option value="fa-font">&#xf031; fa-font</option>
                         <option value="fa-fonticons">&#xf280; fa-fonticons</option>
                         <option value="fa-forumbee">&#xf211; fa-forumbee</option>
                         <option value="fa-forward">&#xf04e; fa-forward</option>
                         <option value="fa-foursquare">&#xf180; fa-foursquare</option>
                         <option value="fa-frown-o">&#xf119; fa-frown-o</option>
                         <option value="fa-futbol-o">&#xf1e3; fa-futbol-o</option>
                         <option value="fa-gamepad">&#xf11b; fa-gamepad</option>
                         <option value="fa-gavel">&#xf0e3; fa-gavel</option>
                         <option value="fa-gbp">&#xf154; fa-gbp</option>
                         <option value="fa-ge">&#xf1d1; fa-ge</option>
                         <option value="fa-gear">&#xf013; fa-gear</option>
                         <option value="fa-gears">&#xf085; fa-gears</option>
                         <option value="fa-genderless">&#xf22d; fa-genderless</option>
                         <option value="fa-get-pocket">&#xf265; fa-get-pocket</option>
                         <option value="fa-gg">&#xf260; fa-gg</option>
                         <option value="fa-gg-circle">&#xf261; fa-gg-circle</option>
                         <option value="fa-gift">&#xf06b; fa-gift</option>
                         <option value="fa-git">&#xf1d3; fa-git</option>
                         <option value="fa-git-square">&#xf1d2; fa-git-square</option>
                         <option value="fa-github">&#xf09b; fa-github</option>
                         <option value="fa-github-alt">&#xf113; fa-github-alt</option>
                         <option value="fa-github-square">&#xf092; fa-github-square</option>
                         <option value="fa-gittip">&#xf184; fa-gittip</option>
                         <option value="fa-glass">&#xf000; fa-glass</option>
                         <option value="fa-globe">&#xf0ac; fa-globe</option>
                         <option value="fa-google">&#xf1a0; fa-google</option>
                         <option value="fa-google-plus">&#xf0d5; fa-google-plus</option>
                         <option value="fa-google-plus-square">&#xf0d4; fa-google-plus-square</option>
                         <option value="fa-google-wallet">&#xf1ee; fa-google-wallet</option>
                         <option value="fa-graduation-cap">&#xf19d; fa-graduation-cap</option>
                         <option value="fa-gratipay">&#xf184; fa-gratipay</option>
                         <option value="fa-group">&#xf0c0; fa-group</option>
                         <option value="fa-h-square">&#xf0fd; fa-h-square</option>
                         <option value="fa-hacker-news">&#xf1d4; fa-hacker-news</option>
                         <option value="fa-hand-grab-o">&#xf255; fa-hand-grab-o</option>
                         <option value="fa-hand-lizard-o">&#xf258; fa-hand-lizard-o</option>
                         <option value="fa-hand-o-down">&#xf0a7; fa-hand-o-down</option>
                         <option value="fa-hand-o-left">&#xf0a5; fa-hand-o-left</option>
                         <option value="fa-hand-o-right">&#xf0a4; fa-hand-o-right</option>
                         <option value="fa-hand-o-up">&#xf0a6; fa-hand-o-up</option>
                         <option value="fa-hand-paper-o">&#xf256; fa-hand-paper-o</option>
                         <option value="fa-hand-peace-o">&#xf25b; fa-hand-peace-o</option>
                         <option value="fa-hand-pointer-o">&#xf25a; fa-hand-pointer-o</option>
                         <option value="fa-hand-rock-o">&#xf255; fa-hand-rock-o</option>
                         <option value="fa-hand-scissors-o">&#xf257; fa-hand-scissors-o</option>
                         <option value="fa-hand-spock-o">&#xf259; fa-hand-spock-o</option>
                         <option value="fa-hand-stop-o">&#xf256; fa-hand-stop-o</option>
                         <option value="fa-hdd-o">&#xf0a0; fa-hdd-o</option>
                         <option value="fa-header">&#xf1dc; fa-header</option>
                         <option value="fa-headphones">&#xf025; fa-headphones</option>
                         <option value="fa-heart">&#xf004; fa-heart</option>
                         <option value="fa-heart-o">&#xf08a; fa-heart-o</option>
                         <option value="fa-heartbeat">&#xf21e; fa-heartbeat</option>
                         <option value="fa-history">&#xf1da; fa-history</option>
                         <option value="fa-home">&#xf015; fa-home</option>
                         <option value="fa-hospital-o">&#xf0f8; fa-hospital-o</option>
                         <option value="fa-hotel">&#xf236; fa-hotel</option>
                         <option value="fa-hourglass">&#xf254; fa-hourglass</option>
                         <option value="fa-hourglass-1">&#xf251; fa-hourglass-1</option>
                         <option value="fa-hourglass-2">&#xf252; fa-hourglass-2</option>
                         <option value="fa-hourglass-3">&#xf253; fa-hourglass-3</option>
                         <option value="fa-hourglass-end">&#xf253; fa-hourglass-end</option>
                         <option value="fa-hourglass-half">&#xf252; fa-hourglass-half</option>
                         <option value="fa-hourglass-o">&#xf250; fa-hourglass-o</option>
                         <option value="fa-hourglass-start">&#xf251; fa-hourglass-start</option>
                         <option value="fa-houzz">&#xf27c; fa-houzz</option>
                         <option value="fa-html5">&#xf13b; fa-html5</option>
                         <option value="fa-i-cursor">&#xf246; fa-i-cursor</option>
                         <option value="fa-ils">&#xf20b; fa-ils</option>
                         <option value="fa-image">&#xf03e; fa-image</option>
                         <option value="fa-inbox">&#xf01c; fa-inbox</option>
                         <option value="fa-indent">&#xf03c; fa-indent</option>
                         <option value="fa-industry">&#xf275; fa-industry</option>
                         <option value="fa-info">&#xf129; fa-info</option>
                         <option value="fa-info-circle">&#xf05a; fa-info-circle</option>
                         <option value="fa-inr">&#xf156; fa-inr</option>
                         <option value="fa-instagram">&#xf16d; fa-instagram</option>
                         <option value="fa-institution">&#xf19c; fa-institution</option>
                         <option value="fa-internet-explorer">&#xf26b; fa-internet-explorer</option>
                         <option value="fa-intersex">&#xf224; fa-intersex</option>
                         <option value="fa-ioxhost">&#xf208; fa-ioxhost</option>
                         <option value="fa-italic">&#xf033; fa-italic</option>
                         <option value="fa-joomla">&#xf1aa; fa-joomla</option>
                         <option value="fa-jpy">&#xf157; fa-jpy</option>
                         <option value="fa-jsfiddle">&#xf1cc; fa-jsfiddle</option>
                         <option value="fa-key">&#xf084; fa-key</option>
                         <option value="fa-keyboard-o">&#xf11c; fa-keyboard-o</option>
                         <option value="fa-krw">&#xf159; fa-krw</option>
                         <option value="fa-language">&#xf1ab; fa-language</option>
                         <option value="fa-laptop">&#xf109; fa-laptop</option>
                         <option value="fa-lastfm">&#xf202; fa-lastfm</option>
                         <option value="fa-lastfm-square">&#xf203; fa-lastfm-square</option>
                         <option value="fa-leaf">&#xf06c; fa-leaf</option>
                         <option value="fa-leanpub">&#xf212; fa-leanpub</option>
                         <option value="fa-legal">&#xf0e3; fa-legal</option>
                         <option value="fa-lemon-o">&#xf094; fa-lemon-o</option>
                         <option value="fa-level-down">&#xf149; fa-level-down</option>
                         <option value="fa-level-up">&#xf148; fa-level-up</option>
                         <option value="fa-life-bouy">&#xf1cd; fa-life-bouy</option>
                         <option value="fa-life-buoy">&#xf1cd; fa-life-buoy</option>
                         <option value="fa-life-ring">&#xf1cd; fa-life-ring</option>
                         <option value="fa-life-saver">&#xf1cd; fa-life-saver</option>
                         <option value="fa-lightbulb-o">&#xf0eb; fa-lightbulb-o</option>
                         <option value="fa-line-chart">&#xf201; fa-line-chart</option>
                         <option value="fa-link">&#xf0c1; fa-link</option>
                         <option value="fa-linkedin">&#xf0e1; fa-linkedin</option>
                         <option value="fa-linkedin-square">&#xf08c; fa-linkedin-square</option>
                         <option value="fa-linux">&#xf17c; fa-linux</option>
                         <option value="fa-list">&#xf03a; fa-list</option>
                         <option value="fa-list-alt">&#xf022; fa-list-alt</option>
                         <option value="fa-list-ol">&#xf0cb; fa-list-ol</option>
                         <option value="fa-list-ul">&#xf0ca; fa-list-ul</option>
                         <option value="fa-location-arrow">&#xf124; fa-location-arrow</option>
                         <option value="fa-lock">&#xf023; fa-lock</option>
                         <option value="fa-long-arrow-down">&#xf175; fa-long-arrow-down</option>
                         <option value="fa-long-arrow-left">&#xf177; fa-long-arrow-left</option>
                         <option value="fa-long-arrow-right">&#xf178; fa-long-arrow-right</option>
                         <option value="fa-long-arrow-up">&#xf176; fa-long-arrow-up</option>
                         <option value="fa-magic">&#xf0d0; fa-magic</option>
                         <option value="fa-magnet">&#xf076; fa-magnet</option>
                         <option value="fa-mars-stroke-v">&#xf22a; fa-mars-stroke-v</option>
                         <option value="fa-maxcdn">&#xf136; fa-maxcdn</option>
                         <option value="fa-meanpath">&#xf20c; fa-meanpath</option>
                         <option value="fa-medium">&#xf23a; fa-medium</option>
                         <option value="fa-medkit">&#xf0fa; fa-medkit</option>
                         <option value="fa-meh-o">&#xf11a; fa-meh-o</option>
                         <option value="fa-mercury">&#xf223; fa-mercury</option>
                         <option value="fa-microphone">&#xf130; fa-microphone</option>
                         <option value="fa-mobile">&#xf10b; fa-mobile</option>
                         <option value="fa-motorcycle">&#xf21c; fa-motorcycle</option>
                         <option value="fa-mouse-pointer">&#xf245; fa-mouse-pointer</option>
                         <option value="fa-music">&#xf001; fa-music</option>
                         <option value="fa-navicon">&#xf0c9; fa-navicon</option>
                         <option value="fa-neuter">&#xf22c; fa-neuter</option>
                         <option value="fa-newspaper-o">&#xf1ea; fa-newspaper-o</option>
                         <option value="fa-opencart">&#xf23d; fa-opencart</option>
                         <option value="fa-openid">&#xf19b; fa-openid</option>
                         <option value="fa-opera">&#xf26a; fa-opera</option>
                         <option value="fa-outdent">&#xf03b; fa-outdent</option>
                         <option value="fa-pagelines">&#xf18c; fa-pagelines</option>
                         <option value="fa-paper-plane-o">&#xf1d9; fa-paper-plane-o</option>
                         <option value="fa-paperclip">&#xf0c6; fa-paperclip</option>
                         <option value="fa-paragraph">&#xf1dd; fa-paragraph</option>
                         <option value="fa-paste">&#xf0ea; fa-paste</option>
                         <option value="fa-pause">&#xf04c; fa-pause</option>
                         <option value="fa-paw">&#xf1b0; fa-paw</option>
                         <option value="fa-paypal">&#xf1ed; fa-paypal</option>
                         <option value="fa-pencil">&#xf040; fa-pencil</option>
                         <option value="fa-pencil-square-o">&#xf044; fa-pencil-square-o</option>
                         <option value="fa-phone">&#xf095; fa-phone</option>
                         <option value="fa-photo">&#xf03e; fa-photo</option>
                         <option value="fa-picture-o">&#xf03e; fa-picture-o</option>
                         <option value="fa-pie-chart">&#xf200; fa-pie-chart</option>
                         <option value="fa-pied-piper">&#xf1a7; fa-pied-piper</option>
                         <option value="fa-pied-piper-alt">&#xf1a8; fa-pied-piper-alt</option>
                         <option value="fa-pinterest">&#xf0d2; fa-pinterest</option>
                         <option value="fa-pinterest-p">&#xf231; fa-pinterest-p</option>
                         <option value="fa-pinterest-square">&#xf0d3; fa-pinterest-square</option>
                         <option value="fa-plane">&#xf072; fa-plane</option>
                         <option value="fa-play">&#xf04b; fa-play</option>
                         <option value="fa-play-circle">&#xf144; fa-play-circle</option>
                         <option value="fa-play-circle-o">&#xf01d; fa-play-circle-o</option>
                         <option value="fa-plug">&#xf1e6; fa-plug</option>
                         <option value="fa-plus">&#xf067; fa-plus</option>
                         <option value="fa-plus-circle">&#xf055; fa-plus-circle</option>
                         <option value="fa-plus-square">&#xf0fe; fa-plus-square</option>
                         <option value="fa-plus-square-o">&#xf196; fa-plus-square-o</option>
                         <option value="fa-power-off">&#xf011; fa-power-off</option>
                         <option value="fa-print">&#xf02f; fa-print</option>
                         <option value="fa-puzzle-piece">&#xf12e; fa-puzzle-piece</option>
                         <option value="fa-qq">&#xf1d6; fa-qq</option>
                         <option value="fa-qrcode">&#xf029; fa-qrcode</option>
                         <option value="fa-question">&#xf128; fa-question</option>
                         <option value="fa-question-circle">&#xf059; fa-question-circle</option>
                         <option value="fa-quote-left">&#xf10d; fa-quote-left++</option>
                         <option value="fa-quote-right">&#xf10e; fa-quote-right</option>
                         <option value="fa-ra">&#xf1d0; fa-ra</option>
                         <option value="fa-random">&#xf074; fa-random</option>
                         <option value="fa-rebel">&#xf1d0; fa-rebel</option>
                         <option value="fa-recycle">&#xf1b8; fa-recycle</option>
                         <option value="fa-reddit">&#xf1a1; fa-reddit</option>
                         <option value="fa-reddit-square">&#xf1a2; fa-reddit-square</option>
                         <option value="fa-refresh">&#xf021; fa-refresh</option>
                         <option value="fa-registered">&#xf25d; fa-registered</option>
                         <option value="fa-remove">&#xf00d; fa-remove</option>
                         <option value="fa-renren">&#xf18b; fa-renren</option>
                         <option value="fa-reorder">&#xf0c9; fa-reorder</option>
                         <option value="fa-repeat">&#xf01e; fa-repeat</option>
                         <option value="fa-reply">&#xf112; fa-reply</option>
                         <option value="fa-reply-all">&#xf122; fa-reply-all</option>
                         <option value="fa-retweet">&#xf079; fa-retweet</option>
                         <option value="fa-rmb">&#xf157; fa-rmb</option>
                         <option value="fa-road">&#xf018; fa-road</option>
                         <option value="fa-rocket">&#xf135; fa-rocket</option>
                         <option value="fa-rotate-left">&#xf0e2; fa-rotate-left</option>
                         <option value="fa-rotate-right">&#xf01e; fa-rotate-right</option>
                         <option value="fa-rouble">&#xf158; fa-rouble</option>
                         <option value="fa-rss">&#xf09e; fa-rss</option>
                         <option value="fa-rss-square">&#xf143; fa-rss-square</option>
                         <option value="fa-rub">&#xf158; fa-rub</option>
                         <option value="fa-ruble">&#xf158; fa-ruble</option>
                         <option value="fa-rupee">&#xf156; fa-rupee</option>
                         <option value="fa-safari">&#xf267; fa-safari</option>
                         <option value="fa-sliders">&#xf1de; fa-sliders</option>
                         <option value="fa-slideshare">&#xf1e7; fa-slideshare</option>
                         <option value="fa-smile-o">&#xf118; fa-smile-o</option>
                         <option value="fa-sort-asc">&#xf0de; fa-sort-asc</option>
                         <option value="fa-sort-desc">&#xf0dd; fa-sort-desc</option>
                         <option value="fa-sort-down">&#xf0dd; fa-sort-down</option>
                         <option value="fa-spinner">&#xf110; fa-spinner</option>
                         <option value="fa-spoon">&#xf1b1; fa-spoon</option>
                         <option value="fa-spotify">&#xf1bc; fa-spotify</option>
                         <option value="fa-square">&#xf0c8; fa-square</option>
                         <option value="fa-square-o">&#xf096; fa-square-o</option>
                         <option value="fa-star">&#xf005; fa-star</option>
                         <option value="fa-star-half">&#xf089; fa-star-half</option>
                         <option value="fa-stop">&#xf04d; fa-stop</option>
                         <option value="fa-subscript">&#xf12c; fa-subscript</option>
                         <option value="fa-tablet">&#xf10a; fa-tablet</option>
                         <option value="fa-tachometer">&#xf0e4; fa-tachometer</option>
                         <option value="fa-tag">&#xf02b; fa-tag</option>
                         <option value="fa-tags">&#xf02c; fa-tags</option>
                </select>
                   </div>
                  <div class="form-group">
                    <label for="url">Custom Url</label>
                    <input type="text" class="form-control input-sm" name="url" placeholder="Custom Url" required value="<?php echo $BindData['url'];?>">
                  </div>

                 <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control input-sm" required>
                   <option <?php if($BindData['status'] == "1") { echo 'selected=selected'; }?> value="1">Active</option>
                   <option <?php if($BindData['status'] == "0") { echo 'selected=selected'; }?> value="0">Inactive</option>
                   </select>
                  </div>

                <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" ><?php echo $btn; ?></button>
                </div>
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
                                 <th>Module Name</th>
                     				   <th>Custom Url</th>
                     				  <!-- <th>Image</th>
                                 <th>Order Seq</th> -->
                                 <th>Status</th>
                                  <th>Action</th>
                               </tr>
                               </thead>
                               <tbody id="tbody">
                               <?php
               				$data=mysqli_query($con,"select * from system_modules ORDER BY id DESC");
               				while($d1=mysqli_fetch_array($data))
               				{
               				?>
               				<tr>
               				 <!-- <td><input type="checkbox" class="arc_id" value="<?php echo $d1 ['id'];?>"> -->
                                 <td><i class="fa <?php echo $d1['icons']; ?>"></i> <?php echo $d1['name'];?></td>
               				  <td> <a href="<?php echo $d1['url'].".php"; ?>" class="btn btn-link btn-xs" <?php echo $val=$d1['is_deleted']!="1"?'':'disabled'; ?>> <?php echo $d1['url'].".php"; ?></a></td>
               		         <!-- <td><img src="../<?php echo $d1['file_url']; ?>" class="img-responsive img-rounded"  width="70" height="70"> </td> -->
                            <!-- <td><input type="number" value="<?php echo $d1['order_seq']; ?>" class="form-control" onkeypress="javascript:allowNumeric(this,event);" ></td> -->

                          <td>
                            <select class="form-control input-sm" onchange="javascript:updateStatus(this.value,<?php echo $d1['id']; ?>,'system_modules')" <?php echo $val=$d1['is_deleted']!="1"?'':'disabled'; ?>>
                  <option <?php if($d1['status'] == "1") { echo 'selected=selected'; }?> value="1">Active</option>
                  <option <?php if($d1['status'] == "0") { echo 'selected=selected'; }?> value="0">Inactive</option>
                  </select>

                </td>
                <td> <a href="modules.php?id=<?php echo $d1['id'];?>" style="cursor:pointer;" class="btn btn-primary btn-xs" <?php echo $val=$d1['is_deleted']!="1"?'':'disabled'; ?>><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
               <?php
               if($d1['is_deleted']!="1") {
                 ?>
                 <a  href="javascript:void(0);" onclick="javascript:deleteThisRow(<?php echo $d1['id']; ?>,'system_modules');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>

                 <?php
               } else {

                 ?>
                 <a  href="javascript:void(0);" onclick="javascript:restore(<?php echo $d1['id']; ?>,'system_modules');" class="btn btn-info btn-xs"><span ><i class="fa fa-undo"></i></span></a>
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
                                 text-transform:uppercase;">                                <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                                <th>Module Name</th>
                              <th>Custom Url</th>
                             <!-- <th>Image</th>
                                <th>Order Seq</th> -->
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
  	self.location="modules.php?m=active";
}
  </script>
