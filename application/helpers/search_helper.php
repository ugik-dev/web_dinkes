<?php
class Search {
  public static function arraySimilarText($needle, $haystack, $treshold = 90){
    $perc = 0;
    foreach($haystack as $k => $s){
      similar_text($needle, $s, $perc);
      if($perc > $treshold){
        return $k;
      }
    }
    return null;
  }

  public static function search_multi($needle, $haystack, $field){
    foreach($haystack as $h){
      if(isset($h[$field]) && $h[$field] == $needle){
        return $h;
      }
    }
    return NULL;
  }
}