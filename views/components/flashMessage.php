<?php 
if (isset($_SESSION["error_message"])) {
  echo '<div class="row row-input"><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>' . $_SESSION["error_message"] . '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>';
  unset($_SESSION["error_message"]);
} 

if (isset($_SESSION["success_message"])) {
  echo '<div class="row row-input"><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>' . $_SESSION["success_message"] . '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>';
  unset($_SESSION["success_message"]);
}
?>
