<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detailpostnandproduct.css">
<style type="text/css">
    .color_product >span:before {
        font-family: "Glyphicons Halflings";
        content: "\e114";
        float: left;
        margin-top: -1px;
        font-size: 1.3em;transition: .3s;
    }
    /* Icon when the collapsible content is hidden */
    .color_product >span.collapsed:before {
    content: "\e080";
    font-size: 1.3em;
    margin-top: -1px;transition: .3s;
    }
</style>
<input type="text" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" placeholder="" class="form-control hidden" id="csrf_sitecom_token">
<input type="text" name="page_languages" value='<?php echo json_encode($page_languages); ?>' placeholder="" class="form-control hidden" id="page_languages">
<input type="text" value='<?php echo json_encode($color_product); ?>' placeholder="" class="form-control hidden" id="color_product">
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
                            $detail['data'] = json_decode($detail['data'],true);
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
                                               $radio .= '<input type="radio" name="' . $key . '" value="' . $k . '" ' .(($detail['data'][$key] != "" && $detail['data'][$key] == $k) ? 'checked' : ''). ' /><span style="margin-right:10px;padding-left:5px;">' . $val . '</span>';
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
                                            // case 'radio':
                                            //     $radio = '';
                                            //     foreach ($value['choice'] as $ks => $val) {
                                            //        $radio .= '<input type="radio" name="' . $key.'_'.$k . '" value="' . $k . '" /><span style="margin-right:10px;padding-left:5px;">' . $val . '</span>';
                                            //     }
                                            //     $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title'][$k] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '</br>' . $radio.$required_span .'</div>';
                                            //     break;
                                            
                                            // case 'checkbox':
                                            //     $checkbox = '';
                                            //     foreach ($value['choice'] as $ks => $val) {
                                            //        $checkbox .= '<input type="checkbox" name="' . $key.'_'.$k . '" value="' . $k . '" /><span style="margin-right:10px;padding-left:5px;">' . $val . '</span>';
                                            //     }
                                            //     $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title'][$k] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '</br>' . $checkbox.$required_span .'</div>';
                                            //     break;
                                            
                                            // case 'select':
                                            //     $select = '';
                                            //     foreach ($value['choice'] as $ks => $val) {
                                            //         $select .= '<option value="' . $k . '">' . $val . '</option>';
                                            //     }
                                            //     $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title'][$k] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '<select name="' . $key.'_'.$k . '" class="form-control" ' . (isset($value['check_multiple']) ? 'multiple' : '') . '>' . $select . '</select>' .$required_span. '</div>';
                                            //     break;
                                            
                                            case 'date':
                                                $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title'][$k] . '</label><div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input class="form-control" name="' . $key.'_'.$k . '" placeholder="' .  $value['description'] . '" id="realDPX-min" type="text" value="' .$detail['data_lang_'.$k][$key]. '" ></div>' .$required_span. '</div>';
                                                break;
                                            // case 'file':
                                            //     $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title'][$k] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '<input type="' . $value['type'] .'" name="' . $key.'_'.$k . '" class="form-control" placeholder="' .  $value['description'] . '"  ' . (isset($value['check_multiple']) ? 'multiple' : '') . '/>' .$required_span. '</div>';
                                            //     break;
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
                        <ul class="nav nav-tabs" role="tablist"></ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <div class="box box-default">
                                    <div class="box-body">
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
                                                <?php echo $product_category; ?>
                                            </select>
                                            <span class="help-block hidden"><?php echo $templates_all['slug_shared']['required']; ?></span>
                                        </div>
                                        <div class="form-group col-xs-12 <?php echo isset($templates_all['trademark']['required']) ? 'required' : '' ;?>">
                                            <?php
                                            echo form_label('Thương hiệu', 'select');
                                            ?>
                                            <select name="trademark" class="form-control">
                                                <option value="">Chọn thương hiệu</option>
                                                <?php echo $trademark; ?>
                                            </select>
                                            <?php echo isset($templates_all['trademark']['required']) ? '<span class="help-block hidden">' .$templates_all['trademark']['required']. '</span>' : '' ;?>
                                        </div>
                                        <div class="form-group col-xs-12 <?php echo isset($templates_all['features']['required']) ? 'required' : '' ;?>">
                                            <?php
                                            echo form_label('Tính năng', 'select');
                                            ?>
                                            <select name="features[]" class="form-control" multiple>
                                                <option value="">Chọn tính năng</option>
                                                <?php echo $features; ?>
                                            </select>
                                            <span class="help-block hidden"><?php echo $templates_all['slug_shared']['required']; ?></span>
                                            <?php echo isset($templates_all['features']['required']) ? '<span class="help-block hidden">' .$templates_all['features']['required']. '</span>' : '' ;?>
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
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="add-product">
                                <div class="box box-default">
                                    <div class="box-body">
                                        <div class="col-xs-12">
                                            <h4 class="box-title">Thông tin cơ bản</h4>
                                        </div>
                                        <div class="row">
                                            <span><?php echo $this->session->flashdata('message'); ?></span>
                                        </div>
                                        <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
                                            <label class="col-md-12" for="">
                                                    Số màu của sản phẩm
                                            </label>
                                            <div class="col-md-10" style="margin-top:5px;">
                                                <?php  
                                                    echo form_input("numbercolor", set_value("numbercolor"), 'class="form-control" onkeypress=" return isNumberKey(event)" readonly id="numbercolor"');
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12" id="content-full-color">
                                            <?php $common = json_decode($detail['common'],true); ?>
                                            <?php for($k=0;$k<count($common['color']);$k++): ?>
                                                <div>
                                                    <div class="btn btn-primary col-ms-12 color_product" style="padding:0px; padding-top:5px; width:100%;text-align:left">
                                                        <span data-toggle="collapse" data-target="#demo<?php echo $k+1;?>" class="col-xs-10 check-collapse" style="height:35px;padding-top:2px">
                                                            <span style="padding-left:10px;font-weight: 500;font-size: 1.2em;"><?php echo $k+1;?></span>
                                                            <b style="font-size: 1.18em;font-weight: 500;"></b> 
                                                        </span>
                                                        <i style="float: right;padding-right:5px;marrgin-top:-10px;" class="fa-2x fa fa-close remove" onclick="remove_color('<?php echo $k+1;?>')"></i>
                                                    </div>
                                                    <div id="demo<?php echo $k+1;?>" class="collapse in form-group">
                                                        <div class="col-xs-12" style="padding:0px;">
                                                            <div class="col-xs-12">
                                                                <div class="col-xs-12" style="padding:0px;">
                                                                    <label class="control-label" for="inputError">Hình ảnh sản phẩm đang sử dụng</label>
                                                                </div>
                                                                <?php foreach ($common['img_color'][$k] as $key => $value): ?>
                                                                    <div class="col-xs-3" style="padding:0px;">
                                                                        <img src="<?php echo base_url('assets/upload/'. $controller .'/'. $detail['slug'].'/'. $value); ?>" width=95% height=140px>
                                                                    </div>
                                                                <?php endforeach ?>
                                                            </div>
                                                            <div class="col-xs-12">
                                                                <label class="control-label" for="inputError">Hình ảnh cho sản phẩm</label>
                                                                <input type="file" name="img_color<?php echo $k+1;?>[]" value="" multiple placeholder="" class="form-control img_color">
                                                            </div>
                                                            <div class="col-sm-6 col-xs-12">
                                                                <label class="control-label" for="inputError">Chọn màu sản phẩm</label>
                                                                <select onchange="select_color(this)" name="color[]" value="" placeholder="" class="form-control color">
                                                                    <?php foreach ($color_product as $key => $value): ?>
                                                                        <option value="<?php echo $value['id'];?>" <?php echo ($value['id'] == $common['color'][$k]) ?' selected="selected"' : '';?>" ><?php echo $value['vi'];?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6 col-xs-12">
                                                                <label class="control-label" for="inputError">Giá của sản phẩm (đơn vị VND)</label>
                                                                <input type="text" name="price_color[]" value="<?php echo $common['price_color'][$k] ?>" onpaste ="return false" onkeypress=" return check_sale(event,this)" placeholder="" class="form-control price_color">
                                                            </div>
                                                            <div class="col-sm-6 col-xs-12">
                                                                <label class="control-label" for="inputError">Giá khuyến mãi sản phẩm (đơn vị VND)</label>
                                                                <input type="text" name="promotion_color[]" value="<?php echo $common['promotion_color'][$k] ?>" placeholder="" onpaste ="return false" onkeypress=" return check_sale(event,this)" class="form-control promotion_color">
                                                            </div>
                                                            <div class="col-sm-6 col-xs-12">
                                                                <label class="control-label" for="inputError">Số lượng sản phẩm</label>
                                                                <input type="text" name="quantity[]" value="<?php echo $common['quantity'][$k] ?>" placeholder="" class="form-control quantity">
                                                            </div>
                                                            <div class="col-xs-12">
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="" class="promotion_check" <?php echo ($common['promotion_check'][$k] == 'true')? 'checked' : ''; ?> /><span>Hiển thị khuyến mãi cho sản phẩm</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endfor ?>
                                        </div>
                                        <div class="col-xs-12">
                                            <i class="fa-2x fa fa-plus-square" id="addpend-one-color" onclick="addOneField()" style="float: right;cursor: pointer;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="form-group col-xs-12 nav-product" style="">
                                    <ul class="nav nav-tabs" role="tablist" id="nav-product">
                                        <li><button class="btn btn-primary" id="go-back" onclick="history.back(-1);" >Go back</button></li>
                                        <li role="presentation" id="content-home" class="active" style="float: right;"><button href="#add-product" class="btn btn-primary" aria-controls="add-product" role="tab" data-toggle="tab" onclick="check_validate_default(this)">Thêm màu sản phẩm</button></li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 nav-product" style="display: none">
                                    <ul class="nav nav-tabs" role="tablist" id="nav-product">
                                        <li role="presentation" id="config_contacts"><button href="#home" class="btn btn-primary" aria-controls="home" role="tab" data-toggle="tab" onclick="check_validate_default(this)">Product default</button></li>
                                        <span type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary" onclick="submit_shared(this)" style="float: right;">Xác nhận</span>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="encypted_ppbtn_all"></div>
                        <!-- <div id="myModal" class="modal">
                            <img class="modal-content" id="img01">
                        </div> -->
                        <?php echo form_close(); ?>
                        <!-- <span onclick="submit_shared(this)" id="submid" class="btn btn-default" id="submit_shared" data-dismiss="modal" >Xác nhận</span> -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo site_url('assets/lib/') ?>DatePickerX/DatePickerX.min.js"></script>
<!-- <script src="<?php echo site_url('assets/js/admin/') ?>showmodalimg.js"></script> -->
<script src="<?php echo site_url('assets/js/admin/') ?>product.js"></script>
<script type="text/javascript">
    for (var i = 0; i < document.querySelectorAll('[id^="demo"]').length; i++) {
        value = document.querySelectorAll('[id^="demo"]')[i].querySelector('[name="color[]"]').value;
        document.querySelectorAll(`[data-target^="#demo"] b`)[i].innerHTML = '. '+document.querySelectorAll('[id^="demo"]')[i].querySelector(`[value="${value}"]`).innerHTML;
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