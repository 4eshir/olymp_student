<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createEvent {subjectId} {countTour}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create event';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $subjectId = $this->argument('subjectId'); // Получаем аргумент subject_id

        $subject = DB::table('subject')->where('id', $subjectId)->value('name');

        $countTour = $this->argument('countTour'); // Получаем аргумент count

        if (!is_numeric($countTour) || $countTour < 0) {
            $this->error('Количество туров должно быть положительным числом.');
            return 1;
        }

        // Создаем нужное количество записей
        for ($tour = 1; $tour <= $countTour; $tour++) {
            DB::table('event')->insert([
                'subject_id' => $subjectId,
                'tour' => $tour,
                'status' => $tour == $countTour ? 1 : 0,
            ]);
        }

        $this->info("Создано {$countTour} туров для предмета {$subject} с ID {$subjectId}.");

        return 0;
    }
}
