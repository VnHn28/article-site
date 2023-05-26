  // 模組圖路徑
  const showImgUrl = '/img/crudbooster/ckeditor/'

  // 模組內容 與此區同步修改 public/vendor/ckeditor/plugins/templates/templates/default.js
  const templateData = [
    {
      title: '撰稿編輯',
      image: 'writer.png',
      description: '',
      html: '<div class="row editor-content">' +
              '<div class="control-btnGroup">' +
                '<button class="icon-move remove"></button>' +
              '</div>' +
              '<div class="col-12 editor-block">' +
                '<div class="text-writer">Source: Text-writer</div>' +
              '</div>' +
            '</div>'
    },
    {
      title: '大標+次標+內文',
      image: 'normal.png',
      description: '',
      html: '<div class="row editor-content">' +
              '<div class="control-btnGroup">' +
                '<button class="icon-move remove"></button>' +
              '</div>' +
              '<div class="col-12 editor-block">' +
                '<div class="title">Title Title Title Title Title</div>' +
                '<div class="title-sub">Title-sub Title-sub</div>' +
                '<p class="text">Text text text text text text text.</p>' +
              '</div>' +
            '</div>'
    },
    {
      title: '分隔線',
      image: 'hr.png',
      description: '',
      html: '<div class="row editor-content">' +
              '<div class="control-btnGroup">' +
                '<button class="icon-move remove"></button>' +
              '</div>' +
              '<div class="col-12 editor-block">' +
                '<hr />' +
              '</div>' +
            '</div>'
    },
    {
      title: '左圖右文',
      image: 'leftImageRightNormal.png',
      description: '',
      html: '<div class="row editor-content">' +
              '<div class="control-btnGroup">' +
                '<button class="icon-move remove"></button>' +
              '</div>' +
              '<div class="col-12 d-flex editor-block mobile-reverse">' +
                '<div class="col-md-6 col-12 editor-block-image">' +
                  '<img class="img-fluid" src="/img/crudbooster/ckeditor/templateImgSuggest/imgSuggest_800x450.jpg" alt="img"/>' +
                  '<div class="text-sub">(Image/ text-sub) source: xxxxx</div>' +
                '</div>' +
                '<div class="col-md-6 col-12">' +
                  '<div class="title">Title Title Title Title Title</div>' +
                  '<div class="title-sub">Title-sub Title-sub</div>' +
                  '<p class="text">Text text text text text text text.</p>' +
                '</div>' +
              '</div>' +
            '</div>'
    },
    {
      title: '左文右圖',
      image: 'leftNormalRightImage.png',
      description: '',
      html: '<div class="row editor-content">' +
              '<div class="control-btnGroup">' +
                '<button class="icon-move remove"></button>' +
              '</div>' +
              '<div class="col-12 d-flex editor-block">' +
                '<div class="col-md-6 col-12">' +
                  '<div class="title">Title Title Title Title Title</div>' +
                  '<div class="title-sub">Title-sub Title-sub</div>' +
                  '<p class="text">Text text text text text text text.</p>' +
                '</div>' +
                '<div class="col-md-6 col-12 editor-block-image">' +
                  '<img class="img-fluid" src="/img/crudbooster/ckeditor/templateImgSuggest/imgSuggest_800x450.jpg" alt="img"/>' +
                  '<div class="text-sub">(Image/ text-sub) source: xxxxx</div>' +
                '</div>' +
              '</div>' +
            '</div>'
    },
    {
      title: '置中大圖',
      image: 'image.png',
      description: '',
      html: '<div class="row editor-content">' +
              '<div class="control-btnGroup">' +
                '<button class="icon-move remove"></button>' +
              '</div>' +
              '<div class="col-12 editor-block editor-block-image">' +
                '<img class="img-fluid" src="/img/crudbooster/ckeditor/templateImgSuggest/imgSuggest_1000x600.jpg" alt="img"/>' +
                '<div class="text-sub">(Image/ text-sub) source: xxxxx</div>' +
              '</div>' +
            '</div>'
    },
    {
      title: '置中兩圖',
      image: 'twoImage.png',
      description: '',
      html: '<div class="row editor-content">' +
              '<div class="control-btnGroup">' +
                '<button class="icon-move remove"></button>' +
              '</div>' +
              '<div class="col-12 d-flex editor-block editor-block-twoImage">' +
                '<div class="col-md-6 col-12">' +
                '<img class="img-fluid" src="/img/crudbooster/ckeditor/templateImgSuggest/imgSuggest_800x450.jpg" alt="img"/>' +
                '<div class="text-sub">(Image/ text-sub) source: xxxxx</div>' +
                '</div>' +
                '<div class="col-md-6 col-12">' +
                  '<img class="img-fluid" src="/img/crudbooster/ckeditor/templateImgSuggest/imgSuggest_800x450.jpg" alt="img"/>' +
                  '<div class="text-sub">(Image/ text-sub) source: xxxxx</div>' +
                '</div>' +
              '</div>' +
            '</div>'
    },
    {
      title: '置中影片[連結]',
      image: 'video.png',
      description: '',
      html: '<div class="row editor-content">' +
              '<div class="control-btnGroup">' +
                '<button class="icon-move remove"></button>' +
              '</div>' +
              '<div class="col-12 editor-block">' +
                '<div class="embed-video">' +
                  '<div data-oembed-url="https://www.youtube.com/embed/fstui_cyRa0">' +
                    '<div style="width: 100%; height: 0; position: relative; padding-bottom: 56.25%;">' +
                        '<iframe allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen="" scrolling="no" src="https://www.youtube.com/embed/fstui_cyRa0?rel=0" style="width: 100%; height: 100%; position: absolute; border: 0;" tabindex="-1"></iframe>' +
                    '</div>' +
                  '</div>' +
                '</div>' +
                '<div class="text-sub">(Video/ text-sub) source: xxxxx</div>' +
              '</div>' +
            '</div>'
    },
    {
      title: '引用',
      image: 'quote.png',
      description: '',
      html: '<div class="row editor-content">' +
              '<div class="control-btnGroup">' +
                '<button class="icon-move remove"></button>' +
              '</div>' +
              '<div class="col-12 editor-block editor-block-quote">' +
                '<figure>' +
                  '<blockquote>' +
                    '<p class="text">Text text text text text text text.</p>' +
                    '<figcaption>' +
                      '<cite>Text-author</cite>' +
                    '</figcaption>' +
                  '</blockquote>' +
                '</figure>' +
              '</div>' +
            '</div>'
    },
    {
      title: '推薦',
      image: 'reference.png',
      description: '',
      html: '<div class="row editor-content">' +
              '<div class="control-btnGroup">' +
                '<button class="icon-move remove"></button>' +
              '</div>' +
              '<div class="col-12 editor-block">' +
                '<div class="title title-ref">Reference Title</div>' +
                '<div class="editor-block-ref">' +
                  '<div class="title-sub">Title-sub Title-sub</div>' +
                  '<p class="text">Text text text text text text text.</p>' +
                '</div>' +
                '<div class="editor-block-ref">' +
                  '<div class="title-sub">Title-sub Title-sub</div>' +
                  '<p class="text">Text text text text text text text.</p>' +
                '</div>' +
              '</div>' +
            '</div>'
    }
  ]

  // 新增模組
  function addTemplate(index, textareaID) {
    // console.log(index , templateData[index] , templateData[index].html);

    const thisEditor = CKEDITOR.instances[textareaID]
    const range = thisEditor.createRange();
    
    // 在所見即所得模式 ('wysiwyg' mode) 才允許插入模組
    if (thisEditor.mode == 'wysiwyg') {
      // console.log('getCommonAncestor', thisEditor.getSelection().getCommonAncestor()); // 取得當前選取區域的祖先元素

      thisEditor.insertHtml(templateData[index].html + ' ', range.root)

    // NOTE: 編輯器的模組區塊上下移動功能鈕，第一次要操作的時候，都要點擊好幾次才能成功觸發，但是發現若先按原始碼'source'，再切回來操作便不會發生此狀況，只是若設定每插入一個模組就切換一次'source'，編輯焦點會消失。
    // setTimeout(() => {
    //   thisEditor.setMode( 'source' );
    //   thisEditor.setMode( 'wysiwyg' );
    // }, 100);
    }
  }

  // 重製編輯區域及加入模組功能
  function replaceTextarea(textareaID) {
    //建立新的
    CKEDITOR.replace(textareaID, {
      // 原本的編輯器設定
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token='+ $('meta[name="csrf-token"]').attr('content'),
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='+ $('meta[name="csrf-token"]').attr('content'),
      height:'800',

      on:{
        'instanceReady': function (evtR) {
            console.log('instanceReady');

            const thisEditor = CKEDITOR.instances[textareaID]

            // .template-add-btn-group 內加入所有模組縮圖及名稱
            $.each(templateData, function(index, value){
              // console.log(templateData[index]  , templateData[index].html);
              // href="javascript:void(0);" 阻止 a 預設的跳轉行為
              $('.template-add-btn-group').append(`
                <li class="template-add-btn">
                    <a href="javascript:void(0);" onClick="addTemplate(` + index + `, '` + textareaID + `')">
                      <img src="` + showImgUrl + templateData[index].image + `" width="115">
                        ` + templateData[index].title + `
                    </a>
                </li>
              `)
            });
        },
        'contentDom': function (evtC) {
            console.log('contentDom');
            
            const thisEditor = CKEDITOR.instances[textareaID]

            let editable = thisEditor.editable();
            // console.log(editable);
            editable.attachListener( editable, 'mousedown', function(e) {
              // console.log(e);
              // console.log(e.data); // CKEDITOR.dom.element {$: img.icon-move.move-up.cke_widget_element}
              // console.log(e.data.getTarget()); // CKEDITOR.dom.element {$: img.icon-move.move-up.cke_widget_element}
              // console.log('getChildren', e.data.getTarget().getChildren()); // CKEDITOR.dom.nodeList
              // console.log('getParent', e.data.getTarget().getParent()); // CKEDITOR.dom.element {$: span.cke_widget_wrapper.cke_widget_inline.cke_widget_image.cke_image_nocaption}
              // console.log('getParents', e.data.getTarget().getParents()); // (6) [C…R.dom.element, C…R.dom.element, C…R.dom.element, C…R.dom.element, C…R.dom.element, C…R.dom.element]
              
              const moveAction = e.data.getTarget()
              let moveActionParent = moveAction
              
              // NOTE: 當有巢狀結構時，只刪除裡面操作這層，不影響外面的的模組
              // 迭代每一層父元素，直到找到第一個父元素 class 為 'editor-content' 的元素
              while ( !moveActionParent.hasClass('editor-content') ) {
                // 取得父元素的父元素
                moveActionParent = moveActionParent.getParent();

                // 如果已經沒有父元素了，就退出迴圈
                if (!moveActionParent) {
                  break;
                }
              }
              // console.log(moveActionParent); // 取得目前操作區塊的 'editor-content' (整個父層)
              // console.log('getCommonAncestor', thisEditor.getSelection().getCommonAncestor()); // 取得當前選取區域的祖先元素
              
              // 刪除該操作區塊
              if (moveAction.hasClass('remove')) {
                // console.log('remove', moveActionParents[2].hasClass('editor-content'))               
                // console.log(moveActionParent);
                moveActionParent.remove()
              }
            });
        },
      }
    });
  }