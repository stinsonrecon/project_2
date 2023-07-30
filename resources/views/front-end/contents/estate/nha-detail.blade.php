@extends('front-end.app')
@section('content')
<div class="mt-20">
    @include('front-end.components.filter')
    <!-- bg -->
    <div class="lg:pr-10 lg:pl-16 pt-10 lg:flex">
        @if ($new->id_nha != null && $new->house->linkImg != null)
            @if (sizeof($new->house->linkImg) > 1)
                <div class="splide w-full lg:w-10/12 relative"
                    data-splide='{"type":"fade","perPage":1,"height": "800px", "width": "100vw", "cover":true, "gap":0, "padding":0, "rewind":true}'>
                    <div class="splide__arrows hidden">
                        <button class="splide__arrow splide__arrow--prev text-2xl hover:bg-green-primary text-black hover:text-white">
                            <i class="fas fa-caret-left"></i>
                        </button>
                        <button class="splide__arrow splide__arrow--next text-2xl hover:bg-green-primary text-black hover:text-white">
                            <i class="fas fa-caret-right"></i>
                        </button>
                    </div>
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($new->house->linkImg as $img)
                                <li class="splide__slide">
                                    <img src="{{ asset('storage/estate_images') . '/' . $new->idBanking . '/' . $img }}" alt="" class="w-full h-full object-fill">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div class="w-full lg:w-10/12 relative" style="height: 400px; background-image: url('{{ asset('images/front-end/bg-nha-detail.png')}}')">
                </div>
            @endif
        @else
            @if ($new->land->linkImg && sizeof($new->land->linkImg) > 1)
                <div class="splide w-full lg:w-10/12 relative"
                    data-splide='{"type":"fade","perPage":1,"height": "800px", "width": "100vw", "cover":true, "gap":0, "padding":0, "rewind":true}'>
                    <div class="splide__arrows hidden">
                        <button class="splide__arrow splide__arrow--prev text-2xl hover:bg-green-primary text-black hover:text-white">
                            <i class="fas fa-caret-left"></i>
                        </button>
                        <button class="splide__arrow splide__arrow--next text-2xl hover:bg-green-primary text-black hover:text-white">
                            <i class="fas fa-caret-right"></i>
                        </button>
                    </div>
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($new->land->linkImg as $img)
                                <li class="splide__slide">
                                    <div>
                                        <img src="{{ asset('storage/estate_images') . '/' . $new->idBanking . '/' . $img }}" alt="" class="w-full h-full object-fill">
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div class="w-full lg:w-10/12 relative" style="height: 400px; background-image: url('{{ asset('images/front-end/bg-nha-detail.png')}}')">
                </div>
            @endif
        @endif

        <div class="w-2/12 hidden lg:block mx-6 p-2 bg-gray-100" style="height: 400px;">
            <div class="font-medium"> Người đăng </div>
            <div> {{ $new -> contact_name }} </div>
            <div class=" h-24 w-24 mt-5 rounded-full mx-auto">
                <img class="rounded-full" alt="A" src="{{ asset('images/customer-avatar.jpg') }}">
            </div>
            <div class="bg-red-500 font-medium mt-5 py-2 text-white text-center rounded-md">{{ $new -> contact_phone }}</div>
            <div class="border-2 font-medium py-2 mt-5 text-center rounded-md hover:bg-red-500 hover:text-white hover:border-red-500">Gửi mail</div>
        </div>
        <div class="text-sm ml-4 w-11/12 sm:w-1/2 top-96 flex sm:left-1/4 fixed z-2 lg:hidden p-2">
            <div class="w-1/2 bg-red-500 font-medium mt-5 py-2 text-white text-center rounded-md">{{ $new -> contact_phone }}</div>
            <div class="w-1/2 border bg-white font-medium py-2 mt-5 ml-3 text-center rounded-md">Gửi mail</div>
        </div>
    </div>
    <!-- thông tin -->
    <div class="lg:px-16 mt-10">
        <div class="w-full lg:w-10/12 px-1 md:px-8 xl:pl-32 font-medium text-xl">
            <div class="pb-10">{{ $new->title }}</div>
            <div class="hidden xl:block bg-gray-200 rounded-md w-full">
                <table class=" text-sm w-full">
                    <tr class="font-normal text-center">
                        <th class="w-1/8 py-1">Nhu cầu</th>
                        <th class="w-1/8 py-1">Khu vực</th>
                        <th class="w-1/8 py-1">Quận/huyện</th>
                        @if($new->id_nha != null)
                            <th class="w-1/8 py-1">Phòng ngủ</th>
                            <th class="w-1/8 py-1">Phòng tắm</th>
                        @endif
                        <th class="w-1/8 py-1">Diện tích</th>
                        <th class="w-1/8 py-1">Giá {{ $new->gia }}</th>
                    </tr>
                    <tr class="font-medium text-red-500 text-center">
                        <td class="w-1/8 py-1">{{ $new->formType->name }}</td>
                        @if($new->id_nha != null)
                            <td class="w-1/8 py-1">{{ $new->house->city->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->city->name }}</td>
                        @endif

                        @if($new->id_nha != null)
                            <td class="w-1/8 py-1">{{ $new->house->district->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->district->name }}</td>
                        @endif

                        @if ($new->id_nha != null)
                            @if($new->house->phong_ngu != null)
                                <td class="w-1/8 py-1">{{ $new->house->phong_ngu }}</td>
                            @else
                                <td class="w-1/8 py-1">-</td>
                            @endif
                        @endif

                        @if ($new->id_nha != null)
                            @if($new->house->toilet != null)
                                <td class="w-1/8 py-1">{{ $new->house->toilet }}</td>
                            @else
                                <td class="w-1/8 py-1">-</td>
                            @endif
                        @endif
                        @if ($new->id_nha != null)
                            <td class="w-1/8 py-1">{{ $new->house->dientich }} m²</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->dientich }} m²</td>
                        @endif
                        <td class="w-1/8 py-1">{{ $new->gia }} {{ $new->don_vi->donvi }}</td>
                    </tr>
                </table>
            </div>
            <div class="hidden lg:block xl:hidden bg-gray-200 rounded-md w-full">
                <table class=" text-sm w-full">
                    <tr class="font-normal text-center">
                        <th class="w-1/8 py-1">Nhu cầu</th>
                        <th class="w-1/8 py-1">Khu vực</th>
                        <th class="w-1/8 py-1">Quận/huyện</th>
                        @if($new->id_nha != null)
                            <th class="w-1/8 py-1">Phòng ngủ</th>
                        @endif
                        <th class="w-1/8 py-1">Diện tích</th>
                        <th class="w-1/8 py-1">Giá</th>
                    </tr>
                    <tr class="font-medium text-red-500 text-center">
                        <td class="w-1/8 py-1">{{ $new->formType->name }}</td>
                        @if($new->id_nha != null)
                            <td class="w-1/8 py-1">{{ $new->house->city->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->city->name }}</td>
                        @endif

                        @if($new->id_nha != null)
                            <td class="w-1/8 py-1">{{ $new->house->district->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->district->name }}</td>
                        @endif

                        @if ($new->id_nha != null)
                            @if($new->house->phong_ngu != null)
                                <td class="w-1/8 py-1">{{ $new->house->phong_ngu }}</td>
                            @else
                                <td class="w-1/8 py-1">-</td>
                            @endif
                        @endif

                        @if ($new->id_nha != null)
                            <td class="w-1/8 py-1">{{ $new->house->dientich }} m²</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->dientich }} m²</td>
                        @endif

                        <td class="w-1/8 py-1">{{ $new->gia }} {{ $new->don_vi->donvi }}</td>
                    </tr>
                </table>
            </div>
            <div class="hidden md:block lg:hidden bg-gray-200 rounded-md w-full">
                <table class=" text-sm w-full">
                    <tr class="font-normal text-center">
                        <th class="w-1/8 py-1">Nhu cầu</th>
                        <th class="w-1/8 py-1">Khu vực</th>
                        <th class="w-1/8 py-1">Quận/huyện</th>
                        <th class="w-1/8 py-1">Diện tích</th>
                        <th class="w-1/8 py-1">Giá</th>
                    </tr>
                    <tr class="font-medium text-red-500 text-center">
                        <td class="w-1/8 py-1">{{ $new->formType->name }}</td>
                        @if($new->id_nha != null)
                            <td class="w-1/8 py-1">{{ $new->house->city->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->city->name }}</td>
                        @endif
                        @if($new->id_nha != null)
                            <td class="w-1/8 py-1">{{ $new->house->district->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->district->name }}</td>
                        @endif
                        @if ($new->id_nha != null)
                            <td class="w-1/8 py-1">{{ $new->house->dientich }} m²</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->dientich }} m²</td>
                        @endif
                        <td class="w-1/8 py-1">{{ $new->gia }} {{ $new->don_vi->donvi }}</td>
                    </tr>
                </table>
            </div>
            <div class="hidden sm:block md:hidden bg-gray-200 rounded-md w-full">
                <table class=" text-sm w-full">
                    <tr class="font-normal text-center">
                        <th class="w-1/8 py-1">Nhu cầu</th>
                        <th class="w-1/8 py-1">Khu vực</th>
                        <th class="w-1/8 py-1">Diện tích</th>
                        <th class="w-1/8 py-1">Giá</th>
                    </tr>
                    <tr class="font-medium text-red-500 text-center">
                        <td class="w-1/8 py-1">{{ $new->formType->name }}</td>
                        @if($new->id_nha != null)
                            <td class="w-1/8 py-1">{{ $new->house->city->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->city->name }}</td>
                        @endif
                        @if ($new->id_nha != null)
                            <td class="w-1/8 py-1">{{ $new->house->dientich }} m²</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->dientich }} m²</td>
                        @endif

                        <td class="w-1/8 py-1">{{ $new->gia }} {{ $new->don_vi->donvi }}</td>
                    </tr>
                </table>
            </div>
            <div class="sm:hidden bg-gray-200 rounded-md w-full">
                <table class=" text-sm w-full">
                    <tr class="font-normal text-center">
                        <th class="w-1/8 py-1">Nhu cầu</th>
                        <th class="w-1/8 py-1">Khu vực</th>
                        <th class="w-1/8 py-1">Diện tích</th>
                        <th class="w-1/8 py-1">Giá</th>
                    </tr>
                    <tr class="font-medium text-red-500 text-center">
                        <td class="w-1/8 py-1">{{ $new->formType->name }}</td>
                        @if($new->id_nha != null)
                            <td class="w-1/8 py-1">{{ $new->house->city->name }}</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->city->name }}</td>
                        @endif
                        @if ($new->id_nha != null)
                            <td class="w-1/8 py-1">{{ $new->house->dientich }} m²</td>
                        @else
                            <td class="w-1/8 py-1">{{ $new->land->dientich }} m²</td>
                        @endif
                        <td class="w-1/8 py-1">{{ $new->gia }} {{ $new->don_vi->donvi }}</td>
                    </tr>
                </table>
            </div>
            <div class="pt-10 text-sm font-normal">
                <div class="text-xl font-bold">Thông tin</div>
                <div class="pt-5">
                    @if ($new->id_nha != null)
                        {!! $new->house->mo_ta !!}
                    @else
                         {!! $new->land->mo_ta !!}
                    @endif

                </div>
            </div>

            <div class="pt-10 text-sm font-normal">
                <div class="text-xl font-bold">Chi tiết bất động sản</div>
                <div class="pt-5">
                    <table class="text-sm w-full">
                        <tr class="text-center">
                            <th class="w-4/12 font-bold py-1 border">Loại bất động sản</th>
                            <th class="w-7/12 font-normal py-1 border">{{ $new->formType->name }}</th>
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1 border">Khu vực</td>
                            @if($new->id_nha != null)
                                <td class="w-7/12 py-1 border">{{ $new->house->city->name }}</td>
                            @else
                                <td class="w-7/12 py-1 border">{{ $new->land->city->name }}</td>
                            @endif
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1 border">Quận/Huyện</td>
                            @if($new->house != null)
                                <td class="w-7/12 py-1 border">{{ $new->house->district->name }}</td>
                            @else
                                <td class="w-7/12 py-1 border">{{ $new->land->district->name }}</td>
                            @endif
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1 border">Đường/phố</td>
                            @if($new->id_nha != null)
                                <td class="w-7/12 py-1 border">{{ $new->house->ten_duong }} @if($new->house->xaif != null) , {{ $new->house->ward->name }}@endif</td>
                            @else
                                <td class="w-7/12 py-1 border">{{ $new->land->ten_duong }} @if($new->land->xaif != null) , {{ $new->land->ward->name }}@endif</td>
                            @endif
                        </tr>
                        @if ($new->id_nha != null && $new->house->phong_ngu != null)
                            <tr class="text-center">
                                <td class="w-4/12 font-bold py-1 border">Phòng ngủ</td>
                                <td class="w-7/12 py-1 border">{{ $new->house->phong_ngu }} phòng</td>
                            </tr>
                        @endif
                        @if ($new->id_nha != null && $new->house->toilet != null)
                            <tr class="text-center">
                                <td class="w-4/12 font-bold py-1 border">Phòng tắm</td>
                                <td class="w-7/12 py-1 border">{{ $new->house->toilet }} phòng</td>
                            </tr>
                        @endif
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1 border">Diện tích</td>
                            @if ($new->id_nha != null)
                                <td class="w-7/12 py-1 border">{{ $new->house->dientich }} m²</td>
                            @else
                                <td class="w-7/12 py-1 border">{{ $new->land->dientich }} m²</td>
                            @endif
                        </tr>
                        <tr class="text-center">
                            @if ($new->id_nha != null)
                                @if($new->house->huong_nha != null)
                                    <td class="w-4/12 font-bold py-1 border">Hướng nhà</td>
                                    <td class="w-7/12 py-1 border">
                                        @switch($new->house->huong_nha)
                                            @case(1)
                                                Đông
                                                @break
                                            @case(2)
                                                Tây
                                                @break
                                            @case(3)
                                                Nam
                                                @break
                                            @case(4)
                                                Bắc
                                                @break
                                            @case(5)
                                                Đông Bắc
                                                @break
                                            @case(6)
                                                Tây Bắc
                                                @break
                                            @case(7)
                                                Đông Nam
                                                @break
                                            @case(8)
                                                Tây Nam
                                                @break
                                            @default
                                                &nbsp
                                                @break
                                        @endswitch
                                    </td>
                                @endif
                            @else
                                @if($new->land->huong_nha != null)
                                    <td class="w-4/12 font-bold py-1 border">Hướng đất</td>
                                    <td class="w-7/12 py-1 border">
                                        @switch($new->land->huong_nha)
                                            @case(1)
                                                Đông
                                                @break
                                            @case(2)
                                                Tây
                                                @break
                                            @case(3)
                                                Nam
                                                @break
                                            @case(4)
                                                Bắc
                                                @break
                                            @case(5)
                                                Đông Bắc
                                                @break
                                            @case(6)
                                                Tây Bắc
                                                @break
                                            @case(7)
                                                Đông Nam
                                                @break
                                            @case(8)
                                                Tây Nam
                                                @break
                                            @default
                                                &nbsp
                                                @break
                                        @endswitch
                                    </td>
                                @endif
                            @endif
                        </tr>
                        @if($new->id_nha != null && $new->house->huong_ban_cong != null)
                            <tr class="text-center">
                                <td class="w-4/12 font-bold py-1 border">Hướng ban công</td>
                                <td class="w-7/12 py-1 border">
                                    @switch($new->house->huong_ban_cong)
                                        @case(1)
                                            Đông
                                            @break
                                        @case(2)
                                            Tây
                                            @break
                                        @case(3)
                                            Nam
                                            @break
                                        @case(4)
                                            Bắc
                                            @break
                                        @case(5)
                                            Đông Bắc
                                            @break
                                        @case(6)
                                            Tây Bắc
                                            @break
                                        @case(7)
                                            Đông Nam
                                            @break
                                        @case(8)
                                            Tây Nam
                                            @break
                                        @default
                                            &nbsp
                                            @break
                                    @endswitch
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>

            <div class="pt-10 text-sm font-normal">
                <div class="text-xl font-bold">Thông tin đơn vị bán</div>
                <div class="pt-5">
                    <table class="text-sm w-full">
                        <tr class="text-center">
                            <td class="w-4/12 bg-gray-100 font-bold py-1">Đơn vị</td>
                            <td class="w-7/12 bg-gray-100 py-1">Cá nhân</td>
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1">Tên</td>
                            <td class="w-7/12 py-1">{{ $new->contact_name }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 bg-gray-100 font-bold py-1">Nơi sống</td>
                            <td class="w-7/12 bg-gray-100 py-1">{{ $new->address }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1">Số dự án</td>
                            <td class="w-7/12 py-1">1000</td>
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 bg-gray-100 font-bold py-1">Ngày đăng</td>
                            <td class="w-7/12 bg-gray-100 py-1">{{ $new->startTime }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 font-bold py-1">Ngày hết hạn</td>
                            <td class="w-7/12 py-1">{{ $new->endTime }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="w-4/12 bg-gray-100 font-bold py-1">Số người liên hệ</td>
                            <td class="w-7/12 bg-gray-100 py-1">5</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="pt-10 text-sm font-normal">
                <div class="text-xl pb-5 font-bold">Xem trên bản đồ</div>
                <div class="w-full h-60 bg-gray-100"></div>
            </div>
        </div>

        <div>
            <div class="text-xl pb-5 pt-20 font-bold">
                Bất động sản cùng khu vực
            </div>
        <div>
            <div class="mt-5 w-full flex justify-between items-center">
                <div class=" mt-6 xl:mt-10 w-full flex-col sm:flex sm:flex-row propDisplay justify-between items-center relative">
                    <div class="splide__arrows hidden lg:block">
                        <button
                            class="splide__arrow splide__arrow--prev text-2xl text-black hover:text-orange-600 hover:bg-orange-600">
                            <i class="fas fa-caret-left"></i>
                        </button>
                        <button
                            class="splide__arrow splide__arrow--next text-2xl text-black hover:text-orange-600 hover:bg-orange-600">
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
                                <li class="mb-6 xl:mb-0 flex-col splide__slide">
                                    <div class="housePreviewBox" style="height: 550px">
                                        @if ($new->house != null)
                                            <a href=" {{ route('houseDetail', ['id' => $new->id]) }}">
                                                <div style="height: 313px">
                                                    @if ($new->house->linkImg != null)
                                                        <img class="w-full h-full object-contain" src="{{ asset('storage/estate_images') . '/' . $new->idBanking . '/' . ($new->house->linkImg)[0] }}"
                                                        alt="">
                                                    @else
                                                        <img class="w-full h-full object-contain" src="{{ asset('/images/front-end/home/Rectangle636.png') }}"
                                                        alt="">
                                                    @endif
                                                </div>
                                                <div class=" grid grid-cols-1">
                                                    <div class="pt-4 px-5 font-medium">{{ $new->title }}</div>
                                                    <div class="py-1 px-5 text-sm font-light row-span-2" style="color: #888686;">@if($new->house->xaid != null) {{ $new->house->ward->name }}, @endif {{ $new->house->district->name }}, {{ $new->house->city->name }}
                                                    </div>
                                                    <div class="px-5">
                                                        <div class="w-full flex justify-between py-1 font-medium"
                                                            style="border-top: solid 1px #C4C4C4;">
                                                            @if ($new->house->phong_ngu != null)
                                                                <div>
                                                                    <i class="fa-solid fa-bed"></i> {{ $new->house->phong_ngu }}
                                                                </div>
                                                            @endif
                                                            @if ($new->house->toilet != null)
                                                                <div>
                                                                    <i class="fa-solid fa-bath"></i> {{ $new->house->toilet }}
                                                                </div>
                                                            @endif
                                                            <div><i class="fa-solid fa-house-chimney"></i> {{ $new->house->dientich }} m²</div>
                                                            <div class="font-light" style="color: #888686;">
                                                                <span class="font-light" style="color: #C4C4C4;">|</span>
                                                                {{ $loai_hinhthuc }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if ($new->donvi_id == 1 || $new->donvi_id == 6)
                                                        <div class="px-5 py-1 font-medium mb-4" style="color: #696969;">Giá: {{ $new->don_vi->donvi }}</div>
                                                    @else
                                                    <div class="px-5 py-1 font-medium mb-4" style="color: #696969;">Giá: {{ $new->gia }} {{ $new->don_vi->donvi }}</div>
                                                    @endif
                                                </div>
                                            </a>
                                        @else
                                            <a href=" {{ route('houseDetail', ['id' => $new->id]) }}">
                                                <div class="h-2/3">
                                                    @if ($new->land->linkImg != null)
                                                        <img class="w-full h-full object-contain" src="{{ asset('storage/estate_images') . '/' . $new->idBanking . '/' . ($new->land->linkImg)[0] }}"
                                                        alt="">
                                                    @else
                                                        <img class="w-full h-full object-contain" src="{{ asset('/images/front-end/home/Rectangle636.png') }}"
                                                        alt="">
                                                    @endif
                                                </div>
                                                <div class=" grid grid-cols-1">
                                                    <div class="pt-4 px-5 font-medium">{{ $new->title }}</div>
                                                    <div class="py-1 px-5 text-sm font-light row-span-2" style="color: #888686;">@if($new->land->xaid != null) {{ $new->land->ward->name }}, @endif {{ $new->land->district->name }}, {{ $new->land->city->name }}
                                                    </div>
                                                    <div class="px-5">
                                                        <div class="w-full flex justify-between py-1 font-medium"
                                                            style="border-top: solid 1px #C4C4C4;">
                                                            <div><i class="fa-solid fa-map"></i> 100 m²</div>
                                                            <div class="font-light" style="color: #888686;">
                                                                <span class="font-light" style="color: #C4C4C4;">|</span>
                                                                {{ $loai_hinhthuc }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if ($new->donvi_id == 1 || $new->donvi_id == 6)
                                                        <div class="px-5 py-1 font-medium mb-4" style="color: #696969;">Giá: {{ $new->don_vi->donvi }}</div>
                                                    @else
                                                    <div class="px-5 py-1 font-medium mb-4" style="color: #696969;">Giá: {{ $new->gia }} {{ $new->don_vi->donvi }}</div>
                                                    @endif
                                                </div>
                                            </a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
            <div class="mt-8 flex justify-center">
                <div class="px-8 py-2 rounded" style="border: solid 1px #C4C4C4;">
                    <a class="text-black font-medium" href="#">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
