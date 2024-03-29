<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 210;
$thumb_height = 150;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>
<style>
  .byul_swiper<?php echo $bo_table; ?> .swiper-wrapper {
  }
</style>
<div class="headText byul_story mb-5">
  <?php
     $titlearr = explode( '_', $bo_subject );
  ?>
                <h2 ><?php echo  $titlearr[0]."<span>".$titlearr[1]."</span>" ?></h2>
 </div>
<div class="swiper mySwiper byul_swiper<?php echo $bo_table;?>">
  
<div class="swiper-wrapper ">
    <?php
    for ($i=0; $i<$list_count; $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['ori'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
    $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
    ?>
        <div class="swiper-slide">
            <a href="<?php echo $wr_href; ?>" class="lt_img"><?php echo run_replace('thumb_image_tag', $img_content, $thumb); ?></a>
        </div>

    <?php }  ?>
  
    </div> 
    <div class="swiper-pagination mb-3"></div> 
</div>

<script>
  
    
    const swiper<?php echo $bo_table;?> = new Swiper(".byul_swiper<?php echo $bo_table;?>", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".byul_swiper<?php echo $bo_table;?> .swiper-pagination",
        clickable: true
      },
    });
  </script>
