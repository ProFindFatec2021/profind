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

function adicionarFoto(event) {
    let reader = new FileReader();
    reader.onload = function (e, index) {
        console.log(e);
        console.log(`<img src=${e.target.result} />`);
        $(".galeria").append(`<img src=${e.target.result} />`);
        //     .html(`
        //     <img id="planta" src="${e.target.files[0]}"
        //             class="rounded float-left my-2 mx-1 d-inline-block img-thumbnail" style="width: 20%; height: 200px;">
        //     <button type="button" id="btnRemoveImagemPlanta" onclick="removeImagemPlanta();"
        //         class="btn btn-link" style="position: relative; bottom: 0.6rem; right: 1.7rem;">
        //             <i class="fas fa-times-circle text-danger"></i>
        //     </button>
        // `);
    };
}
