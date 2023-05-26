/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	  config.language = ''; // 留空字串的話會字動抓使用者本地端語言
	// config.uiColor = '#AADC6E';
    config.startupFocus = true; // 編輯中的編輯位置
    // config.startupOutlineBlocks = true; // 編輯中顯示編輯區塊元素
    // config.startupShowBorders = true; // 編輯中顯示邊框
    config.enterMode = CKEDITOR.ENTER_BR; //編輯器中 enter 產生的標籤
    config.shiftEnterMode = CKEDITOR.ENTER_P; //編輯器中 shift + enter 產生的標籤
    config.fillEmptyBlocks = false; // 編輯器中的空白是否要以 &nbsp; 填充
    config.basicEntities = false; // FIX：插入模組後的&nbsp; / 編輯器是否轉義文檔中的基本 HTML 實體，包括： &nbsp; / &gt; / &lt; / &amp;
    config.fontSize_sizes = '12/12px;13/13px;15/15px;16/16px;18/18px;20/20px;22/22px;24/24px;36/36px;'; // 調整字體大小選項
    // config.font_names = 'Arial;Arial Black;Times New Roman;新細明體;細明體;標楷體;微軟正黑體'; // 調整字型選項
    config.contentsCss = ['../../../css/magz.css']; // 所需要添加的CSS檔 在此添加 可使用相對路徑和網站的絕對路徑
    config.bodyClass = 'article-editor';
    config.allowedContent = true; // 允許工具列沒開放的功能按鈕，原始碼貼入後可以正常運作 = 關閉 CKEDITOR.editor.filter
    config.extraPlugins = 'image2,embed,autoembed'; // 添加額外的插件
    // config.removePlugins = 'magicline';  // 移除插件
    config.embed_provider = '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}';
    // config.templates_replaceContent = false; // 當使用內容範本時，預設不勾選 替代實際內容
    config.filebrowserWindowHeight = '50%';
    // 設定 https://ckeditor.com/latest/samples/toolbarconfigurator/
    config.toolbarGroups = [
      { name: 'document', groups: [ 'mode', 'document', 'doctools' ] }, // 原始碼、文件(儲存、預覽)、範本
      { name: 'clipboard', groups: [ 'clipboard', 'undo' ] }, // 剪貼、復原
      { name: 'basicstyles', groups: [ 'cleanup', 'basicstyles' ] }, // 移除格式、字形
      // { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] }, // 尋找、取代、全選、拼字檢查
      // { name: 'forms', groups: [ 'forms' ] }, // 表單(表格、選取方塊、文字欄位、文字區域、按鈕)
      { name: 'paragraph', groups: [ 'list', 'indent', 'align', 'paragraph' ] }, // 清單、縮排、對齊
      { name: 'colors', groups: [ 'colors' ] }, // 文字顏色、背景色
      { name: 'styles', groups: [ 'styles' ] }, // 文字樣式、字型、大小
      { name: 'links', groups: [ 'links' ] }, // 連結、錨點
      // { name: 'insert', groups: [ 'insert' ] }, // 嵌入(圖片、影片、iframe、表格、水平線、特殊符號、表情符號、換頁符號)
      { name: 'tools', groups: [ 'tools' ] }, // 最大化、顯示編輯器內區塊
      // { name: 'others', groups: [ 'others' ] },
      // { name: 'about', groups: [ 'about' ] } // 關於
	  ];

	  config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Image,Flash,Table,HorizontalRule,PageBreak,Iframe,Styles,Font,Format,ShowBlocks,Maximize,About,SpecialChar,Smiley';
};