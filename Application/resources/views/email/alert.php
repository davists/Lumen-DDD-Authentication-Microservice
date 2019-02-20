<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>System - Email template</title>
</head>
<body style="font-size: 0;">
<center>
    <table style="margin: 0; padding:0; width: 600px;" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <a href="http://petdrive.com.br" target="_blank">
                    <img src="<?php echo url('/email/header.jpg'); ?>" border="0" alt="Petdrive" width="600"/>
                </a>
            </td>
        </tr>
    </table>
    <table style="background-color: #eceff5; margin: 0; padding:0; padding-top: 76px; width: 600px;" cellpadding="0" cellspacing="0">
        <tr>
            <td style="color: #004b85; font-style: italic; font-family: Arial, Helvetica, sans-serif; font-size: 40px; font-weight: 700; text-align: center;">
                Tentativa de cadastro para uma empresa fora do ramo de Pets.
            </td>
        </tr>
    </table>
    <table style="background-color: #eceff5; margin: 0; padding:0; padding-top: 67px; width: 600px;" cellpadding="0" cellspacing="0">
        <tr>
            <td></td>
            <td style="width: 340px; padding: 18px 0; color: #004b85; font-size: 16px; font-weight: 700; font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: #fff;">
                QUANDO: <?php echo $date; ?>
            </td>
            <td></td>
        </tr>
    </table>
    <table style="background-color: #eceff5; margin: 0; padding:0; padding-top: 67px; width: 600px;" cellpadding="0" cellspacing="0">
        <tr>
            <td></td>
            <td style="width: 340px; padding: 18px 0; color: #004b85; font-size: 16px; font-weight: 700; font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: #fff;">
                CNPJ: <?php echo $cnpj; ?>
                CNAE: <?php echo $activity; ?>
            </td>
            <td></td>
        </tr>
    </table>
    <table style="background-color: #eceff5; margin: 0; padding:0; padding-top: 67px; width: 600px;" cellpadding="0" cellspacing="0">
        <tr>
            <td></td>
            <td style="width: 340px; padding: 18px 0; color: #004b85; font-size: 16px; font-weight: 700; font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: #fff;">
                RESUMO: <?php echo $resume; ?>
            </td>
            <td></td>
        </tr>
    </table>

    <table style="background-color: #eceff5; margin: 0; padding:0; padding-top: 67px; width: 600px;" cellpadding="0" cellspacing="0">
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <table style="background-color: #fff; margin: 0; padding:0; padding-bottom: 84px; padding-top: 40px; width: 600px;" cellpadding="0" cellspacing="0">
        <tr>
            <td width="242"></td>
            <td style="text-align: center; padding-right: 10px; padding-left: 10px;">
                <a href="//facebook.com" target="_blank"><img src="<?php echo url('/email/facebook.png'); ?>" border="0" alt="Facebook" width="52"></a>
            </td>
            <td style="text-align: center; padding-right: 10px; padding-left: 10px; ">
                <a href="//linkedin.com" target="_blank"><img src="<?php echo url('/email/linkedin.png'); ?>" border="0" alt="linkedin"  width="52"></a>
            </td>
            <td style="text-align: center; padding-right: 10px; padding-left: 10px; ">
                <a href="//instagram.com" target="_blank"><img src="<?php echo url('/email/instagram.png'); ?>" border="0" alt="instagram"  width="52"></a>
            </td>
            <td width="242"></td>
        </tr>
    </table>
</center>
</body>
</html>