<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data['query'] = $request->input('query');
        $data['users'] = User::where('name', 'like', '%' . $data['query'] . '%')
            ->orWhere('username', 'like', '%' . $data['query'] . '%')
            ->paginate(10);
        return view('pages.setting.user.index', $data);
    }

    public function index_verif(Request $request)
    {
        $data['query'] = $request->input('query');
        $data['users'] = User::where('name', 'like', '%' . $data['query'] . '%')
            ->Where('user_role_id', 6)
            ->paginate(10);
        return view('pages.master.verif.index', $data);
    }

    public function create()
    {
        return view('pages.setting.user.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'user_role_id' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        User::create($formFields);

        return redirect('/setting/user')->with('status', 'Your changes have been saved.');
    }

    public function edit(User $user)
    {
        $data['user'] = $user;
        return view('pages.setting.user.edit', $data);
    }

    public function update(Request $request)
    {
        $formFields = $request->validate([
            'user_role_id' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $id = $request->get('id');
        User::find($id)->update($formFields);

        return redirect('/setting/user')->with('status', 'Your changes have been saved.');
    }

    public function verif(User $user)
    {
        User::find($user->id)->update([
            'verif' => "Yes",
        ]);

        return redirect('/master/verif')->with('status', 'Your changes have been saved.');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect('/setting/user')->with('status', 'Your data has been deleted.');
    }

    public function options(Request $request)
    {
        $query = $request->input('q');
        $data = User::select('id', 'name as name')->where('name', 'like', '%' . $query . '%')->get();
        return json_encode($data);
    }
}
