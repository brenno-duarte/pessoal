<?php

require 'Config.php';
require 'dependences.php';
require 'SEOTags.php';

$app->get('/',function($request, $response){

    $meta = [
        'SMW Digital | Marketing digital e soluções web em Iguatu - CE',
        'Micro-agência de marketing digial e desenvolvimento web em Iguatu - Ceará. Acesse o nosso site e conheça mais sobre nós.',
        'Brenno Duarte de Lima, SMW Digital',
        'index',
        'follow'
    ];

    $open = [
        'website',
        'SMW Digital | Marketing digital e soluções web em Iguatu - CE',
        'SMW Digital | Marketing digital e soluções web em Iguatu - CE',
        'Micro-agência de marketing digial e desenvolvimento web em Iguatu - Ceará. Geramos resultados para você atrair mais clientes para o seu negócio',
        'https://smwdigital.com.br',
        'https://smwdigital.com.br/views/_img/og-face.png',
        'SMW Digital'
    ];

    $canonical = "https://smwdigital.com.br";

    $seo = new SEOTags();

    return $this->view->render($response, 'index.html', [
        'seoMeta' => $seo->metaTags($meta),
        'seoOpen' => $seo->openGraph($open),
        'seoLink' => $seo->linkTags($canonical),
        'CONTACT' => CONTACT
    ]);

})->setName('home');

$app->get('/links',function($request, $response){

    $meta = [
        '',
        '',
        '',
        'noindex',
        'follow'
    ];
    $seo = new SEOTags();

    return $this->view->render($response, 'links.html', [
        'seoMeta' => $seo->metaTags($meta),
        'CONTACT' => CONTACT
    ]);

})->setName('links');

$app->run();
