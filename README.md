# FRFPHP
PHP CODE FOR ALL PROJYECT O DOCUMENTS

### MY KIT FOR DEV
```
<?php

require __DIR__ . '/vendor/autoload.php';
use Legierski\AES\AES;
$aes = new AES;

function sanatize($data_value){
    $sanitize_entities = htmlentities($data_value,ENT_QUOTES | ENT_IGNORE, 'UTF-8');
    $sanitize_special_entities = htmlspecialchars($sanitize_entities,ENT_QUOTES | ENT_IGNORE, 'UTF-8');
    return filter_var($sanitize_special_entities, FILTER_SANITIZE_SPECIAL_CHARS);
}

function encryptData($data_encrypt,$method_encrypt,$key_encrypt){
    return  openssl_encrypt($data_encrypt,$method_encrypt,$key_encrypt);
}

function decryptData($data_encrypt,$method_encrypt,$key_encrypt){
    return  openssl_decrypt($data_encrypt,$method_encrypt,$key_encrypt);
}

function generatePassword($get_op_letersLower, $get_op_numbers, $get_op_letterUppers,$get_op_specialCharacters, $get_op_logintude){
 
    $opc_letters_lowers = $get_op_letersLower; 
    $opc_numbers= $get_op_numbers; 
    $opc_letters_uppers = $get_op_letterUppers; 
    $opc_especial_characters = $get_op_specialCharacters; 
    $set_logitude = $get_op_logintude;
    
    $letters ="abcdefghijklmnopqrstuvwxyz";
    $numbers = "1234567890";
    $letters_uppers = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $especial_characters ="|@#~$%()=^*+[]{}-_";
    $createList = "";
    
    if ($opc_letters_lowers == TRUE) {
        $createList .= $letters; }
    if ($opc_numbers== TRUE) {
        $createList .= $numbers; }
    if($opc_letters_uppers == TRUE) {
        $createList .= $letters_uppers; }
    if($opc_especial_characters == TRUE) {
        $createList .= $especial_characters; }

    return substr(str_shuffle($createList),0,$set_logitude);    
}
?>
```
