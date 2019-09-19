<?php
namespace App\Traits;
use Crypt;
use Log;

trait Encryptable
{
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable)) {
            $value = Crypt::decrypt($value);
            return $value;
        }
        return $value;
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $value = Crypt::encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }

    public function toArray()
    {
        $array = parent::toArray();

        foreach ($array as $key => $attribute) {
            if (in_array($key, $this->encryptable)) {
                $array[$key] = Crypt::decrypt($attribute);
            }
        }
        return $array;
    }
}