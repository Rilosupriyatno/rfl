<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Models\Setting\District;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        $data['query'] = $request->input('query');
        $data['districts'] = District::where('description', 'like', '%' . $data['query'] . '%')
            ->paginate(10);
        return view('pages.setting.district.index', $data);
    }

    public function create()
    {
        return view('pages.setting.district.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'city_id' => 'required',
            'description' => 'required'
        ]);
        District::create($formFields);

        return redirect('/setting/district')->with('status', 'Your changes have been saved.');
    }

    public function edit(District $district)
    {
        $data['district'] = $district;
        return view('pages.setting.district.edit', $data);
    }

    public function update(Request $request)
    {
        $formFields = $request->validate([
            'city_id' => 'required',
            'description' => 'required'
        ]);

        $id = $request->get('id');
        District::find($id)->update($formFields);

        return redirect('/setting/district')->with('status', 'Your changes have been saved.');
    }

    public function delete(District $district)
    {
        $district->delete();

        return redirect('/setting/district')->with('status', 'Your data has been deleted.');
    }

    public function options(Request $request)
    {
        $query = $request->input('q');
        $city = $request->input('city');
        $data = District::select('id', 'description as name')
            ->where('city_id', $city)
            ->where('description', 'like', '%' . $query . '%')->get();
        return json_encode($data);
    }
}
