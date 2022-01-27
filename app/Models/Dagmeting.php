<?php           # app\Dagmeting.php 
 
namespace App\Models; 
 
use Illuminate\Database\Eloquent\Model; 
 
class Dagmeting extends Model 
{ 
    protected $table = 'dagmeting';    // koppelt aan tabel dagmeting 
    public $timestamps = false;        // tabel bevat geen timestamps 
} 