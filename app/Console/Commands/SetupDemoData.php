<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupDemoData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:setup {--fresh : Run fresh migration before seeding}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup complete demo data for client presentation';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('');
        $this->info('╔════════════════════════════════════════════╗');
        $this->info('║   FluttLearn Demo Data Setup              ║');
        $this->info('╚════════════════════════════════════════════╝');
        $this->info('');

        if ($this->option('fresh')) {
            if ($this->confirm('⚠️  This will DELETE ALL existing data. Continue?', false)) {
                $this->warn('Running fresh migration...');
                $this->call('migrate:fresh');
                $this->info('✅ Database reset complete');
            } else {
                $this->error('Operation cancelled');
                return 1;
            }
        }

        $this->info('');
        $this->info('Starting demo data seeding...');
        $this->newLine();

        $this->call('db:seed', ['--class' => 'Database\\Seeders\\DemoSeeder']);

        $this->newLine();
        $this->info('╔════════════════════════════════════════════╗');
        $this->info('║   Demo Setup Complete! 🎉                 ║');
        $this->info('╚════════════════════════════════════════════╝');
        $this->newLine();

        $this->table(
            ['Role', 'Email', 'Password'],
            [
                ['Admin', 'admin@gmail.com', '1234'],
                ['Instructor', 'instructor@gmail.com', '1234'],
                ['Student', 'student@gmail.com', '1234'],
            ]
        );

        $this->newLine();
        $this->info('💡 Available Coupons:');
        $this->line('   • WELCOME20 (20% off)');
        $this->line('   • SAVE50 ($50 off)');
        $this->line('   • STUDENT15 (15% off)');
        $this->newLine();

        return 0;
    }
}
