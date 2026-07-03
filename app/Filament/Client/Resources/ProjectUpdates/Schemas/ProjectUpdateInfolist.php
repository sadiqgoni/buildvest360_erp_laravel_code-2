<?php

namespace App\Filament\Client\Resources\ProjectUpdates\Schemas;

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
            ]);
    }
}
