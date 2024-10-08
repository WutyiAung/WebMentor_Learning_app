
// document.addEventListener('DOMContentLoaded', function () {
//     const darkModeToggle = document.getElementById('darkModeToggle');

//     // Check if dark mode preference is set in local storage
//     const darkMode = localStorage.getItem('darkMode');

//     if (darkMode === 'enabled') {
//         enableDarkMode();
//     }

//     // Toggle dark mode when button is clicked
//     darkModeToggle.addEventListener('click', function () {
//         if (document.body.classList.contains('dark-mode')) {
//             // Disable dark mode
//             disableDarkMode();
//         } else {
//             // Enable dark mode
//             enableDarkMode();
//         }
//     });

//     function enableDarkMode() {
//         document.body.classList.add('dark-mode');
//         localStorage.setItem('darkMode', 'enabled');
//     }

//     function disableDarkMode() {
//         document.body.classList.remove('dark-mode');
//         localStorage.setItem('darkMode', null);
//     }
// });



(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').css('top', '0px');
        } else {
            $('.sticky-top').css('top', '-100px');
        }
    });


    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function () {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
                function () {
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function () {
                    const $this = $(this);
                    $this.removeClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "false");
                    $this.find($dropdownMenu).removeClass(showClass);
                }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Header carousel
    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });

})(jQuery);

// searchbar dropdown
function selectCategory(id, name) {
    document.getElementById('category_id').value = id;
    document.querySelector('.dropdown-toggle').textContent = name;
}
// COMMENTS
document.addEventListener('DOMContentLoaded', function() {
    // Show edit form
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function() {
            const commentDiv = this.closest('.comment');
            commentDiv.querySelector('.comment-text').classList.add('d-none');
            commentDiv.querySelector('.edit-form').classList.remove('d-none');
        });
    });

    // Cancel edit
    document.querySelectorAll('.cancel-edit').forEach(button => {
        button.addEventListener('click', function() {
            const commentDiv = this.closest('.edit-form').closest('.comment');
            commentDiv.querySelector('.comment-text').classList.remove('d-none');
            commentDiv.querySelector('.edit-form').classList.add('d-none');
        });
    });

    // Show reply form
    document.querySelectorAll('.reply-button').forEach(button => {
        button.addEventListener('click', function() {
            const replyForm = this.nextElementSibling;
            replyForm.classList.toggle('d-none');
        });
    });

    // Cancel reply
    document.querySelectorAll('.cancel-reply').forEach(button => {
        button.addEventListener('click', function() {
            const replyForm = this.closest('.reply-form');
            replyForm.classList.add('d-none');
        });
    });

    // Show/hide replies
    document.querySelectorAll('.reply-button').forEach(button => {
        button.addEventListener('click', function() {
            const replyContainer = this.closest('.comment').querySelector('.reply-container');
            replyContainer.classList.toggle('d-none');
        });
    });
});





