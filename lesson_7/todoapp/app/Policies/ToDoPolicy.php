<?php

namespace App\Policies;

use App\Models\ToDo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ToDoPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\ToDo $toDo
     * @return mixed
     */
    public function update(User $user, ToDo $toDo)
    {
        return $user->id === $toDo->owner_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\ToDo $toDo
     * @return mixed
     */
    public function delete(User $user, ToDo $toDo)
    {
        //
    }
}
