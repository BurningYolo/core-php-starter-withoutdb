<?php
namespace App\Helpers;

class HtmlParser {
    public static function extractHeadings($html) {
        preg_match_all('/<h[1-6]>(.*?)<\/h[1-6]>/', $html, $matches);
        return $matches[1] ?? [];
    }
}
