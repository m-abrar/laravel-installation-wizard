<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
    
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class InstallController extends Controller
{

    public function welcome()
    {
        return view('install.welcome');
    }


    public function requirements()
    {
        $requirements = [
            'PHP >= 8.1' => version_compare(PHP_VERSION, '8.1.0', '>='),
            'BCMath Extension' => extension_loaded('bcmath'),
            'Ctype Extension' => extension_loaded('ctype'),
            'Fileinfo Extension' => extension_loaded('fileinfo'),
            'JSON Extension' => extension_loaded('json'),
            'Mbstring Extension' => extension_loaded('mbstring'),
            'OpenSSL Extension' => extension_loaded('openssl'),
            'PDO Extension' => extension_loaded('pdo'),
            'Tokenizer Extension' => extension_loaded('tokenizer'),
            'XML Extension' => extension_loaded('xml'),
            'Writable storage/' => is_writable(storage_path()),
            'Writable bootstrap/cache/' => is_writable(base_path('bootstrap/cache')),
        ];

        $allPassed = !in_array(false, $requirements);

        return view('install.requirements', compact('requirements', 'allPassed'));
    }

    public function database()
    {
        return view('install.database');
    }

    public function startPackages()
    {
        return view('install.start-packages');
    }
    
    public function installPackages()
    {
        $projectRoot = base_path(); // Laravel root
        $command = 'cd ' . escapeshellarg($projectRoot) . ' && composer install --no-interaction --prefer-dist 2>&1';
    
        $output = [];
        $statusCode = null;
        exec($command, $output, $statusCode);
    
        $error = false;
        $message = '';
        $details = '';
    
        if ($statusCode !== 0) {
            $error = true;
            $message = 'Something went wrong while installing packages.';
            $details = "<pre>" . htmlspecialchars(implode("\n", $output)) . "</pre>";
        } else {
            $message = 'Packages installed successfully!';
            $details = "<pre>" . htmlspecialchars(implode("\n", $output)) . "</pre>";
        }
    
        return view('install.packages', compact('message', 'error', 'details'));
    }
    

    public function saveDatabase(Request $request)
    {
        // Step 1: Validate input
        $request->validate([
            'db_host' => 'required',
            'db_port' => 'required|numeric',
            'db_name' => 'required',
            'db_user' => 'required',
            'db_password' => 'nullable',
        ]);
    
        $dbConfig = [
            'driver' => 'mysql',
            'host' => $request->db_host,
            'port' => $request->db_port,
            'database' => $request->db_name,
            'username' => $request->db_user,
            'password' => $request->db_password,
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ];
    
        // Step 2: Test DB connection 
        try {
            Config::set('database.connections.temp_install', $dbConfig);
            DB::connection('temp_install')->getPdo();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([
                'db_error' => 'Could not connect to the database. Please check credentials.',
            ]);
        }
    
        // Step 3: Save to .env
        $envPath = base_path('.env');
        $envContent = File::get($envPath);
    
        $replacements = [
            'DB_HOST' => $request->db_host,
            'DB_PORT' => $request->db_port,
            'DB_DATABASE' => $request->db_name,
            'DB_USERNAME' => $request->db_user,
            'DB_PASSWORD' => $request->db_password,
        ];
    
        foreach ($replacements as $key => $value) {
            $value = '"' . addslashes($value) . '"'; // Add quotes for safety
            if (preg_match("/^{$key}=.*/m", $envContent)) {
                $envContent = preg_replace("/^{$key}=.*/m", "{$key}={$value}", $envContent);
            } else {
                $envContent .= "\n{$key}={$value}";
            }
        }
    
        File::put($envPath, $envContent);

        
        // Step 4: Clear config cache and reload
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        DB::purge(); // Optional extra to force reconnection
                
        // Step 5: Redirect to next step
        return redirect()->route('install.packages.start');
    }
    
    public function migration()
    {
        // Run the migrations with --force to avoid confirmation prompts
        Artisan::call('migrate', ['--force' => true]);
    
        // Capture the output for display
        $output = Artisan::output();
    
        // Create a file to mark the app as installed
        File::put(storage_path('installed'), now());
    
        // Return the view with the output
        return view('install.migration', [
            'message' => 'Migrations completed successfully!',
            'details' => "<pre>" . htmlspecialchars($output) . "</pre>",
            'error' => false,
        ]);
    }

    public function admin()
    {
        return view('install.admin');
    }

    
    public function createAdmin(Request $request)
    {
        // Step 1: Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Step 2: Check if user with ID 1 exists
        $admin = User::find(1);

        if ($admin) {
            // Update existing admin
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => true,
            ]);
        } else {
            // Create new admin
            $admin = User::create([
                'id' => 1, // Force ID = 1
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => true,
            ]);
        }

        // Step 3: Log in the admin
        Auth::login($admin);

        // Step 4: Redirect to final step
        return redirect()->route('install.final');
    }

    
    public function final()
    {
        return response()->view('install.final');
    }
    

}
