<?php

  class Republican {

    public $gregorian_month;
    public $gregorian_day;
    public $republican_day_name;
    public $republican_day_number;
    public $republican_month;
    public $republican_season;

    function __construct($gregorian_month, $gregorian_day) {
      $this->gregorian_month = $gregorian_month;
      $this->gregorian_day = $gregorian_day;
      $this->get_republican_data($this->gregorian_month, $this->gregorian_day);
    }

    function get_republican_data($month, $day) {

      $csv_file = DATA_PATH . DS . 'list.csv';
      if(!file_exists($csv_file)) {
        echo 'oh, no file';
        return FALSE;
      }

      $handle = fopen($csv_file, 'r');
      if(!$handle) {
        echo 'cant open';
        return FALSE;
      }

      $result = array();
      while(($data = fgetcsv($handle, 255, ';')) !== FALSE) {

        if(intval($data[0]) === $month && intval($data[1]) === $day) {
          $result = $data;
          break;
        }
      }

      $this->republican_day_name = $result[2];
      $this->republican_day_number = $result[3];
      $this->republican_month = $result[4];
      $this->republican_season = $result[5];

    }
  }
