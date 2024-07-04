<?php

namespace App\Repositories;

use App\Contracts\WebsitePostRepositoryInterface;
use App\Models\WebsitePost;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Pagination\LengthAwarePaginator;

class WebsitePostRepository implements WebsitePostRepositoryInterface
{

    /**
     * Fetch all \App\Models\WebsitePost records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): EloquentCollection
    {
        return WebsitePost::all();
    }

    /**
     * Fetch \App\Models\WebsitePost record by ID.
     *
     * @param int $id
     * @return \App\Models\WebsitePost|null
     */
    public function getById(int $id): null|WebsitePost
    {
        return WebsitePost::find($id);
    }

    /**
     * Delete \App\Models\WebsitePost record by ID.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        WebsitePost::destroy($id);
    }

    /**
     * Create \App\Models\WebsitePost record.
     *
     * @param array $arrayDetails
     * @return \App\Models\WebsitePost
     */
    public function create(array $arrayDetails): WebsitePost
    {
        return WebsitePost::create($arrayDetails);
    }

    /**
     * Fetch or create a single \App\Models\WebsitePost record.
     *
     * @param array $matchDetails
     * @param array $arrayDetails
     * @return \App\Models\WebsitePost
     */
    public function firstOrCreate(array $matchDetails, array $arrayDetails): WebsitePost
    {
        return WebsitePost::firstOrCreate($matchDetails, $arrayDetails);
    }

    /**
     * Update \App\Models\WebsitePost record.
     *
     * @param int $id
     * @param array $arrayDetails
     * @return int
     */
    public function update(int $id, array $arrayDetails): int
    {
        return WebsitePost::where('id', $id)->update($arrayDetails);
    }

    /**
     * Update \App\Models\WebsitePost record.
     *
     * @param int $pageSize
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginated(int $pageSize): LengthAwarePaginator
    {
        return WebsitePost::paginate($pageSize);
    }
}
