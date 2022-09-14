<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\History;
use App\Models\CurrentData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class LoadData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Data Loading';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $endpoint = 'intraday';
        $tickers = config('app.tickers');

        $apikey = config('services.marketstack.key');
        foreach ($tickers as $ticker) {
            $url = 'http://api.marketstack.com/v1/' . $endpoint;
            $query = 'access_key=' . $apikey . '&symbols=' . $ticker . '&interval=15min';
            $response  = Http::get($url, $query);
            $result = json_decode($response->body());
            $data = $result->data[0];
            $cdate = Carbon::parse($data->date)->toDateTime();
            CurrentData::updateOrCreate([
                'ticker' => $ticker,
            ], [
                'open' => $data->open,
                'close' => $data->close,
                'high' => $data->high,
                'low' => $data->low,
                'last' => $data->last,
                'date' => $cdate,
                'volume' => $data->volume,
            ]);

            foreach ($result->data as $row) {
                $date = Carbon::parse($row->date)->toDateTime();
                History::updateOrCreate([
                    'ticker' => $ticker,
                    'date' => $date,
                ], [
                    'open' => $row->open,
                    'close' => $row->close,
                    'high' => $row->high,
                    'low' => $row->low,
                    'last' => $row->last,
                    'date' => $date,
                    'volume' => $row->volume,
                ]);
            }
        }
        return 0;
    }
}
