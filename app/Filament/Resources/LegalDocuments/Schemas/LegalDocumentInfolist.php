<?php

namespace App\Filament\Resources\LegalDocuments\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LegalDocumentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('project_id')
                    ->numeric(),
                TextEntry::make('document_type'),
                TextEntry::make('document_title'),
                TextEntry::make('document_body')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('legal_status'),
                TextEntry::make('legal_officer')
                    ->placeholder('-'),
                IconEntry::make('admin_approved')
                    ->boolean(),
                IconEntry::make('client_signed')
                    ->boolean(),
                TextEntry::make('legal_remarks')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
