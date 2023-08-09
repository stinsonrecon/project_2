@extends('front-end.app')
@section('title')
<title>Thanh toán</title>
@endsection
@section('content')
<div class="flex-col xl:flex xl:flex-row mt-20 justify-between py-10" style="background-color: #E9E9E9;">
    {{-- Left side bar --}}
    <div class="w-1/6"></div>
    {{-- Bank list center --}}
    <div class="w-11/12 m-auto xl:w-1/2">
        <div class="rounded bg-white shadow-md  flex-col pb-10 pt-6 px-4 xl:px-10 text-center">
            <div class="text-2xl font-bold" style="color: #EF562D">Thanh toán</div>
            <div class="mt-4 font-bold text-left">Khách hàng chuyển khoản vào các tài khoản sau để thanh toán</div>
            <form class="flex-col xl:flex xl:flex-row flex-wrap justify-between mt-10">
                @foreach ($bankAccounts as $bankAccount)
                    <input class="hidden" id="radio_{{ $bankAccount['id'] }}" type="radio" name="radio" onclick="displayBank({{ $bankAccount['id'] }})">
                    <label class="flex cursor-pointer flex-col bankBox mb-6 py-10 px-6 xl:px-10 rounded shadow-md" for="radio_{{ $bankAccount['id'] }}">
                        <div>
                            <img src="{{ asset('images/front-end/banks/' . strtolower($bankAccount['bankName']) . '.png') }}" alt="">
                        </div>
                        <div class="mt-4 text-left font-medium">STK: <span id="stk_{{ $bankAccount['id'] }}">{{ $bankAccount['bankNumber'] }}</span></div>
                        <div class="hidden" id="bankName_{{ $bankAccount['id'] }}">{{ $bankAccount['bankName'] }}</div>
                        <div class="text-left font-medium">Chủ tài khoản: {{ $bankAccount['userName'] }}</div>
                    </label>
                @endforeach
            </form>
            <div class=" border-t-2 border-b-2 border-orange-600 py-3 text-left text-lg">
                <span class=" font-semibold">Chuyển khoản với nội dung:</span>
                <span class="font-semibold" style="color: #EF562D">
                    {{ $idBanking }}
                </span> vào số tài khoản
                <span class="font-semibold" id="stk_bill"></span> ngân hàng <span class="font-semibold" id="bankName_bill"></span>.
                <div>Tin của quý khách hàng sẽ được cập nhật sớm nhất có thể</div>
            </div>
        </div>
        <form action="{{ route('client.news.store') }}" method="POST" class="pt-5">
            @csrf
            <button class="border rounded-xl text-white w-full py-2 text-xl font-semibold hover:bg-white" style="border-color: #EF562D; background: #EF562D;" type="submit">
                Đăng tin
            </button>
        </form>
    </div>

    {{-- right side bar --}}
    <div class="w-1/6 border rounded-xl bg-white p-7" style="height: 540px">
        @include('front-end.components.newsFormBill')
    </div>

    <script>
        var bankAccounts = @json($bankAccounts);

        function displayBank(bankId) {
            var stk_bill = document.getElementById('stk_bill');
            var bankNameBill = document.getElementById('bankName_bill');

            var bankAccount = bankAccounts.find(function(account) {
                return account.id === bankId;
            });

            stk_bill.innerHTML = bankAccount.bankNumber;
            bankNameBill.innerHTML = bankAccount.bankName;
        }
        // Set the first radio button as checked on page load
        document.getElementById("radio_{{ $bankAccounts[0]['id'] }}").checked = true;
        // Initialize the display with the first bank account
        displayBank({{ $bankAccounts[0]['id'] }});
    </script>
</div>
@endsection
