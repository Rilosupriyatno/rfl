<link rel="icon" href="{{ asset('assets/icons/rattan-logo.svg') }}" type="image/icon type">
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
<footer class="fixed w-full bottom-0 left-0">
  <div class="max-w-rattan-mobile mx-auto bg-white border-t-2 border-[#FFBA00] py-[0.5rem]">
    <div class="px-[1.5rem] grid grid-cols-5 justify-items-center gap-[0.5rem]">
      <a href="javascript:;" class="flex flex-col items-center justify-center gap-[0.5rem]">
        <img src="{{ asset('assets/icons/home.png') }}" alt="home" class="w-[0.5rem] h-[0.5rem] selected-menu" />
        <span>Home</span>
      </a>
      <a href="/chat" class="flex flex-col items-center justify-center gap-[0.5rem]">
        <img src="{{ asset('assets/icons/email.png') }}" alt="email" class="w-[0.5rem] h-[0.5rem] unselected-menu" />
        <span>Pesan</span>
      </a>
      <a href="javascript:;" class="flex flex-col items-center justify-center gap-[0.5rem]">
        <img src="{{ asset('assets/icons/love.png') }}" alt="love" class="w-[0.5rem] h-[0.5rem] unselected-menu" />
        <span>Whislist</span>
      </a>
      <a href="javascript:;" class="flex flex-col items-center justify-center gap-[0.5rem]">
        <img src="{{ asset('assets/icons/shopping-cart.png') }}" alt="shopping-cart" class="w-[0.5rem] h-[0.5rem] unselected-menu" />
        <span>Keranjang</span>
      </a>
      <a href="javascript:;" class="flex flex-col items-center justify-center gap-[0.5rem]">
        <img src="{{ asset('assets/icons/document.png') }}" alt="document" class="w-[0.5rem] h-[0.5rem] unselected-menu" />
        <span>Transaksi</span>
      </a>
    </div>
  </div>
</footer>