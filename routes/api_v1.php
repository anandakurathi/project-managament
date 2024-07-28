<?php

use App\Http\Controllers\V1\ProjectController;
use Illuminate\Support\Facades\Route;

Route::resources([
    'projects' => ProjectController::class,
]);
