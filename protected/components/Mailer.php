<?php
/**
 * Created by IntelliJ IDEA.
 * User: zainulabdeen
 * Date: 06/04/14
 * Time: 12:03 AM
 * To change this template use File | Settings | File Templates.
 *
 *
 *
 * Class extends the mail functionality
 * servers as the mail sender
 * is the basic class implementing YiiMailer
 */
class Mailer {

    protected $SMTPHost = '180.179.92.2';
    protected $SMTPPort = 587;
    protected $username = "mailerscnk";
    protected $password = 'm@ssw0rd';
    protected $SMTPAuth = true;
    protected $from_name = "GrabYourDream Support";
    protected $from_address = "gyd.support@coxandkings.com";

    public function __construct(){
    }

    public function sendMail($view,$to,$subject,$data){

        //initialize the mailer
        $mail = $this->getMailer();

        $mail->setView($view);
        $mail->setData($data);
        $mail->setSubject($subject);
        $mail->setTo( $to );

        $mail->setFrom($this->from_address, $this->from_name);

        try{
            if ($mail->send()) {
                return true;
            } else {
                Yii::log("Mail Error: ".$mail->getError());
                return false;
            }
        } catch (Exception $e){
            print_r($e);
            return false;
        }
    }

    private function getMailer(){

        $client = new YiiMailer();
        $client->IsSMTP();
        $client->IsHTML();

        $client->SMTPAuth = $this->SMTPAuth;
        $client->Host = $this->SMTPHost;
        $client->Port = $this->SMTPPort;
        $client->Username = $this->username;
        $client->Password = $this->password;

        return $client;
    }


}
