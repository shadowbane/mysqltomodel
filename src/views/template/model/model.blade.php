namespace {{config('mysql-migration.model_namespace')}}\{{$namespace}};

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
* Class {{$fileName}}.
*
* @author Adly Shadowbane <adly.shadowbane@gmail.com> via MySQL Model Migration, created at {{date("Y-m-d h:i:sa")}}
*/
class {{$fileName}} extends Model
{
    public $connection = '{{$connection}}';

@if($timestamps == false)
    public $timestamps = false;

@endif
    protected $table = '{{strtolower($fileName)}}';

    public function save(array $options = []){
        return false;
    }
    public function update(array $attributes = [], array $options = []){
        return false;
    }

    public function delete(){
        return false;
    }

    static function destroy($ids){
        return false;
    }

    public function forceDelete(){
        return false;
    }
}