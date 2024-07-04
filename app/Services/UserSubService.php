<?php

namespace App\Services;

use App\Actions\ResponseData;
use App\Contracts\UserSubRepositoryInterface;
use App\Http\Requests\UserSubCreateRequest;
use App\Http\Requests\UserSubDeleteRequest;
use App\Http\Requests\UserSubUpdateRequest;

class UserSubService extends BasicCrudService
{

    public function __construct(private UserSubRepositoryInterface $userSubRepository)
    { }

    /**
     * Handle the create request.
     *
     * @param  \App\Http\Requests\UserSubCreateRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleCreate(UserSubCreateRequest $request): ResponseData
    {
        return $this->create($request, $this->userSubRepository);
    }

    /**
     * Handle the update request.
     *
     * @param  \App\Http\Requests\UserSubUpdateRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleUpdate(UserSubUpdateRequest $request): ResponseData
    {
        return $this->update($request, $this->userSubRepository);
    }

    /**
     * Handle the delete request.
     *
     * @param  \App\Http\Requests\UserSubDeleteRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleDelete(UserSubDeleteRequest $request): ResponseData
    {
        return $this->delete($request, $this->userSubRepository);
    }

    /**
     * Handle the read request.
     *
     * @param null|string|int $id
     * @return array
     */
    public function handleRead(null|string|int $id = null): ResponseData
    {
        return $this->read($this->userSubRepository, 'user_sub', $id);
    }

}
