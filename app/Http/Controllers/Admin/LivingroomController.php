<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Livingfurniture;

class LivingroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $living_furnitures = Livingfurniture::all();
        return view('admin.livingroom.index',compact('living_furnitures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.livingroom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:livingfurnitures|max:255',
            'description' => 'required',
            'price' => 'required',
            'color' => 'required',
            // 'image' => 'required',
            //'tops' =>'accepted',
        ]);
 
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();  

            $request->image->storeAs('images', $imageName);
            
            request()->image->move(public_path('images'), $imageName);


            Livingfurniture::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'price' => $request->get('price'),
                'color' => $request->get('color'),
                'image' => $imageName,
                //'tops' => $request->get('tops'),
        ]);

        }else{
            Livingfurniture::create([
                    'name' => $request->get('name'),
                    'description' => $request->get('description'),
                    'price' => $request->get('price'),
                    'color' => $request->get('color'),
                    //'tops' => $request->get('tops'),
            
                    ]);
          }

        return redirect()->route('livingroom.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livingfurniture =  Livingfurniture::find($id);
        return view('admin.livingroom.show', compact('livingfurniture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livingfurniture = Livingfurniture::find($id);
        return view('admin.livingroom.edit', compact('livingfurniture'));
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'color' => 'required',
            // 'image' => 'required',

        ]);

        if($request->hasFile('image')){
        $imageName = time().'.'.$request->image->extension();  
        $request->image->storeAs('images', $imageName);
        request()->image->move(public_path('images'), $imageName);


            $update['image'] = $imageName;
            $update['name'] = $request->get('name');
            $update['description'] = $request->get('description');
            $update['price'] = $request->get('price');
            $update['color'] = $request->get('color');
            //$update['tops'] = $request->get('tops');
            Livingfurniture::where('id',$id)->update($update);
        }else{
            $update['name'] = $request->get('name');
            $update['description'] = $request->get('description');
            $update['price'] = $request->get('price');
            $update['color'] = $request->get('color');
           // $update['tops'] = $request->get('tops');
            
           Livingfurniture::where('id',$id)->update($update);  
        }
        return redirect()->route('livingroom.index')
            ->with('success', 'Furniture updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livingfurniture = Livingfurniture::find($id);
        $livingfurniture->delete();
        
        return redirect()->route('livingroom.index')
            ->with('success', 'Furniture deleted successfully');
    }


    public function duplicate($id)
    {
        
        $livingfurniture = Livingfurniture::find($id);
        $newlivingfurniture_furniture = $livingfurniture->replicate();
    
        $newlivingfurniture_furniture->save();
        
        return redirect()->route('livingroom.index')
            ->with('success', 'Furniture dulicated successfully');

    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Livingfurniture::whereIn('id', $ids)->delete();
        return response()->json(['success'=>'Furniture deleted successfully.']);
    }
}
