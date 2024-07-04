<?php

namespace App\Contracts;

use App\Models\UserSubNotification;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserSubNotificationRepositoryInterface
{

    /**
     * Fetch all \App\Models\UserSubNotification records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): EloquentCollection;

    /**
     * Fetch \App\Models\UserSubNotification record by ID.
     *
     * @param int $id
     * @return \App\Models\UserSubNotification|null
     */
    public function getById(int $id): null|UserSubNotification;

    /**
     * Delete \App\Models\UserSubNotification record by ID.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;

    /**
     * Create \App\Models\UserSubNotification record.
     *
     * @param array $arrayDetails
     * @return \App\Models\UserSubNotification
     */
    public function create(array $arrayDetails): UserSubNotification;

    /**
     * Fetch or create a single \App\Models\UserSubNotification record.
     *
     * @param array $matchDetails
     * @param array $arrayDetails
     * @return \App\Models\UserSubNotification
     */
    public function firstOrCreate(array $matchDetails, array $arrayDetails): UserSubNotification;

    /**
     * Update \App\Models\UserSubNotification record.
     *
     * @param int $id
     * @param array $arrayDetails
     * @return int
     */
    public function update(int $id, array $arrayDetails): int;

    /**
     * Update \App\Models\UserSubNotification record.
     *
     * @param int $pageSize
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginated(int $pageSize): LengthAwarePaginator;

    /**
     * Get subscription
     *
     * @param integer $userId
     * @param integer $userPubId
     * @param integer $websiteId
     * @return UserSubNotification|null
     */
    public function getSubscription(int $userId, int $userPubId, int $websiteId): UserSubNotification|null;
}
