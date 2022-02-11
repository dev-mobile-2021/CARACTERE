$(function(){
    $('#monFormAddCommentaire').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        $.ajax({
            type: "POST",
            url: "php/controller/devis.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    swal({ title: "Effectué !", text: "Commentaire envoy&eacute; avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                $(document).click(function(){
                    // window.location.href = "devis_liste";
                    location.reload();
                });
                }else{ 
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
                }
            //   alert(msg);
               $('.loaderMessage').removeClass('is-active');
            },
            error: function(){
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});
            }
        });
    });
    
    $('#monFormValidationclient').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        $.ajax({
            type: "POST",
            url: "php/controller/devis.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    swal({ title: "Effectué !", text: "Validation client enregistr&eacute;e avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                $(document).click(function(){
                    // window.location.href = "devis_liste";
                    location.reload();
                });
                }else{ 
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
                }
              alert(msg);
               $('.loaderMessage').removeClass('is-active');
            },
            error: function(){
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});
            }
        });
    });
    
    $('#monFormReceptionbc').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        $.ajax({
            type: "POST",
            url: "php/controller/devis.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    swal({ title: "Effectué !", text: "Informations sur le bon de commande enregistr&eacute;es avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                $(document).click(function(){
                    // window.location.href = "devis_liste";
                    location.reload();
                });
                }else{ 
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
                }
            alert(msg);
               $('.loaderMessage').removeClass('is-active');
            },
            error: function(){
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});
            }
        });
    });
    
    
});


