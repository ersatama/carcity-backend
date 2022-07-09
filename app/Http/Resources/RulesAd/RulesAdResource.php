<?php

namespace App\Http\Resources\RulesAd;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class RulesAdResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::BODY  =>  $this->{MainContract::BODY},
            MainContract::BODY_KZ   =>  $this->{MainContract::BODY_KZ},
            MainContract::STATUS    =>  $this->{MainContract::STATUS}
        ];
    }
}
