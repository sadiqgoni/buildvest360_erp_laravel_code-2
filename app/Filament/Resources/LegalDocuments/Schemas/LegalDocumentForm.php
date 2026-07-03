<?php

namespace App\Filament\Resources\LegalDocuments\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LegalDocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('project_id')
                    ->relationship('project', 'project_id')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('document_type')
                    ->required(),
                TextInput::make('document_title')
                    ->required(),
                RichEditor::make('document_body')
                    ->columnSpanFull(),
                Select::make('legal_status')
                    ->options([
                        'Draft' => 'Draft',
                        'Under Review' => 'Under Review',
                        'Approved' => 'Approved',
                        'Executed' => 'Executed',
                    ])
                    ->default('Draft')
                    ->required(),
                TextInput::make('legal_officer'),
                Toggle::make('admin_approved'),
                Toggle::make('client_signed'),
                TextInput::make('legal_remarks')
                    ->columnSpanFull(),
            ]);
    }
}
