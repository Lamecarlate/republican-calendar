<?php 

class Error {

  public $error = FALSE;
  public $error_displayed = TRUE;
  public $error_code = 'UNKNOWN';
  public $error_message = "";
  public $is_critical = FALSE;

  public $errors_list = array(
    'UNKNOWN' => "Erreur inconnue. Woups.",
    'NODATE' => "Date incorrecte. Il n'y a pas plus de 12 mois dans une année ou 31 jours dans le mois, hein.",
    'NOIMAGE' => "Il n'y a pas d'image pour ce jour ou bien elle n'a pu être téléchargée depuis Wikipédia. Contactez la webmistress."
  );

  public $errors_critical = array(
    'NODATE'
  );

  function __construct($error_code){
    $this->error_code = $error_code;
    $this->is_critical = $this->is_error_critical();
  }

  function display_errors(){
    $error_message = $this->errors_list[$this->error_code];
    return $error_message;
  }

  function is_error_critical() {
    if(in_array($this->error_code, $this->errors_critical)) {
      return TRUE;
    }
    return FALSE;
  }


  function log_error() {

  }

}




