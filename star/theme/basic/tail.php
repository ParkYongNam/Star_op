<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가




if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
    return;
}
?>
<?php if (!defined("_INDEX_")) { ?>
          </div>
<? } ?>

  
</div>

</div>
<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<div id="ft" class="col-12">
    <div class="sitemap d-flex justify-content-center align-items-center">
        <div class="footer_cont2 col-3  px-5">
            <div class="row">
                <a href="<?php echo G5_URL ?>" class="ftlogo">
                    <img src="<?php echo G5_IMG_URL ?>/logo.png" alt="<?php echo $config['cf_title']; ?>">
                </a>
            </div>
            <div class="txt row">
                <p class="p-1">
                    <strong>별성형외과의원</strong>
                </p>
                <p class="fz-12">
                서울시 서초구 강남대로 441 7~8F(서초동 1305 서산빌딩)<br>
                대표자: 고국진,백형익 | 사업자등록번호: 657-25-00094<br>
                대표번호:<strong>02-1833-8898</strong>						
                </p>
            </div>
            <div class="copyright row my-3">
                <p class="fz-11">
                Copyright © 2019 별성형외과의원. All Rights Reserved.
                </p>
            </div>
            <div class="sns d-flex justify-content-center align-items-center my-3">
                <a target="_blank" href="https://www.youtube.com/channel/UCAsblskymKlJbX9cMBVDS_A">
                <i class="bi bi-youtube"></i>
                </a>
                <a target="_blank" href="https://www.facebook.com/byulstar11">
                <i class="bi bi-facebook"></i>
                </a>
                <a target="_blank" href="https://www.instagram.com/byulstagrambb/">
                <i class="bi bi-instagram"></i>
                </a>
                <a target="_blank" href="https://twitter.com/rjktldxcv0wfrjs" target="_blank">
                <i class="bi bi-twitter"></i>
                </a>
            </div>
            <div class="personal d-flex justify-content-center align-items-center">
                <a href="#">
                    별성형외과소개
                </a>
                <a href="#">
                    오시는길
                </a>
                <a href="#">
                    비급여수가표
                </a>

            </div>
        </div>
        <div style="width: 846px;height: 288px;  color: #333;">
            <div id="map" style="width:846px;height:256px;">

            </div>
            <div class="mapdsc d-flex justify-content-between align-items-center">
                <div class="d-flex">
                     <a target="_blank" href="https://map.kakao.com/">
                        <img src="<?php echo G5_IMG_URL ?>/logo_kakaomap.png" alt="">
                    </a>
                </div>
                <div class="fz-11">
                        <p> 강남역 10번 출구 350m 직진 / 신논현역 6번 출구 250m 직진, 시코르 건물 7층</p>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <a target="_blank" href="https://map.kakao.com/?from=roughmap&srcid=27278153&confirmid=27278153&q=%EB%B3%84%EC%84%B1%ED%98%95%EC%99%B8%EA%B3%BC%EC%9D%98%EC%9B%90&rv=on">
                        로드뷰
                    </a>
                    <span style="width: 1px;padding: 0;margin: 0 8px 0 9px;height: 11px;vertical-align: top;position: relative;top: 2px;border-left: 1px solid #d0d0d0;float: left;"></span>
                    <a target="_blank" href="https://map.kakao.com/?from=roughmap&eName=%EB%B3%84%EC%84%B1%ED%98%95%EC%99%B8%EA%B3%BC%EC%9D%98%EC%9B%90&eX=505599.0&eY=1111739.0">
                        길찾기
                    </a>
                    <span style="width: 1px;padding: 0;margin: 0 8px 0 9px;height: 11px;vertical-align: top;position: relative;top: 2px;border-left: 1px solid #d0d0d0;float: left;"></span>
                    <a target="_blank" href="https://map.kakao.com/?map_type=TYPE_MAP&from=roughmap&srcid=27278153&itemId=27278153&q=%EB%B3%84%EC%84%B1%ED%98%95%EC%99%B8%EA%B3%BC%EC%9D%98%EC%9B%90&urlX=505599.0&urlY=1111739.0/">
                        지도크게보기
                    </a>
                </div>
                
            </div>
        </div>
       
        
    </div>
</div>
<div id="qm">
    <?php echo latest('pic_qm','section_qm',7,1000); ?>
</div>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=1a6166fbd95b992c649edda75561c5d5"></script>
    <script>
		var mapContainer = document.getElementById('map'),
		mapOption = { 
        center: new kakao.maps.LatLng(37.50175763119219, 127.0253637691466),
			level: 3
		};

		var map = new kakao.maps.Map(mapContainer, mapOption); 
        var marker = new kakao.maps.Marker({ 
    // 지도 중심좌표에 마커를 생성합니다 
        position: map.getCenter() 
        }); 
// 지도에 마커를 표시합니다
        marker.setMap(map);
	</script>

       
    <script>
    $(function() {
        $("#top_btn").on("click", function() {
            $("html, body").animate({scrollTop:0}, '500');
            return false;
        });
    });
    </script>
</div>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");