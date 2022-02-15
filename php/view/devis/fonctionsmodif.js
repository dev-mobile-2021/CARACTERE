function modifierService(idRubrique, idFamille, idTypeservice, idService, idDevis, prixAchat, prixVente, quantite){
	// alert("modif service");
	// updateSavedLine(idService, prixAchat, prixVente, quantite, idDevis, idRubrique, idFamille, idTypeservice);	
}

function supprimerService(idRubrique, idFamille, idTypeservice, idService, idDevis, prixAchat, prixVente, quantite){
	var idServiceMod = idService;
	var idDevis = idDevis;
	var idRubrique = idRubrique;
	var idFamille = idFamille;
	var idTypeservice = idTypeservice;

	swal({   title: "Suppression",   
        text: "&Ecirc;tes-vous s&ucirc;r de vouloir Supprimer cet &eacute;l&eacute;ment ?</strong>",   
        type: "warning",   
        showCancelButton: true,
        html:true,   
        confirmButtonColor: "red",   
        confirmButtonText: "Supprimer",   
        cancelButtonText: "Annuler",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
            if (isConfirm) {  
                $.ajax({
                    type: "GET",
                    url: "php/controller/devis.php?supprimerService=1&idRubrique="+idRubrique+"&idFamille="+idFamille+"&idTypeservice="+idTypeservice+"&idDevis="+idDevis+"&idServiceMod="+idServiceMod, //process to mail
                    data: '',
                    success: function(msg){
                    	var msgvals = msg.split("#res#");
                        if(parseInt(msgvals[0])==1){
                            swal({ title: "Effectué !", text: "La suppression a &eacute;t&eacute; effectu&eacute;e avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                        	if(msgvals[1] != "none")
			                	$("#monFormService2 #sousServicesAjoutes").html(msgvals[1])
			                reloadDetailDevis(idDevis, idRubrique, idFamille, idTypeservice);
                        }
                        else{ 
                            swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
                        }
                       // alert(msgvals[0]); 
                    },
                    error: function(){
                        swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});                            
                    }
                    });  
            } 
            else {
                swal({ title: "Annul&eacute;", text: "L'&eacute;l&eacute;ment n'a pas &eacute;t&eacute; supprim&eacute;", imageUrl: 'dist/img/icones/success.png', html: true});

            } 
    });
		
}

function reloadDetailDevis(idDevis, idRubrique, idFamille=null, idTypeservice=null){
	$('.loaderMessage').addClass('is-active');
    $.ajax({
        type: "POST",
        url: "php/controller/devis.php?reloadDetailDevis&idRubrique="+idRubrique+"&idFamille="+idFamille+"&idTypeservice="+idTypeservice+"&idDevis="+idDevis, //process to mail
        data: $(this).serialize(),
        success: function(msg){
          var msgvals = msg.split("#res#");
            if(parseInt(msgvals[0])==1){
                // swal({ title: "Effectué  !", text: "Le service a &eacute;t&eacute; ajout&eacute; avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                if(msgvals[1] != "none")
                	$("#detailDevis").html(msgvals[1])
                // $("#modalForUpdates").modal('hide');
                // alert("on est entre");


            }else{ 
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
            }
           $('.loaderMessage').removeClass('is-active');
        },
        error: function(){
            $('.loaderMessage').removeClass('is-active');
            swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});
        }
    });
}

function updateSavedLine(id, prixAchat, prixVente, quantite, idDevis, idRubrique, idFamille, idTypeservice){//Top
  $("#monFormUpdateLine2 #idServiceMod").val(id).change();
  $("#monFormUpdateLine2 #prixAchat").val(prixAchat);
  $("#monFormUpdateLine2 #prixVente").val(prixVente);
  $("#monFormUpdateLine2 #quantite").val(quantite);

  $("#monFormUpdateLine2 #idDevis").val(idDevis);
  $("#monFormUpdateLine2 #idRubrique").val(idRubrique);
  $("#monFormUpdateLine2 #idFamille").val(idFamille);
  $("#monFormUpdateLine2 #idTypeservice").val(idTypeservice);


  // $("#monFormUpdateLine2 #bouttonSupprimerDescriptif").attr("onclick", "hotDeleteLine2("+id+", "+prixAchat+", "+prixVente+", "+quantite+", "+idDevis+", "+idRubrique+", "+idFamille+", "+idTypeservice+")");

  $("#updateLine2").modal('show');
}

