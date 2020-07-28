<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::latest()->paginate(5);
        return view('admin.admin', compact('data'))->with('i',(request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048',
            'price' => 'required'
        ]); 
        */
        $validate = $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048',
            'price' => 'required'
            
        ]);
        $image = $request->file('image');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $form = array(
            'title' => $request->title,
            'description' => $request->description,
            'imagePath' => $new_name,
            'price' => $request->price,
            'total_sales' => 0,
        );
        Product::create($form);
        return redirect('admin')->with('success', 'Data added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::findOrFail($id);
        return view('admin.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::findOrFail($id);
        return view('admin.edit', compact('data'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if ($image != ''){
            $validate = $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|image|max:2048',
                'price' => 'required'
                
            ]);
            $image_name =rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);

        } else {
            $validate = $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'price' => 'required'
                
            ]);
        }
        $form = array(
            'title' => $request->title,
            'description' => $request->description,
            'imagePath' => $image_name,
            'price' => $request->price,
        );
        Product::whereId($id)->update($form); 
        return redirect('admin')->with('success', 'Data updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        return redirect('admin')->with('success', 'Data deleted.');
    }

    public function make(){
        return view('admin.make');
    }

    public function postMake(Request $request){
        $city = $request['city'];
        Session::put('variableName', $city);
        return redirect('report');

    }
}
