<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationLabel = 'Услуги';

    protected static ?string $modelLabel = 'услуга';

    protected static ?string $pluralModelLabel = 'Услуги';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Основное')->schema([
                    TextInput::make('title')
                        ->label('Название')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('slug')
                        ->label('URL (подставляется из названия)')
                        ->maxLength(255)
                        ->unique(ignoreRecord: true)
                        ->disabled()
                        ->dehydrated()
                        ->visible(fn ($operation) => $operation === 'edit')
                        ->helperText('Формируется автоматически из названия. На новой услуге не заполняй — подставится при сохранении.'),
                    Textarea::make('for_who')
                        ->label('Для кого (текст)')
                        ->rows(3)
                        ->columnSpanFull(),
                    Repeater::make('what_included')
                        ->label('Что входит (список пунктов)')
                        ->simple(TextInput::make('item')->label('Пункт'))
                        ->defaultItems(0)
                        ->columnSpanFull(),
                    TextInput::make('price')
                        ->label('Цена (₽)')
                        ->numeric()
                        ->default(10)
                        ->minValue(0)
                        ->suffix('₽'),
                    FileUpload::make('image')
                        ->label('Фото на сайт')
                        ->image()
                        ->disk('public')
                        ->directory('services')
                        ->visibility('public')
                        ->fetchFileInformation(false)
                        ->deleteUploadedFileUsing(function ($file): void {
                            if (is_string($file)) {
                                Storage::disk('public')->delete($file);
                            }
                        })
                        ->columnSpanFull(),
                    TextInput::make('sort_order')
                        ->label('Порядок')
                        ->numeric()
                        ->minValue(1)
                        ->default(1)
                        ->helperText('1, 2, 3, 4… — порядок показа на сайте'),
                    Toggle::make('is_active')
                        ->label('Показывать на сайте')
                        ->default(true),
                    TextInput::make('views')
                        ->label('Просмотры')
                        ->numeric()
                        ->disabled()
                        ->dehydrated(false)
                        ->visible(fn ($operation) => $operation === 'edit'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Название')->searchable()->sortable()->limit(25),
                Tables\Columns\TextColumn::make('price')->label('Цена')->money('RUB')->sortable(),
                Tables\Columns\ImageColumn::make('image')->label('Фото')->disk('public'),
                Tables\Columns\TextColumn::make('views')->label('Просмотры')->sortable()->numeric(),
                Tables\Columns\TextColumn::make('slug')->label('URL')->searchable()->limit(18),
                Tables\Columns\IconColumn::make('is_active')->label('На сайте')->boolean()->tooltip('Показывать услугу на сайте'),
                Tables\Columns\TextColumn::make('sort_order')->label('Порядок')->sortable(),
            ])
            ->striped()
            ->defaultSort('sort_order')
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                ActionGroup::make([
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
