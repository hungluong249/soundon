<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detailpostnandproduct.css">
<input type="text" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" placeholder="" class="form-control hidden" id="csrf_sitecom_token">
<input type="text" name="page_languages" value='<?php echo json_encode($page_languages); ?>' placeholder="" class="form-control hidden" id="page_languages">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật
            <small>
                Bài Viết
            </small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-body">
                        <?php
                        echo form_open_multipart('', array('class' => 'form-horizontal'));
                        ?>
                        <?php
                            $a_language = '';
                            foreach ($page_languages as $k => $vals){
                                $detail['data_lang_'.$k] = json_decode($detail['data_lang_'.$k],true); 
                                $multiple_language[$k] = '';
                            }
                            foreach ($templates as $key => $value) {
                                $required = '';
                                $required_span = '';
                                // $required_focus = '';
                                if(isset($value['required'])){
                                    $required = 'required';
                                    $required_span = '<span class="help-block hidden">' .$value['required']. '</span>';
                                    // $required_focus = 'required_focus';
                                }
                                if($value['check_language'] == 'true'){
                                    switch ($value['type']) {
                                        case 'textarea':
                                            $a_language .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title']['vi'] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '</br><textarea name="' . $key . '" value="" class="col-xs-12 ' . (isset($value['check_multiple']) ? 'tinymce-area' : '') . '" rows="5" id="' .$key. '">' .$detail['data'][$key]. '</textarea>' .$required_span. '</div>';
                                            break;
                                        
                                        case 'radio':
                                            $radio = '';
                                            foreach ($value['choice']['vi'] as $k => $val) {
                                               $radio .= '<input type="radio" name="' . $key . '" value="' . $k . '" ' .(($detail['data'][$key] == $k) ? 'checked' : ''). ' /><span style="margin-right:10px;padding-left:5px;">' . $val . '</span>';
                                            }
                                            $a_language .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title']['vi'] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '</br>' . $radio.$required_span .'</div>';
                                            break;
                                        
                                        case 'checkbox':
                                            $checkbox = '';
                                            foreach ($value['choice']['vi'] as $k => $val) {
                                               $checkbox .= '<input type="checkbox" name="' . $key . '[]" value="' . $k . '" ' .(in_array($k,$detail['data'][$key]) ? 'checked' : ''). ' /><span style="margin-right:10px;padding-left:5px;">' . $val . '</span>';
                                            }
                                            $a_language .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title']['vi'] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '</br>' . $checkbox.$required_span .'</div>';
                                            break;
                                        
                                        case 'select':
                                            $select = '<option value="">Click để chọn</option>';
                                            if(isset($value['check_multiple'])){
                                                foreach ($value['choice']['vi'] as $k => $val) {
                                                    $select .= '<option value="' . $k . '" ' .(in_array($k,$detail['data'][$key]) ? 'selected' : ''). '>' . $val . '</option>';
                                                }
                                            }else{
                                                foreach ($value['choice']['vi'] as $k => $val) {
                                                    $select .= '<option value="' . $k . '" ' .(($detail['data'][$key] == $k) ? 'selected' : ''). '>' . $val . '</option>';
                                                }
                                            }
                                            $a_language .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title']['vi'] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '<select name="' .$key.(isset($value['check_multiple']) ? '[]" multiple' : '"'). ' class="form-control" >' . $select . '</select>' .$required_span. '</div>';
                                            break;
                                        case 'date':
                                            $a_language .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title']['vi'] . '</label><div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input class="form-control" name="' . $key . '" placeholder="' .  $value['description'] . '" id="realDPX-min" type="text" value="' .$detail['data'][$key]. '"></div>' .$required_span. '</div>';
                                            break;
                                        case 'file':
                                            $a_language .='<div class="form-group col-xs-12"><label for="image_shared">' . $value['title']['vi'] . '( hình ảnh đang dùng)</label><br>';
                                            if(isset($value['check_multiple'])){
                                                if(!empty($detail['data'][$key])){
                                                    foreach ($detail['data'][$key] as $k => $val) {
                                                        $a_language .= '<div class="row_'.$k.'" style="width:250px;padding-right:5px;float:left;position:relative;"><img src="' .base_url('assets/upload/'. $controller .'/'.$detail['slug'].'/'. $val). '" width=100% ><i class="fa-2x fa fa-times" style="cursor: pointer; position: absolute;color:red; top:0px;right: 10px;" onclick=\'remove_image("' .$controller.'","' .$detail['id']. '","' .$val. '","' .$k. '","' .$key. '")\'></i></div>';
                                                    }
                                                }else{
                                                    $a_language .='<span class="no_image" style="color:red">Hiện không có hình ảnh nào</span>';
                                                }
                                            }else{
                                                if(!empty($detail['data'][$key])){
                                                    $a_language .= '<img src="' .base_url('assets/upload/'. $controller .'/'.$detail['slug'].'/'. $detail['data'][$key]). '" width=250px style="padding-right:5px;">';
                                                }else{
                                                    $a_language .='<span class="no_image" style="color:red">Hiện không có hình ảnh nào</span>';
                                                }
                                                
                                            }
                                            $a_language .= '<br></div><div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title']['vi'] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '<input type="' . $value['type'] .'" name="' . $key.(isset($value['check_multiple']) ? '[]' : ''). '" class="form-control" placeholder="' .  $value['description'] . '"  ' . (isset($value['check_multiple']) ? 'multiple' : '') . '/>' .$required_span. '</div>';
                                            break;
                                        default:
                                            $a_language .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title']['vi'] . '</label><input type="' . $value['type'] .'" name="' . $key . '" class="form-control" value="' .$detail['data'][$key]. '" placeholder="' .  $value['description'] . '" ' . (($key == 'slug_shared') ? 'readonly' : '') . '/>' .$required_span. '</div>';
                                            break;
                                    }
                                }else{
                                    foreach ($page_languages as $k => $vals){
                                        switch ($value['type']) {
                                            case 'textarea':
                                                $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="">' . $value['title'][$k] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '</br><textarea name="' . $key.'_'.$k . '" value="" class="col-xs-12 ' . (isset($value['check_multiple']) ? 'tinymce-area' : '') . '" rows="5">' .$detail['data_lang_'.$k][$key]. '</textarea>' .$required_span. '</div>';
                                                break;
                                            case 'date':
                                                $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title'][$k] . '</label><div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input class="form-control" name="' . $key.'_'.$k . '" placeholder="' .  $value['description'] . '" id="realDPX-min" type="text" value="' .$detail['data_lang_'.$k][$key]. '" ></div>' .$required_span. '</div>';
                                                break;
                                            case 'text':
                                                $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title'][$k] . '</label><input type="' . $value['type'] .'" name="' . $key.'_'.$k . '" value="' .$detail['data_lang_'.$k][$key]. '" class="form-control" placeholder="' .  $value['description'] . '" ' . (($key == 'slug_shared') ? 'readonly' : '') . '/>' .$required_span. '</div>';
                                                break;
                                            case 'password':
                                                $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title'][$k] . '</label><input type="' . $value['type'] .'" name="' . $key.'_'.$k . '" class="form-control" placeholder="' .  $value['description'] . '" ' . (($key == 'slug_shared') ? 'readonly' : '') . '/>' .$required_span. '</div>';
                                                break;
                                        }
                                    }
                                }
                            }
                        ?>
                        <div class="col-xs-12">
                            <h4 class="box-title">Basic Information</h4>
                        </div>
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="image_shared">Hình ảnh( hình ảnh đang dùng)</label>
                            <br>
                            <img src="<?php echo base_url('assets/upload/'. $controller .'/'. $detail['slug'].'/'. $detail['image']); ?>" width=250px>
                            <br>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Hình ảnh', 'file');
                            echo form_error('image_shared');
                            echo form_upload('image_shared', set_value('image_shared'), 'class="form-control"');
                            ?>
                            <br>
                        </div>
                        <div class="form-group col-xs-12 required">
                            <?php
                            echo form_label('Slug', 'text');
                            echo form_input('slug_shared', $detail['slug'], 'class="form-control" id="slug_shared" readonly');
                            ?>
                            <span class="help-block hidden"><?php echo $templates_all['slug_shared']['required']; ?></span>
                        </div>

                        <div class="form-group col-xs-12 required">
                            <?php
                            echo form_label('Danh mục', 'select');
                            ?>
                            <select name="parent_id_shared" class="form-control">
                                <option value="">Chọn danh mục</option>
                                <?php build_new_category($post_category, 0, $detail['post_category_id'], '') ?>
                            </select>
                            <span class="help-block hidden"><?php echo $templates_all['slug_shared']['required']; ?></span>
                        </div>
                        <?php echo $a_language; ?>
                        <div>
                            <div class="form-group col-xs-12">
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <?php $i = 0; ?>
                                    <?php foreach ($page_languages as $key => $value): ?>
                                        <li role="presentation" class="<?php echo ($i == 0)? 'active' : '' ?>">
                                            <a href="#<?php echo $key ?>" aria-controls="<?php echo $key ?>" role="tab" data-toggle="tab">
                                                <span class="badge"><?php echo $i + 1 ?></span> <?php echo $value ?>
                                            </a>
                                        </li>
                                    <?php $i++; ?>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <hr>
                            <div class="tab-content">
                                <?php $i = 0; ?>
                                <?php foreach ($page_languages as $key => $value): ?>
                                    <div role="tabpanel" class="tab-pane <?php echo ($i == 0)? 'active' : '' ?>" id="<?php echo $key ?>">
                                            <div class="form-group col-xs-12 required">
                                                <?php
                                                    echo form_label($templates_all['title']['title'][$key], 'text');
                                                    echo form_input('title_'. $key, trim($detail['title_'. $key]), 'class="form-control" id="title_'.$key.'" onchange="title_change(this)"');
                                                ?>
                                                <span class="help-block hidden"><?php echo $templates_all['title']['required']; ?></span>
                                            </div>
                                            <div class="form-group col-xs-12 <?php echo isset($templates_all['description']['required']) ? 'required' : '' ;?>">
                                                <?php
                                                    echo form_label($templates_all['description']['title'][$key], 'textarea');
                                                    echo form_textarea('description_'. $key, trim($detail['description_'. $key]), 'class="form-control" rows="5"');
                                                ?>
                                                <?php echo isset($templates_all['description']['required']) ? '<span class="help-block hidden">' .$templates_all['description']['required']. '</span>' : '' ;?>
                                            </div>
                                            <div class="form-group col-xs-12 <?php echo isset($templates_all['content']['required']) ? 'required' : '' ;?>">
                                                <?php
                                                    echo form_label($templates_all['content']['title'][$key], 'textarea');
                                                    echo form_textarea('content_'. $key, trim($detail['content_'. $key]), 'class="tinymce-area form-control" rows="5"');
                                                ?>
                                                <?php echo isset($templates_all['content']['required']) ? '<span class="help-block hidden">' .$templates_all['content']['required']. '</span>' : '' ;?>
                                            </div>
                                            <?php echo $multiple_language[$key];?>
                                    </div>
                                <?php $i++; ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div id="myModal" class="modal">
                            <img class="modal-content" id="img01">
                        </div>
                        <?php echo form_close(); ?>
                        <span onclick="submit_shared(this)" id="submid" class="btn btn-default" id="submit_shared" data-dismiss="modal" >Xác nhận</span>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo site_url('assets/js/admin/') ?>showmodalimg.js"></script>
