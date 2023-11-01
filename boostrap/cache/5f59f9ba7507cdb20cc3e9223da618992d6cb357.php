<div class="slider">
        <div class="slider-container">
            <?php
            foreach ($sliderContent as $image) {
                echo '<div class="slide"><img src="' . $image . '" alt="Slider Image"></div>';
            }
            ?>
        </div>
    </div>

    <script>
        let currentIndex = 0;
        const slides = document.querySelectorAll('.slide');
        const totalSlides = <?php echo count($sliderContent); ?>;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.transform = `translateX(-${index * 100}%)`;
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            showSlide(currentIndex);
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            showSlide(currentIndex);
        }

        setInterval(nextSlide, 3000); // Auto slide every 3 seconds
    </script><?php /**PATH C:\xampp\htdocs\E-Commerce\resources\views/layout/slider.blade.php ENDPATH**/ ?>