<?php

namespace App\Http\Controllers\Admin\DataTable;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class UserController extends DataTableController
{
    protected $allowCreation = false;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:admin']);

        $builder = $this->builder();
        
        if (!$builder instanceof Builder) {
            throw new \Exception('Entity builder not instance of Builder');
        }

        $this->builder = $builder;
    }

    /**
     * Get the builder for the entity.
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function builder()
    {
        return User::Query();
    }

    /**
     * Get the columns that we can display.
     *
     * @return array
     */
    public function getDisplayableColumns()
    {
        return [
            'id', 'name', 'email', 'gender' ,'phone', 'street_address', 'status'
        ];
    }

    /**
     * Get the columns that we can update.
     *
     * @return array
     */
    public function getUpdatableColumns()
    {
        return [
            'name', 'email', 'gender' ,'phone', 'street_address', 'status'
        ];
    }
}
