<?php  

try {
    $db=new PDO("mysql:host=localhost; dbname=mhrs_otomasyon; charest=utf8", 'root','');
    //echo'veritabanı bağlantısı başarılı';    
}
  catch (Exception $anil) {
    echo $anil->getMessage();
  }





?>