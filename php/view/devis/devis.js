$(function () {
    $('#monForm').on('submit', function (e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active');
        $.ajax({
            type: "POST",
            url: "php/controller/devis.php", //process to mail
            data: $(this).serialize(),
            success: function (msg) {
                var res = msg.split("@$");

                // $.isNumeric(res[0])
                if ($.isNumeric(msg)) {
                    $(".idDevis").attr("value", msg)
                    //Affichage de la zone d'ajout de services
                    // $("#formulairesServiceDevis").show();
                    $("#parentContentDevis").show();
                    $("#bouttonEdition").attr("href", "devis_modifier-" + msg);

                    $("#monForm").append("<input type='hidden' name='updateNow' value='" + msg + "'>");

                } else if (parseInt(msg) == 2) {
                    swal({ title: "Erreur", text: "Ce nom d'utilisateur est d&eacute;j&agrave; utilis&eacute; par une autre personne", imageUrl: 'dist/img/icones/error.png', html: true });
                } else if (parseInt(msg) == 3) {
                    swal({ title: "Erreur", text: "Cette adresse email est d&eacute;j&agrave; utilis&eacute;e par une autre personne", imageUrl: 'dist/img/icones/error.png', html: true });
                } else {
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true });
                }
                //    alert(msg);
                $('.loaderMessage').removeClass('is-active');
            },
            error: function () {
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true });
            }
        });
    });
    function number_format(number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
    $('#monFormService').on('submit', function (e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active');
        $.ajax({
            type: "POST",
            url: "php/controller/devis.php", //process to mail
            data: $(this).serialize(),
            success: function (msg) {
                var res = msg.split("@$");
                // $.isNumeric(res[0])
                if (parseInt(res[0]) == 1) {
                    $('#monFormService')[0].reset();
                    $("#showdata").append(res[1]);
                    
                    
                    // var textofoption = $("#idRubrique").val();
                    // alert(textofoption);
                    // $("#idRubrique").append("<option>" + textofoption + "</option>");
                    var montantTotal = 0;
                    $(".valeurMontantAddition").each(function () {
                        if (isNaN(parseInt($(this).attr('data-value'))))
                            montantTotal = montantTotal + 0;
                        else
                            montantTotal = montantTotal + parseInt($(this).attr('data-value'));
                    });
                    $("#montantDevis").html(number_format(montantTotal, 0, '', ' '));

                    //Affichage du tableau du contenu du devis et du boutton de validation du devis
                    $("#contentDevis").show();
                    $("#validerdevis").show();

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

    $('#monFormNouveauService').on('submit', function (e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active');
        $.ajax({
            type: "POST",
            url: "php/controller/devis.php", //process to mail
            data: $(this).serialize(),
            success: function (msg) {
                var res = msg.split("@$");
                // $.isNumeric(res[0])
                if (parseInt(res[0]) == 1) {
                    $('#monFormNouveauService')[0].reset();
                    $("#showdata").append(res[1]);
                    //Calcul du montant total
                    var montantTotal = 0;
                    $(".valeurMontantAddition").each(function () {
                        if (isNaN(parseInt($(this).attr('data-value'))))
                            montantTotal = montantTotal + 0;
                        else
                            montantTotal = montantTotal + parseInt($(this).attr('data-value'));
                    });
                    $("#montantDevis").html(number_format(montantTotal, 0, '', ' '));

                    //Affichage du tableau du contenu du devis et du boutton de validation du devis
                    $("#contentDevis").show();
                    $("#validerdevis").show();


                } else {
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true });
                }
                //    alert(msg);
                $('.loaderMessage').removeClass('is-active');
            },
            error: function () {
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true });
            }
        });
    });

    $('#monFormPack').on('submit', function (e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active');
        $.ajax({
            type: "POST",
            url: "php/controller/devis.php", //process to mail
            data: $(this).serialize(),
            success: function (msg) {
                var res = msg.split("@$");
                // $.isNumeric(res[0])
                if (parseInt(res[0]) == 1) {
                    $('#monFormPack')[0].reset();
                    $("#showdata").append(res[1]);
                    //Calcul du montant total
                    var montantTotal = 0;
                    $(".valeurMontantAddition").each(function () {
                        if (isNaN(parseInt($(this).attr('data-value'))))
                            montantTotal = montantTotal + 0;
                        else
                            montantTotal = montantTotal + parseInt($(this).attr('data-value'));
                    });
                    $("#montantDevis").html(number_format(montantTotal, 0, '', ' '));

                    //Affichage du tableau du contenu du devis et du boutton de validation du devis
                    $("#contentDevis").show();
                    $("#validerdevis").show();


                } else {
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true });
                }
                // alert(msg);
                $('.loaderMessage').removeClass('is-active');
            },
            error: function () {
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true });
            }
        });
    });


    // $('#monFormRubrique').on('submit', function(e) {
    //     e.preventDefault(); 
    //     $('.loaderMessage').addClass('is-active');
    //     $.ajax({
    //         type: "POST",
    //         url: "php/controller/devis.php", //process to mail
    //         data: $(this).serialize(),
    //         success: function(msg){
    //             if(parseInt(msg)==1){
    //                 swal({ title: "Effectué !", text: "Le type service a &eacute;t&eacute; ajout&eacute;e avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
    //                 $(document).click(function(){
    //                     // window.location.href = "#idRubrique";
    //                     window.location.href = "devis_ajouter";

    //                 });
    //             }else if(parseInt(msg)==2){ 
    //                 swal({ title: "Erreur", text: "Cette rubrique existe d&eacute;j&agrave; ", imageUrl: 'dist/img/icones/error.png', html: true});
    //             }else{ 
    //                 swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
    //             }
    //             // alert(msg);
    //            $('.loaderMessage').removeClass('is-active');
    //         },
    //         error: function(){
    //             $('.loaderMessage').removeClass('is-active');
    //             swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});
    //         }
    //     });
    // });

    // $('#monFormUnService').on('submit', function(e) {
    //     e.preventDefault(); 
    //     $('.loaderMessage').addClass('is-active');
    //     $.ajax({
    //         type: "POST",
    //         url: "php/controller/devis.php", //process to mail
    //         data: $(this).serialize(),
    //         success: function(msg){
    //             if(parseInt(msg)==1){
    //                 swal({ title: "Effectué !", text: "Le type de service a &eacute;t&eacute; ajout&eacute; avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
    //                 $(document).click(function(){
    //                     window.location.href = "devis_ajouter";
    //                 });
    //             }else if(parseInt(msg)==2){ 
    //                 swal({ title: "Erreur", text: "Ce type de service existe d&eacute;j&agrave; ", imageUrl: 'dist/img/icones/error.png', html: true});
    //             }else{ 
    //                 swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
    //             }
    //             // alert(msg);
    //            $('.loaderMessage').removeClass('is-active');
    //         },
    //         error: function(){
    //             $('.loaderMessage').removeClass('is-active');
    //             swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});
    //         }
    //     });
    // });

    // $('#monFormServiceType').on('submit', function(e) {
    //     e.preventDefault(); 
    //     $('.loaderMessage').addClass('is-active');
    //     $.ajax({
    //         type: "POST",
    //         url: "php/controller/devis.php", //process to mail
    //         data: $(this).serialize(),
    //         success: function(msg){
    //             if(parseInt(msg)==1){
    //                 swal({ title: "Effectué !", text: "Le service a &eacute;t&eacute; ajout&eacute; avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
    //                 $(document).click(function(){
    //                     window.location.href = "devis_ajouter";
    //                 });
    //             }else if(parseInt(msg)==2){ 
    //                 swal({ title: "Erreur", text: "Ce type de service existe d&eacute;j&agrave; ", imageUrl: 'dist/img/icones/error.png', html: true});
    //             }else{ 
    //                 swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
    //             }
    //             // alert(msg);
    //            $('.loaderMessage').removeClass('is-active');
    //         },
    //         error: function(){
    //             $('.loaderMessage').removeClass('is-active');
    //             swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});
    //         }
    //     });
    // });

    // $('#monFormDescriptif').on('submit', function(e) {
    //     e.preventDefault(); 
    //     $('.loaderMessage').addClass('is-active');
    //     $.ajax({
    //         type: "POST",
    //         url: "php/controller/devis.php", //process to mail
    //         data: $(this).serialize(),
    //         success: function(msg){
    //             if(parseInt(msg)==1){
    //                 swal({ title: "Effectué !", text: "Le descriptif a &eacute;t&eacute; ajout&eacute; avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
    //                 $(document).click(function(){
    //                     window.location.href = "devis_ajouter";
    //                 });
    //             }else if(parseInt(msg)==2){ 
    //                 swal({ title: "Erreur", text: "Ce service existe d&eacute;j&agrave; ", imageUrl: 'dist/img/icones/error.png', html: true});
    //             }else{ 
    //                 swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
    //             }
    //             // alert(msg);
    //            $('.loaderMessage').removeClass('is-active');
    //         },
    //         error: function(){
    //             $('.loaderMessage').removeClass('is-active');
    //             swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});
    //         }
    //     });
    // });

});


