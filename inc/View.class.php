<?php 

class View {

  public $views_variables = array();

  function body_css() {
    $classes = '';
    if(!empty($this->views_variables['season'])) {
      $classes .= ' season--' . css_friendly_string($this->views_variables['season']);
    }
    if(!empty($this->views_variables['month'])) {
      $classes .= ' month--' . css_friendly_string($this->views_variables['month']);
    }
    return $classes;
  }

}
