<?php

namespace App\Http\Services\Repositories;

use App\Http\Services\Repositories\BaseRepository;
use App\Http\Services\Repositories\Contracts\RoleContract;
use App\Models\Role;

class RoleRepository extends BaseRepository implements RoleContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function paginated(array $criteria)
    {
        $perPage = $criteria['jml'] ?? 5;
        $search = $criteria['cari'] ?? '';
        return $this->model->when($search, function ($query) use ($search) {
            $query->where('role', 'like', "%{$search}%")
                ->orWhere("name", "like", "%{$search}%");
        })
            ->orderBy('id', 'asc')
            ->paginate($perPage);
    }
}
