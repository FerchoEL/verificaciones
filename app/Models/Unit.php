<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'date',
        'user_id',
        'idsap',
        'vehicle_id',
        'component_id',
        'chassis_serial',
        'chassis_serial_origin',
        'license_plate',
        'license_plate_origin',
        'license_plate_type',
        'permission',
        'license_plate_tractor',
        'location_id',
        'entity_id',
        'sticker_serial',
        'car_brand',
        'car_model',
        'modification',
    ];
    use HasFactory;

    public function haulier()
    {
        return $this->belongsTo('App\Models\Haulier');
    }

    public function catalog_special_features()
    {
        return $this->belongsToMany('App\Models\CatalogSpecialFeature', 'special_features')->withTimestamps;
    }

    public function types()
    {
        return $this->belongsToMany('App\Models\Type', 'special_features')->withTimestamps;
    }

    public function catalogSpecialFeatureTypes()
    {
        return $this->belongsToMany('App\Models\CatalogSpecialFeatureType', 'special_features')
            ->withTimestamps();
    }

    //units
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }

    public function component()
    {
        return $this->belongsTo('App\Models\Component');
    }

    public function entity()
    {
        return $this->belongsTo('App\Models\Entity');
    }

    public function carBrand()
    {
        return $this->belongsTo('App\Models\CarBrand');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }//end units

    //relation
    public function updateUnit()
    {
        return $this->hasOne('App\Models\UpdateUnit');
    }

    public function feature()
    {
        return $this->hasOne('App\Models\Feature');
    }

    public function featureMod()
    {
        return $this->hasOne('App\Models\FeatureMod');
    }

    public function featureMotorUnit()
    {
        return $this->hasOne('App\Models\FeatureMotorUnit');
    }

    public function unitDocument()
    {
        return $this->hasOne('App\Models\UnitDocument');
    }

    public function verificationLicensePlate()
    {
        return $this->hasOne('App\Models\VerificationLicensePlate');
    }

    //funcion guardar datos
    public static function saveData($data, $component)
    {
        $msg = "Se ha registrado satisfactoriamente";
        $unit = Unit::create([
            'date' => $data["date"],
            'user_id' => $data["user_id"],
            'idsap' => $data["idsap"],
            'vehicle_id' => $data["vehicle_id"],
            'component_id' => $data["component_id"],
            'chassis_serial' => $data["chassis_serial"],
            'chassis_serial_origin' => $data["chassis_serial_origin"],
            'license_plate' => $data["license_plate"],
            'license_plate_origin' => $data["license_plate_origin"],
            'license_plate_type' => $data["license_plate_type"],
            'permission' => isset($data["permission"]) ? $data["permission"] : null,
            'license_plate_tractor' => isset($data["license_plate_tractor"]) ? $data["license_plate_tractor"] : null,
            'location_id' => $data["location_id"],
            'entity_id' => $data["entity_id"],
            'sticker_serial' => $data["sticker_serial"],
            'car_brand' => $data["car_brand"],
            'car_model' => $data["car_model"],
            'modification' => $data["modification"],
        ]);
        $unit->feature()->create([
            'axis_one' => $data["axis_one"],
            'axis_two' => $data["axis_two"],
            'axis_three' => $data["axis_three"],
            'brake' => $data["brake"],
            'suspension' => $data["suspension"],
            'camera' => $data["camera"],
            'tape' => $data["tape"],
            'height' => $data["height"],
            'width' => $data["width"],
            'length' => $data["length"],
            'weight' => $data["weight"],
        ]);
        //documentos
        $documentData = [
            'unit_photo' => $data["unit_photo"],
            'image_pol_seg' => $data["image_pol_seg"],
            'validity_pol_seg' => $data["validity_pol_seg"],
            'image_mtto' => $data["image_mtto"],
            'validity_mtto' => $data["validity_mtto"],
        ];
        if (isset($data["permission"])) {
            if ($data["license_plate_type"] == "Estatal" && $data["permission"] == "SI") {
                $extraData = [
                    'image_cer_FM' => $data["image_cer_FM"],
                    'validity_cer_FM' => $data["validity_cer_FM"],
                    'image_cer_nem' => $data["image_cer_nem"],
                    'validity_cer_nem' => $data["validity_cer_nem"],
                ];
                $documentData = array_merge($documentData, $extraData);
            }
        }
        if ($data["license_plate_type"] == "Federal") {
            $extraData = [
                'image_cer_FM' => $data["image_cer_FM"],
                'validity_cer_FM' => $data["validity_cer_FM"],
                'image_cer_nem' => $data["image_cer_nem"],
                'validity_cer_nem' => $data["validity_cer_nem"],
            ];
            $documentData = array_merge($documentData, $extraData);
        }
        $unit->unitDocument()->create($documentData);
        //componentes especiales
        if (isset($data['catalog_special_feature_id'])) {
            $special_feature_types = CatalogSpecialFeatureType::
            whereIn('catalog_special_feature_id', $data["catalog_special_feature_id"])
                ->where('type_id', $data["type_id"])
                ->get();
            foreach ($special_feature_types as $special_feature_type) {
                $unit->catalogSpecialFeatureTypes()->attach($special_feature_type);
            }
        }
        //condiciones
        if ($component->motor == 1) {
            $unit->featureMotorUnit()->create([
                'electric_motor' => $data["electric_motor"],
                'horsepower' => $data["horsepower"],
                'torque' => $data["torque"],
                'traction' => $data["traction"],
                'capacity' => $data["capacity"],
                'auxiliary' => $data["auxiliary"],
                'regulator' => $data["regulator"],
            ]);
            $msg .= " con motor";
        }

        if ($data["modification"] == 1) {
            $unit->featureMod()->create([
                'mod_type' => $data["mod_type"],
                'mod_motor' => $data["mod_motor"],
                'mod_brake' => $data["mod_brake"],
                'mod_suspension' => $data["mod_suspension"],
                'mod_axis' => $data["mod_axis"],
            ]);
            $msg .= " con modificacion";
        }
        return $msg;


    }
    public static function updateData($unit, $data){
        $msg = "Se ha modificado correctamente la unidad";
        $unit->update([
            'date' => $data["date"],
            'user_id' => $data["user_id"],
            'idsap' => $data["idsap"],
            'vehicle_id' => $data["vehicle_id"],
            'component_id' => $data["component_id"],
            'chassis_serial' => $data["chassis_serial"],
            'chassis_serial_origin' => $data["chassis_serial_origin"],
            'license_plate' => $data["license_plate"],
            'license_plate_origin' => $data["license_plate_origin"],
            'license_plate_type' => $data["license_plate_type"],
            'permission' => isset($data["permission"]) ? $data["permission"] : null,
            'license_plate_tractor' => isset($data["license_plate_tractor"]) ? $data["license_plate_tractor"] : null,
            'location_id' => $data["location_id"],
            'entity_id' => $data["entity_id"],
            'sticker_serial' => $data["sticker_serial"],
            'car_brand' => $data["car_brand"],
            'car_model' => $data["car_model"],
            'modification' => $data["modification"],
        ]);
        $unit->feature()->update([
            'axis_one' => $data["axis_one"],
            'axis_two' => $data["axis_two"],
            'axis_three' => $data["axis_three"],
            'brake' => $data["brake"],
            'suspension' => $data["suspension"],
            'camera' => $data["camera"],
            'tape' => $data["tape"],
            'height' => $data["height"],
            'width' => $data["width"],
            'length' => $data["length"],
            'weight' => $data["weight"],
        ]);
        $component = Component::find($unit["component_id"]);
        if ($component->motor == 1) {
            $unit->featureMotorUnit()->update([
                'electric_motor' => $data["electric_motor"],
                'horsepower' => $data["horsepower"],
                'torque' => $data["torque"],
                'traction' => $data["traction"],
                'capacity' => $data["capacity"],
                'auxiliary' => $data["auxiliary"],
                'regulator' => $data["regulator"],
            ]);
            $msg .= " con motor";
        }

        if ($data["modification"] == 1) {
            $unit->featureMod()->update([
                'mod_type' => $data["mod_type"],
                'mod_motor' => $data["mod_motor"],
                'mod_brake' => $data["mod_brake"],
                'mod_suspension' => $data["mod_suspension"],
                'mod_axis' => $data["mod_axis"],
            ]);
            $msg .= " con modificacion";
        }
        //documentos
        $documentData = [
            'unit_photo' => $data["unit_photo"],
            'image_pol_seg' => $data["image_pol_seg"],
            'validity_pol_seg' => $data["validity_pol_seg"],
            'image_mtto' => $data["image_mtto"],
            'validity_mtto' => $data["validity_mtto"],
            'image_cer_FM' => null,
            'validity_cer_FM' => null,
            'image_cer_nem' => null,
            'validity_cer_nem' => null,
        ];
        if (isset($data["permission"])) {
            if ($data["license_plate_type"] == "Estatal" && $data["permission"] == "SI") {
                $documentData = [
                    'image_cer_FM' => $data["image_cer_FM"],
                    'validity_cer_FM' => $data["validity_cer_FM"],
                    'image_cer_nem' => $data["image_cer_nem"],
                    'validity_cer_nem' => $data["validity_cer_nem"],
                ];
            }
        }
        if ($data["license_plate_type"] == "Federal") {
            $documentData = [
                'image_cer_FM' => $data["image_cer_FM"],
                'validity_cer_FM' => $data["validity_cer_FM"],
                'image_cer_nem' => $data["image_cer_nem"],
                'validity_cer_nem' => $data["validity_cer_nem"],
            ];
        }
        $unit->unitDocument()->update($documentData);
        //componentes especiales
        if (isset($data['catalog_special_feature_id'])) { //nuevo valor
            $special_features = $unit->catalogSpecialFeatureTypes;
            $special_feature_types = CatalogSpecialFeatureType::
            whereIn('catalog_special_feature_id', $data["catalog_special_feature_id"])
                ->where('type_id', $data["type_id"])
                ->pluck('id');
            foreach ($special_features as $index => $special_feature) {
                $unit->catalogSpecialFeatureTypes()->updateExistingPivot($special_feature['id'], ['catalog_special_feature_type_id' => $special_feature_types[$index]]);
            }
            $msg .= " con componentes especiales";
        }
        return $msg;
    }
}
