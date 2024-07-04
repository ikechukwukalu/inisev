<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebsitePostCreateRequest;
use App\Http\Requests\WebsitePostDeleteRequest;
use App\Http\Requests\WebsitePostReadRequest;
use App\Http\Requests\WebsitePostUpdateRequest;
use App\Services\WebsitePostService;
use Illuminate\Http\JsonResponse;

class WebsitePostController extends Controller
{

    public function __construct(private WebsitePostService $websitePostService)
    { }

    /**
     * Create WebsitePost.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam website_id string required The id of the Website. Example: 1
     * @bodyParam title string required The title of the WebsitePost. Example: New Post
     * @bodyParam description string required The description of the WebsitePost. Example: This is a lovely post!
     * @bodyParam active integer The active status for the Website which can either be 0 or 1. Example: 1
     *
     * @response 200
     *
     * {
     * "success": true,
     * "status_code": 200,
     * "message": string
     * "data": {}
     * }
     *
     * @authenticated
     * @subgroup WebsitePost APIs
     * @group Auth APIs
     */
    public function create(WebsitePostCreateRequest $request): JsonResponse
    {
        return $this->_create($request, $this->websitePostService);
    }

    /**
     * Update WebsitePost.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam id string required The id of the WebsitePost. Example: 1
     * @bodyParam title string required The title of the WebsitePost. Example: New Post
     * @bodyParam description string required The description of the WebsitePost. Example: This is a lovely post!
     * @bodyParam active integer The active status for the Website which can either be 0 or 1. Example: 1
     *
     * @response 200
     *
     * {
     * "success": true,
     * "status_code": 200,
     * "message": string
     * "data": {}
     * }
     *
     * @authenticated
     * @subgroup WebsitePost APIs
     * @group Auth APIs
     */
    public function update(WebsitePostUpdateRequest $request): JsonResponse
    {
        return $this->_update($request, $this->websitePostService);
    }

    /**
     * Delete WebsitePost.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam id string required The id of the WebsitePost. Example: 1
     *
     * @response 200
     *
     * {
     * "success": true,
     * "status_code": 200,
     * "message": string
     * "data": {}
     * }
     *
     * @authenticated
     * @subgroup WebsitePost APIs
     * @group Auth APIs
     */
    public function delete(WebsitePostDeleteRequest $request): JsonResponse
    {
        return $this->_delete($request, $this->websitePostService);
    }

    /**
     * Read WebsitePost.
     *
     * Fetch a record or records from the WebsitePosts table.
     * The <b>id</b> param is optional but can either be a <b>string|null|int</b>
     *
     * If the <b>id</b> has a <b>null</b> value the records will be paginated.
     * The returned page size is be set from <b>api.paginate.user_address.pageSize</b>
     * config.
     *
     * If the <b>id</b> is a <b>string</b> value it can only be set as <b>'all'</b>.
     * This will return all the records without being paginated.
     *
     * If the <b>id</b> value is an <b>integer</b> it will try to fetch a single
     * matching record.
     *
     * @header Authorization Bearer {Your key}
     *
     * @urlParam id string The ID of the record. Example: all
     *
     * @response 200
     *
     * {
     * "success": true,
     * "status_code": 200,
     * "message": string
     * "data": {}
     * }
     *
     * @authenticated
     * @subgroup WebsitePost APIs
     * @group Auth APIs
     */
    public function read(WebsitePostReadRequest $request, null|string|int $id = null): JsonResponse
    {
        return $this->_read($this->websitePostService, $id);
    }

}
