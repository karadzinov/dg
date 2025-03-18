<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateCrudCommand extends Command
{
    protected $signature = 'generate:crud {name}';
    protected $description = 'Generate CRUD for the specified resource (e.g., Post, Blog)';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = ucfirst($this->argument('name'));

        // Generate Model
        $this->generateModel($name);

        // Generate Controller
        $this->generateController($name);

        // Generate Request
        $this->generateRequest($name);

        // Generate Migration
        $this->generateMigration($name);

        // Generate Resource
        $this->generateResource($name);

        // Generate Service
        $this->generateService($name);

        // Generate Routes
        $this->generateRoutes($name);

        $this->info("$name CRUD generated successfully!");
    }

    private function generateModel($name)
    {
        $modelPath = app_path("Models/{$name}.php");
        $modelContent = "<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class $name extends Model
{
    use HasFactory;

    protected \$fillable = ['title', 'content', 'category_id', 'user_id'];

    public function category()
    {
        return \$this->belongsTo(Category::class);
    }

    public function user()
    {
        return \$this->belongsTo(User::class);
    }
}
";

        File::put($modelPath, $modelContent);
        $this->info("$name model generated successfully!");
    }

    private function generateController($name)
    {
        $controllerPath = app_path("Http/Controllers/Api/{$name}Controller.php");
        $controllerContent = "<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store{$name}Request;
use App\Http\Requests\Update{$name}Request;
use App\Services\\{$name}Service;
use Illuminate\Http\Request;

class {$name}Controller extends Controller
{
    protected \${$name}Service;

    public function __construct({$name}Service \${$name}Service)
    {
        \$this->{$name}Service = \${$name}Service;
    }

    public function index()
    {
        return \$this->{$name}Service->getAll();
    }

    public function store(Store{$name}Request \$request)
    {
        return \$this->{$name}Service->create(\$request->validated());
    }

    public function show(\$id)
    {
        return \$this->{$name}Service->getById(\$id);
    }

    public function update(Update{$name}Request \$request, \$id)
    {
        return \$this->{$name}Service->update(\$id, \$request->validated());
    }

    public function destroy(\$id)
    {
        \$this->{$name}Service->delete(\$id);
        return response()->json(null, 204);
    }
}
";

        File::put($controllerPath, $controllerContent);
        $this->info("$name controller generated successfully!");
    }

    private function generateRequest($name)
    {
        $storeRequestPath = app_path("Http/Requests/Store{$name}Request.php");
        $storeRequestContent = "<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store{$name}Request extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
";

        $updateRequestPath = app_path("Http/Requests/Update{$name}Request.php");
        $updateRequestContent = "<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Update{$name}Request extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'category_id' => 'sometimes|required|exists:categories,id',
            'user_id' => 'sometimes|required|exists:users,id',
        ];
    }
}
";

        File::put($storeRequestPath, $storeRequestContent);
        File::put($updateRequestPath, $updateRequestContent);

        $this->info("$name request validation generated successfully!");
    }

    private function generateMigration($name)
    {
        $migrationPath = database_path('migrations/' . date('Y_m_d_His') . "_create_{$name}s_table.php");
        $migrationContent = "<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create{$name}sTable extends Migration
{
    public function up()
    {
        Schema::create('{$name}s', function (Blueprint \$table) {
            \$table->id();
            \$table->string('title');
            \$table->text('content');
            \$table->foreignId('category_id')->constrained();
            \$table->foreignId('user_id')->constrained();
            \$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('{$name}s');
    }
}
";

        File::put($migrationPath, $migrationContent);
        $this->info("$name migration generated successfully!");
    }

    private function generateResource($name)
    {
        $resourcePath = app_path("Http/Resources/{$name}Resource.php");
        $resourceContent = "<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class {$name}Resource extends JsonResource
{
    public function toArray(\$request)
    {
        return [
            'id' => \$this->id,
            'title' => \$this->title,
            'content' => \$this->content,
            'category_id' => \$this->category_id,
            'user_id' => \$this->user_id,
        ];
    }
}
";

        File::put($resourcePath, $resourceContent);
        $this->info("$name resource generated successfully!");
    }

    private function generateService($name)
    {
        $servicePath = app_path("Services/{$name}Service.php");
        $serviceContent = "<?php

namespace App\Services;

use App\Models\\{$name};

class {$name}Service
{
    public function getAll()
    {
        return {$name}::all();
    }

    public function create(array \$data)
    {
        return {$name}::create(\$data);
    }

    public function getById(\$id)
    {
        return {$name}::findOrFail(\$id);
    }

    public function update(\$id, array \$data)
    {
        \$resource = {$name}::findOrFail(\$id);
        \$resource->update(\$data);
        return \$resource;
    }

    public function delete(\$id)
    {
        {$name}::findOrFail(\$id)->delete();
    }
}
";

        File::put($servicePath, $serviceContent);
        $this->info("$name service generated successfully!");
    }

    private function generateRoutes($name)
    {
        $routesPath = base_path('routes/api.php');
        $routeContent = "
Route::apiResource('{$name}s', App\\Http\\Controllers\\Api\\{$name}Controller::class);
";

        File::append($routesPath, $routeContent);
        $this->info("$name routes added successfully!");
    }
}
