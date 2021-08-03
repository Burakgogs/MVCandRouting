<?php
 $dirname= dirname($_SERVER['SCRIPT_NAME']); //hangi klasörde olduğumuz.

 $basename = basename($_SERVER['SCRIPT_NAME']);

 $request_uri = str_replace([$dirname,$basename], [null],  $_SERVER['REQUEST_URI']);



/*

//prag match kullanımı
$url='/uye/tayfunerbilen';

echo preg_match('@^/uye/([0-9a-zAZ])+@',$url,$parameters);
print_r($parameters);
*/
require __DIR__.'/database.php';
require __DIR__.'/model.php';
require __DIR__.'/route.php';
require __DIR__.'/controller.php';
Route::run('/', function(){
    echo 'merhaba dünya';

});
Route::run('/uyeler','uyeler@index');
Route::run('/uyeler','uyeler@post','post');
Route::run('/uye/{url}','uye@index');
Route::run('/profil/sifre-degistir','profile/changepassword@index');
?>