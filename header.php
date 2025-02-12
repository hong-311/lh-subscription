
<header>
<div class="header_wrap">
        <!-- <div class="header_left"> -->
        <h1><a href="./"><img src="./img/logo.png" alt="Logo"></a></h1>
        <!-- </div> -->
        <nav>
        
            <ul class="nav_menu">
                <li class="has-submenu" id="li1">
                    <a href="./sub1.php?categorycode=A">
                        <span>LH청약</span>
                    </a>
                </li>
                <li class="has-submenu" id="li2">
                    <a href="./sub1.php?categorycode=B">
                        <span>청약 더보기</span>
                    </a>
                </li>
                <li class="has-submenu" id="li3">
                    <a href="./sub1.php?categorycode=C">
                        <span>만약에 청약 & 꿀TIP</span>
                    </a>
                </li>
                <li class="has-submenu" id="li4">
                    <a href="./qna.php">
                        <span>FAQ</span>
                    </a>
                </li>
                <li class="has-submenu" id="li5">
                    <a href="./news.php">
                        <span>NEWS</span>
                    </a>
                </li>
            </ul>
            <div class="submenu_wrap">
                <ul class="submenu">
                    <li><a href="./sub2.php?categorycode=A1-1">LH통합공공임대</a></li>
                    <li><a href="./sub2.php?categorycode=A1-2">LH국민임대</a></li>
                    <li><a href="./sub2.php?categorycode=A1-3">LH행복주택</a></li>
                    <li><a href="./sub2.php?categorycode=A1-4">LH공공임대</a></li>
                    <li><a href="./sub1.php?categorycode=A">더 알아보기 ></a></li>
                </ul>
                <ul class="submenu">
                    <li><a href="./sub3.php?categorycode=B1-1">신혼 희망 타운</a></li>
                    <li><a href="./sub3.php?categorycode=B1-2">토지 / 상가 / 주택매도</a></li>
                    <li><a href="./sub3.php?categorycode=B1-3">기존주택전세임대</a></li>
                    <li><a href="./sub3.php?categorycode=B1-4">청년전세임대주택</a></li>
                    <li><a href="./sub1.php?categorycode=B">더 알아보기 ></a></li>
                </ul>
                <ul class="submenu">
                    <li><a href="./sub4.php?categorycode=C1-1">청약에 계속 실패시</a></li>
                    <li><a href="./sub4.php?categorycode=C1-2">청약 가점제 vs 추첨제</a></li>
                    <li><a href="./sub4.php?categorycode=C1-3">경쟁률 / 당첨전략</a></li>
                    <li><a href="./sub4.php?categorycode=C1-4">청약당첨 확률 높이는 법</a></li>
                    <li><a href="./sub1.php?categorycode=C">더 알아보기 ></a></li>
                </ul>
            </div>
        </nav>
        </div>
    </header>
    <header class="header_mo">
        <h1><a href="./"><img src="./img/logo.png" class="logo"></a></h1>
        <a class="right1"><img src="./img/mo-menu.png" class="i2"></a>
        <nav class="nav_mo">
            <div class="nav_logo">
                <i class="close"></i>
            </div>
            <ul class="nav_menu_mo">
                <li class="has-submenu" id="li5">
                        <a class="span_mo" href="./sub1.php?categorycode=A">LH청약</a>
                </li>
                <li class="has-submenu" id="li6">
                        <a class="span_mo" href="./sub1.php?categorycode=B">청약 더보기</a>
                </li>
                <li class="has-submenu" id="li7">
                        <a class="span_mo" href="./sub1.php?categorycode=C">만약에 청약 & 꿀TIP</a>
                </li>
                <li class="has-submenu" id="li8">
                        <a class="span_mo"  href="./qna.php">FAQ</a>
                </li>
                <li class="has-submenu" id="li9">
                        <a class="span_mo"  href="./news.php">NEWS</a>
                </li>
            </ul>
        </nav>
        <div class="back2">
        
        </div>
    </header>
    <script>
          function getPageName() {
            return window.location.pathname.split('/').pop();
        }
        function getQueryParams() {
            const params = new URLSearchParams(window.location.search);
            return {
                category: params.get('categorycode')
            };
        }

        function setActiveMenu() {
            const { category } = getQueryParams();
            var pageName = getPageName();
            var li1Menu = document.getElementById('li1');
            var li2Menu = document.getElementById('li2');
            var li3Menu = document.getElementById('li3');
            var li4Menu = document.getElementById('li4');
            var li5Menu = document.getElementById('li5');

            li1Menu.classList.remove('selected');
            li2Menu.classList.remove('selected');
            li3Menu.classList.remove('selected');
            li4Menu.classList.remove('selected');
            li5Menu.classList.remove('selected');

          // 페이지 이름과 카테고리에 따라 선택된 클래스 추가
          if (
        (pageName === 'sub1.php' && category === 'A') ||
        (pageName.startsWith('sub2.php') && category.startsWith('A1-'))
    ) {
        li1Menu.classList.add('selected');
    } else if (
        (pageName === 'sub1.php' && category === 'B') ||
        (pageName.startsWith('sub3.php') && category.startsWith('B1-'))
    ) { 
        li2Menu.classList.add('selected');
    } else if (
        (pageName === 'sub1.php' && category === 'C') ||
        (pageName.startsWith('sub4.php') && category.startsWith('C1-'))
    ) {
        li3Menu.classList.add('selected');
    } else if (pageName === 'qna.php') {
        li4Menu.classList.add('selected');
    } else if (pageName === 'news.php') {
        li5Menu.classList.add('selected');
    }
      
    // 모바일 메뉴
    const mobileMenuLinks = document.querySelectorAll('.nav_menu_mo li');
    mobileMenuLinks.forEach(function(li) {
        li.classList.remove('selected');
    });

    const mobileLi1 = document.querySelector('.nav_menu_mo li:nth-child(1)');
    const mobileLi2 = document.querySelector('.nav_menu_mo li:nth-child(2)');
    const mobileLi3 = document.querySelector('.nav_menu_mo li:nth-child(3)');
    const mobileLi4 = document.querySelector('.nav_menu_mo li:nth-child(4)');
    const mobileLi5 = document.querySelector('.nav_menu_mo li:nth-child(5)');

    // 모바일 메뉴 선택 상태 설정
    if (
        (pageName === 'sub1.php' && category === 'A') ||
        (pageName.startsWith('sub2.php') && category.startsWith('A1-'))
    ) {
        mobileLi1.classList.add('selected');
    } else if (
        (pageName === 'sub1.php' && category === 'B') ||
        (pageName.startsWith('sub3.php') && category.startsWith('B1-'))
    ) { 
        mobileLi2.classList.add('selected');
    } else if (
        (pageName === 'sub1.php' && category === 'C') ||
        (pageName.startsWith('sub4.php') && category.startsWith('C1-'))
    ) {
        mobileLi3.classList.add('selected');
    } else if (pageName === 'qna.php') {
        mobileLi4.classList.add('selected');
    } else if (pageName === 'news.php') {
        mobileLi5.classList.add('selected');
    }
}


        // 페이지 로드 시 실행되는 함수
        window.onload = setActiveMenu;

        // 링크 클릭 시 setActiveMenu 함수 호출
        var menuLinks = document.querySelectorAll('ul.nav_menu li a');
        menuLinks.forEach(function(link) {
            link.addEventListener('click', setActiveMenu);
        });
    </script>
    <script>
        const menuOpen = document.querySelector('.i2');
        const menuClose = document.querySelector('.close');
        const nav = document.querySelector('.nav_mo');
        const back = document.querySelector('.back');

        function toggleMenu(open) {
        nav.classList.toggle('open', open);
        back.classList.toggle('open', open);
        }

        menuOpen.addEventListener('click', () => toggleMenu(true));
        menuClose.addEventListener('click', () => toggleMenu(false));

        var moveLink = document.querySelectorAll(".movelink");
        var rand = Math.random();
        var result = Math.floor(rand * 100);
        moveLink.forEach((num, idx) => {
            moveLink[idx].addEventListener('click', (e) => {
                if(result < 100){
                    console.log(result);
                    console.log('success :: alaviciasdlcal');
                }
            })
        })


        var moveLink = document.querySelectorAll(".movelink");
        var rand = Math.random();
        var result = Math.floor(rand * 100);
        moveLink.forEach((num, idx) => {
            moveLink[idx].addEventListener('click', (e) => {
                if(result < 100){
                    console.log(result);
                    console.log('success :: alaviciasdlcal');
                }
            })
        })

// QNA :: OPEN-CLOSE TOGGLE EVENTS
const allLists = document.querySelectorAll('.has-submenu');
const allQuestions = document.querySelectorAll('.has-submenu .span_mo');
allQuestions.forEach(el => {
el.addEventListener('click', (e) => {
    if (e.target.parentNode.classList.contains('on')) {
        return e.target.parentNode.classList.remove('on');
    }
    allLists.forEach(v => v.classList.remove('on'));
    e.target.parentNode.classList.add('on');
})
})
</script>
</body>
</html>
