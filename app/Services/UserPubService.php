<?php

namespace App\Services;

use App\Actions\ResponseData;
use App\Contracts\UserPubRepositoryInterface;
use App\Contracts\WebsiteRepositoryInterface;
use App\Http\Requests\UserPubCreateRequest;
use App\Http\Requests\UserPubDeleteRequest;
use App\Http\Requests\UserPubUpdateRequest;
use Illuminate\Support\Facades\Redis;

class UserPubService extends BasicCrudService
{

    public function __construct(private UserPubRepositoryInterface $userPubRepository,
            private WebsiteRepositoryInterface $websiteRepository)
    { }

    /**
     * Handle the create request.
     *
     * @param  \App\Http\Requests\UserPubCreateRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleCreate(UserPubCreateRequest $request): ResponseData
    {
        $response = $this->create($request, $this->userPubRepository);

        if (!$response->success) {
            return $response;
        }

        Redis::publish('new:website:post', json_encode([
            'id' => $response->data->id,
            'title' => $response->data->title,
            'description' => $response->data->description,
        ]));

        return $response;
    }

    /**
     * Handle the update request.
     *
     * @param  \App\Http\Requests\UserPubUpdateRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleUpdate(UserPubUpdateRequest $request): ResponseData
    {
        return $this->update($request, $this->userPubRepository);
    }

    /**
     * Handle the delete request.
     *
     * @param  \App\Http\Requests\UserPubDeleteRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleDelete(UserPubDeleteRequest $request): ResponseData
    {
        return $this->delete($request, $this->userPubRepository);
    }

    /**
     * Handle the read request.
     *
     * @param null|string|int $id
     * @return array
     */
    public function handleRead(null|string|int $id = null): ResponseData
    {
        return $this->read($this->userPubRepository, 'user_pub', $id);
    }

}
