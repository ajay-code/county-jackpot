<?php

namespace App\Http\Controllers\Admin\DataTable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;

abstract class DataTableController extends Controller
{
    /**
     * If we can create an entity or not.
     *
     * @var boolean
     */
    protected $allowCreation = true;
    protected $allowDeletion = true;

    /**
     * The entity builder.
     *
     * @var Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * Get the builder for the entity.
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    abstract public function builder();

    /**
     * Create the controller, check and assign the builder.
     *
     * @return  void
     */
    public function __construct()
    {
        $builder = $this->builder();
        
        if (!$builder instanceof Builder) {
            throw new Exception('Entity builder not instance of Builder');
        }

        $this->builder = $builder;
    }

    /**
     * Get records.
     *
     * @param \Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $paginated = $this->getRecords($request);
        return response()->json([
            'data' => [
                'table' => $this->builder->getModel()->getTable(),
                'displayable' => array_values($this->getDisplayableColumns()),
                'updatable' => array_values($this->getUpdatableColumns()),
                'records' => $paginated->items(),
                'pageInfo' => $this->getPageInfo($paginated),
                'allow' => [
                    'creation' => $this->allowCreation,
                    'deletion' => $this->allowDeletion
                ]
            ]
        ]);
    }

    /**
     * Get all records.
     *
     * @param  Request $request
     * @return mixed
     */
    protected function getRecords(Request $request)
    {
        $builder = $this->builder;

        if ($this->hasSearchQuery($request)) {
            $builder = $this->buildSearch($builder, $request);
        }

        try {
            return $this->builder->orderBy('id', 'asc')->select($this->getDisplayableColumns())->paginate($request->limit);
        } catch (QueryException $e) {
            return [];
        }
    }

    /**
     * Update a record.
     *
     * @param  mixed  $id
     * @param  Request $request
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        $this->builder->find($id)->update($request->only($this->getUpdatableColumns()));
    }

    /**
     * Create a record.
     *
     * @param  Request $request
     * @return void
     */
    public function store(Request $request)
    {
        if (!$this->allowCreation) {
            return;
        }

        $this->builder->create($request->only($this->getUpdatableColumns()));
    }

    /**
     * Get the columns that we can display.
     *
     * @return array
     */
    public function getDisplayableColumns()
    {
        return array_diff($this->getDatabaseColumnNames(), $this->builder->getModel()->getHidden());
    }

    /**
     * Get the columns that we can update.
     *
     * @return array
     */
    public function getUpdatableColumns()
    {
        return $this->getDisplayableColumns();
    }

    /**
     * Get the database column names.
     *
     * @return array
     */
    protected function getDatabaseColumnNames()
    {
        return Schema::getColumnListing($this->builder->getModel()->getTable());
    }

    /**
     * If the request has a search query.
     *
     * @param  Request $request
     * @return boolean
     */
    protected function hasSearchQuery(Request $request)
    {
        return count(array_filter($request->only(['column', 'operator', 'value']))) === 3;
    }

    /**
     * Build up the search.
     *
     * @param  Builder $builder
     * @param  Request $request
     *
     * @return Builder
     */
    protected function buildSearch(Builder $builder, Request $request)
    {
        $queryParts = $this->resolveQueryParts($request->operator, $request->value);

        return $builder->where($request->column, $queryParts['operator'], $queryParts['value']);
    }

    /**
     * Resolve the parts needed for a search query.
     *
     * @param  string $operator
     * @param  mixed $value
     *
     * @return array
     */
    protected function resolveQueryParts($operator, $value)
    {
        return array_get([
            'equals' => [
                'operator' => '=',
                'value' => $value
            ],
            'contains' => [
                'operator' => 'LIKE',
                'value' => "%{$value}%"
            ],
            'starts_with' => [
                'operator' => 'LIKE',
                'value' => "{$value}%"
            ],
            'ends_with' => [
                'operator' => 'LIKE',
                'value' => "%{$value}"
            ],
            'greater_than' => [
                'operator' => '>',
                'value' => $value
            ],
            'less_than' => [
                'operator' => '<',
                'value' => $value
            ]
        ], $operator);
    }

    /**
     * Get Page info
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $pafinated
     * @return array
     */
    protected function getPageInfo($paginated)
    {
        return [
            'current_page' => $paginated->currentPage(),
            'from' => $paginated->firstItem(),
            'last_page' => $paginated->lastPage(),
            'next_page_url' => $paginated->nextPageUrl(),
            'per_page' => $paginated->perPage(),
            'prev_page_url' => $paginated->previousPageUrl(),
            'to' => $paginated->lastItem(),
            'total' => $paginated->total(),
        ];
    }
}
