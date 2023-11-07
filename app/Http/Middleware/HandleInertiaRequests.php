<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'tailwind';
    protected $appView = 'app';

    /**
     * The set of routes that should be rendered with the Tailwind template
     */
    private $tailwindRoutes = [
        'welcome',
        'dashboard',
        'profile.edit',
        'profile.update',
        'profile.destroy',

        // Auth routes
        'register',
        'login',
        'password.request',
        'password.email',
        'password.reset',
        'verification.notice',
        'verification.verify',
        'verification.send',
        'password.confirm',
    ];

    public function rootView(Request $request)
    {
        return in_array($request->route()->getName(), $this->tailwindRoutes)
            ? $this->rootView
            : $this->appView;
    }

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            
            'csrf_token' => csrf_token(),

            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
        ];
    }
}
