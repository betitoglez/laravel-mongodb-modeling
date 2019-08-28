<?php

namespace Betitoglez\MongoDB;

use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

abstract class AbstractModel extends MongoModel
{
		protected $connection = 'mongodb';
}