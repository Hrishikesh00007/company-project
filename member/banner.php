<?php
$sqlb="SELECT * FROM `ee_banner` WHERE `status`='A' ORDER BY `id` DESC";
$resb=query($conn,$sqlb);
$numb=numrows($resb);
if($numb>0)
{
?>

<div class="row" style="padding:0;margin:0;">

<div class="col-sm-12 col-md-12">
<div id="allinone_bannerRotator_classic" style="display:none;">
<!-- IMAGES -->
<ul class="allinone_bannerRotator_list">
<?php
while($fetchb=fetcharray($resb))
{
?>
<li data-bottom-thumb="../administrator/banner/<?=$fetchb['banner']?>" data-text-id="#allinone_bannerRotator_photoText1">
<img src="../administrator/banner/<?=$fetchb['banner']?>" alt=""  border="0" />
</li>
<?php }?>
</ul> 
</div>
</div>
</div>

<div align="center">&nbsp;</div>
<?php }?>