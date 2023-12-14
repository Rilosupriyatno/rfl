<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/icons/rattan-logo.svg') }}" type="image/icon type">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <title>Rattan for life</title>
</head>

<body>
    <main class="w-full">
        <section class="max-w-rattan-mobile h-screen mx-auto flex flex-col items-center justify-center">
            <div class="flex items-center flex-wrap gap-8 place-self-center">
                <img class="h-[6rem]" src="{{ asset('assets/icons/rattan-logo.svg') }}" alt="Rattan Logo" />
                <div class="font-poppins w-[11rem] break-all font-bold text-[3.3rem] leading-[3.5rem] text-gray-600">
                    rattan<span class="text-yellow-400">for</span>life.
                </div>
            </div>
        </section>
    </main>
    <script>
        setInterval(() => {
            const url = "menu";

            window.location.replace(url);
        }, 2000);
    </script>
</body>

</html>