<?php
require_once __DIR__ . '/../bootstrap.php';

$imageService = new \App\ImageService();
$images = $imageService->getImageUrls();

echo $twig->render('index.html.twig', ['images' => $images]);