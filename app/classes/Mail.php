<?php


namespace App\Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Mail{

 
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->setUp();
    }

    public function setUp(){
        $this->mail->isSMTP();
        $this->mail->Mailer = 'smtp';
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'tls';

        $this->mail->Host = getenv('SMTP_HOST');
        $this->mail->Port = getenv('SMTP_PORT');
       

        $environment = getenv('APP_ENV');
        if($environment === 'local'){
            //this can be added outside the local environment if you are getting an error with the phpmailer in production environment
            $this->mail->SMTPOptions=[
                'ssl' => array(
                    'verify_pair'=>false,
                    'verify_pair_name'=>false,
                    'allow_self_signed'=>true
                )
            ];
            $this->mail->SMTPDebug='';
        }

        //auth info
        $this->mail->Username = getenv('EMAIL_USERNAME');
        $this->mail->Password = getenv('EMAIL_PASSWORD');

        $this->mail->isHTML(true);
        $this->mail->SingleTo=true;

        //sender info

        $this->mail->From = getenv('ADMIN_EMAIL');
        $this->mail->FromName = getenv('Pheelfresh Store');

    }

    public function send($data){
      

        $this->mail->addAddress($data['to'], $data['name']);
        $this->mail->Subject = $data['subject'];
        //$data['view'] refers to the filename which was specified in the $data array
        //'data'=>$data['body'] is an associate array meaning when extracted we are going to have a variable called 'data'
        $this->mail->Body = make($data['view'], array('data'=>$data['body']));
        return $this->mail->send();
    }
}

?>