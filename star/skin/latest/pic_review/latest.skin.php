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

<div class ="review_img">
    <div class="wrap " style="height:435px;">
         <div class="low">
             <div class="large-8 columns">
                 <div class="twentytwenty-wrapper twentytwenty-horizontal" style="display:flex; justify-content:center; align-items:center;">
                     <div class="twentytwenty-container" style="height:490px; width:400px; padding-right:5rem">

        <?php

  

for ($i=0; $i<1; $i++) {
    
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
           ?>"  class='<?php echo $j === 0 ? "twentytwenty-before" : "twentytwenty-after" ?>' 
           style="<?php echo $j === 0 ? 'clip: rect(0px, 177.156px, 364px, 0px)' : 'clip: rect(0px, 317px, 364px, 177.156px)' ?> " >
          
           <?php
           }
          
         }
        }
   
?>
        


 

  




                       <div class="twentytwenty-handle" ></div>
                </div>
                <div class="flex-grow-1" style="max-width:600px;">
                    <div style="margin-bottom:1rem;">
                        <div class="wr_content" style="font-size:19px; text-align:center; font-weight:700;"><?php echo $list[$i]['wr_content']; ?></div>
                        <div class="mini_0" style="text-align: center;" >
                            <a href="https://byulstar.com/front/realself/list.php">
                                  <img src="<?php echo G5_IMG_URL ?>/Review_button.jpg" alt="">
                         </a>
                        </div>
                    </div> 
                    <div class="event-navBtn" data-ex="동적객체로 썸네일생성" > </div>
               </div>
       
      </div> <!--row-->
        
    </div>
</div>



    <script src="<?php echo G5_URL;?>/twentytwenty2/js/jquery.event.move.js"></script>
    <script src="<?php echo G5_URL;?>/twentytwenty2/js/jquery.twentytwenty.js"></script>

    


    <script type="text/javascript">
$(function () {
    var eventNav = new function () {
        this.setIntervalTimer;
        this.setPausedTimeout;
        this.resumeTimer;
        this.resumeTime = 2500;
        this.interval = 2500;
        this.currentIdx = 0;

        this.start = function () {
            var _self = this;

            this.goRight();
        }
        this.direction;
        this.goRight = function () {
            var _self = this;

            this.direction = 'right';

            var $twentyContainer = $('.twentytwenty-container');
            $('.twentytwenty-handle').stop().animate({
                left: $twentyContainer.width(),
            }, {
                duration: 2000,
                easing: 'linear',
                step: function (now, fx) {
                    $('.twentytwenty-before').css({
                        clip: 'rect(0px, ' + now + 'px, ' + $twentyContainer.height() + 'px, 0px)',
                    })
                    $('.twentytwenty-after').css({
                        clip: 'rect(0px, ' + $twentyContainer.width() + 'px, ' + $twentyContainer.height() + 'px, ' + now + 'px)',
                    })
                },
                complete: function () {
                    _self.onCompleteSlide();
                },
            });

        }
        this.onCompleteSlide = function () {
            if (this.direction == 'right') {
                this.goLeft();
            } else {
                this.goRight();
            }
        }
        this.goLeft = function () {
            var _self = this;
            this.direction = 'left';

            var $twentyContainer = $('.twentytwenty-container');
            $('.twentytwenty-handle').stop().animate({
                left: 0,
            }, {
                duration: 2000,
                easing: 'linear',
                step: function (now, fx) {


                    $('.twentytwenty-before').css({
                        clip: 'rect(0px, ' + now + 'px, ' + $twentyContainer.height() + 'px, 0px)',
                    })
                    $('.twentytwenty-after').css({
                        clip: 'rect(0px, ' + $twentyContainer.width() + 'px, ' + $twentyContainer.height() + 'px, ' + now + 'px)',
                    })
                },
                complete: function () {
                    _self.onCompleteSlide();
                },
            });
        }
        this.pause = function () {
            this.stop();

            if (this.setPausedTimeout) {
                clearTimeout(this.setPausedTimeout);
            }
            this.setPausedTimeout = setTimeout(function () {
                eventNav.start();
            }, this.resumeTime);
        }
        this.stop = function () {
            $('.twentytwenty-handle').stop()
        }
    };
    eventNav.start();


    $('.twentytwenty-handle').on('mouseover touchstart touchmove', function () {
        eventNav.stop();
    }).on('mouseleave touchend', function () {
        eventNav.start();
    });

    var baImage = [
    <?php 
        for ($i = 0; $i < $list_count; $i++) {
            $thumbs = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);
            if ($thumbs['ori']) {
                $img = $thumbs['ori'];
            } else {
                $imgs = G5_IMG_URL.'/no_img.png';
                $thumbs['alt'] = '이미지가 없습니다.';
            }

            $list[$i]['file'] = get_file($bo_table, $list[$i]['wr_id']); // 첨부파일들
            
            // Initialize an empty array to store thumbnails for the current item
            $thumbnailArray = [];

            for ($t = 0; $t < count($list[$i]['file']); $t++) {
                $tarray = thumbnail($list[$i]['file'][$t]['file'], $board_file_path, $board_file_path, $thumb_width,'', false,true);
                if (!empty($tarray)) {
                    // Add the thumbnail URL to the array
                    $thumbnailArray[] = $board_file_url . "/" . thumbnail($list[$i]['file'][$t]['file'], $board_file_path, $board_file_path, $thumb_width,'', false,true);
                }
            }

            // Output the array of thumbnails for the current item
            echo json_encode($thumbnailArray);

            // Add a comma if this is not the last item
            if ($i < $list_count - 1) {
                echo ",";
            }
        }
    ?>
];


    var eventThumb = "";

    for(var x in baImage){
        eventThumb +=`<div  class="event-nav" ><img src="${baImage[x][0]}"  /></div>`  
    }
    

    $(".event-navBtn").html(eventThumb)

    $(".event-nav").on("click", function () {
        $(".event-nav").removeClass("event-nav-active")
        $(this).addClass("event-nav-active")   
        
        $(".twentytwenty-container").find(".twentytwenty-before").attr("src", baImage[$(this).index()][0]);
        $(".twentytwenty-container").find(".twentytwenty-after").attr("src", baImage[$(this).index()][1]);        
    });

})
</script>

