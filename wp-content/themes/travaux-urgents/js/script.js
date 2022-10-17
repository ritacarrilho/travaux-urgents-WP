// console.log('start');

/* ------ MMENU MOBILE ------ */
let menuMobileBtn = document.querySelector( '#menu-btn' ); // burger btn
let navBar = document.querySelector( '.menu-nav' ); // navbar
let body = document.querySelector( 'body' ); // body
let menuLi = document.querySelectorAll(' #menu-li' ); // menu li
let closeBtn = document.querySelector( '#close-menu-btn' ); // close menu mobile btn
let navLogo = document.querySelector( '#mobile-ul-logo' ); // mobile logo

// Open and close menu mobile
function menuMobileToggle() {
    navBar.classList.toggle( 'is-hidden' );
    closeBtn.classList.toggle( 'is-hidden' );
    navLogo.classList.toggle( 'is-hidden' );
    body.classList.toggle( 'disable-scroll-y' );
}

// Open and close navbar menu mobile
menuMobileBtn.addEventListener( 'click', menuMobileToggle );
closeBtn.addEventListener( 'click', menuMobileToggle);

// Close navbar when li click
menuLi.forEach(element => {
    element.addEventListener( 'click', function() {
        navBar.classList.add( 'is-hidden' );
        body.classList.remove( 'disable-scroll-y' );
    });
});

// document.querySelector( '#menu-btn').addEventListener( 'click', function() {
//     document.querySelector( '#nav-bar' ).classList.toggle( 'is-hidden' );
//     console.log('click');
// });

if ( window.innerWidth >= 1024 ) {
    navBar.classList.remove( 'is-hidden' );
} else {
    navBar.classList.add( 'is-hidden' );
}

/* ------ HOME SLIDERS ------ */
/* Home Info Slider */
document.addEventListener( 'DOMContentLoaded', function() {
    var splide = new Splide( '#splide-home', {
        rewind: true,
        perMove: 1,
        arrows: false, // slide arrows
        pagination: false, // slide dots
        autoplay: true,
        interval: 2000, // autoplay timmer
        pauseOnHover: true, //pause when mouse hovers
    } );
    splide.mount();
} );

/* Services Slider */
document.addEventListener( 'DOMContentLoaded', function() {
    var splide = new Splide( '#splide-services', {
        arrows: false, // slide arrows
        pagination: false, // slide dots
        autoplay: false,
        start: 0,
        trimSpace: 'move',
        gap: '1em',
        autoWidth: true,
        // width: '100%',
        padding: '1rem', // start of slider gap
        mediaQuery: 'min',
        breakpoints: {
            2560: {
                // padding: '0rem',
                destroy: true
            },
        }
    } );
    splide.mount();
} );

/* Home parlent de nous Slide */
document.addEventListener( 'DOMContentLoaded', function() {
    var splide = new Splide( '#parlent-splide', {
        arrows: false, // slide arrows
        type   : 'loop',
        start: 1,
        rewind: true,
        perMove: 1,
        trimSpace: 'move',
        perPage: 3,
        gap: '1em',
        breakpoints: {
            1024: {
                perPage: 2,
            },
            430: {
                perPage: 1,
            },
        }, 
        classes: {
            pagination: 'splide__pagination splider-pagination',
            page      : 'splide__pagination__page dot-pagination',
        },
    });
    splide.mount();
} );

// Form Search from input
searchInput = document.querySelector('#search-category');

searchInput.addEventListener('keyup', function(e) {
    console.log(e.target.value);
});