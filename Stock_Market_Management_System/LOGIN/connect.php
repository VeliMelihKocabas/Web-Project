<?php
    
try{
    $db = new PDO("mysql:host=localhost; dbname=tkkdatabase; charset=utf8",'root', '');
    //echo "DB bağlantısı başarılı.";
}
catch(Exception $e){
    echo $e->getMessage();
}

?>