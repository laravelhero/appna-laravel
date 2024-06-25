<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use PhpParser\Node\Stmt\Label;
use Filament\Actions\ActionGroup;
use Filament\Actions\Action;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $label = 'Member Manager';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Member Registrations')
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
                        TextInput::make('phone')->required()->tel()->mask('999-999-9999')->placeholder('xxx-xxx-xxxx'),
                        TextInput::make('home_phone')->tel()->mask('999-999-9999')->placeholder('xxx-xxx-xxxx'),
                        TextInput::make('office_phone')->tel()->mask('999-999-9999')->placeholder('xxx-xxx-xxxx'),
                        TextInput::make('address')->required(),
                        TextInput::make('other_address'),
                        TextInput::make('city')->required(),
                        TextInput::make('state')->required()->default('Texas')->disabled(),
                        TextInput::make('zip_code')->required(),
                        Select::make('country')
                            ->options([
                                'United States' => 'United States',
                            ])->default('United States'),
                        Select::make('medical')
                            ->options([
                                'Sindh Medical College' => 'Sindh Medical College',
                                'Aga Khan Medical College' => 'Aga Khan Medical College',
                                'Dow Medical College' => 'Dow Medical College',
                                'Baqai Medical College' => 'Baqai Medical College',
                                'Karachi Medical and Dental College' => 'Karachi Medical and Dental College',
                                'Ziauddin Medical College' => 'Ziauddin Medical College',
                                'Jamshoro Medical College' => 'Jamshoro Medical College',
                                'King Edward Medical College' => 'King Edward Medical College',
                                'Allama Iqbal Medical College' => 'Allama Iqbal Medical College',
                                'Fatima Jinnah Medical College' => 'Fatima Jinnah Medical College',
                                'Rawalpindi Medical College' => 'Rawalpindi Medical College',
                                'Nishtar Medical College' => 'Nishtar Medical College',
                                'Ayub Medical College' => 'Ayub Medical College',
                                'Bolan Medical College', 'Bolan Medical College',
                                'Others' => 'Others',
                            ])->required(),
                        TextInput::make('graduation_year')->required(),
                        TextInput::make('member_fee')->label('Lifetime Member Fee')->integer()->prefix('$')->default('100')->disabled(),
                        TextInput::make('password')->minLength(8)->password()->revealable(),
                        SpatieMediaLibraryFileUpload::make('profile_photo')->collection('profile'),
                        SpatieMediaLibraryFileUpload::make('license_photo')->collection('license')
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('member_id')->default((fn (User $record): string => $record->id)),
                SpatieMediaLibraryImageColumn::make('profile_photo')->collection('profile')->circular()->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('name')->searchable()->prefix('Dr '),
                TextColumn::make('email'),
                TextColumn::make('phone'),
                TextColumn::make('home_phone')->toggleable(isToggledHiddenByDefault: True),
                TextColumn::make('office_phone')->toggleable(isToggledHiddenByDefault: True),
                TextColumn::make('address')->toggleable(isToggledHiddenByDefault: True),
                TextColumn::make('other_address')->toggleable(isToggledHiddenByDefault: True),
                TextColumn::make('city')->toggleable(isToggledHiddenByDefault: True),
                TextColumn::make('state')->toggleable(isToggledHiddenByDefault: True),
                TextColumn::make('zip_code')->label('Zip')->toggleable(isToggledHiddenByDefault: True),
                TextColumn::make('country')->toggleable(isToggledHiddenByDefault: True),
                TextColumn::make('medical')->toggleable(isToggledHiddenByDefault: True),
                TextColumn::make('graduation_year')->label('Passing Year')->toggleable(isToggledHiddenByDefault: True),
                TextColumn::make('member_fee')->label('Fees')->money('USD'),
                TextColumn::make('created_at')->since()
            ])
            ->filters([
                //
            ])

            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                ExportBulkAction::make()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
