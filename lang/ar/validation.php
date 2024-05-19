<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'يجب قبول :attribute.',
    'accepted_if' => 'يجب قبول :attribute عندما يكون :other :value.',
    'active_url' => ':attribute يجب أن يكون رابطًا صحيحًا.',
    'after' => ':attribute يجب أن يكون تاريخًا بعد :date.',
    'after_or_equal' => ':attribute يجب أن يكون تاريخًا بعد أو يساوي :date.',
    'alpha' => ':attribute يجب أن يحتوي على أحرف فقط.',
    'alpha_dash' => ':attribute يجب أن يحتوي على أحرف، أرقام، شرطات وشرطات سفلية فقط.',
    'alpha_num' => ':attribute يجب أن يحتوي على أحرف وأرقام فقط.',
    'array' => ':attribute يجب أن يكون مصفوفة.',
    'ascii' => ':attribute يجب أن يحتوي على أحرف ورموز ألفبائية-رقمية بنظام البايت الفردي فقط.',
    'before' => ':attribute يجب أن يكون تاريخًا قبل :date.',
    'before_or_equal' => ':attribute يجب أن يكون تاريخًا قبل أو يساوي :date.',
    'between' => [
        'array' => ':attribute يجب أن يحتوي على عناصر بين :min و :max.',
        'file' => ':attribute يجب أن يكون بين :min و :max كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون بين :min و :max.',
        'string' => ':attribute يجب أن يكون بين :min و :max حروف.',
    ],
    'boolean' => ':attribute يجب أن يكون صحيحًا أو خاطئًا.',
    'can' => ':attribute يحتوي على قيمة غير مصرح بها.',
    'confirmed' => ':attribute التأكيد غير متطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => ':attribute يجب أن يكون تاريخًا صالحًا.',
    'date_equals' => ':attribute يجب أن يكون تاريخًا يساوي :date.',
    'date_format' => ':attribute لا يطابق الصيغة :format.',
    'decimal' => ':attribute يجب أن يحتوي على :decimal منازل عشرية.',
    'declined' => ':attribute يجب رفضه.',
    'declined_if' => ':attribute يجب رفضه عندما يكون :other :value.',
    'different' => ':attribute و :other يجب أن يكونا مختلفين.',
    'digits' => ':attribute يجب أن يكون :digits رقمًا.',
    'digits_between' => ':attribute يجب أن يكون بين :min و :max رقمًا.',
    'dimensions' => ':attribute له أبعاد صورة غير صالحة.',
    'distinct' => ':attribute يحتوي على قيمة مكررة.',
    'doesnt_end_with' => ':attribute يجب ألا ينتهي بأحد القيم التالية: :values.',
    'doesnt_start_with' => ':attribute يجب ألا يبدأ بأحد القيم التالية: :values.',
    'email' => ':attribute يجب أن يكون عنوان بريد إلكتروني صحيح.',
    'ends_with' => ':attribute يجب أن ينتهي بأحد القيم التالية: :values.',
    'enum' => ':attribute المختار غير صالح.',
    'exists' => ':attribute المختار غير صالح.',
    'extensions' => ':attribute يجب أن يكون له أحد الامتدادات التالية: :values.',
    'file' => ':attribute يجب أن يكون ملفًا.',
    'filled' => ':attribute يجب أن يحتوي على قيمة.',
    'gt' => [
        'array' => ':attribute يجب أن يحتوي على أكثر من :value عناصر.',
        'file' => ':attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أكبر من :value.',
        'string' => ':attribute يجب أن يكون أكبر من :value حروف.',
    ],
    'gte' => [
        'array' => ':attribute يجب أن يحتوي على :value عناصر أو أكثر.',
        'file' => ':attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أكبر من أو يساوي :value.',
        'string' => ':attribute يجب أن يكون أكبر من أو يساوي :value حروف.',
    ],
    'hex_color' => ':attribute يجب أن يكون لونًا سداسيًا صالحًا.',
    'image' => ':attribute يجب أن يكون صورة.',
    'in' => ':attribute المختار غير صالح.',
    'in_array' => ':attribute يجب أن يكون موجودًا في :other.',
    'integer' => ':attribute يجب أن يكون عددًا صحيحًا.',
    'ip' => ':attribute يجب أن يكون عنوان IP صالحًا.',
    'ipv4' => ':attribute يجب أن يكون عنوان IPv4 صالحًا.',
    'ipv6' => ':attribute يجب أن يكون عنوان IPv6 صالحًا.',
    'json' => ':attribute يجب أن يكون سلسلة JSON صالحة.',
    'lowercase' => ':attribute يجب أن يكون بحروف صغيرة.',
    'lt' => [
        'array' => ':attribute يجب أن يحتوي على أقل من :value عناصر.',
        'file' => ':attribute يجب أن يكون أقل من :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أقل من :value.',
        'string' => ':attribute يجب أن يكون أقل من :value حروف.',
    ],
    'lte' => [
        'array' => ':attribute يجب ألا يحتوي على أكثر من :value عناصر.',
        'file' => ':attribute يجب أن يكون أقل من أو يساوي :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أقل من أو يساوي :value.',
        'string' => ':attribute يجب أن يكون أقل من أو يساوي :value حروف.',
    ],
    'mac_address' => ':attribute يجب أن يكون عنوان MAC صالحًا.',
    'max' => [
        'array' => ':attribute يجب ألا يحتوي على أكثر من :max عناصر.',
        'file' => ':attribute يجب ألا يكون أكبر من :max كيلوبايت.',
        'numeric' => ':attribute يجب ألا يكون أكبر من :max.',
        'string' => ':attribute يجب ألا يكون أكبر من :max حروف.',
    ],
    'max_digits' => ':attribute يجب ألا يحتوي على أكثر من :max أرقام.',
    'mimes' => ':attribute يجب أن يكون ملفًا من النوع: :values.',
    'mimetypes' => ':attribute يجب أن يكون ملفًا من النوع: :values.',
    'min' => [
        'array' => ':attribute يجب أن يحتوي على الأقل :min عناصر.',
        'file' => ':attribute يجب أن يكون على الأقل :min كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون على الأقل :min.',
        'string' => ':attribute يجب أن يكون على الأقل :min حروف.',
    ],
    'min_digits' => ':attribute يجب أن يحتوي على الأقل :min أرقام.',
    'missing' => ':attribute يجب أن يكون مفقودًا.',
    'missing_if' => ':attribute يجب أن يكون مفقودًا عندما يكون :other :value.',
    'missing_unless' => ':attribute يجب أن يكون مفقودًا ما لم يكن :other :value.',
    'missing_with' => ':attribute يجب أن يكون مفقودًا عندما يكون :values موجودًا.',
    'missing_with_all' => ':attribute يجب أن يكون مفقودًا عندما تكون :values موجودة.',
    'multiple_of' => ':attribute يجب أن يكون من مضاعفات :value.',
    'not_in' => ':attribute المختار غير صالح.',
    'not_regex' => ':attribute التنسيق غير صالح.',
    'numeric' => ':attribute يجب أن يكون رقمًا.',
    'password' => [
        'letters' => ':attribute يجب أن يحتوي على حرف واحد على الأقل.',
        'mixed' => ':attribute يجب أن يحتوي على حرف كبير وحرف صغير على الأقل.',
        'numbers' => ':attribute يجب أن يحتوي على رقم واحد على الأقل.',
        'symbols' => ':attribute يجب أن يحتوي على رمز واحد على الأقل.',
        'uncompromised' => ':attribute المعطى ظهر في تسريب بيانات. يرجى اختيار :attribute مختلف.',
    ],
    'present' => ':attribute يجب أن يكون موجودًا.',
    'present_if' => ':attribute يجب أن يكون موجودًا عندما يكون :other :value.',
    'present_unless' => ':attribute يجب أن يكون موجودًا ما لم يكن :other :value.',
    'present_with' => ':attribute يجب أن يكون موجودًا عندما يكون :values موجودًا.',
    'present_with_all' => ':attribute يجب أن يكون موجودًا عندما تكون :values موجودة.',
    'prohibited' => ':attribute محظور.',
    'prohibited_if' => ':attribute محظور عندما يكون :other :value.',
    'prohibited_unless' => ':attribute محظور ما لم يكن :other في :values.',
    'prohibits' => ':attribute يحظر وجود :other.',
    'regex' => ':attribute التنسيق غير صالح.',
    'required' => ':attribute مطلوب.',
    'required_array_keys' => ':attribute يجب أن يحتوي على إدخالات لـ: :values.',
    'required_if' => ':attribute مطلوب عندما يكون :other :value.',
    'required_if_accepted' => ':attribute مطلوب عندما يتم قبول :other.',
    'required_unless' => ':attribute مطلوب ما',
    'required_with' => ':attribute مطلوب عندما يكون :values موجودًا.',
    'required_with_all' => ':attribute مطلوب عندما تكون :values موجودة.',
    'required_without' => ':attribute مطلوب عندما لا يكون :values موجودًا.',
    'required_without_all' => ':attribute مطلوب عندما لا يكون أي من :values موجودًا.',
    'same' => ':attribute يجب أن يطابق :other.',
    'size' => [
        'array' => ':attribute يجب أن يحتوي على :size عنصرًا.',
        'file' => ':attribute يجب أن يكون :size كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون :size.',
        'string' => ':attribute يجب أن يكون :size حرفًا.',
    ],
    'starts_with' => ':attribute يجب أن يبدأ بأحد القيم التالية: :values.',
    'string' => ':attribute يجب أن يكون نصًا.',
    'timezone' => ':attribute يجب أن يكون منطقة زمنية صالحة.',
    'unique' => ':attribute تم استخدامه بالفعل.',
    'uploaded' => 'فشل في تحميل :attribute.',
    'uppercase' => ':attribute يجب أن يكون بحروف كبيرة.',
    'url' => ':attribute يجب أن يكون رابطًا صحيحًا.',
    'ulid' => ':attribute يجب أن يكون ULID صالحًا.',
    'uuid' => ':attribute يجب أن يكون UUID صالحًا.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
