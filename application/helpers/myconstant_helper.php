<?php

class MyConstant {

  public static function ID_KEGIATAN_BD_1($kategori = '', $jenjang = ''){
    switch($kategori){
      // Mengajar
      case '1': 
        switch($jenjang){
          case '0' : case '1' :
            return ['101', '102', '103', '104', '107', '108', '109', '122'];
          case '2' : case '4' : case '5' :
            return ['105', '107', '108', '109', '122'];
          case '3' : case '6' :
            return ['106', '107', '108', '109', '122'];
        }
        break;
      // Membimbing
      case '2':
        switch($jenjang){
          case '0' : case '1' : case '4' :
            return ['110', '111', '115', '119', '401'];
          case '2' : case '5' : case '6' :
            return ['110', '112', '116', '119', '401'];
          case '3' :
            return ['110', '119', '401', '123', '124', '125', '126', '127', '128', '129', '130', '131'];
        }
        break;
      // Menguji
      case '3':
        switch($jenjang){          
          case '0' : case '1' : case '4' :
            return ['113', '117'];
          case '2' : case '5' : case '6' :
            return ['114', '118'];
          case '3' :
            return ['132', '133', '134', '135', '136', '137', '138', '139'];
        }
        break;
      // Lainnya
      case '4':
        return ['120', '121'];
    }
    return [];
  }

  public static function JENIS_LUARAN($id){
    switch($id){
      case '1' : 
        return array('model' =>'ProceedingModel', 'nama' => 'proceeding');
      case '2' : 
        return array('model' =>'JournalModel', 'nama' => 'journal');
      case '3' : 
        return array('model' =>'BookModel', 'nama' => 'book');
      case '4' : 
        return array('model' =>'HKIModel', 'nama' => 'hki');
      case '5' : 
        return array('model' =>'LainnyaModel', 'nama' => 'lainnya');
    }
    throw new UserException('Jenis tidak ditemukan', 20404);
  }

}