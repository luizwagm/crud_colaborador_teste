<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AddressCollaborators extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'collaborator_id',
        'cep',
        'address',
        'number',
        'city',
        'state'
    ];

    /**
     * The attributes that are hidden.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'collaborator_id',
        'id'
    ];

    /**
     * The collaborator relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collaborator(): BelongsTo
    {
        return $this->belongsTo(Collaborators::class);
    }
}
