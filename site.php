<?php

use \Hcode\Page;
use \Hcode\Model\Product;
use \Hcode\Model\Category;
use \Hcode\Model\Cart;


$app->get('/', function() {

    $products = Product::listAll();

    $page = new Page();

    $page ->setTpl("index", [
        'products'=>Product::checkList($products)
    ]);

});

$app->get("/categories/:idcategory", function($idcategory){


    $pagina = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    $category = new Category();

    $category->get((int)$idcategory);

    $pagination = $category->getProductsPage($pagina);

    $pages = [];

    $pagedep = [];

    $max_links = 2;

    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
        if($pag_ant >= 1){
            $display = "";
        }else{
            $display = "none";
        }
        array_push($pages, [
            'link'=>'/categories/'.$idcategory.'?page='.$pag_ant,
            'page'=>$pag_ant,
            'pagina'=>$pagina,
            'dispay'=>$display
        ]);

    }

    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
        if($pag_dep <= $pagination["pages"]){
            $displaydois = "";
        }else{
            $displaydois = "none";
        }

        array_push($pagedep, [
            'link'=>'/categories/'.$idcategory.'?page='.$pag_dep,
            'page'=>$pag_dep,
            'pagina'=>$pagina,
            'totalpage'=>$pagination["pages"],
            'displaydois'=>$displaydois
        ]);
    }
    if ($pagination["pages"] <= 1){
        $displaynav = "none";
    }else {
        $displaynav = "";
    }

    $page = new Page();

    $page ->setTpl("category", [
        'category'=>$category->getValues(),
        'products'=>$pagination["data"],
        'pages'=>$pages,
         "pagedep"=>$pagedep,
        "pagina"=>$pagina,
        "total"=>$pagination["pages"],
        "displaynav"=>$displaynav
    ]);

});



$app->get("/products/:desurl", function($desurl){

    $product = new Product();

    $product->getFromURL($desurl);

    $page = new Page();

    $page->setTpl("product-detail", [
       'product'=>$product->getvalues(),
        'categories'=>$product->getCategories()

    ]);



});

$app->get("/cart", function() {

    $cart = Cart::getFromSession();

    $page = new Page();

    $page->setTpl("cart");

});

