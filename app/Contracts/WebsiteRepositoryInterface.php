<?php

namespace App\Contracts;

use App\Models\Website;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Pagination\LengthAwarePaginator;

interface WebsiteRepositoryInterface
{

    /**
     * Fetch all \App\Models\Website records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): EloquentCollection;

    /**
     * Fetch \App\Models\Website record by ID.
     *
     * @param int $id
     * @return \App\Models\Website|null
     */
    public function getById(int $id): null|Website;

    /**
     * Delete \App\Models\Website record by ID.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;

    /**
     * Create \App\Models\Website record.
     *
     * @param array $arrayDetails
     * @return \App\Models\Website
     */
    public function create(array $arrayDetails): Website;

    /**
     * Fetch or create a single \App\Models\Website record.
     *
     * @param array $matchDetails
     * @param array $arrayDetails
     * @return \App\Models\Website
     */
    public function firstOrCreate(array $matchDetails, array $arrayDetails): Website;

    /**
     * Update \App\Models\Website record.
     *
     * @param int $id
     * @param array $arrayDetails
     * @return int
     */
    public function update(int $id, array $arrayDetails): int;

    /**
     * Update \App\Models\Website record.
     *
     * @param int $pageSize
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginated(int $pageSize): LengthAwarePaginator;

    /**
     * Query builder for validation
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function queryBuilder(): Builder;
}
