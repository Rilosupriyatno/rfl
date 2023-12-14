<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Models\Setting\Province;
use App\Http\Controllers\Controller;

class ProvinceController extends Controller
{
    public function index(Request $request)
    {
        $data['query'] = $request->input('query');
        $data['provinces'] = Province::where('description', 'like', '%' . $data['query'] . '%')
            ->paginate(10);
        return view('pages.setting.province.index', $data);
    }

    public function create()
    {
        return view('pages.setting.province.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'description' => 'required'
        ]);
        Province::create($formFields);

        return redirect('/setting/province')->with('status', 'Your changes have been saved.');
    }

    public function edit(Province $province)
    {
        $data['province'] = $province;
        return view('pages.setting.province.edit', $data);
    }

    public function update(Request $request)
    {
        $formFields = $request->validate([
            'description' => 'required'
        ]);

        $id = $request->get('id');
        Province::find($id)->update($formFields);

        return redirect('/setting/province')->with('status', 'Your changes have been saved.');
    }

    public function delete(Province $province)
    {
        $province->delete();

        return redirect('/setting/province')->with('status', 'Your data has been deleted.');
    }

    public function options(Request $request)
    {
        $query = $request->input('q');
        $data = Province::select('id', 'description as name')->where('description', 'like', '%' . $query . '%')->get();
        return json_encode($data);
    }
}
