<section id="thepowernetgroup-Footer">
<div class="container">
	<div class="row">
    
	<div class="social">
            <ul class="social_icons text-center">
              <li class="facebook"><a href="#">facebook</a></li>
              <li class="twitter"><a href="#">twitter</a></li>
             <li class="insta"><a href="#">insta</a></li>
             <li class="youtube"><a href="#">youtube</a></li>
            <li class="pin"><a href="#">pintrest</a></li>
         </ul>
     </div>
     
     
     <p>© 2017 <b>Rural WIFI</b> All Rights Reserved.Designed by <a href="<?php echo home_url(); ?>" target="_blank"><b>Mywebsite.com
        </b></a></p>
     
	</div>
</div>

</section>

<!--Required js --> 
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.3.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap-dropdown-on-hover.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootsnav.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>




<script>
    $(document).ready(function() {
        $('.item:first').addClass('active');
    });
$(window).scroll(function() {
    if ($(this).scrollTop() > 214){  
        $('.navbar').addClass("sticky");
    }
    else{
        $('.navbar').removeClass("sticky");
    }
});
</script>
<style>
.sticky {position: fixed;width: 100%;z-index:9999; top:0px; 

background-color:#fff;}
</style>

<?php wp_footer(); ?>
</body>
</html>