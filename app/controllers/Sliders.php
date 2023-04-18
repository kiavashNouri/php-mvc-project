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
        $slider=$this->sliderModel->fetchAll();
        $data=["slider"=>$slider];
        return $this->view('slider/index',$data);
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
        if ($imageData==true){
            $this->sliderModel->store($imageData,$alt,$publish);
            header('location: ' .urlRoot.'/public/sliders/create');
        }else{
            header('location: ' .urlRoot.'/public/sliders/create');
        }
    }

    public function details()
    {
        $slider=$this->sliderModel->fetchAll();
        $data=["slider"=>$slider];
//        var_dump($data);
        return $this->view('slider/details',$data);

    }

    public function delete($id)
    {
//        var_dump($id);
        $sliderPrev=$this->sliderModel->fetch($id);
        if (file_exists("../public/images/slider/".$sliderPrev->image)){
            unlink("../public/images/slider/".$sliderPrev->image);
        }
        $this->sliderModel->delete($id);
        $_SESSION['delete']="با موفقیت حذف شد";
        header('location:'.urlRoot."/public/sliders/details");
    }
}