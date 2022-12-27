<?php

namespace core\models;

use core\models\UsersDatabaseModel;
use core\models\UsersApiModel;
use core\GorestCurlBuilder;

class DataSourceFactory
{
    public function getModel(): UsersApiModel|UsersDatabaseModel
    {
        switch ($_COOKIE['dataSource']) {
            case ("gorest"):
                $model = new UsersApiModel(new GorestCurlBuilder());
                break;
            case ("local"):
            default:
                $model = new UsersDatabaseModel();
                break;
        }

        return $model;
    }
}