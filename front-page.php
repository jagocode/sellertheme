
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
  <!-- Hot Topics -->
  <div class="hot-topics">
    <div class="container">
      <h3>Artikel Terbaru | <span class="sub-title">Segala yang Baru Ada Disini</span></h3>
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

  <!-- Topics -->
  <div class="topics">
    <div class="container">
      <h3>Topik Untuk Anda | <span class="sub-title">Kembangkan Usaha Menjadi Besar</span></h3>
      <div class="topic-list">
        <ul>
          <li>
            <a href="">
                <img src="<?php images('certificate.png');?>" alt="">
                <p>Branding</p>
                </a>
          </li>
          <li>
            <a href="">
                <img src="<?php images('browser.png');?>" alt="">
                <p>Marketing</p>
                </a>
          </li>
          <li>
            <a href="">
                <img src="<?php images('pie-chart.png');?>" alt="">
                <p>Management</p>
                </a>
          </li>
         
          <li>
            <a href="">
                <img src="<?php images('wallet.png');?>" alt="">
                <p>Keuangan</p>
                </a>
          </li>
          <li>
            <a href="">
                <img src="<?php images('camera.png');?>" alt="">
                <p>Fotografi</p>
                </a>
          </li>
          
          <li>
            <a href="">
                <img src="<?php images('agenda.png');?>" alt="">
                <p>Others</p>
                </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Topics -->
  <!-- Event -->
  <div class="event">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>Event Kami</h3>
          <div class="calendar">
            <div id="mycalendar"></div>
          </div>

        </div>
        <div class="col-md-6">
          <h3>Seller Of The Week</h3>
          <?php $sotws=new WP_Query(array('post_type'=>'sotw','posts_per_page'=>'1'));
          if($sotws->have_posts()):while($sotws->have_posts()):$sotws->the_post();
          ?>
          <div class="sotm-box">
            <div class="sotm-picture">
              <img src="<?php echo feature_img_url($post->ID,'full');?>" alt="" class="img-responsive">
            </div>
            <div class="sotm-description">
              <h4><?php the_title();?></h4>
              <?php the_excerpt();?>
              
              <div class="clearfix">
              <div class="pull-right">
                <a href="" class="">Cek Siapa Saja Yang Menjadi Seller Of The Week</a>
                </div>
              </div>
              
            </div>
          </div>
          <?php endwhile;endif;?>
        </div>
      </div>
    </div>
  </div>
  <!-- End Event -->
 <?php get_footer();?>


<script src="<?php set_js('calendarcontroller.js');?>"></script>
