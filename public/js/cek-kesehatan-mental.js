// Fungsi takePhoto didefinisikan di luar DOMContentLoaded untuk memastikan akses global
function takePhoto(questionNumber) {
    navigator.mediaDevices
        .getUserMedia({ video: { facingMode: "user" } })
        .then((stream) => {
            const video = document.createElement("video");
            video.srcObject = stream;
            video.play();

            setTimeout(() => {
                const canvas = document.createElement("canvas");
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                canvas.getContext("2d").drawImage(video, 0, 0);
                const photoData = canvas.toDataURL("image/png");

                const photoInput = document.getElementById(
                    `photo${questionNumber}`
                );
                if (photoInput) {
                    const blob = dataURItoBlob(photoData);
                    const file = new File(
                        [blob],
                        `photo${questionNumber}.png`,
                        { type: "image/png" }
                    );

                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    photoInput.files = dataTransfer.files;
                } else {
                    console.error(
                        `Photo input with id photo${questionNumber} not found`
                    );
                }

                stream.getTracks().forEach((track) => track.stop());
            }, 1000);
        })
        .catch((err) => {
            console.error("Error accessing camera: ", err);
            alert(
                "Terjadi kesalahan saat mengakses kamera. Pastikan kamera diizinkan."
            );
        });
}

document.addEventListener("DOMContentLoaded", function () {
    const alertBox = document.getElementById("alertBox");
    const startButton = document.getElementById("startButton");
    const formContainer = document.getElementById("formContainer");

    // Ambil elemen audio untuk musik
    const alertMusic = document.getElementById("alertMusic");

    // Putar musik saat alert muncul
    alertMusic.play();

    // Mengatur waktu mundur 30 detik untuk tombol "Mulai"
    let countdown = 5;
    const countdownInterval = setInterval(() => {
        countdown--;
        startButton.textContent = `Mulai setelah ${countdown} detik`;

        // Ketika waktu mundur selesai, aktifkan tombol
        if (countdown <= 0) {
            clearInterval(countdownInterval);
            startButton.disabled = false;
            startButton.textContent = "Mulai";
        }
    }, 1000);

    startButton.addEventListener("click", function () {
        alertBox.classList.add("hidden");
        formContainer.classList.remove("hidden");
        // Hentikan musik saat tombol "Mulai" ditekan
        alertMusic.pause();
        alertMusic.currentTime = 0; // Reset musik
    });

    const quizForm = document.getElementById("quizForm");
    quizForm.addEventListener("submit", function (event) {
        // Optional: log form submission if needed for debugging
    });

    document.querySelector(".btn-mulai").addEventListener("click", function () {
        document.querySelector(".alert-box").classList.remove("active");
        document.querySelector(".overlay").classList.remove("active");
    });

    document.querySelector(".alert-box").classList.add("active");
    document.querySelector(".overlay").classList.add("active");

    document.querySelectorAll("input[type='radio']").forEach((radio) => {
        radio.addEventListener("change", function () {
            const onchangeAttr = this.getAttribute("onchange");
            if (onchangeAttr && onchangeAttr.includes("takePhoto")) {
                const match = onchangeAttr.match(/takePhoto\((\d+)\)/);
                if (match) {
                    const questionNumber = match[1];
                    takePhoto(questionNumber);
                }
            }
        });
    });
});

function dataURItoBlob(dataURI) {
    const byteString = atob(dataURI.split(",")[1]);
    const mimeString = dataURI.split(",")[0].split(":")[1].split(";")[0];
    const ab = new ArrayBuffer(byteString.length);
    const ia = new Uint8Array(ab);

    for (let i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }
    return new Blob([ab], { type: mimeString });
}
