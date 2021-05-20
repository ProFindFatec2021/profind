$(document).ready(function () {
    function onFileSelected(event) {
        let selectedFile = event.target.files[0];
        let reader = new FileReader();

        let imgtag = document.getElementById("foto");
        imgtag.title = selectedFile.name;

        reader.onload = function (event) {
            imgtag.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
    }

    $("#preco").mask("000000.00", { reverse: true });

    var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, "").length === 11
                ? "(00) 00000-0000"
                : "(00) 0000-00009";
        },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            },
        };

    $("#telefone").mask(SPMaskBehavior, spOptions);

    var multiImgPreview = function (input, imgPreviewPlaceholder) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function (event) {
                    $($.parseHTML("<img>"))
                        .attr("src", event.target.result)
                        .attr("class", "my-2 mx-1 col-3")
                        .appendTo(imgPreviewPlaceholder);
                };

                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $("#images").on("change", function () {
        multiImgPreview(this, "div.preview");
    });
});
