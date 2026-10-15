<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * NEW FILE
 * Kaykhleq 4 comptes demo (admin, teacher, student, parent).
 * Safe tkhddmo bzzaf mrrat: kay-update l compte ila kan kayn (match b email).
 *
 * Commande:  php artisan db:seed --class=DemoSeeder
 * Condition: khass tkoun 3emmart school_com.sql qbel (fih les colonnes
 *            user_type, class_id, parent_id... li ma kaynch f migrations).
 */
class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Awel classe active (l student khass ykoun f classe)
        $class   = DB::table('class')->where('is_delete', 0)->where('status', 0)->orderBy('id')->first();
        $classId = $class->id ?? null;

        // Parent kayt3mal 3la qbel bach student ykoun marboot bih
        $parent = $this->makeUser('parent', [
            'gender'        => 'Male',
            'mobile_number' => '0600000004',
            'occupation'    => 'Engineer',
            'adresse'       => 'Ouarzazate, Morocco',
        ]);

        $this->makeUser('admin');

        $this->makeUser('teacher', [
            'gender'          => 'Female',
            'mobile_number'   => '0600000002',
            'qualification'   => 'Master in Mathematics',
            'work_experience' => '5 years',
            'date_of_joining' => '2024-09-01',
        ]);

        $this->makeUser('student', [
            'parent_id'        => $parent->id,
            'class_id'         => $classId,
            'admission_number' => 'DEMO-001',
            'roll_number'      => '1',
            'gender'           => 'Male',
            'date_of_birth'    => '2010-05-10',
            'admission_date'   => '2025-09-01',
            'mobile_number'    => '0600000003',
        ]);
    }

    /**
     * Kaykhleq ola kay-update compte demo.
     * forceFill 7it 'user_type' o 'is_delete'... machi f $fillable dyal User.
     */
    private function makeUser(string $key, array $extra = []): User
    {
        $acc  = config("demo.accounts.{$key}");
        $user = User::firstOrNew(['email' => $acc['email']]);

        $user->forceFill(array_merge([
            'name'      => $acc['name'],
            'last_name' => $acc['last_name'],
            'user_type' => $acc['user_type'],
            'status'    => 0,   // 0 = active
            'is_delete' => 0,   // 0 = machi mamsou7
            // Password 3chwa2i: compte demo ma ymknch ydkhlo b password,
            // ghir mn button "Try demo"
            'password'  => Hash::make(Str::random(40)),
        ], $extra))->save();

        return $user;
    }
}
