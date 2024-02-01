<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨

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

 <div class="<?php echo $bo_table."inimgdiv" ?>">
    <?php
    for ($i=0; $i<$list_count; $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['ori'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'"  style="width:100%" >';
    $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
    ?>
    <?php if($i === $list_count - 1 ){?>
      <div  class="video1<?php $bo_table.$i ?> col-12 px-0"   >
     
        <div style="height:0; padding-top:90%; position:relative; ">
        
        <iframe 
        style = "width: 100%; position: absolute; left:0; right:0; top:0; height:100%;"  
        src="https://www.youtube.com/embed/<?php echo $list[$i]['wr_subject']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
      <?php }else{ ?>
        <div class="in11 col-3 px-0"  >
                <?php echo run_replace('thumb_image_tag', $img_content, $thumb); ?>
        </div> 
      <?php  } ?>

         
        
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>

    <?php }  ?>
    </div>
    