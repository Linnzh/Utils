<?php

use Linnzh\Utils\Compression\Video;

define('BASE_PATH', dirname(__DIR__, 2));

require BASE_PATH . '/vendor/autoload.php';

$video = new Video();


$path = BASE_PATH.'/tests/Compression/demo.mp4';
// $outputPathfile = BASE_PATH.'/tests/Compression/compress.mp4';// 84->27
$outputPathfile = BASE_PATH.'/tests/Compression/compress.webm';// 84->2

$info = $video->getVideoInfo($video->getFFMpeg()->open($outputPathfile));
// echo json_encode($info, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

$video->compress($path, $outputPathfile);
