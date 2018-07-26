<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\User\UserRepositoryInterface;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->paginate(config('setting.perpage'));

        return view('admin.users.index', compact('users'));
    }
}
