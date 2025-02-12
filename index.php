<?php
// NEWS -> IDB
// IDB 가져오기
require_once '/home/users/aws507_app/www/common.php';
$http_url = $_SERVER["HTTP_HOST"];

$SET_NO = '';
$app_name = '';
$APP_CODE = '';
$category_code = 'B001';
$query = "SELECT set_number, app_code, app_name FROM app WHERE app_code LIKE '%$category_code%'";

$queryResult = querySelect($query);
foreach ($queryResult as $key => $val) {
    $SET_NO   = $val['set_number'];
    $APP_CODE = $val['app_code'];
    $app_name = $val['app_name'];
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<?php include "./front_header.php"; ?>
	<link rel="stylesheet" href="./css/index.css">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<script type="text/javascript">
        // == 마스킹코드 ==
        window.addEventListener('load', function() {
            document.getElementById('loading-mask').remove();
        });
    </script>
</head>
<body>
<div id="loading-mask" style="position: fixed; z-index: 999; left: 0; right: 0; top: 0; bottom: 0;"></div>
	<div id="wrap">
		<?php include './header.php'; ?>
		<main>
			<div class="section1">
				<div class="section_wrap">
					<span>LH청약플러스</span>
					<img src="./img/main-banner.png" alt="Main Banner">
				</div>
			</div>
			<div class="section2">
				<div class="section_wrap">
					<a href="./sub2.php?categorycode=A1-1">
						LH통합공공임대
						<img src="./img/main-btn-1.png" alt="Main Button 1">
						<span>궁금하다면?</span>
					</a>
					<a href="./sub2.php?categorycode=A1-2">
						LH국민임대
						<img src="./img/main-btn-2.png" alt="Main Button 2">
						<span>궁금하다면?</span>
					</a>
					<a href="./sub2.php?categorycode=A1-3">
						LH행복주택
						<img src="./img/main-btn-3.png" alt="Main Button 3">
						<span>궁금하다면?</span>
					</a>
					<a href="./sub2.php?categorycode=A1-4">
						LH공공임대
						<img src="./img/main-btn-4.png" alt="Main Button 4">
						<span>궁금하다면?</span>
					</a>
				</div>
				<div class="bottom">
					<a href="./sub1.php?categorycode=A">더보기></a>
				</div>
			</div>
			<div class="section2_mo">
				<div class="section_wrap swiper-container customSwiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
						<a href="./sub2.php?categorycode=A1-1">
							LH통합공공임대
							<img src="./img/main-btn-1.png" alt="Main Button 1">
							<span>궁금하다면?</span>
						</a>
						</div>
						<div class="swiper-slide">
							<a href="./sub2.php?categorycode=A1-2">
							LH국민임대
							<img src="./img/main-btn-2.png" alt="Main Button 2">
							<span>궁금하다면?</span>
						</a>
						</div>
						<div class="swiper-slide">
						<a href="./sub2.php?categorycode=A1-3">
							LH행복주택
							<img src="./img/main-btn-3.png" alt="Main Button 3">
							<span>궁금하다면?</span>
						</a>
						</div>
						<div class="swiper-slide">
						<a href="./sub2.php?categorycode=A1-4">
							LH공공임대
							<img src="./img/main-btn-4.png" alt="Main Button 4">
							<span>궁금하다면?</span>
						</a>
						</div>
					</div>
					<div class="swiper-pagination"></div>
				</div>
				<div class="bottom">
					<a href="./sub1.php?categorycode=A">더보기></a>
				</div>
			</div>

            <div class="section3_top">
                <h2>분양유형도 여러가지인거 알고 계셨나요?</h2>
            </div>
            <div class="section3">
                <div class="section_wrap">
                    <div class="list">
                        <img src="./img/main-icon-off-1.png" data-hover="./img/main-icon-on-1.png" class="house_icon" alt="Icon 1">
                        <a href="./sub2.php?categorycode=A1-10">
                            <div class="left">
                                <div class="left_top">
                                    <img src="./img/main-icon-3.png" class="icon">
                                    <h3>공공분양</h3>
                                </div>
                                <span>소득이 낮은 무주택 시민들을 위해 마련한 주택입니다.</span>
                            </div>
                            <div class="right">
                                <div class="click">
                                    <img src="./img/main-icon-1.png">
                                    Click me!
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="list">
                        <img src="./img/main-icon-off-2.png" data-hover="./img/main-icon-on-2.png" class="house_icon" alt="Icon 2">
                        <a href="./sub3.php?categorycode=B1-1">
                            <div class="left">
                                <div class="left_top">
                                    <img src="./img/main-icon-3.png" class="icon">
                                    <h3>신혼희망타운</h3>
                                </div>
                                <span>신혼 부부들을 위한 장기임대주택입니다.</span>
                            </div>
                            <div class="right">
                                <div class="click">
                                    <img src="./img/main-icon-1.png">
                                    Click me!
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="list">
                        <img src="./img/main-icon-off-3.png" data-hover="./img/main-icon-on-3.png" class="house_icon" alt="Icon 3">
                        <a href="./sub3.php?categorycode=B1-2">
                            <div class="left">
                                <div class="left_top">
                                    <img src="./img/main-icon-3.png" class="icon">
                                    <h3>토지분양</h3>
                                </div>
                                <span>정부, 공공기관 또는 민간 개발업체 등이 소유한 토지를 판매하는 것입니다.</span>
                            </div>
                            <div class="right">
                                <div class="click">
                                    <img src="./img/main-icon-1.png">
                                    Click me!
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="list">
                        <img src="./img/main-icon-off-4.png" data-hover="./img/main-icon-on-4.png" class="house_icon" alt="Icon 4">
                        <a href="./sub3.php?categorycode=B1-2">
                            <div class="left">
                                <div class="left_top">
                                    <img src="./img/main-icon-3.png" class="icon">
                                    <h3>상가분양</h3>
                                </div>
                                <span>상업용 건물 내의 상가 공간을 개인이나 법인에게 판매하는 것입니다.</span>
                            </div>
                            <div class="right">
                                <div class="click">
                                    <img src="./img/main-icon-1.png">
                                    Click me!
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="list">
                        <img src="./img/main-icon-off-5.png" data-hover="./img/main-icon-on-5.png" class="house_icon" alt="Icon 5">
                        <a href="./sub3.php?categorycode=B1-2">
                            <div class="left">
                                <div class="left_top">
                                    <img src="./img/main-icon-3.png" class="icon">
                                    <h3>주택 매도</h3>
                                </div>
                                <span>주택을 소유한 사람이 그 주택을 다른 사람에게 판매하는 것입니다.</span>
                            </div>
                            <div class="right">
                                <div class="click">
                                    <img src="./img/main-icon-1.png">
                                    Click me!
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="section3_mo">
			<div class="top">
						<a href="./faq.php">더보기></a>
					</div>
                <div class="section_wrap">
                    <div class="list">
                        <img src="./img/main-icon-off-1.png" data-hover="./img/main-icon-on-1.png" class="house_icon" alt="Icon 1">
                        <a href="./sub2.php?categorycode=A1-10">
                            <div class="left">
                                <div class="left_top">
                                    <img src="./img/main-icon-3.png" class="icon">
                                    <h3>공공분양</h3>
                                </div>
                                <span>소득이 낮은 무주택 시민들을 위해 마련한 주택입니다.</span>
                            </div>
                            <div class="right">
                                <div class="click">
                                    <img src="./img/main-icon-1.png">
                                    Click me!
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="list">
                        <img src="./img/main-icon-off-2.png" data-hover="./img/main-icon-on-2.png" class="house_icon" alt="Icon 2">
                        <a href="./sub3.php?categorycode=B1-1">
                            <div class="left">
                                <div class="left_top">
                                    <img src="./img/main-icon-3.png" class="icon">
                                    <h3>신혼희망타운</h3>
                                </div>
                                <span>신혼 부부들을 위한 장기임대주택입니다.</span>
                            </div>
                            <div class="right">
                                <div class="click">
                                    <img src="./img/main-icon-1.png">
                                    Click me!
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="list">
                        <img src="./img/main-icon-off-3.png" data-hover="./img/main-icon-on-3.png" class="house_icon" alt="Icon 3">
                        <a href="./sub3.php?categorycode=B1-2">
                            <div class="left">
                                <div class="left_top">
                                    <img src="./img/main-icon-3.png" class="icon">
                                    <h3>토지분양</h3>
                                </div>
                                <span>정부, 공공기관 또는 민간 개발업체 등이 소유한 토지를 판매하는 것입니다.</span>
                            </div>
                            <div class="right">
                                <div class="click">
                                    <img src="./img/main-icon-1.png">
                                    Click me!
                                </div>
                            </div>
                        </a>
                    </div>
                   
                    
                </div>
            </div>
			<div class="section4">
				<h2><span>만약에 이런 상황이 생겼을 때,</span><br>
				여러분들은 어떤 선택을 하실겁니까?</h2>
					<div class="btn_wrap">
					<a href="./sub4.php?categorycode=C1-1">
						청약에 실패한다면?
						<img src="./img/main-btn-5.png" alt="Main Button 1">
						<span>More →</span>
					</a>
					<a href="./sub4.php?categorycode=C1-6">
						청약을 놓쳤다면?
						<img src="./img/main-btn-6.png" alt="Main Button 2">
						<span>More →</span>
					</a>
					<a href="./sub4.php?categorycode=C1-9">
						청약 취소 상황이 온다면?
						<img src="./img/main-btn-7.png" alt="Main Button 3">
						<span>More →</span>
					</a>
				</div>
			</div>
			<div class="section5">
				<div class="section_wrap">
					<h2><span>A </span>vs <span>B</span></h2>
					<div class="btn_wrap">
						<a class="btn1" href="./sub4.php?categorycode=C1-2">
							<img src="./img/main-img-1.png" class="btn_img">
							<div class="text-overlay1">
								<img src="./img/main-icon-2.png">
							</div>
							<div class="text-overlay3"> 
								청약가점제 VS 추첨제 <br>
								더유리한건? 
							</div>
						</a>
						<a class="btn2" href="./sub3.php?categorycode=B1-8">
							<img src="./img/main-img-2.png" class="btn_img">
							<div class="text-overlay2">
								<img src="./img/main-icon-2.png">
							</div>
							<div class="text-overlay4"> 
								분양가상한제 VS 분양가자율화 <br>
								아파트 고르는 기준은?
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="section6">
				<div class="section_wrap">
					<h2>청약에 대해 더 궁금하다면?</h2>
					<div class="list_wrap">
						<span id="list1" data-target=".btn_wrap1">최신정책</span>
						<span id="list2" data-target=".btn_wrap2">청약꿀TIP</span>
						<span id="list3" data-target=".btn_wrap3">청약통장</span>
						<span id="list4" data-target=".btn_wrap4">보너스정보</span>
					</div>
					
					<div class="btn_wrap1">
						<a class="btn1" href="./sub3.php?categorycode=B1-9">청약관련 최신정책 및 제도<img src="./img/청약관련-최신-정책-및-제도.png"></a>
						<a class="btn1" href="./sub4.php?categorycode=C1-3">아파트 분양 경쟁률과 당첨전략<img src="./img/아파트-분양-경쟁률과-당첨전략.png"></a>
						<a class="btn1" href="./sub4.php?categorycode=C1-7">청약당첨 사례후기<img src="./img/청약당첨-사례후기.png"></a>
					</div>
					<div class="btn_wrap2" style="display: none;"> <!-- 기본적으로 숨김 -->
						<a class="btn1" href="./sub4.php?categorycode=C1-8">청약실패시 재도전<img src="./img/청약실패시-재도전.png"></a>
						<a class="btn1" href="./sub4.php?categorycode=C1-4">청약 당첨 확률 높이는 TIP<img src="./img/청약-당첨-확률-높이는-TIP.png"></a>
						<a class="btn1" href="./sub4.php?categorycode=C1-5">청약 가점 계산법과 높이는 TIP<img src="./img/청약-가점-계산법과-높이는-TIP.png"></a>
					</div>
					<div class="btn_wrap3" style="display: none;">
						<a class="btn1" href="./sub3.php?categorycode=B1-6">청약예치금 및 통장선택<img src="./img/청약예치금-및-통장선택.png"></a>
						<a class="btn1" href="./sub3.php?categorycode=B1-7">주택청약통장 금리<img src="./img/주택청약통장-금리.png"></a>
						<a class="btn1" href="./sub3.php?categorycode=B1-10">청약통장 신청기간별 혜택<img src="./img/청약통장-신청기간별-혜택.png"></a>
					</div>
					<div class="btn_wrap4" style="display: none;">
						<a href="./sub3.php?categorycode=B1-3">기존주택전세임대<img src="./img/기존주택전세임대.png"></a>
						<a href="./sub3.php?categorycode=B1-4">청년전세임대주택<img src="./img/청년전세임대주택.png"></a>
						<a href="./sub3.php?categorycode=B1-5">권리분석<img src="./img/권리분석.png"></a>
					</div>
				</div>
			</div>
			<div class="section7">
				<div class="left">
					<div class="top">
						<h2>Q&A</h2>
						<a href="./qna.php">더보기></a>
					</div>
					<pre><span>Q. </span>현재 해외 거주중인데, 공공주택에 청약할 수 있나요?</pre>
					<pre><span>Q. </span>청약 신청 후 다른 지역으로 이사를 갈 경우 불이익이 있나요?</pre>
					<pre><span>Q. </span>주택소유 여부 또는 이력을 신청자가 확인할 수 있는 방법이 있나요?</pre>
					<pre><span>Q. </span>청약 신청했는데 수정 또는 취소가 가능한가요?</pre>
				</div>
			</div>
			<div class="section8">
    <div class="section_wrap">
        <div class="top">
            <h2>NEWS</h2>
            <div class="swiper-pagination"></div>
            <a href="./news.php">더보기></a>
        </div>
        <div class="news_wrap">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php
                    $query = "SELECT category_code FROM common WHERE app_code = '$APP_CODE' and set_number = '$SET_NO'";
                    $queryResult = querySelect($query);
                    foreach ($queryResult as $key => $val) {
                        $q1 = "SELECT distinct nl.news_code as news_code, news.title, news.content, news.news_date, news.link, news.news_image 
                                FROM news_link as nl 
                                LEFT JOIN news ON nl.news_code = news.news_code 
                                WHERE set_number = '$SET_NO' and category_code = '$category_code' 
                                ORDER BY REPLACE(news_date,'.','') *1 desc, news_code desc LIMIT 5";

                        $r1 = querySelect($q1);
                        foreach ($r1 as $key => $val) {
                            $code = $val['news_code'];
                            $title = $val['title'];
                            $content = $val['content'];
                            $str = mb_strimwidth($content, 0, 75, '...', 'utf-8');
                            $news_date = $val['news_date'];
                            $img = $val['news_image'];
                            $link = $val['link'];
                            $link = str_replace("http://", "https://", $link);
                            $news_img = $val['news_image'];
                    ?>
                            <div class="swiper-slide">
							<a href="<?= $link ?>" class="news-link">
                                    <div class="title_wrap"><?=$title?></div>
                                    <p class="content"><?=$str?></p>
                                    <span class="news_date"><?=$news_date?></span>
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section8_mo">
    <div class="section_wrap">
        <div class="top">
            <h2>NEWS</h2>
            <div class="swiper-pagination"></div>
            <a href="./news.php">더보기></a>
        </div>
        <div class="news_wrap">
                    <?php
                    $query = "SELECT category_code FROM common WHERE app_code = '$APP_CODE' and set_number = '$SET_NO'";
                    $queryResult = querySelect($query);
                    foreach ($queryResult as $key => $val) {
                        $q1 = "SELECT distinct nl.news_code as news_code, news.title, news.content, news.news_date, news.link, news.news_image 
                                FROM news_link as nl 
                                LEFT JOIN news ON nl.news_code = news.news_code 
                                WHERE set_number = '$SET_NO' and category_code = '$category_code' 
                                ORDER BY REPLACE(news_date,'.','') *1 desc, news_code desc LIMIT 4";

                        $r1 = querySelect($q1);
                        foreach ($r1 as $key => $val) {
                            $code = $val['news_code'];
                            $title = $val['title'];
                            $content = $val['content'];
                            $str = mb_strimwidth($content, 0, 75, '...', 'utf-8');
                            $news_date = $val['news_date'];
                            $img = $val['news_image'];
                            $link = $val['link'];
                            $link = str_replace("http://", "https://", $link);
                            $news_img = $val['news_image'];
                    ?>
                            <div class="swiper-slide">
								<a href="<?= $link ?>" class="news-link">
                                    <div class="title_wrap"><?=$title?></div>
                                    <p class="content"><?=$str?></p>
                                    <span class="news_date"><?=$news_date?></span>
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
		</div>
		</main>
	</div>

	<script>
		document.querySelectorAll('.list').forEach(item => {
			const img = item.querySelector('.house_icon');
			const originalSrc = img.src;

			item.addEventListener('mouseenter', () => {
				img.src = img.getAttribute('data-hover'); // 호버 시 이미지 변경
			});

			item.addEventListener('mouseleave', () => {
				img.src = originalSrc; // 호버 해제 시 원래 이미지로 복원
			});
		});

		//section4 
		document.addEventListener('scroll', () => {
		const links = document.querySelectorAll('.section4 .btn_wrap a');
		links.forEach((link, index) => {
			const linkPosition = link.getBoundingClientRect().top;

			// 링크가 화면에 보이면 visible 클래스를 추가
			if (linkPosition < window.innerHeight) {
				link.classList.add('visible'); // visible 클래스를 추가
				link.style.transitionDelay = `${index * 0.4}s`; // 순차적으로 지연 시간 추가
			}
		});
	});
		//section6 
		let lastClickedSpan = null; // 마지막 클릭된 span을 저장할 변수

		document.querySelectorAll('.list_wrap span').forEach(span => {
			span.addEventListener('click', function() {
				// 모든 btn_wrap 숨기기
				document.querySelectorAll('.btn_wrap1, .btn_wrap2, .btn_wrap3, .btn_wrap4').forEach(btnWrap => {
					btnWrap.style.display = 'none';
				});
				
				// 클릭한 span에 해당하는 btn_wrap 표시
				const target = this.getAttribute('data-target');
				document.querySelector(target).style.display = 'flex';
				
				// 이전에 클릭된 span 강조 제거
				if (lastClickedSpan) {
					lastClickedSpan.classList.remove('highlight');
				}
				
				// 현재 클릭된 span 강조
				this.classList.add('highlight');
				
				// 현재 클릭된 span을 lastClickedSpan에 저장
				lastClickedSpan = this;
			});
		});

		// 초기 로드 시 첫 번째 span 강조
		const firstSpan = document.querySelector('.list_wrap span');
		firstSpan.classList.add('highlight');
		lastClickedSpan = firstSpan; // 첫 번째 span을 lastClickedSpan에 저장

	</script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script>
document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper('.mySwiper', {
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        spaceBetween: 30,
        slidesPerView: 4, // 한 번에 보일 슬라이드 수
    });
});

</script>
<script>
    var customSwiper = new Swiper('.customSwiper', {
        slidesPerView: 3, // 3개의 슬라이드 표시
        spaceBetween: 15, // 슬라이드 간격
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

</body>
</html>
