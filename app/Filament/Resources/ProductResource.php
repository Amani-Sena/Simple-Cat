<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Actions\ActionGroup;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Informação do produto')->schema([
                        TextInput::make('name')
                        ->label('Nome')
                        ->required()
                        ->live(onBlur: true)
                        ->maxlength(255)
                        ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->disabled()
                        ->dehydrated()
                        ->unique(Product::class, 'slug', ignoreRecord: true),

                        MarkdownEditor::make('description')
                        ->label('Descrição')
                        ->columnSpanFull()
                        ->fileAttachmentsDirectory('products'),
                    ])->columns(2),

                    Section::make('Images')->schema([
                        FileUpload::make('images')
                        ->multiple()
                        ->directory('products')
                        ->maxFiles(5)
                        ->reorderable(),
                    ])
                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make('Preço')->schema([
                        TextInput::make('price')
                        ->label('Preço')
                        ->numeric()
                        ->required()
                        ->prefix('R$'),
                    ]),

                    Section::make('Associação')->schema([
                        Select::make('category_id')
                        ->label('Categoria')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->relationship('category', 'name'),

                        Select::make('brand_id')
                        ->label('Marca')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->relationship('brand', 'name'),    
                    ]),

                    Section::make('Status')->schema([
                        Toggle::make('Em estoque')
                        ->required()
                        ->default(true),

                        Toggle::make('Está ativo')
                        ->required()
                        ->default(true),

                        Toggle::make('Está em destaque')
                        ->required(),

                        Toggle::make('A venda')
                        ->required(),
                    ])

                ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label('Nome')
                ->searchable(),

                TextColumn::make('category.name')
                ->sortable(),

                TextColumn::make('brand.name')
                ->sortable(),

                TextColumn::make('price')
                ->label('Preço')
                ->money('BRL')
                ->sortable(),

                IconColumn::make('is_featured')
                ->label("Em destaque")
                ->boolean(),

                IconColumn::make('on_sale')
                ->label('A venda')
                ->boolean(),

                IconColumn::make('in_stock')
                ->label('Em estoque')
                ->boolean(),

                IconColumn::make('is_active')
                ->label('Ativo')
                ->boolean(),

                TextColumn::make('created_at')
                ->label('Criado em')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('update_at')
                ->label('Atualizado em')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                SelectFilter::make('category')
                ->label('Categoria')
                ->relationship('category', 'name'),

                SelectFilter::make('brand')
                ->label('Marca')
                ->relationship('brand', 'name'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
