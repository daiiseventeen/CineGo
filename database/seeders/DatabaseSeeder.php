<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie;
use App\Models\Studio;
use App\Models\Seat;
use App\Models\Schedule;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ============================================
        // CREATE USERS (ADMIN & TEST USER)
        // ============================================
        
        // Create Admin User
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Test User
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'user',
        ]);

        // ============================================
        // CREATE MOVIES
        // ============================================
        
        $movies = [
            [
                'title' => 'The Matrix Reloaded',
                'genre' => 'Sci-Fi',
                'duration' => 138,
                'age_rating' => 'PG-13',
                'description' => 'The sequels to the original Matrix movie featuring more advanced special effects.',
                'status' => 'now_showing',
            ],
            [
                'title' => 'Inception',
                'genre' => 'Sci-Fi/Thriller',
                'duration' => 148,
                'age_rating' => 'PG-13',
                'description' => 'A thief who steals corporate secrets through dream-sharing technology.',
                'status' => 'now_showing',
            ],
            [
                'title' => 'Avatar: The Way of Water',
                'genre' => 'Sci-Fi/Adventure',
                'duration' => 191,
                'age_rating' => 'PG-13',
                'description' => 'The avatar team returns to Pandora to fight new aliens.',
                'status' => 'now_showing',
            ],
            [
                'title' => 'Avengers: Endgame',
                'genre' => 'Action/Adventure',
                'duration' => 181,
                'age_rating' => 'PG-13',
                'description' => 'The Avengers take a final stand against Thanos.',
                'status' => 'now_showing',
            ],
        ];

        foreach ($movies as $movie) {
            Movie::firstOrCreate(
                ['title' => $movie['title']],
                $movie
            );
        }

        // ============================================
        // CREATE STUDIOS & SEATS
        // ============================================
        
        $studios = [
            [
                'name' => 'Studio 1 - Regular',
                'total_seat' => 150,
            ],
            [
                'name' => 'Studio 2 - Premium',
                'total_seat' => 100,
            ],
            [
                'name' => 'Studio 3 - IMAX',
                'total_seat' => 200,
            ],
        ];

        foreach ($studios as $studio) {
            $studioModel = Studio::firstOrCreate(
                ['name' => $studio['name']],
                $studio
            );

            // Create seats for each studio
            $this->createSeats($studioModel);
        }

        // ============================================
        // CREATE SCHEDULES
        // ============================================
        
        $moviesList = Movie::all();
        $studiosList = Studio::all();

        foreach ($moviesList as $movie) {
            foreach ($studiosList as $studio) {
                Schedule::firstOrCreate(
                    [
                        'movie_id' => $movie->id,
                        'studio_id' => $studio->id,
                        'show_date' => now()->addDays(rand(1, 7))->toDateString(),
                        'show_time' => collect(['10:00', '13:30', '16:00', '19:00', '21:30'])->random(),
                    ],
                    [
                        'price' => rand(50000, 150000),
                    ]
                );
            }
        }
    }

    /**
     * Create seats for a studio
     */
    private function createSeats($studio)
    {
        $rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
        $totalRows = 10;
        $seatsPerRow = ceil($studio->total_seat / $totalRows);

        for ($r = 0; $r < $totalRows; $r++) {
            for ($c = 1; $c <= $seatsPerRow; $c++) {
                $row = $rows[$r];
                $seatCode = "{$row}{$c}";
                
                // Determine seat type (every 3rd row starting from F is VIP)
                $type = ($r >= 5) ? 'vip' : 'regular';

                Seat::firstOrCreate(
                    [
                        'studio_id' => $studio->id,
                        'seat_code' => $seatCode,
                    ],
                    [
                        'type' => $type,
                    ]
                );
            }
        }
    }
}
