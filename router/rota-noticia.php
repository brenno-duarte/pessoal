<?php

$app->get('/blog', function($request, $response){

    $tags = [
        "Blog SMW Digital | Veja notícias sobre marketing digital e tecnologia",
        "Veja notícias sobre marketing digital e tecnologia",
        "Brenno Duarte de Lima, SMW Digital",
        "index",
        "follow"
    ];
    
    $tags2 = [
        "blog",
        "Blog SMW Digital | Veja notícias sobre marketing digital e tecnologia",
        "Blog SMW Digital | Veja notícias sobre marketing digital e tecnologia",
        "Veja notícias sobre marketing digital e tecnologia",
        "https://smwdigital.com.br/blog",
        "image",
        "imageAlt"
    ];

    $tags3 = [
        URL_C
    ];

    $seo = new SEOTags();
    $categorias = new CategoryController();

    $pagina_atual = filter_input(INPUT_GET, 'pag');
    $itens_pagina = 3;

    if (empty($pagina_atual)) {
        $pagina_atual = '1';
    }

    $inicio = ($itens_pagina * $pagina_atual) - $itens_pagina;
    $blogTotal = BlogController::listar();
    $total = count($blogTotal);
    $qnt_pag = ceil($total/$itens_pagina);

    # Páginas anteriores
    $vA1 = $pagina_atual - $itens_pagina;
    $vA2 = $pagina_atual - 1;

    # Páginas posteriores
    $vP1 = $pagina_atual + 1;
    $vP2 = $pagina_atual + $itens_pagina;

    $blog = BlogController::listarLimite($inicio, $itens_pagina);

    return $this->view->render($response, "blog/noticias.html", [
        'meta' => $seo->metaTags($tags),
        'ogtags' => $seo->openGraph($tags2),
        'canonical' => $seo->linkTags($tags3),
        'categorias' => $categorias->listar(),
        'noticias' => $blog,
        'blogUrl' => true,
        'pag_atual' => $pagina_atual,
        'valorAnt1' => $vA1,
        'valorAnt2' => $vA2,
        'valorPost1' => $vP1,
        'valorPost2' => $vP2,
        'qntPag' => $qnt_pag
    ]);

})->setName('blog');

$app->get('/blog/{id}/{titulo}', function($request, $response, $args){

    $uri = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $blog = BlogController::listarUnico($args['id']);
    $blog2 = BlogController::listarMais(3);
    $img = $blog['imagem'];
    $img2 = explode("-", $img);
    $pasta = substr($img2[1], 0, 7);

    #var_dump($blog);

    $tags = [
        $blog['titulo'] . " | Blog SMW Digital",
        $blog['titulo'] . " - Blog SMW Digital",
        "author",
        "index",
        "follow"
    ];

    $tags2 = [
        $blog['titulo'] . " | Blog SMW Digital",
        $blog['titulo'] . " - Blog SMW Digital",
        "Blog SMW Digital | Veja notícias sobre marketing digital e tecnologia",
        "Veja notícias sobre marketing digital e tecnologia",
        "https://smwdigital.com.br/blog",
        "image",
        "imageAlt"
    ];

    $tags3 = [
        URL_C
    ];

    $seo = new SEOTags();

    return $this->view->render($response, "blog/visualizar-noticia.html", [
        'meta' => $seo->metaTags($tags),
        'ogtags' => $seo->openGraph($tags2),
        'canonical' => $seo->linkTags($tags3),
        'noticia' => $blog,
        'pasta' => $pasta,
        'url_compartilhar' => $uri,
        'description' => $blog['resumo'],
        'author' => $blog['autor'],
        'mais' => $blog2,
        'blogUrl' => true
    ]);

})->setName('blogConteudo');

$app->get('/blog/category[/{category}]', function($request, $response, $args){

    $tags = [
        "Blog SMW Digital | Veja notícias sobre marketing digital e tecnologia",
        "Veja notícias sobre marketing digital e tecnologia",
        "Brenno Duarte de Lima, SMW Digital",
        "index",
        "follow"
    ];
    
    $tags2 = [
        "blog",
        "Blog SMW Digital | Veja notícias sobre marketing digital e tecnologia",
        "Blog SMW Digital | Veja notícias sobre marketing digital e tecnologia",
        "Veja notícias sobre marketing digital e tecnologia",
        "https://smwdigital.com.br/blog",
        "image",
        "imageAlt"
    ];

    $tags3 = [
        URL_C
    ];

    $seo = new SEOTags();
    $categorias = new CategoryController();

    $pagina_atual = filter_input(INPUT_GET, 'pag');
    $itens_pagina = 3;

    if (empty($pagina_atual)) {
        $pagina_atual = '1';
    }

    $inicio = ($itens_pagina * $pagina_atual) - $itens_pagina;
    $blogTotal = BlogController::listar();
    $total = count($blogTotal);
    $qnt_pag = ceil($total/$itens_pagina);

    # Páginas anteriores
    $vA1 = $pagina_atual - $itens_pagina;
    $vA2 = $pagina_atual - 1;

    # Páginas posteriores
    $vP1 = $pagina_atual + 1;
    $vP2 = $pagina_atual + $itens_pagina;

    $blog = BlogController::listarLimite($inicio, $itens_pagina);

    return $this->view->render($response, "blog/noticias.html", [
        'meta' => $seo->metaTags($tags),
        'ogtags' => $seo->openGraph($tags2),
        'canonical' => $seo->linkTags($tags3),
        'categorias' => $categorias->listar(),
        'noticias' => $blog,
        'blogUrl' => true,
        'pag_atual' => $pagina_atual,
        'valorAnt1' => $vA1,
        'valorAnt2' => $vA2,
        'valorPost1' => $vP1,
        'valorPost2' => $vP2,
        'qntPag' => $qnt_pag
    ]);

})->setName('blogCategoria');