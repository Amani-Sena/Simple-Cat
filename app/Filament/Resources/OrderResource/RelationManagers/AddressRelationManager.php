<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressRelationManager extends RelationManager
{
    protected static string $relationship = 'address';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('first_name')
                ->label('Nome')
                ->required()
                ->maxLength(40),

                TextInput::make('last_name')
                ->label('Sobrenome')
                ->required()
                ->maxLength(40),

                TextInput::make('phone')
                ->label('Telefone')
                ->required()
                ->tel()
                ->maxLength(20),

                TextInput::make('city')
                ->label('Cidade')
                ->required()
                ->maxLength(40),

                TextInput::make('state')
                ->label('Estado')
                ->required()
                ->maxLength(40),

                TextInput::make('zip_code')
                ->label('CEP')
                ->numeric()
                ->required()
                ->maxLength(40),

                Textarea::make('street_address')
                ->label('Endereço')
                ->required()
                ->columnSpanFull(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('street_address')
            ->columns([
                TextColumn::make('fullname')
                ->label('Nome'),

                TextColumn::make('phone')
                ->label('Telefone'),

                TextColumn::make('city')
                ->label('Cidade'),

                TextColumn::make('state')
                ->label('Estado'),

                TextColumn::make('zip_code')
                ->label('CEP'),

                TextColumn::make('street_address')
                ->label('Endereço'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
