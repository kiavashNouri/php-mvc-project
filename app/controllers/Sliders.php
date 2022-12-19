<?php


class Sliders extends Controller
{
    private $sliderModel;

    public function __construct()
    {
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
    }
}