<?php
if (isset($_SESSION["error_message"])) {
 ?>
  <div
    style="padding:10px;background-color:#6c002b;color:#fff;width:100%;margin-bottom:10px;display:flex;align-items:center;justify-content:space-between;font-size:17px">
    <strong><?= $_SESSION["error_message"]; ?></strong>
    <span
      style="margin-left:15px;color:#fff;font-weight:700;float:right;font-size:22px;line-height:20px;cursor:pointer;transition:.3s"
      onclick="this.parentElement.style.display='none';" onMouseOver="this.style.color='black'"
      onMouseOut="this.style.color='white'">&times;</span>
  </div>

<?php
  unset($_SESSION["error_message"]);
}

if (isset($_SESSION["success_message"])) {
?>
<div
  style="padding:10px;background-color:#418040;color:#fff;width:100%;margin-bottom:10px;display:flex;align-items:center;justify-content:space-between;font-size:17px">
  <strong><?= $_SESSION["success_message"]; ?></strong>
  <span
    style="margin-left:15px;color:#fff;font-weight:700;float:right;font-size:22px;line-height:20px;cursor:pointer;transition:.3s"
    onclick="this.parentElement.style.display='none';" onMouseOver="this.style.color='black'"
    onMouseOut="this.style.color='white'">&times;</span>
</div>

<?php
 unset($_SESSION["success_message"]);
}
?>




