<?php error_reporting(0);?>
<!DOCTYPE HTML>
<html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>RESIDENCE PARIS ASNIERES</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo $this->config->item('assests');?>css/bootstrap.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo $this->config->item('assests');?>css/bootstrap-theme.css">
    <!-- customize -->
    <link rel="stylesheet" href="<?php echo $this->config->item('assests');?>css/customize.css">
     <link rel="stylesheet" href="<?php echo $this->config->item('assests');?>css/customize1.css">
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo $this->config->item('assests');?>js/jquery_1.11.1.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo $this->config->item('assests');?>js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script type='text/javascript' src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
<![endif]-->



    <!-- Add/remove menu bar -->
	<script type="text/javascript">
		$(document).ready(function(e) {
		$(window).resize(function()
		{
		var win_width=$(window).width();
		
		if(win_width<768)
		{
		$('.navbar-header').css('display','block');
		}
		else
		{
		$('.navbar-header').css('display','none');
		}
		});
		});
	</script>
   <style type="text/css">
   .dataTables_filter, .dataTables_length{
	display: none !important;
}

.multi-level a{
	font-family: sintony-regular;
	font-size: 14px;
	text-transform: none;
	font-weight: 500;

}
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}

.top_arrow{
	position: absolute;
	top:-6.8%;
	left:10%;
}
@media (min-width: 200px) and  (max-width:768px){
.top_arrow{
	display: none;
}
}
</style>   
</head>
<body>
<?php 
error_reporting(0);

$lang = $this->session->userdata('lang');

if($lang=='english'){
	
	include('english.php');
	
}else{
	$this->session->set_userdata('lang','french');
	include('french.php');
}
?>
<!--container start-->
<div class="container top_view">
<br/>

<?php $admin_result = $this->m_admin->single_admin();
?>
<!--tophead row-->
<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="col-md-4 col-sm-3 col-xs-5">
	        <img src="<?php echo $this->config->item('assests');?>image/logo.png" title="logo"  height="92" width="129" /> 
        </div>
       <div class="col-md-8 col-sm-9 col-xs-9">
            <h2 class="logotitle"><img src="<?php echo $this->config->item('assests');?>image/logo_title.png" height="20" width="282" class="img-responsive"/></h2>
            <p class="slogan">R&#xE9;sidence d'affaires et de tourisme</p>
        </div>
    </div>
    <div class="col-md-4 top_phone opensemibold">
        <div class="row">
        <div class="col-md-5 col-sm-5 col-xs-5">
        	<p class="phone"><img src="<?php echo $this->config->item('assests');?>image/top_phone.png" height="11" width="12" />&nbsp;<?php echo $admin_result->phone;?></p>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-7">
        <p class="mail"><img src="<?php echo $this->config->item('assests');?>image/top_email.png" height="10" width="13" />&nbsp;<?php echo $admin_result->email;?></p>
        </div>
        </div>
        <div class="row">
        <p class="add"><img src="<?php echo $this->config->item('assests');?>image/hme.png" height="10" width="13" alt="hme" title="address"/>&nbsp;<?php echo $admin_result->address;?></p>
        </div>
    
    </div>
    <div class="col-md-2 top_phone1 OpenSans-Regular">
	    <p><span class="<?php if($lang=='french' || $lang==''){echo 'b';}else{echo 'w1';} ?>"><a href="<?php echo site_url();?>login/language/french">FR</a></span>&nbsp;
        <span class="<?php if($lang=='english'){echo 'b';}else{echo 'w1';} ?>">|&nbsp;<a href="<?php echo site_url();?>login/language/english">EN</a>&nbsp;|</span>&nbsp;
        <span class="<?php if($lang=='ES'){echo 'b';}else{echo 'w1';} ?>"><a href="<?php echo site_url();?>login/language/ES">ES</a></span>&nbsp;<img src="<?php echo $this->config->item('assests');?>image/mapl.png" height="23" width="23" alt="world" title="logo-w"/></p>
    </div>
</div>

<div class="clearfix">&nbsp;</div>
<!--Nav Menu row-->
<nav class="navbar navbar-default opensemibold15 " role="navigation">
  <div class="container-fluid no-padding">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="display:none;">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Menu</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav text-uppercase">

      <li class="dropdown mainnav1"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo _Appartement;?><span class="caret"></span></a>
      
      		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
            <p class="top_arrow"><img src="<?php echo $this->config->item('assests');?>image/top_arrow.png" height="8" width="16" /></p>
              <li><a href="#">Description</a></li>
              <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Loisirs</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Second level</a></li>
                  <li class="dropdown-submenu">
                    <a href="#">Even More..</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">3rd level</a></li>
                    	<li><a href="#">3rd level</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Second level</a></li>
                  <li><a href="#">Second level</a></li>
                </ul>
              </li>
                <li class="divider"></li>
                <li><a href="#">Services</a></li>
                <li class="divider"></li>
                <li><a href="#">Plan type</a></li>
                <li class="divider"></li>
              <li><a href="#">Vidéo</a></li>
            </ul>
      
      </li>
      <li><a href="#"><?php echo _Situation;?></a></li>
      <li><a href="#"><?php echo _Tarifs;?></a></li>
      <li><a href="#"><?php echo _Services;?></a></li>
      <li><a href="#"><?php echo _business;?></a></li>
      <li><a href="#"><?php echo _Contact;?></a></li>
  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--container end-->
