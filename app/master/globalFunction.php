<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function shishirEnv(string $key): string
{
  return isset($_ENV[$key]) ? $_ENV[$key] : "";
}


function view(string $path, array $data = []): void
{
  /**
   * extract() function get arrt data. Then make each array item into idividual item
   */
  extract($data);
  require_once VIEWS . '/' . $path;
}



function parray($data): void
{
  /**
   * extract() function get arrt data. Then make each array item into idividual item
   */

  echo "<h2 style='color:red;'>Associative array : </h2>";
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}


function assets(string $path): string
{
  return ASSET_URL . '/' . $path;
}


function url(string $path): string
{
  return "/".shishirEnv('BASE_URL'). $path;
}

function redirect(string $path): void
{?>
  <script type="text/javascript">
    window.location.href = <?php echo $path; ?> 
  </script>

<?php
}


function vendor(string $path): string
{
  return VENDOR_URL . '/' . $path;
}


function unsetError(string $name): void
{
  unset($_SESSION[$name]);
}
function inputField(string $type,string $name="",string $value="",string $placehlder="pass your placeholder",string $class=""){
  $error= "".$class;
  if (isset($_SESSION[$name])){
    $value =$_SESSION[$name];
    if(strlen($_SESSION[$name])<=0){
      $error = $error." inputError";
    }
    unsetError($name);
  }  
  return '<input type="'.$type.'" name="'.$name.'" placeholder="'.$placehlder.'" value="'.$value.'" class="'.$error.'" />';
}


function redirects(string $path): string
{
  $url = shishirEnv("APP_URL")."/".shishirEnv('BASE_URL'). $path;
  header("Location: ".$url);
  exit;
}

function isEmpty(string $name, string $value)
{
  if (is_int($value)) {
    $_SESSION[$name] = intval($value);
    if (intval($value) == 0) {
      return true;
    }
  } else {
    $_SESSION[$name] = $value;
    if (strlen($value) <= 0) {
      return true;
    }
  }

  return false;
}


function  token($length){
  $token = 'abcdefghijklmnopqrstuvwxwzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $token = str_shuffle($token);
  $token = substr($token,0,$length);
  return $token;
}


function passMatch($pass,$cpass){
  if ($pass != $cpass) {
    $_SESSION["cpassword"] = $cpass;
    return false;
  }
  return true;
}


function mailVerify(string $sender,string $name, string $token)
{
  $mail = new PHPMailer(true);
  try {
    // $mail->SMTPDebug = 2;									
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com;';
    $mail->SMTPAuth = true;
    $mail->Username = 'shishirbhuiyan83@gmail.com';
    $mail->Password = 'bfvfojkgbiujpnuv';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($sender, $name);
    $mail->addAddress($sender, $name);

    $mail->isHTML(true);
    $mail->Subject = 'Verify Your Account';
    $mail->Body="<h1 align=center>Please Click On The Link Bellow ::</h1><br><br>
    <a align=center href='http://localhost/cseclub/mailverify/$sender/$token'>Verify</a>";
  
    $mail->send();
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

function level(string $text="",string $name=""){
  $color= "color: #757575 !important;";
  if (isset($_SESSION[$name])){
    if(intval($_SESSION[$name])==0){
      $color =" color: red !important;";
    }
  }else{
    $color= "color: #757575 !important;";
  }
  return '<label for="" style="font-size:16px;font-weight: 500 !important;'.$color.'">'.$text.'</label>';
}