<?php

namespace App\Repositories;

use App\Contracts\WebsiteRepositoryInterface;
use App\Models\Website;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Pagination\LengthAwarePaginator;

class WebsiteRepository implements WebsiteRepositoryInterface
{

    /**
     * Fetch all \App\Models\Website records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): EloquentCollection
    {
        return Website::all();
    }

    /**
     * Fetch \App\Models\Website record by ID.
     *
     * @param int $id
     * @return \App\Models\Website|null
     */
    public function getById(int $id): null|Website
    {
        return Website::find($id);
    }

    /**
     * Delete \App\Models\Website record by ID.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        Website::destroy($id);
    }

    /**
     * Create \App\Models\Website record.
     *
     * @param array $arrayDetails
     * @return \App\Models\Website
     */
    public function create(array $arrayDetails): Website
    {
        return Website::create($arrayDetails);
    }

    /**
     * Fetch or create a single \App\Models\Website record.
     *
     * @param array $matchDetails
     * @param array $arrayDetails
     * @return \App\Models\Website
     */
    public function firstOrCreate(array $matchDetails, array $arrayDetails): Website
    {
        return Website::firstOrCreate($matchDetails, $arrayDetails);
    }

    /**
     * Update \App\Models\Website record.
     *
     * @param int $id
     * @param array $arrayDetails
     * @return int
     */
    public function update(int $id, array $arrayDetails): int
    {
        return Website::where('id', $id)->update($arrayDetails);
    }

    /**
     * Update \App\Models\Website record.
     *
     * @param int $pageSize
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginated(int $pageSize): LengthAwarePaginator
    {
        return Website::paginate($pageSize);
    }

    /**
     * Query builder
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function queryBuilder(): Builder
    {
        return Website::query();
    }
}
