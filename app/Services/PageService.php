<?php


namespace App\Services;


use DOMDocument;

class PageService
{
    public function wrapWith($body, $wrapperClass): string
    {
        // без этого не загружается html из $body
        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $bodyDom = new DOMDocument();
        $bodyDom->loadHTML($body);

        $container = $dom->createElement("div");
        $container->setAttribute("class", $wrapperClass);

        $container->appendChild($dom->importNode($bodyDom->documentElement, true));

        $dom->appendChild($container);
        return $dom->saveHTML();
    }
}
