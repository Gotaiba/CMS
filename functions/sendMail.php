<?php

function SendingEmail($to,$Usr,$Pass,$Name)
{
    $subject="New User Crediential";
    $headers="From: ECPP New User Details <info@ECPP-ph.com>\r\n";
    $headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
    $msg='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>ECPP Email</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
    <body style="margin: 0; padding: 0;">
 <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="font-family: sans-serif; font-size: 14px;">
 <tr>
<td align="center" style="padding: 20px 0 10px 0;">
 <img src="img/logo.png" alt="Ecpp Email Logo" width="80" height="100" style="display: block;" />
</td>
 </tr>
 <tr>
  <td bgcolor="#fcfcfc" style="padding: 20px 15px 30px 15px;">
     <table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tr>
       <td>
        Hi '.$Name.'
       </td>
      </tr>
      <tr>
       <td style="padding: 20px 0 10px 0;">
        We want to welcome you to the administration panel of ECPP Center. Here you will be able to modifiy the website content which you will be granted access using the following crediential:
       </td>
      </tr>        
      <tr>
       <td style="padding: 0px 0px 10px 40px;">
           username:'.$Usr.'<br>
	       password: '.$Pass.'
       </td>
      </tr>
         <tr>
             <td>
                Please save this email for you reference and login to the administration panel using this link: http://ecpp-ph.com/admin
             </td>
         </tr>
     </table>
</td>
 </tr>
 <tr>
  <td bgcolor="#c6a979" style="padding: 10px 20px 14px 20px;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#e6e6e6">
     <tr>
      <td width="75%">
          &reg; copyright, ECPP 2017<br/>
          This email is Powered by Quick Picker 
         </td>
    <td align="right">
         <table border="0" cellpadding="0" cellspacing="0">
          <tr>
           <td>
            <a href="https://twitter.com/@ECPP3" target="_blank">
             <img src="img/tw.png" alt="Twitter" width="28" height="28" style="display: block;" border="0" />
            </a>
           </td>
           <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
           <td>
            <a href=" https://web.facebook.com/ECPPuptodatepharmacist/" target="_blank">
             <img src="img/fb.png" alt="Facebook" width="28" height="28" style="display: block;" border="0" />
            </a>
           </td>
          </tr>
         </table>
    </td>
     </tr>
    </table>
  </td>
 </tr>
 </table>
</body>
</html>';
    mail($to,$subject,$msg,$headers);
}

?>