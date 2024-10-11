<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComprasResource\Pages;
use App\Filament\Resources\ComprasResource\RelationManagers;
use App\Models\Compras;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComprasResource extends Resource
{
    protected static ?string $model = Compras::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('proveedor_id')
                    ->relationship('proveedor', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('producto_id')
                    ->relationship('producto', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('cantidad')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('preciocompra')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('soportecontable')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('valorporunidad')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('proveedor.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('producto.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cantidad')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('preciocompra')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('soportecontable')
                    ->searchable(),
                Tables\Columns\TextColumn::make('valorporunidad')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListCompras::route('/'),
            'create' => Pages\CreateCompras::route('/create'),
            'edit' => Pages\EditCompras::route('/{record}/edit'),
        ];
    }
}
