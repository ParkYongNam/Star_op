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
<div class="section_RealSelfie mb-5">
    <h2>REAL SELFIE</h2>
    <div>
        <?php echo latest('pic_real_selfie','section_real_selfie',3,1000); ?>
    </div>
</div>


  <div class="section_Review mb-3">
    <div class="Review_content  ">
        <div class="Review_img">
          
          <?php echo latest('pic_review','Review_img', 16, 1000); ?>
     
        </div>
    
    </div>  
  </div>


<div class="youtube_section">
    <div class="video_wrap mb-3">
      <?php echo latest('pic_youtube_swiper','youtube_section',2,1000); ?>
    </div>
    <div class="video_wrap">
    <?php echo latest('pic_youtube_swiper2','youtube_section2',2,1000);?>
    </div>

</div>

<div id="section_qc">
<div class="quick_consult_top"></div>
  <div class="quick_consult col-lg-6 col-md-10 mx-auto">

      <form id="qcf" action="<?php echo G5_BBS_URL;?>/write_update.php" method="post"  onsubmit="return checkFrm(this);">
      <input type=hidden   name=w        value="">
         <input type="hidden" name="token" value="<?php echo get_write_token('myform'); ?>"> 
         <!-- myform 게시판명 -->
        <input type=hidden name=bo_table value="myform">
         <input type=hidden name=wr_id    value="">
         <input type=hidden name=sca      value="">
         <input type=hidden name=sfl      value="">
         <input type=hidden name=stx      value="">
         <input type=hidden name=spt      value="">
         <input type=hidden name=sst      value="">
         <input type=hidden name=sod      value="">

         <input type=hidden name=wr_subject  value="빠른 상담 신청">
        <input type=hidden name=wr_content  value="빠른 상담 신청">


        <div class="inner d-flex ">
          <ul>
            <li class="qce_qc2 d-flex align-items-center">
              <label>
                <input type="text" name="wr_name" id="qc_name" placeholder="이름">
              </label>
            </li>
            <li class="qce_qc3 d-flex align-items-center mx-5">
                <label style="padding-left:0.5rem;">
                  <input type="text" name="wr_1" id="qc_tel" _onkeypress="return numkeyCheck(event)">
                </label>
            </li>
            <li class="qce_qc1">
              <label>
                <input type="radio" name="wr_2" vaule="phone" checked></input>
                "전화상담"
              </label>
              <label>
                <input type="radio" name="wr_2" vaule="kakao"></input>
                "카톡상담"
              </label>
              <p class="qc_agree">
                <label>
                  <input type="checkbox" vaule="check"  name="wr_6" require  id="qc_agree"></input>
                  "개인정보취급방침에 동의합니다."
                </label>
              </p>
            </li>
          </ul>
          <button type="submit" class="btn mx-3" >
            <span style="color:#fff;">상담요청</span>
</button>
        </div>
      </form>

  </div>

</div>
<div class="main_end"></div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var quick_consult_effect = 0;
    var scrollEle_qc = $('.quick_consult_top').offset().top;
    var width_size = $(window).outerWidth();

    var qc_scrollset = function() {
        var scrollPresent = $(document).scrollTop();
        var windowHeight = $(window).height();
        var scrollEff = (scrollEle_qc - windowHeight) + 100;
        if (scrollPresent >= scrollEff && quick_consult_effect == 1) {
            $('.quick_consult').removeClass('quick_fixed');
            quick_consult_effect = 0;
        } else if (scrollPresent < scrollEff && quick_consult_effect == 0) {
            $('.quick_consult').addClass('quick_fixed');
            quick_consult_effect = 1;
        }
    };

    $(window).on('resize', function() {
        scrollEle_qc = $('.quick_consult_top').offset().top;
    });

    $(document).scroll(function() {
        qc_scrollset();
    });

    qc_scrollset();

    
});
</script>
<script type="text/javascript">
      
      function checkFrm(obj) {
         if(obj.wr_6.checked == false) {
            alert('개인정보 활동동의에 체크해주세요.');
            obj.wr_6.focus();
            return false;
         }
      }


</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');