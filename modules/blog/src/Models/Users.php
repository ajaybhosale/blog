<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Users extends Model
{

    protected $table    = 'users';
    protected $fillable = [
        'username',
        'password',
        'name',
        'email',
        'updated_at',
    ];

    public function comments()
    {
        return $this->hasMany('Modules\Blog\Models\Comments', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany('Modules\Blog\Models\Posts', 'user_id');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getUsers()
    {
        $query = $this;
        return $query->paginate(20);
    }

    public function getUser($id)
    {
        return $this->find($id);
    }

    public function createUser($input)
    {
        return $this->create($input->all());
    }

    public function updateUser($id, $input)
    {
        $updated = $this->find($id)->update($input);
        $user    = $this->find($id);

        if ($updated) {
            return $user;
        }

        return false;
    }

}
