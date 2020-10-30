<?php

namespace App\Http\Controllers;


use App\Models\products;
use Illuminate\Http\Request;

class DemoGetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = products::with('types')->get();
        return view('productsAdmin',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $action = 'create';
        return view('productForm',['action'=>$action]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->hasFile('img')){
            //get file name and extension
            $file = $request->img;
            $filename = $file->getClientOriginalName();
            //get just extension
            $extension = $request->file('img')->getClientOriginalExtension();
            $arr= ['jpg','png','jpeg'];
            if (in_array($extension,$arr)){
                $fileNameToStore = time().'_'.$filename;
                $file->move('image', $fileNameToStore);
            }
        }
        $product = new products();
        $file= $fileNameToStore;
        $name= $request->nameProduct;
        $price = $request->priceProduct;
        $type = $request->types;
        $product->create($file,$name,$price,$type);
        return redirect()->to(url('productsAdmin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = products::find($id);
        $action = 'update';
        return view('productForm',['product'=>$product,'action'=>$action]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = products::find($id);
        $name= $request->nameProduct;
        $file = $request->img ;
        $price = $request->priceProduct;
        $type = $request->types;
        $product->updateProduct($file,$name,$price,$type);
        return redirect()->to(url('productsAdmin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = products::find($id);
        $product->delete();
         return redirect()->back();
    }
}
