<?php
include './db.php'; 
error_reporting(E_ALL);
ini_set("display_errors", 1);

$categorycode = $_GET['categorycode']; 
$sql = "SELECT DISTINCT title FROM content WHERE categorycode = ?"; 
$params = [$categorycode];
$result = query($sql, $params)->fetch();
$category = $result['title'];

// 변수 초기화
$title = "";

if (!empty($result)) {
    $title = $result['title'];
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <?php include "./front_header.php"; ?>
    <link rel="stylesheet" href="./css/sub.css">
    <title><?php echo $title; ?></title>
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
        <?php include "./header.php"; ?>
        <div class="section_<?php echo $categorycode; ?>">
            <?php
         if ($categorycode == 'A') {
            $sql2 = "SELECT sub_title, content FROM content WHERE categorycode = ?";
            $result2 = query($sql2, [$categorycode])->fetchAll();
            echo '<div class="title_box"><h2 class="title">' . $title . '</h2></div>';
            echo '<div class="content1">';
        
            foreach ($result2 as $key => $val) {
                // categorycode 생성
                $subCategoryCode = 'A1-' . ($key + 1);
                echo '<a class="box" href="./sub2.php?categorycode=' . $subCategoryCode . '">';
                echo '<div class="left">';
                // 이미지 출력 (각 right에 하나의 이미지)
                echo '<img src="./img/sub-img-' . ($key + 1) . '.png" alt="Image ' . ($key + 1) . '">';
                echo '</div>'; // left
        
                echo '<div class="right">';
                echo '<p class="sub_title">' . $val['sub_title'] . '</p>';
                echo '<pre class="con">' . $val['content'] . '</pre>';
                echo '</div>'; // right
                echo '</a>'; // box
            }
        
            echo '<div class="top_button_wrap">';
            echo '<a href="" class="top_button"><img src="./img/sub-icon-2.png"></a>';
            echo '</div>';
        
            echo '</div>'; // content1
        
        }else if ($categorycode == 'B') {
            $sql2 = "SELECT sub_title, content FROM content WHERE categorycode = ?";
            $result2 = query($sql2, [$categorycode])->fetchAll();
            echo '<div class="title_box"><h2 class="title">' . $title . '</h2></div>';
            echo '<div class="content1">';
        
            foreach ($result2 as $key => $val) {
                // categorycode 생성
                $subCategoryCode = 'B1-' . ($key + 1);
                echo '<a class="box" href="./sub3.php?categorycode=' . $subCategoryCode . '">';
                echo '<p class="sub_title">' . $val['sub_title'] . '</p>';
                echo '<pre class="con">' . $val['content'] . '</pre>';
                echo '</a>'; // box
            }
        
            echo '<div class="top_button_wrap">';
            echo '<a href="" class="top_button"><img src="./img/sub-icon-2.png"></a>';
            echo '</div>';
        
            echo '</div>'; // content1
        }
        else if ($categorycode == 'C') {
            $sql2 = "SELECT sub_title, content FROM content WHERE categorycode = ?";
            $result2 = query($sql2, [$categorycode])->fetchAll();
            echo '<div class="title_box"><h2 class="title">' . $title . '</h2></div>';
            echo '<div class="content1">';
        
            foreach ($result2 as $key => $val) {
                // categorycode 생성
                $subCategoryCode = 'C1-' . ($key + 1);
                echo '<a class="box" href="./sub4.php?categorycode=' . $subCategoryCode . '">';
                echo '<p class="sub_title">' . $val['sub_title'] . '</p>';
                echo '<pre class="con">' . $val['content'] . '</pre>';
                echo '</a>'; // box
            }
        
            echo '<div class="top_button_wrap">';
            echo '<a href="" class="top_button"><img src="./img/sub-icon-2.png"></a>';
            echo '</div>';
        
            echo '</div>'; // content1
        }
        
            ?>
        </div>
    </div>
</body>
<script>
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
    // '탑으로' 버튼 클릭 시 페이지 상단으로 이동하는 스크립트
    document.querySelector('.top_button').addEventListener('click', function(e) {
        e.preventDefault(); // 기본 동작 막기
        window.scrollTo({top: 0, behavior: 'smooth'}); // 스크롤 상단 이동
    });
</script>
</html>
