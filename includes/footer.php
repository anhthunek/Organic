 <div class="container-fluid">
     <div class="row text-center mt-4" style="border: 0.5px solid rgb(228, 228, 228);">
         <div class="pt-5"></div>
         <div class="col-md-4">
             <div class="footer-img mb-4">
                 <img style="width: 100px;" src="https://demo.casethemes.net/organio/wp-content/themes/orgio/assets/images/logo-mobile.png" alt="">
             </div>
             <div class="footer-infor mb-2">
                 <ul>
                     <li><i class="fa fa-home " style="color: #76A713;" aria-hidden="true"></i>83A-B Block, Ho Chi Minh City</li>
                     <li><i class="fa fa-phone " style="color: #76A713;" aria-hidden="true"></i>+84 963449773</li>
                     <li><i class="fa fa-envelope " style="color: #76A713;" aria-hidden="true"></i>abcxyz@gmail.com</li>


                 </ul>
             </div>
             <div class="footer-social text-center">
                 <ul>
                     <li><a href="" class="fa fa-facebook" aria-hidden="true"></a></li>
                     <li><a href="" class="fa fa-instagram" aria-hidden="true"></a></li>
                     <li><a href="" class="fa fa-twitter" aria-hidden="true"></a></li>
                     <li><a href="" class="fa fa-pinterest" aria-hidden="true"></a></li>
                     <li><a href="" class="fa fa-youtube-play" aria-hidden="true"></a></li>
                 </ul>
             </div>
         </div>
         <div class="col-md-4">
             <h3 class="footer-title">
                 Information
             </h3>
             <ul>
                 <li><a href="">FAQs</a></li>
                 <li><a href="">Shipments</a></li>
                 <li><a href="">Purchase Policy</a></li>
                 <li><a href="">About Us</a></li>
                 <li><a href="">Login</a></li>
             </ul>
         </div>
         <div class="col-md-4">
             <h3 class="footer-title">
                 Services
             </h3>
             <ul>
                 <li><a href="">Help</a></li>
                 <li><a href="">Discounts</a></li>
                 <li><a href="">Return</a></li>
                 <li><a href="">Contact Us</a></li>

             </ul>
         </div>
     </div>
 </div>
 <!-- JS -->
 <script src="./assets/js/jquery.min.js"></script>
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js"> </script> -->
 <script src="./assets/js/boostrap.bundle.min.js"></script>
 <!-- Swiper -->
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script src="./assets/js/reviews.js"></script>
 <script src="./assets/js/custom.js"></script>
 <!-- Alertify -->
 <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
 <script>
     alertify.set('notifier', 'position', 'top-right');
     <?php if (isset($_SESSION['message'])) {
        ?>
         alertify.success('<?= $_SESSION['message'] ?>');
     <?php
            unset($_SESSION['message']);
        } ?>
 </script>
 <script>
     var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
     var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
         return new bootstrap.Tooltip(tooltipTriggerEl)
     })

     const swiper = new Swiper('.swiper_1', {
         // Optional parameters
         // direction: 'vertical',
         loop: true,
         spaceBetween: 30,
         // If we need pagination
         pagination: {
             el: '.swiper-pagination',
             clickable: true,
         },
         autoplay: {
             delay: 2500, // Thời gian chờ giữa các slide (miliseconds)
             disableOnInteraction: true, // Tắt autoplay khi người dùng tương tác với swiper
         },
         // Navigation arrows
         navigation: {
             nextEl: '.swiper-button-next',
             prevEl: '.swiper-button-prev',
         },

     });
     const swiper1 = new Swiper('.swiper_2', {
         // Optional parameters
         // direction: 'vertical',
         loop: true,
         spaceBetween: 30,
         slidesPerView: 5,
         // If we need pagination

         autoplay: {
             delay: 2500, // Thời gian chờ giữa các slide (miliseconds)
             disableOnInteraction: true, // Tắt autoplay khi người dùng tương tác với swiper
         },
         // Navigation arrows
         navigation: {
             nextEl: '.swiper-button-next',
             prevEl: '.swiper-button-prev',
         },
         breakpoints: {
             // Tùy chọn responsive dựa trên chiều rộng màn hình
             300: {
                 slidesPerView: 2,
                 spaceBetween: 20,
             },
             768: {
                 slidesPerView: 3,
                 spaceBetween: 30,
             },
             1024: {
                 slidesPerView: 5,
                 spaceBetween: 40,
             },
         },

     });
     const swiper3 = new Swiper('.swiper_3', {
         // Optional parameters
         // direction: 'vertical',
         loop: true,
         spaceBetween: 30,
         slidesPerView: 5,
         // If we need pagination
         speed: 4000,
         autoplay: {
             delay: 0, // Thời gian chờ giữa các slide (miliseconds)

             disableOnInteraction: true, // Tắt autoplay khi người dùng tương tác với swiper
         },
         // Navigation arrows
         navigation: {
             nextEl: '.swiper-button-next',
             prevEl: '.swiper-button-prev',
         },
         breakpoints: {
             // Tùy chọn responsive dựa trên chiều rộng màn hình
             300: {
                 slidesPerView: 3,
                 spaceBetween: 20,
             },
             768: {
                 slidesPerView: 4,
                 spaceBetween: 30,
             },
             1024: {
                 slidesPerView: 5,
                 spaceBetween: 40,
             },
         },

     });
     const swiper4 = new Swiper('.swiper_4', {
         // Optional parameters
         // direction: 'vertical',
         loop: true,
         spaceBetween: 30,
         slidesPerView: 3,
         // If we need pagination
         speed: 4000,
         autoplay: {
             delay: 0, // Thời gian chờ giữa các slide (miliseconds)
             disableOnInteraction: true, // Tắt autoplay khi người dùng tương tác với swiper
         },
         // Navigation arrows
         pagination: {
             el: '.swiper-pagination',
             clickable: true,
         },
         breakpoints: {
             // Tùy chọn responsive dựa trên chiều rộng màn hình
             300: {
                 slidesPerView: 1,
                 spaceBetween: 20,
             },
             768: {
                 slidesPerView: 2,
                 spaceBetween: 30,
             },
             1024: {
                 slidesPerView: 3,
                 spaceBetween: 40,
             },
         },
     });
     const swiper5 = new Swiper('.swiper_5', {
         // Optional parameters
         loop: true,
         spaceBetween: 10,
         slidesPerView: 3,
         // If we need pagination
         speed: 1000,
        //   autoplay: {
        //       delay: 0, // Thời gian chờ giữa các slide (miliseconds)
        //       disableOnInteraction: true, // Tắt autoplay khi người dùng tương tác với swiper
        //   },
         // Navigation arrows
         navigation: {
             nextEl: '.swiper-button-next',
             prevEl: '.swiper-button-prev',
         },
         breakpoints: {
             // Tùy chọn responsive dựa trên chiều rộng màn hình
             300: {
                 slidesPerView: 1,
                 spaceBetween: 20,
             },
             768: {
                 slidesPerView: 1,
                 spaceBetween: 30,
             },
             1024: {
                 slidesPerView: 3,
                 spaceBetween: 40,
             },
         },
     });
     const swiper6 = new Swiper('.swiper_6', {
         // Optional parameters
         loop: true,
         spaceBetween: 10,
         slidesPerView: 4,
         // If we need pagination
         speed: 1000,
       
         // Navigation arrows
         navigation: {
             nextEl: '.swiper-button-next',
             prevEl: '.swiper-button-prev',
         },
         breakpoints: {
             // Tùy chọn responsive dựa trên chiều rộng màn hình
             300: {
                 slidesPerView: 1,
                 spaceBetween: 20,
             },
             768: {
                 slidesPerView: 3,
                 spaceBetween: 30,
             },
             1024: {
                 slidesPerView: 4,
                 spaceBetween: 30,
             },
         },
     });
 </script>
 <script>
     $(function() {
         $("#slider-range").slider({
             range: true,
             min: 0,
             max: 50,
             values: [<?php echo $min; ?>, <?php echo $max; ?>],
             slide: function(event, ui) {
                 $("#amount").html("$" + ui.values[0] + " - $" + ui.values[1]);
                 $("#min").val(ui.values[0]);
                 $("#max").val(ui.values[1]);
             }
         });
         $("#amount").html("$" + $("#slider-range").slider("values", 0) +
             " - $" + $("#slider-range").slider("values", 1));


     });
     
 </script>
 <script>
     function toggleAnswer(id) {
         var answer = document.getElementById('answer' + id);
         answer.style.display = (answer.style.display === 'none' || answer.style.display === '') ? 'block' : 'none';
     }

 </script>
 <script>if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }</script>
 </body>

 </html>