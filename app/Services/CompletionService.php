<?php

namespace App\Services;

use App\Domain\Repositories\Completion\CompletionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use JetBrains\PhpStorm\ArrayShape;

class CompletionService
{
    protected CompletionRepositoryInterface $completionRepository;
    public function __construct(CompletionRepositoryInterface $completionRepository)
    {
        $this->completionRepository =   $completionRepository;
    }

    #[ArrayShape(['data' => "int"])] public function paginationByCustomerAndNumber($data): array
    {
        return $this->completionRepository->paginationByCustomerAndNumber($data);
    }

    public function getByCustomerAndNumber($company): Collection|array
    {
        return $this->completionRepository->getByCustomerAndNumber($company);
    }

    public function list($rid)
    {
        return $this->completionRepository->list($rid);
    }

    public function create($data)
    {
        return $this->completionRepository->create($data);
    }

    public function pagination($data)
    {
        return $this->completionRepository->pagination($data);
    }

    public function all($data): Collection|array
    {
        return $this->completionRepository->all($data);
    }

    public function update($id,$data)
    {
        return $this->completionRepository->update($id,$data);
    }

    public function getById($id)
    {
        return $this->completionRepository->getById($id);
    }

    public function getByRidAndUploadStatusId($rid,$uploadStatusId)
    {
        return $this->completionRepository->getByRidAndUploadStatusId($rid,$uploadStatusId);
    }

    public function getByIds($ids)
    {
        return $this->completionRepository->getByIds($ids);
    }

    public function getByRid($rid)
    {
        return $this->completionRepository->getByRid($rid);
    }

    public function getByCustomerId($customerId)
    {
        return $this->completionRepository->getByCustomerId($customerId);
    }

    public function delete($rid)
    {
        $this->completionRepository->delete($rid);
    }

}
