<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 * NEW FILE
 * Login sari3 b click: /demo/login/admin | teacher | student | parent
 */
class DemoController extends Controller
{
    public function login(Request $request, string $role)
    {
        // Ila demo mashi mfa3al => 404 (route kat7ayed bhal ila ma kaynach)
        abort_unless(config('demo.enabled'), 404);

        // Role khassou ykoun f config/demo.php, sinon 404
        $account = config("demo.accounts.{$role}");
        abort_if(empty($account), 404);

        // Kan9elbo 3la compte demo b l'email (machi b password)
        $user = User::where('email', $account['email'])
                    ->where('is_delete', 0)
                    ->first();

        if (!$user) {
            return redirect('/')->withErrors([
                'email' => 'Demo is temporarily unavailable. Please try again later.',
            ]);
        }

        // Auth::login kaydkhlk bla password (visitor ma kayshouf hta password)
        Auth::login($user);
        $request->session()->regenerate();

        // Redirect 7asab role (nafs logique dyal AuthController::AuthLogin)
        return redirect(match ((int) $user->user_type) {
            1 => 'admin/dashboard',
            2 => 'teacher/dashboard',
            3 => 'student/dashboard',
            4 => 'parent/dashboard',
            default => '/',
        });
    }

}
