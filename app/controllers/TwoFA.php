<?php
    include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
    include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
    include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
    include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';

    class TwoFA extends Controller
    {
        public function __construct()
        {
            $this->loginModel = $this->model('loginModel');
        }

        function generateQRCode($secret) {
            $g = new \Google\Authenticator\GoogleAuthenticator();
            
            $data = [
                'secret' => $secret
            ];
            
            //the "getUrl" method takes as a parameter: "username", "host" and the key "secret"
            return '<img src="'.$g->getURL($_SESSION['user_username'], 'localhost', $secret).'" class="rounded mx-auto d-block"/>';
        }

        public function setup() {
            $qrcode = $this->generateQRCode($_SESSION['secret']);

            $data = [
                'qrcode' =>  $qrcode,
                'msg' => ''
            ];
            
            $user = $this->loginModel->getUser($_SESSION['user_username']);
            if ($user->secret == null) {
                $data['msg'] = 'This 2FA setup will not save until a code is entered.';
            }
            else {
                $data['msg'] = '2FA Already setup.';
                $data['setup'] = true;
            }

            if (isset($_POST['confirm'])) {
                if ($this->check($_SESSION['secret'], $_POST['code'])) {
                    $data = [
                        'secret' => $_SESSION['secret'],
                        'user_id' => $_SESSION['user_id']
                    ];

                    $this->loginModel->addSecret($data);
                    
                    $data = [
                        'qrcode' =>  $qrcode,
                        'msg' => '2FA is now enabled.'
                    ];
                }
                else {
                    $data['msg'] = 'Please reenter the code.';
                }
            }

            $this->view('TwoFA/setup', $data);
        }

        function check($secret, $code) {
            $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
            
            if ($g->checkCode($secret, $code)) {
                return true;
            }
            else {
                return false;
            }
        }
    }
?>