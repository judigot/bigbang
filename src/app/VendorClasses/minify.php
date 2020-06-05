<?php

require 'tiny-html-minifier-master/tiny-html-minifier.php';

$html = ob_get_clean();

echo TinyMinify::html($html, $options = [
    'collapse_whitespace' => true
]);
