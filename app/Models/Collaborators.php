<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function paymentCollaborator(): BelongsTo
    {
        return $this->belongsTo(PaymentCollaborators::class);
    }

    public function addressCollaborator(): BelongsTo
    {
        return $this->belongsTo(AddressCollaborators::class);
    }
}
