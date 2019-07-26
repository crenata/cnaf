<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            box-sizing: border-box;
            hyphens: auto;
            -moz-hyphens: auto;
            -webkit-hyphens: auto;
        }

        .bg-881a1b {
            color: white !important;
            background-color: #881a1b !important;
            border-color: #881a1b !important;
        }

        p, a {
            font-size: 14px;
        }

        .clearfix:after {
            clear: both;
        }

        .float-right {
            float: right;
        }
        .float-left {
            float: left;
        }

        .info-content {
            color: rgba(0, 0, 0, 0.6);
        }

        hr {
            color: rgba(0, 0, 0, 0.6);
        }
    </style>
</head>
<body>
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0">
                <!-- Email Body -->
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0">
                        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" style="background-color: #F9F9F9; border-radius: 1rem;">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell" style="padding: 35px;">
                                    <img src="https://lh3.googleusercontent.com/PLQCDv6v1sNvQ7bv1KCi3PatP1C8yxvpdl0U04tHR4x9d_ISWWUGmGx026ArQ3lUpkJcJNESXyeZBq8IEAGtRrsdTI8jE-qhs0GbI3oSL5S-q3dnFPDOew27nNCpALcCRmIAKWqakCKZp2cD4J2IQ-ZnvRbqnAjmHTGwCLWd1mxdMRkFVuHza_s0U_sIEBlnzlrZxGUrAK4AMxNg-GydPx4LNcrljaPOcZNyxm7O10ltpGi_G0iCvuhdtoOC98waFRzd3scvBREnAJEGQrV_WiGpC80dY5DAO32w6AalPB83nHyPBnY-kUZUrBJX1rG20JtlH4iewNTbeTUV0QYi80mB6ne9xCnpYnrdDXeFesMMw9bufhnchVGojIyiDy4G-VxvAtVA3Lz-_A9F_v2LhiIvlITd2gw775UOWy_Gy2Q69leJ_I92jmTLyKeuEy4HqYl1h3Yp6H8vZsNy74fpStfgDCnQ_LeMS7kbdr_exI4mYRlaDWIxdcFTkQFx0zj0ii0UPfRhye9q6hT-4VwXiFG7U92cbpES80k_qfM5EmqJPGs-d5OkqN8iS_75az7bMuZdBs6Hqr9OY2JYj8JLUWY-iMMnmj4KbEJ82PArE-J0nqw2DkfELdNekcBVxfdfIJLkgoRCLWUulz-sbTWCtIPU9vp50iU=w655-h124-no" alt="" width="200" class="m-0">
                                    <h3 style="color: #881a1b; font-weight: bold; margin-top: 2.2rem;">Hai, {{ $user->name }}</h3>
                                    <p style="color: #3d4852;">Terima kasih telah bergabung di SobatCNAF.</p>
                                    <p style="color: #3d4852;">Sebelum melanjutkan proses pengajuan, harap untuk verifikasi email Anda terlebih dahulu!</p>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top: 2rem;">
                                        <tr>
                                            <td align="center">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td align="center">
                                                            <a href="{{ $verification_url }}" class="button bg-881a1b" target="_blank" style="border-radius: 3px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); display: inline-block; text-decoration: none; padding: 0.6rem 2.2rem;">
                                                                Verify Email Address
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="" style="margin-top: 2rem;">
                                        <p>Email Anda sudah terdaftar di SobatCNAF dengan password : <b>1234567890</b></p>
                                        <p>Rahasiakan password Anda dengan mengklik button verify di atas untuk merubah password.</p>
                                    </div>
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
</html>