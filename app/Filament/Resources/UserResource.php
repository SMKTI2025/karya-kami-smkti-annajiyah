<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\UserResource\Widgets\UserStats;
use Carbon\Carbon;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'User Management';
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function getWidgets(): array {
        return [
            UserStats::class,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Information')
                ->description('Manage user details and authentication settings.')
                    ->schema([
                        TextInput::make('name')
                            ->required(),

                        TextInput::make('email')
                            ->required()
                            ->email(),

                        TextInput::make('password')
                            ->password()
                            ->minLength(6)
                            ->maxLength(50)
                            ->dehydrateStateUsing(fn($state) => !empty($state) ? bcrypt($state) : null)
                            ->nullable()
                            ->visible(fn($record) => !$record), // Hanya tampil saat create
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    ImageColumn::make('avatar_url')
                        ->circular()
                        ->grow(false)
                        ->getStateUsing(fn($record) => $record->avatar_url ?: "https://ui-avatars.com/api/?name=" . urlencode($record->name)),
                    
                    TextColumn::make('name')
                        ->searchable()
                        ->weight(FontWeight::Bold),
                    
                    Stack::make([
                        TextColumn::make('roles.name')
                            ->searchable()
                            ->icon('heroicon-o-shield-check')
                            ->grow(false),

                        TextColumn::make('email')
                            ->icon('heroicon-m-envelope')
                            ->searchable()
                            ->grow(false),
                    ])->alignStart()->visibleFrom('lg')->space(1),
                ]),
            ])
            ->filters([
                SelectFilter::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->placeholder('Select role...'),
            ])
            ->actions([
                ViewAction::make()->icon('heroicon-o-eye'),
                EditAction::make()->icon('heroicon-o-pencil'),
                Action::make('Set Role')
                    ->icon('heroicon-m-adjustments-vertical')
                    ->form([
                        Select::make('role')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->required(),
                    ])
                    ->action(function (User $record, array $data) {
                        $record->roles()->sync($data['role'] ?? []);
                    })
                    ->successNotificationTitle('Roles updated successfully!'),
                DeleteAction::make()->icon('heroicon-o-trash'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfolistSection::make('User Information')->schema([
                    TextEntry::make('name')
                        ->label('Full Name')
                        ->icon('heroicon-o-user'),
                    TextEntry::make('email')
                        ->label('Email Address')
                        ->icon('heroicon-o-envelope'),

                    TextEntry::make('roles.name')
                        ->label('role user')
                        ->icon('heroicon-o-shield-check'),

                    TextEntry::make('email_verified_at')
                        ->label('Verified At')
                        ->state(fn($record) => $record->email_verified_at 
                            ? Carbon::parse($record->email_verified_at)->format('d M Y, H:i') 
                            : '❌ Not Verified'
                        )
                        ->icon(fn($record) => $record->email_verified_at 
                            ? 'heroicon-o-check-circle' 
                            : ''
                        ),
                ]),
            ]);
    }
}
