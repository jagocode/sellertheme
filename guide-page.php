<?php /* Template Name: Guide Page */ ?>
<?php get_header();?>
  <!-- Banner -->
  <div class="banner">
    <div class="banner-overlay"></div>
    <div class="container">
      <div class="text-center banner-title">
        <h1>Kembangkan Bisnis Anda Di Tokopedia</h1>
        <p>Cari tau bagaimana cara berjualan cerdas dengan menggunakan tokopedia</p>
        <div class="btn-group" role="group" aria-label="...">
        <a href="" class="btn btn-lg btn-success">Pengguna Baru</a>
        <a href="" class="btn btn-lg btn-orange">Pengguna Lama</a>
        </div>
      </div>
      

    </div>

  </div>
  <!-- End Banner -->



  <div class="container">
  <!-- Nav tabs -->
    <!-- Guide -->
<div class="guide">
  <h4>Panduan Menjadi Seller Tokopedia</h4>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="#home" class="active-guide"><div class="pull-left"><i class="fa fa-question-circle-o icon-big" aria-hidden="true"></i></div>Kenapa Berjualan Di Tokopedia? </a></div>
            <div class="swiper-slide"><a href="#profile"><div class="pull-left"><i class="fa fa-book icon-big" aria-hidden="true"></i></div>Panduan Berjualan Di Tokopedia</a></div>
            <div class="swiper-slide"><a href="#messages" ><div class="pull-left"><i class="fa fa-key icon-big" aria-hidden="true"></i></div>Tips Dan Trik Berjualan</a></div>
            <div class="swiper-slide"><a href="#settings" ><div class="pull-left"><i class="fa fa-line-chart icon-big" aria-hidden="true"></i></div>Tingkatkan Penjualan Anda</a></div>
            <div class="swiper-slide"><a href="#settings" ><div class="pull-left"><i class="fa fa-wpexplorer icon-big" aria-hidden="true"></i></div>Inspirasi Anda</a></div>
        </div>
   
    </div>
  

  
  

</div>
<!-- End Guide -->
</div>

<!-- Guide Feature -->
<div class="container">
  
  <div class="guide-feature">
    <div class="row">
      <div class="col-md-6">
        <img src="https://seller.tokopedia.com/wp-content/uploads/2016/05/mengapa-bisnis-eksistensi-online.jpg" class="img-responsive"></img>
      </div>
      <div class="col-md-6">
        <div class="guide-feature-content">
           <h1>Kenapa Berjualan Di Tokopedia?</h1>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
        sed diam nonummy nibh euismod tincidunt ut laoreet dolore
        magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
        quis nostrud exerci tation ullamcorper suscipit lobortis nisl
        ut aliquip ex ea commodo consequat. </p>
        </div>
       
      </div>
    </div>
</div>
</div>

<!-- End Guide Feature -->
<!-- Hot Topics -->
  <div class="hot-topics">
    <div class="container">
      
      <div class="row">
        <?php 
        $artikel=new WP_Query('posts_per_page=3');
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
        



        <div class="col-md-3">
          <div class="box-grid">
            <div class="text-center">
              <div class="more-topics">
                <img src="<?php images('newspaper.png');?>" alt="">
                <h4><a href="">Lihat Topic Lainnya</a></h4>
              </div>

            </div>
          </div>
        </div>

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