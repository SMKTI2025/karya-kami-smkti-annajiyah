<?php

namespace App\Filament\Resources;

use App\Models\Work;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\WorkResource\Pages;
use Filament\Infolists\Infolist;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class WorkResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Work::class;
    protected static ?string $navigationGroup = 'Portfolio';
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

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
                TextInput::make('title')->required(),
                Textarea::make('description'),

                Select::make('category')
                    ->options([
                        'design' => 'Design',
                        'web' => 'Web Development',
                        'art' => 'Art',
                    ]),

                FileUpload::make('image')
                    ->label('Thumbnail Karya')
                    ->directory('works'),

                FileUpload::make('source_code')
                    ->label('Source Code')
                    ->acceptedFileTypes([
                        'application/zip', 'application/x-rar-compressed', 
                        'application/x-tar', 'text/plain', 'application/x-gzip'
                    ]),

                FileUpload::make('video')
                    ->label('Video')
                    ->acceptedFileTypes([
                        'video/mp4', 'video/mpeg', 'video/quicktime'
                    ]),

                FileUpload::make('documentation')
                    ->label('Dokumentasi (PDF)')
                    ->acceptedFileTypes(['application/pdf']),

                TextInput::make('meta_tags')
                    ->label('Meta Tags')
                    ->helperText('Pisahkan dengan koma, contoh: web, aplikasi, RPL'),

                Textarea::make('usage_guide')
                    ->label('Cara Penggunaan')
                    ->helperText('Tambahkan panduan penggunaan untuk karya ini'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),

                TextColumn::make('title')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('category')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime(),
            ])
            ->filters([])
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
            'index' => Pages\ListWorks::route('/'),
            'create' => Pages\CreateWork::route('/create'),
            'edit' => Pages\EditWork::route('/{record}/edit'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Detail Karya')->schema([
                    TextEntry::make('title')->label('Judul'),
                    TextEntry::make('category')->label('Kategori'),
                    TextEntry::make('created_at')->label('Tanggal Dibuat')->dateTime(),
                ]),
            ]);
    }
}