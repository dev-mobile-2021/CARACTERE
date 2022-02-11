<?php
  
  function Date_ConvertSqlTab($date_sql) {
  $jour = substr($date_sql, 8, 2);
  $mois = substr($date_sql, 5, 2);
  $annee = substr($date_sql, 0, 4);
  $heure = substr($date_sql, 11, 2);
  $minute = substr($date_sql, 14, 2);
  $seconde = substr($date_sql, 17, 2);
  
  $key = array('annee', 'mois', 'jour', 'heure', 'minute', 'seconde');
  $value = array($annee, $mois, $jour, $heure, $minute, $seconde);
  
  $tab_retour = array_combine($key, $value);
  
  return $tab_retour;
}

function DateMoisTxt($mois_brut) {
  if($mois_brut=='01') {
    return 'Janvier';
  } elseif($mois_brut=='02') {
    return 'Février';
  } elseif($mois_brut=='03') {
    return 'Mars';
  } elseif($mois_brut=='04') {
    return 'Avril';
  } elseif($mois_brut=='05') {
    return 'Mai';
  } elseif($mois_brut=='06') {
    return 'Juin';
  } elseif($mois_brut=='07') {
    return 'Juillet';
  } elseif($mois_brut=='08') {
    return 'Août';
  } elseif($mois_brut=='09') {
    return 'Septembre';
  } elseif($mois_brut=='10') {
    return 'Octobre';
  } elseif($mois_brut=='11') {
    return 'Novembre';
  } elseif($mois_brut=='12') {
    return 'Décembre';
  };
}

function DateJourTxt($jour_brut) {
  if($jour_brut=='Mon') {
    return 'Lundi';
  } elseif($jour_brut=='Tue') {
    return 'Mardi';
  } elseif($jour_brut=='Wed') {
    return 'Mercredi';
  } elseif($jour_brut=='Thu') {
    return 'Jeudi';
  } elseif($jour_brut=='Fri') {
    return 'Vendredi';
  } elseif($jour_brut=='Sat') {
    return 'Samedi';
  } elseif($jour_brut=='Sun') {
    return 'Dimanche';
  };
}

function DateComplete($date_sql) {
  $tab_date = Date_ConvertSqlTab($date_sql);
  $mktime_brut = mktime($tab_date['heure'],
                        $tab_date['minute'],
                        $tab_date['seconde'],
                        $tab_date['mois'],
                        $tab_date['jour'],
                        $tab_date['annee']);
  
  return DateJourTxt(date('D', $mktime_brut)).' '.$tab_date['jour'].' '.DateMoisTxt(
                     date('m', $mktime_brut)).' '.$tab_date['annee'].' à '.$tab_date['heure'].':'.$tab_date['minute'].':'.$tab_date['seconde'] ;
}

function DateComplete3($date_sql) {
  $tab_date = Date_ConvertSqlTab($date_sql);
  $mktime_brut = mktime($tab_date['heure'],
                        $tab_date['minute'],
                        $tab_date['seconde'],
                        $tab_date['mois'],
                        $tab_date['jour'],
                        $tab_date['annee']);
  
  return $tab_date['jour'].'/'.$tab_date['mois'].'/'.$tab_date['annee'].' à '.$tab_date['heure'].':'.$tab_date['minute'] ;
}

function DateComplete4($date_sql) {
  $tab_date = Date_ConvertSqlTab($date_sql);
  $mktime_brut = mktime($tab_date['heure'],
                        $tab_date['minute'],
                        $tab_date['seconde'],
                        $tab_date['mois'],
                        $tab_date['jour'],
                        $tab_date['annee']);
  
  return $tab_date['jour'].'/'.$tab_date['mois'].'/'.$tab_date['annee'] ;
}

//Fonction d'upload


?>