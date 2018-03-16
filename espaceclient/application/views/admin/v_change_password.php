<?php include("header.php");?>

           
                <div class="row box1">
                    <div class="row">
                       <h5 class="name_ad"><?php echo _ch_pass;?></h5>
                       <p class="line"></p>
                       <form role="form" action="<?php echo site_url();?>admin/dashboard/change_password"  method="post" enctype="multipart/form-data">
                            
                            <div class="col-md-4" style="margin-left:10px;">
                                <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="password" name="old_password" placeholder="<?php echo _old_pass;?>" value=''>
                                </div>
                                <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="password" name="new_password" placeholder="<?php echo _new_pass;?>">
                                </div>
                                 <div class="form-group">
                                <input id="exampleInputEmail1" class="form-control" type="password" name="confirm_password" placeholder="<?php echo _con_pass;?>">
                                </div>
                               
                                <button class="btn blue_btn" type="submit"><?php echo _ch_pass;?></button>
                                <br/><br/><br/>
                            </div>
                            
                            </form>
                     </div>
                  </div>
              </div>
              </div>
              <?php include("footer.php");?>