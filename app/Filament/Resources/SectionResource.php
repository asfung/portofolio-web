<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Section;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\SectionResource\Pages;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('thumbnail')
                    ->required()->image()->disk("public"),
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('post_as')
                    ->options([
                        'JUMBOTRON' => 'JUMBOTRON',
                        'ABOUT' => 'ABOUT'
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->searchable()
                    ->circular(),
                Tables\Columns\TextColumn::make('post_as')
                    ->searchable(),
                Tables\Columns\TextColumn::make('content')
                    ->searchable(),
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
                Tables\Actions\DeleteAction::make()->after(
                    function(Collection $records){
                                foreach($records as $key => $value){
                                    if($value->thumbnail){
                                        Storage::disk('public')->delete($value->thumbnail);
                                    }
                            }
                        }
                ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->after(
                            function(Collection $records){
                                foreach($records as $key => $value){
                                    if($value->thumbnail){
                                        Storage::disk('public')->delete($value->thumbnail);
                                    }
                            }
                        }
                        
                    ),
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
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }    
}
