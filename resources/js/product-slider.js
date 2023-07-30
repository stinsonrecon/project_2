// resources/js/splide-init.js
import Splide from '@splidejs/splide';

document.addEventListener('DOMContentLoaded', function () {
    new Splide('.splide', {
        perPage: 3,
        type: 'loop',
        autoplay: true,
        pauseOnHover: false,
      }).mount();
});
// var splides = document.querySelectorAll('.splide');
// // 1. query slider elements: are there any splide elements?
// console.log('splides', splides);
// if(splides.length){
//     // 2. process all instances
//     for(var i=0; i<splides.length; i++){
//         var splideElement = splides[i];
//         //3.1 if no options are defined by 'data-splide' attribute: take these default options
//         var splideDefaultOptions =
//         {
//             perPage: 3,
//             type: 'loop',
//             autoplay: true,
//             pauseOnHover: false,
//             rewind: true,
//             drag:true,
//             keyboard:true,
//         }
//         /**
//         * 3.2 if options are defined by 'data-splide' attribute: default options will we overridden
//         * see documentation: https://splidejs.com/guides/options/#by-data-attribute
//         **/
//         document.addEventListener('DOMContentLoaded', function () {
//             new Splide(splideElement, splideDefaultOptions).mount();
//         });
//     }
// }
