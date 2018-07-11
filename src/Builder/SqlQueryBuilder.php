<?php

namespace Wrcx\Losquery\Builder;

use Aura\SqlQuery\Sqlite\Select as Builder;
use Wrcx\Losquery\Builder\SqlQueryInterface;

class SqlQueryBuilder implements SqlQueryInterface
{
    protected $builder;

    /**
     * SqlQueryBuilder constructor.
     *
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param string $table
     *
     * @return $this
     */
    public function from($table)
    {
        $this->builder->from($table);
        return $this;
    }

    /**
     * @param string|null $alias
     *
     * @return $this
     */
    public function fromSelect($alias = null)
    {
        if ($alias === null) {
            $alias = md5(serialize($this->builder));
        }
        $this->builder->fromSubSelect((string) $this->builder, $alias);
        return $this;
    }

    /**
     * @param string $clause
     *
     * @return $this
     */
    public function where($clause)
    {
        $this->builder->where($clause);

        return $this;
    }

    /**
     * @param string $clause
     *
     * @return $this
     */
    public function orWhere($clause)
    {
        $this->builder->orWhere($clause);

        return $this;
    }

    /**
     * @param mixed $columns
     *
     * @return $this
     */
    public function groupBy($columns)
    {
        if (!is_array($columns)) {
            $columns = [$columns];
        }
        $this->builder->groupBy($columns);
        return $this;
    }

    /**
     * @param string $clause
     *
     * @return $this
     */
    public function having($clause)
    {
        $this->builder->having($clause);

        return $this;
    }

    /**
     * @param string $clause
     *
     * @return $this
     */
    public function orHaving($clause)
    {
        $this->builder->orHaving($clause);

        return $this;
    }

    /**
     * @param mixed $columns
     *
     * @return $this
     */
    public function orderBy($columns)
    {
        if (!is_array($columns)) {
            $columns = [$columns];
        }
        $this->builder->orderBy($columns);
        return $this;
    }

    /**
     * @param int $limit
     *
     * @return $this
     */
    public function limit(int $limit)
    {
        $this->builder->limit($limit);
        return $this;
    }

    /**
     * @param int $offset
     *
     * @return $this
     */
    public function offset(int $offset)
    {
        $this->builder->offset($offset);
        return $this;
    }

    /*
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function binding($key, $value = null)
    {
        $bindings = $key;
        if (!is_array($bindings)) {
            $bindings = [$key => $value];
        }
        foreach ($bindings as $key => $value) {
            $this->builder->bindValue($key, $value);
        }
        return $this;
    }

    /**
     * @param string $columns
     *
     * @return $this
     */
    public function select($columns = "*")
    {
        return $this->columns($columns);
    }

    /**
     * @param string $columns
     *
     * @return $this
     */
    public function columns($columns = "*")
    {
        if (!is_array($columns)) {
            $columns = [$columns];
        }
        $this->builder->cols($columns);
        return $this;
    }

    /**
     * @param string      $join
     * @param string      $specification
     * @param string|null $clause
     * @param array       $bind
     *
     * @return $this
     */
    public function join(string $join, $specification, $clause = null, $bind = [])
    {
        if (!is_array($bind)) {
            $bind = [$bind];
        }
        $this->builder->join($join, $specification, $clause, $bind);
        return $this;
    }

    /**
     * @param string      $specification
     * @param string|null $clause
     * @param array       $bind
     *
     * @return $this
     */
    public function innerJoin($specification, $clause = null, $bind = [])
    {
        if (!is_array($bind)) {
            $bind = [$bind];
        }
        $this->join('INNER', $specification, $clause, $bind);

        return $this;
    }

    /**
     * @param string      $specification
     * @param string|null $clause
     * @param array       $bind
     *
     * @return $this
     */
    public function leftJoin($specification, $clause = null, $bind = [])
    {
        if (!is_array($bind)) {
            $bind = [$bind];
        }
        $this->join('LEFT', $specification, $clause, $bind);

        return $this;
    }

    /**
     * @return string
     */
    public function get()
    {
        return $this->builder->getStatement();
    }

    /**
     * @param string $query
     *
     * @return string
     */
    public function raw($query)
    {
        return $query;
    }
}
