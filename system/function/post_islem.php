<?php
function encrypt($password){
    $encrypt        = sha1(base64_encode(md5(base64_encode($password))));
    $securitypass   = substr($encrypt, 5, 32);
    return $securitypass;
}


//Resim Upload Kısmı Kontrol
function resim_yukle_kontrol($deger){
  global $hata;

    if(!empty($_FILES[$deger]['name'])){
      $errors= array();
      $file_name = $_FILES[$deger]['name'];
      $file_size =$_FILES[$deger]['size'];
      $file_tmp =$_FILES[$deger]['tmp_name'];
      $file_type=$_FILES[$deger]['type'];

      $file_exti=explode('.',$file_name);
      $file_ext=pathinfo($file_name, PATHINFO_EXTENSION);

      $file_name_first=$file_exti[0];
      $file_name_last=$file_ext;
      
      $extensions= array("jpeg","jpg","png", "gif");
                
      if($file_size > 2097152){
         $errors[]='2MB geçmiyecek bir resim seçiniz.';
      }

      if($file_size == 0 || empty($file_tmp)){
        $errors[]='Resim alınamadı.';
      }


      if(in_array($file_ext,$extensions)=== false){
         $errors[]="lütfen, resim özelliklerine sahip bir dosya seçiniz.";
      }

        if(!empty($errors)){
           foreach($errors as $err){
            $hata.="$err<br />";
           }
        }
    }
}

//Resim Upload Kısmı
function resim_yukle($deger, $yer, $dosyaismi='', $islem=false, $db=false){
    if(!is_dir(ANAYOL."images/$yer")){
      mkdir(ANAYOL."images/$yer", 0777);
    }

    if(!empty($_FILES[$deger]['name'])){
          $errors= array();
          $file_name = $_FILES[$deger]['name'];
          $file_size =$_FILES[$deger]['size'];
          $file_tmp =$_FILES[$deger]['tmp_name'];
          $file_type=$_FILES[$deger]['type'];

          $file_exti=explode('.',$file_name);
          $file_ext=pathinfo($file_name, PATHINFO_EXTENSION);

          $file_name_first=$file_exti[0];
          $file_name_last=$file_ext;

          $rand = rand();
          
          $extensions= array("jpeg","jpg","png", "gif");
                    
          if($file_size > 2097152){$errors[]='2MB geçmiyecek bir resim seçiniz.';}
          if(in_array($file_ext,$extensions)=== false){$errors[]="lütfen, resim özelliklerine sahip bir dosya seçiniz.";}
          if($file_size == 0 || empty($file_tmp)){$errors[]='Resim alınamadı.';}

          if($dosyaismi!=''){
            $file_name=sef_link($dosyaismi).'.'.$file_name_last;
          }else{
            $file_name=sef_link($file_name_first).'.'.$file_name_last;
          }


            if(empty($errors)==true){
              if($islem == 'duzenle'){
                if($db[$deger] != 'images/'.$yer.'/bos.jpg'){
                  if(file_exists(ANAYOL.$db[$deger])){
                    if(unlink(ANAYOL.$db[$deger])){
                      if(move_uploaded_file($file_tmp,ANAYOL."images/$yer/".$file_name)){$resim = "images/$yer/".$file_name;
                      }else{$resim = "images/$yer/bos.jpg";}
                    }else{
                      if(move_uploaded_file($file_tmp,ANAYOL."images/$yer/".$file_name)){$resim = "images/$yer/".$file_name;
                      }else{$resim = "images/$yer/bos.jpg";}
                    }
                  }else{
                     if(move_uploaded_file($file_tmp,ANAYOL."images/$yer/".$file_name)){
                        $resim = "images/$yer/".$file_name;
                     }else{
                        $resim = "images/$yer/bos.jpg";
                     }
                  }
                }
              }else{
                if(move_uploaded_file($file_tmp,ANAYOL."images/$yer/".$file_name)){
                   $resim = "images/$yer/".$file_name;
                }else{
                   $resim = "images/$yer/bos.jpg";
                }
              }
          }else{
            $resim = "images/$yer/bos.gif";
          }
       }else{
            $resim = "images/$yer/bos.gif";
       }

    return $resim;
}


