<?php

namespace Wrcx\Losquery\Builder;

interface SqlQueryInterface
{

    /**
     * @param string $table
     *
     * @return $this
     */
    public function from($table);

    /**
     * @param string|null $alias
     *
     * @return $this
     */
    public function fromSelect($alias = null);

    /**
     * @param string $clause
     *
     * @return $this
     */
    public function where($clause);

    /**
     * @param string $clause
     *
     * @return $this
     */
    public function orWhere($clause);

    /**
     * @param mixed $columns
     *
     * @return $this
     */
    public function groupBy($columns);

    /**
     * @param string $clause
     *
     * @return $this
     */
    public function having($clause);

    /**
     * @param string $clause
     *
     * @return $this
     */
    public function orHaving($clause);

    /**
     * @param mixed $columns
     *
     * @return $this
     */
    public function orderBy($columns);

    /**
     * @param int $limit
     *
     * @return $this
     */
    public function limit(int $limit);

    /**
     * @param int $offset
     *
     * @return $this
     */
    public function offset(int $offset);

    /*
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function binding($key, $value = null);

    /**
     * @param string $columns
     *
     * @return $this
     */
    public function select($columns = "*");

    /**
     * @param string $columns
     *
     * @return $this
     */
    public function columns($columns = "*");

    /**
     * @param string      $join
     * @param string      $specification
     * @param string|null $clause
     * @param array       $bind
     *
     * @return $this
     */
    public function join($join, $specification, $clause = null, $bind = []);

    /**
     * @param string      $specification
     * @param string|null $clause
     * @param array       $bind
     *
     * @return $this
     */
    public function innerJoin($specification, $clause = null, $bind = []);

    /**
     * @param string      $specification
     * @param string|null $clause
     * @param array       $bind
     *
     * @return $this
     */
    public function leftJoin($specification, $clause = null, $bind = []);

    /**
     * @return string
     */
    public function get();

    /**
     * @param string $query
     *
     * @return string
     */
    public function raw($query);
}