<style>



.ba-container {
    width:100%;
    height: 600px;
    background: #f1f1f1;
    padding: 2px 0 6px 0;
}
.evnetPage-wrap {
    max-width:1064px;
    margin: 0 auto;
    position: relative;
	margin-left: 26px;
	top: -39px;

}
    .ba-wrap {
    width:376px;
    height:435px;
    /*background: #fff;*/
    margin: 0px auto;
    position: relative;
	margin-top: 126px;
}



.event-navBtn{
    text-align: center;
}
.event-nav {
    
    transition: .3s;
    cursor: pointer;
}

.event-nav img{
    width: 97px;
    height: 113px;
    
    /*border-radius: 100px;*/
    float: left;
    /*margin: 25px 3px;*/
	margin: 2px 2px 0px 0px;
    transition: .3s;
    cursor: pointer;
}

.event-nav-active {
	background-color: #a89a6d;
        opacity: 0.3;
    /*width:27px;*/
   
    cursor: default;
	
}






/***********BEFORE AFTER ***************/










.event-container {
    padding: 100px 0;
    background: #f2f2f4;
}

.event-title {
    text-align: left;
    font-size: 45px;
    line-height: 55px;
    color: #333;
    padding-bottom: 50px;
    display: inline-block;
}

.event-rec-top {
    text-align: left;
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
}
.arrow-leftbtn {
    position: absolute;
    right: 90px;
    bottom: 50px;
}
.arrow-rightbtn {
    position: absolute;
    right: 30px;
    bottom: 50px;
}
.arrow-btn img:last-child {
    margin-left: 20px;
}


.event-carousel {
    position: relative;
    width:100%;
    height: 400px;
    overflow: hidden;
}

.event-carousel ul {
    width:100%;
    height:100%;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.event-carousel ul li {
    width:280px; 
    height:400px;
    display:inline-block;
    text-align: center;
    position: absolute;
    cursor: pointer;
    transition: .3s all;
}
.event-carousel ul li:hover {
    background: #333;
    transition: .3s all;
}
.event-carousel ul li:hover .carousel-title{
    color:#fff;
}


.carousel-title{
    font-size: 20px;
    color: #333;
    line-height: 25px;
    padding: 55px 0 30px 20px;
    text-align: left;
}
.event-carousel ul li:nth-child(2){
    left: 300;
}
.event-carousel ul li:nth-child(3){
    left: 600;
}
.event-carousel ul li:nth-child(4){
    left: 900;
}
.event-carousel ul li:nth-child(5){
    left: 1200;
}








.event-rec {
    width:280px;
    height: 400px;
    background: #fff;
    display: inline-block;
    margin-right: 20px;
    cursor: pointer;
    transition: .3s ease;
    text-align: center;
    
}
.event-rec img {
    transition: 1s ease;
}
.event-rec:hover {
    background: #333;
    color: #fff;
    transition: .3s ease;
}





.event-rec-title {
    font-family: SourceHanSansK;
    font-size: 20px;
    font-weight: 300;
    text-align: left;
    padding: 50px 0 29px 19px;
    line-height: 30px;
}
</style>


