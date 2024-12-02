<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;

class CategoryResource extends Resource {
    protected static ?string $model = Category::class;

    protected static ?int $navigationSort = 3;

    public static function getModelLabel(): string {
        return __(key: 'Categories');
    }

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns([
                        'sm' => 1,
                        'md' => 2,
                        'xl' => 2,
                        '2xl' => 3,
                    ])
                    ->schema([
                        TextInput::make('name')
                        ->label('Nome')
                        ->required()
                        ->live(onBlur: true)
                        ->maxlength(255)
                        ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        
                        
                        TextInput::make('slug')
                        ->maxlength(255)
                        ->required()
                        ->disabled()
                        ->dehydrated()
                        ->unique(Category::class, 'slug', ignoreRecord: true),

                        FileUpload::make('image')
                            ->label('Imagem')
                            ->image()
                            ->directory('categories'),

                            Toggle::make('is_active')
                            ->label('Está ativa')
                            ->required()
                            ->default(true),
                        ])
                        
                        
                    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Imagem'),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Está ativo')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                    ->label('Editar'),
                    Tables\Actions\ViewAction::make()
                    ->label('Ver'),
                    Tables\Actions\DeleteAction::make()
                    ->label('Deletar'),
                ])  
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
