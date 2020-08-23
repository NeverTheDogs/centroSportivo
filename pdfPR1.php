<?php
if (isset($_POST["pdf"]))
{

    require('fpdf/fpdf.php');
    class PDF extends FPDF
    {
        function Header()
        {
            // Logo
            $this->Image('fpdf/images/logo.png',125,6,75);
            // Arial bold 15
            $this->SetFont('Helvetica','B',15);
            $this->Ln(15);
            // Move to the right
            $this->Cell(120);
            // Title
            $this->Cell(50,10,'Utenti Registrati',1,0,'C');
            // Line break
            $this->Ln(20);
        }

        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        }
        // Load data
        function LoadData($file)
        {
            // Read file lines
            $lines = file($file);
            $data = array();
            foreach($lines as $line)
                $data[] = explode(';',trim($line));
            return $data;
        }
        // Colored table
        function FancyTable($header, $data)
        {
            // Colors, line width and bold font
            $this->SetFillColor(255,0,0);
            $this->SetTextColor(255);
            $this->SetDrawColor(128,0,0);
            $this->SetLineWidth(.3);
            $this->SetFont('','B');
            // Header
            $w = array(32, 17, 50, 30, 30, 75, 30, 10);
            for($i=0;$i<count($header);$i++)
                $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
            $this->Ln();
            // Color and font restoration
            $this->SetFillColor(224,235,255);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Data
            $fill = false;
            foreach($data as $row)
            {
                $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
                $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
                $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
                $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
                $this->Cell($w[4],6,$row[4],'LR',0,'L',$fill);
                $this->Cell($w[5],6,$row[5],'LR',0,'L',$fill);
                $this->Cell($w[6],6,$row[6],'LR',0,'L',$fill);
                $this->Cell($w[7],6,$row[7],'LR',0,'L',$fill);

                $this->Ln();
                $fill = !$fill;
            }
            // Closing line
            $this->Cell(array_sum($w),0,'','T');
        }
    }

    $pdf = new PDF('L','mm','A4');
    $pdf->AliasNbPages();
    $header = array('Codice Fiscale', 'Telefono', 'Email', 'Nome', 'Cognome', 'Indirizzo', 'Grado', 'Sesso');
    $data = $pdf->LoadData('fpdf/data.txt');
    $pdf->SetFont('Times','',8);
    $pdf->AddPage();
    $pdf->FancyTable($header,$data);
    $pdf->Output();
}
else
{	
    echo'<body><br><br>
        <table border="0" align="center" cellpadding="5" cellspacing="5" width="0%">
            <tr>
                <td align="center"><p><strong>--> ERRORE <--</strong></p>
            </tr>
            <tr>
                <td align="center"><p>Non hai il permesso per accedere a questa pagina! </p></td>
            </tr></table>';exit;
}





?>

