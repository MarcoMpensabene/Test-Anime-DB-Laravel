<?php

namespace App\Console\Commands;

use App\Models\Anime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use JsonMachine\Exception\JsonMachineException;





class ImportAnimeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-anime-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $jsonFile = storage_path('data/anime-offline-database.json');

        if (!file_exists($jsonFile)) {
            $this->error("Il file JSON non esiste nel percorso specificato: $jsonFile");
            return;
        }

        $jsonContent = file_get_contents($jsonFile);
        $data = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->error("Errore nel parsing del JSON: " . json_last_error_msg());
            return;
        }

        if (!isset($data['data']) || !is_array($data['data'])) {
            $this->error("La struttura del JSON non è come prevista. Manca la chiave 'data' o non è un array.");
            return;
        }

        $count = 0;
        DB::beginTransaction();

        try {
            foreach ($data['data'] as $animeData) {
                if (!is_array($animeData)) {
                    $this->warn("Trovato un elemento non valido, lo salto.");
                    continue;
                }

                Anime::create([
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
                ]);

                $count++;
                if ($count % 1000 == 0) {
                    $this->info("Importati $count anime...");
                    DB::commit();
                    DB::beginTransaction();
                }
            }

            DB::commit();
            $this->info("Importazione completata. Totale anime importati: $count");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Errore durante l'importazione: " . $e->getMessage());
        }
    }
}
