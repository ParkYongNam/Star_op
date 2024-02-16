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
    <div class="ba-wrap " style="height:435px;">
         <div class="row">
             <div class="large-8 columns">
                 <div class="twentytwenty-wrapper twentytwenty-horizontal">
                     <div class="twentytwenty-container" style="height:600px">

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
           ?>"  class='<?php echo $j === 0 ? "twentytwenty-before" : "twentytwenty-after" ?>' 
           style="<?php echo $j === 0 ? 'clip: rect(0px, 177.156px, 364px, 0px)' : 'clip: rect(0px, 317px, 364px, 177.156px)' ?>" >
          
           <?php
           }
          
         }
   
?>
        


  <?php }  ?>

  




                       <div class="twentytwenty-handle" ></div>
                </div>
            </div>
            <div class="event-navBtn" >



            <div  class="event-nav event-nav-active"> <img src="https://byulstar.com/front/images/20200828/1.jpg"></div>
            <div  class="event-nav"> <img src="https://byulstar.com/front/images/20200828/2.jpg" /></div>
            <div  class="event-nav"> <img src="https://byulstar.com/front/images/20200828/3.jpg"  /></div>
            <div  class="event-nav"> <img src="https://byulstar.com/front/images/20200828/4.jpg"  /></div>
            <div  class="event-nav"> <img src="https://byulstar.com/front/images/20200828/5.jpg"  /></div>
            <div  class="event-nav"> <img src="https://byulstar.com/front/images/20200828/6.jpg"  /></div>
            <div  class="event-nav"> <img src="https://byulstar.com/front/images/20200828/7.jpg"  /></div>
            <div  class="event-nav"> <img src="https://byulstar.com/front/images/20200828/8.jpg"  /></div>
            <div  class="event-nav"> <img src="https://byulstar.com/front/images/20200828/9.jpg"  /></div>
            <div  class="event-nav"> <img src="https://byulstar.com/front/images/20200828/10.jpg"  /></div>
            <div  class="event-nav"> <img src="https://byulstar.com/front/images/20200828/11.jpg"  /></div>
            <div  class="event-nav"> <img src="https://byulstar.com/front/images/20200828/12.jpg"  /></div>
            <div  class="event-nav"> <img src="https://byulstar.com/front/images/20200828/13.jpg"  /></div>
            <div  class="event-nav"> <img src="https://byulstar.com/front/images/20200828/14.jpg"  /></div>
            <div  class="event-nav"> <img src="https://byulstar.com/front/images/20200828/15.jpg"  /></div>
            <div  class="event-nav" > <img src="https://byulstar.com/front/images/20200828/16.jpg"  /></div>




        </div>
        <div class="mini_0" >
        <a href="https://byulstar.com/front/realself/list.php"><img src="https://byulstar.com/front/images/20200828/20200831_but.jpg"></a>
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
        ["https://byulstar.com/front/images/20200828/1.jpg",
        "https://byulstar.com/front/images/20200828/1_1.jpg"],
        ["https://byulstar.com/front/images/20200828/2.jpg",
        "https://byulstar.com/front/images/20200828/2_1.jpg"],
        ["https://byulstar.com/front/images/20200828/3.jpg",
        "https://byulstar.com/front/images/20200828/3_1.jpg"],
        ["https://byulstar.com/front/images/20200828/4.jpg",
        "https://byulstar.com/front/images/20200828/4_1.jpg"],
        ["https://byulstar.com/front/images/20200828/5.jpg",
        "https://byulstar.com/front/images/20200828/5_1.jpg"],
        ["https://byulstar.com/front/images/20200828/6.jpg",
        "https://byulstar.com/front/images/20200828/6_1.jpg"],
        ["https://byulstar.com/front/images/20200828/7.jpg",
        "https://byulstar.com/front/images/20200828/7_1.jpg"],
        ["https://byulstar.com/front/images/20200828/8.jpg",
        "https://byulstar.com/front/images/20200828/8_1.jpg"],
        ["https://byulstar.com/front/images/20200828/9.jpg",
        "https://byulstar.com/front/images/20200828/9_1.jpg"],
        ["https://byulstar.com/front/images/20200828/10.jpg",
        "https://byulstar.com/front/images/20200828/10_1.jpg"],
        ["https://byulstar.com/front/images/20200828/11.jpg",
        "https://byulstar.com/front/images/20200828/11_1.jpg"],
        ["https://byulstar.com/front/images/20200828/12.jpg",
        "https://byulstar.com/front/images/20200828/12_1.jpg"],
        ["https://byulstar.com/front/images/20200828/13.jpg",
        "https://byulstar.com/front/images/20200828/13_1.jpg"],
        ["https://byulstar.com/front/images/20200828/14.jpg",
        "https://byulstar.com/front/images/20200828/14_1.jpg"],
        ["https://byulstar.com/front/images/20200828/15.jpg",
        "https://byulstar.com/front/images/20200828/15_1.jpg"],
        ["https://byulstar.com/front/images/20200828/16.jpg",
        "https://byulstar.com/front/images/20200828/16_1.jpg"]

    ];


   
 
    

    // var imgTarget = $(".twentytwenty-container").find("img:first").attr("src");

    

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


