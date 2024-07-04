<?php

namespace App\Services;

use App\Actions\ResponseData;
use App\Contracts\WebsitePostRepositoryInterface;
use App\Http\Requests\WebsitePostCreateRequest;
use App\Http\Requests\WebsitePostDeleteRequest;
use App\Http\Requests\WebsitePostUpdateRequest;

class WebsitePostService extends BasicCrudService
{

    public function __construct(private WebsitePostRepositoryInterface $websitePostRepository)
    { }

    /**
     * Handle the create request.
     *
     * @param  \App\Http\Requests\WebsitePostCreateRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleCreate(WebsitePostCreateRequest $request): ResponseData
    {
        return $this->create($request, $this->websitePostRepository);
    }

    /**
     * Handle the update request.
     *
     * @param  \App\Http\Requests\WebsitePostUpdateRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleUpdate(WebsitePostUpdateRequest $request): ResponseData
    {
        return $this->update($request, $this->websitePostRepository);
    }

    /**
     * Handle the delete request.
     *
     * @param  \App\Http\Requests\WebsitePostDeleteRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleDelete(WebsitePostDeleteRequest $request): ResponseData
    {
        return $this->delete($request, $this->websitePostRepository);
    }

    /**
     * Handle the read request.
     *
     * @param null|string|int $id
     * @return array
     */
    public function handleRead(null|string|int $id = null): ResponseData
    {
        return $this->read($this->websitePostRepository, 'website_post', $id);
    }

}
