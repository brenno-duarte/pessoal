<?php

require 'Config.php';
require 'dependences.php';
require 'SEOTags.php';

$app->get('/',function($request, $response){

    $meta = [
        'SMW Digital | Marketing digital e soluções web em Iguatu - CE',
        'Micro-empresa de marketing digial e soluções web. Geramos resultados para você atrair mais clientes para o seu negócio em Iguatu - Ceará',
        'Brenno Duarte de Lima, SMW Digital',
        'index',
        'follow'
    ];

    $open = [
        'website',
        'SMW Digital | Marketing digital e soluções web em Iguatu - CE',
        'SMW Digital | Marketing digital e soluções web em Iguatu - CE',
        'Micro-empresa de marketing digial e soluções web. Geramos resultados para você atrair mais clientes para o seu negócio em Iguatu - Ceará',
        'https://smwdigital.com.br',
        'https://smwdigital.com.br/views/_img/og-face.png',
        'SMW Digital'
    ];

    $canonical = "https://smwdigital.com.br";

    $seoMeta = SEOTags::metaTags($meta);
    $seoOpen = SEOTags::openGraph($open);
    $seoLink = SEOTags::linkTags($canonical);

    return $this->view->render($response, 'index.html', [
        'seoMeta' => $seoMeta,
        'seoOpen' => $seoOpen,
        'seoLink' => $seoLInk,
        'CONTACT' => CONTACT
    ]);

})->setName('home');

$app->get('/links',function($request, $response){

    $meta = [
        '',
        '',
        '',
        'noindex',
        'nofollow'
    ];

    $seoMeta = SEOTags::metaTags($meta);

    return $this->view->render($response, 'links.html', [
        'seoMeta' => $seoMeta,
        'CONTACT' => CONTACT
    ]);

})->setName('links');

$app->run();
