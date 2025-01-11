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

    'accepted' => 'يجب قبول ( :attribute )',
    'active_url' => '( :attribute ) لا يُمثّل رابطًا صحيحًا',
    'after' => 'يجب على ( :attribute ) أن يكون تاريخًا لاحقًا ل ( :date )',
    'after_or_equal' => '( :attribute ) يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ ( :date )',
    'alpha' => 'يجب أن لا يحتوي ( :attribute ) سوى على حروف',
    'alpha_dash' => 'يجب أن لا يحتوي ( :attribute ) سوى على حروف، أرقام ومطّات',
    'alpha_num' => 'يجب أن يحتوي ( :attribute ) على حروف وأرقامٍ فقط ولا يحتوي علي مسافات',
    'array' => 'يجب أن يكون ( :attribute ) ًمصفوفة',
    'before' => 'يجب على ( :attribute ) أن يكون تاريخًا سابقًا للتاريخ ( :date )',
    'before_or_equal' => '( :attribute ) يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ ( :date )',
    'between' => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) بين :min و :max',
        'file' => 'يجب أن يكون حجم الملف ( :attribute ) بين :min و :max كيلوبايت',
        'string' => 'يجب أن يكون عدد حروف النّص ( :attribute ) بين :min و :max',
        'array' => 'يجب أن يحتوي ( :attribute ) على عدد من العناصر بين :min و :max',
    ],
    'boolean' => 'يجب أن تكون قيمة ( :attribute ) إما true أو false ',
    'confirmed' => 'حقل التأكيد غير مُطابق للحقل ( :attribute )',
    'date' => '( :attribute ) ليس تاريخًا صحيحًا',
    'date_format' => 'لا يتوافق ( :attribute ) مع الشكل :format',
    'different' => 'يجب أن يكون الحقلان ( :attribute ) و :other مُختلفان',
    'digits' => 'يجب أن يحتوي ( :attribute ) على :digits رقمًا/أرقام',
    'digits_between' => 'يجب أن يحتوي ( :attribute ) بين :min و :max رقمًا/أرقام ',
    'dimensions' => 'الـ ( :attribute ) يحتوي على أبعاد صورة غير صالحة',
    'distinct' => 'للحقل ( :attribute ) قيمة مُكرّرة',
    'email' => 'يجب أن يكون ( :attribute ) عنوان بريد إلكتروني صحيح البُنية',
    'exists' => 'القيمة المحددة ( :attribute ) غير موجودة',
    'file' => 'الـ ( :attribute ) يجب أن يكون ملفا',
    'filled' => '( :attribute ) إجباري',
    'gt' => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) أكبر من :value',
        'file' => 'يجب أن يكون حجم الملف ( :attribute ) أكبر من :value كيلوبايت',
        'string' => 'يجب أن يكون طول النّص ( :attribute ) أكثر من :value حروفٍ/حرفًا',
        'array' => 'يجب أن يحتوي ( :attribute ) على أكثر من :value عناصر/عنصر',
    ],
    'gte' => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية أو أكبر من :value',
        'file' => 'يجب أن يكون حجم الملف ( :attribute ) على الأقل :value كيلوبايت',
        'string' => 'يجب أن يكون طول النص ( :attribute ) على الأقل :value حروفٍ/حرفًا',
        'array' => 'يجب أن يحتوي ( :attribute ) على الأقل على :value عُنصرًا/عناصر',
    ],
    'image' => 'يجب أن يكون ( :attribute ) صورةً',
    'in' => ' اختيارك ل :attribute غير صحيح.',
    'in_array' => '( :attribute ) غير موجود في :other',
    'integer' => 'يجب أن يكون ( :attribute ) عددًا صحيحًا',
    'ip' => 'يجب أن يكون ( :attribute ) عنوان IP صحيحًا',
    'ipv4' => 'يجب أن يكون ( :attribute ) عنوان IPv4 صحيحًا',
    'ipv6' => 'يجب أن يكون ( :attribute ) عنوان IPv6 صحيحًا',
    'json' => 'يجب أن يكون ( :attribute ) نصآ من نوع JSON',
    'lt' => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) أصغر من :value',
        'file' => 'يجب أن يكون حجم الملف ( :attribute ) أصغر من :value كيلوبايت',
        'string' => 'يجب أن يكون طول النّص ( :attribute ) أقل من :value حروفٍ/حرفًا',
        'array' => 'يجب أن يحتوي ( :attribute ) على أقل من :value عناصر/عنصر',
    ],
    'lte' => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية أو أصغر من :value',
        'file' => 'يجب أن لا يتجاوز حجم الملف ( :attribute ) :value كيلوبايت',
        'string' => 'يجب أن لا يتجاوز طول النّص ( :attribute ) :value حروفٍ/حرفًا',
        'array' => 'يجب أن لا يحتوي ( :attribute ) على أكثر من :value عناصر/عنصر',
    ],
    'max' => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية أو أصغر من :max',
        'file' => 'يجب أن لا يتجاوز حجم الملف ( :attribute ) :max كيلوبايت',
        'string' => 'يجب أن لا يتجاوز طول النّص ( :attribute ) :max حروفٍ/حرفًا',
        'array' => 'يجب أن لا يحتوي ( :attribute ) على أكثر من :max عناصر/عنصر',
    ],
    'mimes' => 'يجب أن يكون ملفًا من نوع : :values',
    'mimetypes' => 'يجب أن يكون ملفًا من نوع : :values',
    'min' => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية أو أكبر من :min',
        'file' => 'يجب أن يكون حجم الملف ( :attribute ) على الأقل :min كيلوبايت',
        'string' => 'يجب أن يكون طول النص ( :attribute ) على الأقل :min حروفٍ/حرفًا',
        'array' => 'يجب أن يحتوي ( :attribute ) على الأقل على :min عُنصرًا/عناصر',
    ],
    'not_in' => '( :attribute ) موجود',
    'not_regex' => 'صيغة ( :attribute ) غير صحيحة',
    'numeric' => 'يجب على ( :attribute ) أن يكون رقمًا',
    'present' => 'يجب تقديم ( :attribute )',
    'regex' => 'صيغة ( :attribute ) .غير صحيحة',
    'required' => 'حقل ( :attribute ) مطلوب',
    'required_array_keys' => 'الحقل :attribute يجب ان يحتوي علي مدخلات للقيم التالية :values.',
    'required_if' => '( :attribute ) مطلوب في حال ما إذا كان :other يساوي :value',
    'required_unless' => '( :attribute ) مطلوب في حال ما لم يكن :other يساوي :values',
    'required_with' => '( :attribute ) مطلوب إذا كان :values تم ادخالها',
    'required_with_all' => '( :attribute ) مطلوب إذا كان :values',
    'required_without' => '( :attribute ) مطلوب إذا لم يكن :values',
    'required_without_all' => '( :attribute ) مطلوب إذا لم يكن :values',
    'same' => 'يجب أن يتطابق ( :attribute ) مع :other',
    'size' => [
        'numeric' => 'يجب أن تكون قيمة ( :attribute ) مساوية لـ :size',
        'file' => 'يجب أن يكون حجم الملف ( :attribute ) :size كيلوبايت',
        'string' => 'يجب أن يحتوي النص ( :attribute ) على :size حروفٍ/حرفًا بالضبط',
        'array' => 'يجب أن يحتوي ( :attribute ) على :size عنصرٍ/عناصر بالضبط',
    ],
    'string' => 'يجب أن يكون ( :attribute ) نصآ',
    'timezone' => 'يجب أن يكون ( :attribute ) نطاقًا زمنيًا صحيحًا',
    'unique' => 'قيمة ( :attribute ) مُستخدمة من قبل',
    'uploaded' => 'فشل في تحميل الـ ( :attribute )',
    'url' => 'صيغة الرابط غير صحيحة',
    'uuid' => '( :attribute ) يجب أن يكون بصيغة UUID سليمة',

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
        'abilities' => [
            'required' => 'صلاحيات الوظيفة مطلوبة'
        ],
        'rate' => [
            'required' => 'يجب عليك تحديد التقيم'
        ],
        '*.start_time' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        '*.end_time' => [
            'required_if' => 'حقل ( :attribute ) مطلوب',
            'after' => 'يجب على ( :attribute ) أن يكون وقتاً لاحقًا لوقت :date'
        ],
        '*.break_end_time' => [
            'after' => 'يجب على ( :attribute ) أن يكون وقتاً لاحقًا لوقت :date'
        ],
        'examination_price' => [
            'max' => 'سعر الفحص كبير جداً'
        ],
        'social_id' => [
            'unique' => 'تم التسجيل بهذا الحساب مسبقا'
        ],
        'medical_center_id' => [
            'required' => 'حقل ( :attribute ) مطلوب',
        ],
        'otp' => [
            'exists' => 'حقل ( :attribute ) غير صالح',
        ],
        'phone' => [
            'regex' => 'رقم الهاتف يجب ان يبدأ ب 05 متبوعاً ب 8 ارقام '
        ],
        'password' => [
            'regex' => '  يجب أن تحتوي :attribute علي حرف و رقم واحد علي الأقل '
        ],
        'payment_receipt' => [
            'required_if' => 'حقل ( :attribute ) مطلوب'
        ],
        'message' => [
            'required_if' => 'حقل ( :attribute ) مطلوبة'
        ],
        'gift_owner_name' => [
            'required_if' => 'حقل ( :attribute ) مطلوبة'
        ],
        'gift_owner_email' => [
            'required_if' => 'حقل ( :attribute ) مطلوبة'
        ],
        'gift_owner_phone' => [
            'required_if' => 'حقل ( :attribute ) مطلوبة'
        ],
        'event' => [
            'required_if' => 'حقل ( :attribute ) مطلوبة'
        ],
        'top_up_key' => [
            'required' => 'يجب عليك التحقق من حسابك في اللعبة اولاََ'
        ],
        'provider_category' => [
            'required_unless' => 'حقل ( :attribute ) مطلوبة'
        ],
        'coupon_code' => [
            'required' => 'حقل ( :attribute ) مطلوبة'
        ],
        'affiliate_code' => [
            'not_in' => "لا يمكنك استخدام كود الدعوة الخاص بك"
        ],
        '0' => [
            'in' => " اسم العمود في الملف يجب ان يكون ( serial_code )"
        ],
        '1' => [
            'in' => "اسم العمود في الملف يجب ان يكون ( pin_code )"
        ],
        'denominations.*.codes' => [
            'not_regex' => "ملف الاكسل يجب ان يحتوي على صف واحد على الاقل"
        ],
        'denominations.*.codes' => [
            'required' => "يجب رفع ملف اكواد الشراء"
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


    'attributes' => [
        'first_name' => 'الاسم الأول',
        'last_name' => 'اسم العائلة',
        'message' => 'الرسالة',
        'email' => 'البريد الإلكتروني',
        'phone' => 'الهاتف',
        'name_en' => 'الإسم باللغة الإنجليزية',
        'name_ar' => 'الاسم باللغة العربية',
        'password' => 'كلمة المرور',
        'old_password' => 'كلمة المرور القديمة',
        'new_password' => 'كلمة المرور الجديدة',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'image' => 'الصورة',
        'icon' => 'الصورة',
        'lat' => 'العنوان من الخريطة',
        'lng' => 'العنوان من الخريطة',
        'name' => 'الأسم',
        'address' => 'العنوان',
        'city_id' => 'المنطقة',
        'roles' => 'الصلاحيات والادوار',
        'logo' => 'اللوجو',
        'favicon' => 'ايقونة الموقع',
        'setting_type' => 'نوع الاعدادات',
        'meta_tag_description_ar' => 'وصف مختصر بالعربية',
        'meta_tag_description_en' => 'وصف مختصر بالانجليزية',
        'meta_tag_keyword_ar' => 'كلمات دلالية بالعربية',
        'meta_tag_keyword_en' => 'كلمات دلالية بالانجليزية',
        'meta_desc_ar' => 'وصف مختصر لمحركات البحث بالعربية',
        'meta_desc_en' => 'وصف مختصر لمحركات البحث بالانجليزية',
        'gender' => 'الجنس',
        'images' => 'الصور',
        'clinic_name' => 'الإسم',
        'clinic_info' => 'الوصف',
        'clinic_address' => 'العنوان',
        'examination_price' => 'سعر الفحص',
        'examination_duration' => 'مدة الفحص',
        'schedules.*.reservation_type' => 'نوع الحجز',
        'schedules.*.*.start_time' => 'بداية العمل',
        'schedules.*.*.end_time' => 'نهاية العمل',
        'schedules.*.*.break_start_time' => 'بداية الراحة',
        'schedules.*.*.break_end_time' => 'نهاية الراحة',
        'price' => 'السعر',
        'addon_service_id' => 'نوع الخدمة',
        'date' => 'تاريخ الزيارة',
        'age' => 'العمر',

        'category_id' => 'الفئة',
        'categories' => 'الفئات',
        'subcategories' => 'الفئات الفرعية',
        'tags' => 'الكلمات المفتاحية',
        'brand_id' => 'الماركة',
        'caliber' => 'العيار',
        'size' => 'المقاس',
        'video_link' => 'رابط الفيديو',
        'skin_colors' => 'الوان الجلد',
        'cities' => 'المدن',
        'city' => 'المدينة',
        'shipping_price' => 'سعر الشحن',
        'type' => 'النوع',
        'status' => 'الحالة',
        'meta_tag_key_words' => 'كلمات دلالية',
        'meta_tag_key_description' => 'وصف مختصر',
        'discount_price' => 'سعر الخصم',
        'discount_from' => 'السعر من',
        'discount_to' => 'السعر الي',
        'subscription_days' => 'ايام الاشتراك',
        'birthday' => 'تاريخ الميلاد',
        'terms_ar' => 'الشروط',
        'terms_en' => 'الشروط',
        'privacy_ar' => 'سياسة الخصوصية',
        'privacy_en' => 'سياسة الخصوصية',
        'otp' => 'رمز التحقق',
        'main_pic' => 'الصورة',
        'weight' => 'الوزن',
        'title_ar' => 'العنوان بالعربى',
        'title_en' => 'العنوان بالانجليزي',
        'description_ar' => 'الوصف بالعربي',
        'description_en' => 'الوصف بالانجليزي',
        'price_after' => 'السعر بعد',
        'price_before' => 'السعر قبل',
        'from_date' => 'تاريخ بداية العرض',
        'to_date' => 'تاريخ نهاية العرض',
        'current_password' => 'كلمة المرور الحالية',
        'start_date' => 'تاريخ البداية',
        'doctors_count' => 'عدد الاطباء',
        'location' => 'الموقع',
        'clinic_phone' => 'هاتف العيادة',
        'work_for' => 'يعمل لدى',
        'email_or_phone' => 'البريد الالكتروني او الهاتف',
        'whatsapp_number' => 'رقم الوتساب',
        'sms_number' => 'رقم ال sms',
        'rate' => 'التقيم',
        'comment' => 'الملاحظات',
        'bank_accounts.*.logo' => 'الصورة',
        'bank_accounts.*.bank_name' => 'اسم البنك',
        'bank_accounts.*.owner' => 'صاحب الحساب',
        'bank_accounts.*.iban_number' => 'رقم الإيبان',
        'monthly.price' => 'السعر',
        'monthly.price_after_discount' => 'السعر بعد الخصم',
        'monthly.date_from' => 'تاريخ البداية',
        'monthly.date_to' => 'تاريخ النهاية',
        'yearly.price' => 'السعر',
        'yearly.price_after_discount' => 'السعر بعد الخصم',
        'yearly.date_from' => 'تاريخ البداية',
        'yearly.date_to' => 'تاريخ النهاية',
        'schedules.*.start_time' => 'تاريخ البداية',
        'schedules.*.end_time' => 'تاريخ البداية',
        'schedules.*.break_start_time' => 'تاريخ البداية',
        'schedules.*.break_end_time' => 'تاريخ البداية',
        'subscription_type' => 'نوع الإشتراك',
        'payment_method_id' => 'طريقة الدفع',
        'payment_receipt' => 'صورة التحويل',
        'website_name' => 'إسم الموقع',
        'description' => 'الوصف',
        'commercial_register_number' => 'رقم السجل التجاري',
        'national_id' => 'الرقم الهوية',
        'national_single_sign_on' => 'رقم النفاذ الوطني',
        'landing_page.main_section_title_ar' => 'العنوان عربي',
        'landing_page.main_section_title_en' => 'العنوان انجليزي',
        'landing_page.main_section_description_ar' => 'الوصف عربي',
        'landing_page.main_section_description_en' => 'الوصف انجليزي',
        'landing_page.how_we_are_title_ar' => 'العنوان عربي',
        'landing_page.how_we_are_title_en' => 'العنوان انجليزي',
        'landing_page.how_we_are_description_ar' => 'الوصف عربي',
        'landing_page.how_we_are_description_en' => 'الوصف انجليزي',

        'landing_page.why_choose_us_title_1_ar' => 'العنوان عربي',
        'landing_page.why_choose_us_title_1_en' => 'العنوان انجليزي',
        'landing_page.why_choose_us_description_1_ar' => 'الوصف عربي',
        'landing_page.why_choose_us_description_1_en' => 'الوصف انجليزي',

        'landing_page.why_choose_us_title_2_ar' => 'العنوان عربي',
        'landing_page.why_choose_us_title_2_en' => 'العنوان انجليزي',
        'landing_page.why_choose_us_description_2_ar' => 'الوصف عربي',
        'landing_page.why_choose_us_description_2_en' => 'الوصف انجليزي',

        'landing_page.why_choose_us_title_2_ar' => 'العنوان عربي',
        'landing_page.why_choose_us_title_2_en' => 'العنوان انجليزي',
        'landing_page.why_choose_us_description_2_ar' => 'الوصف عربي',
        'landing_page.why_choose_us_description_2_en' => 'الوصف انجليزي',

        'landing_page.why_choose_us_title_4_ar' => 'العنوان عربي',
        'landing_page.why_choose_us_title_4_en' => 'العنوان انجليزي',
        'landing_page.why_choose_us_description_4_ar' => 'الوصف عربي',
        'landing_page.why_choose_us_description_4_en' => 'الوصف انجليزي',

        'landing_page.app_features_title_1_ar' => 'العنوان عربي',
        'landing_page.app_features_title_1_en' => 'العنوان انجليزي',
        'landing_page.app_features_description_1_ar' => 'الوصف عربي',
        'landing_page.app_features_description_1_en' => 'الوصف انجليزي',

        'landing_page.app_features_title_2_ar' => 'العنوان عربي',
        'landing_page.app_features_title_2_en' => 'العنوان انجليزي',
        'landing_page.app_features_description_2_ar' => 'الوصف عربي',
        'landing_page.app_features_description_2_en' => 'الوصف انجليزي',

        'landing_page.app_features_title_2_ar' => 'العنوان عربي',
        'landing_page.app_features_title_2_en' => 'العنوان انجليزي',
        'landing_page.app_features_description_2_ar' => 'الوصف عربي',
        'landing_page.app_features_description_2_en' => 'الوصف انجليزي',

        'landing_page.app_features_title_4_ar' => 'العنوان عربي',
        'landing_page.app_features_title_4_en' => 'العنوان انجليزي',
        'landing_page.app_features_description_4_ar' => 'الوصف عربي',
        'landing_page.app_features_description_4_en' => 'الوصف انجليزي',
        'instagram_link' => 'رابط الانستاجرام',
        'facebook_link' => 'رابط الفيسبوك',
        'linkedin_link' => 'رابط لينكدان',
        'youtube_link' => 'رابط بوتيوب',
        'twitter_link' => 'منصة اكس',
        'label_ar' => 'العنوان بالعربية',
        'label_en' => 'العنوان بالانجليزية',
        'about_us_ar' => 'من نحن بالعربية',
        'about_us_en' => 'من نحن بالانجليزية',
        'privacy_policy_ar' => 'السياسة و الخصوصية بالعربية',
        'privacy_policy_en' => 'السياسة و الخصوصية بالانجليزية',
        'code' => 'الكود',
        'price_after_discount' => 'السعر بعد الخصم',
        'discount_percentage' => 'نسبة الخصم',
        'date_from' => 'تاريخ البداية',
        'date_to' => 'تاريخ النهاية',
        'expiration_type' => 'طريقة انتهاء الكوبون',
        'cash_back_percentage' => 'نسبة الكاش باك',
        'has_cash_back' => 'يوجد الكاش باك',
        'maximum_usage' => 'الحد الأقصى للاستخدام',
        'new-email' => 'البريد الإلكتروني',
        'phone_otp' => 'رقم الهاتف',
        'forget_email' => 'البريد الإلكتروني',
        'login_email' => 'البريد الإلكتروني',
        'login_password' => 'كلمة المرور',
        'reset_password' => 'كلمة المرور',
        'reset_password_confirmation' => 'تأكيد كلمة المرور',
        'main_image' => 'الصورة الرئيسية',
        'show_in_home_page' => 'عرض في الصفحة الرئيسية',
        'link' => 'الرابط',
        'product_id' => 'المنتج',
        'bank_name' => 'اسم البنك',
        'payment_method' => 'وسيلة الدفع',
        'events.*.title' => 'المناسبة',
        'fixed_messages.*.title' => 'الرسالة',
        'cards.*.title' => 'البطاقة',
        'gift_owner_name' => 'اسم المستلم',
        'gift_owner_email' => 'البريد الالكتروني',
        'gift_owner_phone' => 'رقم الجوال',
        'event' => 'المناسبة',
        'home_page.why_choose_us_main_description_ar' => 'الوصف الرئيسي عربي',
        'home_page.why_choose_us_main_description_en' => 'الوصف الرئيسي انجليزي',
        'home_page.why_choose_us_title_1_ar' => 'العنوان عربي 1',
        'home_page.why_choose_us_title_1_en' => 'العنوان انجليزي 1',
        'home_page.why_choose_us_description_1_ar' => 'الوصف عربي 1',
        'home_page.why_choose_us_description_1_en' => 'الوصف انجليزي 1',
        'home_page.why_choose_us_title_2_ar' => 'العنوان عربي 2',
        'home_page.why_choose_us_title_2_en' => 'العنوان انجليزي 2',
        'home_page.why_choose_us_description_2_ar' => 'الوصف عربي 2',
        'home_page.why_choose_us_description_2_en' => 'الوصف انجليزي 2',
        'home_page.why_choose_us_title_3_ar' => 'العنوان عربي 3',
        'home_page.why_choose_us_title_3_en' => 'العنوان انجليزي 3',
        'home_page.why_choose_us_description_3_ar' => 'الوصف عربي 3',
        'home_page.why_choose_us_description_3_en' => 'الوصف انجليزي 3',
        'coupon_code' => 'كوبون الخصم',
        'order_cashback_percentage' => 'نسبة الكاش باك مع الطلبات',
        'order_cashback' => 'الكاش باك مع الطلبات',
        'wallet_recharge_cashback_percentage' => 'نسبة الكاش باك مع شحن المحفظة',
        'wallet_recharge_cashback' => 'الكاش باك مع شحن المحفظة',
        'amount' => 'المبلغ',
        'affiliate_code' => 'كود الدعوة',
        'title' => 'عنوان الرسالة',
        'reply' => 'الرد',
        'affiliate_discount_percentage' => 'نسبة الخصم التسويقية',
 
        'variations.*.discount_price' => 'سعر الخصم',
        'variations.*.discount_from' => 'خصم من',
        'variations.*.discount_to' => 'خصم الي',
        'return_policy_en' => 'سياسة الإسترجاع بالانجليزية',
        'return_policy_ar' => 'سياسة الإسترجاع بالعربية',
        'parent_id' => 'القسم الرئيسي',
        'category_type' => 'نوع الفئة',
        'sub' => 'قسم فرعي',
        'country_code' => 'كود الدولة',
        'street_address' => 'عنوان الشارع الخاص بنقطة الالتقاء',
        'contact_name' => 'اسم جهة الاتصال',
        'contact_email' => 'تواصل بالبريد الاكتروني',
        'btn_title_ar' => 'اسم الزر بالعربي',
        'btn_title_en' => 'اسم الزر بالانجليزي',
        'btn_link' => 'رابط الزر',
        'confirm_email_password' => 'أكد بكلمة السر',
        'background' => 'الخلفية',
        
        "User" => "المستخدم",
        "commercial_register" => "السجل الضريبي",
        "cover" => "الغلاف",
        "licensure" => "الترخيص",
        "ratio.0" => "الذهب",
        "ratio.1" => "الفضة",
        "ratio.2" => "الماس",
        "ratio.3" => "الساعات",
        "ratio.4" => "السبائك",
        'iban_number' => 'رقم الإيبان البنكي',
        'tax' => "الضريبة",
        "brand_name_en" => "اسم العلامة التجارية بالإنجليزية",
        "brand_name_ar" => "اسم العلامة التجارية بالعربية",
         "iban" => "الإيبان البنكي",
        "" => "",
        "" => "",
        "" => "",
        "" => "",
        "" => "",
        "" => "",
        "" => "",
        "" => "",
        "" => "",
        "" => "",
        "" => "",
        "" => "",
        "" => "",
        "" => "",
        "" => ""

    ],

    'values' => [
        'from_date' => [
            'today' => 'اليوم',
        ],
        'from' => [
            'today' => 'اليوم',
        ],
        'end_at' => [
            'today' => 'اليوم'
        ],
        'discount_type' => [
            'percentage' => 'نسبة مئوية'
        ],
        'type' => [
            'image' => 'صورة'
        ],
        'discount_from' => [
            'today' => 'اليوم'
        ],
        'manual_address' => [
            'address_id' => 'العنوان',
        ],
        'address_id' => [
            'manual_address' => 'العنوان اليدوي'
        ],
        'payment_method' => [
            'bank' => 'تحويل بنكي'
        ],
        'setting_type' => [
            'about-website' => 'عن الموقع',
            'general' => 'عام',
            'website' => 'الموقع'
        ],
        'date' => [
            'today' => 'اليوم'
        ],
        'price_field_status' => [
            'other' => 'آخر'
        ],
        'expiration_type' => [
            1 => 'تاريخ صلاحية',
            2 => 'عدد مرات استخدام',
            3 => 'تاريخ صلاحية و عدد مرات استخدام',
        ],
    ]
];
