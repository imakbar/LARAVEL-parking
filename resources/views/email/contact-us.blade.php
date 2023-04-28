<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">

<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Alerts e.g. approaching your limit</title>

    <style type="text/css">
        img {
            max-width: 100%;
        }
        
        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
            height: 100%;
            line-height: 1.6em;
        }
        
        body {
            background-color: #f6f6f6;
        }
        
        @media only screen and (max-width: 640px) {
            body {
                padding: 0 !important;
            }
            h1 {
                font-weight: 800 !important;
                margin: 20px 0 5px !important;
            }
            h2 {
                font-weight: 800 !important;
                margin: 20px 0 5px !important;
            }
            h3 {
                font-weight: 800 !important;
                margin: 20px 0 5px !important;
            }
            h4 {
                font-weight: 800 !important;
                margin: 20px 0 5px !important;
            }
            h1 {
                font-size: 22px !important;
            }
            h2 {
                font-size: 18px !important;
            }
            h3 {
                font-size: 16px !important;
            }
            .container {
                padding: 0 !important;
                width: 100% !important;
            }
            .content {
                padding: 0 !important;
            }
            .content-wrap {
                padding: 10px !important;
            }
            .invoice {
                width: 100% !important;
            }
        }
    </style>
</head>

<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">

  <div style="text-align: center; padding: 40px 0 10px 0;">
    <!-- Begin: LOGO -->
    <a class="navbar-brand logo text-pink" href="{{url('/')}}">
        <img class="full-width max-width-140 m-right-10" alt="Parking" src="{{url('/')}}/uploads/settings/{{$ASPLogoDark}}">
    </a>
    <!-- End: LOGO -->
  </div>

    <table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
            <td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                <div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff">
                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="alert alert-warning" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #ef0880; margin: 0; padding: 20px;" align="center" bgcolor="#ef0880" valign="top">
                                Contact Us
                            </td>
                        </tr>
                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                                <table width="100%" cellspacing="0" cellpadding="10">
                                  <tr style="background: #fafafa;">
                                    <th style="text-align: left;">Name:</th>
                                    <td>{{$ContactUs->name}}</td>
                                  </tr>
                                  <tr>
                                    <th style="text-align: left;">Email:</th>
                                    <td>{{$ContactUs->email}}</td>
                                  </tr>
                                  <tr style="background: #fafafa;">
                                    <th style="text-align: left;">Subject:</th>
                                    <td>{{$ContactUs->subject}}</td>
                                  </tr>
                                  <tr>
                                    <th style="text-align: left;">Message:</th>
                                    <td>{{$ContactUs->message}}</td>
                                  </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
        </tr>
    </table>
    <!-- WRAPPER -->
    <!-- Set wrapper width (twice) -->
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="600" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit; padding-bottom: 30px;
  max-width: 600px;" class="wrapper">
        <!-- <tr>
            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;" class="social-icons">
                <table width="256" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse: collapse; border-spacing: 0; padding: 0;">
                    <tr>
                        <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                            <a target="_blank" href="https://raw.githubusercontent.com/konsav/email-templates/" style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
          color: #000000;" alt="F" title="Facebook" width="44" height="44" src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/facebook.png"></a>
                        </td>
                        <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                            <a target="_blank" href="https://raw.githubusercontent.com/konsav/email-templates/" style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
          color: #000000;" alt="T" title="Twitter" width="44" height="44" src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/twitter.png"></a>
                        </td>
                        <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                            <a target="_blank" href="https://raw.githubusercontent.com/konsav/email-templates/" style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
          color: #000000;" alt="G" title="Google Plus" width="44" height="44" src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/googleplus.png"></a>
                        </td>
                        <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;">
                            <a target="_blank" href="https://raw.githubusercontent.com/konsav/email-templates/" style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
          color: #000000;" alt="I" title="Instagram" width="44" height="44" src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/instagram.png"></a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr> -->
        <tr>
            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
      padding-top: 20px;
      padding-bottom: 20px;
      color: #999999;
      font-family: sans-serif;" class="footer">
      <a href="{{url('/')}}" target="_blank" style="text-decoration: underline; color: #999999; font-family: sans-serif; font-size: 13px; font-weight: 400; line-height: 150%;">{{$ASPTitle}}</a>

            </td>
        </tr>

        <!-- End of WRAPPER -->
    </table>
</body>

</html>