@extends('admin.app')

@section('title')
<title>Thêm mới loại tin đăng</title>
@endsection

@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    @include('admin.components.header')
    <main>
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Quản lý loại tin đăng | Thêm mới</h1>
        </div>
        <!-- Content -->
        <div class=" h-screen">
            <form class=" rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('admin.typeOfNews.store') }}" >
                @csrf
                <div class="mb-4">
                    <label class="block  text-sm font-bold mb-2" >
                        Tên loại tin tức
                        <span class="text-red-500  text-base">*</span>
                    </label>
                    <input value="{{old('name')}}" class="@error('name') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3
                            leading-tight focus:outline-none focus:shadow-outline text-dark"
                           id="name" name="name" type="text" placeholder="Nhập tên loại tin tức" required>
                </div>
                @error('name')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror


                <div class="mb-6">
                    <label class="block  text-sm font-bold mb-2" >
                        Giá tin
                        <span class="text-red-500  text-base">*</span>
                    </label>
                    <input value="{{old('price')}}" class="@error('price') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3
                            leading-tight focus:outline-none focus:shadow-outline text-dark"
                           id="price" name="price" type="number" placeholder="Nhập tên chủ tài khoản" required>
                </div>
                @error('price')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror

                <div class="flex items-center justify-between">
                    <button class="btn focus:outline-none focus:shadow-outline" type="submit">
                        Thêm mới
                    </button>
                </div>
            </form>
        </div>


    </main>
    @include('admin.components.footer')
</div>
@include('admin.components.panel')
@endsection
