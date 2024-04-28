<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestingResource\Pages;
use App\Filament\Resources\TestingResource\RelationManagers;
use App\Models\Testing;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestingResource extends Resource
{
    protected static ?string $model = Testing::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Placeholder::make('test')
                    ->content(function (Forms\Get $get){
                        return $get('name');
                    })
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ViewColumn::make('deleted_at')
                    ->view('test'),
                Tables\Columns\TextColumn::make('created_at')
                    ->formatStateUsing(fn (string $state): \Illuminate\Contracts\View\View => view(
                        'test',
                        ['state' => $state],
                    )),
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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->recordUrl(null);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTestings::route('/'),
        ];
    }
}
