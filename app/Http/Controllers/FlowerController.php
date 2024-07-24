<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('flowers.index', ['flowers' =>Flower::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('flowers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'description' => 'required',
            'image_url' => 'required',

        ]);

        $Name = $request->input('Name');
        $description = $request->input('description');
        $image_url = $request->input('image_url');

        $validatedData = $request->validate([
            'Name' => 'required',
        ]);

        $flower = Flower::create([
            'Name' =>$Name,
            'description'=>$description,
            'image_url'=>$image_url,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        $region = $request->input('region_name');
        Region::create([
            'flower_id' => $flower->id,
            'region_name'=>$region,
        ]);
        return redirect()->route('flowers.index')->with('success', 'Flower Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Flower $flower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flower $flower)
    {
        return view('flowers.edit',['flower'=>$flower]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flower $flower)
    {
        $Name = $request->input('Name');
        $description = $request->input('description');
        $image_url = $request->input('image_url');

        $validatedData = $request->validate([
            'Name' => 'required',
            'description' => 'required',
            'image_url' => 'required',
        ]);

        $flower->update([
            'Name' =>$Name,
            'description'=>$description,
            'image_url'=>$image_url,
            // 'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        $region = $flower->regions->first();

        if($region){
            $region->update([
                'flower_id' => $flower->id,
                'region_name'=>$request->input('region_name'),
                'updated_at'=>Carbon::now(),
            ]);
        }else{
            Region::create([
                'flower_id' => $flower->id,
                'region_name'=>$request->input('region_name'),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
        return redirect()->route('flowers.index')->with('success', 'FLower Data has been updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flower $flower)
    {
        $flower->delete();
        $flower->regions()->delete();
        return redirect()->route('flowers.index')->with('success', 'Flower Data has been deleted successfuly.');
    }
}
