<?php
namespace App\Services;

use App\Services\GuzzleBase;

class Mail extends GuzzleBase {

    public $email;
	public $message;


	public function __construct() {
		$this->message = 'You was subscribed!!!';
	}

   

	public function getUrl() {
       return 'http://api.25one.com.ua/api_mail.php';
	}

	public function getParams() {
       return [
          'email_to' => $this->email,
          'title' => 'Message from site - ' . date('d-m-Y H:i:s'),
        'message' => $this->message
		
       ];
	}

	public function funcSend($email) {
		$this->email = $email;
	    

	    return $this->funcGet();
	}

}

?>
