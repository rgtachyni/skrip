<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Services\Repositories\Contracts\UserContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $user, $response;

    public function __construct(UserContract $user)
    {
        $this->user = $user;
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function prosesLogin(Request $r)
    {
        try {
            if (Auth::attempt(['username' => $r->username, 'password' => $r->password])) {
                if (auth()->user()->role_id == 1) {
                    return response()->json(['message' => 'user']);
                } else {
                    // create sesion menu
                    Helper::menu();
                    // // create sesion option
                    // Helper::sessionOpt();
                    // // create sesion tag
                    // Helper::sessionTag();
                    return response()->json(['message' => 'admin']);
                }
            } else {
                return response()->json(['message' => 'error']);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage() . ' in file :' . $e->getFile() . ' line: ' . $e->getLine();
            return response()->json($this->response);
        }
    }

    public function register()
    {
        return view('apps.auth.register');
    }

    public function registerCreate(Request $r)
    {
        try {
            $req = $r->all();
            $req['password'] = Hash::make($req['password']);
            $req['role_id'] = 1;
            $data = $this->user->store($req);
            if ($data) {
                return response()->json(['message' => true]);
            } else {
                return response()->json(['message' => false]);
            }
        } catch (\Exception $e) {
            $message = $e->getMessage() . ' in file :' . $e->getFile() . ' line: ' . $e->getLine();
            return response()->json($message);
        }
    }
}
