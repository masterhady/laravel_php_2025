<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; // Import the Gate facade
use App\Models\User; // Import the User model
use App\Models\Department; // Import the Department model
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // define the Gates 
        Gate::define('manage-department', function(User $user, Department $department) {
            // Allow access if the user is an admin or the owner of the department
            $user = auth()->user()->id; // defualt user id
            return $user === $department->user_id;
        });


        Gate::define('delete-department', function(User $user, Department $department) {
        
            return $user->role == "admin"  || auth()->user()->id === $department->user_id;
        });
    }
}



// function test($x = 1){
//     return $x +1;
// }

// test()