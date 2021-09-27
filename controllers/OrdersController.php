<?php

class OrdersController{
    public function getAllOrders(){
        $orders = Order::getAll();
        return $orders;
    }
    public function addOrder($data){
        $result = Order::createOrder($data);
        if($result === "ok"){
            foreach($_SESSION as $name => $product){
                if(substr($name,0,9) == "products_"){
                    unset($_SESSION[$name]);
                    unset($_SESSION["count"]);
                    unset($_SESSION["totaux"]);
                }
            }
            Session::set("success","Commande effectuée");
            Redirect::to("home");
        }
    }
    public function removeOrder(){
        if(isset($_POST["id"])){
            $data = array(
                "id" => $_POST["id"]
            );
            $result = Order::deleteOrder($data);
            if($result === "ok"){
                Session::set("success","Order Delete successfully");
                Redirect::to("orders");
            }else{
                echo $result;
            }
        }
    }
}