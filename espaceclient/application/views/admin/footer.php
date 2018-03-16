  </div>
<!--container end-->
</div>
<div class="clearfix">&nbsp;</div>
<!--Container footer start -->
<div class="container-fluid foot1">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
            <h2 class="foot_title">RESIDENCE<br/>PARIS ASNIERES</h2>
            <p>Apud has gentes, quarum exordiens initium ab Assyriis ad Nili cataractas porrigitur et confinia Blemmyarum, omnes pari sorte sunt bellatores seminudi coloratis sagulis pube</p>
            </div>
            <div class="col-md-4 col-sm-4">
                <h2 class="stitle">Menu</h2>
                <ul class="list-unstyled footmenu">
                <li><a href="#"><?php echo _welcome;?></a></li>
                <li><a href="#"><?php echo _Appartement;?></a></li>
      <li><a href="#"><?php echo _Situation;?></a></li>
      <li><a href="#"><?php echo _Tarifs;?></a></li>
      <li><a href="#"><?php echo _Services;?></a></li>
      <li><a href="#"><?php echo _business;?></a></li>
      <li><a href="#"><?php echo _Contact;?></a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-4">
                <h2 class="stitle">ADRESSE</h2>
                <table  border="0">
                    <tr class="fcode">
                        <td><img src="<?php echo $this->config->item('assests');?>image/foot_add.png" height="15" width="19" alt="hme" title="home" /></td>
                        <td class="fcode1"><?php echo $admin_result->address;?></td>
                    </tr>
                    <tr class="fcode">
                        <td><img src="<?php echo $this->config->item('assests');?>image/foot_phone.png" width="16" height="16" alt="phn" title="phn" /></td>
                        <td class="fcode1">TEL : +<?php echo $admin_result->phone;?><br/> Fax : 00 33 1 40 86 94 98</td>
                    </tr>
                    <tr class="fcode">
                        <td><img src="<?php echo $this->config->item('assests');?>image/foot_email.png" width="20" height="17" alt="email" /></td>
                        <td class="fcode1"><?php echo $admin_result->email;?></td>
                    </tr>
                </table>
            </div>
            
        </div>
    </div>
</div>
<!--Container footer start -->
<div class="container-fluid foot2">
	<p class="copy text-center">© 2014 Residence Paris Asni&#xE8;res</p>
</div>


</body>
</html>
