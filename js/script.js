jQuery(function ($) {  
    if ($('.fadeIn').length) {
        scrollAnimation();
    }
    
    function scrollAnimation() {
        $(window).scroll(function () {
            $(".fadeIn").each(function () {
                let position = $(this).offset().top,
                    scroll = $(window).scrollTop(),
                    windowHeight = $(window).height();

                if (scroll > position - windowHeight + 200) {
                    $(this).addClass('fade');
                }
            });
        });
    }
    $(window).trigger('scroll');
});

jQuery(function ($) {  
    if ($('.anim-box').length) {
        scrollAnimation();
    }
    
    function scrollAnimation() {
        $(window).scroll(function () {
            $(".anim-box").each(function () {
                let position = $(this).offset().top,
                    scroll = $(window).scrollTop(),
                    windowHeight = $(window).height();

                if (scroll > position - windowHeight + 200) {
                    $(this).addClass('slide');
                }
            });
        });
    }
    $(window).trigger('scroll');
});

// Vanilla JS
const btn = document.querySelector('.Archive__button');
const nav = document.querySelector('.Archive__list');

if (btn) { 
    btn.addEventListener('click', () => {
        nav.classList.toggle('open-menu');
        btn.innerHTML = btn.innerHTML === 'カテゴリーメニュー'
        ? '閉じる'
        : 'カテゴリーメニュー';
    });
}

