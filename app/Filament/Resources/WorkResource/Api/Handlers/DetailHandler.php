<?php

namespace App\Filament\Resources\WorkResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\WorkResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\WorkResource\Api\Transformers\WorkTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = WorkResource::class;


    /**
     * Show Work
     *
     * @param Request $request
     * @return WorkTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');
        
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new WorkTransformer($query);
    }
}
