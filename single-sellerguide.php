<?php /* Template Name: Guide Page */ ?>
<?php get_header();?>

  <!-- Head Guide -->
  <div class="head-guide">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2>Saya Ingin Memulai Berjualan Di Tokopedia</h2>
          <p>Temukan panduan bagaimana cara yang tepat berjualan di tokopedia.com</p>
          <a href="" class="btn btn-outline">Lihat Panduan</a>
        </div>
        <div class="col-md-4">
          <img src="<?php echo get_template_directory_uri().'/images/topedshop.png';?>" width="100%"></img>
          
        </div>
        <div class="col-md-4">
          <h2 class="text-right">Saya Ingin Meningkatkan Penjualan Di Tokopedia</h2>
          <p class="text-right">Temukan panduan bagaimana meningkatkan penjualan di tokopedia.com</p>
          <a href="" class="btn btn-outline pull-right">Lihat Panduan</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Head Guide -->



  <div class="container">
  <!-- Nav tabs -->
    <!-- Guide -->
<div class="guide">
  <h4>Panduan Menjadi Seller Tokopedia</h4>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="#home" class="active-guide"><div class="pull-left"><i class="fa fa-question-circle-o icon-big" aria-hidden="true"></i></div>Kenapa Berjualan Di Tokopedia? </a></div>
            <div class="swiper-slide"><a href="#profile"><div class="pull-left"><i class="fa fa-shopping-bag icon-big" aria-hidden="true"></i></div>Pengaturan Toko</a></div>
            <div class="swiper-slide"><a href="#messages" ><div class="pull-left"><i class="fa fa-cube icon-big" aria-hidden="true"></i></div>Pengaturan Produk dan Promosi</a></div>
            <div class="swiper-slide"><a href="#settings" ><div class="pull-left"><i class="fa fa-telegram icon-big" aria-hidden="true"></i></div>Terima & Kirim Pesanan</a></div>
            <div class="swiper-slide"><a href="#settings" ><div class="pull-left"><i class="fa fa-handshake-o icon-big" aria-hidden="true"></i></div>Terima Uang</a></div>
            <div class="swiper-slide"><a href="#settings" ><div class="pull-left"><i class="fa fa-wpexplorer icon-big" aria-hidden="true"></i></div>Pelajari Lebih Lanjut</a></div>
        </div>
   
    </div>
  

  
  

</div>
<!-- End Guide -->
</div>

<!-- Guide Feature -->
<div class="container">
  <?php if(have_posts()):while(have_posts()):the_post();?>
  <div class="guide-feature">
    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo feature_img_url($post->ID,'full')?>" class="img-responsive"></img>
      </div>
      <div class="col-md-6">
        <div class="guide-feature-content">
           <h1><?php the_title();?></h1>
           <?php the_content();?>
        </div>
       
      </div>
    </div>
</div>
<?php endwhile;endif;?>
</div>

<!-- End Guide Feature -->
<!-- Hot Topics -->
  <div class="hot-topics">
    <div class="container">
      
      <div class="row">
        <?php 
        $artikel=new WP_Query('posts_per_page=100&cat='.gets_meta('guide_cat'));
        if($artikel->have_posts()):while($artikel->have_posts()):$artikel->the_post();
        $feature=feature_img_url($post->ID,'full');
        ?>
        <div class="col-md-3">
          <div class="box-grid">
            <div class="box-grid__picture">
              <img src="<?php echo $feature;?>" alt="" class="img-responsive">
            </div>
            <div class="box-grid__descriptions">
              <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
              <?php the_excerpt();?>

            </div>
          </div>
        </div>
        <?php 
        endwhile;endif;
        ?>
        





      </div>
    </div>
  </div>
  <!-- End Hot Topics -->
  <!-- Related Guide -->
  <div class="container">
     <h4 class='related-title'>Artikel Terkait</h4>
      <div class="related-guide">
       
        <div class="row">
          <div class="col-md-6">
            <ul class="related-list">
              <li><a href=""><i class="fa fa-file-text-o" aria-hidden="true"></i> Cara Memposting Produk Di Tokopedia</a></li>
              <li><a href=""><i class="fa fa-file-text-o" aria-hidden="true"></i> Cara Membuat Foto Produk Anda Menarik</a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="related-list">
              <li><a href=""><i class="fa fa-file-text-o" aria-hidden="true"></i> Cara Memposting Produk Di Tokopedia</a></li>
              <li><a href=""><i class="fa fa-file-text-o" aria-hidden="true"></i> Cara Membuat Foto Produk Anda Menarik</a></li>
            </ul>
          </div>
        </div>
      </div>
  </div>
  
  <!-- End Related Guide -->





 <?php get_footer();?>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        centeredSlides: false,
        paginationClickable: true,
        spaceBetween: 30
    });
    </script>