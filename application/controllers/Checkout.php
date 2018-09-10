<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends Public_Controller {


    public function index(){
        $this->render('checkout_view');
    }
}