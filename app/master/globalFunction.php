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
    if (strlen(trim($value)) <= 0) {
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
    $app = shishirEnv("BASE_URL");								
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com;';
    $mail->SMTPAuth = true;
    $mail->Username = 'shishirbhuiyan83@gmail.com';
    $mail->Password = 'xnurkqtbzprwjkui';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($sender, $name);
    $mail->addAddress($sender, $name);

    $mail->isHTML(true);
    $mail->Subject = 'Verify Your Account';
    $mail->Body="<h1 align=center>Please Click On The Link Bellow ::</h1><br><br>
    <a align=center href='http://localhost/".$app."/mailverify/$sender/$token'>Verify</a>";
  
    $send = $mail->send();
    if($send){
      return true;
    }
    else{
      return false;
    }
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


function selectForm(array $datas=[],string $name="",string $class="",string $placehlder="Your placeholder",string $optionValue="",string $optionText=""){
  
  $data = '<select class="'.$class.'" name="'.$name.'">';
  $data = $data.'<option value="">Select your option</option>';
  foreach ($datas as $key => $value) {
    $data = $data.'<option value="'.$value[0].'"';
    if (isset($_SESSION[$name])){
      if(intval($_SESSION[$name])==intval($value[0])){
        $data = $data.'selected="selected">'.$value[1].'</option>';
      }else{
      $data = $data.'>'.$value[1].'</option>';
      }
    }else{
      $data = $data.'>'.$value[1].'</option>';
    }
  }
  $data = $data.'</select>';
  
  unsetError($name);
  return $data;
}

function textArea(string $name="",string $value="",string $placehlder="Your placeholder",string $class=""){
  $error= "".$class;
  if (isset($_SESSION[$name])){
    $value =$_SESSION[$name];
    if(strlen($_SESSION[$name])<=0){
      $error = $error." inputError";
    }
    unsetError($name);
  }  
  return '<textarea name="'.$name.'" placeholder="'.$placehlder.'"  class="'.$error.'">'.$value.'</textarea>';
}


function fileDetails($file,$fileName){
  $file_name = $file[$fileName]['name'];
  $file_type = $file[$fileName]['type'];
  $file_size = $file[$fileName]['size'];
  $tmp_name = $file[$fileName]['tmp_name'];
  $file_explode = explode('.', $file_name);
  $file_ext = strtolower(end($file_explode));

  return [
    "fname"=>$file_name,
    "ftype"=>$file_type,
    "fsize"=>$file_size,
    "fext"=>$file_ext,
    "source"=>$tmp_name
  ];
}

function isImage($ext){
  $extensions = ["jpeg", "png", "jpg","svg"];
  if (in_array($ext, $extensions) === true) return true;
  return false;
}


function getFileType($ext){
  $FileType = "";
  $iamge = ["jpeg", "png", "jpg","svg","ai","webp","gif"];
  $video = ["mp4", "mkv", "mov"];
  $docs = ["pdf", "tex", "txt","doc","docx"];
  if (in_array($ext,$iamge) === true) $FileType = "Image";
  else if(in_array($ext,$video) === true) $FileType = "Video";
  else if(in_array($ext,$docs) === true) $FileType = "Document";
  return $FileType;
}

function isVideo($ext){
  $extensions = ["mp4", "mkv", "mov"];
  if (in_array($ext, $extensions) === true) return true;
  return false;
}



function fileMb($bytes){
  $MB = number_format($bytes / 1048576, 2);
  return $MB;
}


function unlinkFile($file)
{
  if (is_file($file)){
    unlink($file); // delete file
  }
}

function unlinkPath($path)
{

  if (!is_dir($path)) {
    mkdir($path, 0777, true);
  } else {
    $files = glob($path . "*");
    foreach ($files as $file) { // iterate files
      if (is_file($file)) {
        unlink($file); // delete file
      }
    }
    rmdir($path);
    mkdir($path, 0777, true);
  }

}

function fileStore(string $source, string $destination):void
{
  move_uploaded_file($source,$destination);
}

function slug($data){
 return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data)));
}
function userSlug($data){
  return trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data));
}

function esc($str) 
{ 
 return htmlspecialchars($str ?? ''); 
}

function add_root_to_images($content) 
{ 
 
 preg_match_all("/<img[^>]+/", $content, $matches); 
 
 if(is_array($matches[0]) && count($matches[0]) > 0) 
 { 
  foreach ($matches[0] as $img) { 
 
   preg_match('/src="[^"]+/', $img, $match); 
   $new_img = str_replace('src="', 'src="'.ROOT."/", $img); 
   $content = str_replace($img, $new_img, $content); 
 
  } 
 } 
 return $content; 
}


// if Exist Then Print
function ietp(string $name){
   if(isset($_SESSION[$name])&& $_SESSION[$name]!==""){
    return $_SESSION[$name];
   }else{
    return "";
   }
}


function isBlank(array $data = []):bool
{
  $errorCheck = 0;
  foreach ($data as $key => $value) {
    // Set data into session var
    $_SESSION[$key] = $value;

    if (strlen(trim($value)) <= 0) {
      $errorCheck = 1;
    }
  }

  if($errorCheck==1) return true;
  else return false;
}

function unsetAll(array $data = []): void
{
  foreach ($data as $key => $value) {
    unset($_SESSION[$key]);
  }
}

function interval($date){
  $now = time();

  // Get the future timestamp of your event
  $event = strtotime($date);

  // Calculate the difference in seconds
  $difference = $event - $now;
  $days = floor($difference / (60 * 60 * 24));
  $hours = floor(($difference % (60 * 60 * 24)) / (60 * 60));
  $minutes = floor(($difference % (60 * 60)) / 60);
  $seconds = floor($difference % 60);
  $date=[$days,$hours,$minutes,$seconds];
  // Check if the event has not passed
  if ($difference > 0) {
      // Format the difference into days, hours, minutes, and seconds


      // Display the countdown timer
      $date=[$days,$hours,$minutes,$seconds];
  
      return $date;

  } else {
      // Display a message if the event has passed
      return $date;
  }
}