function saveDetailsUpdate2(){//Top
  if($("#monFormUpdateLine2 #idServiceMod").val() == null){
    swal({ title: "Erreur", text: "Veuillez choisir un descriptif", imageUrl: 'dist/img/icones/error.png', html: true});
  }else{
    var idServiceMod = $("#monFormUpdateLine2 #idServiceMod").val();
    var prixAchat = $("#monFormUpdateLine2 #prixAchat").val();
    var prixVente = $("#monFormUpdateLine2 #prixVente").val();
    var quantite = $("#monFormUpdateLine2 #quantite").val();

    var idDevis = $("#monFormUpdateLine2 #idDevis").val();
    var idRubrique = $("#monFormUpdateLine2 #idRubrique").val();
    var idFamille = $("#monFormUpdateLine2 #idFamille").val();
    var idTypeservice = $("#monFormUpdateLine2 #idTypeservice").val();

    $('.loaderMessage1').addClass('is-active');
	  var ur = "php/controller/devis.php?idRubrique=" + idRubrique+"&idFamille="+idFamille+"&idTypeservice="+idTypeservice+"&idDevis="+idDevis+"&idServiceMod="+idServiceMod+"&prixAchat="+prixAchat+"&prixVente="+prixVente+"&quantite="+quantite+"&modifierService=1";
	  $.ajax({
	    url: ur,
	    data: '',
	    error:function(msg){
	        alert("Connexion impossible");
	        $('.loaderMessage1').removeClass('is-active');
	    },
	    success: function(sg) {
	        // alert(sg);
	       	if(sg!=""){
	        	$("#monFormService2 #sousServicesAjoutes").html(sg);
	       	}
	        else{
	           $("#monFormService2 #sousServicesAjoutes").html("");
	        }

	        $('.loaderMessage1').removeClass('is-active');
	        
	        //Desactivation du sous service dans la liste
		    $('#monFormUpdateLine2 #idServiceMod').prop('selectedIndex',0);
		    $('#monFormUpdateLine2 #idServiceMod').select2();

		    //Reitialisation des champs
		    
		    $("#monFormUpdateLine2 #idServiceMod").val('');
		    $("#monFormUpdateLine2 #prixAchat").val('');
		    $("#monFormUpdateLine2 #prixVente").val('');
		    $("#monFormUpdateLine2 #quantite").val('');
	        $('#updateLine2').modal('hide');
	    }
	  });
    
  }
}



function hotDeleteLine2(){//Top
  	var idServiceMod = $("#monFormUpdateLine2 #idServiceMod").val();
	var idDevis = $("#monFormUpdateLine2 #idDevis").val();
	var idRubrique = $("#monFormUpdateLine2 #idRubrique").val();
	var idFamille = $("#monFormUpdateLine2 #idFamille").val();
	var idTypeservice = $("#monFormUpdateLine2 #idTypeservice").val();

	swal({   title: "Suppression",   
        text: "&Ecirc;tes-vous s&ucirc;r de vouloir Supprimer cet &eacute;l&eacute;ment ?</strong>",   
        type: "warning",   
        showCancelButton: true,
        html:true,   
        confirmButtonColor: "red",   
        confirmButtonText: "Supprimer",   
        cancelButtonText: "Annuler",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
            if (isConfirm) {  
                $.ajax({
                    type: "GET",
                    url: "php/controller/devis.php?supprimerService=1&idRubrique="+idRubrique+"&idFamille="+idFamille+"&idTypeservice="+idTypeservice+"&idDevis="+idDevis+"&idServiceMod="+idServiceMod, //process to mail
                    data: '',
                    success: function(msg){
                    	var msgvals = msg.split("#res#");
                        if(parseInt(msgvals[0])==1){
                            swal({ title: "Effectué !", text: "La suppression a &eacute;t&eacute; effectu&eacute;e avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                        	if(msgvals[1] != "none")
			                	$("#monFormService2 #sousServicesAjoutes").html(msgvals[1])
			                $("#updateLine2").modal('hide');
                        }
                        else{ 
                            swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
                        }
                       //alert(msgvals[0]); 
                    },
                    error: function(){
                        swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});                            
                    }
                    });  
            } 
            else {
                swal({ title: "Annul&eacute;", text: "L'&eacute;l&eacute;ment n'a pas &eacute;t&eacute; supprim&eacute;", imageUrl: 'dist/img/icones/success.png', html: true});

            } 
    });
}


