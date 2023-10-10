    <!-- Slideshow container -->
    <div class="slide-show">
        <div class="slideshow-container">
            <!-- Full-width images with number and caption text -->
            <div class="mySlides">
                <img src="../view/image/slide01.jpg" style="width:100%;height:400px">
            </div>

            <div class="mySlides">
                <img src="../view/image/slide02.jpg" style="width:100%;height:400px">
            </div>

            <div class="mySlides">
                <img src="../view/image/slide03.jpg" style="width:100%;height:400px">
            </div>

            <div class="mySlides">
                <img src="../view/image/slide04.jpg" style="width:100%;height:400px">
            </div>

            <div class="mySlides">
                <img src="../view/image/slide05.jpg" style="width:100%;height:400px">
            </div>

            <div class="mySlides">
                <img src="../view/image/slide06.jpg" style="width:100%;height:400px">
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
            <span class="dot" onclick="currentSlide(6)"></span>
        </div>
    </div>
    <?php
        require 'view/dssanpham.php';
    ?>