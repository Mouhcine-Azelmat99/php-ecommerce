<?php
    $data = new ProductsController();
    $product = $data->getProduct();
    
?>
<div class="container">
    <div class="row my-3">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="card h-100 bg-white rounded p-2" >
                        <div class="card-header bg-light">
                            <h3 class="card-title py-3">
                                <?php
                                    echo $product->product_title;
                                ?>
                            </h3>
                        </div>
                        <div class="card-img-top text-center mt-3">
                            <img 
                            src="./public/uploads/<?php echo $product->product_image;?>" alt="" class="img-fluid rounded" style="height: 400px;width: 400px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <div class="card h-100 bg-white rounded p-2" >
                        <div class="card-header bg-light">
                            <h3 class="card-title">
                                <?php
                                    echo $product->product_title;
                                ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <h5 class="text-secondary mt-4">
                                Description :
                            </h5>
                            <p class="card-text">
                                <?php
                                    echo $product->product_description;
                                ?>
                            </p>
                            <hr>
                            <h5 class="text-secondary mt-4">
                                Price :
                            </h5>
                            <h3 class="mt-3 fw-bold">
                                <?php
                                    echo $product->product_price;
                                ?>dh
                            </h3>
                            <hr>
                            <h5 class="text-secondary my-3">
                            Quantity :
                            </h5>
                        <form method="post" action="<?php echo BASE_URL;?>checkout">
                        <div class="form-group">
                            <input type="number" name="product_qte" id="product_qte" class="form-control py-2 fs-3" value="1">
                            <input type="hidden" name="product_title" value="<?php echo $product->product_title;?>">
                            <input type="hidden" name="product_id" value="<?php echo $product->product_id;?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary px-5 btn-lg mt-3 fs-3" value="Valide" style="cursor:pointer;">
                        </div>
                    </form>
                        </div>
                        
                        
                    </div>
        </div>
    </div>
</div>