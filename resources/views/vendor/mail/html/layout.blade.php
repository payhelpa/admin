<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="color-scheme" content="light">
        <meta name="supported-color-schemes" content="light">
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

        table, td, div, h1, p {font-family: 'Raleway', sans-serif; color: #121212;}
        table, td {border: none;}

        </style>
    </head>
    <body style="margin:0;padding:0;">
        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#efefef;">
            <tr>
                <td align="center" style="padding:0;">
                    <table role="presentation" style="width:400px;border-collapse:collapse;border:none;border-spacing:0;text-align:left;background:#fdfcfd;">
                        <tr>
                            <td align="center">
                                <img src="https://i.ibb.co/xmzBNN4/payhelpa-01-2.png" alt="img" width=""style="height:auto;display:block;margin:20px 0 20px 0"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0px 30px 30px 30px;">
                                <p style="font-family:'Raleway', sans-serif;font-size:18px;font-style: normal;font-weight: 600;line-height: 21px;letter-spacing: 0em;text-align:center;color: #121212;">{{ $header ?? 'New Message' }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0px 30px 30px 30px;">
                                <img src="https://i.ibb.co/gMVfHsM/Mask-Group.png" alt="img" width="480"style="height:auto;display:block;"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0px 30px 30px 30px;">
                                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr>
                                        <td style="padding:0;">
                                            <p style="font-family:'Raleway', sans-serif;font-size: 18px;font-style: normal;font-weight: 600;line-height: 21px;letter-spacing: 0em;text-align: left;color: #121212;"> </p>
                                            <p style="font-family:'Raleway', sans-serif;font-size: 16px;font-style: normal;font-weight: 400;line-height: 21.42px;letter-spacing: 0em;text-align: left;color: #121212;">
                                                {{ Illuminate\Mail\Markdown::parse($slot) }}
                                                {{ $subcopy ?? '' }}
                                            </p>
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px;border-top:2px solid #dddddd;background: #fff;">
                                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">

                                    <tr>
                                        <td align="center">
                                            <p style="font-family:'Raleway', sans-serif;font-size: 14px;font-style: normal;font-weight: 400;line-height: 21.42px;letter-spacing: 0em;color: #575D68;">If you have any questions, please don’t hesitate to contact us <strong>info@payhelpa.com</strong></p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="center">
                                            <table align="right" border="0" cellpadding="" cellspacing="17px" role="presentation" style="float:none;display:inline-table;">
                                                <tr>
                                                    <td style="font-size:0;vertical-align:middle;cursor:pointer;">
                                                        <img height="" src="https://i.ibb.co/nbgSbLS/Group.png" style="display:block;" width="" />
                                                    </td>
                                                    <td style="font-size:0;vertical-align:middle;cursor:pointer;">
                                                        <img height="" src="https://i.ibb.co/mJL1McP/Vector.png" style="display:block;" width="" />
                                                    </td>
                                                    <td style="font-size:0;vertical-align:middle;cursor:pointer;">
                                                        <img height="" src="https://i.ibb.co/LR0mzK8/akar-icons-instagram-fill.png" style="display:block;" width="" />
                                                    </td>
                                                </tr>
                                            </table>
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
