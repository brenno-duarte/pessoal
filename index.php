<?php

require 'Config.php';
require 'dependences.php';

require_once ROOT_PATH. '/Sources/Controller/BlogController.php';
require_once ROOT_PATH. '/Sources/Services/SEOTags.php';
require_once ROOT_PATH. '/Sources/Controller/AdminController.php';
require_once ROOT_PATH. '/Sources/Controller/MessageController.php';
require_once ROOT_PATH. '/Sources/Controller/CategoryController.php';
require_once ROOT_PATH. '/Sources/Model/Blog.php';

require 'router/rota-index.php';
require 'router/rota-admin.php';
require 'router/rota-usuarios.php';
require 'router/rota-noticia.php';
require 'router/rota-post.php';
require 'router/rota-recSenha.php';
require 'router/rota-categoria.php';
require 'router/rota-msg.php';

$app->run();
