<?php

namespace Worker\Shared\Models;

use Worker\Shared\Databases\Eloquent\EloquentDatabase;
use Illuminate\Database\Eloquent\Model;

EloquentDatabase::load();

abstract class BaseModelEloquent extends Model {}