<?php

namespace App\Contracts;

use App\Models\WebsitePost;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Pagination\LengthAwarePaginator;

interface WebsitePostRepositoryInterface
{

    /**
     * Fetch all \App\Models\WebsitePost records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): EloquentCollection;

    /**
     * Fetch \App\Models\WebsitePost record by ID.
     *
     * @param int $id
     * @return \App\Models\WebsitePost|null
     */
    public function getById(int $id): null|WebsitePost;

    /**
     * Delete \App\Models\WebsitePost record by ID.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;

    /**
     * Create \App\Models\WebsitePost record.
     *
     * @param array $arrayDetails
     * @return \App\Models\WebsitePost
     */
    public function create(array $arrayDetails): WebsitePost;

    /**
     * Fetch or create a single \App\Models\WebsitePost record.
     *
     * @param array $matchDetails
     * @param array $arrayDetails
     * @return \App\Models\WebsitePost
     */
    public function firstOrCreate(array $matchDetails, array $arrayDetails): WebsitePost;

    /**
     * Update \App\Models\WebsitePost record.
     *
     * @param int $id
     * @param array $arrayDetails
     * @return int
     */
    public function update(int $id, array $arrayDetails): int;

    /**
     * Update \App\Models\WebsitePost record.
     *
     * @param int $pageSize
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginated(int $pageSize): LengthAwarePaginator;
}
