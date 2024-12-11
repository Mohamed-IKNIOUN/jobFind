<?php

use Dompdf\Dompdf;
use Dompdf\Options;

function generatePDF($htmlContent, $filename = 'document.pdf')
{
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true); // Enable if your page includes remote resources like images

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($htmlContent);
    $dompdf->setPaper('A4', 'portrait'); // Change to landscape if needed
    $dompdf->render();

    // Stream the PDF to the browser for download
    $dompdf->stream($filename, ['Attachment' => true]);
}
