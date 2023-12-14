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
    <section class="w-full">
      <section class="max-w-rattan-mobile h-screen mx-auto flex flex-col items-center justify-center">
        <div class="mb-[1rem] flex items-center justify-center flex-wrap gap-6 place-self-center">
          <img class="h-[4rem]" src="{{ asset('assets/icons/rattan-logo.svg') }}" alt="Rattan Logo" />
          <div class="font-poppins w-[7rem] break-all font-bold text-[2rem] leading-[2.5rem] text-gray-600">
            rattan<span class="text-[#FFCC33]">for</span>life.
          </div>
        </div>
        <div class="flex flex-col gap-[0.5rem]">
          <form method="POST" action="/register-seller" id="loginForm" onsubmit="return validateForm()" class="border border-black rounded-[0.7rem] p-[1rem] flex flex-col gap-[1rem]" novalidate>
            @csrf
            <link rel="icon" href="{{ asset('assets/icons/rattan-logo.svg') }}" type="image/icon type">
            <span id="validate_error_message" style="color: red" class="text-gray-500 text-[1rem]"></span>

            <span class="text-gray-500 text-[1.2rem]">Masukkan Nomor HP</span>
            <div class="flex flex-col gap-[0.2rem]">
              <input type="number" name="phone" class="w-full border border-black rounded-[0.3rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-gray-400 placeholder:font-roboto focus:outline-none focus:border-gray-500" placeholder="Contoh: 62812345678" />
            </div>
            <span class="text-gray-500 text-[1.2rem]">Masukkan Nama Lengkap Anda</span>
            <div class="flex flex-col gap-[0.2rem]">
              <input type="text" name="name" class="w-full border border-black rounded-[0.3rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-gray-400 placeholder:font-roboto focus:outline-none focus:border-gray-500" placeholder="Petani" />
            </div>
            <span class="text-gray-500 text-[1.2rem]">Pilih Kategori </span>
            <div class="flex flex-col gap-[0.2rem]">
              <select id="category_id" name="category_id" class="w-full border border-black rounded-[0.3rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-gray-400 placeholder:font-roboto focus:outline-none focus:border-gray-500">
                <option value="1">Pilih Kategori</option>
                <!-- <option value="2">Penyedia Produk Jadi</option> -->
                <option value="3">Penyedia Bahan Baku</option>
                <!-- <option value="4">Penyedia Bahan Baku Pendukung</option>
                <option value="5">Penyedia Mesin, Alat, & Perlengkapan</option>
                {{-- <option value="2">Tenaga Kerja/SDM</option> --}}
                <option value="6">Jasa Servis Mesin dan Alat</option>
                <option value="7">Jasa Olah Bahan Baku</option>
                <option value="8">Jasa Desain</option>
                <option value="9">Jasa Anyam</option>
                <option value="10">Jasa Rangka</option>
                <option value="11">Jasa Anyam dan Rangka</option>
                <option value="12">Jasa Powder Coating</option>
                <option value="13">Jasa Cushion</option>
                <option value="14">Jasa Finishing</option>
                <option value="15">Jasa Sewa Mesin & Peralatan</option>
                <option value="16">Jasa Sewa Transportasi</option>
                <option value="17">Jasa Sewa Gudang</option>
                <option value="18">Jasa Sewa Bendera</option>
                <option value="19">Jasa Sertifikasi</option>
                <option value="20">Jasa Pembiayaan</option> -->

              </select>
            </div>

            <span class="text-gray-500 text-[1.2rem]" id="span_spesifikasi" style="display:none">Pilih Spesifikasi </span>
            <div class="flex flex-col gap-[0.2rem]">
              <select id="spesifikasi_produk_jadi" style="display:none" class="w-full border border-black rounded-[0.3rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-gray-400 placeholder:font-roboto focus:outline-none focus:border-gray-500">
                <option value="">Pilih Spesifikasi</option>
                <option value="Toko">Toko</option>
                <option value="Pengrajin">Pengrajin</option>
                <option value="Pabrik/Industri">Pabrik/Industri</option>
              </select>
              <select id="spesifikasi_bahan_baku" style="display:none" class="w-full border border-black rounded-[0.3rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-gray-400 placeholder:font-roboto focus:outline-none focus:border-gray-500">
                <option value="">Pilih Spesifikasi</option>
                <option value="Petani">Petani</option>
                <option value="Pengepul">Pengepul</option>
                <option value="Pedagang Besar">Petani Besar</option>
              </select>
            </div>
            <div class="flex flex-col gap-[0.2rem]">
              <input type="hidden" name="category_specification" id="category_specification">
              <span class="text-gray-500 text-[1.2rem]">Buat PIN Rattan For Life</span>
              <input type="password" name="pin" id="pin" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" placeholder="Masukkan 6 digit PIN" class="w-full border border-black rounded-[0.3rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-gray-400 placeholder:font-roboto focus:outline-none focus:border-gray-500" />
              <span style="color: red" class="text-gray-500 text-[1rem]">
                Masukkan 6 digit PIN untuk proses verifikasi saat login dan
                transaksi
              </span>
            </div>
            <div class="flex flex-col gap-[0.2rem]">
              <span class="text-gray-500 text-[1.2rem]">Konfirmasi ulang PIN</span>
              <input type="password" name="" id="confirm_pin" {{-- oninput="checkPinMatch()" --}} oninput="javascript: checkPinMatch(); if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" placeholder="Masukkan 6 digit PIN Konfirmasi" class="w-full border border-black rounded-[0.3rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-gray-400 placeholder:font-roboto focus:outline-none focus:border-gray-500" />
            </div>
            <span id="pin_error_message" style="color: red" class="text-gray-500 text-[1rem]"></span>

            <button disabled id="submit-form" class="border border-black rounded-[0.3rem] bg-[#9ACD32] px-[2.5rem] py-[0.7rem] text-white text-[1.2rem] italic">
              Daftar
            </button>
          </form>
        </div>
      </section>
    </section>
  </main>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/js/vendor/select2.full.min.js"></script>
<script>
  function validateForm() {
    var phone = document.forms["loginForm"]["phone"].value;
    var name = document.forms["loginForm"]["name"].value;
    var category_id = document.forms["loginForm"]["category_id"].value;
    var pin = document.forms["loginForm"]["pin"].value;
    var confirm_pin = document.forms["loginForm"]["confirm_pin"].value;
    var errorMessage = document.getElementById('validate_error_message');


    if (phone === "" || name === "" || category_id === "1" || pin === "" || confirm_pin === "") {
      errorMessage.textContent = 'Semua kolom wajib diisi';
      return false;
    }

    return true;
  }

  function checkPinMatch() {
    var pin = document.getElementById('pin').value;
    var confirmPin = document.getElementById('confirm_pin').value;
    var errorMessage = document.getElementById('pin_error_message');

    if (pin === confirmPin && pin.length == 6) {
      errorMessage.textContent = ''; // Kata sandi cocok
      $('#submit-form').removeAttr('disabled')
    } else {
      $('#submit-form').prop('disabled', true);
      errorMessage.textContent = 'PIN tidak cocok / Wajib 6 pin'; // Kata sandi tidak cocok
    }
  }
  $(document).ready(function() {

    //   function limitMaxLength(element, maxLength) {
    //     if (element.value.length > maxLength) {
    //         element.value = element.value.slice(0, maxLength);
    //     }
    // }



    //   $("#category_id").select2({
    //     theme: "bootstrap4",
    //     placeholder: "Pilih Kategori",
    //     allowClear: true,
    //     ajax: {
    //         url: "/master/category/options",
    //         dataType: "json",
    //         delay: 250,
    //         processResults: function (data) {
    //             return {
    //                 results: $.map(data, function (item) {
    //                     return {
    //                         id: item.id,
    //                         text: item.name,
    //                     };
    //                 }),
    //             };
    //         },
    //         cache: true,
    //     },
    // });

    $(document).on('change', '#category_id', function() {
      var category_id = $('#category_id').val();

      $('#span_spesifikasi').css('display', category_id == "2" || category_id == "3" ? 'block' : 'none');
      $('#spesifikasi_produk_jadi').css('display', category_id == 2 ? 'block' : 'none');
      $('#spesifikasi_bahan_baku').css('display', category_id == 3 ? 'block' : 'none');
    });

    $(document).on('change', '#spesifikasi_bahan_baku', function() {
      $('#category_specification').val($('#spesifikasi_bahan_baku').val());
    });

    $(document).on('change', '#spesifikasi_produk_jadi', function() {
      $('#category_specification').val($('#spesifikasi_produk_jadi').val());

    });
  });
</script>