<?php

namespace App\Repositories;

use App\Contracts\UserPubRepositoryInterface;
use App\Models\UserPub;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserPubRepository implements UserPubRepositoryInterface
{

    /**
     * Fetch all \App\Models\UserPub records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): EloquentCollection
    {
        return UserPub::all();
    }

    /**
     * Fetch \App\Models\UserPub record by ID.
     *
     * @param int $id
     * @return \App\Models\UserPub|null
     */
    public function getById(int $id): null|UserPub
    {
        return UserPub::find($id);
    }

    /**
     * Delete \App\Models\UserPub record by ID.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        UserPub::destroy($id);
    }

    /**
     * Create \App\Models\UserPub record.
     *
     * @param array $arrayDetails
     * @return \App\Models\UserPub
     */
    public function create(array $arrayDetails): UserPub
    {
        return UserPub::create($arrayDetails);
    }

    /**
     * Fetch or create a single \App\Models\UserPub record.
     *
     * @param array $matchDetails
     * @param array $arrayDetails
     * @return \App\Models\UserPub
     */
    public function firstOrCreate(array $matchDetails, array $arrayDetails): UserPub
    {
        return UserPub::firstOrCreate($matchDetails, $arrayDetails);
    }

    /**
     * Update \App\Models\UserPub record.
     *
     * @param int $id
     * @param array $arrayDetails
     * @return int
     */
    public function update(int $id, array $arrayDetails): int
    {
        return UserPub::where('id', $id)->update($arrayDetails);
    }

    /**
     * Update \App\Models\UserPub record.
     *
     * @param int $pageSize
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginated(int $pageSize): LengthAwarePaginator
    {
        return UserPub::paginate($pageSize);
    }

    /**
     * Get new publications
     *
     * @param int $websiteId
     * @return Builder
     */
    public function getNewPublications(int $websiteId): Builder
    {
        return UserPub::query()->where('website_id', $websiteId)->where('published', '0');
    }
}
