<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GithubController extends Controller
{
    public function webhook()
    {
        try {
            $xEvent = request()->header('X-GitHub-Event');
            $payload = json_decode(request()->getContent());
        } catch (Exception $e) {

            Log::info('Error Handling Webhook content');
            return;
        }

        # Check if it's a push event, just in case we register for all events.
        if ($xEvent != 'push') {
            Log::info('Ignoring X-GitHub-Event' . $xEvent);
            return response()->json(['message' => 'ignored non push event'], 200);
        }

        # Check if it's a push to the master branch.
        if ($payload->ref != 'refs/heads/master') {
            Log::info('Ignoring push on branch' . $payload->ref);
            return response()->json(['message' => 'ignored push to branch :' . $payload->ref], 200);

        }

        Log::info('Github Webhook Push Event fired');
        Log::info('Deploying new code because of a commit push by ' . $payload->head_commit->author->name);
        Log::info('Deploying commit ID : ' . $payload->after);


        Log::info('Performing git pull');
        Log::info(/*shell_exec*/(sprintf('cd %s && /usr/bin/git pull 2>&1', base_path())));

        return response()->json(['message' => 'processing push event deploying updates, thanks'], 200);


    }

}
