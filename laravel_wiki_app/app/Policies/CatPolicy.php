<?php
namespace App\Policies;
use App\User;
use App\Category;
use Illuminate\Auth\Access\HandlesAuthorization;
class CatPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function create(User $user){
        if($user->name == 'admin')
            return true;
        else
            return false;
    }
}