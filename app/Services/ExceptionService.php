<?php


namespace App\Services;

use App\Exceptions\ApiLevelException;


use Symfony\Component\HttpFoundation\Response;

/**
 * الخدمة المخصصة للتعامل مع اخطاء التطبيق
 * تحوي فقط دوال جاهزة للاستدعاء
 * كل دالة يجب ان تحمل رسالة الخطا ورقم الخطا http
 * فقط يتم استدعاء الدالة لقذف الخطا
 */

class ExceptionService
{

    const ERROR_FILE = 'exceptions';
    public static function authRequired()
    {
        $key = 'auth-required';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_UNAUTHORIZED,
            details: [],
        );
    }
    public static function unauthorizedAction()
    {
        $key = 'unauthorized-action';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_FORBIDDEN,
            details: [],
        );
    }


    public static function validation($details)
    {
        $key = 'validation';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_FORBIDDEN,
            details: $details,
        );
    }

    /**
     * @return ApiLevelException
     */
    public static function unhandledExceptionThrowable(): ApiLevelException
    {
        $key = 'unhandled-exception';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        return new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_INTERNAL_SERVER_ERROR,
            details: [],
        );
    }
}
