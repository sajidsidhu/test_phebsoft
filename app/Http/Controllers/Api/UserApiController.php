<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllUserRequest;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Events\UserCreated;

class UserApiController extends Controller {

    public function users(AllUserRequest $r) {
        $users = User::select(['id', 'name', 'email'])->paginate(10);
        return $users;
    }

    public function store(CreateUserRequest $r) {
        $data = [
            'name' => $r->name,
            'email' => $r->email,
            'email_verified_at' => now(),
            'password' => bcrypt($r->password),
        ];
        $user = User::create($data);
        if ($user) {
            UserCreated::dispatch($user);
            return response()->json(['message'=>"User Created","user"=>$user]);
        } else {

            return response()->json(['message'=>"User Not Created"]);
        }
    }

}
