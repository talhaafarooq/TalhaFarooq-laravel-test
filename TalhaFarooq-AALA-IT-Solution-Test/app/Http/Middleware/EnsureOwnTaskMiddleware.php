<?php

namespace App\Http\Middleware;

use App\Models\Task;
use App\Traits\ResponseTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureOwnTaskMiddleware
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $task = Task::findOrFail($request->route('id'));

        if ($task->user_id !== Auth::user()->id) {
            return $this->sendError([],"Unauthorized", 403);
        }
    
        return $next($request);
    }
}
