<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lobbyfurniture;

class LobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lobby_furnitures = Lobbyfurniture::all();
        return view('admin.lobby.index',compact('lobby_furnitures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lobby.create');
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


            Lobbyfurniture::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'price' => $request->get('price'),
                'color' => $request->get('color'),
                'image' => $imageName,
                //'tops' => $request->get('tops'),
        ]);

        }else{
            Lobbyfurniture::create([
                    'name' => $request->get('name'),
                    'description' => $request->get('description'),
                    'price' => $request->get('price'),
                    'color' => $request->get('color'),
                    //'tops' => $request->get('tops'),
            
                    ]);
          }

        return redirect()->route('lobby.index')
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
        $lobbyfurniture = Lobbyfurniture::find($id);
        return view('admin.lobby.show', compact('lobbyfurniture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lobbyfurniture = Lobbyfurniture::find($id);
        return view('admin.lobby.edit', compact('lobbyfurniture'));
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
            Lobbyfurniture::where('id',$id)->update($update);
        }else{
            $update['name'] = $request->get('name');
            $update['description'] = $request->get('description');
            $update['price'] = $request->get('price');
            $update['color'] = $request->get('color');
           // $update['tops'] = $request->get('tops');
            
           Lobbyfurniture::where('id',$id)->update($update);  
        }
        return redirect()->route('lobby.index')
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
        $lobby_furniture = Lobbyfurniture::find($id);
        $lobby_furniture->delete();
        
        return redirect()->route('lobby.index')
            ->with('success', 'Furniture deleted successfully');
    }


    public function duplicate($id)
    {
        
        $lobby_furniture = Lobbyfurniture::find($id);
        $newlobby_furniture = $lobby_furniture->replicate();
    
        $newlobby_furniture->save();
        
        return redirect()->route('lobby.index')
            ->with('success', 'Furniture dulicated successfully');

    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Lobbyfurniture::whereIn('id', $ids)->delete();
        return response()->json(['success'=>'Furniture deleted successfully.']);
    }
}
