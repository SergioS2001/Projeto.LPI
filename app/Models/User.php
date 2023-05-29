<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//implements FilamentUser, HasName
class User extends Authenticatable implements FilamentUser
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
        'google_id',
        'google_token',
        'data_nascimento',
        'cartão_cidadão',
        'telemóvel',
        'morada',
        'email_alternativo',
        'instituicao_aluno_id',
        'isExterno',
        'isOrientador',
        'isAdmin',
        'politica_dados_accepted',
        'decl_conf_accepted',
        'profile_updated',
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
    public function contactos_emergência()
    {
        return $this->hasOne(Contactos_Emergência::class, 'users_id');
    }
    
    
    public function orientação_estagios()
{
    return $this->hasMany(Orientação_Estagios::class);
}

public function agendamentos()
{
    return $this->hasMany(Agendamentos::class);
}

public function orientadores()
{
    return $this->hasMany(Orientadores::class);
}
public function presenças()
{
    return $this->hasMany(Presenças::class);
}
public function avaliações()
{
    return $this->hasMany(Avaliações::class);
}

public function cacifo_estagio()
{
    return $this->hasMany(Cacifos_Estágios::class);
}
    
public function canAccessFilament(): bool
{
    return $this->isAdmin;
}


    public function getFilamentName(): string
    {
       return "{$this->firstName} {$this->lastName}";
    }
}