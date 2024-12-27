<?php

function getFileVersion($filePath) {
    return file_exists($filePath) ? filemtime($filePath) : time();
}
