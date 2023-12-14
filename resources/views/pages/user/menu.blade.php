<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="{{ asset('assets/icons/rattan-logo.svg') }}" type="image/icon type">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
  <title>Rattan For Life</title>
</head>

<body class="bg-bgMenu">
  <main>
    <header class="max-w-rattan-mobile h-[360px] mx-auto rounded-b-[32px]">
      <div class="bg-bgRt max-w-rattan-mobile h-[360px] mx-auto rounded-b-[32px] object-contain">
        <div class="bg-black bg-opacity-50 max-w-rattan-mobile h-[360px] mx-auto rounded-b-[32px]">
          <div class="max-w-rattan-mobile pt-[10rem] mx-auto px-[2rem] flex items-center justify-center">
            <img class="h-[7rem] mx-auto bg-white px-3 py-2 rounded-lg" src="{{ asset('img/logo/logo-rfl-green.png') }}" alt="Rattan Logo" loading="lazy" />
          </div>
          <div class="max-w-rattan-mobile py-[10rem] mx-auto px-[2rem] flex items-center justify-center gap-[1rem]">
            <input type="text" placeholder="Cari" class="w-full border border-gray-400 rounded-[50px] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-black placeholder:font-roboto focus:outline-none focus:border-gray-500" />
            <a href="{{ url('sign-in') }}" class="bg-[#6BAB4B] flex items-center px-[2.5rem] py-[0.5rem] text-[1.2rem] font-roboto italic rounded-[0.2rem] transition-all duration-[0.4s] hover:bg-[#009247] text-white">Masuk</a>
          </div>
        </div>
      </div>
    </header>
    <main class="w-full pb-[10rem]">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
      <section class="flex w-full py-[1rem]">
        <div class="max-w-rattan-mobile h-full mx-auto py-[1.2rem]">
          @foreach ($category as $key => $data)
          @if ($key % 4 == 0)
          @if ($key != 0)
        </div>
        @endif
        <div class="grid grid-flow-col auto-cols-max gap-4">
          @endif
          <div class="w-72 rounded-xl overflow-hidden bg-white ">
            <a href=" {{ url($data->url.$data->id) }}" class="items-center justify-center gap-[0.8rem] w-[10rem] basis-[10rem] p-36">
              <img class="w-[7rem] mx-auto" src="{{ asset($data->image) }}" alt="Sunset in the mountains">
              <div class="px-6 py-2">
                <div class="font-bold text-xl mb-2 text-center">{{ $data->description }}</div>
              </div>
            </a>
          </div>
          <div class="w-72 rounded-xl overflow-hidden bg-white">
            <a href="#" class="items-center justify-center gap-[0.8rem] w-[10rem] basis-[10rem] p-36">
              <img class="w-[7rem] mx-auto" src="{{ asset('assets/icons/orderrequest.png') }}" alt="Sunset in the mountains">
              <div class="px-6 py-2">
                <div class="font-bold text-xl mb-2 text-center">Buat Pesanan</div>
              </div>
            </a>
          </div>
          @if ($loop->last)
        </div>
        @elseif (($key + 1) % 4 == 0)
        </div>
        @endif
        @endforeach
        </div>

      </section>

    </main>
    <footer class="fixed w-full bottom-0 left-0">
      <div class="max-w-rattan-mobile mx-auto bg-white border-t-2 border-[#6BAB4B] py-[1.5rem]">
        <div class="px-[1.5rem] grid grid-cols-4 justify-items-center gap-[1rem]">
          <a href="javascript:;" class="flex flex-col items-center justify-center gap-[0.5rem]">
            <img src="{{ asset('img/logo/logo-green.png') }}" alt="home" class="w-[3rem] h-[3rem] " />
            <span>Home</span>
          </a>
          <a href="/chat" class="flex flex-col items-center justify-center gap-[0.5rem]">
            <img src="{{ asset('assets/icons/email.png') }}" alt="email" class="w-[3rem] h-[3rem]" />
            <span>Pesan</span>
          </a>
          {{-- <a href="{{ route('chat') }}" class="flex flex-col items-center justify-center gap-[0.5rem]">
            <img src="{{ asset('assets/icons/love.png') }}" alt="love" class="w-[3rem] h-[3rem]" />
            <span>Whislist</span>
          </a> --}}
          <a 
            @auth('web')
              href="{{ route('cart', ['index='.$parameter,'route='.$route]) }}"
            @endauth
              href="/administration/cart"
            class="flex flex-col items-center justify-center gap-[0.5rem]">
            <img src="{{ asset('assets/icons/shopping-cart.png') }}" alt="shopping-cart" class="w-[3rem] h-[3rem]" />
            <span>Keranjang</span>
          </a>
          <a href="javascript:;" class="flex flex-col items-center justify-center gap-[0.5rem]">
            <img src="{{ asset('assets/icons/document.png') }}" alt="document" class="w-[3rem] h-[3rem]" />
            <span>Transaksi</span>
          </a>
        </div>
      </div>
    </footer>
  </main>
</body>

</html>