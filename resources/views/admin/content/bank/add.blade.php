@extends('admin.app')

@section('title')
<title>Thêm mới tài khoản ngân hàng</title>
@endsection

@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    @include('admin.components.header')
    <main>
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Quản lý tài khoản ngân hàng | Thêm mới</h1>
        </div>
        <!-- Content -->
        <div class=" h-screen">
            <form class=" rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('admin.bank.store')}}" >
                @csrf
                <div class="mb-4">
                    <label class="block  text-sm font-bold mb-2" >
                        Tên ngân hàng
                        <span class="text-red-500 text-base">*</span>
                    </label>
                    <input value="{{old('bankName')}}" class="@error('bankName') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3
                    leading-tight focus:outline-none focus:shadow-outline text-dark" id="bankName" name="bankName" type="text" placeholder="Nhập tên ngân hàng" required>
                </div>
                @error('bankName')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror

                <div class="mb-6">
                    <label class="block  text-sm font-bold mb-2" >
                        Chủ tài khoản
                        <span class="text-red-500 text-base">*</span>
                    </label>
                    <input value="{{old('userName')}}" class="@error('userName') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3
                      leading-tight focus:outline-none focus:shadow-outline text-dark" id="userName" name="userName" type="text" placeholder="Nhập tên chủ tài khoản" required>
                </div>
                @error('userName')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror

                <div class="mb-6">
                    <label class="block  text-sm font-bold mb-2" >
                        Số tài khoản
                        <span class="text-red-500 text-base">*</span>
                    </label>
                    <input value="{{old('bankNumber')}}" class="@error('bankNumber') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3
                      leading-tight focus:outline-none focus:shadow-outline text-dark" id="bankNumber" name="bankNumber" type="text" placeholder="Nhập số tài khoản" required>
                </div>
                @error('bankNumber')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror

                <div class="mb-6">
                    <label class="block  text-sm font-bold mb-2" >
                    Chi nhánh
                    <span class="text-red-500 text-base">*</span>
                    </label>
                    <input value="{{old('department')}}" class="@error('department') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3
                     leading-tight focus:outline-none focus:shadow-outline text-dark" id="department" name="department" type="text" placeholder="Nhập vị trí" required>
                </div>
                @error('department')
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
@section('js')

<script src="{{ asset('js/backend/bank/index.js') }}"></script>
@endsection
