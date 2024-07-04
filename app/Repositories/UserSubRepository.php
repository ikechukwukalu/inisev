<?php

namespace App\Repositories;

use App\Contracts\UserSubRepositoryInterface;
use App\Models\UserSub;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserSubRepository implements UserSubRepositoryInterface
{

    /**
     * Fetch all \App\Models\UserSub records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): EloquentCollection
    {
        return UserSub::with(['user', 'website'])->get();
    }

    /**
     * Fetch \App\Models\UserSub record by ID.
     *
     * @param int $id
     * @return \App\Models\UserSub|null
     */
    public function getById(int $id): null|UserSub
    {
        return UserSub::with(['user', 'website'])->first();
    }

    /**
     * Delete \App\Models\UserSub record by ID.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        UserSub::destroy($id);
    }

    /**
     * Create \App\Models\UserSub record.
     *
     * @param array $arrayDetails
     * @return \App\Models\UserSub
     */
    public function create(array $arrayDetails): UserSub
    {
        return UserSub::create($arrayDetails);
    }

    /**
     * Fetch or create a single \App\Models\UserSub record.
     *
     * @param array $matchDetails
     * @param array $arrayDetails
     * @return \App\Models\UserSub
     */
    public function firstOrCreate(array $matchDetails, array $arrayDetails): UserSub
    {
        return UserSub::firstOrCreate($matchDetails, $arrayDetails);
    }

    /**
     * Update \App\Models\UserSub record.
     *
     * @param int $id
     * @param array $arrayDetails
     * @return int
     */
    public function update(int $id, array $arrayDetails): int
    {
        return UserSub::where('id', $id)->update($arrayDetails);
    }

    /**
     * Update \App\Models\UserSub record.
     *
     * @param int $pageSize
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginated(int $pageSize): LengthAwarePaginator
    {
        return UserSub::with(['user', 'website'])->paginate($pageSize);
    }

    /**
     * Get by website ID
     *
     * @param integer $websiteId
     * @return Builder
     */
    public function getByWebsiteId(int $websiteId): Builder
    {
        return UserSub::query()->where('website_id', $websiteId);
    }
}
