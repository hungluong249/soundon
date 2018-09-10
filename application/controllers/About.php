<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Public_Controller {

    public function __construct() {
        parent::__construct();

        $this -> value = array(
            [
                'id' => 0,
                'image' => 'https://images.unsplash.com/photo-1530522238647-b1b7e1789c39?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ef33f53aeff3bf7bda0187e49dce091e&auto=format&fit=crop&w=1350&q=80',
                'title' => 'Values',
                'description' => 'Maecenas elementum faucibus ligula, eget ullamcorper felis sagittis eget. In finibus eros sed nibh volutpat, ut faucibus felis iaculis. Morbi ut finibus ante. Nulla lobortis cursus leo. Proin sit amet sem tellus. Nulla sodales mauris sed tincidunt mollis. Nunc vel mauris sit amet risus lobortis ultrices. Ut feugiat luctus semper.'
            ],

            [
                'id' => 1,
                'image' => 'https://images.unsplash.com/photo-1527153818091-1a9638521e2a?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=5fce4ce8856a711cc50a14e03e58783a&auto=format&fit=crop&w=1458&q=80',
                'title' => 'Innovations/achievements',
                'description' => 'Maecenas elementum faucibus ligula, eget ullamcorper felis sagittis eget. In finibus eros sed nibh volutpat, ut faucibus felis iaculis. Morbi ut finibus ante. Nulla lobortis cursus leo. Proin sit amet sem tellus. Nulla sodales mauris sed tincidunt mollis. Nunc vel mauris sit amet risus lobortis ultrices. Ut feugiat luctus semper.'
            ],

            [
                'id' => 2,
                'image' => 'https://images.unsplash.com/photo-1527499332095-aa151623b3eb?ixlib=rb-0.3.5&s=c9d97e4267542158948986981f38f448&auto=format&fit=crop&w=1350&q=80',
                'title' => 'Careers',
                'description' => 'Maecenas elementum faucibus ligula, eget ullamcorper felis sagittis eget. In finibus eros sed nibh volutpat, ut faucibus felis iaculis. Morbi ut finibus ante. Nulla lobortis cursus leo. Proin sit amet sem tellus. Nulla sodales mauris sed tincidunt mollis. Nunc vel mauris sit amet risus lobortis ultrices. Ut feugiat luctus semper.'
            ]
        );
    }

    public function index(){
        $this->data['result'] = $this->value;

        $this->render('list_about_view');
    }

    public function detail($id){
        $this->data['detail'] = $this->value[$id];

        $this->render('detail_about_view');
    }
}
