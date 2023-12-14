<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Models\Setting\Village;
use App\Http\Controllers\Controller;

class VillageController extends Controller
{
    public function index(Request $request)
    {
        $data['query'] = $request->input('query');
        $data['villages'] = Village::where('description', 'like', '%' . $data['query'] . '%')
            ->paginate(10);
        return view('pages.setting.village.index', $data);
    }

    public function create()
    {
        return view('pages.setting.village.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'district_id' => 'required',
            'description' => 'required'
        ]);
        Village::create($formFields);

        return redirect('/setting/village')->with('status', 'Your changes have been saved.');
    }

    public function edit(Village $village)
    {
        $data['village'] = $village;
        return view('pages.setting.village.edit', $data);
    }

    public function update(Request $request)
    {
        $formFields = $request->validate([
            'district_id' => 'required',
            'description' => 'required'
        ]);

        $id = $request->get('id');
        Village::find($id)->update($formFields);

        return redirect('/setting/village')->with('status', 'Your changes have been saved.');
    }

    public function delete(Village $village)
    {
        $village->delete();

        return redirect('/setting/village')->with('status', 'Your data has been deleted.');
    }

    public function options(Request $request)
    {
        $query = $request->input('q');
        $district = $request->input('district');
        $data = Village::select('id', 'description as name')
            ->where('district_id', $district)
            ->where('description', 'like', '%' . $query . '%')->get();
        return json_encode($data);
    }
}
