<?php
include './db.php'; 
error_reporting(E_ALL);
ini_set("display_errors", 1);

$categorycode = $_GET['categorycode']; 
$sql = "SELECT DISTINCT title FROM content WHERE categorycode = ?"; 
$params = [$categorycode];
$result = query($sql, $params)->fetch();
$category = $result['title'];

$title = "";

if (!empty($result)) {
    $title = $result['title'];
}
$num = isset($_GET['num']) ? intval($_GET['num']) : intval(substr($categorycode, 3));

// 이전 및 다음 카테고리 번호 계산
$prevNum = ($num == 1) ? 10 : $num - 1;
$nextNum = ($num == 10) ? 1 : $num + 1;

$prevCategory = 'A1-' . $prevNum;
$nextCategory = 'A1-' . $nextNum;

// 동적으로 슬라이드 생성
if ($num == 10) {
    $slides = ["./img/sub-img-20.png"]; // A1-10일 때
} else {
    $slides = ["./img/sub-img-1{$num}.png"]; // 그 외의 경우
}

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <?php include "./front_header.php"; ?>
    <link rel="stylesheet" href="./css/sub.css">
    <script type="text/javascript">
        window.addEventListener('load', function() {
            document.getElementById('loading-mask').remove();
        });
    </script>
</head>
<body>
    <div id="loading-mask" style="position: fixed; z-index: 999; left: 0; right: 0; top: 0; bottom: 0;"></div>
    <div id="wrap">
        <?php include "./header.php"; ?>
        <div class="section_<?php echo $categorycode; ?>">
            <?php
            if (in_array($categorycode, ['A1-1', 'A1-2', 'A1-3', 'A1-4', 'A1-5', 'A1-6', 'A1-7', 'A1-8', 'A1-9', 'A1-10'])) {
                $sql2 = "SELECT sub_title, content FROM content WHERE categorycode = ?";
                $result2 = query($sql2, [$categorycode])->fetchAll();
                
                echo '<div class="title_box">';

                echo '<div class="image_wrap">'; 
                foreach ($slides as $slide) {
                    echo '<img src="' . $slide . '" class="banner" style="display:none;">';
                }
                echo '<div class="navigation">'; 
                echo '<a href="./sub2.php?categorycode=' . $prevCategory . '" class="prev_btn"><img src="./img/arrow-6.png" alt="이전"></a>';
                echo '</div>'; 
                echo '<div class="navigation">'; 
                echo '<a href="./sub2.php?categorycode=' . $nextCategory . '" class="next_btn"><img src="./img/arrow-7.png" alt="다음"></a>';
                echo '</div>'; 
                echo '</div>'; 

                echo '</div>';
                echo '<div class="content1">';
                foreach ($result2 as $key => $val) {
                    echo '<p class="sub_title">' . $val['sub_title'] . '</p>';
                    echo '<div class="box">';
                    echo '<pre class="con">' . $val['content'] . '</pre>';
                    echo '</div>';
                }
                
                echo '<div class="top_button_wrap">';
                echo '<a href="" class="top_button"><img src="./img/sub-icon-2.png"></a>';
                echo '</div>';
          // 네비게이션 버튼 처리
            if ($categorycode == 'A1-1') {
                echo '<div class="btn_wrap1">';
                echo '<a class="next" href="./sub2.php?categorycode=A1-2">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-5.png"> 다음글</span>';
                echo '<span class="s2">LH국민임대</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            } elseif ($categorycode == 'A1-2') {
                echo '<div class="btn_wrap2">';
                echo '<a class="back5" href="./sub2.php?categorycode=A1-1">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-4.png"> 이전글</span>';
                echo '<span class="s2">LH통합공공임대</span>';
                echo '</div>';
                echo '</a>';
                echo '<a class="next" href="./sub2.php?categorycode=A1-3">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-5.png"> 다음글</span>';
                echo '<span class="s2">LH행복주택</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            } elseif ($categorycode == 'A1-3') {
                echo '<div class="btn_wrap2">';
                echo '<a class="back5" href="./sub2.php?categorycode=A1-2">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-4.png"> 이전글</span>';
                echo '<span class="s2">LH국민임대</span>';
                echo '</div>';
                echo '</a>';
                echo '<a class="next" href="./sub2.php?categorycode=A1-4">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-5.png"> 다음글</span>';
                echo '<span class="s2">LH공공임대</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }elseif ($categorycode == 'A1-4') {
                echo '<div class="btn_wrap2">';
                echo '<a class="back5" href="./sub2.php?categorycode=A1-3">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-4.png"> 이전글</span>';
                echo '<span class="s2">LH행복주택</span>';
                echo '</div>';
                echo '</a>';
                echo '<a class="next" href="./sub2.php?categorycode=A1-5">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-5.png"> 다음글</span>';
                echo '<span class="s2">LH영구임대</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }elseif ($categorycode == 'A1-5') {
                echo '<div class="btn_wrap2">';
                echo '<a class="back5" href="./sub2.php?categorycode=A1-4">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-4.png"> 이전글</span>';
                echo '<span class="s2">LH공공임대</span>';
                echo '</div>';
                echo '</a>';
                echo '<a class="next" href="./sub2.php?categorycode=A1-6">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-5.png"> 다음글</span>';
                echo '<span class="s2">LH장기전세</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }elseif ($categorycode == 'A1-6') {
                echo '<div class="btn_wrap2">';
                echo '<a class="back5" href="./sub2.php?categorycode=A1-5">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-4.png"> 이전글</span>';
                echo '<span class="s2">LH영구임대</span>';
                echo '</div>';
                echo '</a>';
                echo '<a class="next" href="./sub2.php?categorycode=A1-7">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-5.png"> 다음글</span>';
                echo '<span class="s2">LH매입임대</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }elseif ($categorycode == 'A1-7') {
                echo '<div class="btn_wrap2">';
                echo '<a class="back5" href="./sub2.php?categorycode=A1-6">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-4.png"> 이전글</span>';
                echo '<span class="s2">LH장기전세</span>';
                echo '</div>';
                echo '</a>';
                echo '<a class="next" href="./sub2.php?categorycode=A1-8">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-5.png"> 다음글</span>';
                echo '<span class="s2">LH전세임대</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }elseif ($categorycode == 'A1-8') {
                echo '<div class="btn_wrap2">';
                echo '<a class="back5" href="./sub2.php?categorycode=A1-7">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-4.png"> 이전글</span>';
                echo '<span class="s2">LH매입임대</span>';
                echo '</div>';
                echo '</a>';
                echo '<a class="next" href="./sub2.php?categorycode=A1-9">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-5.png"> 다음글</span>';
                echo '<span class="s2">LH주거지원사업</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }elseif ($categorycode == 'A1-9') {
                echo '<div class="btn_wrap2">';
                echo '<a class="back5" href="./sub2.php?categorycode=A1-8">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-4.png"> 이전글</span>';
                echo '<span class="s2">LH전세임대</span>';
                echo '</div>';
                echo '</a>';
                echo '<a class="next" href="./sub2.php?categorycode=A1-10">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-5.png"> 다음글</span>';
                echo '<span class="s2">LH청년전세임대주택</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }elseif ($categorycode == 'A1-10') {
                echo '<div class="btn_wrap1">';
                echo '<a class="back5" href="./sub2.php?categorycode=A1-9">';
                echo '<div class="btn_left">';
                echo '<span class="s1"><img src="./img/arrow-4.png"> 이전글</span>';
                echo '<span class="s2">LH주거지원사업</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const images = document.querySelectorAll('.image_wrap img');
        if (images.length > 0) {
            images[0].style.display = 'block'; // 첫 번째 이미지를 보이도록 설정
        }
    });

 // 텍스트 인식
    var preTags = document.getElementsByTagName("pre");
    for (var i = 0; i < preTags.length; i++) {
        var preTag = preTags[i];
        var processedText = preTag.innerHTML;
        processedText = processedText.replace(/\[\[\[(.*?)\]\]\]/gs, '<span class="point1">$1</span>');
        processedText = processedText.replace(/\[\[(.*?)\]\]/gs, '<span class="point2">$1</span>');
        processedText = processedText.replace(/\[(.*?)\]/gs, '<span class="point3">$1</span>');
        preTag.innerHTML = processedText;
    }

    var preTags = document.getElementsByTagName("p");
    for (var i = 0; i < preTags.length; i++) {
        var preTag = preTags[i];
        var processedText = preTag.innerHTML;
        processedText = processedText.replace(/\[\[\[(.*?)\]\]\]/gs, '<span class="point1">$1</span>');
        processedText = processedText.replace(/\[\[(.*?)\]\]/gs, '<span class="point2">$1</span>');
        processedText = processedText.replace(/\[(.*?)\]/gs, '<span class="point3">$1</span>');
        preTag.innerHTML = processedText;
    }
    
</script>
<script>
    document.querySelector('.top_button').addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
</script>
</html>
