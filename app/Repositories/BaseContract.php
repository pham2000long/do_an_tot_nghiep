<?php

namespace App\Repositories;

interface BaseContract
{
    /**
     * Get all of the models from the database.
     *
     * @param  array|mixed  $columns
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = array('*'));

    /**
     * Get model by primary key
     *
     * @param  int|string $id
     * @param  array|mixed  $columns
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findById($id, $columns = array('*'));

    /**
     * findWhere function
     *
     * @param array $conditions
     * @return Object | Exception
     */
    public function findWhere($conditions);

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $data
     *
     * @return static
     */
    public function create($data);


    /**
     * Insert a new record into the database.
     *
     * @param  array  $data
     *
     * @return bool
     */
    public function insert($data);

    /**
     * Update a record in the database.
     *
     * @param  object  $obj
     * @param  array  $data
     *
     * @return int
     */
    public function update($obj, $data);

    /**
     * Update a record in the database.
     *
     * @param  array  $data
     * @param  int|string $id
     *
     * @return int
     */
    public function updateById($data, $id);

    /**
     * Destroy the models for the given IDs.
     *
     * @param  array|int  $id
     *
     * @return int
     */
    public function destroy($id);

    /**
     * Delete by condition
     *
     * @param array $condition
     *
     * @return void
     */
    public function deleteWhere(array $condition);

    /**
     * Delete where in condition
     *
     * @param string $column
     * @param array $condition
     *
     * @return void
     */
    public function deleteWhereIn(string $column, array $condition);

    /**
     * IncrementWhere column
     *
     * @param array $condition
     * @param string $column
     * @param int $value
     *
     * @return void
     */
    public function incrementWhere(array $condition, string $column, int $value);

    /**
     * Get an array with the values of a given column.
     *
     * @param  string  $column
     * @param  string|null  $key
     * @param string|null $sortColumn
     * @param string $direction
     *
     * @return array
     */
    public function pluck($column, $key = null, $sortColumn = null, $direction = 'asc');

    /**
     * Update or create function
     *
     * @param array $uniqueData
     * @param array $normalData
     * @return Object | Exception
     */
    public function updateOrCreate(array $uniqueData, array $normalData);

    /**
     * First or create function
     *
     * @param array $uniqueData
     * @param array $normalData
     * @return Object
     */
    public function firstOrCreate(array $uniqueData, array $normalData);

    /**
     * Update by condition
     *
     * @param array $condition
     * @param array $data
     * @return void
     */
    public function updateWhere(array $condition, array $data);
}
