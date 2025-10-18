<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryItemResource\Pages;
use App\Models\GalleryItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryItemResource extends Resource
{
    protected static ?string $model = GalleryItem::class;

    protected static ?string $navigationGroup = 'Media';

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Galeri')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true),
                    Forms\Components\TextInput::make('image_url')
                        ->label('URL Gambar')
                        ->url()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('location')
                        ->label('Lokasi')
                        ->maxLength(255),
                    Forms\Components\Textarea::make('caption')
                        ->label('Caption')
                        ->rows(3),
                    Forms\Components\DatePicker::make('captured_at')
                        ->label('Tanggal Pengambilan'),
                    Forms\Components\Select::make('tour_package_id')
                        ->label('Terkait Paket')
                        ->relationship('tourPackage', 'title')
                        ->searchable(),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Preview')
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tourPackage.title')
                    ->label('Paket')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('captured_at')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('captured_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('tour_package_id')
                    ->label('Paket')
                    ->relationship('tourPackage', 'title'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleryItems::route('/'),
            'create' => Pages\CreateGalleryItem::route('/create'),
            'edit' => Pages\EditGalleryItem::route('/{record}/edit'),
        ];
    }
}
