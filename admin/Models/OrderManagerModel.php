<?php
class OrderManagerModel extends Query
{

    private $orderStatus;
    public function __construct()
    {
        parent::__construct();
    }

    //All Menus
    public function getOrders()
    {
        $sql = "SELECT * FROM `orders` ";
        $data = $this->SelectAll($sql);
        return $data;
    }

    //selectOrderStatus
    public function selectOrderStatus(int $orderId)
    {
        $sql = "SELECT * FROM `orders` WHERE orderId = $orderId";
        $data = $this->select($sql);
        return $data;
    }

    //Modification estado order
    public function modifyOder(
        int $orderId,
        int $orderStatus
    ) {
        $this->orderId = $orderId;
        $this->orderStatus = $orderStatus;
        #update
        $sql = "UPDATE `orders` SET  orderStatus=? WHERE orderId =?";
        $data = array(
            $this->orderStatus,
            $this->orderId,
        );
        $givens = $this->save($sql, $data);
        if ($givens == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    //Create person who sends orders
    public function createDeliveryBoy(
        int $orderId,
        string $name,
        int $phone,
        int $time
    ) {
        $this->orderId = $orderId;
        $this->name = $name;
        $this->phone = $phone;
        $this->time = $time;
        $sql = "INSERT INTO deliverydetails ( orderId, deliveryBoyName, deliveryBoyPhoneNo, deliveryTime) VALUES (?,?,?,?)";
        $data = array(
            $this->orderId,
            $this->name,
            $this->phone,
            $this->time,
        );
        $givens = $this->save($sql, $data);
        if ($givens == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    //select data delivery Details
    public function selectDeliveryDetails(int $orderId)
    {
        $sql = "SELECT * FROM `deliverydetails` WHERE orderId = $orderId";
        $data = $this->select($sql);
        return $data;
    }

    //Modification delivery details
    public function modifyDelivery(
        int $orderId,
        string $deliveryBoyName,
        int $deliveryBoyPhoneNo,
        int $deliveryTime,
        int $id
    ) {
        $this->orderId = $orderId;
        $this->deliveryBoyName = $deliveryBoyName;
        $this->deliveryBoyPhoneNo = $deliveryBoyPhoneNo;
        $this->deliveryTime = $deliveryTime;
        $this->id = $id;
        #update
        $sql = "UPDATE `deliverydetails` SET  orderId=?, deliveryBoyName=?, deliveryBoyPhoneNo=?, deliveryTime=?  WHERE id =?";
        $data = array(
            $this->orderId,
            $this->deliveryBoyName,
            $this->deliveryBoyPhoneNo,
            $this->deliveryTime,
            $this->id,
        );
        $givens = $this->save($sql, $data);
        if ($givens == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

}
