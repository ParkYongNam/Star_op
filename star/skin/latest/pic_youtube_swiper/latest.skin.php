<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 210;
$thumb_height = 150;
$list_count = (is_array($list) && $list) ? count($list) : 0;



?>

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
        <div class="swiper-slide d-flex">  
          <?php 
           $subjectarr =  explode( '/', $list[$i]['subject'] );
          
          for($j=0; $j< count($subjectarr); $j++){?>
          <div class="col-md-3">
              <iframe  width="100%" src="https://www.youtube.com/embed/<?php echo $subjectarr[$j]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          </div>
          <?php } ?>
        </div>
 
    <?php }  ?>
    </div>
  
    </div> 
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<script>
 
  
    const swiper<?php echo $bo_table;?> = new Swiper(".byul_swiper<?php echo $bo_table;?>", {
      spaceBetween: 30,
      navigation: {
    nextEl: '.swiper.<?php echo $bo_table; ?> .swiper-button-next',
    prevEl: '.swiper.<?php echo $bo_table; ?> .swiper-button-prev',
  },
    });
  </script>
