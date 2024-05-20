<?php


class PdfGenerator extends FPDF {
    
    
    public function generateComplex($data, $filename = 'document.pdf') {

        $this->AddPage();

        // Set font for the title
        $this->SetFont('Arial', 'B', 16);
    
        // Center the image
        $imageWidth = 60; // Adjust the width of the image as needed
        $imageX = ($this->GetPageWidth() - $imageWidth) / 2;
        $this->Image('C:\xampp\htdocs\PHP CI\vote-system\public\assets\images\logo.png', $imageX, 10, $imageWidth);
    
        // Add a line below the image
        $this->Ln(35); // Adjust the vertical position as needed
        $this->Line(10, $this->GetY(), $this->GetPageWidth() - 10, $this->GetY()); // Horizontal line
    
        // Title
        $this->Ln(10); // Add some space below the line
        $this->Cell(0, 10, 'Vote Report', 0, 1, 'C');
        $this->Ln(10);
    
        // Vote Date
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Vote Date: ' . $data['vote_date'], 0, 1, 'C');
        $this->Ln(10);
    
        // Center the tables
        $tableWidth = 150; // Adjust the width of the table as needed
        $tableX = ($this->GetPageWidth() - $tableWidth) / 2;
    
        // Table of All Candidates
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'All Candidates', 0, 1, 'C');
        $this->Ln(5);
    
        foreach ($data['condidats'] as $candidate) {
            $this->SetX($tableX); // Set X position for the table
            $this->Cell(50, 10, $candidate['name'], 1, 0, 'C');
            $this->Cell(100, 10, $candidate['description'], 1, 1, 'C');
        }
    
        $this->Ln(10);
    
        // Voted Candidates by User
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Voted Candidates by : ' . $data['user'], 0, 1, 'C');
        $this->Ln(5);
    
        foreach ($data['condidats_by_user'] as $voted_candidate) {
            $this->SetX($tableX); // Set X position for the table
            $this->Cell(50, 10, $voted_candidate['name'], 1, 0, 'C');
            $this->Cell(100, 10, $voted_candidate['description'], 1, 1, 'C');
        }
    
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Done in Marrakech on : ' . $data['current_date'], 0, 1, 'C');
    
        // Output PDF
        $this->Output($filename,'I');
    }
    
}
