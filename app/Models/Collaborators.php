<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Collaborators extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'cpf',
        'email',
        'rg',
        'birthdate'
    ];

    /**
     * The attributes that are hidden.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'id'
    ];

    /**
     * The payment collaborator relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentCollaborator(): hasMany
    {
        return $this->hasMany(PaymentCollaborators::class, 'collaborator_id', 'id');
    }

    /**
     * The address collaborator relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addressCollaborator(): HasMany
    {
        return $this->hasMany(AddressCollaborators::class, 'collaborator_id', 'id');
    }
}
