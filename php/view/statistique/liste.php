<script type="text/javascript" src="php/view/statistique/statistique.js"></script>

<style>
  /* input {
    color: black;
  }
    ::-webkit-input-placeholder {
      color:black;
    }

    ::-moz-placeholder {
      color: black;
    }

    :-ms-input-placeholder {
      color: black;
    }

    :-moz-placeholder {
      color: black;
    } */
  input {
    border: 2px solid black;
    padding: 3px;
  }

  :placeholder-shown {
    border-color: silver;
  }

  .actives {
    background-color: #fff;
    color: #444 !important;
  }
</style>
<div class="content-wrapper">
  <section class="content">
    <section class="content-header">
      <h1>
        Edition Pilotées
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li class="active">Statistiques</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box  box-primary">
            <div class="box-header">
              <h3 class="box-title">Statistiques</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <!-- Custom Tabs -->
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab_1" data-toggle="tab">Statistiques clients</a></li>
                      <li><a href="#tab_2" onclick="placeholdertTanalyse()" data-toggle="tab">Analyse des devis</a></li>
                      <li><a href="#tab_3" onclick="placeholdertTmarge()" data-toggle="tab">Tableau des Marges</a></li>
                      <li><a href="#tab_4" onclick="placeholdertTproduits()" data-toggle="tab">Statistiques produits</a></li>
                    </ul>
                    <div class="box box-default">

                      <div class="box-body">

                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_1">
                            <div class="row">
                              <div class="col-md-6">

                                <b>STATISTIQUES CUMULEES CLIENTS</b><br><br>
                                <form action="php/controller/exportcumuleclient.php" method="post" id="load_txt_form">

                                  <div class="form-group">
                                    <select class="form-control select2" multiple="multiple" data-placeholder="" style="width: 100%; " id="yearclient" name="year">
                                      <option value="">Choisir l'année</option>
                                      <option value="2021">2021</option>
                                      <option value="2022">2022</option>


                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="submit" name="export_excel" class="btn btn-bg btn-success " value="Exporter">
                                  </div>

                                </form>
                              </div>
                              <div class="col-md-6">

                                <b>STATISTIQUES MENSUELLES CLIENTS</b><br><br>
                                <form action="php/controller/exportmensuelclient.php" method="post" id="load_txt_form">

                                  <div class="form-group">
                                    <select class="form-control select2" multiple="multiple" data-placeholder="" style="width: 100%;" id="monthsclient" name="months[]">
                                      <option value="">Choisir le mois</option>

                                      <option value="1">Janvier</option>
                                      <option value="2">Février</option>
                                      <option value="3">Mars</option>
                                      <option value="4">Avril</option>
                                      <option value="5">Mai</option>
                                      <option value="6">Juin</option>
                                      <option value="7">Juillet</option>
                                      <option value="8">Aout</option>
                                      <option value="9">Septembre</option>
                                      <option value="10">Octobre</option>
                                      <option value="11">Novembre</option>
                                      <option value="12">Décembre</option>

                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="submit" name="export_excel" class="btn btn-bg btn-success " value="Exporter">
                                  </div>

                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane " id="tab_2">
                            <div class="row">
                              <div class="col-md-6">

                                <b>ANALYSE </b><br><br>

                                <form action="php/controller/exportanalysedevis.php" method="post" id="load_txt_form">
                                  <div class="form-group">

                                    <select class="form-control select2" multiple="multiple" style="width: 100%;" id="yearanalyse" name="year">
                                      <option value="">Choisir l'année</option>
                                      <option value="2021">2021</option>
                                      <option value="2022">2022</option>
                                    </select>

                                  </div>
                                  <div class="form-group">

                                    <input type="submit" name="export_excel" class="btn btn-bg btn-success " value="Exporter">



                                  </div>

                                </form>
                              </div>
                              <div class="col-md-6">
                              </div>
                            </div>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane " id="tab_3">
                            <div class="row">
                              <div class="col-md-6">

                                <b>TABLEAU DES MARGES</b><br><br>

                                <form action="php/controller/exporttableaumarge.php" method="post" id="load_txt_form">
                                  <div class="form-group">
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Choisir l'année"  style="width: 100%;" id="yearmarge" name="year">
                                      <option value="">Choisir l'année</option>

                                      <option value="2021">2021</option>
                                      <option value="2022">2022</option>

                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="submit" name="export_excel" class="btn btn-bg btn-success " value="Exporter">
                                  </div>
                                </form>
                              </div>

                            </div>

                          </div>


                          <div class="tab-pane " id="tab_4">
                            <div class="row">
                              <div class="col-md-6">

                                <b>STATISTIQUES CUMULEES PRODUITS</b><br><br>
                                <form action="php/controller/exportcumulproduit.php" method="post" id="load_txt_form">


                                  <div class="form-group">
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Choisir l'année" style="width: 100%;" id="yearproduit" name="year">
                                      <option value="">Choisir l'année</option>

                                      <option value="2021">2021</option>
                                      <option value="2022">2022</option>

                                    </select>
                                  </div>
                                  <div class="form-group">

                                    <input type="submit" name="export_excel" class="btn btn-bg btn-success " value="Exporter">
                                  </div>
                                </form>
                              </div>
                              <div class="col-md-6">

                                <b>STATISTIQUES MENSUELLES PRODUITS</b><br><br>

                                <form action="php/controller/exportmensuelproduit.php" method="post" id="load_txt_form">

                                  <div class="form-group">
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Choisir le mois" style="width: 100%;" id="monthsproduit" name="months[]">
                                      <option value="">Choisir le mois</option>

                                      <option value="1">Janvier</option>
                                      <option value="2">Février</option>
                                      <option value="3">Mars</option>
                                      <option value="4">Avril</option>
                                      <option value="5">Mai</option>
                                      <option value="6">Juin</option>
                                      <option value="7">Juillet</option>
                                      <option value="8">Aout</option>
                                      <option value="9">Septembre</option>
                                      <option value="10">Octobre</option>
                                      <option value="11">Novembre</option>
                                      <option value="12">Décembre</option>

                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="submit" name="export_excel" class="btn btn-bg btn-success " value="Exporter">
                                  </div>
                                </form>


                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
          </div>
          <!-- /.col -->


          <!-- /.col -->
        </div>
      </div>
      <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>




<!-- /.modal -->
</section>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#yearclient').attr("data-placeholder", "Choisir l'année ");
  });
  $(document).ready(function() {
    $('#monthsclient').attr("data-placeholder", "Choisir le mois ");
  });

  // $(document).ready(function (){ 
  //   $("#yearanalyse").attr("data-placeholder", "Choisir l'année ");
  // });

  function placeholdertTanalyse() {
    $(document).ready(function (){ 
    

    $("#yearanalyse").select2({
    placeholder: "Choisir l'année"
    });

  });
    console.log("ok analyse");
  }

  function placeholdertTmarge() {
    $(document).ready(function (){ 
    

    $("#yearmarge").select2({
    placeholder: "Choisir l'année"
    });

  });
   
  }
  function placeholdertTproduits() {
      $('#yearproduit').attr("data-placeholder", "Choisir l'année ss ");
      $('#monthsproduit').attr("data-placeholder", "Choisir le mois ss ");
    console.log("ok produit");

    $(document).ready(function (){ 
    

    $("#yearproduit").select2({
    placeholder: "Choisir l'année"
    });

  });
  $(document).ready(function (){ 
    

    $("#monthsproduit").select2({
    placeholder: "Choisir l'année"
    });

  });
  }
</script> 