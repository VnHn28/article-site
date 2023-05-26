@push('bottom')
    <script src="/vendor/ckeditor/circlelinks_ckeditor_template.js"></script>
    <script type="text/javascript">
        // NOTE: 動態帶入該編輯器區名稱變數
        replaceTextarea('textarea_{{$name}}');
    </script>
@endpush
<div class='form-group' id='form-group-{{$name}}' style="{{@$form['style']}}">
    <div class="col-sm-2" style="display: flex; flex-direction: column; align-items: flex-end; ">
        <label class='control-label'>
            {{$form['label']}}
        </label>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="margin-top: 0.5rem; margin-bottom: 0.5rem;">
                <img src="/img/crudbooster/ckeditor/leftImageRightNormal.png" width="90">
                <br>
                新增模組
            </button>
            <ul class="dropdown-menu dropdown-menu-right template-add-btn-group" role="menu" style="max-height: 478px; overflow-y: scroll;">
                <!-- 自動依程式產生 ./circlelinks_ckeditor_template.js
                <li class="template-add-btn">
                    <a href="#"><img src="./normal.png" width="115">normal</a>
                </li> -->
            </ul>
        </div>
    </div>    

    <div class="{{$col_width?:'col-sm-10'}}">
        <textarea id='textarea_{{$name}}' id="{{$name}}"
                  {{$required}} {{$readonly}} {{$disabled}} name="{{$form['name']}}" class='form-control'
                  rows='5' cols="80">{{ $value }}</textarea>
        <div class="text-danger">{{ $errors->first($name) }}</div>
        <p class='help-block'>{{ @$form['help'] }}</p>
    </div>
</div>

