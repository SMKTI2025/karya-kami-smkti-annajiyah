<?php
namespace App\Filament\Resources\WorkResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\WorkResource;
use Illuminate\Routing\Router;


class WorkApiService extends ApiService
{
    protected static string | null $resource = WorkResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
