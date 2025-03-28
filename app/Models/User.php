<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Constant;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'account',
        'name',
        'email',
        'tenant_id',
        'head_account_flg',
        'password',
        'job_position',
        'sub_role_1',
        'sub_role_2',
        'status',
        'avatar',
    ];


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_user');
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function jobPosition()
    {
        return $this->hasOne(Constant::class, 'key', 'job_position')
            ->where('group', 'job_position');
    }

    public function subRole1()
    {
        return $this->hasOne(Constant::class, 'key', 'sub_role_1')
            ->where('group', 'job_position');
    }

    public function subRole2()
    {
        return $this->hasOne(Constant::class, 'key', 'sub_role_2')
            ->where('group', 'job_position');
    }

    public function userStatus()
    {
        return $this->hasOne(Constant::class, 'key', 'status')
            ->where('group', 'user_status');
    }

    public static function createUser($userData)
    {
        $newUser = self::create([
            'email' => $userData['bi_email'],
            'account' => $userData['bi_account'],
            'name' => $userData['bi_full_name'],
            'password' => bcrypt($userData['bi_password']),
            'head_account_flg' => '0',
            'status' => '1'
        ]);
    }
    public static function createUserByForm($userData)
    {
        $newUser = self::create([
            'email' => $userData['user_email'],
            'account' => $userData['user_account'],
            'name' => $userData['user_name'],
            'password' => Hash::make($userData['user_password']),
            'job_position' => $userData['user_job_position'] ?? '7',
            'sub_role_1' => $userData['user_sub_role_1'] ?? null,
            'sub_role_2' => $userData['user_sub_role_2'] ?? null,
            'tenant_id' => auth()->user()->tenant_id, // Tự động lấy tenant_id từ user đăng nhập
            'status' => '1',
            'head_account_flg' => '0',
        ]);

        return $newUser;
    }
    public static function updateUser($idUser, $userData)
    {
        $user = self::find($idUser);

        if (!$user) {
            throw new \Exception("User không tồn tại.");
        }

        $updateData = [
            'email' => $userData['user_email'],
            'account' => $userData['user_account'],
            'name' => $userData['user_name'],
            'job_position' => $userData['user_job_position'] ?? '7',
            'sub_role_1' => $userData['user_sub_role_1'] ?? null,
            'sub_role_2' => $userData['user_sub_role_2'] ?? null,
        ];
        
        $user->update($updateData);

        return $user;
    }
}
