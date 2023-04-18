<?php


class Categories extends Controller
{
    private $categoryModel;
    public function __construct()
    {
        parent::__construct();
        $this->categoryModel =$this->model("Category");
    }

    public function index()
    {
        $data=['category'=>$this->categoryModel->selectAll()];
        return $this->view('category/index',$data);
    }

    public function create()
    {
        $data = [
            'title' => "",
            'alt' => "",
            'description' => "",
            'image' => "",
            'title_err' => "",
            'alt_err' => "",
            'description_err' => "",
            'image_err' => "",
        ];
        $this->view('category/create',$data);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST =filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                'title' => $_POST['title'],
                'alt' => $_POST['alt'],
                'description' => $_POST['description'],
                'image' => $_FILES['image'],
                'title_err' => "",
                'alt_err' => "",
                'description_err' => "",
                'image_err' => "",
            ];
            $directory = urlImage . '/category/' . $data['image']['name'];
            $fileType = pathinfo($directory, PATHINFO_EXTENSION);
            if ($data['image']['size'] > 1000000) {
                $data['image_err'] = 'سایز عکس بیشتر از 1mb است';
            }
            if (!empty($data['image']['name'])){
                if ($fileType !== 'jpg' && $fileType !== 'png' && $fileType !== 'gif' && $fileType !== 'jpeg' && $fileType !== 'webp') {
                    $data['image_err'] = 'عکس بفرست';
                }
            }

            if (empty($data['image']['name'])) {
                $data['image_err'] = 'مقدار عکس را وارد کنید';
            }
            if (empty($data['title'])) {
                $data['title_err'] = 'مقدار عنوان را وارد کنید';
            }
            if (empty($data['alt'])) {
                $data['alt_err'] = 'مقدار alt را وارد کنید';
            }
            if (empty($data['description'])) {
                $data['description_err'] = 'مقدار توضیح را وارد کنید';
            }


            if (empty($data['title_err']) && empty($data['description_err']) && empty($data['image_err']) && empty($data['alt_err'])){
                $data['image'] = $this->uploadImage('category', $data['image']);
                $this->categoryModel->store($data);
                $_SESSION['create'] = 'دیتا درج شد';
                redirect('categories/create');
            }else{
                return $this->view('category/create',$data);
            }

        }
    }
}