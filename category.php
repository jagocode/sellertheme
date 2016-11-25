
<?php
$events=new WP_Query(array('post_type'=>'events'));
$dir = dirname(__FILE__).'/js/events.json';
$eventfile=fopen($dir,'w');
$countevent= $events->post_count;
$eventtext='{ "monthly": [';

if($events->have_posts()):while($events->have_posts()):$events->the_post();

$eventdate=gets_meta('eventdate');
$eventstart=gets_meta('eventstart');
$eventend=gets_meta('eventend');
$eventdateconv=date_create($eventdate);
$tglevent=date_format($eventdateconv,'Y-m-d');
$mulaievent=explode(' ',$eventstart);
$akhirevent=explode(' ',$eventend);

$eventtext.='{ "id": '.$post->ID.', "name": "'.get_the_title().'", "startdate": "'.$tglevent.'", "enddate": "'.$tglevent.'", "starttime": "'.$mulaievent[0].'", "endtime": "'.$akhirevent[0].'", "color": "#42b549", "url": "'.get_the_permalink().'" }';

$flag++;
if($flag<$countevent){
  $eventtext.=',';
}else{
  $eventtext.=' ';
}
endwhile;endif;



$eventtext.= ' ] }';


fwrite($eventfile,$eventtext);
fclose($eventfile);
?>
<?php /* Template Name: Front Page */ ?>
<?php get_header();?>
  <!-- Banner -->
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
  <!-- End Banner -->
  <!-- Hot Topics -->
  <div class="hot-topics">
    <div class="container">
      <h3>Artikel Terbaru | <span class="sub-title">Segala yang Baru Ada Disini</span></h3>
      <div class="row">
        <?php 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $artikel=new WP_Query(array(
   'posts_per_page' => 4,
   'paged' => $paged
));
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
        endwhile;
        ?>

        
        <?php
        endif;
        ?>
                




      </div>
      <?php sc_pagination($artikel->max_num_pages);?>
    </div>
  </div>
  <!-- End Hot Topics -->

  
 
 <?php get_footer();?>


<script src="<?php set_js('calendarcontroller.js');?>"></script>
