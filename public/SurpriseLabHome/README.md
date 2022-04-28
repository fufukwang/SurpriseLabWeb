# Surprise Lab 官方網站
* 斷點：`1199.98px`

## ■ 覆寫 Bootstrap 設定
### 全站使用 `.container-xl` 做為容器，並提供四種容器寬度：
* 1199.98px 以下：100%
* 1200px 以上：1140px
* 1440px 以上：1320px
* 1680px 以上：1640px


## ■ 本機端
* 元件 http://127.0.0.1:5500/examples/components.html
* 首頁 http://127.0.0.1:5500/tw/index.html
* 近期體驗 http://127.0.0.1:5500/tw/ticket.html
* 認識團隊 http://127.0.0.1:5500/tw/team.html
* 專案計畫 http://127.0.0.1:5500/tw/project.html
* 專案 http://127.0.0.1:5500/tw/project/badassonly.html
* 隱私權政策 http://127.0.0.1:5500/tw/terms.html



## ■ 專案結構
```
surpriselab/
    |─ assets/
    |   |─ fonts/
    |   |─ images/
    |   |   |─ general (共用圖片)
    |   |   
    |   |─ webps/ (結構與 images 相同)
    |
    |─ resources/
    |   |─ css/
    |   |   |─ plugins/
    |   |   |   |- icommon/
    |   |   |   |   |- style.css (iconfont 檔案)
    |   |   |   |
    |   |   |─ mixin.scss (覆寫 Bootstrap 設定)
    |   |   |─ variable.scss (共用變數)
    |   |   |─ style.scss (共用樣式)
    |   |
    |   |─ js/
    |   |   |─ plugins/
    |   
    |─ tw/
    |   |─ index.html
    |   |─ ticket.html
    |   |─ team.html
    |   |─ project.html
    |   |─ project/
    |   |   |─ [name].html
    |   |   |─ ...
    |   |
    |
    |- examples/
    |   |─ components.html
    |   |─ introduction_template.html
    |
```


## ■ 檔案結構
除了 INTRODUCTION 頁面的 H1 是在 HERO 中，其他頁面都照以下結構放置：

```html
<html>
    <head></head>
    <body>

        <nav></nav>

        <main>
            <h1></h1>

            <section></section>
            <section></section>
            <section></section>
        </main>

        <aside></aside>

        <footer></footer>

        <script></script>
        <script></script>
    </body>
</html>
```

## ■ main.js 效果
* `HERO BANNER`：
    * 當捲軸距離小於 `.js-hero-banner` 區塊 1.5 倍高度，`.background-fixed` hero 圖路徑 `--hero-bg-path` 為 `data-banner` 值。
    * 當捲軸距離大於 `.js-hero-banner` 區塊 1.5 倍高度，`.background-fixed` hero 圖路徑 `--hero-bg-path` 為 `none`。
* `NAV`：捲軸向下捲動，隱藏 PC Nav。（全站使用）
* `NAV`：當捲軸捲動進入 `.js-nav-target` 區塊後，變換 Nav 主題顏色。（TEAM 頁面使用）
* `FIXED BUTTON`：當捲軸捲動距離小於 `.js-fixed-btn-target` 區塊的一半高度時，隱藏 Fixed Button。（INTRODUCTION 頁面使用）
* `CTA`：當捲軸捲動進入 Footer，隱藏 Mobile CTA Button。（全站使用）
* `MENU`：Mobile 選單按鈕，控制選單顯示。（全站使用）
* `VIDEO`：點擊播放按鈕才會載入 `影片 iframe`。（INTRODUCTION 頁面使用）
    * `VIDEO MODAL` 附加效果：點擊關閉 Modal 的按鈕，移除此 Modal 的 `影片 iframe`。
* `ANIMATION`：Section Loading AOS 動畫。（全站匯入，404、PROJECT、TERMS 未使用）
* `ANIMATION`：Page Loading 動畫。（全站使用）
* `LOADING RESOURCE`：載入 Logo svg 檔案。（全站使用）


## ■ iconfont 教學

### 法一：用 tag + class
* 使用 `<i></i>` 標籤
* 去 `resources/css/plugins/icommon/style.css` 尋找 class 名稱

```html
<i class="icon-info">
```

### 法二：用偽元素
* 套用字型 `font-family: 'icomoon' !important;`
* 去 `resources/css/plugins/icommon/style.css` 尋找代碼

```css
.icon-wrap {
    font-family: 'icomoon' !important;
    content: "\e908";
}
```


## ■ 糗球 Loading 教學
* `<html class="js">`
* `<body class="loading">`

```html
<!-- Loading Style -->
<link rel="stylesheet" type="text/css" href="/resources/css/plugins/imagesloaded/loading.css"/>

<!-- Loading Animation JS -->
<script src="/resources/js/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>
```

### main.js
```javascript
/* Loading animation */
document.body.classList.add('render');
setTimeout(function(){
    // Image Loading
    imagesLoaded(document.body, function(){
        document.body.classList.remove('loading');
    })
}, 1000);
```