</div>
<?php $admin_details = $this->session->userdata('admin_details');

$admin_id = $admin_details['id'];
if($admin_id==1){?>
<!--Container start-->
<div class="container_fluid" style="background: #444444;">
    <div class="container">
        <div class="row">
        <div class="col-md-10">
            <form class="form-search" method="post" id="s" action="" class="left_border" style="margin-left: 7%; margin-top:2%;">
            <button type="submit" class="search_manu"></button>
            <input type="text" class="input-medium" name="s" placeholder="<?php echo _search;?>" value="" style="background:#444444; color:#fff;">
            </form>
        </div>
            
            <div class="col-md-2" style="padding-top: 10px;">
            <p style="float: left;">&nbsp;&nbsp;<img src="<?php echo $this->config->item('assests'); ?>uploads/client/<?php echo $admin_result->image;?>" height="42" width="42" alt="ADMIN" style="border-radius: 50%; background: #4679BD;" align="absmiddle"/>&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <p style="float: left;">
                <ul>
                <li class="dropdown" style="list-style:none; font-size: 12px; margin-right: 20px !important; margin-top:10px;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #fff; text-transform: none; text-decoration: none;"><?php echo _admin;?><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url();?>admin/dashboard/setting"><?php echo _settings;?></a></li>
                <li><a href="<?php echo site_url();?>admin/dashboard/change_password"><?php echo _changa_password;?></a></li>
                <li><a href="<?php echo site_url();?>login/logout"><?php echo _logout;?></a></li>
                </ul>
                </li>
                </ul></p>
    </div>
</div>
</div>
</div>


 
       




    <div class="container">
    <div class="row">
    
        <div class="col-md-4">
        <ul class="v-menu">
       
        <?php  $page_url = $this->uri->segment(2);?>
            <li><a href="<?php echo site_url();?>admin/dashboard"><img src="<?php echo $this->config->item('assests');?>image/<?php if($page_url=='dashboard'){?>v-home.png<?php }else{?>admin3_hme.png<?php }?>" height="68" width="68" alt="star"/><span class="lr"><?php echo _dashboard;?></span><span class="text-right arrow_right"><img src="<?php echo $this->config->item('assests');?>image/v_arrow.png" height="11" width="7"/></span></a></li>
            
            <li><a href="<?php echo site_url();?>admin/client"><img src="<?php echo $this->config->item('assests');?>image/<?php if($page_url=='client'){?>admin3_pen.png<?php }else{?>creer.png<?php }?>" height="68" width="68" alt="star"/><span class="lr"><?php echo _account;?></span><span class="text-right arrow_right"><img src="<?php echo $this->config->item('assests');?>image/v_arrow.png" height="11" width="7" align="absmiddle"></span></a></li>
            
            <li><a href="<?php echo site_url();?>admin/invoice"><img src="<?php echo $this->config->item('assests');?>image/<?php if($page_url=='invoice'){?>stars.png<?php }else{?>star.png<?php }?>" height="68" width="68" alt="star"/><span class="lr"><?php echo _invoice;?></span><span class="text-right arrow_right"><img src="<?php echo $this->config->item('assests');?>image/v_arrow.png" height="11" width="7"/></span></a></li>
           
<li><a href="<?php echo site_url();?>admin/document"><img src="<?php echo $this->config->item('assests');?>image/<?php if($page_url=='document'){?>tab.png<?php }else{?>table.png<?php }?>" height="68" width="68" alt="star"/><span class="lr"><?php echo _document;?></span><span class="text-right arrow_right"><img src="<?php echo $this->config->item('assests');?>image/v_arrow.png" height="11" width="7" align="absmiddle"></span></a></li>
</ul>
        </div>
        <div class="col-md-8">

<?php

//lets have the flashdata overright "$message" if it exists
if($this->session->flashdata('message'))
{
$message	= $this->session->flashdata('message');
}

if($this->session->flashdata('error'))
{
$error	= $this->session->flashdata('error');
}

if(function_exists('validation_errors') && validation_errors() != '')
{
$error	= validation_errors();
}

?>

 <?php if (!empty($message)): ?>

                             <div class="alert alert-block alert-success">
							  <a class="close" data-dismiss="alert" href="#">×</a>
                              <?php  $lang = $this->session->userdata('lang');
if($lang==''){
	$lang='french';
}

if($lang=='english'){?>
							  <h4 class="alert-heading">Success!</h4>
                              <?php }else{?>
								    <h4 class="alert-heading">Succès !</h4>
								<?php  }?>
							  <?php echo $message; ?>...
							</div>
 <?php endif; ?>

<?php if (!empty($error)): ?>
                           
                            <div class="alert alert-block alert-danger">
							  <a class="close" data-dismiss="alert" href="#">×</a>
                             <?php if($lang=='english'){?>
							  <h4 class="alert-heading">Error!</h4>
                              <?php }else{?>
                               <h4 class="alert-heading">Erreur !</h4>
                              <?php  }?>
							 <?php echo $error; ?>...
							</div>
<?php endif; ?>
 <div class="mon">
            
        <div style="clear:both;"></div>
        <?php }?>