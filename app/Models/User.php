<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Finds the user by email
     * @param  string $email Email of the user
     * @return User
     */
    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function createUserAccount($input)
    {
        $user = $this->create([
            'name'     => $input->get('name'),
            'email'    => $input->get('email'),
            'password' => \Hash::make($input->get('password')),
        ]);

        if ($user && $user->id > 0) {
            // Bot::sendMsg('user created');
        }

        return true;
    }


    /**
     * Get the members for this user.
     */
    public function members()
    {
        return $this->hasMany('App\Models\BoardMember');
    }

    /**
     * Get the boards for this user.
     */
    public function boards()
    {
        return $this->hasMany('App\Models\Board');
    }

    /**
     * get user full name by Id
     *
     */
    public function fullName()
    {
        return $this->name;
    }
}
