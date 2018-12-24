<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2><?php echo htmlspecialchars( $category["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                        </div>
                        <h2><a href="/products/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h2>
                        <div class="product-carousel-price">
                            <ins>R$ <?php echo formatPrice($value1["vlprice"]); ?></ins>
                        </div>

                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Comprar</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?page=1">Ptimeira</a></li>
                            <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

                            <li style="display: <?php echo htmlspecialchars( $value1["dispay"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="page-item"><a class="page-link" href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                            <?php } ?>

                            <li class="page-item"><a style="color: red" class="page-link" href="#"><?php echo htmlspecialchars( $pagina, ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                            <?php $counter1=-1;  if( isset($pagedep) && ( is_array($pagedep) || $pagedep instanceof Traversable ) && sizeof($pagedep) ) foreach( $pagedep as $key1 => $value1 ){ $counter1++; ?>

                            <li style="display: <?php echo htmlspecialchars( $value1["displaydois"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="page-item"><a class="page-link" href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                            <?php } ?>

                            <li class="page-item"><a class="page-link" href="/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?page=<?php echo htmlspecialchars( $total, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Ultima</a></li>

                        </ul>
                    </nav>                        
                </div>
            </div>
        </div>
    </div>
</div>