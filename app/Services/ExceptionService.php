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
    public static function invalidCredentials()
    {
        $key = 'invalid-credentials';

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
            code: Response::HTTP_UNPROCESSABLE_ENTITY,
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


    public static function createFailed()
    {
        $key = 'create-failed';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_CONFLICT,
            details: [],
        );
    }

    public static function notFound()
    {
        $key = 'not-found';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_NOT_FOUND,
            details: [],
        );
    }
    public static function updateFailed()
    {
        $key = 'update-failed';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_NOT_FOUND,
            details: [],
        );
    }

    public static function questionTypeNotMultichoice()
    {
        $key = 'question-type-not-multichoice';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_CONFLICT,
            details: [],
        );
    }
    public static function questionTypeChangeForbidden()
    {
        $key = 'question-type-change-forbidden';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_CONFLICT,
            details: [],
        );
    }
    public static function updatingForPublishedForbidden()
    {
        $key = 'updating-for-published-forbidden';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_FORBIDDEN,
            details: [],
        );
    }
    public static function lastVersionIsNotPublished()
    {
        $key = 'last-version-is-not-published';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_FORBIDDEN,
            details: [],
        );
    }
    public static function noLevelAssignToUser()
    {
        $key = 'no-level-assign-to-user';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_NOT_FOUND,
            details: [],
        );
    }
    public static function currentLevelNotPublished()
    {
        $key = 'current-level-not-published';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_FORBIDDEN,
            details: [],
        );
    }
    public static function levelMustHaveSevenDays()
    {
        $key = 'level-must-have-seven-days';

        $trans_key = sprintf("%s.%s", self::ERROR_FILE, $key);

        throw new ApiLevelException(
            error_key: $key,
            custom_message: __($trans_key),
            code: Response::HTTP_FORBIDDEN,
            details: [],
        );
    }
}
