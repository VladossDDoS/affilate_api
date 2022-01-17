<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        $permission = $this->findPermission($user, Permission::ROLE_VIEWANY);

        if ($permission) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        $permission = $this->findPermission($user, Permission::ROLE_VIEW);

        if ($permission) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $permission = $this->findPermission($user, Permission::ROLE_CREATE);

        if ($permission) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        $permission = $this->findPermission($user, Permission::ROLE_UPDATE);

        if ($permission) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        $permission = $this->findPermission($user, Permission::ROLE_DELETE);

        if ($permission) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user)
    {
        $permission = $this->findPermission($user, Permission::ROLE_RESTORE);

        if ($permission) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user)
    {
        $permission = $this->findPermission($user, Permission::ROLE_FORCEDELETE);

        if ($permission) {
            return true;
        }

        return false;
    }

    public function findPermission($user, string $slug)
    {
        return $user->role->rolePermissions()->whereHas('permission', function ($query) use ($slug) {
                return $query->where('slug', $slug);
            })->first()->permission ?? null;
    }
}
