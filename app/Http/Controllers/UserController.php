<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        
        return json_encode($users);
    }

    public function submitUser(Request $request)
    {
        $return = [];
        $user = new User;
        
        $user->name = $request->user;

        if($user->save()){
            array_push($return, [
                'data' => '',
                'response' => [
                    'success' => true,
                    'message' => 'Usuário salvo com sucesso!'
                ]
            ]);
        } else {
            throw new Exception("Houve um Erro", 1);
        }

        return json_encode($return);
    }

    public function removeUser(Request $request)
    {
        $return = [];
        $user = User::find($request->user_id);

        if($user->delete()){
            array_push($return, [
                'data' => '',
                'response' => [
                    'success' => true,
                    'message' => 'Usuário removido com sucesso!'
                ]
            ]);
        } else {
            throw new Exception("Houve um Erro", 1);
        }

        return json_encode($return);
    }
}
