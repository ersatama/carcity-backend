<?php

namespace App\Services;

use App\Domain\Repositories\Application\ApplicationRepositoryInterface;

class ApplicationService
{
    protected ApplicationRepositoryInterface $applicationRepository;
    public function __construct(ApplicationRepositoryInterface $applicationRepository)
    {
        $this->applicationRepository    =   $applicationRepository;
    }

    public function create($data)
    {
        return $this->applicationRepository->create($data);
    }

    public function update($id,$data)
    {
        return $this->applicationRepository->update($id,$data);
    }

    public function getById($id)
    {
        return $this->applicationRepository->getById($id);
    }

}
