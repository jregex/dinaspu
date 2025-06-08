$("#profile").change(function () {
    if (this.files && this.files[0]) {
        let reader = new FileReader();
        let filename = $("#profile").val();
        filename = filename.substring(filename.lastIndexOf("\\") + 1);
        reader.onload = function (e) {
            // debugger;
            $("#previewImg").attr("src", e.target.result);
            $("#previewImg").fadeIn(1000);
            $(".custom-file-label").text(filename);
        };
        reader.readAsDataURL(this.files[0]);
    }
});
