<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPubCreateRequest;
use App\Http\Requests\UserPubDeleteRequest;
use App\Http\Requests\UserPubReadRequest;
use App\Http\Requests\UserPubUpdateRequest;
use App\Services\UserPubService;
use Illuminate\Http\JsonResponse;

class UserPubController extends Controller
{

    public function __construct(private UserPubService $userPubService)
    { }

    /**
     * Create UserPub.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam user_id string The id of the User. Example: 1
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
     * @subgroup UserPub APIs
     * @group Auth APIs
     */
    public function create(UserPubCreateRequest $request): JsonResponse
    {
        return $this->_create($request, $this->userPubService);
    }

    /**
     * Update UserPub.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam id string required The id of the UserPub. Example: 1
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
     * @subgroup UserPub APIs
     * @group Auth APIs
     */
    public function update(UserPubUpdateRequest $request): JsonResponse
    {
        return $this->_update($request, $this->userPubService);
    }

    /**
     * Delete UserPub.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam id string required The id of the UserPub. Example: 1
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
     * @subgroup UserPub APIs
     * @group Auth APIs
     */
    public function delete(UserPubDeleteRequest $request): JsonResponse
    {
        return $this->_delete($request, $this->userPubService);
    }

    /**
     * Read UserPub.
     *
     * Fetch a record or records from the UserPubs table.
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
     * @subgroup UserPub APIs
     * @group Auth APIs
     */
    public function read(UserPubReadRequest $request, null|string|int $id = null): JsonResponse
    {
        return $this->_read($this->userPubService, $id);
    }

}
