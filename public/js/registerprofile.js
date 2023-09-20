"use strict";

const fileUploadForm = document.getElementById("image-upload-form");
const imageArea = document.getElementById("image-area");
const imageLogo = document.getElementById("image-logo");

fileUploadForm.addEventListener("change", function () {
    // 選択されたファイルが存在するか確認
    if (fileUploadForm.files && fileUploadForm.files[0]) {
        // image-logoを非表示にする
        imageLogo.style.display = "none";

        var reader = new FileReader();

        // ファイルの読み込みが完了した際に発生するイベントハンドラを設定
        reader.onload = function (e) {
            // 画像プレビューを表示
            imageArea.src = e.target.result;
            imageArea.style.display = "block";
        };

        // 選択されたファイルを読み込み
        reader.readAsDataURL(fileUploadForm.files[0]);
    }
});
