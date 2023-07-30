<div class="splide mt-6 xl:mt-10 w-full flex-col sm:flex sm:flex-row propDisplay justify-between items-center relative">
    <div class="splide__arrows hidden lg:block">
        <button
            class="splide__arrow splide__arrow--prev text-2xl text-black hover:text-white hover:bg-orange-600">
            <i class="fas fa-caret-left"></i>
        </button>
        <button
            class="splide__arrow splide__arrow--next text-2xl text-black hover:text-white hover:bg-orange-600">
            <i class="fas fa-caret-right"></i>
        </button>
    </div>
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($news as $new)
            @php
                $stringToReplace = array('Bán ', 'Cho thuê ');;
                $stringFrom = $new->formType->name;
                $loai_hinhthuc =  ucfirst(str_replace($stringToReplace, '',$stringFrom));

                $loai_hinhthuc = str_replace('đ', 'Đ', $loai_hinhthuc);
                if($new->loai_hinhthuc_id == 9 || $new->loai_hinhthuc_id == 18) {
                    $loai_hinhthuc = "Hình thức khác";
                }
            @endphp
                 <li class="mb-6 xl:mb-0 px-1 splide__slide">
                    <a href="{{ route('houseDetail', ['id' => $new->id]) }}" class="w-full h-full flex flex-col border-2">
                        <!-- Image (takes 2/3 of the card) -->
                        <div class="flex-grow" style="height: 300px;">
                            @if ($new->house != null)
                                @php
                                    $imageSrc = $new->house->linkImg != null ? asset('storage/estate_images') . '/' . $new->idBanking . '/' . ($new->house->linkImg)[0] : asset('/images/front-end/home/Rectangle636.png');
                                @endphp
                            @else
                                @php
                                    $imageSrc = $new->land->linkImg != null ? asset('storage/estate_images') . '/' . $new->idBanking . '/' . ($new->land->linkImg)[0] : asset('/images/front-end/home/Rectangle636.png');
                                @endphp
                            @endif
                            <img class="w-full h-full object-fill" src="{{ $imageSrc }}" alt="House Image">
                        </div>
                        <!-- Title, Description, Icons, and Price (takes 1/3 of the card) -->
                        <div class="grid grid-rows-3 p-4 h-2/3 border-t border-gray-400" style="height: 230px">
                            <!-- Title -->
                            <div class="row-span-1"  style="height: 110px">
                                <p class="font-bold text-xl text-clip overflow-hidden" style="height: 60px">{{ $new->title }}</p>
                                <div class="text-sm text-gray-600">
                                    @if ($new->house != null)
                                        @if ($new->house->xaid != null) {{ $new->house->ward->name }}, @endif {{ $new->house->district->name }}, {{ $new->house->city->name }}
                                    @else
                                        @if ($new->land->xaid != null) {{ $new->land->ward->name }}, @endif {{ $new->land->district->name }}, {{ $new->land->city->name }}
                                    @endif
                                </div>
                            </div>
                            <!-- Icons -->
                            <div class="row-span-1 flex items-center space-x-2" style="height: 40%">
                                @if ($new->house != null)
                                    @if ($new->house->phong_ngu != null)
                                        <div><i class="fa-solid fa-bed"></i> {{ $new->house->phong_ngu }}</div>
                                    @endif
                                    @if ($new->house->toilet != null)
                                        <div><i class="fa-solid fa-bath"></i> {{ $new->house->toilet }}</div>
                                    @endif
                                    <div><i class="fa-solid fa-house-chimney"></i> {{ $new->house->dientich }} m²</div>
                                @else
                                    <div><i class="fa-solid fa-map"></i> 100 m²</div>
                                @endif
                                <div class="text-gray-600 truncate">
                                    <span class="font-light" style="color: #C4C4C4;">|</span>
                                    {{ $loai_hinhthuc }}
                                </div>
                            </div>
                            <!-- Price -->
                            <div class="row-span-1 text-green-600 font-bold" style="height: 120px">
                                @if ($new->donvi_id == 1 || $new->donvi_id == 6)
                                    Giá: {{ $new->don_vi->donvi }}
                                @else
                                    Giá: {{ $new->gia }} {{ $new->don_vi->donvi }}
                                @endif
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
