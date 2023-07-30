<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/732f1c5837.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/frontend/hidden.js') }}"></script>
    <script src="{{ asset('js/frontend/myScript.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/frontend/myStyle.css') }}">
    <link rel="stylesheet" href="">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <link href="{{ asset('css/splide.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/splide.js') }}"></script>
    <script src="{{ asset('js/product-slider.js') }}"></script>

    <title>Document</title>

</head>
<body>
    {{-- @foreach($slidesData->land->linkImg as $img)
        <li class="text-center splide__slide px-3">
            <img class="" src="{{ asset('storage/estate_images') . '/' . $slidesData->idBanking . '/' . $img }}" alt="">
        </li>
    @endforeach --}}
    <div class=" flex-col">
        <div class="flex justify-center items-center bg-blue-400">
            <div class="splide w-3/4 max-w-screen-lg relative overflow-hidden" id="product-slider" data-splide='{"type":"loop","perPage":1}'>
                <!-- Ensure the correct class names for arrows -->
                <div class="splide__arrows hidden lg:block">
                    <button
                        class="splide__arrow splide__arrow--prev text-xl hover:bg-primary-dark text-black dark:text-primary-dark hover:text-white">
                        <i class="fas fa-caret-left"></i>
                    </button>
                    <button
                        class="splide__arrow splide__arrow--next text-xl hover:bg-primary-dark text-black dark:text-primary-dark hover:text-white">
                        <i class="fas fa-caret-right"></i>
                    </button>
                </div>
                <!-- Ensure the correct class names for track and list -->
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($slidesData as $slide)
                            <li class="text-center splide__slide px-3">
                                <h3>{{ $slide['title'] }}</h3>
                                <p>{{ $slide['description'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="flex justify-center items-center bg-red-500">
            <div class="splide w-3/4 max-w-screen-lg relative overflow-hidden" id="product-slider" data-splide='{"type":"loop","perPage":3}'>
                <!-- Ensure the correct class names for arrows -->
                <div class="splide__arrows hidden lg:block">
                    <button
                        class="splide__arrow splide__arrow--prev text-xl hover:bg-primary-dark text-black dark:text-primary-dark hover:text-white">
                        <i class="fas fa-caret-left"></i>
                    </button>
                    <button
                        class="splide__arrow splide__arrow--next text-xl hover:bg-primary-dark text-black dark:text-primary-dark hover:text-white">
                        <i class="fas fa-caret-right"></i>
                    </button>
                </div>
                <!-- Ensure the correct class names for track and list -->
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($slidesData as $slide)
                            <li class="text-center splide__slide px-3">
                                <h3>{{ $slide['title'] }}</h3>
                                <p>{{ $slide['description'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
