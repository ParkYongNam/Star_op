<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
// add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/twentytwenty.css">',0);

$thumb_width = 297;
$thumb_height = 212;
$list_count = (is_array($list) && $list) ? count($list) : 0;
$board_file_path = G5_DATA_PATH . '/file/' . $bo_table;
$board_file_url = G5_DATA_URL . '/file/' . $bo_table;

?>



    <div class="review_img " style="height:435px;">
        <div class="reviewimg twentytwenty-container" style="position:relative overflow: hidden;" >
    <?php

  

    for ($i=0; $i<$list_count; $i++) {
        
        $img_link_html = '';
        
        $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);

     
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

            if($thumb['ori']) {
                $img = $thumb['ori'];
            } else {
                $img = G5_IMG_URL.'/no_img.png';
                $thumb['alt'] = '이미지가 없습니다.';
            }
            $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
            $img_link_html = '<a href="'.$wr_href.'" class="lt_img" >'.run_replace('thumb_image_tag', $img_content, $thumb).'</a>';

            $list[$i]['file'] = get_file($bo_table, $list[$i]['wr_id']);
            for($j =0; $j < count($list[$i]['file']); $j++){
                $imgarray = thumbnail($list[$i]['file'][$j]['file'], $board_file_path, $board_file_path, $thumb_width,'', false,true);
               if(!empty($imgarray)){
               ?>
            
                 <img src="<?php
               echo $board_file_url . "/" . thumbnail($list[$i]['file'][$j]['file'], $board_file_path, $board_file_path, $thumb_width,'', false,true);
               ?>"  class='<?php echo $j === 0 ? "twentytwenty-before" : "twentytwenty-after" ?>' style="max-width: 100%;
               position: absolute;
               top: 0;
               left:0;
               width:%;
               display: block;" >
              
               <?php
               }
              
             }
       
    ?>
  
  
      <?php }  ?>
             
      

        </div>

      
    </div>
    <script src="<?php echo G5_URL;?>/twentytwenty2/js/jquery.event.move.js"></script>
    <script src="<?php echo G5_URL;?>/twentytwenty2/js/jquery.twentytwenty.js"></script>

    <script>
        $(function () {




    // Function to handle autoplay
    var startAutoplay = function() {
        var intervalId = setInterval(function() {
            var $container = $('.reviewimg'); // Select the first .reviewimg container
            var sliderPct = $container.find('.twentytwenty-handle').position().left / $container.width();
            var newSliderPct = (sliderPct >= 1) ? 0 : sliderPct + 0.01; // Increment the slider position
            $container.twentytwenty('adjustSlider', newSliderPct); // Adjust the slider position
        }, 3000); // Change image every 3 seconds

        // Pause autoplay when mouse enters the container
        $('.reviewimg').on('mouseenter', function() {
            clearInterval(intervalId);
        });

        // Resume autoplay when mouse leaves the container
        $('.reviewimg').on('mouseleave', function() {
            startAutoplay();
        });
    };

    // Initialize TwentyTwenty plugin on .reviewimg elements
    $('.reviewimg').twentytwenty({ default_offset_pct: 0 });

    // Start autoplay
    startAutoplay();




// $(".reviewimg").twentytwenty();

// // Set autoplay interval
// var autoplayInterval = setInterval(function() {
//     $(".reviewimg").twentytwenty("move", 1); // Move to the next image
// }, 3000); // Change image every 3 seconds

// // Pause autoplay when mouse enters the comparison container
// $(".reviewimg").on("mouseenter", function() {
//     clearInterval(autoplayInterval);
// });

// // Resume autoplay when mouse leaves the comparison container
// $(".reviewimg").on("mouseleave", function() {
//     autoplayInterval = setInterval(function() {
//         $(".reviewimg").twentytwenty("move", 1); // Move to the next image
//     }, 3000); // Change image every 3 seconds
// });


// // var moviestick = 0;
// // setInterval(()=>{
// //     moviestick += 0.01;  // 0~1
// //     $('.reviewimg').twentytwenty({ default_offset_pct : moviestick });
// // }, 100)

// console.log($('.reviewimg').twentytwenty)


          
        })
    </script>




