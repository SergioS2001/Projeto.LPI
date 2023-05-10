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
        'google_id',
        'google_token',
        'data_nascimento',
        'cartão_cidadão',
        'telemóvel',
        'morada',
        'email_alternativo',
        'contacto_emergência',
        'instituicao_aluno_id',
        'isExterno',
        'isOrientador',
        'isAdmin',
        'politica_dados_accepted',
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
    public function historico()
{
    return $this->hasMany(Histórico::class);
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
    return $this->hasMany(Cacifo_Estagio::class);
}
    public function estagio()
    {
        return $this->hasOneThrough(
            Estágios::class,
            Histórico::class,
            'user_id', // foreign key on the Estágios table
            'id', // local key on the Historico table
            'id', // local key on the User table
            'estágios_id' // foreign key on the Historico table
        );
    }
    
    
    public function instituicaoEstagio()
    {
        return $this->hasOneThrough(
            Instituicao_Estagio::class,
            Estágios::class,
            'id', // foreign key on the Instituicao_Estagio table
            'id', // local key on the Estagio table
            'instituição_estagio_id', // foreign key on the Estagio table
            'id' // local key on the User table
        );
    }

    public function estagio_cacifo()
    {
        return $this->hasOneThrough(
            Estágios::class,
            Cacifo_Estagio::class,
            'id',
            'id',
            'cacifo_estagio_id',
            'estágios_id'
        );
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
