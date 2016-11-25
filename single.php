<?php get_header();?>
<!-- Blog Head -->
<div class="blog-head">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h3><?php the_category( ', ' ); ?></h3>
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

      <?php if(have_posts()):while(have_posts()):the_post();?>
      <?php
      $feature=feature_img_url($post->ID,'full');
      if(!empty($feature)){
        ?>
      <div class="feature-image"> 
          <img src="<?php echo $feature;?>" alt="" class="img-full">
      </div>
      <?php
      }
      ?>
      <h1><?php the_title();?></h1>
       <div class="post-meta">
        <span class="author">By <strong><?php the_author();?></strong></span>, <span class="date"><?php the_time('F j, Y'); ?></span>
      </div>
<!--       <div class="video">
      <iframe width="100%" height="580" src="https://www.youtube.com/embed/b73ylwKhVW8?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      </div> -->
      <?php the_content();?>
      <?php endwhile;else:?>
      
      <?php endif;?>
      
     
     
      
      
      
    </div>
    <div class="post-comments">
       <?php if(gets_meta('sellername') && gets_meta('communityname') && gets_meta('authordesc')): ?>
      <div class="post-author">
       
        
      <h5>SATU IDE DARI <?php print_meta('sellername');?></h5>
         <div class="author-community">
        Komunitas <strong><?php print_meta('communityname');?></strong>, Nama Toko <strong><?php print_meta('shopname');?></strong>
        </div>
        <p><?php print_meta('authordesc');?></p>
      </div>
      <?php endif;?>
      
      
    <?php comments_template();?>
    </div>
  </div>
</div>
<!-- End Main  -->



<?php get_footer();?>