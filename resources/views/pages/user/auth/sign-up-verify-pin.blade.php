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
          <div class="flex flex-col gap-[0.5rem] max-w-[23.5rem]">
            <span class="text-gray-500 text-[1.2rem]"
              >Buat PIN Rattan For Life</span
            >
            <form
              action="javascript:;"
              class="border border-black rounded-[0.7rem] p-[1rem] flex flex-col gap-[1rem]"
            >
              <div class="flex flex-col gap-[0.2rem]">
                <input
                  type="number"
                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                  maxlength="6"
                  placeholder="Masukkan 6 digit PIN"
                  class="w-full border border-black rounded-[0.3rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-gray-400 placeholder:font-roboto focus:outline-none focus:border-gray-500"
                />
                <span class="text-gray-500 text-[1rem]">
                  Masukkan 6 digit PIN untuk proses verifikasi saat login dan
                  transaksi
                </span>
              </div>
              <a
                href="{{ url('sign-up-verify-pin-confirm') }}"
                class="border border-black rounded-[0.3rem] bg-[#9ACD32] px-[7.5rem] py-[0.7rem] text-white text-[1.2rem] text-center italic"
                >Selanjutnya</a
              >
            </form>
          </div>
        </section>
      </section>
    </main>
  </body>
</html>
