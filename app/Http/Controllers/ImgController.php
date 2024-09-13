<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ImgController extends Controller
{
    public function upload(Request $request){

        $ProductName = $request->productName;
        $PriceName = $request->productPrice;
        $file = $request->file('productImage');

        $data = $request->validate([
                'productName' => 'required',
                'productPrice' => 'required',
                'productImage' => 'required ',
        ]);


        $path = $request->file('productImage')->store('image','public');

      DB::table('Product')->insert(
             ['productName' => $ProductName,
            'productPrice' => $PriceName,
            'productImage' => $path ]
        );
        return redirect()->route('dashboard.get')->with('status','User Image Upload Successfully.');

    }
    public function update(Request $request){

        // dd($request->all());

        $ProductName = $request->productName;
        $PriceName = $request->productPrice;
        $id = $request->id;
        $file = $request->file('productImage');

        $data = $request->validate([
                'productName' => 'required',
                'productPrice' => 'required',
                'productImage' => 'required ',
        ]);


        $path = $request->file('productImage')->store('image','public');

      DB::table('Product')->where('id',$id)->update(
             ['productName' => $ProductName,
            'productPrice' => $PriceName,
            'productImage' => $path ]
        );
        return redirect()->route('dashboard.get')->with('status','User Data Update Successfully.');

    }

    public function delete(Request $request,$id){

        $product = DB::table('product')->where('id', $id)->first();

        if ($product) {
            DB::table('product')->where('id', $id)->delete();

            $image_path = public_path("storage/") . $product->productImage;

            if (file_exists($image_path)) {
                @unlink($image_path);
            }

        return redirect()->route('dashboard.get')->with('status','User Image Delete Successfully.');
    }
}
}
