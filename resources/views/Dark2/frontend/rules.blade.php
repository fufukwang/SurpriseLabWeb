<!DOCTYPE html>
<head>
    @include('Dark2.frontend._header')
</head>
<body>
    <div class="wrap">
       
        <!-- mobile menu -->
        @include('Dark2.frontend._menu',['key'=>'rules'])
     
      
        <!-- header -->
        
        <div class="header-contaier clearfix">
            @include('Dark2.frontend._m_menu',['key'=>'rules'])
        </div>
       
        <!-- landing cut -->
        <!-- first cut -->
        
        <div class="section-02">
            <div class="main-container">
                <div class="main-box rules-box">
                    <h1>
                        預售規則
                    </h1>
                    <p>
                        1. 若06/015前售出3000張以上預售票卷，即開啟無光晚餐2快閃計畫。若未達預售目標，則不開啟快閃計畫，且 將於 06/20 前全額退費。
                    </p>
                    <p>
                        2. 預售成功後，前500名購買者將於06/16收到劃位序號，享最優先劃位。
                    </p>
                    <p>
                        3. 第501位後的購買者，將於06/20收到劃位序號，並可至線上系統劃位。
                    </p>
                    <p>
                        4. 劃位序號將以Email寄送。若Email資料有誤，則會另外以電話確認。
                    </p>
                    <p>
                        5. 劃位序號於此階段快閃計劃，即表訂的07/04-08/31為止，皆可劃位。
                    </p>
                    <p>
                        6. 若預售情況踴躍，則會視情況增加延長快閃時間，相關事項則會另外通知。

                    </p>
                    <p>
                        7. 06/15前需退費的購買者，請透過Contact與我們聯繫，可享全額退費。
                    </p>
                    <p>
                        8. 06/16起至活動結束前，若還未劃位且需退費的購買者，請透過Contact與我們聯繫。扣除5%金流手續費後， 可享全額退費。
                    </p>
                    <p>
                        9. 若劃位序號已兌換，則依照「線上預付、退費、轉讓機制」執行。相關規則會在06/16發布。
                    </p>
                    <!--p>
                        10.預售套票人數不可拆開使用。例如:購買四人套票者，無法兩兩分開劃位。
                    </p-->
                    <p>
                        10.為確保體驗品質，預售套票僅提供雙數套票。
                    </p>
                    <p>
                        11.為確保提供最好的無光體驗，確切劃位與啟動日期會依情況微調，驚喜製造團隊保留最後決定權利，若有更動 ，會立即通知所有購買者，以確保大家權利。
                    </p>
                    <a href="pre-order.html">
                        <div class="btn btn-standard landing-btn">
                            前往預售
                        </div>
                    </a>
                </div>
            </div>
        </div>   
        @include('Dark2.frontend._footer')
    </div>
</body>
</html>