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
                    <form class="space-y-4 md:space-y-6" method="POST" action="/auth">
                        @csrf
                        <div>
                            <label for="username" class="block mb-2 text-[1.2rem]  font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="username" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-[1.2rem]  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Username" required="">
                        </div>
                        <div>
                            <label for="pin" class="block mb-2 text-[1.2rem]  font-medium text-gray-900 dark:text-white">PIN</label>
                            <input type="password" name="password" id="pin" placeholder="PIN" class="bg-gray-50 border border-gray-300 text-gray-900 text-[1.2rem]  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="text-[1.2rem]  font-medium text-primary-600 hover:underline dark:text-primary-500">Lupa PIN?</button>
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-[1.2rem]  px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Masuk</button>
                        <p class="text-[1.2rem]  text-gray-500 dark:text-gray-400">
                            Belum punya akun? <a href="{{ url('sign-up-phone') }}" class="text-[1.2rem] font-medium text-primary-600 hover:underline dark:text-primary-500">Buat Akun</a>
                        </p>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>