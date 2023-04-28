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

    <div style="text-align: center; padding: 40px 0 20px;">
     <img src="{{url('/')}}/uploads/settings/{{$ASPLogoDark}}">   
    </div>

    <table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
            <td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                <div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff">
                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="alert alert-warning" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #ef0880; margin: 0; padding: 20px;" align="center" bgcolor="#ef0880" valign="top">
                                Your Booking Order Placed
                            </td>
                        </tr>
                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                                <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                            Hi, <strong style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">{{$Order->first_name}} {{$Order->last_name}}</strong> We have received your booking order, we'll contact your soon.
                                        </td>
                                    </tr>
                                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0;" valign="top">
                                            <table width="100%" cellspacing="0" cellpadding="10">
                                              <tr style="background: #ef0880;">
                                                <th style="text-align: center; color:#fff;" colspan="2">Booking Details</th>
                                              </tr>
                                              <tr>
                                                <th style="text-align: left;">Reference No:</th>
                                                <td>
                                                  {{$Order->reference_no}}
                                                </td>
                                              </tr>
                                              <tr style="background: #fafafa;">
                                                <th width="160" style="text-align: left;">Location:</th>
                                                <td>{{$Order->Airport->name}}</td>
                                              </tr>
                                              <tr>
                                                <th style="text-align: left;">Drop-Off Date Time:</th>
                                                <td>
                                                    {{$Order->drop_off_date}} 
                                                    at 
                                                    {{$Order->drop_off_hour}}:{{$Order->drop_off_minute}}
                                                </td>
                                              </tr>
                                              <tr style="background: #fafafa;">
                                                <th style="text-align: left;">Pick-Up Date Time:</th>
                                                <td>
                                                    {{$Order->arrival_date}} 
                                                    at 
                                                    {{$Order->arrival_hour}}:{{$Order->arrival_minute}}
                                                </td>
                                              </tr>
                                              <tr>
                                                <th style="text-align: left;">Days:</th>
                                                <td>{{$Order->days}}</td>
                                              </tr>
                                              <tr style="background: #fafafa;">
                                                <th style="text-align: left;">Booking Quote:</th>
                                                <td style="font-size: 18px;">${{$Order->amount}}</td>
                                              </tr>
                                              <tr>
                                                <th style="text-align: left;">Promo Code:</th>
                                                <td>None</td>
                                              </tr>
                                            </table>
                                            <table width="100%" cellspacing="0" cellpadding="10">
                                              <tr style="background: #ef0880;">
                                                <th style="text-align: center; color:#fff;" colspan="2">User Information</th>
                                              </tr>
                                              <tr style="background: #fafafa;">
                                                <th width="160" style="text-align: left;">Email:</th>
                                                <td>{{$Order->email}}</td>
                                              </tr>
                                              <tr>
                                                <th style="text-align: left;">Title:</th>
                                                <td>{{$Order->Title->title}}</td>
                                              </tr>
                                              <tr style="background: #fafafa;">
                                                <th style="text-align: left;">First Name:</th>
                                                <td>{{$Order->first_name}}</td>
                                              </tr>
                                              <tr>
                                                <th style="text-align: left;">Last Name:</th>
                                                <td>{{$Order->last_name}}</td>
                                              </tr>
                                              <tr style="background: #fafafa;">
                                                <th style="text-align: left;">Mobile Number:</th>
                                                <td>{{$Order->mobile_number}}</td>
                                              </tr>
                                              <tr>
                                                <th style="text-align: left;">Post Code:</th>
                                                <td>{{$Order->post_code}}</td>
                                              </tr>
                                            </table>
                                            <table width="100%" cellspacing="0" cellpadding="10">
                                              <tr style="background: #ef0880;">
                                                <th style="text-align: center; color:#fff;" colspan="2">Travel Details</th>
                                              </tr>
                                              <tr>
                                                <th width="160" style="text-align: left;">Know travel detail?</th>
                                                <td>{{$Order->know_travel_detail == 0? 'No':'Yes'}}</td>
                                              </tr>
                                              @if($Order->know_travel_detail == 1)
                                              <tr style="background: #fafafa;">
                                                <th style="text-align: left;">Depart Terminal:</th>
                                                <td>{{$Order->DepartTerminal->title}}</td>
                                              </tr>
                                              <tr>
                                                <th style="text-align: left;">Outbound Flight:</th>
                                                <td>{{$Order->outbound_flight}}</td>
                                              </tr>
                                              <tr style="background: #fafafa;">
                                                <th style="text-align: left;">Arrival Terminal:</th>
                                                <td>{{$Order->ArrivalTerminal->title}}</td>
                                              </tr>
                                              <tr>
                                                <th style="text-align: left;">Inbound Flight:</th>
                                                <td>{{$Order->inbound_flight}}</td>
                                              </tr>
                                              @endif
                                            </table>
                                            <table width="100%" cellspacing="0" cellpadding="10">
                                              <tr style="background: #ef0880;">
                                                <th style="text-align: center; color:#fff;" colspan="2">Vehicle Details</th>
                                              </tr>
                                              <tr>
                                                <th width="160" style="text-align: left;">Know Vehicle Details?</th>
                                                <td>{{$Order->know_vehical_detail == 0? 'No':'Yes'}}</td>
                                              </tr>
                                              @if($Order->know_vehical_detail == 1)
                                              <tr style="background: #fafafa;">
                                                <th style="text-align: left;">Make:</th>
                                                <td>{{$Order->make}}</td>
                                              </tr>
                                              <tr>
                                                <th style="text-align: left;">Model:</th>
                                                <td>{{$Order->model}}</td>
                                              </tr>
                                              <tr style="background: #fafafa;">
                                                <th style="text-align: left;">Colour:</th>
                                                <td>{{$Order->colour}}</td>
                                              </tr>
                                              <tr>
                                                <th style="text-align: left;">Registration:</th>
                                                <td>{{$Order->registration}}</td>
                                              </tr>
                                              @endif
                                            </table>
                                        </td>
                                    </tr>
                                    <!-- <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                            <a href="http://www.mailgun.com" class="btn-primary" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #ef0880; margin: 0; border-color: #ef0880; border-style: solid; border-width: 10px 20px;">Upgrade my account</a>
                                        </td>
                                    </tr> -->
                                    <!-- <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                            <p style="margin-top: 20px;">Thanks for choosing Acme Inc.</p>
                                        </td>
                                    </tr> -->
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
    </table>
</body>

</html>