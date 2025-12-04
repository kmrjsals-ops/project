        const slides = document.querySelectorAll('.slide-item');
        let currentSlide = 0;
        const slideInterval = 4000; // 4초 간격

        function nextSlide() {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }

        // 슬라이드 자동 전환 시작
        setInterval(nextSlide, slideInterval);

        // 플랫폼별 샘플 데이터
        // title: 게임 이름, genre: 장르, img: 이미지 URL (300x370), link: 상세 페이지 링크
        const allGames = {
            pc: [
                // Placeholder 이미지 크기를 300x370에 맞게 조정
                { title: '썬 클래식', genre: 'MMORPG', img: '../images/game/card01.png', link: '#' },
                { title: '메틴', genre: 'MMORPG', img: '../images/game/card02.png', link: '#' },
                { title: '뮤 레드', genre: 'MMORPG', img: '../images/game/card03.png', link: '#' },
                { title: 'R2', genre: 'MMORPG', img: '../images/game/card04.png', link: '#' },
                { title: '뮤 블루', genre: 'MMORPG', img: '../images/game/card05.png', link: '#' },
                { title: '썬:리미티드 에디션', genre: 'MMORPG', img: '../images/game/card06.png', link: '#' },
                { title: '샷 온라인', genre: 'SPORTS', img: '../images/game/card07.png', link: '#' },
            ],
            mobile: [
                // Placeholder 이미지 크기를 300x370에 맞게 조정
                { title: '뮤 포켓나이츠', genre: 'IDLE RPG', img: '../images/game/card08.png', link: '#' },
                { title: 'R2 ORIGIN', genre: 'MMORPG', img: '../images/game/card09.png', link: '#' },
                { title: '테르비스', genre: 'ANIME RPG', img: '../images/game/card10.png', link: '#' },
                { title: '드래곤소드', genre: 'ACTION RPG', img: '../images/game/card11.png', link: '#' },
                { title: '뮤 모나크2', genre: 'MMORPG', img: '../images/game/card12.png', link: '#' },
                { title: '뮤 모나크', genre: 'MMORPG', img: '../images/game/card13.png', link: '#' },
                { title: '뮤 오리진3', genre: 'MMORPG', img: '../images/game/card14.png', link: '#' },
                { title: 'R2M', genre: 'MMORPG', img: '../images/game/card15.png', link: '#' },
                { title: '뮤 아크엔젤', genre: 'MMORPG', img: '../images/game/card16.png', link: '#' },
            ]
        };

        const tabButtons = document.querySelectorAll('.tab-button');
        const gameListElement = document.getElementById('gameList');
        let currentPlatform = 'pc';

        // 게임 목록을 DOM에 렌더링하는 함수
        function renderGameList(platform) {
            gameListElement.innerHTML = ''; // 기존 목록 초기화
            const games = allGames[platform];

            games.forEach(game => {
                const cardLink = document.createElement('a');
                cardLink.href = game.link; // 링크 설정
                cardLink.classList.add('game-card');
                
                // 카드 HTML 구조
                cardLink.innerHTML = `
                    <div class="card-image" style="background-image: url('${game.img}');"></div>
                    <div class="card-content">
                        <div class="card-title">${game.title}</div>
                        <div class="card-genre">${game.genre}</div>
                    </div>
                `;
                
                gameListElement.appendChild(cardLink);
            });
        }

        // 탭 버튼 클릭 이벤트 핸들러
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const platform = button.dataset.platform;
                
                // 탭 Active 클래스 업데이트
                tabButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                // 게임 목록 업데이트
                currentPlatform = platform;
                renderGameList(currentPlatform);
            });
        });

        // 페이지 로드 시 초기 PC 게임 목록 렌더링
        window.onload = () => {
            renderGameList(currentPlatform);
        };