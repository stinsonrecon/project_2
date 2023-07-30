import Splide from '@splidejs/splide';

document.addEventListener('DOMContentLoaded', function () {
    console.log(document.getElementsByClassName('product-slider')[0]);
    if (document.getElementsByClassName('product-slider')[0]) {
        new Splide('.product-slider', {
            perPage: 3,
            type: 'loop',
            autoplay: true,
            pauseOnHover: false,
        }).mount();
    }
});

document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('estate-slider')) {
        new Splide('#estate-slider', {
            perPage: 4,
            type: 'loop',
            autoplay: true,
            pauseOnHover: false,
        }).mount();
    }
});

document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('banner')) {
        new Splide('#banner', {
            perPage: 1,
            height: '400px',
            type: 'loop',
            autoplay: true,
            pauseOnHover: false,
        }).mount();
    }
});