//--------------------------------------------------------------------------------------------------------------------------

function modifierTypeservice(idRubrique, idFamille, idTypeservice){
	$('.loaderMessage1').addClass('is-active');
	var idDevis = $('.idDevis').attr("value");
	  var ur = "php/view/devis/loadUpdatefamille.php?idRubrique=" + idRubrique+"&idFamille="+idFamille+"&idTypeservice="+idTypeservice+"&idDevis="+idDevis;
	  $.ajax({
	    url: ur,
	    data: '',
	    error:function(msg){
	        alert("Connexion impossible");
	        $('.loaderMessage1').removeClass('is-active');
	    },
	    success: function(sg) {
	        // alert(sg);
	       	if(sg!=""){
	        	$('#contentForUpdates').html(sg);
	       	}
	        else{
	           $('#contentForUpdates').html("");
	        }

	        $('.loaderMessage1').removeClass('is-active');
	        $('#modalForUpdates #idService').select2();
	        $('#modalForUpdates #idTypeservice').select2();
	        $('.ligneSousService').tooltip();
	        $('#modalForUpdates').modal({
              backdrop: 'static',
              keyboard: false
            });
	        $("#modalForUpdates").modal('show');
	    }
	  });
	  
	  $('.loaderMessage1').removeClass('is-active');
}


function supprimerTypeservice(idRubrique, idFamille, idTypeservice,idDevis){
	var idDevis = $(".idDevis").attr("value") ? $(".idDevis").attr("value") : idDevis;
	var idRubrique = idRubrique;
	var idFamille = idFamille;
	var idTypeservice = idTypeservice;

	swal({   title: "Suppression",   
        text: "&Ecirc;tes-vous s&ucirc;r de vouloir Supprimer cet &eacute;l&eacute;ment ?</strong>",   
        type: "warning",   
        showCancelButton: true,
        html:true,   
        confirmButtonColor: "red",   
        confirmButtonText: "Supprimer",   
        cancelButtonText: "Annuler",   
        closeOnConfirm: true,   
        closeOnCancel: false }, 
        function(isConfirm){   
            if (isConfirm) {  
                $.ajax({
                    type: "GET",
                    url: "php/controller/devis.php?supprimerTypeService=1&idRubrique="+idRubrique+"&idFamille="+idFamille+"&idTypeservice="+idTypeservice+"&idDevis="+idDevis, //process to mail
                    data: '',
                    success: function(msg){
                        if(parseInt(msg)==1){
                            // swal({ title: "Effectué !", text: "La suppression a &eacute;t&eacute; effectu&eacute;e avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
			                reloadDetailDevis(idDevis, idRubrique, idFamille, idTypeservice);
                        }
                        else{ 
                            swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
                        }
                       // alert(msg); 
                    },
                    error: function(){
                        swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});                            
                    }
                    });  
            } 
            else {
                swal({ title: "Annul&eacute;", text: "L'&eacute;l&eacute;ment n'a pas &eacute;t&eacute; supprim&eacute;", imageUrl: 'dist/img/icones/success.png', html: true});

            } 
    });
		
}


