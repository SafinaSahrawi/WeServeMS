<?php
require_once '../../../libs/database.php'; 

class spModel{

    //FOOD MODULE FUNCTIONS

    function displayAllFood(){

        $sql = "SELECT * FROM food ORDER BY id";
        return DB::run($sql);
            }

    function viewFoodDetail(){

        $sql = "SELECT * FROM food WHERE id = :FoodId";
        $args = [':FoodId'=>$this->FoodId];
        return DB::run($sql, $args);
    }

    function insertFood(){
        $sql = "INSERT INTO food(name, price, quantity, des, img) VALUES(:name, :price, :quantity, :des, :img)";
        $args = [':name'=>$this->name, 
        ':price'=>$this->price,
        ':quantity'=>$this->quantity,
        ':des'=>$this->des,
        ':img'=>$this->img];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function modifyFood(){
        $sql = "UPDATE food SET
        name=:name, price=:price, quantity=:quantity, des=:des, img=:img WHERE FoodId=:FoodId";

        $args = [':FoodId'=>$this->FoodId, ':name'=>$this->name, ':price'=>$this->price,
        ':quantity'=>$this->quantity,
        ':des'=>$this->des,
        ':img'=>$this->img];
        return DB::run($sql,$args);
    }

    function modifyFoodwImg(){
        $sql = "UPDATE food SET
        name=:name, price=:price, quantity=:quantity, des=:des WHERE id=:FoodId";

        $args = [':FoodId'=>$this->FoodId, ':name'=>$this->name, ':price'=>$this->price,
        ':quantity'=>$this->quantity,
        ':des'=>$this->des];
        return DB::run($sql,$args);
    }

    function dropFood(){
        $sql = "DELETE FROM food WHERE id=:FoodId";
        $args = [':FoodId'=>$this->FoodId];
        return DB::run($sql,$args);
    }


    // GOODS MODULE FUNCTIONS

     function displayAllGood(){

        $sql = "SELECT * FROM good ORDER BY id";
        return DB::run($sql);
            }

    function viewGoodDetail(){

        $sql = "SELECT * FROM good WHERE id = :GoodId";
        $args = [':GoodId'=>$this->GoodId];
        return DB::run($sql, $args);
    }

    function insertGood(){
        $sql = "INSERT INTO good(name, price, quantity, des, img) VALUES(:name, :price, :quantity, :des, :img)";
        $args = [':name'=>$this->name, 
        ':price'=>$this->price,
        ':quantity'=>$this->quantity,
        ':des'=>$this->des,
        ':img'=>$this->img];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function modifyGood(){
        $sql = "UPDATE good SET
        name=:name, price=:price, quantity=:quantity, des=:des, img=:img WHERE GoodId=:GoodId";

        $args = [':GoodId'=>$this->GoodId, ':name'=>$this->name, ':price'=>$this->price,
        ':quantity'=>$this->quantity,
        ':des'=>$this->des,
        ':img'=>$this->img];
        return DB::run($sql,$args);
    }

    function modifyGoodwImg(){
        $sql = "UPDATE good SET
        name=:name, price=:price, quantity=:quantity, des=:des WHERE id=:GoodId";

        $args = [':GoodId'=>$this->GoodId, ':name'=>$this->name, ':price'=>$this->price,
        ':quantity'=>$this->quantity,
        ':des'=>$this->des];
        return DB::run($sql,$args);
    }

    function dropGood(){
        $sql = "DELETE FROM good WHERE id=:GoodId";
        $args = [':GoodId'=>$this->GoodId];
        return DB::run($sql,$args);
    }

    // MEDICAL MODULE FUNCTIONS
    function displayAllMedical(){

        $sql = "SELECT * FROM medical ORDER BY id";
        return DB::run($sql);
            }

    function viewMedicalDetail(){

        $sql = "SELECT * FROM medical WHERE id = :MedicalId";
        $args = [':MedicalId'=>$this->MedicalId];
        return DB::run($sql, $args);
    }

    function insertMedical(){
        $sql = "INSERT INTO medical(name, price, quantity, des, img) VALUES(:name, :price, :quantity, :des, :img)";
        $args = [':name'=>$this->name, 
        ':price'=>$this->price,
        ':quantity'=>$this->quantity,
        ':des'=>$this->des,
        ':img'=>$this->img];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function modifyMedical(){
        $sql = "UPDATE medical SET
        name=:name, price=:price, quantity=:quantity, des=:des, img=:img WHERE MedicalId=:MedicalId";

        $args = [':MedicalId'=>$this->MedicalId, ':name'=>$this->name, ':price'=>$this->price,
        ':quantity'=>$this->quantity,
        ':des'=>$this->des,
        ':img'=>$this->img];
        return DB::run($sql,$args);
    }

    function modifyMedicalwImg(){
        $sql = "UPDATE medical SET
        name=:name, price=:price, quantity=:quantity, des=:des WHERE id=:MedicalId";

        $args = [':MedicalId'=>$this->MedicalId, ':name'=>$this->name, ':price'=>$this->price,
        ':quantity'=>$this->quantity,
        ':des'=>$this->des];
        return DB::run($sql,$args);
    }


    function dropMedical(){
        $sql = "DELETE FROM medical WHERE id=:MedicalId";
        $args = [':MedicalId'=>$this->MedicalId];
        return DB::run($sql,$args);
    }


    function viewCartOrder(){
        $sql = "SELECT cart.id, customer.C_CustAddress, customer.C_CustPhoneNumber, cart.customer_id, cart.payment_complete,
        cart.sp_confirm
                FROM customer
                RIGHT JOIN cart ON customer.id = cart.customer_id AND cart.payment_complete = 0";
        return DB::run($sql);
    }

     function accept(){
        $sql = "UPDATE cart SET
        sp_confirm=:sp_confirm WHERE id =:cartId";
        $args = [':cartId'=>$this->cartId, ':sp_confirm'=>$this->sp_confirm];
        return DB::run($sql,$args);
    }

    function viewSPinfo(){
        $sql = "SELECT * FROM serviceprovider WHERE username =:username";
        $args = [':username'=>$this->username];
        return DB::run($sql,$args);
    }

    function updateSP(){
        $sql = "UPDATE serviceprovider 
                SET S_Company_Name=:S_Company_Name, S_CompanyAddress=:S_CompanyAddress, S_ServiceProviderPhoneNo=:S_ServiceProviderPhoneNo WHERE username=:username";
        $args = [':username'=>$this->username, ':S_Company_Name'=>$this->S_Company_Name, ':S_CompanyAddress'=>$this->S_CompanyAddress, ':S_ServiceProviderPhoneNo'=>$this->S_ServiceProviderPhoneNo];
        return DB::run($sql,$args);
    }

    
}

?>