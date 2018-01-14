<?php
/**
 * Created by PhpStorm.
 * User: willnewmarch
 * Date: 23/09/2017
 * Time: 09:50
 */

// with your own install
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;

require_once 'PhpPresentation/src/PhpPresentation/Autoloader.php';
\PhpOffice\PhpPresentation\Autoloader::register();
require_once 'Common/src/Common/Autoloader.php';
\PhpOffice\Common\Autoloader::register();

$csv = array_map('str_getcsv', file($argv[1]));

$objPHPPowerPoint = new PhpPresentation();

$objPHPPowerPoint->removeSlideByIndex(0);

$slideCount = 0;

foreach ($csv as &$row) {

    $objPHPPowerPoint->createSlide();

    $slideCount++;

    $currentSlide = $objPHPPowerPoint->getSlide($slideCount-1);

    $title = $currentSlide->createRichTextShape()
        ->setHeight(300)
        ->setWidth(600)
        ->setOffsetX(170)
        ->setOffsetY(180);
    $title->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $textRun = $title->createTextRun($row[0]);
    $textRun->getFont()->setBold(true)
        ->setSize(40)
        ->setColor(new Color('FF222222'));

    $description = $currentSlide->createRichTextShape()
        ->setHeight(300)
        ->setWidth(600)
        ->setOffsetX(170)
        ->setOffsetY(360);
    $description->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $textRun = $description->createTextRun($row[1]);
    $textRun->getFont()
        ->setSize(18)
        ->setColor(new Color('FF000000'));

}

$oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
$oWriterPPTX->save(__DIR__ . "/".$argv[2].".pptx");
$oWriterODP = IOFactory::createWriter($objPHPPowerPoint, 'ODPresentation');
$oWriterODP->save(__DIR__ . "/".$argv[2].".odp");