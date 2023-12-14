<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/icons/rattan-logo.svg') }}" type="image/icon type">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <title>Rattan For Life</title>
</head>

<body>
    <main>
        /<header class="fixed w-full py-[1.5rem]">
            <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex items-center">
                <div class="w-full flex items-center justify-between">
                    <div class="flex items-center gap-10">
                        <div class="w-[2rem] hover:cursor-pointer">
                            <img src="{{ asset('assets/icons/left-arrow.png') }}" alt="Left Arrow" class="w-full">
                        </div>
                        <div class="flex gap-5">
                            <div class="w-[4rem] h-[4rem]">
                                <img src="{{ asset('assets/icons/user.png') }}" alt="User Profile Image" class="w-full h-full">
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[1.4rem] font-bold">Budi Doremi</span>
                                <div class="inline-flex items-center gap-2">
                                    <span class="w-[1.2rem] h-[1.2rem] rounded-[50%] bg-green-500"></span>
                                    <span class="text-[1.2rem]">Online</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-[2rem] hover:cursor-pointer">
                        <img src="{{ asset('assets/icons/dots-row.png') }}" alt="Dots Row">
                    </div>
                </div>
            </div>
        </header>
        <main></main>
        <footer class="fixed w-full bottom-0 left-0">
            <div class="max-w-rattan-mobile mx-auto bg-white px-[2rem] py-[1.5rem]">
                <form action="javascript:;" class="flex justify-between items-end gap-4">
                    <div class="w-full flex items-end border gap-5 border-gray-400 p-4 rounded-[2rem]">
                        <div class="w-[2rem] cursor-pointer">
                            <img src="{{ asset('assets/icons/sticker.png') }}" alt="Sticker" class="w-full">
                        </div>
                        <div contenteditable="true" placeholder="Tulis pesan..." class="h-auto min-h-[0.4rem] max-h-[10rem] w-full overflow-auto break-all text-[1.2rem] outline-none scrollbar-none empty:before:content-[attr(placeholder)] empty:before:text-[#999] empty:before:pointer-events-none"></div>
                        <div class="w-[2rem] cursor-pointer">
                            <img src="{{ asset('assets/icons/add-rounded.png') }}" alt="Add Files" class="w-full">
                        </div>
                    </div>
                    <button class="w-[4rem] h-[4rem] bg-slate-300 p-4 rounded-full">
                        <img src="{{ asset('assets/icons/send.png') }}" alt="Send" class="white-icon">
                    </button>
                </form>
            </div>
        </footer>
    </main>
</body>

</html>