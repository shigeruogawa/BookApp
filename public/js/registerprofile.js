"use strict";

const fileUploadForm = document.getElementById("image-upload-form");
const imageArea = document.getElementById("image-area");
const imageLogo = document.getElementById("image-logo");

fileUploadForm.addEventListener("change", function () {
    if (fileUploadForm.files && fileUploadForm.files[0]) {
        imageLogo.style.display = "none";

        var reader = new FileReader();

        reader.onload = function (e) {
            imageArea.src = e.target.result;
            imageArea.style.display = "block";

            imageArea.style.maxWidth = "100%";
            imageArea.style.maxHeight = "100%";
        };

        reader.readAsDataURL(fileUploadForm.files[0]);
    }
});
