<?php
include './db.php'; 
error_reporting(E_ALL);
ini_set("display_errors", 1);

// 현재 페이지 번호를 받아옴 (기본값 1)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$itemsPerPage = 10; // 페이지 당 항목 수
$offset = ($page - 1) * $itemsPerPage;

// 검색어를 받아옴 (기본값은 빈 문자열)
$search = isset($_GET['search']) ? $_GET['search'] : '';

// 전체 Q&A 개수 가져옴 (검색어가 있을 경우 검색 필터 적용)
$totalSql = "SELECT COUNT(*) as total FROM qna WHERE q LIKE :search";
$stmt = $pdo->prepare($totalSql);
$stmt->execute([':search' => "%$search%"]);
$totalResult = $stmt->fetch(PDO::FETCH_ASSOC);
$totalItems = $totalResult['total'];
$totalPages = ceil($totalItems / $itemsPerPage); // 총 페이지 수 계산

// 현재 페이지에 해당하는 Q&A 항목 가져옴 (검색어가 있을 경우 검색 필터 적용)
$sql = "SELECT * FROM qna WHERE q LIKE :search LIMIT :offset, :itemsPerPage";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':search', "%$search%");
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <?php include "./front_header.php";?>
    <link rel="stylesheet" href="./css/qna.css">
</head>
<body>
    <div id="wrap">
        <?php include 'header.php'?>
        <main>
            <?php
            echo '<div class="title_box"><h2 class="title">FAQ</h2></div>';
            echo '<div class="content1">';
            echo ' <div class="search-container">
            <form action="" method="get">
                <input type="text" class="search-input" name="search" value="' . $search . '" placeholder="검색어를 입력해주세요." />
                <input type="hidden" name="page" value="' . $page . '">
                <button class="search-button" type="submit"><img src="./img/sub-icon-1.png"></button>
            </form>
        </div>';

            // 검색 결과가 있을 경우 Q&A 항목 출력
            if ($totalItems > 0) {
                foreach ($result as $index => $val) { // $index를 추가하여 현재 항목의 인덱스를 가져옴
                    $question = $val['q']; 
                    $answer = $val['a']; 
                    echo '<div class="qna' . ($index === 0 ? ' first' : '') . '">'; // 첫 번째 항목에 'first' 클래스 추가
                    echo '<pre class="q"><span>Q.  &nbsp;</span>' . $question . '</pre>'; 
                    echo '<pre class="a">' . $answer . '</pre>'; 
                    echo '</div>';
                }
            } else {
                // 검색어에 대한 결과가 없을 경우 메시지 출력
                echo '<div class="result_box">';
                echo '<img src="./img/sub-icon-3.png">' ;
                echo '<div class="no-results">"' . $search . '"의 검색어를 찾을 수 없습니다.</div>';
                echo '</div>';
            }
      

            // 페이지네이션 버튼 출력
            echo '<div class="pagination">';
            if ($page > 1) {
                echo '<a class="arrow" href="?page=' . ($page - 1) . '&search=' . $search . '">&lt;</a>';
            }

            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $page) {
                    echo '<span class="current">' . $i . '</span>';
                } else {
                    echo '<a href="?page=' . $i . '&search=' . $search . '">' . $i . '</a>';
                }
            }

            if ($page < $totalPages) {
                echo '<a class="arrow" href="?page=' . ($page + 1) . '&search=' . $search . '"> &gt;</a>';
            }
            echo '</div>';
            echo '</div>'; //content1
            echo '<div class="top_button_wrap">';
            echo '<a href="" class="top_button"><img src="./img/sub-icon-2.png"></a>';
            echo '</div>'; // top_button_wrap
            ?>
        </main>
    </div>
</body>
<script>
// QNA :: OPEN-CLOSE TOGGLE EVENTS
document.addEventListener('DOMContentLoaded', () => { // DOM이 로드된 후 실행
    const allLists = document.querySelectorAll('.qna');
    const allQuestions = document.querySelectorAll('.qna .q');

    allQuestions.forEach((el) => {
        el.addEventListener('click', (e) => {
            const parent = e.target.closest('.qna'); // 클릭한 질문의 부모 Q&A 항목 선택
            
            if (parent.classList.contains('on')) {
                parent.classList.remove('on'); // 이미 on 클래스가 있으면 제거
            } else {
                allLists.forEach((v) => v.classList.remove('on')); // 모든 리스트에서 on 클래스 제거
                parent.classList.add('on'); // 클릭한 항목에 on 클래스 추가
            }
        });
    });
});

</script>
<script>
    document.querySelector('.top_button').addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
</script>
</html>
