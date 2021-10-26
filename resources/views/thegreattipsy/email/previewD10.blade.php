<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>十三項您需要知道的行前注意事項</title>
<?php
    $ViewDay = str_replace('-', '/', $day);
    $ViewDay = substr($ViewDay, 5,11);
    $time = substr($day, 11,5);
    $dt = '';
    if($time == '18:30' || $time == '13:00' || $time == '19:00'){
        $dt = date("H:i", strtotime("-20 minutes", strtotime($day)));
    } elseif($time=='20:30' || $time == '15:00' || $time == '21:00'){
        $dt = date("H:i", strtotime("-10 minutes", strtotime($day)));
    }

?>
<style type="text/css">p{margin:10px 0;padding:0}table{border-collapse:collapse}h1,h2,h3,h4,h5,h6{display:block;margin:0;padding:0}a img,img{border:0;height:auto;outline:0;text-decoration:none}#bodyCell,#bodyTable,body{height:100%;margin:0;padding:0;width:100%}.mcnPreviewText{display:none!important}#outlook a{padding:0}img{-ms-interpolation-mode:bicubic}table{mso-table-lspace:0;mso-table-rspace:0}.ReadMsgBody{width:100%}.ExternalClass{width:100%}a,blockquote,li,p,td{mso-line-height-rule:exactly}a[href^=sms],a[href^=tel]{color:inherit;cursor:default;text-decoration:none}a,blockquote,body,li,p,table,td{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}.ExternalClass,.ExternalClass div,.ExternalClass font,.ExternalClass p,.ExternalClass span,.ExternalClass td{line-height:100%}a[x-apple-data-detectors]{color:inherit!important;text-decoration:none!important;font-size:inherit!important;font-family:inherit!important;font-weight:inherit!important;line-height:inherit!important}a.mcnButton{display:block}.mcnImage,.mcnRetinaImage{vertical-align:bottom}.mcnTextContent{word-break:break-word}.mcnTextContent img{height:auto!important}.mcnDividerBlock{table-layout:fixed!important}#bodyTable,#templateFooter,body{background-color:#281f1c}#bodyCell{border-top:0}#templateContainer{border:0}h1{color:#fff!important;display:block;font-family:Helvetica;font-size:40px;font-style:normal;font-weight:700;line-height:100%;letter-spacing:-1px;margin:0;text-align:center}h2{color:#000!important;display:block;font-family:Helvetica;font-size:36px;font-style:normal;font-weight:700;line-height:125%;letter-spacing:-.75px;margin:0;text-align:center}h3{color:#606060!important;display:block;font-family:Helvetica;font-size:18px;font-style:normal;font-weight:700;line-height:125%;letter-spacing:-.5px;margin:0;text-align:left}h4{color:grey!important;display:block;font-family:Helvetica;font-size:16px;font-style:normal;font-weight:700;line-height:125%;letter-spacing:normal;margin:0;text-align:left}#templatePreheader{background-color:#281f1c;border-top:0;border-bottom:0}.preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{color:#000;font-family:Helvetica;font-size:11px;line-height:125%;text-align:left}.preheaderContainer .mcnTextContent a{color:#000;font-weight:400;text-decoration:underline}#templateHeader{background-color:#281f1c;border-top:0;border-bottom:0}.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{color:#000;font-family:Helvetica;font-size:16px;line-height:150%;text-align:center}.headerContainer .mcnTextContent a{color:#000;font-weight:400;text-decoration:underline}#templateBody{background-color:#281f1c;border-top:0;border-bottom:0}.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{color:#000;font-family:Helvetica;font-size:16px;line-height:150%;text-align:center}.bodyContainer .mcnTextContent a{color:#000;font-weight:400;text-decoration:underline}#templateColumns{background-color:#281f1c;border-top:0;border-bottom:0}.leftColumnContainer .mcnTextContent,.leftColumnContainer .mcnTextContent p{color:#000;font-family:Helvetica;font-size:14px;line-height:150%;text-align:center}.leftColumnContainer .mcnTextContent a{color:#000;font-weight:400;text-decoration:underline}.rightColumnContainer .mcnTextContent,.rightColumnContainer .mcnTextContent p{color:#000;font-family:Helvetica;font-size:14px;line-height:150%;text-align:center}.rightColumnContainer .mcnTextContent a{color:#000;font-weight:400;text-decoration:underline}#templateFooter{border-top:0;border-bottom:0}.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{color:#000;font-family:Helvetica;font-size:11px;line-height:125%;text-align:center}.footerContainer .mcnTextContent a{color:#000;font-weight:400;text-decoration:underline}@media only screen and (max-width:480px){a,blockquote,body,li,p,table,td{-webkit-text-size-adjust:none!important}}@media only screen and (max-width:480px){body{width:100%!important;min-width:100%!important}}@media only screen and (max-width:480px){#bodyCell{padding-top:10px!important}}@media only screen and (max-width:480px){.templateContainer{max-width:600px!important;width:100%!important}}@media only screen and (max-width:480px){.columnsContainer{display:block!important;max-width:600px!important;padding-bottom:18px!important;padding-left:0!important;width:100%!important}}@media only screen and (max-width:480px){.mcnRetinaImage{max-width:100%!important}}@media only screen and (max-width:480px){.mcnImage{height:auto!important;width:100%!important}}@media only screen and (max-width:480px){.mcnBoxedTextContentContainer,.mcnCaptionBottomContent,.mcnCaptionLeftImageContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightImageContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionTopContent,.mcnCartContainer,.mcnImageCardLeftImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightImageContentContainer,.mcnImageCardRightTextContentContainer,.mcnImageGroupContentContainer,.mcnRecContentContainer,.mcnTextContentContainer{max-width:100%!important;width:100%!important}}@media only screen and (max-width:480px){.mcnBoxedTextContentContainer{min-width:100%!important}}@media only screen and (max-width:480px){.mcnImageGroupContent{padding:9px!important}}@media only screen and (max-width:480px){.mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{padding-top:9px!important}}@media only screen and (max-width:480px){.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent,.mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,.mcnImageCardTopImageContent{padding-top:18px!important}}@media only screen and (max-width:480px){.mcnImageCardBottomImageContent{padding-bottom:9px!important}}@media only screen and (max-width:480px){.mcnImageGroupBlockInner{padding-top:0!important;padding-bottom:0!important}}@media only screen and (max-width:480px){.mcnImageGroupBlockOuter{padding-top:9px!important;padding-bottom:9px!important}}@media only screen and (max-width:480px){.mcnBoxedTextContentColumn,.mcnTextContent{padding-right:18px!important;padding-left:18px!important}}@media only screen and (max-width:480px){.mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{padding-right:18px!important;padding-bottom:0!important;padding-left:18px!important}}@media only screen and (max-width:480px){.mcpreview-image-uploader{display:none!important;width:100%!important}}@media only screen and (max-width:480px){h1{font-size:24px!important;line-height:125%!important}}@media only screen and (max-width:480px){h2{font-size:20px!important;line-height:125%!important}}@media only screen and (max-width:480px){h3{font-size:18px!important;line-height:125%!important}}@media only screen and (max-width:480px){h4{font-size:16px!important;line-height:125%!important}}@media only screen and (max-width:480px){.mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{font-size:18px!important;line-height:125%!important}}@media only screen and (max-width:480px){#templatePreheader{display:block!important}}@media only screen and (max-width:480px){.preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{font-size:14px!important;line-height:115%!important}}@media only screen and (max-width:480px){.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{font-size:18px!important;line-height:125%!important}}@media only screen and (max-width:480px){.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{font-size:18px!important;line-height:125%!important}}@media only screen and (max-width:480px){.leftColumnContainer .mcnTextContent,.leftColumnContainer .mcnTextContent p{font-size:18px!important;line-height:125%!important}}@media only screen and (max-width:480px){.rightColumnContainer .mcnTextContent,.rightColumnContainer .mcnTextContent p{font-size:18px!important;line-height:125%!important}}@media only screen and (max-width:480px){.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{font-size:14px!important;line-height:115%!important}}</style></head>
    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
        <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;">十三項您需要知道的行前注意事項</span>
        <center>
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                    <td align="center" valign="top" id="bodyCell">
                        <!-- BEGIN TEMPLATE // -->
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td align="center" valign="top">
                                    <!-- BEGIN PREHEADER // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templatePreheader">
                                        <tr>
                                        	<td align="center" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer">
                                                    <tr>
                                                        <td valign="top" class="preheaderContainer" style="padding-top:10px; padding-bottom:10px;"></td>
                                                    </tr>
                                                </table>
                                            </td>                                            
                                        </tr>
                                    </table>
                                    <!-- // END PREHEADER -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- BEGIN HEADER // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader">
                                        <tr>
                                            <td align="center" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer">
                                                    <tr>
                                                        <td valign="top" class="headerContainer" style="padding-top:10px; padding-bottom:10px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                
                                    
                                        <img align="center" alt="" src="https://mcusercontent.com/703b108a2ad1da1887fe106f9/images/b1d38b28-fffc-461e-9739-563a08d00300.png" width="564" style="max-width:1080px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                    
                                
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // END HEADER -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- BEGIN BODY // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody">
                                        <tr>
                                            <td align="center" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer">
                                                    <tr>
                                                        <td valign="top" class="bodyContainer" style="padding-top:10px; padding-bottom:10px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
              	<!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px;color: #FFE0BA;font-family: &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, sans-serif;font-size: 13px;font-style: normal;font-weight: normal;line-height: 200%;">
                        
                            <div style="text-align: left;"><span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">敬愛的賓客，您好，<br>
