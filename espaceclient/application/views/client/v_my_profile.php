<?php include("header.php");?>
                <div class="row box1">
                    <div class="row">
                       <h5 class="name"><?php echo _my_account;?> <span style="float:right; margin-right:20px;"> <a href="<?php echo site_url();?>client/profile/form/<?php echo $id;?>"><?php echo _edit_account;?></a></span></h5>
                        <div class="col-md-4">
                            <p class="bg1"><img src="<?php echo $this->config->item('assests'); ?>uploads/client/<?php echo $image;?>" height="124" width="124" alt="logo-clent" class="bg11" style="border-radius: 50%; background: #4679BD;"/></p>
                        </div>
                        <div class="col-md-4 bot_box">
                            <p class="text-left text_con"><?php echo $name;?></p>
                            <p class="text-left text_con"><?php echo $surname;?></p>
                            <p class="text-left text_con"><?php echo $company;?></p>
                            <p class="text-left text_con"><?php echo $position;?></p>
                        </div>
                        <div class="col-md-4 bot_box">
                            <p class="text-left text_con"><?php echo $phone;?></p>
                            <p class="text-left text_con"><?php echo $email;?></p>
                            <p class="text-left text_con"><?php echo $address;?></p>
                            <p class="text-left text_con"><?php echo $city;?></p>
                        </div>
                     </div>
                  </div>
              </div>
              </div>
               <?php include("footer.php");?>