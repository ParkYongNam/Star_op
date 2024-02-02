<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
?>
<?php echo latest('pic_swiper','byul_mainswiper',9,1000); ?>


<div class="section container py-5 my-5">
    <div class=""> 
   
        </div>
              <div class="row inimg mx-0">
                <div class="col-6 row mx-0">
                    <?php echo latest('pic_bfaf','section_video',9,1000);  ?>
                </div>
                <div class="col-6">
                <?php echo latest('pic_swiper_bfaf','section_bfaf',6,1000);  ?>
                <?php echo latest('pic_swiper_bfaf2','section_bfaf2',6,1000);  ?>
                <?php echo latest('pic_swiper_bfaf2','section_bfaf3',6,1000);  ?>                
                </div>
              </div>
                <div class="section_lastText">
                    <span >수술은 특정한 결과를 보장할 수 없으며 결과는 다양할 수 있습니다</span>
                </div>
        </div>
        
   </div>
<div class="section_RealSelfie">
    <h2>REAL SELFIE</h2>
    <div>
        <?php echo latest('pic_real_selfie','section_real_selfie',3,1000); ?>
    </div>
</div>
  
<?php
include_once(G5_THEME_PATH.'/tail.php');