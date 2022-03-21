<?php
class CarritoModel extends Query
{
    private $menuId;
    private $itemQuantity;
    private $orderId;

    //checkOut
    private $address;
    private $zipcode;
    private $phone;
    private $amount;

    public function __construct()
    {

        parent::__construct();
    }

    public function getItemsCarritos()
    {
        //$selectUserIdMenu = "SELECT menuId, itemQuantity FROM viewcart WHERE userId = $_SESSION[id]";
        $selectUserIdMenu = "SELECT * FROM viewcart V INNER JOIN menu M ON V.menuId = M.menuId WHERE userId = $_SESSION[id] ";
        $data = $this->SelectAll($selectUserIdMenu);
        return $data;
    }

    //Modification Menú
    public function modifyCantidad(
        int $itemQuantity,
        int $menuId
    ) {
        $this->itemQuantity = $itemQuantity;
        $this->menuId = $menuId;
        #update
        $sql = "UPDATE `viewcart` SET  itemQuantity=? WHERE menuId =?";
        $data = array(
            $this->itemQuantity,
            $this->menuId,
        );
        $givens = $this->save($sql, $data);
        if ($givens == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }


    //Select Categorie
    public function selectMenuIdCantida(int $menuId)
    {
        $sql = "SELECT * FROM viewcart WHERE menuId = $menuId";
        $data = $this->select($sql);
        return $data;
    }


    public function deleteMenuId(int $menuId)
    {
        $this->menuId = $menuId;
        $sql = "DELETE FROM viewcart WHERE menuId = ? AND userId = $_SESSION[id]";
        $data = array($this->menuId);
        $givens = $this->save($sql, $data);
        return $givens;
    }


    //---------------------Ralizando pedidos y guardando la orden del pedido----------------------//
    
    //1.- Realizado una orden
    public function insertOrders(
        int $userId,
        string $address,
        int $zipcode,
        int $phone,
        int $amount
    ) {
        $this->userId = $userId;
        $this->address = $address;
        $this->zipcode = $zipcode;
        $this->phone = $phone;
        $this->amount = $amount;

        $selectCkecout = "INSERT INTO orders (userId, address, zipCode, phoneNo, amount, paymentMode, orderStatus) VALUES (?,?,?,?,?,?,?)";
        
        $data = array(
            $this->userId,
            $this->address,
            $this->zipcode,
            $this->phone,
            $this->amount,
            0,
            0,
        );
        $result = $this->save($selectCkecout, $data);
        if ($result == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function ultmimoOrderIdUser()
    {
        $selectOrdeId = "SELECT * FROM `orders`   WHERE userId = $_SESSION[id] ORDER BY `orderId` DESC LIMIT 1";
        $data = $this->SelectAll($selectOrdeId);
        return $data;
    }

    //2.- Trae los items agregados al carrito por usuario para traer el menuId, itemQuantity
    public function getViewCart()
    {
        $selectViewcart = "SELECT * FROM viewcart WHERE userId = $_SESSION[id] ";
        $data = $this->SelectAll($selectViewcart);
        return $data;
    }

    //3.- inserta en la tabla orderitems el menuId, itemQuantity obtenido de la tabla viewcart
    public function insertOrderItems(
        int $orderId,
        string $menuId,
        string $itemQuantity
    ) {
        $this->orderId = $orderId;
        $this->menuId = $menuId;
        $this->itemQuantity = $itemQuantity;

        $selectCkecout = "INSERT INTO orderitems (orderId, menuId, itemQuantity) VALUES (?,?,?)";
        
        $data = array(
            $this->orderId,
            $this->menuId,
            $this->itemQuantity,
        );
        $result = $this->save($selectCkecout, $data);
        if ($result == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    //4.- Eliminar todos los menus agregados al carrito por usuario para terminar la comprar(order)
}


// public function checkOut(
//     int $userId,
//     string $address,
//     int $zipcode,
//     int $phone,
//     int $amount
// ) {
//     $this->userId = $userId;
//     $this->address = $address;
//     $this->zipcode = $zipcode;
//     $this->phone = $phone;
//     $this->amount = $amount;

//     $selectCkecout = "INSERT INTO orders (userId, address, zipCode, phoneNo, amount, paymentMode, orderStatus, orderDate) VALUES (?,?,?,?,?,?,?)";
//     $data = array(
//         $this->userId,
//         $this->address,
//         $this->zipcode,
//         $this->phone,
//         $this->amount,
//         0,
//         0,
//         'current_timestamp()',
//     );
//     $orderId = $selectCkecout['orderId'];
//     $givens = $this->save($selectCkecout, $data);
//     if ($givens == 1) {
//         $selectViewCart = "SELECT * FROM viewcart WHERE userId = $_SESSION[id]";
//         $viewCart = $this->SelectAll($selectViewCart);
//         if ($viewCart) {
//             $menuId = $viewCart['menuId'];
//             $itemQuantity = $viewCart['itemQuantity'];
//             $itemSql = "INSERT INTO orderitems (orderId, menuId, itemQuantity) VALUES (?,?,?)";
//             $dataOrders = array(
//                 $orderId,
//                 $menuId,
//                 $itemQuantity,
//             );
//             $data = $this->save($itemSql, $dataOrders);
//             if ($data == 1) {
//                 $res = "ok";
//             } else {
//                 $res = "error";
//             }
//             return $res;
//         }
//         $deleteSqlViewcart = "DELETE FROM viewcart WHERE userId = ?";
//         $deleteData = array($_SESSION["id"]);
//         $givens = $this->save($deleteSqlViewcart, $deleteData);
//         return $givens;
//     } else {
//         $res = "error";
//     }
// }
