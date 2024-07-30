<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EpisodeResource\Pages;
use App\Filament\Resources\EpisodeResource\RelationManagers;
use App\Models\Episode;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EpisodeResource extends Resource
{
    protected static ?string $model = Episode::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('series_id')
                    ->label('Series')
                    ->relationship('series', 'title')
                    ->required(),

                Forms\Components\TextInput::make('title')
                    ->maxLength(255)
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->required(),

                Forms\Components\TextInput::make('duration')
                    ->required()
                    ->numeric(),

                Forms\Components\DateTimePicker::make('airing_time')
                    ->required(),

                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->image()
                    ->imageEditor()
                    ->required(),

                Forms\Components\FileUpload::make('video_content')
                    ->label('Video Content')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('series.title')
                    ->label('Series'),

                Tables\Columns\TextColumn::make('title'),

                Tables\Columns\TextColumn::make('description')
                    ->limit(50),

                Tables\Columns\TextColumn::make('duration'),

                Tables\Columns\TextColumn::make('airing_time')
                    ->label('Airing Time')
                    ->dateTime(),
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
            'index' => Pages\ListEpisodes::route('/'),
            'create' => Pages\CreateEpisode::route('/create'),
            'edit' => Pages\EditEpisode::route('/{record}/edit'),
        ];
    }
}
