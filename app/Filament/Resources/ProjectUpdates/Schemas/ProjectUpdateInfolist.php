<?php

namespace App\Filament\Resources\ProjectUpdates\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProjectUpdateInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('project.project_id')
                    ->label('Project Ref'),
                TextEntry::make('project.client.full_name')
                    ->label('Client'),
                TextEntry::make('title'),
                TextEntry::make('stage')
                    ->placeholder('-'),
                TextEntry::make('progress_percent')
                    ->suffix('%'),
                TextEntry::make('update_date')
                    ->date(),
                TextEntry::make('summary')
                    ->columnSpanFull(),
                TextEntry::make('next_steps')
                    ->placeholder('-')
                    ->columnSpanFull(),
                IconEntry::make('client_visible')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
