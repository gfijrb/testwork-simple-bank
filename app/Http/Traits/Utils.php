<?php
namespace App\Http\Traits;

use App\Http\Controllers\_Utils;

/**
 * Trait Utils
 */
trait Utils
{
    /**
     * @var _Utils|__anonymous@383
     */
    public static $interface;

    /**
     * Utils constructor.
     */
    public function __construct()
    {
        self::$interface = new class() implements _Utils {

            /**
             * @param string $a
             * @param string $b
             * @return object
             */
            function bcValidator(string &$a, string &$b):object
            {
                $dec = 4;
                $a = (string)bcmul(bcadd($a, 0, $dec), 10**$dec);
                $b = (string)bcmul(bcadd($b, 0, $dec), 10**$dec);
                return (object) [
                    "a" => $a,
                    "b" => $b,
                    "dec" => $dec
                ];
            }

            /**
             * @param $a
             * @param $b
             * @return bool
             */
            public function inputValidator($a, $b):bool
            {
                if(is_scalar($a) && is_scalar($b))
                {
                    $_a = str_split($a);
                    foreach ($_a as $k=>$v) {
                        if(ctype_alpha($v)) throw new Error("Alphabetic symbols detected");
                    }
                    $_b = str_split($b);
                    foreach ($_b as $k=>$v) {
                        if(ctype_alpha($v)) throw new Error("Alphabetic symbols detected");
                    }
                    return true;
                }
                else throw new Error("Not scalar type argument/~s");
            }

            /**
             * @param string $a
             * @param string $b
             * @return string
             */
            public function add(string $a, string $b):string
            {
                self::inputValidator($a, $b);
                $r = self::bcValidator($a, $b);
                return (\bcadd($r->a, $r->b)/ 10**$r->dec);
            }

            /**
             * @param string $a
             * @param string $b
             * @return string
             */
            public function sub(string $a, string $b):string
            {
                self::inputValidator($a, $b);
                $r = self::bcValidator($a, $b);
                return (\bcsub($r->a, $r->b)/ 10**$r->dec);
            }
        };
    }

    /**
     * @param $a
     * @param $b
     * @return string
     */
    public function add($a, $b)
    {
        return self::$interface->add($a, $b);
    }

    /**
     * @param $a
     * @param $b
     * @return string
     */
    public function sub($a, $b)
    {
        return self::$interface->sub($a, $b);
    }
}
