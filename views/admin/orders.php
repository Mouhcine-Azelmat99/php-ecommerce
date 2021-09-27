<?php   
    $data = new OrdersController();
    $orders = $data->getAllOrders();    

    if (isset($_POST['delete'])) {
        $Orders = new OrdersController();
        $Orders->removeOrder();
    }

?>
<div class="col py-3">
<div class="content py-3">
            <div class="container-fluid ">
                 <?php include_once'views/includes/alerts.php' ?>
                <table class="table table-hover table-striped">
                    <h3 class="font-weight-bold">Orders</h3>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Product's Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Done at</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order) :?>
                        <tr>
                            <td><?php echo $order["fullname"];?></td>
                            <td><?php echo $order["product"];?></td>
                            <td><?php echo $order["qte"];?></td>
                            <td><?php echo $order["price"];?></td>
                            <td><?php echo $order["total"];?></td>
                            <td><?php echo $order["done_at"];?></td>
                            <td class="d-flex flex-row justify-content-center py-2">
                                <form id="form" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $order['id'];?>">
                                    <button class="btn btn-danger mx-2" name="delete">
                                         <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
