<?php


class Sliders extends Controller
{
    private $sliderModel;

    public function __construct()
    {
        parent::__construct();
        $this->sliderModel =$this->model('Slider');
    }

    public function index()
    {
        return $this->view('slider/index');
    }

    public function create()
    {
        return $this->view('slider/create');
    }

    public function store()
    {
        $image=$_FILES['image'];
        $alt=$_POST['alt'];
        $publish=$_POST['publish'];
        $imageData=$this->uploadImage("slider",$image);
        if ($imageData[1]==true){
            $this->sliderModel->store($imageData[0],$alt,$publish);
            header('location: ' .urlRoot.'/public/sliders/create');
        }else{
            header('location: ' .urlRoot.'/public/sliders/create');
        }
    }
}