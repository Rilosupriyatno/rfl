<div class="fixed left-0 z-20 h-[60px] w-full hover:bg-[#62C3D0] will-change-scroll transition delay-150 ease-in-out">
    <div class="relative m-auto flex justify-between h-full max-w-[480px] items-center p-0 px-4"
    @isset($custom_nav_data) 
    @foreach ($custom_nav_data as $key => $value)
        data-{{ $key }}="{{ $value }}"
    @endforeach
    @endisset>
        <div class="logo position-relative">
            <a href="/">
                <img src="{{ asset('img/logo/logo-mrfl-white.png') }}" class="full-white" alt="logo" style="width:40px;height40px" />
            </a>
        </div>
        <div class="mobile-buttons-container">
            <a href="#" id="mobileMenuButton" class="menu-button">
                <i class="fa-solid fa-ellipsis-vertical fa-2xl" style="color: #ffffff;"></i>
            </a>
        </div>
    </div>
</div>