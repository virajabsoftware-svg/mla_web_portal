<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\MlaDevelopmentWorkModel;
use App\Models\User\DashboardModel;

class MlaRatingForm extends BaseController
{
   public function form()
{
    return view('user/mla_rating_form');
}
}
?>