<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Setting\UserRole;
use App\Http\Controllers\Controller;

class UserRoleController extends Controller
{
    public function index(Request $request)
    {
        $data['query'] = $request->input('query');
        $data['userRoles'] = UserRole::where('description', 'like', '%' . $data['query'] . '%')
            ->paginate(10);
        return view('pages.setting.user-role.index', $data);
    }

    public function edit(UserRole $userRole)
    {
        $data['userRole'] = $userRole;
        return view('pages.setting.user-role.edit', $data);
    }

    public function update(Request $request)
    {
        $formFields = $request->validate([
            'description' => 'required'
        ]);

        $id = $request->get('id');
        UserRole::find($id)->update($formFields);

        return redirect('/setting/role')->with('status', 'Your changes have been saved.');
    }

    public function options(Request $request)
    {
        $query = $request->input('q');
        $data = UserRole::select('id', 'description as name')
        ->whereBetween('id', [1, 5])
        ->where('description', 'like', '%' . $query . '%')->get();
        return json_encode($data);
    }
}
