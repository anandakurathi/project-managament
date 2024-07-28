<?php

use App\Http\Controllers\V2\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resources([
    'projects' => ProjectController::class,
]);
