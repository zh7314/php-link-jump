<?php

namespace app\model;

use support\Model;

class JumpLink extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jump_link';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}