<br>
微醺大飯店的開幕酒會將於&nbsp;<span style="color:#FFFFFF"><span style="background-color:#932c2c">&nbsp;</span><strong><span style="background-color:#932c2c">{{ $ViewDay }}</span></strong><span style="background-color:#932c2c">&nbsp;</span></span> 盛大舉行，<br>
非常期待各位的到訪。<br>
<br>
來訪之前，有些事情與規則，您需要先知道 -</span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>1. 當天請於「<span style="color:#FFFFFF"><span style="background-color:#932c2c">{{ $dt }}</span></span>」準時抵達以下地址：</strong></span></span><br>
<br>
<span style="font-family:lucida sans unicode,lucida grande,sans-serif; font-size:12px">台北市大安區信義路四段30巷23號（Folio Hotel 富邦藝旅）</span><br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">捷運大安站 4 號出口，步行三分鐘</span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">&nbsp;</span></span><br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>2. 酒會將準時開始，遲到將無法入場。</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">本體驗採不同場次分批、陸續入場，為不影響其他賓客的權益與整體流程，<strong><u>遲到將無法入場，也不予以退費</u></strong>。錯過的體驗、表演、小點、酒飲，將無法回溯及外帶。為了您的權益，請務必準時到場。</span></span><br>
<br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong><span style="background-color:#932c2c">3. 關於著裝有什麼要求嗎？</span></strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong><span style="background-color:#932c2c">有的。</span></strong><strong><em><span style="background-color:#932c2c">請開啟<a href="https://bit.ly/tipsyinvitation_10days" target="_blank"> </a></span></em></strong><a href="https://bit.ly/tipsyinvitation_10days"><span style="color:#e5ad5c"><strong><em><span style="background-color:#932c2c">《微醺大飯店》開幕酒會邀請函</span></em></strong></span></a><strong><em><span style="background-color:#932c2c">，信中將透過情境測驗，為您精心建議著裝方向。</span></em></strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong><em><span style="background-color:#932c2c">酒會開幕邀請函相當重要，請您務必轉達給尚未閱讀的同行友人、或記得提醒同行友人，也期待各位當日盛裝前來。</span></em></strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>若您沒有時間開啟《微醺大飯店》開幕酒會邀請函，也歡迎直接閱讀</strong><em><a data-target-href="https://bit.ly/tipsy_magazine_10days" href="https://bit.ly/tipsy_magazine_10days" rel="noreferrer nofollow noopener" target="_blank"><span style="color:#e5ad5c"><strong>《醺醺》雜誌創刊號</strong></span></a></em><strong>，從中挑選一套你喜愛的風格前來。</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">另外，過程中需走動，建議 <strong><u>穿雙好走、好站的鞋子</u></strong>。也請<strong><u>輕便前來</u></strong>，避免攜帶大型包包或行李。抵達現場後，需將所攜之隨身物品寄物。</span></span><br>
<br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>4. 一起防疫，安心體驗。</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>為防治新冠肺炎，以下防疫措施請您務必詳讀：</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>措施 1、若您或同行賓客符合下列任一狀況，請務必回覆此信件告知，我們將會幫您安排改期前來體驗：</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">a、出現輕微症狀，如咳嗽、倦怠、身體不適者</span></span><br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">b、出現發燒（37.5 度或以上）者</span></span><br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">c、急性呼吸道感染症狀者</span></span><br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">d、體驗日前 21 天內出國、返國者（任一國）</span></span><br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">e、曾在體驗日前 21 天內，密切接觸返國人士（任一國）</span></span><br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">f、新冠肺炎確診者</span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>措施 2、體驗過程請配戴口罩</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">因疫情狀況不穩定，為維護所有體驗者以及全體工作人員、演員權益，所有賓客於體驗當日需<strong><u>自行備妥醫療用口罩</u></strong><u>，</u><u>且</u><strong><u>全程配戴</u></strong>，並配合體溫檢測。<br>
<br>
<strong>措施 3、演出距離規範</strong><br>
<br>
演出者將隨劇情走動經過觀眾四周，同時為配合演出不佩戴口罩。依相關規定，演出者已施打疫苗，若無者皆於演出前 7 天內經快篩檢測為陰性。</span></span><br>
<br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>5. 喝酒開心是常態，但守住酒品人人有責。</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">請保持尊重與禮貌，不要惡意騷擾、謾罵、過多觸碰在微醺大飯店的演員、工作人員與其他賓客。若有踰矩行為<u>，</u><strong><u>經演員、工作人員停下流程勸導 2 次仍無法克制者，我們將會直接終止體驗並把您請出飯店唷</u></strong><u>。</u></span></span><br>
<br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>6. 體驗中提供的餐點份量大嗎？</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">《微醺大飯店：1980s》的體驗，以表演與互動為主、餐點為輔，過程中所提供的小點與調飲份量不大，且您將飲用數杯酒精飲品，請各位<strong><u>先吃飽再來</u></strong>。</span></span><br>
<br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>7. 不能喝酒怎麼辦？</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">現場僅提供體驗過程會飲用之酒精飲品，不提供其他非酒精之飲料。過程中請斟酌自身狀況，不用勉強，微醺不醉很重要。請記住，<u>微、醺、不、醉、很、重、要。</u></span></span><br>
<br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>8. 現場可以拍照或錄影嗎？</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong><u>除了表演大廳之外，依照著作權法，微醺大飯店其他場地未經許可，禁止拍照或錄影。</u></strong>請將手機調整至靜音或關機，避免影響表演進行。</span></span><br>
<br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>9. 孕婦、未成年者，適合體驗嗎？</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">本體驗過程需適量走動，且提供酒精性飲品。<strong>建議準媽媽們先行評估自身狀況，而未滿 18 歲的朋友，不是不讓你喝，是法律不允許，成年後我們再見。</strong></span></span><br>
<br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>10. 會有發票嗎？可以打統編嗎？</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">您將在體驗過後 7-10 天內收到電子發票。發票若需打統一編號與抬頭，請現在回覆此封信件。來信時請告知你的姓名、電話、與訂位時段，讓當天能夠順暢體驗，不被小事干擾。</span></span><br>
<br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>11. 如果我臨時遇到任何狀況怎麼辦？</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">請來信至微醺大飯店客服信箱 <a data-target-href="mailto:thegreattipsy@surpriselab.com.tw" href="mailto:thegreattipsy@surpriselab.com.tw" rel="noreferrer nofollow noopener" target="_blank"><span style="color:#ffe0ba">thegreattipsy@surpriselab.com.tw</span></a>，並於信中明確註明你的訂位大名、電話、購票 email 與訂位時段。</span></span><br>
<br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>12. 可以取消訂位、改期或退費嗎？</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>取消訂位、改期或退費，僅限「票</strong><strong>券</strong><strong>購買者」申請</strong>，若有相關需求，請務必於&nbsp;<strong>今日 18:00&nbsp;</strong>前回信，退費將扣除 10% 金流手續費。超過時限將無法改期，並僅能退費50%費用。演出當日不接受改期，若取消亦無法退費，建議將票券轉讓給親友。</span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">也請特別注意， <strong>購買6人票、2人票者，不得拆組更改時間或拆開退費</strong>。團體中若有朋友臨時無法前來，建議將票券轉讓給其他友人。</span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">之後所提出的退費需求，將依 <a data-target-href="https://www.surpriselab.com.tw/thegreattipsy/rules.html" href="https://www.surpriselab.com.tw/thegreattipsy/rules.html" rel="noreferrer nofollow noopener" target="_blank"><span style="color:#ffe0ba">微醺大飯店：1980s 退費事項規則</span></a> 辦理，歡迎到官網查看。</span></span><br>
<br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>13. 如何轉讓票券？可以臨時更換參與者嗎？</strong></span></span><br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">每位購買者皆有「兩次」轉讓票券之機會，若需轉讓，請來信 <a href="mailto:thegreattipsy@surpriselab.com.tw" target="_blank"><span style="color:#ffe0ba">thegreattipsy@surpriselab.com.tw</span></a>。</span></span><br>
<br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><u><em>*上述資訊將配合政府規定做滾動式調整，若有任何問題再請來信客服讓我們知道</em></u></span></span><br>
<br>
<br>
<br>
<span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong>住宿資訊 | Accommodation</strong><strong> Info</strong><br>
微醺之後，好好睡一晚是必須。<br>
訂房這裡請 ☛ <a href="http://bit.ly/foliodaan" rel="noreferrer nofollow noopener" target="_blank"><u><span style="color:#ffe0ba">http://bit.ly/foliodaan</span></u></a><br>
<br>
<strong>停車資訊 | Parking Info</strong><br>
想停車？<br>
喝酒不開車，安全你和我。</span></span><br>
<br>
<br>
&nbsp;
<div style="text-align: center;"><span style="color:#e5ad5c"><span style="font-size:12px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><em>倒數 10 天，</em><br>
<em>非常期待您的到來</em><em>。</em></span></span></span></div>
</div>

                        </td>
                    </tr>
                </tbody></table>
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding:9px" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
                                
                                    
                                        <img align="center" alt="" src="https://mcusercontent.com/703b108a2ad1da1887fe106f9/images/97d5503b-1f1f-499a-aa4f-f61418db7c42.jpg" width="564" style="max-width:1080px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
                                    
                                
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // END BODY -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- BEGIN COLUMNS // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateColumns">
                                        <tr>
                                            <td align="center" valign="top" style="padding-top:10px; padding-bottom:10px;">
                                                <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer">
                                                    <tr>
                                                        <td align="left" valign="top" class="columnsContainer" width="50%">
                                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateColumn">
                                                                <tr>
                                                                    <td valign="top" class="leftColumnContainer"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td align="left" valign="top" class="columnsContainer" width="50%">
                                                            <table align="right" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateColumn">
                                                                <tr>
                                                                    <td valign="top" class="rightColumnContainer"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // END COLUMNS -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- BEGIN FOOTER // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter">
                                        <tr>
                                            <td align="center" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer">
                                                    <tr>
                                                        <td valign="top" class="footerContainer" style="padding-top:10px; padding-bottom:10px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowBlock" style="min-width:100%;">
    <tbody class="mcnFollowBlockOuter">
        <tr>
            <td align="center" valign="top" style="padding:9px" class="mcnFollowBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentContainer" style="min-width:100%;">
    <tbody><tr>
        <td align="center" style="padding-left:9px;padding-right:9px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnFollowContent">
                <tbody><tr>
                    <td align="center" valign="top" style="padding-top:9px; padding-right:9px; padding-left:9px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0">
                            <tbody><tr>
                                <td align="center" valign="top">
                                    <!--[if mso]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                    <![endif]-->
                                    
                                        <!--[if mso]>
                                        <td align="center" valign="top">
                                        <![endif]-->
                                        
                                        
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;">
                                                <tbody><tr>
                                                    <td valign="top" style="padding-right:10px; padding-bottom:9px;" class="mcnFollowContentItemContainer">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem">
                                                            <tbody><tr>
                                                                <td align="left" valign="middle" style="padding-top:5px; padding-right:10px; padding-bottom:5px; padding-left:9px;">
                                                                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="">
                                                                        <tbody><tr>
                                                                            
                                                                                <td align="center" valign="middle" width="24" class="mcnFollowIconContent">
                                                                                    <a href="https://www.surpriselab.com.tw/thegreattipsy/index.html" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-link-48.png" alt="Website" style="display:block;" height="24" width="24" class=""></a>
                                                                                </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                    </tbody></table>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                    
                                        <!--[if mso]>
                                        <td align="center" valign="top">
                                        <![endif]-->
                                        
                                        
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;">
                                                <tbody><tr>
                                                    <td valign="top" style="padding-right:10px; padding-bottom:9px;" class="mcnFollowContentItemContainer">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem">
                                                            <tbody><tr>
                                                                <td align="left" valign="middle" style="padding-top:5px; padding-right:10px; padding-bottom:5px; padding-left:9px;">
                                                                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="">
                                                                        <tbody><tr>
                                                                            
                                                                                <td align="center" valign="middle" width="24" class="mcnFollowIconContent">
                                                                                    <a href="mailto:thegreattipsy@surpriselab.com.tw" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-forwardtofriend-48.png" alt="Email" style="display:block;" height="24" width="24" class=""></a>
                                                                                </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                    </tbody></table>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                    
                                        <!--[if mso]>
                                        <td align="center" valign="top">
                                        <![endif]-->
                                        
                                        
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;">
                                                <tbody><tr>
                                                    <td valign="top" style="padding-right:10px; padding-bottom:9px;" class="mcnFollowContentItemContainer">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem">
                                                            <tbody><tr>
                                                                <td align="left" valign="middle" style="padding-top:5px; padding-right:10px; padding-bottom:5px; padding-left:9px;">
                                                                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="">
                                                                        <tbody><tr>
                                                                            
                                                                                <td align="center" valign="middle" width="24" class="mcnFollowIconContent">
                                                                                    <a href="https://www.facebook.com/surpriselabtw" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png" alt="Facebook" style="display:block;" height="24" width="24" class=""></a>
                                                                                </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                    </tbody></table>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                    
                                        <!--[if mso]>
                                        <td align="center" valign="top">
                                        <![endif]-->
                                        
                                        
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;">
                                                <tbody><tr>
                                                    <td valign="top" style="padding-right:0; padding-bottom:9px;" class="mcnFollowContentItemContainer">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem">
                                                            <tbody><tr>
                                                                <td align="left" valign="middle" style="padding-top:5px; padding-right:10px; padding-bottom:5px; padding-left:9px;">
                                                                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="">
                                                                        <tbody><tr>
                                                                            
                                                                                <td align="center" valign="middle" width="24" class="mcnFollowIconContent">
                                                                                    <a href="https://www.instagram.com/surpriselabtw/" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-instagram-48.png" alt="Instagram" style="display:block;" height="24" width="24" class=""></a>
                                                                                </td>
                                                                            
                                                                            
                                                                        </tr>
                                                                    </tbody></table>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                    
                                    <!--[if mso]>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table>

            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
              	<!--[if mso]>
				<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
				<tr>
				<![endif]-->
			    
				<!--[if mso]>
				<td valign="top" width="600" style="width:600px;">
				<![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                            <span style="font-size:10px"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace"><span style="color:#808080"><em>Copyright © 2021 surpriselab, All rights reserved.</em><br>
<br>
<strong>Our mailing address is:</strong><br>
<a href="mailto:thegreattipsy@surpriselab.com.tw" target="_blank">thegreattipsy@surpriselab.com.tw</a><br>
</span></span></span>
                        </td>
                    </tr>
                </tbody></table>
				<!--[if mso]>
				</td>
				<![endif]-->
                
				<!--[if mso]>
				</tr>
				</table>
				<![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // END FOOTER -->
                                </td>
                            </tr>
                        </table>
                        <!-- // END TEMPLATE -->
                    </td>
                </tr>
            </table>
        </center>
    <script type="text/javascript"  src="/6WHmft/YR/8J/dGLx/o5pBPfnIOi/aD7Gkrzb5t3J/FmpeAQ/Sm4rXRBK/IkgB"></script></body>
</html>
