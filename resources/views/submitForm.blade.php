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
                        {{-- {{ $idBanking }} --}}
                        TN12345
                    </span> vào số tài khoản
                    <span class="font-semibold" id="stk_bill"></span> ngân hàng <span class="font-semibold" id="bankName_bill"></span>.
                    <div>Tin của quý khách hàng sẽ được cập nhật sớm nhất có thể</div>
                </div>
            </div>
            {{-- <form action="{{ route('client.news.store') }}" method="POST" class="pt-5">
                @csrf
                <button class="border rounded-xl text-white w-full py-2 text-xl font-semibold hover:bg-white" style="border-color: #EF562D; background: #EF562D;" type="submit">
                    Đăng tin
                </button>
            </form> --}}
        </div>

        {{-- right side bar --}}
        {{-- <div class="w-1/6 border rounded-xl bg-white p-7" style="height: 540px">
            @include('front-end.components.newsFormBill')
        </div> --}}

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

    {{-- @foreach ($bankAccounts as $bankAccount)
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

    <!-- Add a div to display the selected bank account -->
    <div id="stk_bill"></div>
    <div id="bankName_bill"></div>

    <!-- JavaScript function -->
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
    </script> --}}
</body>
</html>
