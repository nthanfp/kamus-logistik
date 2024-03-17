<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DictionaryResource\Pages;
use App\Filament\Resources\DictionaryResource\RelationManagers;
use App\Models\Dictionary;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DictionaryResource extends Resource
{
    protected static ?string $model = Dictionary::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('indonesian')
                    ->required()
                    ->maxLength(255)
                    ->live(debounce: 250)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('indonesian_slug', Str::slug($state))),
                Forms\Components\TextInput::make('english')
                    ->required()
                    ->maxLength(255)
                    ->live(debounce: 250)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('english_slug', Str::slug($state))),
                Forms\Components\TextInput::make('indonesian_slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('english_slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\RichEditor::make('indonesian_definition')
                    ->required(),
                Forms\Components\RichEditor::make('english_definition')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('indonesian')
                    ->searchable(),
                Tables\Columns\TextColumn::make('english')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
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
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListDictionaries::route('/'),
            'create' => Pages\CreateDictionary::route('/create'),
            'edit' => Pages\EditDictionary::route('/{record}/edit'),
        ];
    }
}
