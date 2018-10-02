<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Public_Controller {

    public function __construct() {
        parent::__construct();

        $this->value = array(
            [
                'id' => 0,
                'image' => 'sp1.png',
                'cover' => 'sp1-cover.jpeg',
                'subtitle' => 'speaker',
                'title' => 'SoundWear Companion Speaker',
                'price' => '400',
                'price_discount' => '550',
                'bluetooth' => 1,
                'battery' => 1,
                'waterproof' => 1,
                'heartbeat' => 1,
                'description' => 'Donec molestie nunc id ex ultricies, id aliquet dui auctor. Etiam gravida diam eu faucibus tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent hendrerit orci in aliquam lacinia. Nullam id maximus massa, in laoreet massa. Sed nec justo auctor, pharetra massa eu, scelerisque nisl. Maecenas ac turpis et arcu condimentum lobortis sed at elit. Donec luctus mi et luctus accumsan.',
                'size' => '3.05 cm H x 2.5 cm W x 3.05 cm D (23 g)',
                'detail' => 'Lithium-ion Battery, charging Time: 2 hours, using time of batterry: 6 hours',
                'accessories' => 'Wireless headphone, 3 size buttons, USB cable, Cover package, Manual Guide, Guarantee Card',
                'color' => array('#333' , '#444'),
                'quantity' => 0
            ],
            [
                'id' => 1,
                'image' =>'sp2.png',
                'cover' => 'sp2-cover.jpeg',
                'subtitle' => 'headphone',
                'title' => 'Wireless SoundSport',
                'price' => '520',
                'price_discount' => '700',
                'bluetooth' => 1,
                'battery' => 1,
                'waterproof' => 0,
                'heartbeat' => 0,
                'description' => 'Donec molestie nunc id ex ultricies, id aliquet dui auctor. Etiam gravida diam eu faucibus tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent hendrerit orci in aliquam lacinia. Nullam id maximus massa, in laoreet massa. Sed nec justo auctor, pharetra massa eu, scelerisque nisl. Maecenas ac turpis et arcu condimentum lobortis sed at elit. Donec luctus mi et luctus accumsan.',
                'size' => '3.05 cm H x 2.5 cm W x 3.05 cm D (23 g)',
                'detail' => 'Lithium-ion Battery, charging Time: 2 hours, using time of batterry: 6 hours',
                'accessories' => 'Wireless headphone, 3 size buttons, USB cable, Cover package, Manual Guide, Guarantee Card',
                'color' => array('#333' , '#F9E761' , '#0092AF'),
                'quantity' => 999
            ],
            [
                'id' => 2,
                'image' =>'sp3.png',
                'cover' => 'sp1-cover.png',
                'subtitle' => 'headphone',
                'title' => 'Wireless SoundSport Free',
                'price' => '240',
                'price_discount' => '',
                'bluetooth' => 0,
                'battery' => 1,
                'waterproof' => 0,
                'heartbeat' => 0,
                'description' => 'Donec molestie nunc id ex ultricies, id aliquet dui auctor. Etiam gravida diam eu faucibus tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent hendrerit orci in aliquam lacinia. Nullam id maximus massa, in laoreet massa. Sed nec justo auctor, pharetra massa eu, scelerisque nisl. Maecenas ac turpis et arcu condimentum lobortis sed at elit. Donec luctus mi et luctus accumsan.',
                'size' => '3.05 cm H x 2.5 cm W x 3.05 cm D (23 g)',
                'detail' => 'Lithium-ion Battery, charging Time: 2 hours, using time of batterry: 6 hours',
                'accessories' => 'Wireless headphone, 3 size buttons, USB cable, Cover package, Manual Guide, Guarantee Card',
                'color' => array('#333'),
                'quantity' => 999
            ],
            [
                'id' => 3,
                'image' =>'sp4.png',
                'cover' => 'sp1-cover.png',
                'subtitle' => 'headphone',
                'title' => 'Wireless QuietComfort 35 II',
                'price' => '350',
                'price_discount' => '',
                'bluetooth' => 1,
                'battery' => 1,
                'waterproof' => 1,
                'heartbeat' => 0,
                'description' => 'Donec molestie nunc id ex ultricies, id aliquet dui auctor. Etiam gravida diam eu faucibus tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent hendrerit orci in aliquam lacinia. Nullam id maximus massa, in laoreet massa. Sed nec justo auctor, pharetra massa eu, scelerisque nisl. Maecenas ac turpis et arcu condimentum lobortis sed at elit. Donec luctus mi et luctus accumsan.',
                'size' => '3.05 cm H x 2.5 cm W x 3.05 cm D (23 g)',
                'detail' => 'Lithium-ion Battery, charging Time: 2 hours, using time of batterry: 6 hours',
                'accessories' => 'Wireless headphone, 3 size buttons, USB cable, Cover package, Manual Guide, Guarantee Card',
                'color' => array('#333' , '#999'),
                'quantity' => 999
            ],
            [
                'id' => 4,
                'image' =>'sp5.png',
                'cover' => 'sp1-cover.png',
                'subtitle' => 'headphone',
                'title' => 'Wireless QuietComfort 30',
                'price' => '300',
                'price_discount' => '',
                'bluetooth' => 1,
                'battery' => 1,
                'waterproof' => 0,
                'heartbeat' => 1,
                'description' => 'Donec molestie nunc id ex ultricies, id aliquet dui auctor. Etiam gravida diam eu faucibus tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent hendrerit orci in aliquam lacinia. Nullam id maximus massa, in laoreet massa. Sed nec justo auctor, pharetra massa eu, scelerisque nisl. Maecenas ac turpis et arcu condimentum lobortis sed at elit. Donec luctus mi et luctus accumsan.',
                'size' => '3.05 cm H x 2.5 cm W x 3.05 cm D (23 g)',
                'detail' => 'Lithium-ion Battery, charging Time: 2 hours, using time of batterry: 6 hours',
                'accessories' => 'Wireless headphone, 3 size buttons, USB cable, Cover package, Manual Guide, Guarantee Card',
                'color' => array('#333'),
                'quantity' => 999
            ],
            [
                'id' => 5,
                'image' =>'sp6.png',
                'cover' => 'sp1-cover.png',
                'subtitle' => 'headphone',
                'title' => 'Wireless QuietComfort 30 AE',
                'price' => '300',
                'price_discount' => '',
                'bluetooth' => 0,
                'battery' => 1,
                'waterproof' => 0,
                'heartbeat' => 0,
                'description' => 'Donec molestie nunc id ex ultricies, id aliquet dui auctor. Etiam gravida diam eu faucibus tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent hendrerit orci in aliquam lacinia. Nullam id maximus massa, in laoreet massa. Sed nec justo auctor, pharetra massa eu, scelerisque nisl. Maecenas ac turpis et arcu condimentum lobortis sed at elit. Donec luctus mi et luctus accumsan.',
                'size' => '3.05 cm H x 2.5 cm W x 3.05 cm D (23 g)',
                'detail' => 'Lithium-ion Battery, charging Time: 2 hours, using time of batterry: 6 hours',
                'accessories' => 'Wireless headphone, 3 size buttons, USB cable, Cover package, Manual Guide, Guarantee Card',
                'color' => array('#126351' , '#337766'),
                'quantity' => 999
            ],
            [
                'id' => 6,
                'image' =>'sp9.png',
                'cover' => '',
                'subtitle' => 'accessories',
                'title' => 'SoundLink® wireless headphones II audio cable',
                'price' => '12',
                'price_discount' => '',
                'bluetooth' => 0,
                'battery' => 0,
                'waterproof' => 0,
                'heartbeat' => 0,
                'description' => 'Donec molestie nunc id ex ultricies, id aliquet dui auctor. Etiam gravida diam eu faucibus tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent hendrerit orci in aliquam lacinia. Nullam id maximus massa, in laoreet massa. Sed nec justo auctor, pharetra massa eu, scelerisque nisl. Maecenas ac turpis et arcu condimentum lobortis sed at elit. Donec luctus mi et luctus accumsan.',
                'size' => '3.05 cm H x 2.5 cm W x 3.05 cm D (23 g)',
                'detail' => 'Lithium-ion Battery, charging Time: 2 hours, using time of batterry: 6 hours',
                'accessories' => 'Wireless headphone, 3 size buttons, USB cable, Cover package, Manual Guide, Guarantee Card',
                'color' => array('#333'),
                'quantity' => 999
            ],
            [
                'id' => 7,
                'image' =>'sp10.png',
                'cover' => '',
                'subtitle' => 'accessories',
                'title' => 'Carry case',
                'price' => '25',
                'price_discount' => '',
                'bluetooth' => 0,
                'battery' => 0,
                'waterproof' => 0,
                'heartbeat' => 0,
                'description' => 'Donec molestie nunc id ex ultricies, id aliquet dui auctor. Etiam gravida diam eu faucibus tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent hendrerit orci in aliquam lacinia. Nullam id maximus massa, in laoreet massa. Sed nec justo auctor, pharetra massa eu, scelerisque nisl. Maecenas ac turpis et arcu condimentum lobortis sed at elit. Donec luctus mi et luctus accumsan.',
                'size' => '3.05 cm H x 2.5 cm W x 3.05 cm D (23 g)',
                'detail' => 'Lithium-ion Battery, charging Time: 2 hours, using time of batterry: 6 hours',
                'accessories' => 'Wireless headphone, 3 size buttons, USB cable, Cover package, Manual Guide, Guarantee Card',
                'color' => array('#333'),
                'quantity' => 999
            ],
            [
                'id' => 8,
                'image' =>'sp11.png',
                'cover' => '',
                'subtitle' => 'accessories',
                'title' => 'QC® airline adapter',
                'price' => '8',
                'price_discount' => '',
                'bluetooth' => 0,
                'battery' => 0,
                'waterproof' => 0,
                'heartbeat' => 0,
                'description' => 'Donec molestie nunc id ex ultricies, id aliquet dui auctor. Etiam gravida diam eu faucibus tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent hendrerit orci in aliquam lacinia. Nullam id maximus massa, in laoreet massa. Sed nec justo auctor, pharetra massa eu, scelerisque nisl. Maecenas ac turpis et arcu condimentum lobortis sed at elit. Donec luctus mi et luctus accumsan.',
                'size' => '3.05 cm H x 2.5 cm W x 3.05 cm D (23 g)',
                'detail' => 'Lithium-ion Battery, charging Time: 2 hours, using time of batterry: 6 hours',
                'accessories' => 'Wireless headphone, 3 size buttons, USB cable, Cover package, Manual Guide, Guarantee Card',
                'color' => array('#333'),
                'quantity' => 0
            ]
        );
    }

    public function index(){
        $this->data['result'] = $this->value;

        //echo '<pre>';
        //print_r($this->data['result']);die;

        $this->render('list_products_view');
    }

    public function detail($id){
        $this->data['result'] = $this->value;
        $this->data['detail'] = $this->value[$id];

        //echo '<pre>';
        //print_r($this->data['detail']);die;

        $this->render('detail_product_view');
    }

    public function created_rating(){
        $ip = $this->getRealIPAddress();
        if($this->session->has_userdata($ip) && in_array($this->input->get('product_id'), $this->session->userdata($ip))){
            return $this->return_api(HTTP_SUCCESS,'Bạn đã đánh giá cho sản phẩm này rồi.');
        }else{
            $this->load->model('product_model');
            $product_id = $this->input->get('product_id');
            $new_rating = $this->input->get('rating');
            $product_detail = $this->product_model->find($product_id);
            $total_rating = $product_detail['total_rating'];
            $count_rating = $product_detail['count_rating'];
            $total_rating = $total_rating + $new_rating;
            $count_rating = $count_rating + 1;
            $data = array(
                'total_rating' => $total_rating,
                'count_rating' => $count_rating
            );
            $update  = $this->product_model->common_update($product_id, $data);
            if($update){
                $this->session->set_userdata($ip, array($ip, $this->input->get('product_id')));
                $this->session->mark_as_temp($ip, 3600);
                $this->data['session_id'] = session_id();
            }
        }
        return $this->return_api(HTTP_SUCCESS,'Đánh giá cho sản phẩm thành công.');
    }

    function getRealIPAddress(){  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    } 
    public function created_captcha(){
        $vals = array(
            'img_path' => './captcha/',
            'img_url' => base_url('captcha'),
            'img_width' => '120',
            'img_height' => 35,
            'expiration' => 0,
            'word_length' => 6,
            'font_size' => 25,
            'img_id' => 'Imageid',
            'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'colors' => array(
                'background' => array(235, 235, 235),
                'border' => array(51, 51, 51),
                'text' => array(255, 0, 0),
                'grid' => array(255, 255, 255)
            )
        );
        $captcha = create_captcha($vals);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array('status' => 200, 'captcha' => $captcha)));
    }
}
