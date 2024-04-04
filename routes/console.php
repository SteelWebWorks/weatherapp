<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('weather:cron')
         ->hourly();
