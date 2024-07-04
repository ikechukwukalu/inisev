<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebsiteCreateRequest;
use App\Http\Requests\WebsiteDeleteRequest;
use App\Http\Requests\WebsiteReadRequest;
use App\Http\Requests\WebsiteUpdateRequest;
use App\Services\WebsiteService;
use Illuminate\Http\JsonResponse;

class WebsiteController extends Controller
{

    public function __construct(private WebsiteService $websiteService)
    { }

    /**
     * Create Website.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam name string required The name of the Website. Example: ESPN Fake
     * @bodyParam url string required The name of the Website. Example: https://espnfake.com
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
     * @subgroup Website APIs
     * @group Auth APIs
     */
    public function create(WebsiteCreateRequest $request): JsonResponse
    {
        return $this->_create($request, $this->websiteService);
    }

    /**
     * Update Website.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam id string required The id of the Website. Example: 1
     * @bodyParam name string required The name of the Website. Example: CNN Fake
     * @bodyParam url string required The name of the Website. Example: https://cnnfake.com
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
     * @subgroup Website APIs
     * @group Auth APIs
     */
    public function update(WebsiteUpdateRequest $request): JsonResponse
    {
        return $this->_update($request, $this->websiteService);
    }

    /**
     * Delete Website.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam id string required The id of the Website. Example: 1
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
     * @subgroup Website APIs
     * @group Auth APIs
     */
    public function delete(WebsiteDeleteRequest $request): JsonResponse
    {
        return $this->_delete($request, $this->websiteService);
    }

    /**
     * Read Website.
     *
     * Fetch a record or records from the Websites table.
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
     * @subgroup Website APIs
     * @group Auth APIs
     */
    public function read(WebsiteReadRequest $request, null|string|int $id = null): JsonResponse
    {
        return $this->_read($this->websiteService, $id);
    }

}
