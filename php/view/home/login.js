$(function () {
    $('#loginForm').on('submit', function (e) {

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "php/controller/logged.php", //process to mail
            data: $(this).serialize(),
            success: function (msg) {
                if (parseInt(msg) == 1) {
                    window.location.href = "Dashboard";
                } else if (parseInt(msg) == 2) {
                    window.location.href = "Dashboard";
                } else if (parseInt(msg) == 3) {
                    window.location.href = "Dashboard";
                } else if (parseInt(msg) == 4) {
                    window.location.href = "Dashboard";
                } else if (parseInt(msg) == 5) {
                    window.location.href = "Dashboard";
                } else if (parseInt(msg) == 6) {
                    window.location.href = "Dashboard";
                } else if (parseInt(msg) == 7) {
                    window.location.href = "Dashboard";
                } else if (parseInt(msg) == 8) {
                    window.location.href = "Dashboard";
                } else if (parseInt(msg) == 9) {
                    window.location.href = "Dashboard";
                } else if (parseInt(msg) == 10) {
                    window.location.href = "Dashboard";
                } else if (parseInt(msg) == 11) {
                    window.location.href = "Dashboard";
                } else if (parseInt(msg) == 12) {
                    window.location.href = "Dashboard";
                } else if (parseInt(msg) == 0) {
                    swal({ title: "Erreur", text: "Login ou mot de passe incorrect", imageUrl: 'dist/img/icones/error.png', html: true });
                } else if (parseInt(msg) == 6) {
                    swal({ title: "Erreur", text: "Votre compte a &eacute;t&eacute; d&eacute;sactiv&eacute;", imageUrl: 'dist/img/icones/error.png', html: true });
                } else {
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true });
                }
                // alert(msg);
            },
            error: function () {
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true });
            }
        });
    });


});
