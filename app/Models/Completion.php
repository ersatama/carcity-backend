<?php

namespace App\Models;

use App\Domain\Contracts\CompletionContract;
use App\Domain\Contracts\MainContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Completion extends Model
{
    use HasFactory;
    protected $fillable =   CompletionContract::FILLABLE;
    public function setDateAttribute($value): string
    {
        return date('Y-m-d',strtotime($value));
    }

    public function completionStatus(): BelongsTo
    {
        return $this->belongsTo(CompletionStatus::class,MainContract::UPLOAD_STATUS_ID,MainContract::ID);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,MainContract::CUSTOMER_ID,MainContract::BIN);
    }
}
