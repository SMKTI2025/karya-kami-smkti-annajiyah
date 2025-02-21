<?php

namespace App\Filament\Resources;

use App\Models\Assessment;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use App\Filament\Resources\AssessmentResource\Pages;

class AssessmentResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Assessment::class;

    protected static ?string $navigationGroup = 'Manajemen Karya';
    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'restore',
            'restore_any',
            'replicate',
            'reorder',
            'delete',
            'delete_any',
            'force_delete',
            'force_delete_any',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('work_id')
                    ->label('Karya')
                    ->relationship('work', 'title')
                    ->required(),

                TextInput::make('score')
                    ->label('Nilai')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->required(),

                Textarea::make('comment')
                    ->label('Komentar')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('work.title')
                    ->label('Karya')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('score')
                    ->label('Nilai')
                    ->sortable(),

                TextColumn::make('comment')
                    ->label('Komentar')
                    ->limit(50),
            ])
            ->filters([
                SelectFilter::make('work_id')
                    ->relationship('work', 'title')
                    ->label('Karya'),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssessments::route('/'),
            'create' => Pages\CreateAssessment::route('/create'),
            'edit' => Pages\EditAssessment::route('/{record}/edit'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Detail Penilaian')
                    ->schema([
                        TextEntry::make('work.title')->label('Karya'),
                        TextEntry::make('score')->label('Nilai'),
                        TextEntry::make('comment')->label('Komentar'),
                        TextEntry::make('created_at')
                            ->label('Tanggal Dibuat')
                            ->dateTime(),
                    ]),
            ]);
    }
}
