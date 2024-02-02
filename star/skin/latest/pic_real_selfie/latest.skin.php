<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 210;
$thumb_height = 150;
$list_count = (is_array($list) && $list) ? count($list) : 0;
$board_file_path = G5_DATA_PATH . '/file/' . $bo_table;
$board_file_url = G5_DATA_URL . '/file/' . $bo_table;


?>

<style>
  .byul_swiper<?php echo $bo_table; ?> .swiper-wrapper {
  }
</style>

<div class="swiper mySwiper byul_swiper<?php echo $bo_table;?>">
  
<div class="swiper-wrapper ">
    <?php
    for ($i=0; $i<$list_count; $i++) {

    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);
     //두번쨰 첨부파일까지 출력

 
    
    

    if($thumb['src']) {
        $img = $thumb['ori'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
    $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
    ?>
        <div class="swiper-slide mx-auto container ">
            <ul  class="selfie_gnb ">
              <?php
               $list[$i]['file'] = get_file($bo_table, $list[$i]['wr_id']);
               
                  for($j =0; $j < count($list[$i]['file']); $j++){
                     $imgarray = thumbnail($list[$i]['file'][$j]['file'], $board_file_path, $board_file_path, $thumb_width,'', false,true);
                    if(!empty($imgarray)){
                    ?>
                    <li >
                      <img src="<?php
                    echo $board_file_url . "/" . thumbnail($list[$i]['file'][$j]['file'], $board_file_path, $board_file_path, $thumb_width,'', false,true);
                    ?>" >
                    </li>
                    <?php
                    }
                   
                  }

              ?>
            </ul>
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
