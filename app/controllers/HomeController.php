<?php 



class HomeController extends Controller
{
    public function index()
    {
        $data = ["name"=>"Home Page"];
        $this->view('home',$data);
    }

    
    public function generatePdf() {
        if (isset($_POST['generate'])){
            $pdf = new PdfGenerator();
            $content = "Hello, World! This is a PDF document.";

            // Generate and output the PDF
            $pdf->generate($content);
        }
    }

    public function generateComplexPdf() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $pdf = new PdfGenerator();
            $data = [
                "Introduction" => "This is the introduction section.",
                "Main Content" => "Here is the main content of the document.",
                "Conclusion" => "This is the conclusion of the document."
            ];

            // Generate and output the PDF with complex content
            $pdf->generateComplex($data);
        }
    }
    
}