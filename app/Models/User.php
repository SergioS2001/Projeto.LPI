<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//implements FilamentUser, HasName
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'permissions',     //protected
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
    ];

    // Define the relationship with the InstituicaoAluno model
    public function instituicao_Aluno()
    {
        return $this->belongsTo(Instituicao_Aluno::class, 'instituicao_aluno_id');
    }

    // Define the relationship with the Historico model
    public function histórico()
    {
        return $this->belongsTo(Histórico::class, 'historico_id');
    }

    //public function canAccessFilament(): bool
    //{
        //return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
        //Only admin users can access, type - admin 
    //}
    //public function getFilamentName(): string
    //{
    //   return "{$this->firstName} {$this->lastName}";
    //}
}
