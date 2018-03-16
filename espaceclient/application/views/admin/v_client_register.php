<?php include("header.php");?>

           
                <div class="row box1">
                    <div class="row">
                       <h5 class="name_ad"><?php if($id==''){ echo _create_account;}else{ echo _edit_account;}?></span></h5>
                       <p class="line"></p>
                       <form role="form" action="<?php echo site_url();?>admin/client/form"  method="post" enctype="multipart/form-data" id="myform">
                            <div class="col-md-4">
                                <div class="frame">
                                    <p class="text-center"><img src="<?php if($image==''){ echo $this->config->item('assests');?>image/icon2.png <?php }else{ echo $this->config->item('assests'); ?>uploads/client/<?php echo $image;}?>" height="124" width="124" alt="" style="border-radius: 50%; background: #4679BD;" /></p>
                                     <p class="text-center"><?php if($image==''){}else{ echo $image;}?></p>
                                    <br/>
                                    <div class="fileUpload">
                                        <span class="text-center">+ <?php echo _photo_upload;?></span>
                                        <input type="file" class="upload"  name="image"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="text" name="name" placeholder="<?php echo _name;?>" value="<?php echo $name;?>">
                                </div>
                                <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="text" name="surname" placeholder="<?php echo _surname;?>" value="<?php echo $surname;?>">
                                </div>
                                <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="text" name="company" placeholder="<?php echo _company;?>" value="<?php echo $company;?>">
                                </div>
                                <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="text" name="position" placeholder="<?php echo _position;?>" value="<?php echo $position;?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="text" name="phone" placeholder="<?php echo _phone;?>" value="<?php echo $phone;?>" onkeypress="return isNumberKey(event)">
                                </div>
                                <div class="form-group">
                                <input id="exampleInputEmail12" class="form-control" type="text" name="email"  placeholder="<?php echo _email;?>" value="<?php echo $email;?>" class="email_validate">   <p style="color:#F00;" class="valid"></p>
                                </div>
                                <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="text" name="address" placeholder="<?php echo _address;?>" value="<?php echo $address;?>">
                                </div>
                                <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="text" name="city" id="city" placeholder="<?php echo _city;?>" value="<?php echo $city;?>">
                                </div>
                                 <input type="hidden" name="edit_id" value="<?php echo $id;?>">
                                <button class="btn blue_btn form-control" type="submit"  id="submit" style="margin-left: 0px;"><?php if($id==''){ echo _creating_account;}else{ echo _editing_account;}?></button>
                                <br/><br/><br/>
                            </div>
                            </form>
                     </div>
                  </div>
              </div>
              </div>
              <?php include("footer.php");?>
			 <!--only number in text box-->
	<script type="text/javascript">
	
function isNumberKey(evt)
          {
             var charCode = (evt.which) ? evt.which : event.keyCode
             if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
 
             return true;
          }
		  
</script>


<!--only number in text box end-->
<script type="text/javascript">
$(document).ready(function(e) {
	$('#exampleInputEmail12').blur(function(e) {
       	var email=$(this).val();
if (validateEmail(email)) {
$('.valid').html('');

}
else {

$('.valid').html('Invalid Email!');
e.preventDefault();
}

    });
	
});
function validateEmail(sEmail) {
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

if (mailformat.test(sEmail)) {
return true;
}
else {
return false;
}
}
</script>
