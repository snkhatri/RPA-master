<?php include("header.php");?>
<script src="<?php echo $this->config->item('assests');?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo $this->config->item('assests');?>js/jquery.dataTables.bootstrap.js"></script>
<script src="<?php echo $this->config->item('assests');?>js/custom.js"></script>
<style>

.dataTables_filter {
  float: left;
  margin: 19px 28px 10px;
}
.dataTables_filter label input {
  -webkit-border-radius: 2px 2px 2px 2px;
  -moz-border-radius: 2px 2px 2px 2px;
  border-radius: 2px 2px 2px 2px;
}
.dataTables_length {
  float: right;
  margin: 19px 20px 9px 20px;
   color:#999;
}
.dataTables_length label .selector {
  margin-bottom: 2px;
 
}

.dataTables_wrapper:before,
.dataTables_wrapper:after {
  display: table;
  content: "";
}

.dataTables_paginate {
  float: right;
  margin-right: 20px;
}
.dataTables_info {
  margin: 28px;
  float: left;
  font-size:12px;
 color:#666666;	
}
.dataTables_paginate ul li{
	list-style: none;
	float: left;
	padding:2px 4px;
	border:1px solid #999;
	margin-left:5px;
}
.dataTables_paginate ul li a{
	font-size:12px;
	color:#666666;	
}
.pagination ul li.active {
	
	border:1px solid #999;
}
.disabled a{
	color: #999 !important;
}

.pagination ul li.active a{
	color: #F00;
	
}
</style>         
                <div class="row box1">
                    <div class="row">
                       <h5 class="name_ad"><span><?php echo _my_bills;?></span></h5>
                    
                       <p class="line"></p>
                       <div class="table-responsive">
<table class="table dataTable" style="width:90% !important; margin-left:5%;">
<thead>
<tr>
<th></th>
<th><img src="<?php echo $this->config->item('assests');?>image/arrow_down.png" height="8" width="11" alt+"arrowdown" /></th>
<th><img src="<?php echo $this->config->item('assests');?>image/arrow_down.png" height="8" width="11" alt+"arrowdown" /></th>
<th><img src="<?php echo $this->config->item('assests');?>image/arrow_down.png" height="8" width="11" alt+"arrowdown" /></th>
<th><img src="<?php echo $this->config->item('assests');?>image/arrow_down.png" height="8" width="11" alt+"arrowdown" /></th>
<th><img src="<?php echo $this->config->item('assests');?>image/arrow_down.png" height="8" width="11" alt+"arrowdown" /></th>
<th></th>
<th><img src="<?php echo $this->config->item('assests');?>image/arrow_down.png" height="8" width="11" alt+"arrowdown" /></th>
</tr>
</thead>
<tbody>
 <?php $a=1; foreach ($invoice_result as $result): $single_result = $this->m_client->single_client($result->client_id);?>
<tr>
<td><img src="<?php echo $this->config->item('assests'); ?>uploads/client/<?php echo $single_result->image;?>" height="42" width="42" style="border-radius: 50%; background: #4679BD;"/></td>
<td class="dash_name"><?php echo $single_result->name.' '.$single_result->surname;?><br/><small class="dash_name_s"><img src="<?php echo $this->config->item('assests'); ?>image/loc.png" /><?php echo $single_result->company.','.$single_result->city;?></small></td>
<td class="dash_name"><?php echo $result->invoice_id;?></td>
<td class="dash_date"><?php echo $result->date_time;?></td>
<td class="dash_date"><?php echo $result->amount;?></td>
<td class="dash_date"><?php echo $result->amount2;?></td>
<td><a href="<?php echo $this->config->item('assests'); ?>uploads/invoice/<?php echo $result->image;?>" target="_blank"><img src="<?php echo $this->config->item('assests'); ?>image/pdf_icon.png" height="21" width="19" /></a></td>
<td class="dash_green"><?php if($result->pay_status=='0'){?><a href="#"> <span class="dash_org">NON PAYÉ </span></a><?php }else{?><span class="dash_green">PAYÉ</span><?php } ?></td>
</tr>
 <?php $a++; endforeach;?>
</tbody>
</table>
</div>
                      
 </div>
      </div>
              </div>
              </div>
<?php include("footer.php");?>