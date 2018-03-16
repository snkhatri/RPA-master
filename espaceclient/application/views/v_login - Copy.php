<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>RESIDENCE PARIS ASNIERES</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo $this->config->item('assests');?>css/bootstrap.css">
<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo $this->config->item('assests');?>css/bootstrap-theme.css">
<!-- customize -->
<link rel="stylesheet" href="<?php echo $this->config->item('assests');?>css/customize.css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo $this->config->item('assests');?>js/jquery_1.11.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo $this->config->item('assests');?>js/bootstrap.min.js"></script>
<style>
/* wrapper_login*/

@media screen and (min-width: 0px) and (max-width: 767px) {

.wrapper_login{
width: 95%;
margin: 0px auto;
}}
@media screen and (min-width: 768px){

.wrapper_login{
width: 55%;
margin: 0px auto;
}
}

@media screen and (min-width: 1028px){
.wrapper_login{
width: 35%;
margin: 0px auto;
}
}

</style>

</head>
<body background="<?php echo $this->config->item('assests');?>image/body-bg7.png">
<br/><br/><br/><br/>
<div class="container">
<div class="row" style="margin-left:32%; padding-bottom:10px;">
        <div class="col-md-7 col-sm-12 col-xs-12">
            <h2 class="logotitle">RESIDENCE PARIS ASNIERES</h2>
            <p class="slogan">R&#xE9;sidence d'affaires et de tourisme</p>
        </div>
    </div>
    </div>
<div class="wrapper_login">
<div class="panel panel-default">
<div class="panel-heading">Please Login!</div>
<div class="panel-body">
<?php $error_message = $this->session->flashdata('error_message'); if($error_message!=""){?>
			 <br> <h4 style="color:#FF0000; text-align:center;"><?php echo $error_message;?>!</h4>
 <?php } ?>
 <?php if($forgot_pass!='forgot'){?>
<form class="form-signin"  action="<?php echo site_url('login/login_validate'); ?>"  method="post">
<input type="text" class="form-control" name="email" placeholder="Email ID" required autofocus /><br/>
<input type="password" class="form-control" name="password" placeholder="***********" required/> <br/>
<div class="">
<button class="btn btn-primary btn-md" type="submit" type="submit" value="submit" name="submit">Login/sign in</button>
<a href="<?php echo site_url();?>login/forgot" style="float:right; padding-right: 25px;;">Forget password</a>
</div>
</form>
 <?php }else{?>
 <form class="form-signin" action="<?php echo site_url();?>login/forgot" method="post">
<input type="text" class="form-control" name="email" placeholder="Email ID" required autofocus /><br/>
<div class="">
<button class="btn btn-primary btn-md" type="submit" type="submit" value="submit" name="submit">Submit</button>
<a href="<?php echo site_url();?>login" style="float:right; padding-right: 25px;;">Back to Login</a>
</div>
 <?php }?>
</div>
</div>


</body>
</html>