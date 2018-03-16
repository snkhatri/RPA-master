<?php include("header.php");?>

         
                <div class="row box1">
                    <div class="row">
                       <h5 class="name_ad"><?php if($id==''){ echo _create_invoice;}else{ echo _edit_invoice;}?></h5>
                       <p class="line"></p>
                       <form role="form" action="<?php echo site_url();?>admin/invoice/form"  method="post" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <div class="frame">
                                    <p class="text-center">
                                  <?php if($image==''){?> <img src="<?php echo $this->config->item('assests'); ?>image/icon2.png" width='100px' height='100px'/><?php }else{?><a href="<?php echo $this->config->item('assests'); ?>uploads/invoice/<?php echo $image;?>"><img src="<?php echo $this->config->item('assests'); ?>image/pdf.png" width='100px' height='100px' /></a><?php }?></p>
                                  <p class="text-center"><?php if($image==''){}else{ echo $image;}?></p>
                                    <div class="fileUpload">
                                        <span class="text-center">+ <?php echo _upload_document;?></span>
                                        <input type="file" class="upload"  name="image"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-left:70px;">
                                <div class="form-group">
                                <select name="client_id" id="client_id" class="form-control" >
												<option value=""><?php echo _select_client;?></option>
                                                <option value="new_customer"><?php echo _new_client;?></option>
                                                  <?php  foreach ($client_result as $client): ?>
												<option value="<?php echo $client->id; ?>" <?php if($client_id==$client->id){ ?> selected <?php }?>><?php echo  $client->name.' '. $client->surname.'/'.$client->company; ?></option>
												 <?php endforeach;?>
											</select>
                                
                                </div>
                                <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="text" name="amount" placeholder="<?php echo _amount;?>" value="<?php echo $amount;?>"onkeypress="return isNumberKey(event)">
                                </div>
                                <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="text" name="amount2" placeholder="<?php echo _amount2;?>" value="<?php echo $amount2;?>"onkeypress="return isNumberKey(event)">
                                </div>
                               
                                <input type="hidden" name="edit_id" value="<?php echo $id;?>">
                                <button class="btn blue_btn form-control" type="submit"><?php if($id==''){ echo _creating_invoice;}else{ echo _editing_invoice;}?></button>
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
    $('#client_id').change(function(e) {
		if($(this).val()=='new_customer')
        window.location = '<?php echo site_url();?>admin/client/form'
    });
});
</script>
