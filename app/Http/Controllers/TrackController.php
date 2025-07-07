<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Track;
use App\Models\Comment;
use App\Models\Driver;
use Illuminate\Support\Facades\DB;

class TrackController extends Controller
{
    function index()
    {
        return view('tracks.tracks');
    }

    function longbeach()
    {
        $track = Track::take(1)->first();
        $comments = $track->comments()->latest()->paginate(5);
        $data = $this->scoreSorting('longbeach', $track);
        return view('tracks.longbeach', compact('track', 'comments') + $data);
    }

    function atlanta()
    {
        $track = Track::skip(1)->take(1)->first();
        $comments = $track->comments()->latest()->paginate(5);
        $data = $this->scoreSorting('atlanta', $track);
        return view('tracks.atlanta', compact('track', 'comments') + $data);
    }

    function orlando()
    {
        $track = Track::skip(2)->take(1)->first();
        $comments = $track->comments()->latest()->paginate(5);
        $data = $this->scoreSorting('orlando', $track);
        return view('tracks.orlando', compact('track', 'comments') + $data);
    }

    function englishtown()
    {
        $track = Track::skip(3)->take(1)->first();
        $comments = $track->comments()->latest()->paginate(5);
        $data = $this->scoreSorting('englishtown', $track);
        return view('tracks.englishtown', compact('track', 'comments') + $data);
    }

    function stlouis()
    {
        $track = Track::skip(4)->take(1)->first();
        $comments = $track->comments()->latest()->paginate(5);
        $data = $this->scoreSorting('stlouis', $track);
        return view('tracks.stlouis', compact('track', 'comments') + $data);
    }

    function seattle()
    {
        $track = Track::skip(5)->take(1)->first();
        $comments = $track->comments()->latest()->paginate(5);
        $data = $this->scoreSorting('seattle', $track);
        return view('tracks.seattle', compact('track', 'comments') + $data);
    }
    function grantsville()
    {
        $track = Track::skip(6)->take(1)->first();
        $comments = $track->comments()->latest()->paginate(5);
        $data = $this->scoreSorting('grantsville', $track);
        return view('tracks.grantsville', compact('track', 'comments') + $data);
    }

    function irwindale()
    {
        $track = Track::skip(7)->take(1)->first();
        $comments = $track->comments()->latest()->paginate(5);
        $data = $this->scoreSorting('irwindale', $track);
        return view('tracks.irwindale', compact('track', 'comments') + $data);
    }

    // Function to get ordinal suffix (1st, 2nd, 3rd, etc.)
    function ordinal($number)
    {
        // Numbers 1, 2, 3 have specific suffixes, all others use 'th'
        if ($number % 10 == 1 && $number % 100 != 11) {
            return $number . 'st';
        }
        elseif ($number % 10 == 2 && $number % 100 != 12) {
            return $number . 'nd';
        }
        elseif ($number % 10 == 3 && $number % 100 != 13) {
            return $number . 'rd';
        } 
        else {
            return $number . 'th';
        }
    }

    // Function to calculate the scores from each event and display the position they came relatively
    function scoreSorting($tracks, $track)
    {
        $scores = $track->$tracks;

        $positions = [        // Sort scores for each year
            '2022' => $scores->sortByDesc('2022')->values(),
            '2023' => $scores->sortByDesc('2023')->values(),
            '2024' => $scores->sortByDesc('2024')->values(),
        ];
    
        // Merge score ID and positions together
        $ranking = [];
        foreach ($positions as $year => $sortedScores) {
            foreach ($sortedScores as $index => $score) {
                $ranking[$score->id][$year] = $this->ordinal($index + 1);
            }
        }
        return [
            'track' => $track,
            'scores' => $scores,
            'ranking' => $ranking
        ];
    }

    public function favoriteTrack(Request $request, $trackId)
    {
        $user = auth()->user();
        $user->favorite_track_id = $trackId;
        $user->save();
        return redirect()->back()->with('track_action', 'updated');
    }

    public function storeComment(Request $request, $trackId)
    {
        $request->validate([
            'content' => 'required|max:500',
        ]);

        $track = Track::findOrFail($trackId);
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = Auth::id(); // Logged in user
        $comment->track_id = $track->id;
        $comment->save();

        $trackRoutes = [  // Map track titles to route names
            'STREETS OF LONG BEACH' => 'tracks.longbeach',
            'ROAD TO THE CHAMPIONSHIP' => 'tracks.atlanta',
            'SCORCHED' => 'tracks.orlando',
            'THE GAUNTLET' => 'tracks.englishtown',
            'CROSSROADS' => 'tracks.stlouis',
            'THROWDOWN' => 'tracks.seattle',
            'ELEVATED' => 'tracks.grantsville',
            'TITLE FIGHT' => 'tracks.irwindale',

        ];

        $routeName = $trackRoutes[$track->title] ?? 'drivers.home'; // If title doesn't match

        return redirect()->route($routeName);
    }

    public function predictions()
    {
        $tracks = [ // Map track names to table names
            'long_beach' => '_long__beach',
            'atlanta' => 'atlanta',
            'orlando' => 'orlando',
            'englishtown' => 'englishtown',
            'st_louis' => 'st_louis',
            'seattle' => 'seattle',
            'grantsville' => 'grantsville',
            'irwindale' => 'irwindale',
        ];

        $predictions = [];

        foreach ($tracks as $trackName => $table) {

            $totals = DB::table($table)
                ->select('driver_id', DB::raw('SUM(`2022` + `2023` + `2024`) as total_score')) // 'raw' allows for an SQL query to sum the scores per driver
                ->groupBy('driver_id')
                ->orderByDesc('total_score')
                ->take(3) // Get top 3 drivers from the top
                ->get();
            $drivers = Driver::whereIn('id', $totals->pluck('driver_id'))->get()->keyBy('id'); // 'whereIn' allows for me to select the top 3 drivers based on the driver_id from my results

            $totalAveragePoints = $totals->sum(function ($row) { // Calculate average points to display in predictions
                return $row->total_score / 3;
            });

            $topDrivers = [];

            foreach ($totals as $row) {
                $driver = $drivers[$row->driver_id] ?? null;
                $average = $row->total_score / 3;
                $chance = $totalAveragePoints > 0 ? round(($average / $totalAveragePoints) * 100, 2) : 0; // Calculate the percentage of winning

                $topDrivers[] = [
                    'name' => $driver ? $driver->name : 'Unknown', // Store all points information in array
                    'average_points' => round($average, 2),
                    'chance_to_win' => $chance,
                ];
            }

            $predictions[] = [
                'track' => ucwords(str_replace('_', ' ', $trackName)), // Merge track name and top drivers array in a new array
                'top_drivers' => $topDrivers,
            ];
        }

        return view('tracks.predictions', compact('predictions'));
    }
}