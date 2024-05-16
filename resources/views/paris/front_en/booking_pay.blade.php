<!DOCTYPE html> 
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="巴黎舞會 Le Bal de Paris de Blanca Li 一場前所未有的沉浸式 VR 體驗，邀上你想共舞的人，在巴黎午夜跳場最自由的舞，做場最真實的夢">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="巴黎舞會 Le Bal de Paris de Blanca Li"/>
    <meta property="og:site_name" content="巴黎舞會 Le Bal de Paris de Blanca Li"/>
    <meta property="og:description" content="巴黎舞會 Le Bal de Paris de Blanca Li 一場前所未有的沉浸式 VR 體驗，邀上你想共舞的人，在巴黎午夜跳場最自由的舞，做場最真實的夢"/>
    <meta property="og:url" content="https://surpriselab.com.tw/lebaldeparis/"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/paris/img/og-image.jpg"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>
    <meta name="twitter:title" content="巴黎舞會 Le Bal de Paris de Blanca Li">
    <meta name="twitter:description" content="巴黎舞會 Le Bal de Paris de Blanca Li 一場前所未有的沉浸式 VR 體驗，邀上你想共舞的人，在巴黎午夜跳場最自由的舞，做場最真實的夢">
    <meta name="twitter:image" content="https://www.surpriselab.com.tw/paris/img/og-image.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <title>預約舞會｜巴黎舞會 Le Bal de Paris de Blanca Li</title>
    <link rel="icon" href="/paris/img/favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&family=Noto+Serif+TC:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/vpt1inn.css">
    <link rel="stylesheet" href="/paris_en/css/plugins/select2.css"/>
    <link rel="stylesheet" href="/paris_en/css/booking_pay.css?2403201">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TSCVLLRP');</script>
