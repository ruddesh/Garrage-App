<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Catogory;
use App\Models\Service;
use Illuminate\Http\Request;
use Response;

class FormsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $services = $this->getOnlyServicesColumnValues();
        $brands = Car::select('vehicle_brand')->distinct()->get();
        $cars = Car::all();
        $catogories = Catogory::all();
        return view('forms', ['cars' => $cars, 'brands' => $brands, 'catogories' => $catogories, 'services' => $services]);
    }

    public function store()
    {
        $this->validateUserInput();
        Car::create([
            'vehicle_brand' => request('vehicle-brand'),
            'vehicle_name' => request('vehicle-name'),
            'manufacturing_year' => request('manufacturing-year'),
        ]);
        return redirect('/form');
    }

    public function validateUserInput()
    {
        return request()->validate([
            'vehicle-brand' => 'required',
            'vehicle-name' => 'required',
            'manufacturing-year' => 'required',
        ]);
    }

    public function getCars(Request $request)
    {
        $data = Car::select('vehicle_name')->where('vehicle_brand', $request->brand)->get();
        return Response::json($data);
    }

    public function setCatogory(Request $request)
    {
        Catogory::create([
            'vehicle_catogory' => request('category'),
            'vehicle_brand' => request('brands'),
            'vehicle_name' => request('vehicles'),
            'manufacturing_year' => request('year'),
        ]);

        return redirect('/form');
    }

    public function getCarManufacturingYear(Request $request)
    {
        $data = Car::select('manufacturing_year')->where('vehicle_name', $request->vehicle)->get();
        return Response::json($data);
    }

    public function getCategories()
    {
        $data = Catogory::select('vehicle_catogory')->distinct()->get();
        return Response::json($data);
    }

    public function getServices()
    {
        $services = Service::all();
        return Response::json($services);
    }

    public function storeService(Request $request)
    {
        Service::create([
            'service' => request('service'),
            'category' => request('category'),
            'price' => request('price'),
        ]);
    }

    public function getOnlyServicesColumnValues()
    {
        $services = Service::select('service')->distinct()->get();
        return $services;
    }
}
