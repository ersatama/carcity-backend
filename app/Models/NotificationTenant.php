<?php

namespace App\Models;

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\NotificationTenantContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NotificationTenant extends Model
{
    use HasFactory;
    protected $fillable =   NotificationTenantContract::FILLABLE;


    public function completions(): BelongsTo
    {
        return $this->belongsTo(Completion::class,MainContract::COMPLETION_ID,MainContract::ID);
    }

    public function applications(): BelongsTo
    {
        return $this->belongsTo(Application::class,MainContract::APPLICATION_ID,MainContract::ID);
    }

    public function invoices(): BelongsTo
    {
        return $this->belongsTo(Invoice::class,MainContract::INVOICE_ID,MainContract::ID);
    }

    public function banners(): BelongsTo
    {
        return $this->belongsTo(UserBanner::class,MainContract::USER_BANNER_ID,MainContract::ID);
    }

    public function reviews(): BelongsTo
    {
        return $this->belongsTo(UserReview::class,MainContract::USER_REVIEW_ID,MainContract::ID);
    }

    public function requests(): BelongsTo
    {
        return $this->belongsTo(UserRequest::class,MainContract::USER_REQUEST_ID,MainContract::ID);
    }
}
