<?php $this->load->helper('common'); ?>

<style>
	#row{
		
		padding: 30px;
		line-height: 10px;
	}
</style>


<div class="container-fluid bg-dark">
<div class="row text-white" id="row">
	
	<div class="col-md-1"></div>
	<div class="col-md-3">
	<img src="/assets/images/logo.png" id="logo" style="margin-bottom: 10px;"/>
	<p>Wealth & asset management</p>
	<p> Global commerce</p>
	<p>Financial ventures</p>
	<p> Investor</p>
	<p> Currencies</p>
	</div>
	
	<div class="col-md-2" style="margin-top: 20px;">
	<h6>Contact info</h6>
		<P> <a class="text-white" style="text-decoration: none;" href="tel:+44 (0)7561 113 609">+44 (0)7561 113 609</a></P>
	<P> <a class="text-white" style="text-decoration: none;" href="tel:+44 (0)1383 320 136">+44 (0)1383 320 136</a></P>
	<P> <a class="text-white" style="text-decoration: none;" href="mailto:jordan@jedevereux.com">jordan@jedevereux.com</a></P>
	</div>
	
	<div class="col-md-3" style="margin-top: 20px;">
	<h6>Our portfolio</h6>
	<!--<img src="/assets/images/b4.jpg" style="height: 50px;width: 60px;">
    <img src="/assets/images/b4.jpg" style="height: 50px;width: 60px;">
	<img src="/assets/images/b4.jpg" style="height: 50px;width: 60px;">-->
	<div class="row">
		<?php 
	    $this->db->limit(4);
		$this->db->order_by("files", "desc");
	    $fetch = $this->db->get('portfolio')->result_array();
	    foreach ($fetch as $row) {
	?>
	<div class="col-md-3">
	<a href="/Front/projectdetail/<?php echo $row['id']?>"><img src="<?php echo getThumbnail($row['files']); ?>" style="height: 50px;width: 60px; margin: auto;"></a>	
	</div>	
		<?php }?>
	</div>
	</div>
	
	<div class="col-md-2" style="margin-top: 20px;">	
	<h6>Connect with us</h6>
	<P><a class="text-white" href="https://facebook.com/jeGDevelopments/" target="_blank" style="text-decoration: none;"><i class="fab fa-facebook"></i>  Facebook</a></P>
	
	</div>
	<div class="col-md-1"></div>
</div>
	    
		<div class="row" style="background-color: rgba(54,50,50,0.75);">
		<div class="col-md-12">
		<ul class="nav">
		<li class="nav-item">
		<a class="nav-link text-white" href="<?=base_url()?>">Home</a>
		</li>
		<li class="nav-item">
		<a class="nav-link text-white" href="/Front/about">About</a>
		</li>
		<li class="nav-item">
		<a class="nav-link text-white" href="/Front/blog">Blog</a>
		</li>
		<li class="nav-item ">
		<a class="nav-link text-white" href="/Front/contactus">Contact us</a>
		</li> 
		</ul>
		</div>
		</div>
		
</div>

<?php /*?><script type="text/javascript">
$(function() {
	$('.lazy').Lazy();
});
</script><?php */?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
<!-- bootstrap cdn fontawsome-->	
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">

<script type="text/javascript" async src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d67ca96b7555d36"></script>
