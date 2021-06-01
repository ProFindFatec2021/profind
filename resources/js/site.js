$(document).ready(function () {
    $(".banner-slider").slick({
        slidesToShow: 1,
        fade: true,
        arrows: false,
        autoplay: true,
    });
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

    $(".input-group .input").focus(function () {
        $(this).parent().addClass("active");
    });

    $(".input-group .input").blur(function () {
        if ($(this).val() === "") $(this).parent().removeClass("active");
    });
});
