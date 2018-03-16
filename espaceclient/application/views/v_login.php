<?php include('admin/header.php');?>

        <div class="landingbox col-md-3 col-xs-2 col-sm-2" style="background: #6c9db3; opacity:0.9; position: absolute; left:60%;  z-index:99999;">
            <p class="text-center quote_top">
            <?php echo _welcome_index1;?><br/>
             <?php echo _welcome_index2;?><br/>
             <?php echo _welcome_index3;?><br/>
             <?php echo _welcome_index4;?></p>
         
            <?php $error_message = $this->session->flashdata('error_message'); if($error_message!=""){?>
			 <br> <h4 style="color:#FF0000; text-align:center;"><?php echo $error_message;?>!</h4>
 <?php } ?>
 <?php if($forgot_pass!='forgot'){?>
<form  action="<?php echo site_url('login/login_validate'); ?>"  method="post">
<input type="text" class="text_design" name="email" placeholder="e-mail" required autofocus /><br/><br/>
<input type="password" class="text_design" name="password" placeholder="***********" required/> <br/><br/>
<div class="">
<button class="btn btn-primary btn-md" type="submit" type="submit" value="submit" name="submit">Se/connecter</button>
<!-- <p class="landnotea"><a href="#">&#x003E;&nbsp;<?php //echo _i_account;?></a></p>-->
 <p class="landnoteb"><a href="<?php echo site_url();?>login/forgot">&#x003E;&nbsp;<?php echo _lost_pass;?> ?</a></p>
</div>
</form>
 <?php }else{?>
 <form  action="<?php echo site_url();?>login/forgot" method="post">
<input type="text" class="text_design" name="email" placeholder="e-mail" required autofocus /><br/><br/>
<div class="">
<button class="btn btn-primary btn-md" type="submit" type="submit" value="submit" name="submit">Se/connecter</button>
 <p class="landnoteb"><a href="<?php echo site_url();?>login">&#x003E;&nbsp;retour connexion</a></p>

</div>
 <?php }?>
          
        </div>
<!--Slider start-->
<div id="myCarousel" class="carousel slide" data-ride="carousel"> 

 <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active"> <img src="<?php echo $this->config->item('assests');?>image/slider1.jpg" style="width:100%" alt="First slide">
      <div class="container">
<!--        <div class="carousel-caption">
          <h1>Slide 1</h1>
          <p>Aenean a rutrum nulla. Vestibulum a arcu at nisi tristique pretium.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
        </div>-->
      </div>
    </div>
    <div class="item"> <img src="<?php echo $this->config->item('assests');?>image/slider1.jpg" style="width:100%" data-src="" alt="Second    slide">
      <div class="container">
        <!--<div class="carousel-caption">
          <h1>Slide 2</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae egestas purus. </p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
        </div>-->
      </div>
    </div>
    <div class="item"> <img src="<?php echo $this->config->item('assests');?>image/slider1.jpg" style="width:100%" data-src="" alt="Third slide">
      <div class="container">
        <!--<div class="carousel-caption">
          <h1>Slide 3</h1>
          <p>Donec sit amet mi imperdiet mauris viverra accumsan ut at libero.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
        </div>-->
      </div>
    </div>
  </div>
  <a class="left" href="#myCarousel" data-slide="prev"><img src="<?php echo $this->config->item('assests');?>image/right_arrow_slider.png" style=" position:relative;  margin-top:-50% !important;  z-index:999 !important;"/></a> 
  <a class="left carousel-control" href="#myCarousel" data-slide="next"><img src="<?php echo $this->config->item('assests');?>image/left_arrow_slider1.png" style=" position:relative;  margin-top:112% !important;  z-index:999 !important; right:70px;"/></a>
  </div>


<!--Container start-->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
        <h3 class="landing_title"><?php echo _client_title;?></h3>
        <p class="votre_para"><?php echo _client1;?></p>
        <p class="votre_para"><?php echo _client2;?><br/> 
        <?php echo _client3;?> </p>
        <p class="votre_para"><?php echo _client4;?></p>
        <p class="votre_para"><?php echo _client5;?></p>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
         <video width="320" height="240" controls class="video">
  <source src="<?php echo $this->config->item('assests');?>video/33901667.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.
</video> 
        </div>
    </div>
</div>
<?php include('admin/footer.php');?>