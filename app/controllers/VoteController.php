<?php 



class VoteController extends Controller
{
    public function index()
    {
        $data = ["name"=>"Vote Page"];
        $this->view('vote/index',$data);
    }

    public function voter()
    {
        return $this->view('vote/index');
    }

    public function result()
    {
        return $this->view('vote/result');
    }

    public function addVote() {
        $userId = $_POST['user_id'];
        $productId = $_POST['product_id'];

        $voteModel = new Vote();
        if ($voteModel->addVote($userId, $productId)) {
            echo "Vote added successfully!";
        } else {
            echo "Failed to add vote.";
        }
    }
}