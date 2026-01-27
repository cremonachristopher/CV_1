<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageData = "";
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $path = $_FILES['photo']['tmp_name'];
        $type = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $imageData = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    $html = '
    <html>
    <head>
        <meta charset="UTF-8">
        <style>
            /* Supprime les marges de la page et empêche les sauts de page */
            @page { margin: 0px; }
            body { 
                font-family: "Helvetica", sans-serif; 
                margin: 0px; 
                padding: 0px;
                line-height: 1.2;
                background: #fff;
            }

            /* La sidebar est positionnée de façon absolue pour ne pas pousser le contenu */
            .sidebar {
                position: absolute;
                right: 0;
                top: 0;
                bottom: 0;
                width: 30%;
                background-color: #212529;
                color: #ffffff;
                padding: 40px 20px;
                height: 100%; /* Remplit toute la hauteur de la page 1 */
            }

            /* Le contenu principal à gauche */
            .main-content {
                width: 60%;
                margin-right: 35%;
                padding: 40px;
            }

            h1 { font-size: 26pt; margin: 0; font-weight: bold; text-transform: uppercase; }
            .headline { font-size: 16pt; color: #6c757d; margin-bottom: 20px; }
            h4 { font-size: 14pt; margin-top: 15pt; margin-bottom: 5pt; border-bottom: 1px solid #eee; }
            
            .sidebar h4 { color: #fff; border-bottom: 1px solid #444; margin-top: 20px; }
            .contact-item { font-size: 10pt; margin-bottom: 8pt; word-wrap: break-word; }
            
            .item-block { margin-bottom: 10pt; page-break-inside: avoid; }
            .item-title { font-weight: bold; font-size: 11pt; }
            .item-meta { font-style: italic; font-size: 10pt; color: #555; }
            .item-desc { font-size: 10pt; }

            ul { padding-left: 15px; margin: 0; }
            li { font-size: 10pt; margin-bottom: 3pt; }
            
            /* Sécurité anti-débordement */
            p { margin: 5pt 0; }
        </style>
    </head>
    <body>
        <div class="sidebar">';
            if ($imageData) {
                $html .= '<img src="'.$imageData.'" style="width: 100%; border-radius: 50%; margin-bottom: 20px;">';
            }
            $html .= '
            <h4>CONTACT</h4>
            <div class="contact-item">' . htmlspecialchars($_POST['adress']) . '</div>
            <div class="contact-item">' . htmlspecialchars($_POST['mail']) . '</div>
            <div class="contact-item">' . htmlspecialchars($_POST['tel']) . '</div>
            <div class="contact-item">' . htmlspecialchars($_POST['linkedin']) . '</div>

            <h4>COMPÉTENCES</h4>
            <ul>';
            if (!empty($_POST['skills'])) {
                foreach ($_POST['skills'] as $skill) {
                    $html .= '<li>' . htmlspecialchars($skill) . '</li>';
                }
            }
            $html .= '</ul>
        </div>

        <div class="main-content">
            <h1>' . htmlspecialchars($_POST['fname']) . ' ' . htmlspecialchars($_POST['lname']) . '</h1>
            <div class="headline">' . htmlspecialchars($_POST['headline']) . '</div>

            <h4>Profil</h4>
            <div class="item-desc">' . nl2br(htmlspecialchars($_POST['summary'])) . '</div>

            <h4>Expérience professionnelle</h4>';
            if (!empty($_POST['exp_poste'])) {
                foreach ($_POST['exp_poste'] as $k => $v) {
                    $html .= '<div class="item-block">
                        <div class="item-title">' . htmlspecialchars($v) . '</div>
                        <div class="item-meta">' . htmlspecialchars($_POST['exp_entreprise'][$k]) . ' | ' . $_POST['exp_start'][$k] . ' - ' . ($_POST['exp_end'][$k] ?: 'Présent') . '</div>
                        <div class="item-desc">' . nl2br(htmlspecialchars($_POST['exp_desc'][$k])) . '</div>
                    </div>';
                }
            }

            $html .= '<h4>Formation</h4>';
            if (!empty($_POST['train_diploma'])) {
                foreach ($_POST['train_diploma'] as $k => $v) {
                    $html .= '<div class="item-block">
                        <div class="item-title">' . htmlspecialchars($v) . '</div>
                        <div class="item-meta">' . htmlspecialchars($_POST['train_school'][$k]) . ' | ' . $_POST['train_start'][$k] . ' - ' . $_POST['train_end'][$k] . '</div>
                        <div class="item-desc">' . nl2br(htmlspecialchars($_POST['train_desc'][$k])) . '</div>
                    </div>';
                }
            }
        $html .= '</div>
    </body>
    </html>';

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("CV.pdf", ["Attachment" => false]);
}