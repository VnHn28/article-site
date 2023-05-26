/*
 Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
CKEDITOR.addTemplates('default', {
  imagesPath: CKEDITOR.getUrl(
    CKEDITOR.plugins.getPath('templates') + 'templates/images/'
  ),
  templates: [
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
              '<div class="col-12 d-flex editor-block">' +
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
})
