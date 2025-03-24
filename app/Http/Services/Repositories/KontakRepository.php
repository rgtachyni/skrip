<?php

namespace App\Http\Services\Repositories;

use App\Http\Services\Repositories\BaseRepository;
use App\Http\Services\Repositories\Contracts\KontakContract;
use App\Models\Kontak;

class KontakRepository extends BaseRepository implements KontakContract
{
	/**
	 * @var
	 */
	protected $model;

	public function __construct(Kontak $model)
	{
		$this->model = $model;
	}

	public function paginated(array $criteria)
	{
		$perPage = $criteria['per_page'] ?? 5;
		$field = $criteria['sort_field'] ?? 'id';
		$sortOrder = $criteria['sort_order'] ?? 'desc';
		return $this->model->orderBy($field, $sortOrder)->paginate($perPage);
	}
}
