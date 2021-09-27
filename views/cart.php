<div class="container">
     <?php if(!isset($_SESSION['count'])){?>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 py-5">
            <div class="card">
              <div class="card-header py-3 bold fs-2">
                Any Product exist in your card
              </div>
              <div class="card-body py-5">
                <p class="card-text">Go into products and add your product that you want to buy to card.</p>
                <a href="<?php echo BASE_URL;?>product" class="btn btn-primary btn-lg">List of products</a>
              </div>
            </div>
            </div>
        </div>
        <?php } else {?>
    <div class="row">
        <div class="col-md-8 bg-white">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($_SESSION as $name => $product) :?>
                    <?php if(substr($name,0,9) == "products_"):?>
                    <tr >
                        <td><?php echo $product["title"];?> 
                        <td>
                            <img width="80" height="80"
                                src="./public/uploads/<?php echo $product["image"];?>" class="ml-5 img-fluid">
                        </td>
                        <td><?php echo $product["price"];?></td>
                        <td><?php echo $product["qte"];?></td>
                        <td><?php echo $product["total"];?> dh</td>
                        <td>
                            <form method="post" action="<?php echo BASE_URL;?>cancelcart">
                                <input type="hidden" name="product_id" value="<?php echo $product["id"];?>">
                                <input type="hidden" name="product_price" value="<?php echo $product["total"];?>">
                                <button type="submit" class="btn text-danger btn-light btn-lg">
                                <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endif;?>
                    <?php endforeach;?>
                </tbody>
            </table>
                <?php if(isset($_SESSION["count"]) && $_SESSION["count"] > 0 && isset($_SESSION["logged"])):?>
                    <div id="paypal-button-container"></div>
                <?php elseif(isset($_SESSION["count"]) && $_SESSION["count"] > 0):?>
                    <a href="<?php echo BASE_URL;?>login" class="btn btn-link fs-4">Login First to Buy Now</a>
                <?php endif;?>
        </div>
        <div class="col-4 col-md-4 float-right bg-white">
           <table class="table table-hover table-bordered">
               <tbody>
                   <tr>
                       <th scope="row">All Products</th>
                       <td>
                        <?php echo isset($_SESSION["count"]) ? $_SESSION["count"] : 0;?>
                       </td>
                   </tr>
                   <tr>
                       <th scope="row">Total TTC</th>
                       <td>
                            <strong id="amount" data-amount="<?php if(isset($_SESSION['totaux'])){ echo $_SESSION["totaux"];}?>">
                                <?php echo isset($_SESSION["totaux"]) ? $_SESSION["totaux"] : 0;?> <span class="bb-danger">dh</span>
                            </strong>
                       </td>
                   </tr>
               </tbody>
           </table>
            <?php if(isset($_SESSION["count"]) && $_SESSION["count"] > 0):?>
                <form method="post" action="<?php echo BASE_URL;?>emptycart">
                    <button type="submit" class="btn btn-danger mb-5 fs-4">
                        Delete All
                    </button>
                </form>
                <form method="post" id="addOrder" action="<?php echo BASE_URL;?>addOrder"></form>
            <?php endif;?>
        </div>
    </div>
<?php } ?>
</div>
  <script src="https://www.paypal.com/sdk/js?client-id=ATPWlI3RjJ3qpmLsP5kL0PuqMbjPlRfqgNRct1o-Ca_VqLU1Vg-Rc9lEffxKUEBolSHUtnrICiuhYKNJ"></script>
<script>
  let amount = document.querySelector('#amount').dataset.amount;
  let finalAmount = Math.floor(amount / 8,99);
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: finalAmount.toString()
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        alert('Commande effectuée par ' + details.payer.name.given_name);
        document.querySelector('#addOrder').submit();
      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>