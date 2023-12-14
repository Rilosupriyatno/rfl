const element = document.getElementById("singleImageUploadExample");
const singleimageupload = new SingleImageUpload(element);

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
} else {
    console.log("Geolocation is not supported by this browser.");
}

function showPosition(position) {
    const icon = `<i class='fa fa-circle-check'></i> Aman!<br />`
    const geolocationDiv = document.getElementById("geolocation");
    const cardFooter = document.getElementById('footer');

    cardFooter.classList.remove("d-none");
    geolocationDiv.innerHTML += `<p class="fw-bold m-0 mb-2 text-success">${icon} Geolocation anda aktif.</p>`;

    const inputLongitude = document.getElementsByName('longitude');
    const inputLatitude = document.getElementsByName('latitude');
    inputLatitude[0].value = position.coords.latitude;
    inputLongitude[0].value = position.coords.longitude;
}

function showError(error) {
    const icon = `<i class='fa fa-circle-xmark'></i> Error!<br />`
    const geolocationDiv = document.getElementById("geolocation");
    switch (error.code) {
        case error.PERMISSION_DENIED:
            geolocationDiv.innerHTML += `<p class="fw-bold m-0 text-danger">${icon} Anda telah menolak permintaan geolocation.</p>`;
            break;
        case error.POSITION_UNAVAILABLE:
            geolocationDiv.innerHTML += `<p class="fw-bold m-0 text-danger">${icon} Informasi lokasi tidak tersedia.</p>`;
            break;
        case error.TIMEOUT:
            geolocationDiv.innerHTML += `<p class="fw-bold m-0 text-danger">${icon} Permintaan geolocation timeout.</p>`;
            break;
        case error.UNKNOWN_ERROR:
            geolocationDiv.innerHTML += `<p class="fw-bold m-0 text-danger">${icon} Terjadi kesalahan yang tidak diketahui.</p>`;
            break;
    }
}
