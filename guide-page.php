<?php /* Template Name: Guide Page */ ?>
<?php get_header();?>
  <!-- Banner -->
  <div class="banner">
    <div class="banner-overlay"></div>
    <div class="container">
      <div class="text-center banner-title">
        <h1>Ada Yang Bisa Kami Bantu?</h1>
        <p>Cari tau bagaimana cara berjualan cerdas dengan menggunakan tokopedia</p>
      </div>
      <div class="search-box">
        <div class="search-box-group">
          <input type="text" class="search-form" placeholder="Cari Tau Cara Berjualan Di Tokopedia">
          <button type="submit" class="search-form-submit"></button>
        </div>
      </div>

    </div>

  </div>
  <!-- End Banner -->

<!-- Guide -->
<div class="guide">

  <div class="container">
  <!-- Nav tabs -->
    
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Kenapa Berjualan Di Tokopedia?</a></div>
            <div class="swiper-slide"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Panduan Berjualan Di Tokopedia</a></div>
            <div class="swiper-slide"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Tips Dan Trik Berjualan</a></div>
            <div class="swiper-slide"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Tingkatkan Penjualan Anda</a></div>
            <div class="swiper-slide"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Inspirasi Anda</a></div>
        </div>
   
    </div>
  

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">Home</div>
    <div role="tabpanel" class="tab-pane" id="profile">Profile</div>
    <div role="tabpanel" class="tab-pane" id="messages">Messages</div>
    <div role="tabpanel" class="tab-pane" id="settings">Settings</div>
  </div>
  </div>
  
  

</div>
<!-- End Guide -->




 <?php get_footer();?>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 5,
        centeredSlides: false,
        paginationClickable: true,
        spaceBetween: 5
    });
    </script>