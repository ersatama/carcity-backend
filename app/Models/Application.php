<?php

namespace App\Models;

use App\Domain\Contracts\ApplicationContract;
use App\Domain\Contracts\MainContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;
    protected $fillable =   ApplicationContract::FILLABLE;

    public function setDateAttribute($value): string
    {
        return date('Y-m-d',strtotime($value));
    }

    public function setSumAttribute($value)
    {
        $this->attributes[MainContract::SUM] = preg_replace("/[^0-9]/", "", $value);
    }

    public function applicationStatus(): BelongsTo
    {
        return $this->belongsTo(ApplicationStatus::class,MainContract::UPLOAD_STATUS_ID,MainContract::ID);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,MainContract::CUSTOMER_ID,MainContract::BIN);
    }

}
