<?php 



class HomeController extends Controller
{
    public function index()
    {
        $data = ["name"=>"Home Page"];
        $this->view('home',$data);
    }

    
    // A function to generate a pdf
    public function generatePdf($id) {
            $pdf = new PdfGenerator();
            $vote = new Vote();
            $User = new User();
            $info = $User ->getUserByID($id);
            $condidat = new Condidat();
            $data = [
                "condidats" => $condidat->getAllCondidats(),
                "condidats_by_user" => $vote->getVotedCondidats($id),
                "vote_date" => $vote->getVotedDate($id),
                "current_date" => getCurrentDate(),
                "user" => $info['fname']." ".$info['lname'],
            ];

            // Generate and output the PDF with complex content
            $pdf->generateComplex($data,$info['fname']."_".$info['lname']);
    }
    
}