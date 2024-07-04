<?php

namespace App\Contracts;

use App\Models\UserSub;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserSubRepositoryInterface
{

    /**
     * Fetch all \App\Models\UserSub records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): EloquentCollection;

    /**
     * Fetch \App\Models\UserSub record by ID.
     *
     * @param int $id
     * @return \App\Models\UserSub|null
     */
    public function getById(int $id): null|UserSub;

    /**
     * Delete \App\Models\UserSub record by ID.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;

    /**
     * Create \App\Models\UserSub record.
     *
     * @param array $arrayDetails
     * @return \App\Models\UserSub
     */
    public function create(array $arrayDetails): UserSub;

    /**
     * Fetch or create a single \App\Models\UserSub record.
     *
     * @param array $matchDetails
     * @param array $arrayDetails
     * @return \App\Models\UserSub
     */
    public function firstOrCreate(array $matchDetails, array $arrayDetails): UserSub;

    /**
     * Update \App\Models\UserSub record.
     *
     * @param int $id
     * @param array $arrayDetails
     * @return int
     */
    public function update(int $id, array $arrayDetails): int;

    /**
     * Update \App\Models\UserSub record.
     *
     * @param int $pageSize
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginated(int $pageSize): LengthAwarePaginator;

    /**
     * Get by website ID
     *
     * @param integer $websiteId
     * @return Builder
     */
    public function getByWebsiteId(int $websiteId): Builder;
}
