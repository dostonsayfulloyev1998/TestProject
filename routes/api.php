<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/product-material',function (Request $request){

    $product = $request->products;
    $p = explode(",",$product);

    foreach ($p as $item){
        $a = explode(" ",$item);
        $r['product_code'] = $a[0];
        $r['product_qty'] = $a[1];
        $products[] = $r;
    }

    foreach ($products as $product){
        $pro[] = DB::select("SELECT p.id as p_id , p.`code` as p_code, a.m_id, a.miqdori*? as miqdori  from products p INNER JOIN
      (SELECT p_m.product_id as p_id, p_m.material_id as m_id, p_m.miqdori from product_materials p_m INNER JOIN materials m on
      p_m.material_id = m.id) a on a.p_id = p.id where p.code = ? ",[$product['product_qty'], $product['product_code']]);

        $omborxona = DB::select("SELECT o.id as o_id,m.id as m_id, m.`name` as m_name,miqdori, price from omborxona o INNER JOIN materials m on o.material_id = m.id");
        $tovar=[];

        foreach ($omborxona as $ombor){
            $w['warehouse_id'] = $ombor->o_id;
            $w['material_name']= $ombor->m_name;
            $w['qty']= $ombor->miqdori;
            $w['price']= $ombor->price;

            $tovar[]= $w;
        }



    }



    return response()->json($tovar);

});

