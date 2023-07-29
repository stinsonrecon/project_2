@extends('admin.app')

@section('title')
<title>Thêm mới tài khoản nhân viên</title>
@endsection

@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    @include('admin.components.header')
    <main>
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Quản lý tài khoản nhân viên | Thêm mới</h1>
        </div>
        <!-- Content -->
        <div>
            <form class=" rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('admin.adminList.store')}}" enctype="multipart/form-data" >
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" >
                        Họ tên đầy đủ
                        <span class="text-red-500 text-base">*</span>
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3
                                leading-tight focus:outline-none focus:shadow-outline text-dark"
                    id="name" name="name" type="text" placeholder="Nhập tên"
                    value="{{old('name')}}" required>
                </div>
                @error('name')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror

                <div class="mb-6">
                    <label class="block  text-sm font-bold mb-2" >
                        Số điện thoại
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3
                                leading-tight focus:outline-none focus:shadow-outline text-dark"
                    id="phone_number" name="phone_number" type="number" minlength="10" maxlength="11"
                    value="{{old('phone_number')}}" placeholder="Nhập số điện thoại">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold mb-2" >
                        Tên đăng nhập
                        <span class="text-red-500 text-base">*</span>
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3
                                leading-tight focus:outline-none focus:shadow-outline text-dark"
                            id="username" name="username" type="text" placeholder="Nhập tên đăng nhập"
                            value="{{old('username')}}" required>
                </div>
                @error('username')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-2" >
                            Password
                            <span class="text-red-500 text-base">*</span>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3
                                    leading-tight focus:outline-none focus:shadow-outline text-dark"
                                id="password" name="password" type="password" placeholder="Nhập mật khẩu">
                    </div>
                    @error('password')
                    <div style="color: red;">
                        {{$message}}
                    </div>
                    @enderror

                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-2" >
                            Xác thực mật khẩu
                            <span class="text-red-500 text-base">*</span>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3
                                    leading-tight focus:outline-none focus:shadow-outline text-dark"
                                id="password_confirmation" name="password_confirmation" type="password" placeholder="Xác thực mật khẩu">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block  text-sm font-bold mb-2" >
                        Chức vụ
                        <span class="text-red-500 text-base">*</span>
                    </label>
                    <select name="role" id="role" class="shadow appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline text-dark" required>
                        <option value="">Chọn đối tượng</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <div class="mt-3 mb-6">
                        <label class="block text-sm font-bold mb-3">
                            Avatar
                        </label>
                        <div class="flex">
                            <div class="relative h-40 rounded-lg border-dashed border-2 border-black flex justify-center items-center hover:cursor-pointer">
                                <div class="absolute" id="ssn_front_container">
                                    <div class="flex flex-col items-center ">
                                        <i class="fas fa-cloud-upload-alt fa-3x text-gray-300"></i>
                                        <span class="block text-gray-400 font-normal">
                                            Attach you files here
                                        </span>
                                        <span class="block text-gray-400 font-normal">
                                            or
                                        </span>
                                        <span class="block text-blue-400 font-normal">
                                            Browse files
                                        </span>
                                    </div>
                                </div>
                                <input class="h-full w-full opacity-0" id="SSN_front" name="linkImg" type="file"
                                    onchange="ssn_front_select()">
                            </div>
                        </div>
                    </div>

                    <script src="{{ asset('js/ssnFrontPreview.js') }}"></script>
                </div>

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
