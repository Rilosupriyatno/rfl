<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <title>Rattan For Life</title>
</head>

<body>
    <main class="w-full">
        <section class="max-w-rattan-mobile h-screen mx-auto flex flex-col items-center justify-center">
            <div class="mb-[1rem] flex items-center justify-center flex-wrap gap-6 place-self-center">
                <img class="h-[4rem]" src="{{ asset('assets/icons/rattan-logo.svg') }}" alt="Rattan Logo" />
                <div class="font-poppins w-[7rem] break-all font-bold text-[2rem] leading-[2.5rem] text-gray-600">
                    rattan<span class="text-[#FFCC33]">for</span>life.
                </div>
            </div>
            @if (session('status'))
            <div class="alert alert-success" style="color:green" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="flex flex-col items-center gap-[1.5rem] px-[1.5rem] py-[1rem]">
                <div class="flex flex-col items-center gap-[0.5rem]">
                    @if ($errors->any())
                    {!! implode('', $errors->all('<div class="mb-2 text-danger">:message</div>')) !!}
                    @endif
                    <form method="POST" action="/auth" class="border border-black rounded-[0.7rem] flex flex-col gap-[0.5rem] p-[1rem]">
                        @csrf
                        <input type="text" placeholder="nomor hp" name="username" class="w-full border border-black rounded-[0.3rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-gray-400 placeholder:font-roboto focus:outline-none focus:border-gray-500" />
                        <input type="password" placeholder="password" name="password" class="w-full border border-black rounded-[0.3rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-gray-400 placeholder:font-roboto focus:outline-none focus:border-gray-500" />
                        <button class="bg-[#00B9E8] text-white self-center px-[2.5rem] py-[0.5rem] text-[1.2rem] rounded-[0.3rem] border border-black">
                            Masuk
                        </button>
                    </form>
                    <a href="javascript:;" class="text-[1.1rem] text-[#FF0000] underline">Lupa password</a>
                </div>
                <div class="flex flex-col items-center gap-[0.3rem]">
                    <span class="text-[1.1rem] text-[#29AB87]">Belum jadi member?</span>
                    <a href="{{ url('sign-up-phone') }}" class="border border-black rounded-[0.3rem] bg-[#9ACD32] px-[7.5rem] py-[0.7rem] text-white text-[1.2rem] italic">Daftar</a>
                </div>
            </div>
        </section>
    </main>
</body>

</html>