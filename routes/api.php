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
    $code = $request->code;
    $soni = $request->soni;


//    $product = \App\Models\Product::where(['code'=>$code])->get();
    $ids = DB::table('products')->select("id")->where(['code'=>$code])->get();

    $result = DB::select("SELECT a.m_miqdori*30 as miqdori from products p INNER JOIN
 (SELECT m.`name` as m_name, p_m.miqdori as m_miqdori, p_m.product_id as p_id from product_materials p_m INNER JOIN materials m on p_m.material_id = m.id) a
 on p.id=a.p_id WHERE p.`code`=$code");


//    $omborxona = DB::select("SELECT sum(miqdori) as miqdori from omborxona o INNER JOIN (SELECT p.`code` as p_code,p_m.material_id as m_id  from products p INNER JOIN product_materials p_m on p.id = p_m.product_id) a
//on a.m_id = o.material_id  where a.p_code =$code GROUP BY material_id");

    $omborxona = DB::select("SELECT o.id,m.id, m.`name` as name,miqdori, price from omborxona o INNER JOIN materials m on o.material_id = m.id
");

    $material= DB::select("SELECT material_id,`name`,miqdori*$soni as jami from product_materials p_m INNER JOIN materials m on p_m.material_id = m.id WHERE product_id=1");

$result =[];

    foreach ($omborxona as $item){
         foreach ($material as $m){
             if ($m->jami <=$item->miqdori){
                 $result[] = [
                   'warehouse_id'=>$item->id,
                     'material_name'=>$item->name,
                     'qty'=>$item->miqdori,
                     'price'=>$item->price
                 ];

                 break;
             }
             else{
                 $result[] = [
                     'warehouse_id'=>$item->id,
                     'material_name'=>$item->name,
                     'qty'=>$item->miqdori,
                     'price'=>$item->price
                 ];

                 $item->miqdori-=$m->jami;
                 break;
             }
         }
    }


    return response()->json($result);

});

