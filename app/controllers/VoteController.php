<?php

class VoteController extends Controller
{
    public function index()
    {
        $data = ["name" => "Vote Page"];
        $this->view('vote/index', $data);
    }

    public function recap($id)
    {
        $vote = new Vote();
        $votedCondidats = $vote->getVotedCondidats($id);
        $data = [
            "success" => "Vote added successfully!",
            "votedCondidats" => $votedCondidats
        ];
        $this->view('vote/recap', $data);
    }

    public function voter()
    {
        $this->view('vote/index');
    }

    public function result()
    {
        $this->view('vote/result');
    }

    public function addVote($userId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $condidatIDs = $_POST['Votedcondidats'];
            $voteModel = new Vote();
            $condidat = new Condidat();
            $user = new User();

            if (!$user->userAlreadyVoted($userId)) {
                if ($voteModel->addVote($userId, $condidatIDs)) {
                    $user->setVote($userId);

                    foreach ($condidatIDs as $condidatID) {
                        $condidat->incrementVoix($condidatID);
                    }
                    $this->recap($userId);
                } else {
                    $data = ["error" => "Error. Can't add vote."];
                    $this->view('vote/index', $data);
                }
            } else {
                $data = ["error" => "Already voted!"];
                $this->view('vote/index', $data);
            }
        }
    }

    public function showCondidat()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $condidat = new Condidat();
            $condidats = $condidat->getAllCondidats();

            echo '<table class="table table-striped table-hover table-bordered">';
            echo "
                <tr>
                    <td>#</td>
                    <td>Nom</td>
                    <td>Description</td>
                    <td>Nombre de votes</td>
                </tr>
            ";

            $i = 0;
            foreach ($condidats as $condidat) {
                ++$i;
                echo "
                    <tr>
                        <td>{$i}</td>
                        <td>{$condidat['name']}</td>
                        <td>{$condidat['description']}</td>
                        <td>{$condidat['voix']}</td>
                    </tr>
                ";
            }
            echo '</table>';
        }
    }
}