
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
    <div id="encypted_ppbtn_all"></div>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thêm mới
        <small>
            Bài Viết
        </small>
    </h1>
</section>
<!-- Main content -->
<section class="content"  onload="onload_a()">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-body">
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                    ?>
                    <div class="col-xs-12">
                        <h4 class="box-title">Thông tin cơ bản</h4>
                    </div>
                    <div class="row">
                        <span><?php echo $this->session->flashdata('message'); ?></span>
                    </div>
                    <?php
                        $a_language = '';
                        $multiple_language = array('vi' => '', 'en' => '');
                        foreach (json_decode($detail['data'],true) as $key => $value) {
                            $required = '';
                            $required_span = '';
                            $required_focus = '';
                            if(isset($value['required'])){
                                $required = 'required';
                                $required_span = '<span class="help-block hidden">' .$value['required']. '</span>';
                                $required_focus = 'required_focus';
                            }
                            if($value['check_language'] == 'true'){
                                switch ($value['type']) {
                                    case 'textarea':
                                        $a_language .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title']['vi'] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '</br><textarea name="' . $key . '" value="" class="col-xs-12 ' . (isset($value['check_multiple']) ? 'tinymce-area' : '') . '" rows="5" id="' .$key. '"></textarea>' .$required_span. '</div>';
                                        break;
                                    
                                    case 'radio':
                                        $radio = '';
                                        foreach ($value['choice']['vi'] as $k => $val) {
                                           $radio .= '<input type="radio" name="' . $key . '" value="' . $k . '" /><span style="margin-right:10px;padding-left:5px;">' . $val . '</span>';
                                        }
                                        $a_language .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title']['vi'] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '</br>' . $radio.$required_span .'</div>';
                                        break;
                                    
                                    case 'checkbox':
                                        $checkbox = '';
                                        foreach ($value['choice']['vi'] as $k => $val) {
                                           $checkbox .= '<input type="checkbox" name="' . $key . '[]" value="' . $k . '" /><span style="margin-right:10px;padding-left:5px;">' . $val . '</span>';
                                        }
                                        $a_language .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title']['vi'] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '</br>' . $checkbox.$required_span .'</div>';
                                        break;
                                    
                                    case 'select':
                                        $select = '<option value="">Click để chọn</option>';
                                        if($key == 'parent_id_shared'){
                                            $select.= $product_category;
                                        }else if($key == 'trademark'){
                                            $select.= $trademark;
                                        }else if($key == 'features'){
                                            $select.= $features;
                                        }else{
                                            foreach ($value['choice']['vi'] as $k => $val) {
                                                $select .= '<option value="' . $k . '">' . $val . '</option>';
                                            }
                                        }
                                        $a_language .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title']['vi'] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '<select name="' .$key.(isset($value['check_multiple']) ? '[]' : ''). '" class="form-control" ' . (isset($value['check_multiple']) ? 'multiple' : '') . '>' . $select . '</select>' .$required_span. '</div>';
                                        break;
                                    
                                    case 'date':
                                        $a_language .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title']['vi'] . '</label><div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input class="form-control" name="' . $key . '" placeholder="' .  $value['description'] . '" id="realDPX-min" type="text"></div>' .$required_span. '</div>';
                                        break;
                                    case 'file':
                                        $a_language .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title']['vi'] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '<input type="' . $value['type'] .'" name="' . $key.(isset($value['check_multiple']) ? '[]' : ''). '" class="form-control" placeholder="' .  $value['description'] . '"  ' . (isset($value['check_multiple']) ? 'multiple' : '') . '/>' .$required_span. '</div>';
                                        break;
                                    default:
                                        
                                        $a_language .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title']['vi'] . '</label><input type="' . $value['type'] .'" name="' . $key . '" class="form-control" placeholder="' .  $value['description'] . '" ' . (($key == 'slug_shared') ? 'readonly' : '') .(($key == 'common_price') ? ' onpaste ="return false"  onkeypress=" return isNumberKey(event)" ' : ''). '/>' .$required_span. '</div>';
                                        break;
                                }
                            }else{
                                foreach ($page_languages as $k => $vals){
                                    switch ($value['type']) {
                                        case 'textarea':
                                            $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="">' . $value['title'][$k] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '</br><textarea name="' . $key.'_'.$k . '" value="" class="col-xs-12 ' . (isset($value['check_multiple']) ? 'tinymce-area' : '') . '" rows="5"></textarea>' .$required_span. '</div>';
                                            break;
                                        
                                        case 'radio':
                                            $radio = '';
                                            foreach ($value['choice'] as $ks => $val) {
                                               $radio .= '<input type="radio" name="' . $key.'_'.$k . '" value="' . $k . '" /><span style="margin-right:10px;padding-left:5px;">' . $val . '</span>';
                                            }
                                            $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title'][$k] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '</br>' . $radio.$required_span .'</div>';
                                            break;
                                        
                                        case 'checkbox':
                                            $checkbox = '';
                                            foreach ($value['choice'] as $ks => $val) {
                                               $checkbox .= '<input type="checkbox" name="' . $key.'_'.$k . '" value="' . $k . '" /><span style="margin-right:10px;padding-left:5px;">' . $val . '</span>';
                                            }
                                            $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title'][$k] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '</br>' . $checkbox.$required_span .'</div>';
                                            break;
                                        
                                        case 'select':
                                            $select = '';
                                            foreach ($value['choice'] as $ks => $val) {
                                                $select .= '<option value="' . $k . '">' . $val . '</option>';
                                            }
                                            $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title'][$k] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '<select name="' . $key.'_'.$k . '" class="form-control" ' . (isset($value['check_multiple']) ? 'multiple' : '') . '>' . $select . '</select>' .$required_span. '</div>';
                                            break;
                                        
                                        case 'date':
                                            $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title'][$k] . '</label><div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input class="form-control" name="' . $key.'_'.$k . '" placeholder="' .  $value['description'] . '" id="realDPX-min" type="text"></div>' .$required_span. '</div>';
                                            break;
                                        case 'file':
                                            $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title'][$k] . '</label>' . ($value['description'] ? ' (<i>' .  $value['description'] . '</i>)' : '') . '<input type="' . $value['type'] .'" name="' . $key.'_'.$k . '" class="form-control" placeholder="' .  $value['description'] . '"  ' . (isset($value['check_multiple']) ? 'multiple' : '') . '/>' .$required_span. '</div>';
                                            break;
                                        default:
                                            $by_slug = '';
                                            if($k == 'vi' && $key == 'title'){
                                                $by_slug = 'onchange="title_change(this)"';
                                            }
                                            $multiple_language[$k] .= '<div class="form-group col-xs-12 ' .$required. '" ><label for="' . $value['type'] . '">' . $value['title'][$k] . '</label><input type="' . $value['type'] .'" '. $by_slug .' name="' . $key.'_'.$k . '" class="form-control" placeholder="' .  $value['description'] . '" ' . (($key == 'slug_shared') ? 'readonly' : '') . '/>' .$required_span. '</div>';
                                            break;
                                    }
                                }
                            }
                        }
                    ?>
                    <ul class="nav nav-tabs" role="tablist"></ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                            <div class="box box-default">
                                <div class="box-body">
                                    <?php echo $a_language; ?>
                                    <!-- <div class="form-group col-xs-12">
                                        <label>Giá chung cho sản phẩm (đơn vị VND)</label>
                                        <input type="text" value="" name="" id="common_price" class="form-control" >
                                    </div> -->
                                    <div class="col-xs-12 form-group">
                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                            <?php $i = 0; ?>
                                            <?php foreach ($page_languages as $k => $val): ?>
                                                <?php $activated = ($i == 0) ? 'active' : ''; ?>
                                                <li role="presentation" class="<?php echo $activated ?>">
                                                    <a href="#<?php echo $k ?>" aria-controls="<?php echo $k ?>" role="tab" data-toggle="tab">
                                                        <span class="badge"><?php echo ($i + 1); ?></span><?php echo $val;?>
                                                    </a>
                                                </li>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="tab-content language">
                                        <?php foreach ($page_languages as $k => $val): ?>
                                            <div role="tabpanel" class="tab-pane <?php echo ($i == count($page_languages))? 'active' : '' ?>" id="<?php echo $k ?>">
                                                <?php echo $multiple_language[$k];?>
                                            </div>
                                            <?php $i--; ?>
                                        <?php endforeach; ?>
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
                                                Nhập số màu của sản phẩm
                                        </label>
                                        <div class="col-md-10" style="margin-top:5px;">
                                            <?php  
                                                echo form_input("numbercolor", set_value("numbercolor"), 'class="form-control" onkeypress=" return isNumberKey(event)" id="numbercolor"');
                                            ?>
                                        </div>
                                        <div class="col-md-2" style="margin-top:5px;">
                                            <span class="btn btn-primary form-control append-date" id="button-numbercolor" onclick="addField(document.getElementById('numbercolor').value)">Xác nhận</span>
                                        </div>
                                    </div>

                                    <div class="col-md-12" id="content-full-color"> </div>
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
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>





<script src="<?php echo site_url('assets/lib/') ?>DatePickerX/DatePickerX.min.js"></script>
<script src="<?php echo site_url('assets/js/admin/') ?>product.js"></script>
<?php 
    function build_new_category($categorie, $parent_id = 0, $char = '', &$result=''){
        $cate_child = array();
        foreach ($categorie as $key => $item){
            if ($item['parent_id'] == $parent_id){
                $cate_child[] = $item;
                unset($categorie[$key]);
            }
        }
        if ($cate_child){
            foreach ($cate_child as $key => $value){
            
            $result .= '<option value="' .$value['id']. '" >' .$char.$value['title']. '</option>';
            build_new_category($categorie, $value['id'], $char.'---|',$result) ?>
            <?php
            }
        }
    }
?>