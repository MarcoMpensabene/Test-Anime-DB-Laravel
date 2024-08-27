<?php

namespace App\Console\Commands;

use App\Models\Anime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use JsonMachine\Items;
use JsonMachine\JsonDecoder\ExtJsonDecoder;

class ImportAnimeData extends Command
{
    protected $signature = 'app:import-anime-data';
    protected $description = 'Import anime data from JSON file';

    public function handle()
    {
        $jsonFile = storage_path('data/anime-offline-database.json');

        if (!file_exists($jsonFile)) {
            $this->error("JSON file does not exist at the specified path: $jsonFile");
            return;
        }

        $items = Items::fromFile($jsonFile, ['pointer' => '/data', 'decoder' => new ExtJsonDecoder(true)]);

        $count = 0;
        $batchSize = 1000;
        $batch = [];

        foreach ($items as $animeData) {
            $batch[] = $this->prepareAnimeData($animeData);
            $count++;

            if (count($batch) >= $batchSize) {
                $this->insertBatch($batch);
                $batch = [];
                $this->info("Imported $count anime...");
            }
        }

        if (!empty($batch)) {
            $this->insertBatch($batch);
        }

        $this->info("Import completed. Total anime imported: $count");
    }

    private function prepareAnimeData($animeData)
    {
        return [
            'title' => $animeData['title'] ?? '',
            'sources' => json_encode($animeData['sources'] ?? []),
            'type' => $animeData['type'] ?? '',
            'episodes' => $animeData['episodes'] ?? 0,
            'status' => $animeData['status'] ?? '',
            'anime_season' => json_encode($animeData['animeSeason'] ?? []),
            'picture' => $animeData['picture'] ?? '',
            'thumbnail' => $animeData['thumbnail'] ?? '',
            'synonyms' => json_encode($animeData['synonyms'] ?? []),
            'related_anime' => json_encode($animeData['relatedAnime'] ?? []),
            'tags' => json_encode($animeData['tags'] ?? []),
        ];
    }

    private function insertBatch($batch)
    {
        DB::table('animes')->insert($batch);
    }
}
