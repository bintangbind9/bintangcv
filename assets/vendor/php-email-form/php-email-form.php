<?php
    class PHP_Email_Form
    {
        public $to, $from_name, $from_email, $subject, $message;

        public function add_message($value, $title)
        {
            $message = "\n". $message . $title . ": " . $value;
        }

        public function send()
        {
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );

            $headers = "From:" . $from_email;
            mail($to, $subject, $message, $headers);
            echo "The email message was sent.";
        }
    }
?>