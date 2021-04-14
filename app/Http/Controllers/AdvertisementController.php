<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $advertisements = Advertisement::paginate(5);
        return view('advertisement.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('advertisement.form');
    }

    public function edit($id)
    {
        $advertisement = Advertisement::find($id);
        return view('advertisement.form', compact('advertisement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $data['user_id']=Auth::id();
        Advertisement::create($data);
        return redirect()->route('advertisements.index');
    }

    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $advertisement=Advertisement::find($id);
        $advertisement->update($data);
        return redirect()->route('advertisements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     */
    public function show($id)
    {
        $advertisement = Advertisement::find($id);
        return view('advertisement.show', compact('advertisement'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     */
    public function destroy($id)
    {

        $advertisement = Advertisement::find($id);
        if(Auth::id()==$advertisement->user_id) {
            $advertisement->delete();
        }
        return redirect()->route('advertisements.index');
    }
}