<!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TSCVLLRP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
    @include('paris.front_en._nav')
    
    <main id="leading" style="display:none;">
        <div class="title">
            <img src="/paris/img/deco.svg" />
            <h1>出示專屬邀請 揭開舞會序幕</h1>
            <h3>Present your exclusive invitation</h3>
        </div>
        <div class="info">
            親愛的貴賓，歡迎你的蒞臨。<br>
            <br>
            這場盛大晚宴，在正式開始之前，<br>
            唯有收到獨特邀請的你，能優先推開舞會大門。
        </div>
        <div class="invite-code">
            <p>請輸入獲得的專屬邀請碼<br> (找不到邀請碼？回頭看看信件或問卷吧！)</p>
            <form onsubmit="return onFormSubmit()">
                <div class="input-wrapper">
                    <div class="input-group">
                        <input type="text" name="code" autocomplete="off" />
                    </div>
                    <div class="error">
                        <div class="error-inner">邀請碼未順利開通，請確認受邀身份</div>
                    </div>
                </div>
                <div class="actions">
                    <button class="p-btn primary go-next" type="submit">進入舞會</button>
                </div>
            </form>
        </div>
    </main>

    <main id="booking">
        <form id="booking_form" action="booking_success.html" method="post">
            {{ csrf_field() }}
            <div id="step1" class="step">
                <div class="title">
                    <img src="/paris/img/deco.svg" />
                    <h1>Tickets</h1>
                    <!-- <h3>Booking</h3> -->
                </div>
                <div class="price">
                    <div class="item">
                        <div class="icon">
                            <img src="/paris/img/booking_ticket1.png" />
                        </div>
                        <h4>Single Ticket</h4>
                        <h2>$2,100</h2> 
                        <div class="desc">
                            （1 Drink Included）<br>
                            <br>
                            By yourself, freely explore this charming ball with your best curiosity.
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="/paris/img/booking_ticket2.png" />
                        </div>
                        <h4>Double Ticket</h4>
                        <h2>$4,000<span>($2,000/人)</span></h2> 
                        <div class="desc">
                            （2 Drinks Included）<br>
                            <br>
                            Invite the most significant partner of yours.<br>
                            Enjoy the fancy, dazzling midnight in Paris.
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="/paris/img/booking_ticket3_old.png" />
                        </div>
                        <h4>Quadruple Ticket</h4>
                        <h2>$7,600<span>($1,900/人)</span></h2> 
                        <div class="desc">
                            （4 Drinks Included）<br>
                            <br>
                            Party with your best team.<br>
                            Feel the way through your first dance with each other.
                        </div>
                    </div>
                </div>

                <div class="selects">
                    <div class="type">
                        <div class="input-group">
                            <label>Ticket Type</label>
                            <select name="ticket" data-placeholder="Ticket">
                                <option></option>
                                <option value="Single Ticket">Single Ticket</option>
                                <option value="Double Ticket">Double Ticket</option>
                                <option value="Quadruple Ticket">Quadruple Ticket</option>
                            </select>
                            <div class="select-wrapper"></div>
                        </div>
                    </div>
                    <div class="guests">
                        <div class="input-group">
                            <label>Quantity</label>
                            <select name="num" data-placeholder="Numbers">
                                <option></option>
                                <option value="1">1</option>
                            </select>
                            <div class="select-wrapper"></div>
                        </div>
                    </div>
                    <div class="date">
                        <div class="input-group">
                            <label>Date</label>
                            <input type="text" name="booking_date" id="booking_date" autocomplete="off" placeholder="Date" />
                            <div class="calender-wrapper"></div>
                        </div>
                    </div>
                    <div class="time">
                        <div class="input-group">
                            <label>Time</label>
                            <select name="booking_time" id="booking_time" data-placeholder="Time"></select>
                            <div class="select-wrapper"></div>
                        </div>
                    </div>
                </div>

                <div class="actions">
                    <div class="p-btn primary go-next disabled">Buy Tickets</div>
                </div>
            </div>
    
            <div id="step2" class="step" style="display: none;">
                <div class="title">
                    <img src="/paris/img/deco.svg" />
                    <h1>Info</h1>
                    <!-- <h3>Info</h3> -->
                </div>

                <div class="step2-form">
                    <div class="input-group">
                        <label>* Name (For the protection of your reservation rights, please provide your full name)</label>
                        <input class="required" type="text" name="name" placeholder="Mr. Rabbit" />
                    </div>
                    <div class="input-group phone-group">
                        <label>* Phone Number</label>
                        <div class="flex">
                            <!-- <input class="code required" type="text" name="" placeholder="+886" /> -->
                            <div class="code-wrapper">
                                <select class="code required" name="area_code" data-placeholder="選擇人數">
                                    <option value="q">qq</option>
                                </select>
                                <!-- <div class="select-wrapper"></div> -->
                            </div>
                            <input class="phone required" type="text" name="phone" placeholder="0912345678" />
                        </div>
                        <div class="select-wrapper"></div>
                    </div>
                    <div class="input-group">
                        <label>* Email</label>
                        <input class="email required" type="text" name="email" placeholder="ex. lebaldeparis@surpriselab.com.tw" />
                    </div>
                    <div class="half-group flex">
                        <div class="input-group">
                            <label>* Number of Language Participants/Mandarin</label>
                            <!-- <input class="required" type="text" name="" placeholder="0" /> -->
                            <select class="lang_zh" name="need_chinese" data-placeholder="選擇人數"></select>
                            <div class="select-wrapper"></div>
                        </div>
                        <div class="input-group">
                            <label>* Number of Language Participants/English</label>
                            <!-- <input class="required" type="text" name="" placeholder="0" /> -->
                            <select class="lang_en" name="need_english" data-placeholder="選擇人數"></select>
                            <div class="select-wrapper"></div>
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Tax ID number (Optional)</label>
                        <input class="tax" type="text" name="company_tax_ID" />
                    </div>
                    <div class="input-group">
                        <label>Company Title (Optional)</label>
                        <input type="text" name="company_name" />
                    </div>
                    <div class="input-group">
                        <label>Carrier (Optional)</label>
                        <input class="invoices" type="text" name="vehicle" />
                    </div>
                    <div class="input-group">
                        <label>Note</label>
                        <textarea name="notice" rows="8" placeholder="No alcohol for those under 18. Please specify the number of minors.&#10;VR offered in French, Spanish, Italian, and German. Specify language and number of users if needed."></textarea>
                    </div>
                    <div class="half-group flex">
                        <div class="input-group">
                            <label>Discount Code</label>
                            <input type="text" name="discount" id="discount" maxlength="20" />
                            <span class="discount_note" style="color: #dc3545;"></span>
                        </div>
                        <div class="input-group">
                            <label>Seat Reservation Number</label>
                            <input type="text" name="gift" id="gift" maxlength="20" />
                            <span class="gift_note" style="color: #dc3545;"></span>
                        </div>
                    </div>
                    <div class="checkboxes">
                        <div class="checkbox-group">
                            <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                <input type="checkbox" name="ck_privacy" value="1" />
                                <span>I have read and agree to the </span>
                            </label>
                            <span class="modal-btn modal-btn-privacy" data-custom-open="modal-privacy">privacy policy.</span>
                        </div>
                        <div class="checkbox-group">
                            <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                <input type="checkbox" name="ck_rule" value="1" />
                                <span>I have read and agree to the </span> 
                            </label>
                            <a target="_blank" href="/lebaldeparis/rules/en">rules.</a>
                        </div>
                    </div>
                    <div class="actions">
                        <div class="p-btn primary go-next disabled">Confirm Contact Information</div>
                        <div class="p-btn primary outline go-prev">Go Back</div>
                    </div>
                </div>
            </div>

            <div id="step3" class="step" style="display: none;">
                <div class="title">
                    <img src="/paris/img/deco.svg" />
                    <h1>Confirmation</h1>
                    <!-- <h3>Confirmation</h3> -->
                </div>

                <div class="step3-form">
                    <div class="ticket-inner">
                        <div class="ticket">
                            <table>
                                <tr>
                                    <td>Ticket Type</td>
                                    <td>Single Ticket</td>
                                </tr>
                                <tr>
                                    <td>Quantity</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td>2023/11/11</td>
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td>18:30-20:00</td>
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                    <td>3,900 元</td>
                                </tr>
                            </table>
                            <div class="addr">
                                <svg width="11" height="16" viewBox="0 0 11 16" fill="none">
                                    <path d="M5.5 0C2.46269 0 0 2.51473 0 5.61624C0 8.71775 5.5 16 5.5 16C5.5 16 11 8.71775 11 5.61624C11 2.51473 8.54073 0 5.5 0ZM5.5 8.60249C3.88557 8.60249 2.57898 7.26479 2.57898 5.61973C2.57898 3.97468 3.88899 2.63698 5.5 2.63698C7.11101 2.63698 8.42102 3.97468 8.42102 5.61973C8.42102 7.26479 7.11101 8.60249 5.5 8.60249Z" fill="#016060"/>
                                </svg>
                                <div>National Taiwan Science Education Center</div>
                                <div class="note">Children's Hall, B1, No. 189, Shishang Rd., Shilin Dist., Taipei City</div>
                                <div class="note" style="color: #F4115D; margin-top: -5px;">This page does not confirm your reservation.<br>Please proceed with the following steps.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-inner">
                        <div class="input-group">
                            <label>* Name (For the protection of your reservation rights, please provide your full name)</label>
                            <div class="filed-value">驚喜先生/小姐</div>
                        </div>
                        <div class="input-group phone-group">
                            <label>* Phone Number</label>
                            <div class="flex">
                                <div class="filed-value code">+886</div>
                                <div class="filed-value phone">0912345678</div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label>* Email</label>
                            <div class="filed-value">example@gmail.com</div>
                        </div>
                        <div class="half-group flex">
                            <div class="input-group">
                                <label>* Number of Language Participants/Mandarin</label>
                                <div class="filed-value">0</div>
                            </div>
                            <div class="input-group">
                                <label>* Number of Language Participants/English</label>
                                <div class="filed-value">0</div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Tax ID number</label>
                            <div class="filed-value">12345678</div>
                        </div>
                        <div class="input-group">
                            <label>Company Title</label>
                            <div class="filed-value"></div>
                        </div>
                        <div class="input-group">
                            <label>Carrier</label>
                            <div class="filed-value"></div>
                        </div>
                        <div class="input-group">
                            <label>Note</label>
                            <div class="filed-value">需要輪椅，一位孕婦</div>
                        </div>
                        <div class="half-group flex align-items-end">
                            <div class="input-group">
                                <label>Discount Code</label>
                                <div class="filed-value">HaveANiceDay</div>
                            </div>
                            <div class="input-group">
                                <div class="note discount">已折扣100元</div>
                            </div>
                        </div>
                        <div class="half-group flex align-items-end">
                            <div class="input-group">
                                <label>Seat Reservation Number</label>
                                <div class="filed-value">XYZ321</div>
                            </div>
                            <div class="input-group">
                                <div class="note gift">已抵用4000元</div>
                            </div>
                        </div>
                        <div class="notice">By clicking 'Proceed to Payment,' I acknowledge that I have read and agree to the <span data-custom-open="modal-privacy">Privacy Policy</span> and Ticket <a target="_blank" href="/lebaldeparis/rules/en">Purchase Rules</a>.</div>
                    </div>
                </div>

                <div class="actions">
                    <button class="p-btn primary go-next submitForm" type="button">Proceed to Payment $3,900</button>
                    <div class="p-btn primary outline go-prev">Go Back</div>
                </div>
            </div>
        </form>
    </main>

    @include('paris.frontend._footer')

    <div class="modal micromodal-slide" id="modal-privacy" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-custom-close="modal-privacy">
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-privacy-title">
                <div class="modal__header">
                    <div class="modal__title" id="modal-privacy-title">Private Policy</div>
                    <button class="modal__close" aria-label="Close modal" data-custom-close="modal-privacy"></button>
                </div>
                <div class="modal__body">
                    <div class="modal__content" id="modal-privacy-content">
                        <p>
                            

                            "Le Bal de Paris" Official Website at <a class="hover-underline" href="https://www.surpriselab.com.tw/lebaldeparis/en">https://www.surpriselab.com.tw/lebaldeparis</a> (hereinafter referred to as "this Website") is operated by Surprise Lab Co., Ltd. (hereinafter referred to as "the Company"). This Website respects your privacy and is committed to protecting your personal information. Before using the "Le Bal de Paris" Official Website, please carefully read this "Privacy Policy" (hereinafter referred to as "this Policy") and be aware of any relevant modifications or changes announced on this Website at any time. The Company reserves the right to modify or change the contents of this Privacy Policy at any time. By using this Website or continuing to use it after any modifications or changes, you indicate that you have read, understood, and agreed to accept this Policy, its modifications, or changes, and consent to the collection, processing, and utilization of your personal information in accordance with this Policy. If you are unable to comply with or do not agree with the contents of this Policy, or if your country or region excludes all or part of the contents of this Policy, please immediately stop using the "Le Bal de Paris" Official Website.<br>
                            <br>
                            Furthermore, unless explicitly authorized by you, the Company will never provide your personal information to any third party.<br>
                            <br>
                            If you are under the age of twenty or lack full legal capacity, in addition to meeting the above requirements, please have your legal guardian or custodian read, understand, and agree to all the contents of this Policy and its subsequent modifications or changes before using or continuing to use this Website; otherwise, please stop using it immediately. When you use or continue to use the "Le Bal de Paris" Official Website, it is deemed that your legal guardian or custodian has read, understood, and agreed to accept all the contents of this Policy and its subsequent modifications or changes.<br>
                            <br>
                            Categories of Personal Data: When you use the services of this Website, the Company may ask you to provide the following categories of personal data:<br>
                            <ol>
                                <li>Identifiers (such as: name, address, email address, mobile phone number),</li>
                                <li>Financial information (such as: credit card or debit card number, bank account number and name),</li>
                                <li>Lifestyle preferences (such as: types of consumer goods and service details, personal consumption patterns),</li>
                                <li>Goods or services obtained by the data subject (such as: relevant details of goods or services),</li>
                                <li>Financial transactions (such as: amounts paid or received, payment methods, transaction records),</li>
                                <li>Business activities of the data subject (such as: types of businesses, goods or services provided or used, business contracts),</li>
                                <li>Agreements or contracts (such as: agreements or contracts regarding transactions, business, legal, or others, agency),</li>
                                <li>Unclassified data (such as: dining preferences, unclassified files, reports), and any other data that can directly or indirectly identify individuals, etc.</li>
                            </ol>
                            <br>
                            However, please note that when you make transactions on the "Le Bal de Paris" Official Website, the credit card number, expiration date, and authorization code you enter are stored only on your personal mobile device, and this Website will not collect, process, or utilize the personal information mentioned above.<br>
                            <br>
                            Utilization of Personal Data: When you register personal data on the "Le Bal de Paris" Official Website for relevant transactions, it is deemed that you have agreed to the Company's collection, processing, and utilization of your personal data, regardless of whether the transaction is completed. The personal data you provide, including but not limited to name, email address, mobile phone number, and invoice delivery address, will be properly stored on this Website. Credit card information or bank information collected is processed using secure SSL encryption protocols to ensure your privacy.<br>
                            <br>
                            Purposes of Utilization: Conducting marketing activities, managing and servicing orders and exhibitions, e-commerce services and surveys, statistical analysis, and research.<br>
                            <br>
                            Impact of Not Providing Personal Data: You are free to choose whether to provide the above-mentioned personal data. However, if you do not agree to provide it, you will not be able to enjoy the services provided by the "Le Bal de Paris" Official Website. When purchasing services or products provided by this Website, the Company may send you purchase activities on the "Le Bal de Paris" Official Website via email, including but not limited to consumer accounts, contact information or inquiries, and records of purchase discounts. You can choose whether to receive emails. However, if you do not agree to receive them, you will not be able to enjoy the services provided by the "Le Bal de Paris" Official Website.<br>
                            <br>
                            Region of Personal Data Utilization: The region of personal data utilization includes the personal data host of the Company, the location of relevant network server hosts, and the region where the Company/"Le Bal de Paris" Official Website provides services or distributes products or conducts marketing activities.<br>
                            <br>
                            Your Rights Regarding Personal Data: Without violating relevant laws, after the Company confirms that the personal data belongs to you, you may contact the Company/ "Le Bal de Paris" Official Website or send your request to the Company's email mailbox to exercise the following rights: (1) inquire, read, supplement, or correct your personal data, (2) stop collecting, processing, or utilizing your personal data, (3) delete your personal data, (4) provide you with a copy of your personal data, (5) stop sending advertisements and marketing activities related to the "Le Bal de Paris" Official Website. However, please note that if you have already provided your personal data to merchants or transaction parties in actual transactions, except as otherwise provided by law, you should exercise the above-mentioned rights with respect to such merchants or transaction parties.<br>
                            <br>
                            Except for the following circumstances, the Company will not sell, transfer, or disclose users' personal data to any third party without authorization: (1) When the Company jointly organizes or cooperates with other third parties in activities, your data will be shared or transmitted to provide the products or services you requested. However, the "Le Bal de Paris" Official Website will clearly inform you on the relevant activity page that your personal data will be provided to third parties jointly organized or cooperated in the activity. By choosing to participate in the activity, you understand and agree to provide the personal data for the purpose of the activity to the third parties jointly organized or cooperated. (2) The Company/"Le Bal de Paris" Official Website will provide your data as required by law, court orders, administrative investigations, or other legal procedures. However, in this case, the data will only be provided to the investigating authorities and will be protected by the relevant laws of the Republic of China. (3) To investigate and prevent illegal activities, suspected fraud, or situations that may pose a potential threat to personal safety. (4) In the event of a violation of the terms of service of the Company/"Le Bal de Paris" Official Website or if the Website or the Company is acquired or merged by another company, we have the right to transfer your personal data to that company. In such a case, the Company will notify you in advance before your personal data is transferred and a different privacy policy applies.<br>
                            <br>
                            The Company/"Le Bal de Paris" Official Website reserves the right to revise this Policy based on actual circumstances. When there are significant changes to this Policy, notices will be posted on this Website, and you are obligated to be aware of whether this Policy has been updated or revised at any time. If you do not agree with the modified content, you may choose to withdraw from the relevant services at any time and immediately deactivate the services of the "Le Bal de Paris" Official Website. If you continue to use this Website, it indicates that you agree to the modified content of this Policy.
                        </p>
                    </div>
                </div>
                <div class="modal__footer" data-custom-close="modal-privacy">Finish</div>
            </div>
        </div>
    </div>

    <script src="/paris_en/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="/paris_en/js/plugins/jquery-ui.js"></script>
    <script src="/paris_en/js/plugins/select2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <script src="/paris_en/js/plugins/micromodal.min.js"></script>
    <script src="/paris_en/js/main.js?231003"></script>
    <script src="/paris_en/js/phone_code.js"></script>
    <script src="/paris_en/js/booking_pay.js?240327"></script>
</body>
</html>