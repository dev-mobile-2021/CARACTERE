$(function () {
    $('#monForm').on('submit', function (e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active');
        var formData = new FormData(this);
        if ($("#password").val() == $("#password2").val()) {
            $.ajax({
                type: "POST",
                url: "php/controller/fournisseur.php", //process to mail
                data: formData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                success: function (msg) {
                    if (parseInt(msg) == 1) {
                        swal({ title: "Effectué !", text: "Le fournisseur a &eacute;t&eacute; ajout&eacute; avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true });
                        $(document).click(function () {
                            location.reload();
                        });
                    } else {
                        swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true });
                    }
                    //  alert(msg);
                    $('.loaderMessage').removeClass('is-active');
                },
                error: function () {
                    $('.loaderMessage').removeClass('is-active');
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true });
                }
            });
        }
        else {
            $('.loaderMessage').removeClass('is-active');
            swal({ title: "Erreur", text: "Les mots de passe saisis ne sont pas identique, veuillez les v&eacute;rifier ou les resaisir", imageUrl: 'dist/img/icones/errorPass.png', html: true });
        }
    });

    $('#monFormMod').on('submit', function (e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active');
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "php/controller/fournisseur.php?img=" + $("#photoFournisseurMod").attr("value"), //process to mail
            data: formData,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function (msg) {
                if (parseInt(msg) == 1) {
                    swal({ title: "Effectué !", text: "Le fournisseur a &eacute;t&eacute; modifi&eacute; avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true });
                    $(document).click(function () {
                        location.reload();
                    });
                } else {
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true });
                }
                //  alert(msg);
                $('.loaderMessage').removeClass('is-active');
            },
            error: function () {
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true });
            }
        });
    });


    
});


