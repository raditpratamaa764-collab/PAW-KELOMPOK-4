<?php

namespace App\Policies;

use App\Models\Meja;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MejaPolicy
{
    public function update(User $user, Meja $meja): bool
    {

        if($user->hasRole('admin')){
            return true;
        }

        if($user->hasRole('staff')){
            return true;
        }

        return false;
    }

    public function ubahStrukturMeja(User $user, Meja $meja): bool
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, Meja $meja): bool
    {
        return $user->hasRole('admin');
    }

}
