<?php



class PdfGenerator extends FPDF {

    // Method to generate a simple PDF with text content
    public function generate($content, $filename = 'document.pdf') {

        $this->AddPage();

        $this->SetFont('Arial', 'B', 16);


        $this->MultiCell(0, 10, $content);

        $this->Output($filename, 'I');
    }

    // Method to generate a PDF with more complex content
    public function generateComplex($data, $filename = 'document.pdf') {
        $this->AddPage();
        $this->SetFont('Arial', 'B', 16);
        
        foreach ($data as $section => $content) {
            $this->Cell(0, 10, $section, 0, 1, 'C');
            $this->SetFont('Arial', '', 12);
            $this->MultiCell(0, 10, $content);
            $this->Ln(10);
            $this->SetFont('Arial', 'B', 16);
        }

        $this->Output($filename,'I');
    }
}
