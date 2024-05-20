<?php

// require_once EMAIL . "EmailService.php";

class AuthController extends Controller {
    private $emailService;

    public function __construct() {
        $this->emailService = new EmailService();
    }

    public function index() {
        $data = ["name" => "Login Page"];
        $this->view('login', $data);
    }

    public function signup() {
        $data = ["name" => "Registration Page"];
        $this->view('register', $data);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new User();
            $userData = $user->getUserByEmail($email);

            if ($userData && password_verify($password, $userData['password'])) {
                if ($userData['status'] === 'verified') {
                    session_start();
                    $_SESSION['user'] = $userData;
                    $_SESSION['user_id'] = $userData['id'];
                    header("Location: " .SITE_NAME."vote/index");
                    // $this->view('vote/index');
                    exit;
                } else {
                    $data = ["failed" => "Your email is not verified. Please check your email for the verification link."];
                    $this->view('login', $data);
                }
            } else {
                $data = ["failed" => "Login failed. Invalid email or password!"];
                $this->view('login', $data);
            }
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $verificationCode = bin2hex(random_bytes(16));

            $user = new User();

            if ($user->createUser($fname, $lname, $email,$username, $password, $verificationCode)) {
                $verificationLink = SITE_NAME."verify.php?code=$verificationCode";
                $this->emailService->sendVerificationEmail($email, $verificationLink);
                $data = ["success" => "Registration successful. A verification email has been sent to your email address."];
                $this->view('register', $data);
            } else {
                $data = ["error" => "Registration failed.email might already be taken."];
                $this->view('register', $data);
            }
        }
    }

    public function verify($code) {
        session_start(); // Start session
        $user = new User();
        if ($user->verifyUser($code)) {

            // Set success message in session
            $_SESSION['success_message'] = "Email verified successfully, Login to your account!";
            // Redirect to index page
            header("Location: " . SITE_NAME . "auth/index");
            exit;

        } else {
            echo 'Invalid or expired verification link.';
        }
    }


    /**
     * Function to logout
    */

    public function logout(){
        session_start();
        session_destroy();
        $this->view('login');
    }

}
