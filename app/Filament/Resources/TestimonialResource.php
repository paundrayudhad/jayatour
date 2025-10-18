<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationGroup = 'Konten Marketing';

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Testimoni Traveler')
                ->schema([
                    Forms\Components\TextInput::make('traveler_name')
                        ->label('Nama Traveler')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('traveler_location')
                        ->label('Lokasi')
                        ->maxLength(255),
                    Forms\Components\Select::make('tour_package_id')
                        ->label('Paket Terkait')
                        ->relationship('tourPackage', 'title')
                        ->searchable(),
                    Forms\Components\DatePicker::make('traveled_at')
                        ->label('Tanggal Perjalanan'),
                    Forms\Components\Textarea::make('body')
                        ->label('Pesan Testimoni')
                        ->rows(4)
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('rating')
                        ->label('Rating')
                        ->numeric()
                        ->default(5)
                        ->minValue(1)
                        ->maxValue(5),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('traveler_name')
                    ->label('Traveler')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('traveler_location')
                    ->label('Lokasi')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('tourPackage.title')
                    ->label('Paket')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->sortable(),
                Tables\Columns\TextColumn::make('traveled_at')
                    ->label('Berangkat')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('traveled_at', 'desc')
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
