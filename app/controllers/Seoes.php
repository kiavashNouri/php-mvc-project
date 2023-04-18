<?php


class Seoes extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function create()
    {
        $data = [
            'title' => "",
            'keywords' => "",
            'description' => "",
            'author' => "",
            'title_err' => "",
            'keywords_err' => "",
            'description_err' => "",
            'author_err' => "",
        ];
        $this->view('seo/create',$data);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST =filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                'title' => $_POST['title'],
                'keywords' => $_POST['keywords'],
                'description' => $_POST['description'],
                'author' => $_POST['author'],
                'title_err' => "",
                'keywords_err' => "",
                'description_err' => "",
                'author_err' => "",
            ];
            if (empty($data['title'])){
                $data['title_err'] ='موضوع رو وارد کن';
            }elseif (strlen($data['title'])>70){
                $data['title_err'] ='نباید بیشتر از 70 کاراکتر باشه';
            }
            if (empty($data['description'])){
                $data['description_err'] ='توضیحات رو وارد کن';
            }elseif (strlen($data['description'])>155){
                $data['description_err'] ='نباید بیشتر از 155 کاراکتر باشه';
            }
            if (empty($data['keywords'])){
                $data['keywords_err'] ='کلمات کلیدی رو وارد کن';
            }elseif (strlen($data['keywords'])>20){
                $data['keywords_err'] ='نباید بیشتر از 20 کلمه  باشه';
            }
            if (empty($data['author'])){
                $data['author_err'] ='نویسنده رو وارد کن';
            }

            if (empty($data['title_err']) && empty($data['description_err']) && empty($data['keywords_err']) && empty($data['author_err'])){

            }else{
                return $this->view('seo/create',$data);
            }
        }
    }
}