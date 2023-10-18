<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ini sesuaikan foldernya ke file 3 ini
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
class Qr extends CI_Controller
{

    function scan($id)
    {


        $data['id'] = $id;
        $this->load->view('qr/qr', $data);


    }

}