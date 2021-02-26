<?php
/**
 * AlphaOne Building Consent System
 * Copyright 2021
 * Generated in PhpStorm.
 * Developer: Camilo Lozano III - www.camilord.com
 *                              - github.com/camilord
 *                              - linkedin.com/in/camilord
 *
 * kiwilist - Mailer.php
 * Username: Camilo
 * Date: 15/02/2021
 * Time: 8:32 PM
 */

namespace App\Mail;


use App\Config\MailConfig;
use camilord\utilus\Data\ArrayUtilus;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * Class Mailer
 * @package App\Mailbox
 */
class Mailer
{
    /**
     * @var string
     */
    private $message;

    /**
     * @var MailConfig
     */
    private $mail_config;

    public function __construct()
    {
        $this->mail_config = new MailConfig();
        $this->message = '';
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return MailConfig
     */
    public function getMailConfig()
    {
        return $this->mail_config;
    }

    /**
     * @param array $recipients
     * @param string $subject
     * @param string $message
     * @param array|null $cc
     * @param array|null $bcc
     * @param array|null $attachments
     * @return bool
     */
    public function send(array $recipients, string $subject, string $message, ?array $cc = null, ?array $bcc = null, ?array $attachments = null) {
        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $this->getMailConfig()->getSmtpHost();                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $this->getMailConfig()->getSmtpUsername();                     //SMTP username
            $mail->Password   = $this->getMailConfig()->getSmtpPassword();                               //SMTP password
            $mail->SMTPSecure = $this->getMailConfig()->getSmtpEncryption();         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = $this->getMailConfig()->getSmtpPort();                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom($this->getMailConfig()->getSmtpUsername(), 'System');
            foreach($recipients as $recipient) {
                if (filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
                    $mail->addAddress($recipient);
                }
            }
            if (ArrayUtilus::haveData($cc)) {
                foreach($cc as $recipient) {
                    if (filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
                        $mail->addCC($recipient);
                    }
                }
            }
            if (ArrayUtilus::haveData($bcc)) {
                foreach($bcc as $recipient) {
                    if (filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
                        $mail->addBCC($recipient);
                    }
                }
            }

            //Attachments
            if (ArrayUtilus::haveData($attachments)) {
                foreach($attachments as $attachment) {
                    if (file_exists($attachment)) {
                        $mail->addAttachment($attachment);         //Add attachments
                    }
                }
            }

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = strip_tags($message);


            if ($mail->send()) {
                $this->setMessage('Message has been sent');
                return true;
            }

            $this->setMessage("Error! {$mail->ErrorInfo}");
            return false;
        } catch (Exception $e) {
            $this->setMessage("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
}