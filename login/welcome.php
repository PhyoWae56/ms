<?php
$MessName= $_SESSION['MessName'];
$UserName= $_SESSION['UserName'];
?>
<h4>Mess Name :  <?php echo $MessName;?></h4>
<h4>User Name :  <?php echo $UserName;?></h4>
<!--admin-->
<?php
if(!empty($MessName)){
?>
<div>
	<!--<ul>-->
	<!--	<li class="span2 ">-->
	<!--		<div class="thumbnail">-->
	<!--			<img src="assets/img/rs.jpg" alt="">-->
	<!--			<div class="caption">-->
	<!--				<p style="text-align: center">-->
	<!--					<a href="index.php?mod=Hospital&pg=Hospital_view" class="btn btn-primary  btn-small">Hospitals & Pharmacy</a>-->
	<!--				</p>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</li>-->
	
		
	<!--		<li class="span2 ">-->
	<!--		<div class="thumbnail">-->
	<!--			<img src="assets/img/gas.jpg" alt="">-->
	<!--			<div class="caption">-->
	<!--				<p style="text-align: center">-->
	<!--					<a href="index.php?mod=FillingStation&pg=FillingStation_view" class="btn btn-primary  btn-small">Filling Station</a>-->
	<!--				</p>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</li>-->
	<!--	<li class="span2 ">-->
	<!--		<div class="thumbnail">-->
	<!--			<img src="assets/img/police.jpg" alt="">-->
	<!--			<div class="caption">-->
	<!--				<p style="text-align: center">-->
	<!--					<a href="index.php?mod=Police&pg=Police_view" class="btn btn-primary  btn-small">Police Station</a>-->
	<!--				</p>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</li>-->

	<!--</ul>-->
</div>
<?php } ?>

