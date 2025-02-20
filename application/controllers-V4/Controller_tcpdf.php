<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_tcpdf extends CI_Controller {
  
    function __construct()
    {
        parent::__construct();
        $this->load->library("Pdf");
         $this->load->model('scolarite_modele');
         $this->load->helper('form');
         $this->load->library('form_validation');
         $this->load->helper('date');
         $this->load->library('email');
         $this->load->library('session');
         $this->load->library('upload');
         $this->load->library('email');
      $this->load->library("Pdf");
         $this->load->helper('url');
         $this->load->helper('html');
    }
  
    public function create_pdf() {
    //============================================================+
    // File name   : example_001.php
    //
    // Description : Example 001 for TCPDF class
    //               Default Header and Footer
    //
    // Author: Muhammad Saqlain Arif
    //
    // (c) Copyright:
    //               Muhammad Saqlain Arif
    //               PHP Latest Tutorials
    //               http://www.phplatesttutorials.com/
    //               saqlain.sial@gmail.com
    //============================================================+
 
   
  
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetAuthor('Cheikh Dhib');
$pdf->SetTitle('Ministère de l\'Enseignement Supérieur et de la Recherche Scientifique');
$pdf->SetSubject('Ecole  Supérieure Polytechnique ');
$pdf->SetKeywords('Institut Supérieur des Metiers de la Statistique');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 031', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'Example of PieSector() method.');

$xc = 105;
$yc = 100;
$r = 50;

$pdf->SetFillColor(0, 0, 255);
$pdf->PieSector($xc, $yc, $r, 20, 120, 'FD', false, 0, 2);

$pdf->SetFillColor(0, 255, 0);
$pdf->PieSector($xc, $yc, $r, 120, 200, 'FD', false, 0, 2);

$pdf->SetFillColor(255, 0, 0);
$pdf->PieSector($xc, $yc, $r, 200, 250, 'FD', false, 0, 2);
$pdf->SetFillColor(255, 111, 0);
$pdf->PieSector($xc, $yc, $r, 250, 20, 'FD', false, 0, 2);

// write labels
$pdf->SetTextColor(255,255,255);
$pdf->Text(105, 65, 'MAN');
$pdf->Text(60, 95, 'MAEF');
$pdf->Text(120, 115, 'RXTEL');
$pdf->Text(65, 120, 'LGTR');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_031.pdf', 'I');

    //============================================================+
    // END OF FILE
    //============================================================+
    }
     function afficher_stat()
    {
        $idProgramme = $_POST['idProgramme'];
        $annee = $_POST['annee'];
        $res=$this->scolarite_modele->getStat($idProgramme, $annee);
        //print_r($res[0]);
        $data=array('annee'=>$annee, 'idProgramme'=>$idProgramme, 'data'=>$res);
         
           // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Cheikh DHIB');
$pdf->SetTitle('Ministère de l\'Enseignement Supérieur et de la Recherche Scientifique');
$pdf->SetSubject('Ecole  Supérieure Polytechnique ');
$pdf->SetKeywords('Institut Supérieur des Metiers de la Statistique');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 031', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();
$pdf->Write(0, 'Statistiques', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);
$somme=$res[0]['nbEtu3']+$res[0]['nbEtu2']+$res[0]['nbEtu1']+$res[1]['nbEtu3']+$res[1]['nbEtu2']+$res[1]['nbEtu1']+$res[2]['nbEtu3']+$res[2]['nbEtu2']+$res[2]['nbEtu1']+$res[3]['nbEtu3']+$res[3]['nbEtu2']+$res[3]['nbEtu1'];
$res[0]['nbEtu3']=($res[0]['nbEtu3']/$somme)*100;
$res[1]['nbEtu3']=($res[1]['nbEtu3']/$somme)*100;
$res[2]['nbEtu3']=($res[2]['nbEtu3']/$somme)*100;
$res[3]['nbEtu3']=($res[3]['nbEtu3']/$somme)*100;

$res[0]['nbEtu2']=($res[0]['nbEtu2']/$somme)*100;
$res[1]['nbEtu2']=($res[1]['nbEtu2']/$somme)*100;
$res[2]['nbEtu2']=($res[2]['nbEtu2']/$somme)*100;
$res[3]['nbEtu2']=($res[3]['nbEtu2']/$somme)*100;


$res[0]['nbEtu1']=($res[0]['nbEtu1']/$somme)*100;
$res[1]['nbEtu1']=($res[1]['nbEtu1']/$somme)*100;
$res[2]['nbEtu1']=($res[2]['nbEtu1']/$somme)*100;
$res[3]['nbEtu1']=($res[3]['nbEtu1']/$somme)*100;
// -----------------------------------------------------------------------------

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td ></td>
        <td>LGTR</td>
        <td>MAEF</td>
        <td>MAN</td>
        <td>RXTEL</td>
    </tr>
    <tr>
        <td >L1</td>
         <td> {$res[0]['nbEtu1']}%</td>
        <td>{$res[1]['nbEtu1']}%</td>
        <td>{$res[2]['nbEtu1']}%</td>
        <td> {$res[3]['nbEtu1']}%</td>
    </tr>
    <tr>
       <td >L2</td>
         <td> {$res[0]['nbEtu2']}%</td>
        <td>{$res[1]['nbEtu2']}%</td>
        <td>{$res[2]['nbEtu2']}%</td>
        <td> {$res[3]['nbEtu2']}%</td>
    </tr>
        <tr>
       <td >L3</td>
         <td> {$res[0]['nbEtu3']}%</td>
        <td>{$res[1]['nbEtu3']}%</td>
        <td>{$res[2]['nbEtu3']}%</td>
        <td> {$res[3]['nbEtu3']}%</td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_031.pdf', 'I');

    //============================================================+
    // END OF FILE
    //============================================================+
    
    }
     //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
         function list_etu_salle_exam() 
    {
        $programme=$_POST['idProgramme'];
        $niveau=$_POST['niveau'];
        $salle=$_POST['salle'];
        
       $data = $this->scolarite_modele->list_etu_salle_exam($programme,$niveau,$salle);
       
          
           // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Cheikh Dhib');
$pdf->SetTitle('Ministère de l\'Enseignement Supérieur et de la Recherche Scientifique');
$pdf->SetSubject('Ecole  Supérieure Polytechnique ');
$pdf->SetKeywords('Institut Supérieur des Metiers de la Statistique');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 031', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();
$pdf->Write(0, 'Listes des étudiants par salle d\' examen', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------

$data1 = "";
$data1['idProgramme'][]="";
$data1['no_exam'][]="";
$data1['matriculeetudiant'][]="";
$data1['nom_c'][]="";
$data1['id_salle'][]="";
foreach($data as $d) {
  $data1['idProgramme'][] = $d->idProgramme;
  $data1['no_exam'][] = $d->no_exam;
  $data1['matriculeetudiant'][] = $d->matriculeetudiant;
  $data1['nom_c'][] = $d->nom_c;
  $data1['id_salle'][] = $d->id_salle;
}
$imp1 = implode('<br />', $data1['idProgramme']);
$imp2 = implode('<br />', $data1['no_exam']);
$imp3 = implode('<br />', $data1['matriculeetudiant']);
$imp4 = implode('<br />', $data1['nom_c']);
$imp5 = implode('<br />', $data1['id_salle']);


$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td >Filière</td>
        <td>No exam</td>
        <td>No. Ins.</td>
        <td>Nom & prénom</td>
        <td>Salle</td>
    </tr>
    <tr>
        <td >{$imp1}</td>
         <td>{$imp2}</td>
        <td>{$imp3}</td>
        <td>{$imp4}</td>
        <td>{$imp5}</td>
    </tr>
   

</table>
EOD;
        $e="1,2,3,4,5";
//$arr=explode(',',$data);
$tbl='
<table cellspacing="0" cellpadding="1" border="1">
    ';
foreach ($data as $e){
$tbl .= '

    <tr>
        <td>'.$data->idProgramme.'</td>
        <td>COL 3 - ROW 2</td>
    </tr>'
    ;

}
$tbl.='

</table>
';

$pdf->writeHTML($tbl, true, false, false, false, '');


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('etudiant_par_salle.pdf', 'I');
       
    }
}

  
/* End of file c_test.php */
/* Location: ./application/controllers/c_test.php */
