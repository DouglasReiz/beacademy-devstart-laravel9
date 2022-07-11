<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUpdateUserFormRequest;


class UserController extends Controller
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(request $request)
    {
    
        $users = $this->model->getUsers(
            $request->search ?? ''
        );

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        if(!$user = User::find($id))
            return redirect() ->route('users.index');
        
        $title = 'Usuário '. $user->name;
        return view('users.show', compact('user','title'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data =$request->all();
        $data['password'] = bcrypt($request->password);

        if($request->image){
            $file = $request['image'];
            $path = $file->store('profile', 'public');
            $data['image']= $path;
        }

        $this->model->create($data);

        $request->session()->flash('create','usuario cadastrado com sucesso');

        return redirect()->route('users.index')->with('create','usuário cadastrado com sucesso');
    }

    public function edit($id)
    {
        if(!$user = $this->model->find($id))
            return redirect()->route('users.index');

        return view('users.edit',compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if(!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $data = $request->only('name','email');
        if($request->password)
            $data['password']=bcrypt($request->password);
        
        $data['is_admin'] = $request->admin? 1 : 0;
        
        $user->update($data);
        

        $request->session()->flash('edit','usuario atualizado com sucesso');

        return redirect()->route('users.index')->with('edit','usuário atualizado com sucesso');
    }

    public function destroy($id)
    {
        if(!$user = $this->model->find($id))
            return redirect()->route('users.index');
        
        $user->delete();

        //return redirect()->route('users.index');

        return redirect()->route('users.index')->with('edit','usuário deletado com sucesso');

    }

    public function admin()
    {
        return view('admin.index');
    }

}
