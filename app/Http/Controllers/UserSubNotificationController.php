<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSubNotificationCreateRequest;
use App\Http\Requests\UserSubNotificationDeleteRequest;
use App\Http\Requests\UserSubNotificationReadRequest;
use App\Http\Requests\UserSubNotificationUpdateRequest;
use App\Services\UserSubNotificationService;
use Illuminate\Http\JsonResponse;

class UserSubNotificationController extends Controller
{

    public function __construct(private UserSubNotificationService $userSubNotificationService)
    { }

    /**
     * Create UserSubNotification.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam name string required The name of the UserSubNotification. Example: John
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
     * @subgroup UserSubNotification APIs
     * @group Auth APIs
     */
    public function create(UserSubNotificationCreateRequest $request): JsonResponse
    {
        return $this->_create($request, $this->userSubNotificationService);
    }

    /**
     * Update UserSubNotification.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam id string required The id of the UserSubNotification. Example: 1
     * @bodyParam name string required The name for the UserSubNotification. Example: John
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
     * @subgroup UserSubNotification APIs
     * @group Auth APIs
     */
    public function update(UserSubNotificationUpdateRequest $request): JsonResponse
    {
        return $this->_update($request, $this->userSubNotificationService);
    }

    /**
     * Delete UserSubNotification.
     *
     * @header Authorization Bearer {Your key}
     *
     * @bodyParam id string required The id of the UserSubNotification. Example: 1
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
     * @subgroup UserSubNotification APIs
     * @group Auth APIs
     */
    public function delete(UserSubNotificationDeleteRequest $request): JsonResponse
    {
        return $this->_delete($request, $this->userSubNotificationService);
    }

    /**
     * Read UserSubNotification.
     *
     * Fetch a record or records from the UserSubNotifications table.
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
     * @subgroup UserSubNotification APIs
     * @group Auth APIs
     */
    public function read(UserSubNotificationReadRequest $request, null|string|int $id = null): JsonResponse
    {
        return $this->_read($this->userSubNotificationService, $id);
    }

}
