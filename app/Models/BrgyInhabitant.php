<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrgyInhabitant extends Model
{
    use HasFactory;

    protected $table = 'brgy_inhabitants';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = true;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'positioninFamily',
        'birthdate',
        'sex',
        'age',
        'educAttainment',
        'civilstatus',
        'occupation',
        'ofw',
        'purok',
        'pwd',
        'placeofbirth',
        'citizenship',
        'email',
        'user_id',
        'registeredVoters',
        'livestock',
        'extensionName',
        'IPmember',
        'family_code',
        'monthlyincome',
        'religion',
        'employment',
        'other_employment',
        'typeOfDwelling',
        'watersource',
        'other_watersource',
        'toiletFacility',
        'other_toiletFacility',
        '4ps',
        'is_approved',
        'is_active',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function families()
    {
        return $this->belongsToMany(FamilyProfile::class, 'family_member', 'inhabitant_id', 'family_id');
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

    public function familyMembers()
    {
        return $this->hasMany(self::class, 'family_code', 'family_code')
            ->where('positioninFamily', '!=', 'Head of the family');
    }
}
