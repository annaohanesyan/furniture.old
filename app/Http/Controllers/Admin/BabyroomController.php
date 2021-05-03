<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Babyfurniture;

class BabyroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baby_furnitures = Babyfurniture::all();
        return view('admin.babyroom.index',compact('baby_furnitures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.babyroom.create');
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
            'name' => 'required|max:255',
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


            Babyfurniture::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'price' => $request->get('price'),
                'color' => $request->get('color'),
                'image' => $imageName,
                //'tops' => $request->get('tops'),
        ]);

        }else{
            Babyfurniture::create([
                    'name' => $request->get('name'),
                    'description' => $request->get('description'),
                    'price' => $request->get('price'),
                    'color' => $request->get('color'),
                    //'tops' => $request->get('tops'),
            
                    ]);
          }

        return redirect()->route('babyroom.index')
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
        $babyfurniture = Babyfurniture::find($id);
        return view('admin.babyroom.show', compact('babyfurniture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $babyfurniture = Babyfurniture::find($id);
        return view('admin.babyroom.edit', compact('babyfurniture'));
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
            Babyfurniture::where('id',$id)->update($update);
        }else{
            $update['name'] = $request->get('name');
            $update['description'] = $request->get('description');
            $update['price'] = $request->get('price');
            $update['color'] = $request->get('color');
           // $update['tops'] = $request->get('tops');
            
           Babyfurniture::where('id',$id)->update($update);  
        }
        return redirect()->route('babyroom.index')
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
        $baby_furniture = Babyfurniture::find($id);
        $baby_furniture->delete();
        
        return redirect()->route('babyroom.index')
            ->with('success', 'Furniture deleted successfully');
    }


    public function duplicate($id)
    {
        
        $baby_furniture = Babyfurniture::find($id);
        $newbaby_furniture = $baby_furniture->replicate();
    
        $newbaby_furniture->save();
        
        return redirect()->route('babyroom.index')
            ->with('success', 'Furniture dulicated successfully');

    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Babyfurniture::whereIn('id', $ids)->delete();
        return response()->json(['success'=>'Furniture deleted successfully.']);
    }

}