//Tüm diller Url-Slug Converter System
function sef_link($text, $replace=array(), $delimiter='-') {
    $str = $text;
    if( !empty($replace) ) {
      $str = str_replace((array)$replace, ' ', $str);
    }

    $text = $str;
    static $translit = array(
      'a' => '/[ÀÁÂẦẤẪẨÃĀĂẰẮẴȦẲǠẢÅÅǺǍȀȂẠẬẶḀĄẚàáâầấẫẩãāăằắẵẳȧǡảåǻǎȁȃạậặḁą]/u',
      'b' => '/[ḂḄḆḃḅḇ]/u',     'c' => '/[ÇĆĈĊČḈçćĉċčḉ]/u',
      'd' => '/[ÐĎḊḌḎḐḒďḋḍḏḑḓð]/u',
      'e' => '/[ÈËÉĒĔĖĘĚȄȆȨḔḖḘḚḜẸẺẼẾỀỂỄỆèéëēĕėęěȅȇȩḕḗḙḛḝẹẻẽếềểễệ]/u',
      'f' => '/[Ḟḟ]/u',       'g' => '/[ĜĞĠĢǦǴḠĝğġģǧǵḡ]/u',
      'h' => '/[ĤȞḢḤḦḨḪĥȟḣḥḧḩḫẖ]/u',    'i' => '/[ÌÏĨĪĬĮİǏȈȊḬḮỈỊiìïĩīĭįǐȉȋḭḯỉị]/u',
      'j' => '/[Ĵĵǰ]/u',        'k' => '/[ĶǨḰḲḴKķǩḱḳḵ]/u',
      'l' => '/[ĹĻĽĿḶḸḺḼĺļľŀḷḹḻḽ]/u',   'm' => '/[ḾṀṂḿṁṃ]/u',
      'n' => '/[ÑŃŅŇǸṄṆṈṊñńņňǹṅṇṉṋ]/u',
      'o' => '/[ÒÖŌŎŐƠǑǪǬȌȎȪȬȮȰṌṎṐṒỌỎỐỒỔỖỘỚỜỞỠỢØǾòöōŏőơǒǫǭȍȏȫȭȯȱṍṏṑṓọỏốồổỗộớờởỡợøǿ]/u',
      'p' => '/[ṔṖṕṗ]/u',       'r' => '/[ŔŖŘȐȒṘṚṜṞŕŗřȑȓṙṛṝṟ]/u',
      's' => '/[ŚŜŞŠȘṠṢṤṦṨſśŝşšșṡṣṥṧṩش]/u',  'ss'  => '/[ß]/u',
      't' => '/[ŢŤȚṪṬṮṰţťțṫṭṯṱẗ]/u',    'th'  => '/[Þþ]/u',
      'u' => '/[ÙŨŪŬŮŰŲƯǓȔȖṲṴṶṸṺỤỦỨỪỬỮỰùũūŭůűųưǔȕȗṳṵṷṹṻụủứừửữựµ]/u',
      'v' => '/[ṼṾṽṿ]/u',       'w' => '/[ŴẀẂẄẆẈŵẁẃẅẇẉẘ]/u',
      'x' => '/[ẊẌẋẍ×]/u',      'y' => '/[ÝŶŸȲẎỲỴỶỸýÿŷȳẏẙỳỵỷỹ]/u',
      'z' => '/[ŹŻŽẐẒẔźżžẑẓẕ]/u',       
      //combined letters and ligatures:
      'ae'  => '/[ÄǞÆǼǢäǟæǽǣ]/u',     'oe'  => '/[Œœ]/u',
      'dz'  => '/[ǄǅǱǲǆǳ]/u',
      'ff'  => '/[ﬀ]/u',  'fi'  => '/[ﬃﬁ]/u', 'ffl' => '/[ﬄﬂ]/u',
      'ij'  => '/[Ĳĳ]/u', 'lj'  => '/[Ǉǈǉ]/u',  'nj'  => '/[Ǌǋǌ]/u',
      'st'  => '/[ﬅﬆ]/u', 'ue'  => '/[ÜǕǗǙǛüǖǘǚǜ]/u',
      //currencies:
      'eur'   => '/[€]/u',  'cents' => '/[¢]/u',  'lira'  => '/[₤]/u',  'dollars' => '/[$]/u',
      'won' => '/[₩]/u',  'rs'  => '/[₨]/u',  'yen' => '/[¥]/u',  'pounds'  => '/[£]/u',
      'pts' => '/[₧]/u',
      //misc:
      'degc'  => '/[℃]/u',  'degf'  => '/[℉]/u',
      'no'  => '/[№]/u',  'tm'  => '/[™]/u',
    );
    //do the manual transliteration first
    $str = preg_replace (array_values ($translit), array_keys ($translit), $str);
    //flatten the text down to just a-z0-9 and dash, with underscores instead of spaces
    $str = preg_replace (
      //remove punctuation  //replace non a-z //deduplicate //trim underscores from start & end
      array('/\p{P}/u',  '/[^A-Za-z0-9]/', '/-{2,}/', '/^-|-$/'),
      array('-',           '-',              '-',       '-'),
      
      //attempt transliteration with PHP5.4's transliteration engine (best):
      //(this method can handle near anything, including converting chinese and arabic letters to ASCII.
      // requires the 'intl' extension to be enabled)
      function_exists ('transliterator_transliterate') ? transliterator_transliterate (
        //split unicode accents and symbols, e.g. "Å" > "A°":
        'NFKD; '.
        //convert everything to the Latin charset e.g. "ま" > "ma":
        //(splitting the unicode before transliterating catches some complex cases,
        // such as: "㏳" >NFKD> "20日" >Latin> "20ri")
        'Latin; '.
        //because the Latin unicode table still contains a large number of non-pure-A-Z glyphs (e.g. "œ"),
        //convert what remains to an even stricter set of characters, the US-ASCII set:
        //(we must do this because "Latin/US-ASCII" alone is not able to transliterate non-Latin characters
        // such as "ま". this two-stage method also means we catch awkward characters such as:
        // "㏀" >Latin> "kΩ" >Latin/US-ASCII> "kO")
        'Latin/US-ASCII; '.
        //remove the now stand-alone diacritics from the string
        '[:Nonspacing Mark:] Remove; '.
        //change everything to lowercase; anything non A-Z 0-9 that remains will be removed by
        //the letter stripping above
        'Lower',
      $str)
      
      //attempt transliteration with iconv: <php.net/manual/en/function.iconv.php>
      : strtolower (function_exists ('iconv') ? str_replace (array ("'", '"', '`', '^', '~'), '', strtolower (
        //note: results of this are different depending on iconv version,
        //      sometimes the diacritics are written to the side e.g. "ñ" = "~n", which are removed
        iconv ('UTF-8', 'US-ASCII//IGNORE//TRANSLIT', $str)
      )) : $str)
    );
    
    //old iconv versions and certain inputs may cause a nullstring. don't allow a blank response
    if(!$str || $str =="_" || $str == "-"){
      $str = preg_replace("/[^A-Za-z0-9 -]/", '', $text);  
      $str = preg_replace("/[\/_|+ -]+/", $delimiter, $str);
      $str = str_replace("'","",$str);
      $str = str_replace('"','',$str);
      $str = strtolower(rtrim(trim($str,'-'), '-'));
      if(empty($str) || $str =="_" || $str == "-"){
        return Main::strrand(5);
      }else{
        return $str;
      }                
    }else{
      return $str;
    }       
}