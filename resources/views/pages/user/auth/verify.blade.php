<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <title>Rattan For Life</title>
  </head>
  <body>
    <main class="w-full">
      <section class="w-full">
        <section
          class="max-w-rattan-mobile h-screen mx-auto flex flex-col items-center justify-center"
        >
        @if (session('status'))
        <div class="alert alert-success" style="color:green" role="alert">
            {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" style="color:red" role="alert">
                {{ session('error') }}
            </div>
        @endif
          <div class="flex flex-col gap-[0.5rem]">
            <span class="text-gray-500 text-[1.2rem]"
              >Masukkan Kode Verifikasi</span
            >
            <form method="POST" action="/verify" id="verifyForm" class="border border-black rounded-[0.7rem] p-[1rem] flex flex-col gap-[1rem]" novalidate>
              @csrf
           
              @if(session('user_id_key'))
                <input type="hidden" class="form-control" placeholder="{{ session('user_id_key') }}" value="{{ session('user_id_key') }}" name="id" />
            @endif
              <div class="flex flex-col gap-[0.2rem]">
                <input
                  type="number"
                  name="otp"
                  class="w-full border border-black rounded-[0.3rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-gray-400 placeholder:font-roboto focus:outline-none focus:border-gray-500"
                />
                <span class="text-gray-500 text-[1.2rem]"
                  >Kode verifikasi telah dikirim melalui Whatsapp
                </span>
              </div>
              <a
                href="#"
                class="text-[#FFA500] text-center"
                >Tidak menerima kode? Kirim ulang</a
              >
              <button 
              id="submit-form"
              class="border border-black rounded-[0.3rem] bg-[#9ACD32] px-[2.5rem] py-[0.7rem] text-white text-[1.2rem] italic"
            >
              Submit
            </button>
            </form>
          </div>
        </section>
      </section>
    </main>
  </body>
</html>
