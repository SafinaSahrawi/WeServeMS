<?php

require_once "../../../libs/database.php";


class Model{

    function updateCustomerinfo(){

        $sql = "update customer set C_CustAddress=:C_CustAddress,C_CustPhoneNumber=:C_CustPhoneNumber, C_CustCity=:C_CustCity where username=:username";
        $args = [':username'=>$this->username,':C_CustAddress'=>$this->C_CustAddress,':C_CustPhoneNumber'=>$this->C_CustPhoneNumber, ':C_CustCity'=>$this->C_CustCity];
        return DB::run($sql,$args);
    }

     function viewCustomerDetail(){

        $sql = "SELECT * FROM customer WHERE username = :username";
        $args = [':username'=>$this->username];
        return DB::run($sql, $args);
    }

    function viewFood(){

        $sql = "SELECT * FROM food ORDER BY id";
        return DB::run($sql);
            }

    function viewFoodDetail(){

        $sql = "SELECT * FROM food WHERE id = :FoodId";
        $args = [':FoodId'=>$this->FoodId];
        return DB::run($sql, $args);
    }
     function viewGood(){

        $sql = "SELECT * FROM good ORDER BY id";
        return DB::run($sql);
            }

    function viewGoodDetail(){

        $sql = "SELECT * FROM good WHERE id = :GoodId";
        $args = [':GoodId'=>$this->GoodId];
        return DB::run($sql, $args);
    }
    function viewMedical(){

        $sql = "SELECT * FROM medical ORDER BY id";
        return DB::run($sql);
            }

    function viewMedicalDetail(){

        $sql = "SELECT * FROM medical WHERE id = :MedicalId";
        $args = [':MedicalId'=>$this->MedicalId];
        return DB::run($sql, $args);
    }

    function InsertCart(){

        $sql = "INSERT INTO cart(product_id, customer_id, product_name, product_img, product_quantity, product_price) VALUES(:product_id, :customer_id, :product_name, :product_img, :product_quantity, :product_price)";
        $args = [':product_id'=>$this->product_id, ':customer_id'=>$this->customer_id, ':product_name'=>$this->product_name, ':product_img'=>$this->product_img, ':product_quantity'=>$this->product_quantity, ':product_price'=>$this->product_price];
        $stmt = DB::run($sql, $args); 
        $count = $stmt->rowCount();
        return $count;
    }

    function ViewCart(){
        $sql = "SELECT * FROM cart WHERE payment_complete = 0";
        return DB::run($sql);
    }

     function DeleteCart(){
    $sql = "DELETE FROM cart WHERE id= :id";
    $args = [':id'=>$this->id];
    return DB::run($sql,$args);
    }
    

    function InsertCustomerPaymentInfo(){
        $sql = "INSERT INTO payment(customer_id, firstname, email, cust_add1, cust_add2, cust_postal_code, cust_city, cust_state, cardNumber, total_price) VALUES(:customer_id, :firstname, :email, :cust_add1, :cust_add2, :cust_postal_code, :cust_city, :cust_state, :cardNumber, :subtotal)";
        $args = [':customer_id'=>$this->customer_id, ':firstname'=>$this->firstname, ':email'=>$this->email, ':cust_add1'=>$this->cust_add1, ':cust_add2'=>$this->cust_add2, ':cust_postal_code'=>$this->cust_postal_code, ':cust_city'=>$this->cust_city, ':cust_state'=>$this->cust_state,':cardNumber'=>$this->cardNumber, ':subtotal'=>$this->subtotal];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function viewPaymentAddress(){
        $sql ="select * from payment where customer_id = :customer_id";
        $args = [':customer_id'=>$this->customer_id];
        return DB::run($sql, $args);
    }

    function updatePaymentStatus(){
        $sql = "update cart set payment_complete =1 where customer_id = :customer_id";
        $args = [':customer_id'=>$this->customer_id];
        return DB::run($sql, $args);
    }

}

?>