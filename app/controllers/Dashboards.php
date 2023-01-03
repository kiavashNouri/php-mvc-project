<?php


class Dashboards extends Controller
{
    private $dashboardModel;

    public function __construct()
    {
        parent::__construct();
        $this->dashboardModel = $this->model("Dashboard");

    }

    public function index()
    {
        $data = ['dashboard' => $this->dashboardModel->selectAll()];
        return $this->view('dashboard/index', $data);

    }

    public function create()
    {
        return $this->view('dashboard/create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'image' => $_FILES['image'],
                'title' => trim($_POST['title']),
                'link' => trim($_POST['link']),
                'image_err' => "",
                'title_err' => "",
                'link_err' => "",
            ];
            $directory = urlRoot . '/public/images/dashboard/' . $data['image']['name'];
            $fileType = pathinfo($directory, PATHINFO_EXTENSION);
            if (empty($data['image']['name'])) {
                $data['image_err'] = 'مقدار عکس الزامی است';
            } elseif ($data['image']['size'] > 1000000) {
                $data['image_err'] = 'سایز عکس بیشتر از 1mb است';
            } elseif ($fileType !== 'jpg' && $fileType !== 'png' && $fileType !== 'gif' && $fileType !== 'jpeg' && $fileType !== 'webp') {
                $data['image_err'] = 'عکس بفرست';
            }
            if (empty($data['title'])) {
                $data['title_err'] = 'مقدار پنل را وارد کنید';
            }
            if (empty($data['link'])) {
                $data['link_err'] = 'مقدار لینک را وارد کنید';
            }

            if (empty($data['image_err']) && empty($data['title_err']) && empty($data['link_err'])) {
                $data['image'] = $this->uploadImage('dashboard', $data['image']);
                $this->dashboardModel->store($data);
                $_SESSION['create'] = 'دیتا درج شد';
                redirect('dashboards/index');
            } else {
                return $this->view('dashboard/create', $data);
            }
        } else {
            $data = [
                'image' => "",
                'title' => "",
                'link' => "",
                'image_err' => "",
                'title_err' => "",
                'link_err' => "",
            ];

            return $this->view('dashboard/create', $data);
        }

    }

    public function details()
    {
        $data = ['dashboard' => $this->dashboardModel->selectAll()];
        return $this->view('dashboard/details', $data);
    }

    public function delete($id)
    {
        $id = intval($id);
        $record = $this->dashboardModel->selectId($id);
        if (file_exists("../public/images/dashboard/" . $record->image)) {
            unlink("../public/images/dashboard/" . $record->image);
        }
        $this->dashboardModel->delete($id);
        $_SESSION['delete'] = 'با موفقیت حذف شد';
        redirect("dashboards/details");

    }


    public function edit($id)
    {
        $id = intval($id);
        $record = $this->dashboardModel->selectId($id);
        $data = [
            'id' => $record->id,
            'image' => $record->image,
            'links' => $record->link,
            'title' => $record->title,
            'image_err' => "",
            'title_err' => "",
            'link_err' => "",
        ];
        return $this->view('dashboard/edit', $data);

    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "id"=>$id,
                'image' => $_FILES['image'],
                'title' => trim($_POST['title']),
                'link' => trim($_POST['link']),
                'image_err' => "",
                'title_err' => "",
                'link_err' => "",
            ];
            $directory = urlImage . '/dashboard/' . $data['image']['name'];
            $fileType = pathinfo($directory, PATHINFO_EXTENSION);
            if ($data['image']['size'] > 1000000) {
                $data['image_err'] = 'سایز عکس بیشتر از 1mb است';
            }
            if (!empty($data['image']['name'])){
                if ($fileType !== 'jpg' && $fileType !== 'png' && $fileType !== 'gif' && $fileType !== 'jpeg' && $fileType !== 'webp') {
                    $data['image_err'] = 'عکس بفرست';
                }
            }
            if (empty($data['title'])) {
                $data['title_err'] = 'مقدار پنل را وارد کنید';
            }
            if (empty($data['link'])) {
                $data['link_err'] = 'مقدار لینک را وارد کنید';
            }

            if (empty($data['image_err']) && empty($data['title_err']) && empty($data['link_err'])) {
                $record = $this->dashboardModel->selectId($id);
                var_dump($record);
                if (!empty($data['image' ]['name'])){
                    if (file_exists("../public/images/dashboard/" . $record->image)) {
                        unlink("../public/images/dashboard/" . $record->image);
                    }
                    $data['image'] = $this->uploadImage('dashboard', $data['image']);
                }else{
                    $data['image'] = $record->image;
                }
                $this->dashboardModel->update($data);
                redirect('dashboards/details');
            } else {
                $data['image']=$this->dashboardModel->selectId($id)->image;
                return $this->view('dashboard/edit', $data);
            }

        }
    }
}