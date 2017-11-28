<?php

namespace App\Http\Controllers;

use Acme\Helpers\Miselanius;
use Acme\Helpers\UsersControllerHelper;
use App\Http\Requests\UserRequest;
use App\Role;
use App\State;
use App\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = User::paginate(10);
        return View('users.index', compact('items'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $state = State::pluck('name', 'id');
        $roles = array('admin' => 'Admin', 'standar' => 'Standar');
        return View('users.create', compact('state', 'roles'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->input('password')):
            $request['password'] = bcrypt($request->input('password'));
            unset($request['password_confirmation']);
        else:
            unset($request['password']);
            unset($request['password_confirmation']);
        endif;

        //dd($request->all());
        User::create($request->all());
        return redirect()->to('/users');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);
        $state = State::pluck('name', 'id');
        $roles = array('admin' => 'Admin', 'standar' => 'Standar');
        return View('users.edit', compact('item', 'state', 'roles'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $item = User::findOrFail($id);
        if ($request->input('password')):
            $request['password'] = bcrypt($request->input('password'));
            unset($request['password_confirmation']);
        else:
            unset($request['password']);
            unset($request['password_confirmation']);
        endif;
        $item->update($request->all());
        return redirect()->to('/users');
    }

    /**
     * @param $id
     * @param $state
     * @return mixed
     */
    public function state($id, $state){

    }

}
