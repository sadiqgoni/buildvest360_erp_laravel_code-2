<?php

namespace App\Filament\Resources\LegalDocuments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LegalDocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('project_id')
                    ->required()
                    ->numeric(),
                TextInput::make('document_type')
                    ->required(),
                TextInput::make('document_title')
                    ->required(),
                Textarea::make('document_body')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('legal_status')
                    ->required()
                    ->default('Draft'),
                TextInput::make('legal_officer')
                    ->default(null),
                Toggle::make('admin_approved')
                    ->required(),
                Toggle::make('client_signed')
                    ->required(),
                Textarea::make('legal_remarks')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
