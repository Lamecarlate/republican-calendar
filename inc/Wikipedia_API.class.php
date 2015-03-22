<?php 

  class Wikipedia_API {

    public $title;

    function __construct() {

    }

    function get_main_picture_name($title) {

      $title = str_replace(' ', '_', $title);

      $page_url = 'http://fr.wikipedia.org/w/api.php?format=json&action=query&titles=' . $title . '&prop=pageimages&piprop=name&pilimit=10&redirects&continue' ;

      $raw_content = file_get_contents($page_url);
      $decoded_content = json_decode($raw_content);

      $content = $decoded_content->query->pages;
      $content = array_values((array)$content);
      if(!empty($content[0]->pageimage)) {
        $image_name = $content[0]->pageimage;
        return $image_name;
      }

      return FALSE;

    }

    function get_main_picture_file($image_name) {

      $image_url = 'http://fr.wikipedia.org/w/api.php?format=json&action=query&titles=File:' . $image_name . '&prop=imageinfo&iiprop=url|user&continue';

      $raw_content = file_get_contents($image_url);
      $decoded_content = json_decode($raw_content);
      $content = $decoded_content->query->pages;
      $content = array_values((array)$content);
      $distant_image = $content[0]->imageinfo[0]->url;

      return $distant_image;

    }

  }
