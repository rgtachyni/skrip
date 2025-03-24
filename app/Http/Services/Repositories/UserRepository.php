<?php

namespace App\Http\Services\Repositories;

use App\Http\Services\Repositories\BaseRepository;
use App\Http\Services\Repositories\Contracts\UserContract;
use App\Models\User;

class UserRepository extends BaseRepository implements UserContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function paginated(array $criteria)
    {
        $perPage = $criteria['jml'] ?? 5;
        $search = $criteria['cari'] ?? '';
        return $this->model->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere("username", "like", "%{$search}%")
                ->orWhere("email", "like", "%{$search}%");
        })
            ->orderBy('id', 'asc')
            ->paginate($perPage);
    }
}
