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
        