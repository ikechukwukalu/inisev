<?php

namespace App\Services;

use App\Actions\ResponseData;
use App\Contracts\WebsiteRepositoryInterface;
use App\Http\Requests\WebsiteCreateRequest;
use App\Http\Requests\WebsiteDeleteRequest;
use App\Http\Requests\WebsiteUpdateRequest;

class WebsiteService extends BasicCrudService
{

    public function __construct(private WebsiteRepositoryInterface $websiteRepository)
    { }

    /**
     * Handle the create request.
     *
     * @param  \App\Http\Requests\WebsiteCreateRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleCreate(WebsiteCreateRequest $request): ResponseData
    {
        return $this->create($request, $this->websiteRepository);
    }

    /**
     * Handle the update request.
     *
     * @param  \App\Http\Requests\WebsiteUpdateRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleUpdate(WebsiteUpdateRequest $request): ResponseData
    {
        return $this->update($request, $this->websiteRepository);
    }

    /**
     * Handle the delete request.
     *
     * @param  \App\Http\Requests\WebsiteDeleteRequest $request
     * @return \App\Actions\ResponseData
     */
    public function handleDelete(WebsiteDeleteRequest $request): ResponseData
    {
        return $this->delete($request, $this->websiteRepository);
    }

    /**
     * Handle the read request.
     *
     * @param null|string|int $id
     * @return array
     */
    public function handleRead(null|string|int $id = null): ResponseData
    {
        return $this->read($this->websiteRepository, 'website', $id);
    }

}
