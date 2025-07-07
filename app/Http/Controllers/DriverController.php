<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    function index()
    {
        $drivers = Driver::all();
        return view('drivers.index',['drivers' => $drivers]);
    }

    function create()
    {
        return view('drivers.create');
    }

    function home()
    {
        return view('drivers.home');
    }

    function store(Request $request)
    {
        $driver = new Driver();

        // $this->validate($request, [
        //     'name' => ['required', 'unique:posts', 'max:255'],
        //     'age' => ['required', 'max:255'],
        //     'car' => ['required', 'max:30'],
        // ]);

        $driver->name = $request->name;
        $driver->age = $request->age;
        $driver->car = $request->car;
        $driver->save();
        return redirect('/drivers');
    }

    function show($id)
    {
        $driver = Driver::find($id);
        $user = auth()->user(); // Gets the logged in users info
        $driverChoiceIds = $user ? $user->driverChoice->pluck('id')->toArray() : [];
        return view('drivers.show', [
            'driver' => $driver,
            'driverChoiceIds' => $driverChoiceIds
        ]);
    }
    
    function edit($id)
    {
        $driver = Driver::find($id);
        return view('drivers.edit', ['driver' => $driver]);
    }

    function update(Request $request)
    {
        $id = $request->id;
        $driver = Driver::find($id);
        $driver->name = $request->name;
        $driver->age = $request->age;
        $driver->car = $request->car;
        $driver->save();
        return redirect('/drivers');
    }

    function destroy(Request $request)
    {
        $id = $request->id;
        $driver = Driver::find($id);
        $driver->delete();
        return redirect('/drivers');        
    }

    function search(Request $request)
    {
        $search = $request->input('search');
        $results = Driver::where('name', 'like', "%$search%")->get();
        $totalResults = $results->count();
        $displayResults = $results->all();
        return view('drivers.index', ['drivers' => $displayResults, 'totalResults' => $totalResults, 'search' => $search]);
    }

    public function storeChoice($driverId)
    {
        $user = auth()->user(); // Get the logged-in user
        $driver = Driver::find($driverId);

        if ($user->driverChoice->contains($driver)) {
            $user->driverChoice()->detach($driver);
        } 
        else {
            $user->driverChoice()->attach($driver);
        }
        
        if ($user->driverChoice->contains($driver)) {
            $user->driverChoice()->detach($driver);
            return redirect()->back()->with('driver_action', 'removed');
        } else {
            $user->driverChoice()->attach($driver);
            return redirect()->back()->with('driver_action', 'added');
        }
    }   
}
