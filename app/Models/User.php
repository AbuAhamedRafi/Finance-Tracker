<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function run()
{
    // Permissions
    Permission::create(['name' => 'view expenses']);
    Permission::create(['name' => 'add expense']);
    Permission::create(['name' => 'edit expense']);
    Permission::create(['name' => 'delete expense']);
    Permission::create(['name' => 'view budget']);
    Permission::create(['name' => 'edit budget']);
    Permission::create(['name' => 'view reports']);
    Permission::create(['name' => 'manage users']);
    
    // Admin Role (gets all permissions)
    $adminRole = Role::create(['name' => 'admin']);
    $adminRole->givePermissionTo(Permission::all());  // Admin can do everything
    
    // User Role (no permissions by default)
    $userRole = Role::create(['name' => 'user']);
}
}
