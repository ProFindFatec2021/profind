@extends("layouts.backend")

@section('content')
<h2 class="text-white text-center">Cadastro {{Route::currentRouteName() == 'usuario.create.profissional' ? 'Profissional' : 'Cliente'}}</h2>
<form method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="tipo" value="{{Route::currentRouteName() == 'usuario.create.profissional' ? 1 : 0}}">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome">
    </div>

    <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" placeholder="Telefone" name="telefone" id="telefone">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" placeholder="Email" name="email" id="email">
    </div>

    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" placeholder="Senha" name="senha" id="senha">
    </div>

    <div class="form-group">
        <label for="foto_perfil">Foto de perfil</label>
        <input type="file" class="form-control-file" name="foto_perfil" id="foto_perfil">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection


@section('script')
<script>
    var SPMaskBehavior = function(val) {
            return val.replace(/\D/g, "").length === 11 ? "(00) 00000-0000" : "(00) 0000-00009";
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            },
        };

    $("#telefone").mask(SPMaskBehavior, spOptions);

    function validaEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    // $("form").submit(function(e) {
    //     e.preventDefault();
    //     let nome = document.querySelector("#nome");
    //     let telefone = document.querySelector("#telefone");
    //     let email = document.querySelector("#email");
    //     let senha = document.querySelector("#senha");

    //     if (nome.length == 0) {
    //         console.log("Nome vazil");
    //         return false;
    //     } else if (/\d/.test(nome) || /[^a-z\sáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]/i.test(nome) || nome.length < 2) {
    //         return false;
    //     }
    //     if (telefone.length == 0) {
    //         console.log("Telefone vazil");
    //         return false;
    //     } else if (telefone.length !== 14 && telefone.length !== 15) {
    //         return false;
    //     }
    //     if (email.length == 0) {
    //         console.log("Email vazil");
    //         return false;
    //     } else if (!validaEmail(email)) {
    //         return false;
    //     }
    //     if (senha.length == 0) {
    //         console.log("Senha vazil");
    //         return false;
    //     } else if (senha.value.match(/[A-Z]/g)) {
    //         console.log("Letra maiuscula");
    //     } else if (senha.value.match(/[0-9]/g)) {
    //         console.log("Numeros senha");
    //     } else if (senha.value.length >= 8) {
    //         console.log("Pelo menos 8");
    //     }

    //     console.log('a');
    // });
</script>
@endsection