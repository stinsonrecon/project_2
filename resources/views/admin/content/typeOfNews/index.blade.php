@extends('admin.app')

@section('title')
<title>Quản lý loại tin đăng</title>
@endsection

@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    @include('admin.components.header')
    <main>
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Danh sách loại tin đăng</h1>
        </div>
        <!-- Content -->
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif
        <div class=" h-screen">
            <div class="mt-2">
                <div class="overflow-x-auto flex flex-col">
                    @can('create news_type')
                        <div class="flex flex-row-reverse">
                            <div class="m-6">
                                <a href="{{ route('admin.typeOfNews.create') }}"
                                class="btn focus:outline-none focus:shadow-outline"
                                type="button">
                                    Thêm loại tin tức
                                </a>
                            </div>
                        </div>
                    @endcan

                    <div class=" w-11/12  mx-auto mx-8 bg-green-700  table-auto">
                        @if(session()->has('success'))

                        <div class="bg-green-300 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                                <div class="py-1"><i class=" fas fa-check-circle fill-current h-6 w-6 text-green-700 mr-4"> </i></div>

                                <div>

                                    <p class="text-lg">{{ session()->get('success') }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div>
                        <div class=" w-11/12  mx-auto mx-8  table-auto pb-5">
                            {{ $newsTypes->links() }}
                        </div>
                        <table class=" w-11/12  mx-auto mx-8  table-auto">
                            <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Tên loại tin tức</th>
                                <th class="py-3 px-6 text-left">Giá</th>
                                @if(auth()->user()->can('edit news_type') || auth()->user()->can('delete news_type'))
                                    <th class="py-3 px-6 text-center">Hành động</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody class="text-sm font-light">
                                @foreach ($newsTypes as $newsType)
                                    <tr class="border-b border-gray-200 hover:bg-gray-200 hover:text-black">
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="font-medium">{{$newsType->name}}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="font-medium">{{number_format($newsType->gia)}}</span>
                                            </div>
                                        </td>
                                        @if(auth()->user()->can('edit news_type') || auth()->user()->can('delete news_type'))
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex item-center justify-center">
                                                    @if(auth()->user()->can('edit news_type'))
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <a href="{{ route('admin.typeOfNews.edit', ['newsType' => $newsType->id]) }}" class="">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </div>
                                                    @endif
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </main>
    @include('admin.components.footer')
</div>
@include('admin.components.panel')
@endsection
@section('js')

<script src="{{ asset('js/backend/bank/index.js') }}"></script>
@endsection
