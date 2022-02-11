$(function(){
    $('#monFormFacturer').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
        var idDevis = $("#idDevis").attr("value");
        $.ajax({
            type: "POST",
            url: "php/controller/facture.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    // swal({ title: "Effectué !", text: "Informations sur le bon de commande enregistr&eacute;es avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                // $(document).click(function(){
                    // window.location.href = "devis_liste";
                    // location.reload();
                // });
                    $('#preloaderImpression').modal({
                      backdrop: 'static',
                      keyboard: false
                    })
                    $("#preloaderImpression").modal('show');
                    
                    $.ajax({
                      type: "POST",
                      url: "doc/factureCommercial.php?idDevis="+idDevis, 
                      data: $(this).serialize(),
                      success: function(msg){
                          if($.isNumeric(msg)){
                              $('#preloaderImpression').modal('hide');
                              swal({   
                                title: "Fcature g&eacute;n&eacute;r&eacute;e avec succès!",   
                                text: "<div class='row'><div class='col-sm-3'><a onclick='swal.close(); location.reload();' class='btn btn-default' id='closeModal'>Fermer</a></div><div class='col-sm-9' style='text-align:right;'><a class='btn btn-success' href='doc/devis/FactureCommercial_"+msg+".pdf' target='_blank'>Ouvrir la facture</a></div></div>",   
                                showConfirmButton: false,
                                html: true
                              });
                          }else{ 
                              $('#preloaderImpression').modal('hide');
                              swal("La facture que vous essayez de créer est actuellement ouverte sur votre ordinateur. Veuillez le fermer puis reéssayer");
                          }
                         // alert(msg);
                         $('.loaderMessage').removeClass('is-active');
                      },
                      error: function(){
                          $('.loaderMessage').removeClass('is-active');
                          swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
                      }
                  });
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


