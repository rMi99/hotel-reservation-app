<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('hotel_id')
                    ->tel()
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('room_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('room_type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('occupancy')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('location')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('images')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hotel_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('room_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('room_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('occupancy')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('images')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
