<?php
include_once dirname(APPROOT) . '/vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
include_once dirname(APPROOT) . '/vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
include_once dirname(APPROOT) . '/vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
include_once dirname(APPROOT) . '/vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';


class Login extends Controller
{

    public function __construct()
    {
        $this->loginModel = $this->model('loginModel');
    }

    public function index()
    {
        if (!isset($_POST['login'])) {
            $this->view('Login/index');
        } else {
            $user = $this->loginModel->getUser($_POST['username']);

            if ($user != null) {
                $hashed_pass = $user->pass_hash;
                $password = $_POST['password'];
                $secret = $user->secret;
                $code = $_POST['code'];
                if (password_verify($password, $hashed_pass)) {
                    if ($user->secret != null) {
                        if (!empty($code)) {
                            if (check($secret, $code)) {
                                $this->createSession($user);
                                $data = [
                                    'msg' => "Welcome, $user->username!",
                                ];
                                $this->view('Home/home', $data);
                            } else {
                                $data = [
                                    'msg' => "2FA Code incorect/expired for $user->username",
                                ];
                                $this->view('Login/index', $data);
                            }
                        } else {
                            $data = [
                                'msg' => "Please enter the 2FA code for $user->username",
                            ];
                            $this->view('Login/index', $data);
                        }
                    } else {
                        $this->createSession($user);
                        // $data = [
                        //     'msg' => "Welcome, $user->username!",
                        // ];
                        // $this->view('Home/home', $data);
                        header('Location: /Quiz');
                    }
                } else {
                    $data = [
                        'msg' => "Password incorrect! for $user->username",
                    ];
                    $this->view('Login/index', $data);
                }
            } else {
                $data = [
                    'msg' => "User: " . $_POST['username'] . " does not exists",
                ];
                $this->view('Login/index', $data);
            }
        }
    }

    public function create()
    {
        if (!isset($_POST['signup'])) {
            $this->view('Login/create');
        } else {
            $user = $this->loginModel->getUser($_POST['username']);
            if ($user == null) {
                $data = [
                    'username' => trim($_POST['username']),
                    'email' => $_POST['email'],
                    'pass' => $_POST['password'],
                    'pass_verify' => $_POST['verify_password'],
                    'pass_hash' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'username_error' => '',
                    'password_error' => '',
                    'password_match_error' => '',
                    'password_len_error' => '',
                    'msg' => '',
                    'email_error' => ''
                ];
                if ($this->validateData($data)) {
                    if ($this->loginModel->createUser($data)) {
                        echo '
                        <div class="text-center">
                        <div class="spinner-border" role="status">
                          <span class="sr-only">Please wait creating the account for ' . trim($_POST["username"]) . '</span>
                        </div>
                      </div>';
                        echo '<meta http-equiv="Refresh" content="2; url=/Quiz/Login/">';
                    }
                }
            } else {
                $data = [
                    'msg' => "User: " . $_POST['username'] . " already exists",
                ];
                $this->view('Login/create', $data);
            }
        }
    }

    public function validateData($data)
    {
        if (empty($data['username'])) {
            $data['username_error'] = 'Username can not be empty';
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email_error'] = 'Please check your email and try again';
        }
        if (strlen($data['pass']) < 6) {
            $data['password_len_error'] = 'Password can not be less than 6 characters';
        }
        if ($data['pass'] != $data['pass_verify']) {
            $data['password_match_error'] = 'Password does not match';
        }

        if (empty($data['username_error']) && empty($data['password_error']) && empty($data['password_len_error']) && empty($data['password_match_error'])) {
            return true;
        } else {
            $this->view('Login/create', $data);
        }
    }

    public function createSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_username'] = $user->username;



        if ($user->isAdmin == 1) {
            $_SESSION['admin'] = true;
        }

        $user = $this->loginModel->getUser($_SESSION['user_username']);

        //user without code
        if ($user->secret == null) {
            $_SESSION['secret'] = $this->generateSecret();
        }
        //user with code
        else {
            $_SESSION['secret'] = $user->secret;
        }
    }

    function generateSecret()
    {
        $g = new \Google\Authenticator\GoogleAuthenticator();
        $secret = $g->generateSecret();

        return $secret;
    }

    function check($secret, $code)
    {
        $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();

        if ($g->checkCode($secret, $code)) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_username']);
        unset($_SESSION['secret']);
        session_destroy();

        echo '<meta http-equiv="Refresh" content="1; url=/Quiz/Login/">';
    }
}
