<?php
include('classes/DB.php');
include('classes/Mail.php');

if (isset($_POST['createaccount'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {

                if (strlen($username) >= 3 && strlen($username) <= 32) {

                        if (preg_match('/[a-zA-Z0-9_]+/', $username)) {

                                if (strlen($password) >= 6 && strlen($password) <= 60) {

                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {

                                        DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email, \'0\', \'\')', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));
                                        Mail::sendMail('Welcome to Viksagram!', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
                                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                                <title></title>
                                                <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
                                                <meta name="viewport" content="width=device-width" /><style type="text/css">
                                            @media only screen and (min-width: 620px){.wrapper{min-width:600px !important}.wrapper h1{}.wrapper h1{font-size:56px !important;line-height:60px !important}.wrapper h2{}.wrapper h2{font-size:32px !important;line-height:40px !important}.wrapper h3{}.column{}.wrapper .size-8{font-size:8px !important;line-height:14px !important}.wrapper .size-9{font-size:9px !important;line-height:16px !important}.wrapper .size-10{font-size:10px !important;line-height:18px !important}.wrapper .size-11{font-size:11px !important;line-height:19px !important}.wrapper .size-12{font-size:12px !important;line-height:19px !important}.wrapper .size-13{font-size:13px !important;line-height:21px !important}.wrapper .size-14{font-size:14px !important;line-height:21px !important}.wrapper .size-15{font-size:15px !important;line-height:23px !important}.wrapper .size-16{font-size:16px !important;line-height:24px 
                                            !important}.wrapper .size-17{font-size:17px !important;line-height:26px !important}.wrapper .size-18{font-size:18px !important;line-height:26px !important}.wrapper .size-20{font-size:20px !important;line-height:28px !important}.wrapper .size-22{font-size:22px !important;line-height:31px !important}.wrapper .size-24{font-size:24px !important;line-height:32px !important}.wrapper .size-26{font-size:26px !important;line-height:34px !important}.wrapper .size-28{font-size:28px !important;line-height:36px !important}.wrapper .size-30{font-size:30px !important;line-height:38px !important}.wrapper .size-32{font-size:32px !important;line-height:40px !important}.wrapper .size-34{font-size:34px !important;line-height:43px !important}.wrapper .size-36{font-size:36px !important;line-height:43px !important}.wrapper .size-40{font-size:40px !important;line-height:47px !important}.wrapper 
                                            .size-44{font-size:44px !important;line-height:50px !important}.wrapper .size-48{font-size:48px !important;line-height:54px !important}.wrapper .size-56{font-size:56px !important;line-height:60px !important}.wrapper .size-64{font-size:64px !important;line-height:63px !important}}
                                            </style>
                                                <meta name="x-apple-disable-message-reformatting" />
                                                <style type="text/css">
                                            .main, .mso {
                                              margin: 0;
                                              padding: 0;
                                            }
                                            table {
                                              border-collapse: collapse;
                                              table-layout: fixed;
                                            }
                                            * {
                                              line-height: inherit;
                                            }
                                            [x-apple-data-detectors] {
                                              color: inherit !important;
                                              text-decoration: none !important;
                                            }
                                            .wrapper .footer__share-button a:hover,
                                            .wrapper .footer__share-button a:focus {
                                              color: #ffffff !important;
                                            }
                                            .wrapper .footer__share-button a.icon-white:hover,
                                            .wrapper .footer__share-button a.icon-white:focus {
                                              color: #ffffff !important;
                                            }
                                            .wrapper .footer__share-button a.icon-black:hover,
                                            .wrapper .footer__share-button a.icon-black:focus {
                                              color: #000000 !important;
                                            }
                                            .btn a:hover,
                                            .btn a:focus,
                                            .footer__share-button a:hover,
                                            .footer__share-button a:focus,
                                            .email-footer__links a:hover,
                                            .email-footer__links a:focus {
                                              opacity: 0.8;
                                            }
                                            .preheader,
                                            .header,
                                            .layout,
                                            .column {
                                              transition: width 0.25s ease-in-out, max-width 0.25s ease-in-out;
                                            }
                                            .preheader td {
                                              padding-bottom: 8px;
                                            }
                                            .layout,
                                            div.header {
                                              max-width: 400px !important;
                                              -fallback-width: 95% !important;
                                              width: calc(100% - 20px) !important;
                                            }
                                            div.preheader {
                                              max-width: 360px !important;
                                              -fallback-width: 90% !important;
                                              width: calc(100% - 60px) !important;
                                            }
                                            .snippet,
                                            .webversion {
                                              Float: none !important;
                                            }
                                            .stack .column {
                                              max-width: 400px !important;
                                              width: 100% !important;
                                            }
                                            .fixed-width.has-border {
                                              max-width: 402px !important;
                                            }
                                            .fixed-width.has-border .layout__inner {
                                              box-sizing: border-box;
                                            }
                                            .snippet,
                                            .webversion {
                                              width: 50% !important;
                                            }
                                            .ie .btn {
                                              width: 100%;
                                            }
                                            .ie .stack .column,
                                            .ie .stack .gutter {
                                              display: table-cell;
                                              float: none !important;
                                            }
                                            .ie div.preheader,
                                            .ie .email-footer {
                                              max-width: 560px !important;
                                              width: 560px !important;
                                            }
                                            .ie .snippet,
                                            .ie .webversion {
                                              width: 280px !important;
                                            }
                                            .ie div.header,
                                            .ie .layout {
                                              max-width: 600px !important;
                                              width: 600px !important;
                                            }
                                            .ie .two-col .column {
                                              max-width: 300px !important;
                                              width: 300px !important;
                                            }
                                            .ie .three-col .column,
                                            .ie .narrow {
                                              max-width: 200px !important;
                                              width: 200px !important;
                                            }
                                            .ie .wide {
                                              width: 400px !important;
                                            }
                                            .ie .stack.fixed-width.has-border,
                                            .ie .stack.has-gutter.has-border {
                                              max-width: 602px !important;
                                              width: 602px !important;
                                            }
                                            .ie .stack.two-col.has-gutter .column {
                                              max-width: 290px !important;
                                              width: 290px !important;
                                            }
                                            .ie .stack.three-col.has-gutter .column,
                                            .ie .stack.has-gutter .narrow {
                                              max-width: 188px !important;
                                              width: 188px !important;
                                            }
                                            .ie .stack.has-gutter .wide {
                                              max-width: 394px !important;
                                              width: 394px !important;
                                            }
                                            .ie .stack.two-col.has-gutter.has-border .column {
                                              max-width: 292px !important;
                                              width: 292px !important;
                                            }
                                            .ie .stack.three-col.has-gutter.has-border .column,
                                            .ie .stack.has-gutter.has-border .narrow {
                                              max-width: 190px !important;
                                              width: 190px !important;
                                            }
                                            .ie .stack.has-gutter.has-border .wide {
                                              max-width: 396px !important;
                                              width: 396px !important;
                                            }
                                            .ie .fixed-width .layout__inner {
                                              border-left: 0 none white !important;
                                              border-right: 0 none white !important;
                                            }
                                            .ie .layout__edges {
                                              display: none;
                                            }
                                            .mso .layout__edges {
                                              font-size: 0;
                                            }
                                            .layout-fixed-width,
                                            .mso .layout-full-width {
                                              background-color: #ffffff;
                                            }
                                            @media only screen and (min-width: 620px) {
                                              .column,
                                              .gutter {
                                                display: table-cell;
                                                Float: none !important;
                                                vertical-align: top;
                                              }
                                              div.preheader,
                                              .email-footer {
                                                max-width: 560px !important;
                                                width: 560px !important;
                                              }
                                              .snippet,
                                              .webversion {
                                                width: 280px !important;
                                              }
                                              div.header,
                                              .layout,
                                              .one-col .column {
                                                max-width: 600px !important;
                                                width: 600px !important;
                                              }
                                              .fixed-width.has-border,
                                              .fixed-width.x_has-border,
                                              .has-gutter.has-border,
                                              .has-gutter.x_has-border {
                                                max-width: 602px !important;
                                                width: 602px !important;
                                              }
                                              .two-col .column {
                                                max-width: 300px !important;
                                                width: 300px !important;
                                              }
                                              .three-col .column,
                                              .column.narrow,
                                              .column.x_narrow {
                                                max-width: 200px !important;
                                                width: 200px !important;
                                              }
                                              .column.wide,
                                              .column.x_wide {
                                                width: 400px !important;
                                              }
                                              .two-col.has-gutter .column,
                                              .two-col.x_has-gutter .column {
                                                max-width: 290px !important;
                                                width: 290px !important;
                                              }
                                              .three-col.has-gutter .column,
                                              .three-col.x_has-gutter .column,
                                              .has-gutter .narrow {
                                                max-width: 188px !important;
                                                width: 188px !important;
                                              }
                                              .has-gutter .wide {
                                                max-width: 394px !important;
                                                width: 394px !important;
                                              }
                                              .two-col.has-gutter.has-border .column,
                                              .two-col.x_has-gutter.x_has-border .column {
                                                max-width: 292px !important;
                                                width: 292px !important;
                                              }
                                              .three-col.has-gutter.has-border .column,
                                              .three-col.x_has-gutter.x_has-border .column,
                                              .has-gutter.has-border .narrow,
                                              .has-gutter.x_has-border .narrow {
                                                max-width: 190px !important;
                                                width: 190px !important;
                                              }
                                              .has-gutter.has-border .wide,
                                              .has-gutter.x_has-border .wide {
                                                max-width: 396px !important;
                                                width: 396px !important;
                                              }
                                            }
                                            @supports (display: flex) {
                                              @media only screen and (min-width: 620px) {
                                                .fixed-width.has-border .layout__inner {
                                                  display: flex !important;
                                                }
                                              }
                                            }
                                            @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
                                              .fblike {
                                                background-image: url(https://i7.createsend1.com/static/eb/master/13-the-blueprint-3/images/fblike@2x.png) !important;
                                              }
                                              .tweet {
                                                background-image: url(https://i8.createsend1.com/static/eb/master/13-the-blueprint-3/images/tweet@2x.png) !important;
                                              }
                                              .linkedinshare {
                                                background-image: url(https://i9.createsend1.com/static/eb/master/13-the-blueprint-3/images/lishare@2x.png) !important;
                                              }
                                              .forwardtoafriend {
                                                background-image: url(https://i10.createsend1.com/static/eb/master/13-the-blueprint-3/images/forward@2x.png) !important;
                                              }
                                            }
                                            @media (max-width: 321px) {
                                              .fixed-width.has-border .layout__inner {
                                                border-width: 1px 0 !important;
                                              }
                                              .layout,
                                              .stack .column {
                                                min-width: 320px !important;
                                                width: 320px !important;
                                              }
                                              .border {
                                                display: none;
                                              }
                                              .has-gutter .border {
                                                display: table-cell;
                                              }
                                            }
                                            @media(max-width: 619px) {
                                              .email-flexible-footer .left-aligned-footer .column,
                                              .email-flexible-footer .center-aligned-footer,
                                              .email-flexible-footer .right-aligned-footer .column {
                                                /*Overriding inline styles for mobile compatibility*/
                                                text-align: center !important;
                                                max-width: calc(100% - 40px) !important;
                                                width: calc(100% - 40px) !important;
                                                margin-left: 20px;
                                                margin-right: 20px;
                                              }
                                              .email-flexible-footer .footer__share-button {
                                                max-width: 280px;
                                                margin: 0 auto;
                                              }
                                              .email-flexible-footer .left-aligned-footer .flexible-footer__share-button__container,
                                              .email-flexible-footer .center-aligned-footer .flexible-footer__share-button__container,
                                              .email-flexible-footer .right-aligned-footer .flexible-footer__share-button__container {
                                                display: inline-block;
                                                /*Overriding inline styles for mobile compatibility*/
                                                margin-left: 5px !important;
                                                margin-right: 5px !important;
                                              }
                                              .email-flexible-footer__additionalinfo--center {
                                                /*Overriding inline styles for mobile compatibility*/
                                                text-align: center !important;
                                              }
                                              .email-flexible-footer .left-aligned-footer table,
                                              .email-flexible-footer .center-aligned-footer table,
                                              .email-flexible-footer .right-aligned-footer table {
                                                /*Overriding inline styles for mobile compatibility*/
                                                width: 100% !important;
                                                display: table !important;
                                              }
                                            }
                                            .mso div {
                                              border: 0 none white !important;
                                            }
                                            .mso .w560 .divider {
                                              Margin-left: 260px !important;
                                              Margin-right: 260px !important;
                                            }
                                            .mso .w360 .divider {
                                              Margin-left: 160px !important;
                                              Margin-right: 160px !important;
                                            }
                                            .mso .w260 .divider {
                                              Margin-left: 110px !important;
                                              Margin-right: 110px !important;
                                            }
                                            .mso .w160 .divider {
                                              Margin-left: 60px !important;
                                              Margin-right: 60px !important;
                                            }
                                            .mso .w354 .divider {
                                              Margin-left: 157px !important;
                                              Margin-right: 157px !important;
                                            }
                                            .mso .w250 .divider {
                                              Margin-left: 105px !important;
                                              Margin-right: 105px !important;
                                            }
                                            .mso .w148 .divider {
                                              Margin-left: 54px !important;
                                              Margin-right: 54px !important;
                                            }
                                            .mso .size-8,
                                            .ie .size-8 {
                                              font-size: 8px !important;
                                              line-height: 14px !important;
                                            }
                                            .mso .size-9,
                                            .ie .size-9 {
                                              font-size: 9px !important;
                                              line-height: 16px !important;
                                            }
                                            .mso .size-10,
                                            .ie .size-10 {
                                              font-size: 10px !important;
                                              line-height: 18px !important;
                                            }
                                            .mso .size-11,
                                            .ie .size-11 {
                                              font-size: 11px !important;
                                              line-height: 19px !important;
                                            }
                                            .mso .size-12,
                                            .ie .size-12 {
                                              font-size: 12px !important;
                                              line-height: 19px !important;
                                            }
                                            .mso .size-13,
                                            .ie .size-13 {
                                              font-size: 13px !important;
                                              line-height: 21px !important;
                                            }
                                            .mso .size-14,
                                            .ie .size-14 {
                                              font-size: 14px !important;
                                              line-height: 21px !important;
                                            }
                                            .mso .size-15,
                                            .ie .size-15 {
                                              font-size: 15px !important;
                                              line-height: 23px !important;
                                            }
                                            .mso .size-16,
                                            .ie .size-16 {
                                              font-size: 16px !important;
                                              line-height: 24px !important;
                                            }
                                            .mso .size-17,
                                            .ie .size-17 {
                                              font-size: 17px !important;
                                              line-height: 26px !important;
                                            }
                                            .mso .size-18,
                                            .ie .size-18 {
                                              font-size: 18px !important;
                                              line-height: 26px !important;
                                            }
                                            .mso .size-20,
                                            .ie .size-20 {
                                              font-size: 20px !important;
                                              line-height: 28px !important;
                                            }
                                            .mso .size-22,
                                            .ie .size-22 {
                                              font-size: 22px !important;
                                              line-height: 31px !important;
                                            }
                                            .mso .size-24,
                                            .ie .size-24 {
                                              font-size: 24px !important;
                                              line-height: 32px !important;
                                            }
                                            .mso .size-26,
                                            .ie .size-26 {
                                              font-size: 26px !important;
                                              line-height: 34px !important;
                                            }
                                            .mso .size-28,
                                            .ie .size-28 {
                                              font-size: 28px !important;
                                              line-height: 36px !important;
                                            }
                                            .mso .size-30,
                                            .ie .size-30 {
                                              font-size: 30px !important;
                                              line-height: 38px !important;
                                            }
                                            .mso .size-32,
                                            .ie .size-32 {
                                              font-size: 32px !important;
                                              line-height: 40px !important;
                                            }
                                            .mso .size-34,
                                            .ie .size-34 {
                                              font-size: 34px !important;
                                              line-height: 43px !important;
                                            }
                                            .mso .size-36,
                                            .ie .size-36 {
                                              font-size: 36px !important;
                                              line-height: 43px !important;
                                            }
                                            .mso .size-40,
                                            .ie .size-40 {
                                              font-size: 40px !important;
                                              line-height: 47px !important;
                                            }
                                            .mso .size-44,
                                            .ie .size-44 {
                                              font-size: 44px !important;
                                              line-height: 50px !important;
                                            }
                                            .mso .size-48,
                                            .ie .size-48 {
                                              font-size: 48px !important;
                                              line-height: 54px !important;
                                            }
                                            .mso .size-56,
                                            .ie .size-56 {
                                              font-size: 56px !important;
                                              line-height: 60px !important;
                                            }
                                            .mso .size-64,
                                            .ie .size-64 {
                                              font-size: 64px !important;
                                              line-height: 63px !important;
                                            }
                                            </style>
                                                
                                              <style type="text/css">
                                            .main,.mso{background-color:#fff}.logo a:hover,.logo a:focus{color:#1e2e3b !important}.footer-logo a:hover,.footer-logo a:focus{color:#372d1b !important}.mso .layout-has-border{border-top:1px solid #ccc;border-bottom:1px solid #ccc}.mso .layout-has-bottom-border{border-bottom:1px solid #ccc}.mso .border,.ie .border{background-color:#ccc}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:56px !important;line-height:60px !important}.mso h2,.ie h2{}.mso h2,.ie h2{font-size:32px !important;line-height:40px !important}.mso h3,.ie h3{}.mso .layout__inner,.ie .layout__inner{}.mso .footer__share-button p{}.mso .footer__share-button p{font-family:Avenir,sans-serif}
                                            </style><meta name="robots" content="noindex,nofollow" />
                                            <meta property="og:title" content="My First Campaign" />
                                            </head>
                                            <!--[if mso]>
                                              <body class="mso">
                                            <![endif]-->
                                            <!--[if !mso]><!-->
                                              <body class="main no-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
                                            <!--<![endif]-->
                                                <table class="wrapper" style="border-collapse: collapse;table-layout: fixed;min-width: 320px;width: 100%;background-color: #fff;" cellpadding="0" cellspacing="0" role="presentation"><tbody><tr><td>
                                                  <div role="banner">
                                                    <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000% - 167440px);">
                                                      <div style="border-collapse: collapse;display: table;width: 100%;">
                                                      <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0" role="presentation"><tr><td style="width: 280px" valign="top"><![endif]-->
                                                        <div class="snippet" style="display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000% - 78120px);padding: 10px 0 5px 0;color: #999;font-family: Avenir,sans-serif;">
                                                          
                                                        </div>
                                                      <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
                                                        <div class="webversion" style="display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100% - 78680px);padding: 10px 0 5px 0;text-align: right;color: #999;font-family: Avenir,sans-serif;">
                                                          
                                                        </div>
                                                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                                      </div>
                                                    </div>
                                                    
                                                  </div>
                                                  <div>
                                                  <div class="layout one-col fixed-width stack" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                                                    <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #f4476b;">
                                                    <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-fixed-width" style="background-color: #f4476b;"><td style="width: 600px" class="w560"><![endif]-->
                                                      <div class="column" style="text-align: left;color: #000;font-size: 16px;line-height: 24px;font-family: Avenir,sans-serif;">
                                                    
                                                        <div style="Margin-left: 20px;Margin-right: 20px;">
                                                  <div style="mso-line-height-rule: exactly;line-height: 40px;font-size: 1px;">&nbsp;</div>
                                                </div>
                                                    
                                                        <div style="Margin-left: 20px;Margin-right: 20px;">
                                                  <div style="mso-line-height-rule: exactly;line-height: 20px;font-size: 1px;">&nbsp;</div>
                                                </div>
                                                    
                                                    <div style="font-size: 12px;font-style: normal;font-weight: normal;line-height: 19px;" align="center">
                                                      <a style="text-decoration: underline;transition: opacity 0.1s ease-in;color: #da052b;" href="https://i.imgur.com/PqsPKMZ.png"><img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-bottom" style="border: 0;display: block;height: auto;width: 100%;max-width: 403px;" alt="" width="403" src="https://i.imgur.com/PqsPKMZ.png" /></a>
                                                    </div>
                                                  
                                                      </div>
                                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                                    </div>
                                                  </div>
                                              
                                                  <div style="mso-line-height-rule: exactly;line-height: 20px;font-size: 20px;">&nbsp;</div>
                                              
                                                  <div class="layout one-col fixed-width stack" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                                                    <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;">
                                                    <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-fixed-width" style="background-color: #ffffff;"><td style="width: 600px" class="w560"><![endif]-->
                                                      <div class="column" style="text-align: left;color: #000;font-size: 16px;line-height: 24px;font-family: Avenir,sans-serif;">
                                                    
                                                        <div style="Margin-left: 20px;Margin-right: 20px;">
                                                  <div style="mso-line-height-rule: exactly;line-height: 40px;font-size: 1px;">&nbsp;</div>
                                                </div>
                                                    
                                                        <div style="Margin-left: 20px;Margin-right: 20px;">
                                                  <div style="mso-line-height-rule: exactly;mso-text-raise: 11px;vertical-align: middle;">
                                                    <h1 style="Margin-top: 0;Margin-bottom: 20px;font-style: normal;font-weight: normal;color: #da052b;font-size: 40px;line-height: 47px;text-align: center;"><strong>Welcome To Viksagram</strong></h1>
                                                  </div>
                                                </div>
                                                    
                                                        <div style="Margin-left: 20px;Margin-right: 20px;">
                                                  <div style="mso-line-height-rule: exactly;mso-text-raise: 11px;vertical-align: middle;">
                                                    <p style="Margin-top: 0;Margin-bottom: 20px;text-align: center;">You are now part of our community. Please Enjoy</p>
                                                  </div>
                                                </div>
                                                    
                                                        <div style="Margin-left: 20px;Margin-right: 20px;">
                                                  <div style="mso-line-height-rule: exactly;line-height: 20px;font-size: 1px;">&nbsp;</div>
                                                </div>
                                                    
                                                      </div>
                                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                                    </div>
                                                  </div>
                                              
                                                  <div style="mso-line-height-rule: exactly;line-height: 20px;font-size: 20px;">&nbsp;</div>
                                              
                                                  <div class="layout one-col fixed-width stack" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                                                    <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;">
                                                    <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-fixed-width" style="background-color: #ffffff;"><td style="width: 600px" class="w560"><![endif]-->
                                                      <div class="column" style="text-align: left;color: #000;font-size: 16px;line-height: 24px;font-family: Avenir,sans-serif;">
                                                    
                                                        <div style="Margin-left: 20px;Margin-right: 20px;">
                                                  <div style="mso-line-height-rule: exactly;mso-text-raise: 11px;vertical-align: middle;">
                                                    <h2 style="Margin-top: 0;Margin-bottom: 16px;font-style: normal;font-weight: normal;color: #da052b;font-size: 28px;line-height: 36px;"><strong>Meet New People</strong></h2>
                                                  </div>
                                                </div>
                                                    
                                                        <div style="Margin-left: 20px;Margin-right: 20px;">
                                                  <div style="mso-line-height-rule: exactly;mso-text-raise: 11px;vertical-align: middle;">
                                                    <p style="Margin-top: 0;Margin-bottom: 20px;">Our strong community is always welcoming.</p>
                                                  </div>
                                                </div>
                                                    
                                                        <div style="Margin-left: 20px;Margin-right: 20px;">
                                                  <div style="mso-line-height-rule: exactly;line-height: 8px;font-size: 1px;">&nbsp;</div>
                                                </div>
                                                    
                                                      </div>
                                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                                    </div>
                                                  </div>
                                              
                                                  <div style="mso-line-height-rule: exactly;line-height: 20px;font-size: 20px;">&nbsp;</div>
                                              
                                                  <div class="layout two-col has-gutter stack" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                                                    <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">
                                                    <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr><td style="width: 290px" valign="top" class="w250"><![endif]-->
                                                      <div class="column" style="max-width: 320px;min-width: 290px; width: 320px;width: calc(18290px - 3000%);Float: left;">
                                                        <table class="column__background" style="border-collapse: collapse;table-layout: fixed;background-color: #ffffff;" cellpadding="0" cellspacing="0" width="100%" role="presentation">
                                                          <tbody><tr>
                                                            <td style="text-align: left;color: #000;font-size: 16px;line-height: 24px;font-family: Avenir,sans-serif;">
                                                            
                                                    <div style="font-size: 12px;font-style: normal;font-weight: normal;line-height: 19px;" align="center">
                                                    
                                                      <a style="text-decoration: underline;transition: opacity 0.1s ease-in;color: #da052b;" href="https://i.imgur.com/PavFWMp.jpg"><img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top gnd-corner-image-bottom" style="border: 0;display: block;height: auto;width: 100%;max-width: 480px;" alt="" width="290" src="https://i.imgur.com/PavFWMp.jpg" /></a>
                                                    </div>
                                                  
                                                            </td>
                                                          </tr>
                                                        </tbody></table>
                                                      </div>
                                                    <!--[if (mso)|(IE)]></td><td style="width: 20px"><![endif]--><div class="gutter" style="Float: left;width: 20px;">&nbsp;</div><!--[if (mso)|(IE)]></td><td style="width: 290px" valign="top" class="w250"><![endif]-->
                                                      <div class="column" style="max-width: 320px;min-width: 290px; width: 320px;width: calc(18290px - 3000%);Float: left;">
                                                        <table class="column__background" style="border-collapse: collapse;table-layout: fixed;background-color: #ffffff;" cellpadding="0" cellspacing="0" width="100%" role="presentation">
                                                          <tbody><tr>
                                                            <td style="text-align: left;color: #000;font-size: 16px;line-height: 24px;font-family: Avenir,sans-serif;">
                                                            
                                                    <div style="font-size: 12px;font-style: normal;font-weight: normal;line-height: 19px;" align="center">
                                                      <a style="text-decoration: underline;transition: opacity 0.1s ease-in;color: #da052b;" href="https://i.imgur.com/8FAR7yo.jpg">"<img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top" style="border: 0;display: block;height: auto;width: 100%;max-width: 480px;" alt="" width="290" src="https://i.imgur.com/8FAR7yo.jpg" /></a>
                                                    </div>
                                                  
                                                    <div style="font-size: 12px;font-style: normal;font-weight: normal;line-height: 19px;Margin-top: 20px;" align="center">
                                                      <a style="text-decoration: underline;transition: opacity 0.1s ease-in;color: #da052b;" href="https://i.imgur.com/xO33P89.jpg">"<img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-bottom" style="border: 0;display: block;height: auto;width: 100%;max-width: 480px;" alt="" width="290" src="https://i.imgur.com/xO33P89.jpg" /></a>
                                                    </div>
                                                  
                                                            </td>
                                                          </tr>
                                                        </tbody></table>
                                                      </div>
                                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                                    </div>
                                                  </div>
                                              
                                                  <div style="mso-line-height-rule: exactly;line-height: 20px;font-size: 20px;">&nbsp;</div>
                                              
                                                  </div>
                                                  <div role="contentinfo">
                                                    <div class="layout email-footer stack" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                                                      <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">
                                                      <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
                                                        <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #999;font-family: Avenir,sans-serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000% - 47600px);">
                                                          <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                                                            
                                                            <div style="font-size: 12px;line-height: 19px;margin-bottom: 15px;">
                                                              
                                                            </div>
                                                            <div style="font-size: 12px;line-height: 19px;margin-bottom: 15px;Margin-top: 18px;">
                                                              
                                                            </div>
                                                            <!--[if mso]>&nbsp;<![endif]-->
                                                          </div>
                                                        </div>
                                                      <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
                                                      
                                                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                                      </div>
                                                    </div>
                                                    <div class="layout one-col email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                                                      <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">
                                                      <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-email-footer"><td style="width: 600px;" class="w560"><![endif]-->
                                                        <div class="column" style="text-align: left;font-size: 12px;line-height: 19px;color: #999;font-family: Avenir,sans-serif;">
                                                          <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                                                        
                                                          </div>
                                                        </div>
                                                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div style="line-height:40px;font-size:40px;" id="footer-spacing">&nbsp;</div>
                                                </td></tr></tbody></table>
                                        
                                            </body>
                                            </html>
                                            ', $email);
                                        echo "Success!";
                                } else {
                                        echo 'Email in use!';
                                }
                        } else {
                                        echo 'Invalid email!';
                                }
                        } else {
                                echo 'Invalid password!';
                        }
                        } else {
                                echo 'Invalid username';
                        }
                } else {
                        echo 'Invalid username';
                }

        } else {
                echo 'User already exists!';
        }
}
?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viksagram</title>
    <link rel="icon" href="assets/img/Logoicon.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color: #F1F7FC;">
    <div class="login-clean">
        <form action="create-account.php" method="post">
            <h2 class="sr-only">Create Account</h2>
            <div class="illustration"><img src="assets/img/Logo.png" style="max-width:60%"></i></div>
                        <hr>
            <div class="form-group">
                <input class="form-control" id="username" type="text" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input class="form-control" id="email" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" id="password" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" name="createaccount"  class="btn btn-primary btn-block" id="ca" type="button" data-bs-hover-animate="shake">Create Account</button>
            </div><a href="login.php" class="forgot">Already got an account? Click here!</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>