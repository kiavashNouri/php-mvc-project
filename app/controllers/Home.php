<?php


class Home extends controller
{
    private $sliderModel;
    private $categoryModel;
    public function __construct()
    {
        parent::__construct();
        $this->sliderModel =$this->model('Slider');
        $this->categoryModel =$this->model('Category');
    }

    public function index()
    {
        $data=['slider'=>$this->sliderModel->fetchAll(),
            'category'=>$this->categoryModel->selectAll()
            ];
        return $this->view('home/index',$data);
    }
}