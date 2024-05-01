<?php

namespace App\Providers;

use Filament\Tables;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Tables\Actions\ActionGroup::configureUsing(function (Tables\Actions\ActionGroup $ActionGroup): void {
            $ActionGroup
                ->icon('heroicon-o-rectangle-stack')
                ->label('Actions')
                ->button()
                ->extraAttributes([
                    'class' => 'opacity-70',
                ]);
        });

    }
}
