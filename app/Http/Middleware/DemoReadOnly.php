<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * NEW FILE
 *
 * Katmnaa3 ay modification f mode demo, bach visitor ma ysd9ch les données.
 * Ila DEMO_MODE=false (ola ma kaynch) => ma kaydir walo.
 *
 * Chnou kaybloqui:
 *  1) Ay requête mashi GET/HEAD/OPTIONS (POST = add / edit / change password...)
 *     ila ma kanch POST dyal login.
 *  2) Les URLs dyal delete: had l'projet kaydir delete b GET
 *     (admin/xxx/delete/{id}), donc khassna n9bdohom b l'URL.
 *  3) Les pages register o forget-password (bach ma ykhlqoch comptes jdad).
 */
class DemoReadOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        // Mode demo machi mfa3al => nkamlo 3adi
        if (!config('demo.enabled')) {
            return $next($request);
        }

        $isReadMethod = in_array($request->method(), ['GET', 'HEAD', 'OPTIONS']);

        // POST /login khass ykoun m3ammr (sinon ma ymkench ydkhol l'admin l7a9i9i)
        $isLoginPost = $request->isMethod('post') && $request->is('login');

        // GET .../delete/5  (soft delete f had l'projet)
        $isDeleteUrl = $request->is('*/delete/*');

        // Pages li ma khasshomch ykhdmo f demo
        $isBlockedPage = $request->is('register', 'forget-password');

        if ($isBlockedPage) {
            return redirect('/')->with('demo_blocked', 'Not available in demo mode.');
        }

        if ((!$isReadMethod && !$isLoginPost) || $isDeleteUrl) {
            // back() => i3awd l nafs la page, o kayban message f banner
            return redirect()->back()->with(
                'demo_blocked',
                'Demo mode: this action is disabled (read-only).'
            );
        }

        return $next($request);
    }
}
