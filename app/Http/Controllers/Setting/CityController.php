<?php

namespace App\Http\Controllers\Setting;

use App\Models\Setting\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $data['query'] = $request->input('query');
        $data['cities'] = City::where('description', 'like', '%' . $data['query'] . '%')
            ->paginate(10);
        return view('pages.setting.city.index', $data);
    }

    public function create()
    {
        return view('pages.setting.city.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'province_id' => 'required',
            'description' => 'required'
        ]);

        City::create($formFields);

        return redirect('/setting/city')->with('status', 'Your changes have been saved.');
    }

    public function edit(City $city)
    {
        $data['city'] = $city;
        return view('pages.setting.city.edit', $data);
    }

    public function update(Request $request)
    {
        $formFields = $request->validate([
            'province_id' => 'required',
            'description' => 'required'
        ]);

        $id = $request->get('id');
        City::find($id)->update($formFields);

        return redirect('/setting/city')->with('status', 'Your changes have been saved.');
    }

    public function delete(City $city)
    {
        $city->delete();

        return redirect('/setting/city')->with('status', 'Your data has been deleted.');
    }

    public function options(Request $request)
    {
        $query = $request->input('q');
        $province = $request->input('province');
        $data = City::select('id', 'description as name')
            ->where('province_id', $province)
            ->where('description', 'like', '%' . $query . '%')->get();
        return json_encode($data);
    }
    public function options_city(Request $request)
    {
        $query = $request->input('q');
        $data = City::select('id', 'description as name')
            ->where('description', 'like', '%' . $query . '%')->get();
        return json_encode($data);
    }
}
