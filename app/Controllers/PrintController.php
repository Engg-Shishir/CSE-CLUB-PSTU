<?php


namespace App\Controllers;

use App\model\User;

include_once('app/TCPDF/tcpdf.php');
class PrintController
{



  private bool $errorCheck = false;
  public function profile($id)
  {
    $user = new User();
    
    if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {

      $sql = "SELECT users.username,ud.*,cun.name AS cunnname,col.name AS colnname,col.website,fac.name AS facname FROM users 
      INNER JOIN user_details AS ud ON ud.user_id=users.user_id 
      INNER JOIN countrys AS cun ON cun.country_code=ud.country_code
      INNER JOIN colleges AS col ON col.college_code=ud.college
      INNER JOIN facultys AS  fac ON fac.fac_code=ud.department
      WHERE users.user_id=?";
      $stmt = $user->execute($sql,[$id]);
      $data = $stmt->fetchAll();


      
      $PSNO = strtoupper(substr(sha1(microtime()), rand(0, 5), 10));

      $sqls = "INSERT INTO printtable (`print_code`,`user_id`) VALUES (:print_code,:user_id)";
      $array=[
        "print_code" => $PSNO,
        "user_id" =>$id];
        
      $run = $user->insert($sqls, $array); // $run = 1 or 0
      if ($run) {
      } else {
      }
  


      $pdf = new \TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetDefaultMonospacedFont('helvetica');
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
      $pdf->setPrintHeader(FALSE);
      $pdf->setPrintFooter(FALSE);
      $pdf->SetAutoPageBreak(TRUE, 10);
      $pdf->SetFont('helvetica', '', 12);
      $pdf->AddPage(); //default A4
      $pdf->setJPEGQuality(75);
      $pdf->Image(assets("image/logo.jpg"), 70, 7, 70, 20, 'JPG', $data[0]["facebook"], '', true, 150, '', false, false, false, false, false, false);
      $pdf->Image(assets("image/Icon/facebook.jpg"), 95, 180, 5, 5, 'JPG', $data[0]["facebook"], '', true, 150, '', false, false, false, false, false, false);
      $pdf->Image(assets("image/Icon/linkedin.jpg"), 105, 180, 5, 5, 'JPG', $data[0]["linkedin"], '', true, 150, '', false, false, false, false, false, false);
      $pdf->Image(assets("image/Icon/github.jpg"), 115, 180, 5, 5, 'JPG', $data[0]["github"], '', true, 150, '', false, false, false, false, false, false);
  
  
  
      $content = '';
  
      $content .= '
      <style type="text/css">
      body{
      font-size:12px;
      line-height:24px;
      font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
      color:#000;
      margin-top: 40px;
      }
      </style>    
      <table cellpadding="0" cellspacing="0" style="margin-top: 40px;" >
      <tr><td colspan="2" align="center"></td></tr>
      <tr><td colspan="2" align="center"></td></tr>
      <tr><td colspan="2" align="center"></td></tr>
      <tr><td colspan="2" align="center"></td></tr>
      <tr><td colspan="2" align="center"><b>PAtuakhali Science & Technology University</b></td></tr>
      <tr><td colspan="2" align="center">Dumki Patuakhali-8602, Bangladesh</td></tr>
      <tr><td colspan="2" align="center"></td></tr>
      <tr><td colspan="2" align="center"></td></tr>
      <tr><td colspan="2" align="left"><b>Name :</b>'.$data[0]["name"].'</td></tr>
      <tr><td colspan="2" align="left"><b>Dept : </b> '.$data[0]["facname"].'</td></tr>
      <tr><td colspan="2" align="left"><b>Email : </b> '.$data[0]["username"].'</td></tr>
      <tr><td align="left"><b>Birth: </b> '.date($data[0]["birth"]).'</td><td align="right">'.date("d-M-Y").'</td></tr>
      <tr><td align="left"><b>Nid: </b>'.$data[0]["nid"].'</td><td align="right" style="text-laign:left;"><b>SID : </b> '.$PSNO.'</td></tr>
      <tr><td align="left"><b>Blood : </b>'.$data[0]["blood"].'</td></tr>
      <tr><td align="left"><b>SID : </b>'.$data[0]["sid"].'</td></tr>
      <tr><td colspan="2" align="center"></td></tr>
      <tr><td colspan="2" align="center"></td></tr>
      <tr><td colspan="2" align="left"><h4>About : </h4></td></tr>
      <tr><td colspan="2" align="left">'.$data[0]["bio"].'</td></tr>
  
      </table>';
      $pdf->writeHTML($content);
  
      $file_name = $data[0]["name"].".pdf";
      ob_end_clean();
      $pdf->Output($file_name, 'D');
      $_SESSION["message"] = "Collect Invoice";

      

    }


  }
}