function saveDetails2(idDevis, idRubrique, idFamille, idTypeservice){
  if($("#monFormService2 #idService").val() == null /*|| $("#monFormService2 #prixAchat").val().length === 0 || $("#monFormService2 #prixVente").val().length === 0 || $("#monFormService2 #quantite").val().length === 0*/){
    // alert("remplir tout");
    swal({ title: "Erreur", text: "Veuillez choisir un Descriptif", imageUrl: 'dist/img/icones/error.png', html: true});
    
  }else{
    var idService = $("#monFormService2 #idService").val();
    var prixAchat = $("#monFormService2 #prixAchat").val();
    var prixVente = $("#monFormService2 #prixVente").val();
    var quantite = $("#monFormService2 #quantite").val();

    $('.loaderMessage1').addClass('is-active');
	  var ur = "php/controller/devis.php?idRubrique=" + idRubrique+"&idFamille="+idFamille+"&idTypeservice="+idTypeservice+"&idDevis="+idDevis+"&idService="+idService+"&prixAchat="+prixAchat+"&prixVente="+prixVente+"&quantite="+quantite+"&ajouterService=1";
	  $.ajax({
	    url: ur,
	    data: '',
	    error:function(msg){
	        alert("Connexion impossible");
	        $('.loaderMessage1').removeClass('is-active');
	    },
	    success: function(sg) {
	        // alert(sg);
	       	if(sg!=""){
	        	$("#monFormService2 #sousServicesAjoutes").html(sg)
	       	}
	        else{
	           $("#monFormService2 #sousServicesAjoutes").html("");
	        }

	        $('.loaderMessage1').removeClass('is-active');
	        
	        //Desactivation du sous service dans la liste
		    $("#monFormService2 #idService :selected").attr("disabled", true);
		    $("#monFormService2 #idService").prop('selectedIndex',0);
		    $("#monFormService2 #idService").select2();

		    //Reitialisation des champs
		    
		    $("#monFormService2 #idService").val('');
		    $("#monFormService2 #prixAchat").val('');
		    $("#monFormService2 #prixVente").val('');
		    $("#monFormService2 #quantite").val('');
		    $("#monFormService2 .ligneSousService").tooltip();
	    }
	  });
  
  }

}


function sendAll2(idDevis, idRubrique, idFamille){
  var totalService = 0;
  if(isNaN(parseInt($("#monFormService2 #prixVenteService").val())*parseInt($("#monFormService2 #quantiteService").val())))
    totalService = 0;
  else
    totalService = (parseInt($("#monFormService2 #prixVenteService").val())*parseInt($("#monFormService2 #quantiteService").val()));
  
  var totalSousService = 0;
  $("#monFormService2 .montantSousService").each(function(){
      if(isNaN(parseInt($(this).attr('data-value'))))
          totalSousService = totalSousService + 0;
      else
          totalSousService = totalSousService + parseInt($(this).attr('data-value'));
  });

  if(((totalService == totalSousService) && (totalService != 0 && totalSousService != 0)) || (totalSousService == 0 && totalService != 0) || (totalSousService != 0 && totalService == 0) ){
    var idTypeservice = $("#monFormService2 #idTypeservice").val();
    var idDetailsTypeservice = $("#monFormService2 #idDetailsTypeservice").val();
    
    commentaireTypeservice = $("#monFormService2 #commentaireTypeservice").val();
    prixAchatService = $("#monFormService2 #prixAchatService").val();
    prixVenteService = $("#monFormService2 #prixVenteService").val();
    quantiteService = $("#monFormService2 #quantiteService").val();
    

    $('.loaderMessage').addClass('is-active');
    $.ajax({
        type: "POST",
        url: "php/controller/devis.php?addTypeService&idRubrique="+idRubrique+"&idFamille="+idFamille+"&idTypeservice="+idTypeservice+"&idDetailsTypeservice="+idDetailsTypeservice+"&idDevis="+idDevis+"&commentaireTypeservice="+commentaireTypeservice+"&prixAchatService="+prixAchatService+"&prixVenteService="+prixVenteService+"&quantiteService="+quantiteService, //process to mail
        data: $(this).serialize(),
        success: function(msg){
          var msgvals = msg.split("#res#");
            if(parseInt(msgvals[0])==1){
                swal({ title: "Effectué !", text: "Le service a &eacute;t&eacute; ajout&eacute; avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                if(msgvals[1] != "none")
                	$("#detailDevis").html(msgvals[1])
                $("#modalForUpdates").modal('hide');



            }else if(parseInt(msgvals[0])==2){ 
                swal({ title: "Erreur", text: "Ce role existe d&eacute;j&agrave; ", imageUrl: 'dist/img/icones/error.png', html: true});
            }else{ 
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
            }
           //alert(msgvals[0]);
           // alert("Valeur renvoyee :"+msgvals[0]+"contenu : "+msgvals[1]+"idRubrique="+idRubrique+"&idTypeservice="+idTypeservice);
           $('.loaderMessage').removeClass('is-active');
        },
        error: function(){
            $('.loaderMessage').removeClass('is-active');
            swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});
        }
    });




    // alert("ok ------ Rubrique : "+idRubrique+" service : "+idTypeservice+" sousServices : "+sousServices);
    
  }else if(totalService == 0 && totalSousService == 0){
    swal({ title: "Erreur", text: "Vous devez remplir au moins le montant du service ou d'un de ses Descriptifs", imageUrl: 'dist/img/icones/error.png', html: true});
    // alert("Remplir au moins le montant  d'un service ou des sous service");
  }else{
    swal({ title: "Erreur", text: "Le prix du service ne correspond pas &agrave; la sommes des prix de ses Descriptifs<br> Prix du service : "+totalService+" <br> Total des Descriptifs : "+totalSousService, imageUrl: 'dist/img/icones/error.png', html: true});
    // alert("NOn ok"+" totalService : "+totalService+" totalSousService : "+totalSousService);
  }
}

