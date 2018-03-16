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

<script type="text/javascript">
function delete_confirm()
{
	
	var r=confirm("Êtes-vous sûr de vouloir supprimer cet élément ? ");
	if (r==true)
	{
	//User Pressed okay. Delete
	return true;
	}
	else
	{
		return false;
	//user pressed cancel. Do nothing
		}
	 
}
</script>       
                <div class="row box1">
                    <div class="row">
                       <h5 class="name_ad"><span><?php echo _account;?></span> <span style="float:right; margin-right:20px;"> <a href="<?php echo site_url();?>admin/client/form"><?php echo _create_account;?></a></span></h5>
                    
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
<th><img src="<?php echo $this->config->item('assests');?>image/arrow_down.png" height="8" width="11" alt+"arrowdown" /></th>
<th></th>
<th></th>
<th></th>  
</tr>
</thead>
<tbody>
 <?php $a=1; foreach ($client_result as $result): ?>
<tr>
<td><img src="<?php echo $this->config->item('assests'); ?>uploads/client/<?php echo $result->image;?>" height="42" width="42" style="border-radius: 50%; background: #4679BD;"/></td>
<td class="dash_name"><?php echo $result->name.' '.$result->surname;?></td>
<td class="dash_date"><?php echo $result->email;?></td>
<td class="dash_date"><?php echo $result->phone;?></td>
<td class="dash_date"><?php echo $result->company;?></td>
<td class="dash_date"><?php echo $result->position;?></td>
<td class="dash_date"><?php echo $result->address.', '.$result->city;?></td>
<td><a href="<?php echo site_url();?>admin/client/view/<?php echo  $result->id;?>"><img src="<?php echo $this->config->item('assests');?>image/publish.png" /></a></td>
<td><a href="<?php echo site_url();?>admin/client/form/<?php echo  $result->id;?>"><img src="<?php echo $this->config->item('assests');?>image/edit.png"/></a></td>
<td><a href="<?php echo site_url();?>admin/client/delete/<?php echo  $result->id;?>" onclick="return delete_confirm();"><img src="<?php echo $this->config->item('assests');?>image/busy.png" /></a></td>

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