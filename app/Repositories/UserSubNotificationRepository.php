<?php

namespace App\Repositories;

use App\Contracts\UserSubNotificationRepositoryInterface;
use App\Models\UserSubNotification;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserSubNotificationRepository implements UserSubNotificationRepositoryInterface
{

    /**
     * Fetch all \App\Models\UserSubNotification records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): EloquentCollection
    {
        return UserSubNotification::all();
    }

    /**
     * Fetch \App\Models\UserSubNotification record by ID.
     *
     * @param int $id
     * @return \App\Models\UserSubNotification|null
     */
    public function getById(int $id): null|UserSubNotification
    {
        return UserSubNotification::find($id);
    }

    /**
     * Delete \App\Models\UserSubNotification record by ID.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        UserSubNotification::destroy($id);
    }

    /**
     * Create \App\Models\UserSubNotification record.
     *
     * @param array $arrayDetails
     * @return \App\Models\UserSubNotification
     */
    public function create(array $arrayDetails): UserSubNotification
    {
        return UserSubNotification::create($arrayDetails);
    }

    /**
     * Fetch or create a single \App\Models\UserSubNotification record.
     *
     * @param array $matchDetails
     * @param array $arrayDetails
     * @return \App\Models\UserSubNotification
     */
    public function firstOrCreate(array $matchDetails, array $arrayDetails): UserSubNotification
    {
        return UserSubNotification::firstOrCreate($matchDetails, $arrayDetails);
    }

    /**
     * Update \App\Models\UserSubNotification record.
     *
     * @param int $id
     * @param array $arrayDetails
     * @return int
     */
    public function update(int $id, array $arrayDetails): int
    {
        return UserSubNotification::where('id', $id)->update($arrayDetails);
    }

    /**
     * Update \App\Models\UserSubNotification record.
     *
     * @param int $pageSize
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginated(int $pageSize): LengthAwarePaginator
    {
        return UserSubNotification::paginate($pageSize);
    }
}
