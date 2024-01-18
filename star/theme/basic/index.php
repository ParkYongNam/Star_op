<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
?>
<?php echo latest('pic_swiper','byul_mainswiper',9,1000); ?>


<div class="section ">
    <div class="byul_story">        
        <h2>BYUL<span>Real Story</span></h2>
              <div class="row">
                <div class="col-6">
                    <?php echo latest('pic_bfaf','section_video',9,1000);  ?>
                </div>
                <div class="col-6">

                </div>
              </div>

        </div>
   </div>
   
  
<?php
include_once(G5_THEME_PATH.'/tail.php');