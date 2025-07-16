<?php

namespace App\Http\RestAPI;

use App\Models\Tester;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class TesterAPI
{
    public static function getMergedTesters($sessionId, $testerId): Collection
    {
        if ($testerId == null) {
            $testerDB = Tester::select('tester_id', 'user_id')
                ->where('session_id', $sessionId)
                ->get();

            $userIds = $testerDB->pluck('user_id')->toArray();
        } else {
            $testerDB = Tester::select('tester_id', 'user_id')
                ->where('session_id', $sessionId)
                ->where('tester_id', $testerId)
                ->first();

            if (!$testerDB) {
                return collect([]);
            }

            $userIds = [$testerDB->user_id];
        }

        $response = Http::get(config('services.api.url') . "testers-merged", [
            'user_id' => $userIds
        ]);

        $collectTesterAPIWithDB = collect($response->json('data'));

        if ($testerId == null) {
            return $testerDB->map(function ($tester) use ($collectTesterAPIWithDB) {
                $apiData = $collectTesterAPIWithDB->firstWhere('user_id', $tester->user_id);
                return [
                    'tester_id' => $tester->tester_id,
                    'user_id'   => $tester->user_id,
                    'name'      => $apiData['name'] ?? null,
                    'email'     => $apiData['email'] ?? null,
                ];
            });
        }

        $apiData = $collectTesterAPIWithDB->firstWhere('user_id', $testerDB->user_id);

        return collect([[
            'tester_id' => $testerDB->tester_id,
            'user_id'   => $testerDB->user_id,
            'name'      => $apiData['name'] ?? null,
            'email'     => $apiData['email'] ?? null,
        ]]);
    }


    public static function getAllTesters(): Collection
    {
        $response = Http::get(config('services.api.url') . "testers");
        $data = $response->json('data') ?? [];

        return collect($data);
    }
}
