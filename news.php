<!DOCTYPE html>
<html lang="ko">
<head>
    <?php
    include './front_header.php';
    require_once '/home/users/aws507_app/www/common.php';

    $http_url = $_SERVER["HTTP_HOST"];

    $SET_NO = '';
    $app_name = '';
    $APP_CODE = '';
    $category_code = 'B001';
    $query = "SELECT set_number, app_code, app_name FROM app WHERE app_code LIKE '%$category_code%'";

    $queryResult = querySelect($query);
    foreach($queryResult as $key => $val) {
        $SET_NO   = $val['set_number'];
        $APP_CODE = $val['app_code'];
        $app_name = $val['app_name'];
    }

    // 페이지네이션 변수 설정
    $limit = 4; // 한 페이지에 표시할 뉴스 수
    $total_count = 16; // 총 뉴스 수 (16개로 제한)
    $total_pages = ceil($total_count / $limit); // 총 페이지 수

    // 현재 페이지 가져오기
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $current_page = max(1, min($current_page, $total_pages)); // 유효한 페이지 번호로 제한

    // OFFSET 계산
    $offset = ($current_page - 1) * $limit;

    ?>
    <link rel="stylesheet" href="./css/news.css">
</head>
<body>
    <div id="wrap">
        <?php include './header.php'; ?>
        <div class="title_box"><h2 class="title">NEWS</h2></div>
        <div class="inner">
            <section class="news_area">
                <div class="news-cont">
                    <?php
                    // 쿼리
                    $sql = "SELECT DISTINCT nl.news_code as news_code, news.title, news.content, news.news_image, news.news_date, news.link 
                            FROM news_link as nl 
                            LEFT JOIN news ON nl.news_code = news.news_code 
                            WHERE category_code = '$category_code' 
                            ORDER BY REPLACE(news_date, '.', '') * 1 DESC, news_code DESC 
                            LIMIT $limit OFFSET $offset";

                    // 출력
                    $r1 = querySelect($sql);
                    foreach ($r1 as $key => $val) {
                        $code = $val['news_code'];
                        $title = $val['title'];
                        $content = $val['content'];
                        $str = mb_strimwidth($content, 0, 150, '...', 'utf-8');
                        $news_date = $val['news_date'];
                        $link = $val['link'];
                        $link = str_replace("http://", "https://", $link);
                        $img = $val['news_image'];
                    ?>
                        <div class="content_box">
                            <div class="left">
                                <img src="<?= $img ?>" alt="" class="news-img">
                            </div>	
                            <div class="news-txt">
                                <h3><?=$title?></h3>
                                <p class="content"><?=$str?></p>
                                <div class="bottom">
                                    <p class="date"><?=$news_date?></p>
                                    <a href="<?= $link ?>" class="news-link">확인하러 가기</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div> <!-- news-cont -->

                <!-- 페이지네이션 -->
                <div class="pagination">
                    <?php if ($current_page > 1): ?>
                        <a  class="arrow"  href="?page=<?= $current_page - 1 ?>">&lt;</a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <?php if ($i == $current_page): ?>
                            <strong class="current"><?= $i ?></strong>
                        <?php else: ?>
                            <a href="?page=<?= $i ?>"><?= $i ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages): ?>
                        <a  class="arrow"  href="?page=<?= $current_page + 1 ?>">&gt;</a>
                    <?php endif; ?>
                </div> <!-- pagination -->
            </section>
            <div class="top_button_wrap">
            <a href="" class="top_button"><img src="./img/sub-icon-2.png"></a>
            </div>
        </div> <!-- inner -->
        <?php include './footer.php'; ?>
    </div> <!-- wrap -->
</body>
<script>
    document.querySelector('.top_button').addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
</script>
</html>
