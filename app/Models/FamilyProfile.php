<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyProfile extends Model
{
    use HasFactory;

    protected $table = 'family_profiles'; // Optional, if table name matches the pluralized model name

    protected $primaryKey = 'id'; // Optional if primary key is `id`

    public $incrementing = true; // Default behavior

    protected $keyType = 'int'; // Default behavior

    public $timestamps = true; // Default behavior

    // Define the attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'head_of_family',
        'sex',
        'age',
        'birthdate',
        'civilstatus',
        'religion',
        'educAttainment',
        'occupation',
        'monthlyincome',
        'typeOfDwelling',
        'watersource',
        'toiletFacility',
        'housing_materials',
        '4ps',
        'is_approved',
        'employment',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function headOfFamily()
    {
        return $this->belongsTo(BrgyInhabitant::class, 'head_of_family');
    }

    public function members()
    {
        return $this->belongsToMany(BrgyInhabitant::class, 'family_member', 'family_id', 'inhabitant_id');
    }

    // Local Scopes
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    // Accessors
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->middlename} {$this->lastname}";
    }

    // Mutators
    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = \Carbon\Carbon::parse($value);
    }
}