<script type="text/javascript">
    switch(window.location.origin){
        case 'http://diamondtour.vn':
            var HOSTNAME = 'http://diamondtour.vn/';
            break;
        default:
            var HOSTNAME = 'http://localhost/soundon/';
    }
    if(document.querySelectorAll('[id="realDPX-min"]').length > 0){
        for (var m = 0; m < document.querySelectorAll('[id="realDPX-min"]').length; m++) {
            var $min = document.querySelectorAll('[id="realDPX-min"]')[m];
            $min.DatePickerX.init({
                mondayFirst: true,
                format: 'dd/mm/yyyy',
                minDate    : new Date(1900, 8, 13),
                maxDate    : new Date(9999, 8, 13),
            });
        }
    }
    {
        "use strict";
        tinymce.init({
            selector: ".tinymce-area",
            theme: "modern",
            block_formats: 'Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3',
            height: 300,
            relative_urls: false,
            remove_script_host: false,
            // forced_root_block : false,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: "Bold text", inline: "b"},
                {title: "Red text", inline: "span", styles: {color: "#ff0000"}},
                {title: "Red header", block: "h1", styles: {color: "#ff0000"}},
                {title: "Example 1", inline: "span", classes: "example1"},
                {title: "Example 2", inline: "span", classes: "example2"},
                {title: "Table styles"},
                {title: "Table row 1", selector: "tr", classes: "tablerow1"}
            ],
            external_filemanager_path: HOSTNAME + "filemanager/",
            filemanager_title: "Responsive Filemanager",
            external_plugins: {"filemanager": HOSTNAME + "filemanager/plugin.min.js"}
        });
    }
    function to_slug(str,space="-"){
        str = str.toLowerCase();

        str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
        str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
        str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
        str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
        str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
        str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
        str = str.replace(/(đ)/g, 'd');

        str = str.replace(/([^0-9a-z-\s])/g, '');

        str = str.replace(/(\s+)/g, space);

        str = str.replace(/^-+/g, '');

        str = str.replace(/-+$/g, '');

        // return
        return str;
    }
    function title_change(ev){
        document.querySelector('[name="slug_shared"]').value = to_slug(ev.value);
        if(ev.value.trim() != ''){
            document.querySelector('[name="slug_shared"]').closest('.required').querySelector('span.help-block').classList.add("hidden");
            document.querySelector('[name="slug_shared"]').closest('.required').classList.remove("has-error");
        }else{
            document.querySelector('[name="slug_shared"]').closest('.required').classList.add("has-error");
            document.querySelector('[name="slug_shared"]').closest('.required').querySelector('span.help-block').classList.remove("hidden");
        }
    }

    function submit_shared(ev){
        let [html, count, id_parent] = ['', 0, ''];
        for (var i = 0; i < document.querySelectorAll('div.form-group.required').length; i++) {
            let type = document.querySelectorAll('div.form-group.required > label')[i].getAttribute('for');
            if(type == 'radio' || type == 'checkbox'){
                if(document.querySelectorAll('div.form-group.required')[i].querySelectorAll('input:checked').length == 0){
                    document.querySelectorAll('div.form-group.required')[i].classList.add("has-error");
                    document.querySelectorAll('div.form-group.required')[i].setAttribute('oninput',`check_validate(this,'${type}')`);
                    document.querySelectorAll('div.form-group.required')[i].querySelector('span').classList.remove("hidden");
                }
            }else if(type == 'textarea' || type == 'select'){
                if(document.querySelectorAll('div.form-group.required')[i].querySelector(type).value == ''){
                    document.querySelectorAll('div.form-group.required')[i].classList.add("has-error");
                    document.querySelectorAll('div.form-group.required')[i].setAttribute('oninput',`check_validate(this,'${type}')`);
                    document.querySelectorAll('div.form-group.required')[i].querySelector('span').classList.remove("hidden");
                }
            }else if(type == 'date'){
                if(document.querySelectorAll('div.form-group.required')[i].querySelector('input').value == ''){
                    document.querySelectorAll('div.form-group.required')[i].classList.add("has-error");
                    document.querySelectorAll('div.form-group.required')[i].querySelector('input').setAttribute('onchange',`check_validate(this,'${type}')`);
                    document.querySelectorAll('div.form-group.required')[i].querySelector('span.help-block').classList.remove("hidden");
                }
            }else if(type == 'text'){
                if(document.querySelectorAll('div.form-group.required')[i].querySelector('input').value == ''){
                    document.querySelectorAll('div.form-group.required')[i].classList.add("has-error");
                    document.querySelectorAll('div.form-group.required')[i].setAttribute('oninput',`check_validate(this,'${type}')`);
                    document.querySelectorAll('div.form-group.required')[i].querySelector('span.help-block').classList.remove("hidden");
                }
            }
            else if(type == 'file'){
                if(document.querySelectorAll('div.form-group.required')[i].querySelector('input').files.length == 0 && document.querySelectorAll('div.form-group.required')[i].previousElementSibling.querySelector('.no_image') != null){
                    document.querySelectorAll('div.form-group.required')[i].classList.add("has-error");
                    document.querySelectorAll('div.form-group.required')[i].setAttribute('oninput',`check_validate(this,'${type}')`);
                    document.querySelectorAll('div.form-group.required')[i].querySelector('span.help-block').classList.remove("hidden");
                }
            }
        }

        //check title required if is require => focus
        if(document.querySelectorAll(`.form-horizontal .has-error`).length > 0){
            let [type, tag] = [document.querySelectorAll('div.form-group.has-error')[0].querySelector('label').getAttribute('for'), ''];
            if(type == 'radio' || type == 'checkbox' || type == 'date' || type == 'text' || type == 'file'){
                tag = 'input';
            }else{
                tag = type;
            }
            if(document.querySelectorAll('.form-horizontal .has-error')[0].parentElement.tagName != 'FORM'){
                id_parent = document.querySelectorAll('.form-horizontal .has-error')[0].closest('[class^="tab-pane"]').id;
                document.querySelector(`.form-horizontal .nav.nav-justified li.active a`).setAttribute("aria-expanded","false");
                document.querySelector(`.form-horizontal .nav.nav-justified li.active`).classList.remove("active");
                document.querySelector(`.form-horizontal .tab-content .tab-pane.active`).setAttribute("class","tab-pane fade");
                document.querySelector(`.form-horizontal .has-error`).closest('[class^="tab-pane"]').setAttribute("class","tab-pane fade active in");
                document.querySelector(`.form-horizontal a[href="#${id_parent}"]`).setAttribute("aria-expanded","true");
                document.querySelector(`.form-horizontal a[href="#${id_parent}"]`).parentElement.classList.add("active");
                document.querySelectorAll(`.form-horizontal .has-error ${tag}`)[0].focus();
            }else{
                document.querySelectorAll(`.form-horizontal .has-error ${tag}`)[0].focus();
            }
            return false;
        }else{
            let data = new FormData(document.querySelector('form.form-horizontal'));
            data.append('csrf_sitecom_token', document.getElementById('csrf_sitecom_token').value);
            for (var i = 0; i < document.querySelectorAll('textarea.tinymce-area').length; i++) {
                data.append(document.querySelectorAll('textarea.tinymce-area')[i].id, tinymce.get(document.querySelectorAll('textarea.tinymce-area')[i].id).getContent({format:'html'}));
            }
            var url = window.location.href;
            fetch(url,{method: "POST",body: data}
            ).then(
                response => response.json()
            ).then(
                html => {
                    if(html.status == "200"){
                        alert(html.message);
                        if(window.location.pathname.indexOf("/post/edit/") != '-1'){
                            document.getElementById('csrf_sitecom_token').value = html.reponse.csrf_hash;
                        }else{
                            window.location.href=HOSTNAME+"admin/post";
                        }
                    }else{
                        alert(html.message);
                        location.reload();
                    }
                }

            );
        }

    }
    function check_validate(ev,type){
        if(type == 'text'){
            value = (ev.querySelector('input').value == '') ? true : false;
        }else if(type == 'radio' || type == 'checkbox'){
            value = (ev.querySelectorAll('input:checked').length == 0) ? true : false;
        }else if(type == 'date'){
            value = (ev.value == '') ? true : false;
        }else if(type == 'file'){
            value = (ev.querySelectorAll('input').files.length == 0 && ev.previousElementSibling.querySelector('.no_image') != null) ? true : false;
        }else{
            value = (ev.querySelector(type).value) ? true : false;
        }
        if(value){
            ev.closest('.required').classList.add("has-error");
            ev.closest('.required').querySelector('span.help-block').classList.remove("hidden");
        }else{
            ev.closest('.required').querySelector('span.help-block').classList.add("hidden");
            ev.closest('.required').classList.remove("has-error");
        }
    }
    function remove_image(controller, id, image, k, key){
        if(confirm('Chắc chắn xóa ảnh này?')){
            let datas = new FormData(document.querySelector('form.form-horizontal'));
            datas.append('id', id);
            datas.append('csrf_sitecom_token', document.getElementById('csrf_sitecom_token').value);
            datas.append('image', image);
            datas.append('key', key);
            var url = HOSTNAME + 'admin/' + controller + '/remove_image_multiple';
            fetch(url,{method: "POST",body: datas}
            ).then(
                response => response.json()
            ).then(
                html => {
                    if(html.status == "200"){
                        alert(html.message);
                        $('.row_' + k).fadeOut();
                        document.getElementById('csrf_sitecom_token').value = html.reponse.csrf_hash;
                        
                    }else{
                        alert(html.message);
                        location.reload();
                    }
                }

            );
        }
    }
</script>

<?php 
    function build_new_category($categorie, $parent_id = 0, $detail_id, $char = ''){
        $cate_child = array();
        foreach ($categorie as $key => $item){
            if ($item['parent_id'] == $parent_id){
                $cate_child[] = $item;
                unset($categorie[$key]);
            }
        }
        if ($cate_child){
            foreach ($cate_child as $key => $value){
            ?>
            <option value="<?php echo $value['id'] ?>" <?php echo($value['id'] == $detail_id)? 'selected' : ''?> ><?php echo $char.$value['title'] ?></option>
            <?php build_new_category($categorie, $value['id'], $detail_id, $char.'---|') ?>
            <?php
            }
        }
    }
?>