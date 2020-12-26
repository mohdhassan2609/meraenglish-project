
<?php include("header.php") ?>




<?php $banner= $this->frontend_model->get_records('tbl_banner',"status='0' order by date_time asc")[0]; ?>
<?php $keyword = explode(",", $banner->images);?> 
<?php $i=1;?> 
	<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
      <?php foreach($keyword as $key):?>
      
    <div class="carousel-item <?php if($i==1) echo 'active';?>">
      <img class="w-100" src="<?=base_url()?>uploads/common/<?=$key?>">
    </div>
    <?php $i++; ?>
       <?php endforeach; ?> 
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
			
	

<?php for($i=1;$i<8;$i++)	{
		 $this->load->view('public/sections/' . 'section'.$i. '.php'); 

		
}?>

			
<?php include("footer.php") ?>



