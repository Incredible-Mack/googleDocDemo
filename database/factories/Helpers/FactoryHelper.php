<?php

    namespace Database\Factories\Helpers;
    // use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * this function get a random model id from the database
     */
    class FactoryHelper {

        public static function getRandomModelId(string $model)
        {
            $count = $model::query()->count();

            if($count === 0){
                return $model::factory()->create()->id;
            }else{
                return rand(1 , $count);
            }
        }
    }

?>
