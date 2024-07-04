<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSubCreateRequest;
use App\Http\Requests\UserSubDeleteRequest;
use App\Http\Requests\UserSubReadRequest;
use App\Http\Requests\UserSubUpdateRequest;
use App\Services\UserSubService;
use Illuminate\Http\JsonResponse;

class UserSubController extends Controller
{

    public function __construct(private UserSubService $userSubService)
    { }

    /**
     * Create UserSub.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam user_id string required The id of the User. Example: 1
     * @bodyParam website_id string required The id of the Website. Example: 1
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
     * @subgroup UserSub APIs
     * @group Auth APIs
     */
    public function create(UserSubCreateRequest $request): JsonResponse
    {
        return $this->_create($request, $this->userSubService);
    }

    /**
     * Update UserSub.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam id string required The id of the UserSub. Example: 1
     * @bodyParam name string required The name for the UserSub. Example: John
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
     * @subgroup UserSub APIs
     * @group Auth APIs
     */
    public function update(UserSubUpdateRequest $request): JsonResponse
    {
        return $this->_update($request, $this->userSubService);
    }

    /**
     * Delete UserSub.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam id string required The id of the UserSub. Example: 1
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
     * @subgroup UserSub APIs
     * @group Auth APIs
     */
    public function delete(UserSubDeleteRequest $request): JsonResponse
    {
        return $this->_delete($request, $this->userSubService);
    }

    /**
     * Read UserSub.
     *
     * Fetch a record or records from the UserSubs table.
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
     * @subgroup UserSub APIs
     * @group Auth APIs
     */
    public function read(UserSubReadRequest $request, null|string|int $id = null): JsonResponse
    {
        return $this->_read($this->userSubService, $id);
    }

}
