<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가



if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}


include_once(G5_THEME_PATH.'/head.php');
?>

<h2 class="sound_only">최신글</h2>


<div class="swiper mySwiper" id="byul_swiper">
    <div class="swiper-wrapper ">
      <div class="swiper-slide"><a href="/front/eye/eye_2.php"><img src="//byulstar.com/front/images/renewal/new_eyerolling2.jpg" alt="" data-alt-src="//byulstar.com/front/images/renewal/new_eyerolling2.jpg"></a></div>
      <div class="swiper-slide"><a href="/front/safety/byul_safety.php"><img src="//byulstar.com/front
/images/renewal/new_anesthesiaorolling_2.jpg" alt=""></a></div>
      <div class="swiper-slide"><a href="/front/nose/nose_4.php?"><img src="//byulstar.com/front
/images/renewal/new_noserolling.jpg" alt="" data-alt-src="//byulstar.com/front
/images/renewal/new_noserolling.jpg"></a></div>
      <div class="swiper-slide"><a href="/front/renose/renose_1.php"><img src="//byulstar.com/front
/images/renewal/new_REnoserolling.jpg" alt="" data-alt-src="//byulstar.com/front
/images/renewal/new_REnoserolling.jpg"></a></div>

      <div class="swiper-slide"><a href="/front/reeye/reeye_1.php"><img src="//byulstar.com/front
/images/renewal/new_reeye_1.jpg" alt=""></a></div>
      <div class="swiper-slide"><a href="/front/nose/nose_7.php"><img src="//byulstar.com/front
/images/renewal/PC_mennoserolling_111.jpg" alt=""></a></div>
      <div class="swiper-slide"><a href="/index_ata.php"><img src="//byulstar.com/front
/images/renewal/PC_antirolling_1.jpg" alt=""></a></div>
      <div class="swiper-slide"><a href="/front/nose/nose_4.php?"><img src="//byulstar.com//front/images/renewal/new_all.jpg" alt=""></a></div>
    </div>
    <div class="swiper-pagination"></div>
  </div>

  <script>
    const btnnm = ["눈성형","안전시스템","코막힘코성형","코재수술","눈재수술","남자코성형","중년성형","눈코지"]
    var swiper = new Swiper("#byul_swiper", {
      pagination: {
        el: "#byul_swiper .swiper-pagination",
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + btnnm[index] + "</span>";
        },
      },
    });
  </script>


  
<?php
include_once(G5_THEME_PATH.'/tail.php');