<?php get_header();?>
<!-- Blog Head -->
<div class="blog-head">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h3>Tokopedia Seller Center</h3>
      </div>
      <div class="col-md-5"></div>
      <div class="col-md-3">
        <div class="search-blog">
          <form action="/" method="get">
            <input type="text" name="s" id="" class="search-blog-form" placeholder="Cari Artikel Anda" value="<?php the_search_query();?>">
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Blog Head -->

<!-- Main -->
<div class="main">
  <div class="container">
    <div class="main-post">
      <div class="search-head">
        <h1>Hasil Pencarian</h1>
        <h5 class="search-title">
<?php echo $wp_query->found_posts; ?> <?php _e( 'Hasil Pencarian Tentang ', 'locale' ); ?>: "<?php the_search_query(); ?>"
</h5>
      </div>

      <?php if(have_posts()):while(have_posts()):the_post();?>


      <h4><a href="<?php the_permalink()?>"><?php the_title();?></a></h4>
      <?php the_content();?>
      <div class="post-meta small">
        <span class="author ">By <strong><?php the_author();?></strong></span>, <span class="date"><?php the_time('F j, Y'); ?></span>
      </div>

      
      <?php endwhile;else:?>
     <p>Tidak menemukan apa yang anda cari?</p>
      <?php endif;?>






    </div>

  </div>
</div>
<!-- End Main  -->



<?php get_footer();?>