function supprimerFamille(idRubrique, idFamille){
	var idDevis = $(".idDevis").attr("value");
	var idRubrique = idRubrique;
	var idFamille = idFamille;
	var idTypeservice = 0;

	swal({   title: "Suppression",   
        text: "&Ecirc;tes-vous s&ucirc;r de vouloir Supprimer cet &eacute;l&eacute;ment ?</strong>",   
        type: "warning",   
        showCancelButton: true,
        html:true,   
        confirmButtonColor: "red",   
        confirmButtonText: "Supprimer",   
        cancelButtonText: "Annuler",   
        closeOnConfirm: true,   
        closeOnCancel: false }, 
        function(isConfirm){   
            if (isConfirm) {  
                $.ajax({
                    type: "GET",
                    url: "php/controller/devis.php?supprimerFamille=1&idRubrique="+idRubrique+"&idFamille="+idFamille+"&idDevis="+idDevis, //process to mail
                    data: '',
                    success: function(msg){
                        if(parseInt(msg)==1){
                            // swal({ title: "Effectué !", text: "La suppression a &eacute;t&eacute; effectu&eacute;e avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
			                reloadDetailDevis(idDevis, idRubrique, idFamille, idTypeservice);
                        }
                        else{ 
                            swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
                        }
                       // alert(msg); 
                    },
                    error: function(){
                        swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});                            
                    }
                    });  
            } 
            else {
                swal({ title: "Annul&eacute;", text: "L'&eacute;l&eacute;ment n'a pas &eacute;t&eacute; supprim&eacute;", imageUrl: 'dist/img/icones/success.png', html: true});

            } 
    });
}
//--------------------------------------------------------------------------------------------------------------------------
/*function modifierFamille(idRubrique, idFamille){
	// alert("modif famille");
	$('.loaderMessage1').addClass('is-active');
	var idDevis = $('.idDevis').attr("value");
	  var ur = "php/view/devis/loadUpdatefamille.php?idRubrique=" + idRubrique+"&idFamille="+idFamille+"&idDevis="+idDevis;
	  $.ajax({
	    url: ur,
	    data: '',
	    error:function(msg){
	        alert("Connexion impossible");
	        $('.loaderMessage1').removeClass('is-active');
	    },
	    success: function(sg) {
	        // alert(sg);
	       	if(sg!=""){
	        	$('#contentForUpdates').html(sg);
	       	}
	        else{
	           $('#contentForUpdates').html("");
	        }

	        $('.loaderMessage1').removeClass('is-active');
	        $("#modalForUpdates").modal('show');
	    }
	  });
	  
	  $('.loaderMessage1').removeClass('is-active');
}*/


