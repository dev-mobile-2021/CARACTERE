$(function(){
    $('#monForm').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        $.ajax({
            type: "POST",
            url: "php/controller/contact.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    swal({ title: "Effectué !", text: "Le contact a &eacute;t&eacute; ajout&eacute; avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                    $(document).click(function(){
                        window.location.href = "contact_liste";
                    });
                }else if(parseInt(msg)==2){ 
                    swal({ title: "Erreur", text: "Un contact avec le m&ecirc;me num&eacute;ro de t&eacute;l&eacute;phone existe d&eacute;j&agrave; ", imageUrl: 'dist/img/icones/error.png', html: true});
                }else{ 
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
                }
               // alert(msg);
               $('.loaderMessage').removeClass('is-active');
            },
            error: function(){
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});
            }
        });
    });
    
    $('#monFormMod').on('submit', function(e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active');     
        $.ajax({
            type: "POST",
            url: "php/controller/contact.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    swal({ title: "Effectué !", text: "Le contact a &eacute;t&eacute; modifi&eacute; avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                    $(document).click(function(){
                        window.location.href = "contact_liste";
                    });
                }else if(parseInt(msg)==2){ 
                    swal({ title: "Erreur", text: "Un contact avec le m&ecirc;me num&eacute;ro de t&eacute;l&eacute;phone existe d&eacute;j&agrave;", imageUrl: 'dist/img/icones/error.png', html: true});
                }else{ 
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
                }
               // alert(msg);
               $('.loaderMessage').removeClass('is-active');
            },
            error: function(){
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});
            }
        });
    });
    
});


