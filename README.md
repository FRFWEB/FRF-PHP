# FRFPHP
PHP CODE FOR ALL PROJYECT O DOCUMENTS

### INSTALL PHP IN UBUNTU

example php7.4

```
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install -y php7.4
sudo apt-get install -y php7.4-cli php7.4-json php7.4-common php7.4-mysql php7.4-zip php7.4-gd php7.4-mbstring php7.4-curl php7.4-xml php7.4-bcmath php-pear php7.4-opcache php7.4-imap php7.4-intl php7.4-soap php7.4-ldap php7.4-imagick php-imagick 7.4-xmlrpc libapache2-mod-php7.4 php-xml

//Enable curl function
phpenmod curl
```

### INSTALL SSH2_CONNECT

```
sudo apt-get install -y php-ssh2 libssh2-1
```

### FIX PHP IN CASE FILES DONWLAD

remove php version example php7.3

```
sudo apt-get purge php7.*
sudo apt-get autoclean
sudo apt-get autoremove
```
next install new version of php and create file .htaccess

```
# JAVASCRIPT FILES
<Files *.js>
    ForceType application/x-httpd-php
    Header set Content-Type "application/javascript"
</Files>

# JSON FILES
<Files *.json>
    ForceType application/x-httpd-php
    Header set Content-Type "application/json"
</Files>

# CSS FILES
<Files *.css>
    ForceType application/x-httpd-php
    Header set Content-Type "text/css"
</Files>

#CLEAN EXTENSION .PHP
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^([^\.]+)$ $1.php [NC,L]
```

### MY KIT FOR DEV

[Legierski - AES](https://github.com/legierski/AES)

```
<?php

require __DIR__ . '/vendor/autoload.php';
use Legierski\AES\AES;
$aes = new AES;

function sanatize($data_value){
    $sanitize_entities = htmlentities($data_value,ENT_QUOTES | ENT_IGNORE | ENT_COMPAT, 'UTF-8');
    $sanitize_special_entities = htmlspecialchars($sanitize_entities,ENT_QUOTES | ENT_IGNORE, 'UTF-8');
    $sanitize_others_chars = preg_replace('/\(|\)|\;/','',$sanitize_special_entities);
    return filter_var($sanitize_others_chars, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_HIGH);
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
### MVC

For Create Project in MVC is necessary:

- Separe proyect in two folders App and Public
-----------
App       +
-----------
- Create folder and archive config.php, define database, url root, app root, and sitename index
- Create folder Libraries and create files Core, Controller and Database .php
- Create file require.php where call config.php and libraries for example core.php, controller.php etc...
- Create Model for Controller, example Controller Users, model User and prepare all querys for user
- Create folder views create index.php and separate head, footer, content etc..
-----------
Public    +
-----------
- Create folders assets for all document public example style.css, javascript, images
- Create .htaccess with rewrite for redirect folders

## php-node

before install php-node of npm in ubuntu configure addreess folder bin with version php to:

Example :

- /usr/bin/php7.2
- /usr/bin/php7.3

In windows configure where this your php.exe file

Example with xampp:

- C:\\xampp\\php\\php.exe

Line code complete:

- const phpnode = require('php-node')({bin:"C:\\xampp\\php\\php.exe"});
- const phpnode = require('php-node')({bin:"/usr/bin/php7.2"});

```
const phpnode = require('php-node')({bin:"C:\\xampp\\php\\php.exe"});
app.engine('php', phpnode);
app.set('view engine', 'php');
```

```
const phpnode = require('php-node')({bin:"/usr/bin/php7.2"});
app.engine('php', phpnode);
app.set('view engine', 'php');
```


