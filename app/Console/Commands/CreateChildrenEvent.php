<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateChildrenEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CreateChildrenEvent {subjectId} {dateOneTour} {dateTwoTour?} {address?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $dateOneTour = $this->argument('dateOneTour');
        $dateTwoTour = $this->argument('dateTwoTour');
        $address = $this->argument('address');

        $events = DB::table('event')->select('event.*')->join('subject', 'event.subject_id', '=', 'subject.id')
            ->where('subject.id', $subjectId)->get();

        foreach ($events as $event)
        {
            for ($i = 2; $i <= 4; $i++) {   // id(2) = 9class   id(3) = 10class  id(4) = 11class
                DB::table('children_event')->insert([
                    'event_id' => $event->id,
                    'date_olympiad' => ($event->status == 0 || ($event->tour == 1 && $event->status == 1)) ? $dateOneTour : $dateTwoTour,
                    'address' => $address,
                    'class_id' => $i,
                ]);
            }
        }

        $this->info("Успешно добавлены события для 9-10 классов по предмету с ID {$subjectId}.");

        return 0;
    }
}
