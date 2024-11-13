<?php

class EmailService {
    public function sendVerificationEmail($to, $link) {
        $subject = 'Email Verification';
        
        // HTML content
        $message = '
                    <html>
                        <head>
                            <title>Email Verification</title>
                        </head>
                        <body>
                            <p>Click the following link to verify your email:</p>
                            <p><a href="' . $link . '">Verify Email</a></p>
                        </body>
                    </html>
                ';
        
        // Headers for HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: elaaddamomar13@gmail.com' . "\r\n" .
                    'Reply-To: elaaddamomar13@gmail.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

        // Send the email
        mail($to, $subject, $message, $headers);
    }
}

