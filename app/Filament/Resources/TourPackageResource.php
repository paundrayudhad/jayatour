<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TourPackageResource\Pages;
use App\Models\TourPackage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TourPackageResource extends Resource
{
    protected static ?string $model = TourPackage::class;

    protected static ?string $navigationGroup = 'Produk & Paket';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Detail Paket')
                ->schema([
                    Forms\Components\Select::make('destination_category_id')
                        ->label('Kategori Destinasi')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->required(),
                    Forms\Components\TextInput::make('title')
                        ->label('Judul Paket')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true),
                    Forms\Components\TextInput::make('hero_image')
                        ->label('URL Hero Image')
                        ->url()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('location')
                        ->label('Lokasi')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('duration')
                        ->label('Durasi')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('price_label')
                        ->label('Label Harga')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('difficulty')
                        ->label('Tingkat Aktivitas')
                        ->maxLength(255),
                    Forms\Components\Textarea::make('excerpt')
                        ->label('Ringkasan')
                        ->rows(3)
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('itinerary')
                        ->label('Itinerary (pisahkan tiap baris)')
                        ->rows(6)
                        ->columnSpanFull(),
                    Forms\Components\TagsInput::make('highlights')
                        ->label('Highlight Paket')
                        ->placeholder('Tambahkan highlight')
                        ->columnSpanFull(),
                    Forms\Components\Toggle::make('is_featured')
                        ->label('Tampilkan sebagai unggulan'),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_label')
                    ->label('Harga')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i'),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('destination_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name'),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Unggulan'),
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
            'index' => Pages\ListTourPackages::route('/'),
            'create' => Pages\CreateTourPackage::route('/create'),
            'edit' => Pages\EditTourPackage::route('/{record}/edit'),
        ];
    }
}
