<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


$thumb_width = 210;
$thumb_height = 150;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

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
            <?php
         

            // echo "<a href=\"".$wr_href."\"> ";
            // if ($list[$i]['is_notice'])
            //     echo "<strong>".$list[$i]['subject']."</strong>";
            // else
            //     echo $list[$i]['subject'];
            // echo "</a>";
			
		


            ?>

          
</div>

    <?php }  ?>
    <div class="swiper-pagination"></div>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <p class="empty_li">게시물이 없습니다.</p>
    <?php }  ?>
  
    </div>
   

</div>

<script>
    let btnnm = [];
     <?php
    for ($i=0; $i<$list_count; $i++) { ?>
       btnnm[$i] = "<?php echo $list[$i]['subject']; ?>"
    <? } ?>
    var swiper = new Swiper(".byul_swiper<?php echo $bo_table;?>", {
      pagination: {
        el: ".byul_swiper .swiper-pagination",
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + btnnm[index] + "</span>";
        },
      },
    });
  </script>
