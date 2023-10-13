<?php
namespace App\Controllers;

    use App\Helper\Session;
    use App\Models\Client;
    use App\Models\Post;
    use App\Models\Vehicle;
    use \Core\View;
    use \Core\Controller;


    class SliderController extends Controller
    {

    public function __construct()
    {
        $this->session = Session::getInstance();
        if (!$this->session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }


    }

    public function index()
    {

        $posts = Post::orderBy('id')->get();
        $loggedInUser = $this->session->user;
        View::renderTemplate('Sliders/index.html', [
            'posts' => $posts,
            'username' => $loggedInUser]);

    }



    public function create()
    {
        $loggedInUser = $this->session->user;
        View::renderTemplate('Sliders/create.html',[
          'username' => $loggedInUser
      ]);
    }

    public function store()
    {
      $photos = [];
      $file_tmp = $_FILES['image1']['tmp_name'];
      $file_name1 = $_FILES['image1']['name'];
      $photos[] = $file_name1;
      move_uploaded_file($file_tmp, "../public/uploads/" . $file_name1);

      $photos = json_encode($photos);

      $post = new Post();
      $post->image = $photos;
      $post->title = $_POST['title'];
      $post->paragraph = $_POST['paragraph'];
      $post->save();
      header("Location: /sliders");
    }


    public function edit()
    {
        $loggedInUser = $this->session->user;
        $id = $_GET['id'];
        $post = Post::find($id);
        $post->image = json_decode($post->image);
        View::renderTemplate('Sliders/edit.html',[
            'post' => $post,
            'username' => $loggedInUser]);

    }

    public function update()
    {

        $id = $_POST['id'];
        $post = Post::find($id);
        $photos = json_decode($post->image);

        for ($i = 1; $i <= 5; $i++) {
            $photoKey = 'photo' . $i;

            // Check if a new file is uploaded for the current photo
            if (isset($_FILES[$photoKey]) && $_FILES[$photoKey]['error'] !== UPLOAD_ERR_NO_FILE) {
                $file_tmp = $_FILES[$photoKey]['tmp_name'];
                $file_name = $_FILES[$photoKey]['name'];
                // Update the photo with the new file
                $photos[$i - 1] = $file_name;
                move_uploaded_file($file_tmp, "../public/uploads/" . $file_name);
            }
        }

        $vehicle->image = json_encode($photos);
        $post->title = $_POST['title'];
        $post->paragraph = $_POST['paragraph'];



    }

    public function delete()
    {
        $id = $_GET['id'];
        $post = Post::find($id);
        $post->delete();
        header("Location: /sliders");
    }



    }
