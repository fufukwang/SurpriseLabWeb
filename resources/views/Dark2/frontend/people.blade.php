<!DOCTYPE html>
<head>
    @include('Dark2.frontend._header')
</head>
<body>
    <div class="wrap">
       
        <!-- mobile menu -->
        @include('Dark2.frontend._menu',['key'=>'people'])
     
      
        <!-- header -->
        
        <div class="header-contaier clearfix">
            @include('Dark2.frontend._m_menu',['key'=>'people'])
        </div>
       
        <!-- first cut -->
         
        <div class="section-02 people-section">
           
            <div class="people-nav">
                <ul>
                    <li class="after-arrow">
                        <div>1</div>
                        <span># 無光晚餐</span>
                    </li>
                    <li class="after-arrow">
                        <div>2</div>
                        <span style="margin-top:-10px;">
                            Instagram 上傳照片<br>
                            <span class="hidden-xs">&nbsp;&nbsp;</span>同步分享至Facebook
                        </span>
                    </li>
                    <li>
                        <div>3</div>
                        <span>
                            分享屬於自己的無光體驗
                        </span>
                    </li>
                </ul>
            </div>
           
           <div style="min-height:460px;">
            
           </div>
            
            
        </div>
        
        <!-- footer -->
        @include('Dark2.frontend._footer')


    </div>
</body>
</html>