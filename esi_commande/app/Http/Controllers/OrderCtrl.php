<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Product;
use App\Order;
use App\Detail;

class OrderCtrl extends Controller
{
    
    //array of products
    //[[1, "écran", "benq", "écran classique", "30"], [], ...]

    public function addOrder(Request $req)
    {
        $currentOrderSession = session('currentOrder');
        $product = Product::find($req->idProduct);
        /*
                $i = 0;
                while ($i < sizeof($currentOrderSession)) {
                    if ($currentOrderSession[$i]['id'] == $req->idProduct) {
                        $currentOrderSession[$i]['quantity'] = $currentOrderSession[$i]['quantity'] + 1;
                    } else {
                        $i = $i + 1;
                    }
                }

                if ($i == sizeof($currentOrderSession)) {
                    $product['quantity'] = 1;
                    array_push($currentOrderSession, $product);
                }*/
        array_push($currentOrderSession, $product);
        session(['currentOrder' => $currentOrderSession]);
    }

    public function showOrder()
    {
        return session('currentOrder');
    }

    public function delete($productId)
    {
        $currentOrderSession = session('currentOrder');
        $productToDelete = Product::find($productId);

        if (($i = array_search($productToDelete, $currentOrderSession)) !== false) {
            unset($currentOrderSession[$i]);
            session(['currentOrder' => $currentOrderSession]);
        }
    }


    public function create(Request $request)
    {
        $log = new \Symfony\Component\Console\Output\ConsoleOutput();
        
        $currentOrderSession = session('currentOrder');
        $productsWithQuantity = array();
        /* $productsWithQuantity(
                [1] => 1,
                [2] => 3,
                [4] => 1
            ) */
        // = 1 télé BENQ et 3 télés MSI et 1 souris RAPOO

        $i = 0;
        while ($i < sizeof($currentOrderSession)) {
            $currentProductId = $currentOrderSession[$i]->id;

            if (array_key_exists($currentProductId, $productsWithQuantity)) {
                $currentQty = $productsWithQuantity[$currentProductId];
                $currentQty++;                
                $productsWithQuantity[$currentProductId] = $currentQty;
            } else {
                $productsWithQuantity[$currentProductId] = 1;
            }
           
            $i++;
        }
      
        $order = new Order;
        $order->id_student = $request->idStudent;
        $order->save();

        foreach($productsWithQuantity as $key => $value){
            $detail = new \App\Detail;
            $detail->id_order = $order->id;
            $detail->id_product = $key;
            $detail->qcom = $value;

            $detail->save();
        }
        
        $currentOrderSession = array();
        session(['currentOrder' => $currentOrderSession]);
        
    }
}
