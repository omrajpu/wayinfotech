<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        a {
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 600;
            text-decoration: none;
        }
       
        address {
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
        }
       
        td {
            padding: 6px;
        }

    </style>
</head>

<body>
    <table align="center" style="width: 600px; border: 1px solid #ddd; height: auto;  border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr height="" style="background-color: white;">
                <td colspan="6" width="400" style="border-bottom:1px solid #ddd;"><img src="<?php echo base_url(); ?>common/images/rate-image/logo.png" width="130" height="70" alt=""></td>
                <td colspan="3" style="border-bottom:1px solid #ddd;" width="200">
                    <ul style="list-style: none;color: black; padding-top: 20px;">
                        <li><img src="<?php echo base_url(); ?>common/images/rate-image/call_icon.png" width="15" height="15" alt="">&nbsp;&nbsp;<span style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; vertical-align: middle;color:#2f7b01;"><strong>+91-7771-009-009</strong></span></li>
                        <li>
                            <a href="" style="text-decoration: none;color:black;font-size: 12px;"><img src="<?php echo base_url(); ?>common/images/rate-image/icon.png" width="15" height="15" alt="">&nbsp;&nbsp;<span style="vertical-align: middle;"><strong style=" font-family: Arial, Helvetica, sans-serif;">sales@myforexeye.com&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span></a>
                        </li>
                    </ul>
                    <br>
                </td>
            </tr>
            <tr height="30">
                <td colspan="9" width="600" style=" font-family: Arial, Helvetica, sans-serif;">
                    <div class="container">
                        Hi
                        <?php echo $name; ?>
                            <br>
                            <br>
                            <?php echo $parag; ?>
                                <br>
                                <br> Thanks & Regards,
                                <br>
                                <strong>Myforexeye Team</strong>
                    </div>
                </td>
            </tr>
            <tr height="50">
                <td colspan="6" style="border-top:1px solid #ddd;" width="400">
                    <strong style="color: black; font-size: 18px;">www.myforexeye.com</strong>
                    <br>
                    <a style="font-size: 12px;color: black;line-height: 20px;" href="https://www.myforexeye.com/services/ratecheck/">RateCheck</a> |
                    <a style="font-size: 12px;color: black;" href="https://www.myforexeye.com/services/trade-finance/">Trade Finance</a> |
                    <a style="font-size: 12px;color:black;" href="https://www.myforexeye.com/services/rateaudit/">RateAudit</a> |
                    <a style="font-size: 12px;color: black;" href="https://www.myforexeye.com/services/transaction-process-outsourcing/">Transaction procecss Outsourcing</a> |
                    <a style="font-size: 12px;color: black;" href="https://www.myforexeye.com/services/forex-risk-advisory/">Transaction Forex Risk Advisory</a> |
                    <a style="font-size: 12px;color: black;" href="https://www.myforexeye.com/services/money-changing/">Money Changing</a> |
                    <a style="font-size: 12px;color: black;" href="https://www.myforexeye.com/services/corporate-forex-training/">Corporate Forex Training</a> |
                    <a style="font-size: 12px;color: black;" href="https://www.myforexeye.com/services/forex-portfolio-management/">Forex Portfolio Management</a>
                </td>
                <td colspan="3" align="left" width="200" style="border-top:1px solid #ddd;">
                    <p style=" font-family: Arial, Helvetica, sans-serif;color: black;  font-weight: 600; font-size: 14px;">
                        Myforexeye Fintech Pvt. Ltd. Plot 135,Pocket 1,Jasola Vihar,New Delhi - 110025
                    </p>
                </td>
            </tr>
            <tr style="background-color: white;border-top:1px solid #ddd;">
                <td colspan="6" style="color: black; font-size: 11px !important;border-top:1px solid #ddd; font-family: Arial, Helvetica, sans-serif;font-weight: 600;" width="400">
                    <p>Copyright @ <span style="color:#41c5f2;">Myforex</span><span style="color:#2A3575;">eye</span> Fintech private Limited All Rights Reserved</p>
                </td>
                <td width="200" colspan="3" style="border-top:1px solid #ddd;">
                    <ul style="list-style: none;color: white;">
                        <li style="display: inline;margin: 0px 3px 0px;">
                            <a href="<?php echo FBLink; ?>" target="_blank"><img src="<?php echo base_url(); ?>common/images/rate-image/fb.png" width="22" height="22" alt=""></a>
                        </li>
                        <li style="display: inline;margin: 0px 3px 0px;">
                            <a href="<?php echo GPlusLink; ?>" target="_blank"><img src="<?php echo base_url(); ?>common/images/rate-image/g+.png" width="22" height="22" alt=""></a>
                        </li>
                        <li style="display: inline;margin: 0px 3px 0px;">
                            <a href="<?php echo LinLink; ?>" target="_blank"><img src="<?php echo base_url(); ?>common/images/rate-image/li.png" width="22" height="22" alt=""></a>
                        </li>
                        <li style="display: inline;margin: 0px 3px 0px;">
                            <a href="<?php echo YTLink; ?>" target="_blank"><img src="<?php echo base_url(); ?>common/images/rate-image/YouTube-icon.png" width="22" height="22" alt=""></a>
                        </li>
                        <li style="display: inline;margin: 0px 3px 0px;">
                            <a href="<?php echo TweeterLink; ?>
" target="_blank"><img src="<?php echo base_url(); ?>common/images/rate-image/tw.png" width="22" height="22" alt=""></a>
                        </li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>