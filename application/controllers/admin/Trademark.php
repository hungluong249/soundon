<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Trademark extends Admin_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('trademark_model');
        $this->load->model('product_model');
        $this->load->model('product_category_model');
        $this->load->helper('common');
        $this->data['template'] = build_template();
        $this->data['controller'] = $this->trademark_model->table;
    }

    public function index() {
        $this->data['keyword'] = '';
        if($this->input->get('search')){
            $this->data['keyword'] = $this->input->get('search');
        }
        $this->load->library('pagination');
        $per_page = 10;
        $total_rows  = $this->trademark_model->count_searchs($this->data['keyword']);
        $config = $this->pagination_config(base_url('admin/'.$this->data['controller'].'/index'), $total_rows, $per_page, 4);
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['result'] = $this->trademark_model->get_all_with_pagination_searchs('desc',$per_page, $this->data['page'], $this->data['keyword'],'vi');
        $this->render('admin/trademark/list_trademark_view');
    }
    public function create(){
        $this->load->helper('form');
        $product_category = $this->product_category_model->get_by_parent_id_when_active(null,'asc');
        $this->build_new_category($product_category,0,$this->data['product_category']);
        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('vi', 'Thương hiệu tiếng Việt', 'required');
            $this->form_validation->set_rules('en', 'Thương hiệu tiếng Anh', 'required');
            if($this->form_validation->run() == TRUE){
                $trademark_request = array(
                    'vi' => mb_convert_case($this->input->post('vi'), MB_CASE_TITLE, "UTF-8"),
                    'en' => mb_convert_case($this->input->post('en'), MB_CASE_TITLE, "UTF-8"),
                    'product_category_id' => $this->input->post('parent_id_shared')
                );
                $insert = $this->trademark_model->common_insert($trademark_request);
                if($insert){
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/'. $this->data['controller'] .'', 'refresh');
                }else {
                    $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                    $this->render('admin/'. $this->data['controller'] .'/create_trademark_view');
                }
            }
        }
        $this->render('admin/trademark/create_trademark_view');
    }
    public function edit($id = null){
        $this->data['detail'] = $this->trademark_model->get_by_id_trademark($id);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $product_category = $this->product_category_model->get_by_parent_id_when_active(null,'asc');
        $this->build_new_category($product_category,0,$this->data['product_category'],$this->data['detail']['product_category_id']);
        if($this->input->post()){
            $this->form_validation->set_rules('vi', 'Thương hiệu tiếng Việt', 'required');
            $this->form_validation->set_rules('en', 'Thương hiệu tiếng Anh', 'required');
            if($this->form_validation->run() === true){
                $trademark_request = array(
                    'vi' => mb_convert_case($this->input->post('vi'), MB_CASE_TITLE, "UTF-8"),
                    'en' => mb_convert_case($this->input->post('en'), MB_CASE_TITLE, "UTF-8"),
                    'product_category_id' => $this->input->post('parent_id_shared')
                );
                $update = $this->trademark_model->common_update($id, $trademark_request);
                if($update){
                    $this->session->set_flashdata('message_success', MESSAGE_UPDATE_SUCCESS);
                    redirect('admin/trademark', 'refresh');
                }else {
                    $this->session->set_flashdata('message_error', MESSAGE_UPDATE_ERROR);
                    $this->render('admin/trademark/edit/'.$id);
                }
            }
        }
        $this->render('admin/trademark/edit_trademark_view');
    }
    function remove(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->trademark_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                return $this->return_api(HTTP_NOT_FOUND, MESSAGE_ISSET_ERROR);
            }
            $product = $this->product_model->find_rows(array('trademark_id' => $id));// lấy số bài viết thuộc về category
            if($product == 0){
                $data = array('is_deleted' => 1);
                $update = $this->trademark_model->common_update($id, $data);
                if($update){
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);
                }
                return $this->return_api(HTTP_NOT_FOUND,MESSAGE_REMOVE_ERROR);
            }else{
                return $this->return_api(HTTP_NOT_FOUND,sprintf(MESSAGE_ERROR_REMOVE_trademark,$product));
            }
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ID_ERROR);
    }
    function build_new_category($categorie, $parent_id = 0,&$result, $id = "",$char=""){
        $cate_child = array();
        foreach ($categorie as $key => $item){
            if ($item['parent_id'] == $parent_id){
                $cate_child[] = $item;
                unset($categorie[$key]);
            }
        }
        if ($cate_child){
            foreach ($cate_child as $key => $value){
            $select = ($value['id'] == $id)? 'selected' : '';
            $result.='<option value="'.$value['id'].'"'.$select.'>'.$char.$value['title'].'</option>';
            $this->build_new_category($categorie, $value['id'],$result, $id, $char.'---|');
            }
        }
    }
}
