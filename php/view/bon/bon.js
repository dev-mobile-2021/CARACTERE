$(function(){
    $('#monForm').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
            $.ajax({
                type: "POST",
                url: "php/controller/bon.php", //process to mail
                data: $(this).serialize(),
                success: function(msg){
                    var res = msg.split("@$");
                    // $.isNumeric(res[0])
                    if($.isNumeric(msg)){
                        $(".idBon").attr("value", msg)

                        //Affichage de la zone d'ajout de services
                        $("#formulairesServiceBon").show();
                        $("#parentContentBon").show();
                        $("#monForm").append("<input type='hidden' name='updateNow' value='"+msg+"'>");
    
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
    function number_format (number, decimals, dec_point, thousands_sep) {
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
    $('#monFormService').on('submit', function(e) {
        e.preventDefault(); 
        $('.loaderMessage').addClass('is-active');
            $.ajax({
                type: "POST",
                url: "php/controller/bon.php", //process to mail
                data: $(this).serialize(),
                success: function(msg){
                    var res = msg.split("@$");
                    // $.isNumeric(res[0])
                    if(parseInt(res[0])==1){
                        $('#monFormService')[0].reset();
                        $("#showdata").append(res[1]);
                        //Calcul du montant total
                        // var valeurMontantAddition
                        var montantTotal = 0;
                        $(".valeurMontantAddition").each(function(){
                            if(isNaN(parseInt($(this).attr('data-value'))))
                                montantTotal = montantTotal + 0;
                            else
                                montantTotal = montantTotal + parseInt($(this).attr('data-value'));
                        });
                        $("#montantBon").html(number_format(montantTotal, 0, '', ' '));

                        //Affichage du tableau du contenu du bon et du boutton de validation du bon
                        $("#contentBon").show();
                        $("#validerbon").show();

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


