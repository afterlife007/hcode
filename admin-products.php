<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Product;

$app->get("/admin/products", function (){

    User::verifyLogin();

    $products = \Hcode\Model\Product::listAll();

    $page = new \Hcode\PageAdmin();

    $page->setTpl("products", [
        "products"=>$products
    ]);
});

$app->get("/admin/products/create", function (){

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("Products-create");


});

$app->post("/admin/products/create", function(){

    User::verifyLogin();

    $product = new \Hcode\Model\Product();

    $product->setData($_POST);

    $product->save();

    header("Location: /admin/products");
    exit;

});

$app->get("/admin/products/:idproduct", function($idproduct){

    User::verifyLogin();

    $product = new Product();

    $product->get((int)$idproduct);

    $page = new PageAdmin();

    $page->setTpl("Products-update", [
        'product'=>$product->getValues()
    ]);


});

$app->post("/admin/products/:idproduct", function($idproduct){

    User::verifyLogin();

    $product = new Product();

    $product->get((int)$idproduct);

    $product->setData($_POST);

    $product->save();

    $product->updatePhoto($_FILES["desphoto"]);

    header("Location: /admin/products");
    exit();


});

$app->get("/admin/products/:idproduct/delete", function($idproduct){

    User::verifyLogin();

    $product = new Product();

    $product->get((int)$idproduct);

    $product->delete();

    header("Location: /admin/products");
    exit();




});