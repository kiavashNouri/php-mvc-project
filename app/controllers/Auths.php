<?php
class Auths extends Controller
{
    private $authModel;

    public function __construct()
    {
//        session_start();
        parent::__construct();
        $this->authModel = $this->model("Auth");
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'fullName' => trim($_POST['fullName']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'fullName_err' => "",
                'email_err' => "",
                'password_err' => "",
                'confirm_password_err' => ""
            ];
            if (empty($data['fullName'])) {
                $data['fullName_err'] = 'نام و نام خانوادگی الزیامیست';
            }
            if (empty($data['email'])) {
                $data['email_err'] = 'مقدار ایمیل الزامیست';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'فرمت ایمیل صحیح نیست';
            }
            elseif($this->authModel->findUserEmail($data)){
                $data['email_err'] = 'این ایمیل وجود داره'.$data['email'];
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'مقدار پسورد الزامیست';
            } elseif (strlen($data['password']) < 6) {
                $data['email_err'] = 'بیشتر از 6 کاراکتر باید باشد';
            }



            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'مقدار تکمیل پسورد الزامیست';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['password_err'] = 'پسورد ها یکی نیستن';
            }


//            if have not error,register user
            if (empty($data['email_err']) && empty($data['fullName_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
                if ($this->authModel->register($data)){
                    $_SESSION['register']='register successfully';
                    redirect('auths/login');
                }else{
                   die('error system');
                }
            }else{
                die('2نشد');
//                return $this->view('Auth/register', $data);
            }
        }else {
            $data = [
                'fullName' => "",
                'email' => "",
                'password' => "",
                'confirm_password' => "",
                'fullName_err' => "",
                'email_err' => "",
                'password_err' => "",
                'confirm_password_err' => "",
            ];
//            var_dump("ali");

            return $this->view('Auth/register', $data);
        }
    }

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => "",
                'password_err' => "",

            ];
            if (empty($data['email'])) {
                $data['email_err'] = 'مقدار ایمیل الزامیست';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'فرمت ایمیل صحیح نیست';
            }elseif(!$this->authModel->findUserEmail($data)){
                $data['email_err'] = 'چنین کاربری نیست،ثبت نام کنید';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'مقدار پسورد الزامیست';
            }
            elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'بیشتر از 6 کاراکتر باید باشد';
            }elseif (!$this->authModel->login($data)){
                $data['password_err'] = 'پسورد صحیح نیست';

            }
            if (empty($data['email_err']) && empty($data['password_err'])) {
                $loginAuth=$this->authModel->login($data);
                if ($loginAuth){
                    $this->createSessionAuth($loginAuth);
                    redirect('dashboards/index');
                }
            }else{
                return $this->view('Auth/login', $data);
            }
        }else{

            $data = [
                'email' => "",
                'password' => "",
                'email_err' => "",
                'password_err' => "",
            ];

            return $this->view('Auth/login',$data);
        }

    }

    public function createSessionAuth($auth)
    {
        $_SESSION['id']=$auth->id;
        $_SESSION['fullName']=$auth->fullName;
        $_SESSION['email']=$auth->email;
    }


    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['fullName']);
        unset($_SESSION['email']);
        session_destroy();
        redirect('auths/login');
    }

}

