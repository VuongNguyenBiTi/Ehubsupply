<div class="top-down">
<?php if( have_rows('home_to_top',2) ): ?>
    <?php while( have_rows('home_to_top',2) ): the_row(); 
        $link_fb = get_sub_field('link_fb');
        $zalo = get_sub_field('zalo');
        $phone = get_sub_field('phone');
        ?>
    <?php endwhile; ?>
<?php endif; ?>
    <div class="heart">
        <span>
            <a target="_blank" href="<?php  echo  $link_fb?>">
                <i class="fab fa-facebook-messenger"></i>
            </a>
        </span>
    </div>
    <div class="heart">
        <span>
            <a class="zalo" target="_blank" href="http://zalo.me/<?php  echo  $zalo?>">
                Zalo
            </a>
        </span>
    </div>
    <div class="heart">
        <span>
            <a href="tel:<?php  echo  $phone?>"> <i class="fal fa-phone"></i></a>
            <p></p>
        </span>
    </div>

    <div id="bottom_to_top" onclick="topFunction()" style="bottom: 20px;">
        <div class="h-100 d-flex justify-content-center align-items-center">
            <i class="fal fa-chevron-up"></i>
        </div>
    </div>
</div>

<script>
    //bottom to top
    let mybutton = document.getElementById("bottom_to_top");
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>