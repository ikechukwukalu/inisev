<?php

namespace App\Services;

use App\Actions\ResponseData;
use App\Contracts\UserSubNotificationRepositoryInterface;
use App\Http\Requests\UserSubNotificationCreateRequest;
use App\Http\Requests\UserSubNotificationDeleteRequest;
use App\Http\Requests\UserSubNotificationUpdateRequest;

class UserSubNotificationService extends BasicCrudService
{

    public function __construct(private UserSubNotificationRepositoryInterface $userSubNotificationRepository)
    { }

    /**
     * Handle the create request.
     *
     * @param  \App\Http\Requests\UserSubNotificationCreateRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleCreate(UserSubNotificationCreateRequest $request): ResponseData
    {
        return $this->create($request, $this->userSubNotificationRepository);
    }

    /**
     * Handle the update request.
     *
     * @param  \App\Http\Requests\UserSubNotificationUpdateRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleUpdate(UserSubNotificationUpdateRequest $request): ResponseData
    {
        return $this->update($request, $this->userSubNotificationRepository);
    }

    /**
     * Handle the delete request.
     *
     * @param  \App\Http\Requests\UserSubNotificationDeleteRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleDelete(UserSubNotificationDeleteRequest $request): ResponseData
    {
        return $this->delete($request, $this->userSubNotificationRepository);
    }

    /**
     * Handle the read request.
     *
     * @param null|string|int $id
     * @return array
     */
    public function handleRead(null|string|int $id = null): ResponseData
    {
        return $this->read($this->userSubNotificationRepository, 'user_sub_notification', $id);
    }

}
