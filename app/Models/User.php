<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
//use Illuminate\Contracts\Auth\MustVerifyEmail; //commented out to avoid email verification requirement
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, HasAvatar //MustVerifyEmail //commented out to avoid email verification requirement
{
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'avatar_url',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getFilamentAvatarUrl(): ?string
    {
        if ($this->avatar_url) {
            return asset('storage/'.$this->avatar_url);
        } else {
            $hash = md5(strtolower(trim($this->email)));

            return 'https://www.gravatar.com/avatar/'.$hash.'?d=mp&r=g&s=250';
        }
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // return $this->hasRole('super_admin') || $this->is_active;
        // return $this->is_active;
        return true;
    }

    protected static function booted(): void
    {
        static::created(function (User $user) {
            $user->assignRole('preregister');
            // Set the user as inactive upon registration
            $user->is_active = false;
            $user->save();
        });
    }

    public function emails()
    {
        return $this->belongsToMany(Email::class);
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }

    public function brgyInhabitant()
    {
        return $this->hasOne(\App\Models\BrgyInhabitant::class);
    }

    public function hasBrgyInhabitant(): bool
    {
        return $this->brgyInhabitant()->exists();
    }
}
