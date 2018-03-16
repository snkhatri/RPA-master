<?php include("header.php");?>

           
                <div class="row box1">
                    <div class="row">
                       <h5 class="name_ad"><?php echo _setting;?></span></h5>
                       <p class="line"></p>
                       <form role="form" action="<?php echo site_url();?>admin/dashboard/setting"  method="post" enctype="multipart/form-data" id="myform">
                            <div class="col-md-4">
                                <div class="frame">
                                    <p class="text-center"><img src="<?php if($image==''){ echo $this->config->item('assests');?>image/icon2.png <?php }else{ echo $this->config->item('assests'); ?>uploads/client/<?php echo $image;}?>" height="124" width="124" alt="" style="border-radius: 50%; background: #4679BD;"/></p><br/>
                                    <div class="fileUpload">
                                        <span class="text-center">+ <?php echo _photo_upload;?></span>
                                        <input type="file" class="upload"  name="image"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-left:50px;">
                                <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="text" name="name" placeholder="<?php echo _name;?>" value="<?php echo $name;?>">
                                </div>
                                <div class="form-group">
                                 <input id="exampleInputEmail1" class="form-control" type="text" name="phone" placeholder="<?php echo _phone;?>" value="<?php echo $phone;?>"  onkeypress="return isNumberKey(event)">
                                </div>
                                <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="text" name="email" placeholder="<?php echo _email;?>" value="<?php echo $email;?>">
                                </div>
                                <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="text" name="address" placeholder="<?php echo _address;?>" value="<?php echo $address;?>">
                                </div> <div class="form-group">
                                <input type="hidden" name="edit_id" value="<?php echo $id;?>">
                                <button class="btn blue_btn form-control" type="submit" ><?php echo _save;?></button>
                                 </div> 
                            </div>
                         </form>   
                  </div>
              </div>
              </div></div>
              <?php include("footer.php");?>
              <!---Email Validation-->
<script src="<?php echo $this->config->item('assests');?>js/validate.js"></script>
<style>
input.error { border: 1px solid red; }
#exampleInputEmail1-error {
	color:#F30;
	padding-left: 16px;
	margin-left: .3em;
}
</style>
	
			<script type="text/javascript">
	
function isNumberKey(evt)
          {
             var charCode = (evt.which) ? evt.which : event.keyCode
             if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
 
             return true;
          }
		  
</script>
