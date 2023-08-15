# FRFPHP
PHP CODE FOR ALL PROJYECT O DOCUMENTS

### OBTENER PRECIO DEL DOLARTODAY VENEZUELA
```
$client = new Client(HttpClient::create(['timeout' => 60]));
$crawler = $client->request('GET', 'https://monitordolarvenezuela.com/');
$getCurrentExchanges = $crawler->filter('div#promedios > div > div > div > div')->each(function ($node, $i) {
    $prepareObj = (object) array(
        'id' => $i,
        'bank' => $node->filter('.title-prome')->text(),
        'current_price' => explode(' ', $node->filter('p')->text())[2],
        'updated' => $node->filter('small')->last()->text()
    );
    return $prepareObj;
});
unset($getCurrentExchanges[0], $getCurrentExchanges[8], $getCurrentExchanges[9]);
$currentExchanges = json_encode($getCurrentExchanges);
echo $currentExchanges;
```

### INSTALL PHP IN UBUNTU

example php7.4

```
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install -y php7.4
sudo apt-get install -y php7.4-cli php7.4-curl php7.4-json php7.4-common php7.4-mysql php7.4-zip php7.4-gd php7.4-mbstring php7.4-curl php7.4-xml php7.4-bcmath php-pear php7.4-opcache php7.4-imap php7.4-intl php7.4-soap php7.4-ldap php7.4-imagick php-imagick 7.4-xmlrpc libapache2-mod-php7.4

//Enable curl function
phpenmod curl
```
### PATH JOIN IN PHP

```
join(DIRECTORY_SEPARATOR,array(realpath(__DIR__ . '/..'),'/vendor/autoload.php')); 
```

### INSTALL SSH2_CONNECT

```
sudo apt-get install -y php-ssh2 libssh2-1
```
code example
```
<?php
$host = "demo.net";
$user =  "root";
$password = "fixmen";
$port = 5500;
$get_config_file = '/etc/httpd/conf/httpd.conf';

//CREATE CONECCTION
$connection = ssh2_connect($host, $port);
ssh2_auth_password($connection, $user, $password);
//ACTIVE SFTP
$sftp = ssh2_sftp($connection);

//DOWNLOAD HTTPD.CONF OF SERVER
$stream = fopen("ssh2.sftp://".$sftp.$get_config_file, 'r');
$contents = stream_get_contents($stream);
echo $contents;

// EXCUTE COMAND IN THE SERVER
$stream = ssh2_exec($connection, 'pwd; ls;');
stream_set_blocking($stream, true);
$stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
echo stream_get_contents($stream_out);

?>
```

### GET DATA OF USER IP, ADDRESS ETC..

```
$ip = getenv('REMOTE_ADDR');
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

echo $ip;
echo $details;
echo $_SERVER['HTTP_USER_AGENT'];
```

### GET ERROS OF FILE PHP

```
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
var_dump(error_get_last());
```

example
```
<?php
//get errors
error_reporting(E_ALL);
$get_config_file = '/etc/httpd/conf/httpd.conf';
$file = fopen($get_config_file, 'w');
//show error
var_dump(error_get_last());

$addText = "hello";
fwrite(file, $addText);
fclose($createTmpFile);
?>
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

## HTACCESS MVC CONFIG 

FILE 1

```
<IfModule mod_rewrite.c>
  RewriteEngine on
  RewriteRule ^$ /public/ [L]
  RewriteRule (.*) /public/$1 [L]
</IfModule>

## enabled headers

<IfModule mod_headers.c>
  <filesMatch ".(css|jpg|jpeg|png|js|ico|ttf|webp|woff2|webm)$">
  Header set Cache-Control "max-age=604800, public"
  </filesMatch>
</IfModule>

RewriteRule ^sitemap\.xml$ sitemap [L]
RewriteRule ^robots\.txt$ sitemap [L]
```
FILE 2

```
<IfModule mod_rewrite.c>
  Options -Multiviews
  RewriteEngine On
  RewriteBase /public
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteRule  ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>

<Files *.js>
    ForceType application/x-httpd-php
    Header set Content-Type "application/javascript"
</Files>
<Files *.css>
    ForceType application/x-httpd-php
    Header set Content-Type "text/css"
</Files>
<Files *.json>
    ForceType application/x-httpd-php
    Header set Content-Type "application/json"
</Files>

```

### INTERESTING

convert array to UpperCase First Letter

```
array_map('ucfirst', $array);
```

### SANITIZATE DATA


```

function sanatize($data_value){
    $sanitize_entities = htmlentities($data_value,ENT_QUOTES | ENT_IGNORE | ENT_COMPAT, 'UTF-8');
    $sanitize_special_entities = htmlspecialchars($sanitize_entities,ENT_QUOTES | ENT_IGNORE, 'UTF-8');
    $sanitize_others_chars = preg_replace('/\(|\)|\;/','',$sanitize_special_entities);
    return filter_var($sanitize_others_chars, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_HIGH);
}

```

### ENCRYPT AND DECRYPT DATA

```
function encryptData($data_encrypt,$method_encrypt,$key_encrypt){
    return  openssl_encrypt($data_encrypt,$method_encrypt,$key_encrypt);
}

function decryptData($data_encrypt,$method_encrypt,$key_encrypt){
    return  openssl_decrypt($data_encrypt,$method_encrypt,$key_encrypt);
}

//EXAMPLE
$encrypt_method = "AES-256-OFB";
$secret_key = 'LOLA-1N-ZS';
$secret_iv = 'LOL4-1N-ZS';
$key = hash('sha256', $secret_key);
$iv = substr(hash('sha256', $secret_iv), 0, 16);
encryptData("demo",$encrypt_method, $key, 0, $iv);
```

### GERATOR PASSWORD

```
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

## LARAVEL

### Migration

create table for database

```
php artisan make:migration vehicules --create=vehicules
```



