<?php
namespace App\Filament\Resources\WorkResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\WorkResource;
use App\Filament\Resources\WorkResource\Api\Requests\CreateWorkRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = WorkResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Work
     *
     * @param CreateWorkRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateWorkRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}