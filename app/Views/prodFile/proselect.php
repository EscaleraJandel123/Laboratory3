<!-- product section -->

<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our Fruits
            </h2>
            <p>
                which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to
                be sure there isn't an
            </p>
        </div>
        <div class="row">
            <?php foreach ($items as $item): ?>
                <div class="col-sm-6 col-lg-4">
                    <div class="box">
                        <div class="img-box">
                            <a href="<?= base_url('productDetails/'.$item['id']) ?>">
                                <img src="<?= $item['image'] ?>" alt="product image">
                            </a>
                        </div>
                        <div class="detail-box">
                            <span class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                            </span>
                            <a href="">
                                <?= $item['name'] ?>
                            </a>
                            <div class="price_box">
                                <h6 class="price_heading">
                                    <span>$</span>
                                    <?= $item['price'] ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="btn-box">
            <a href="">
                View All
            </a>
        </div>
    </div>
</section>

<!-- end product section -->