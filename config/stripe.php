<?php

return [
    'secret_key' => env('STRIPE_SECRET_KEY'),
    'publishable_key' => env('STRIPE_PUBLISHABLE_KEY'),
    'basic_plan' => env('STRIPE_BASICPLAN_ID'),
    'basic_price' => env('STRIPE_BASICPLAN_PRICE_ID'),
    'pro_plan' => env('STRIPE_PROPLAN_ID'),
    'pro_price' => env('STRIPE_PROPLAN_PRICE_ID'),

    // Add your plans here
    'plans' => [
        [
            'name' => 'Basic',
            'id' => 'basic', // Correctly reference the plan ID
            'price' => '150', // Use the environment variable
            'description' => 'The essentials to provide your best work for clients.',
            'features' => [
                '5 products',
                'Up to 1,000 subscribers',
                'Basic analytics',
                '48-hour support response time',
            ],
            'featured' => false,
            'cta' => 'Buy plan',
        ],
        [
            'name' => 'Pro',
            'id' => 'pro',
            'price' => '300',
            'description' => 'A plan that scales with your rapidly growing business.',
            'features' => [
                '25 products',
                'Up to 10,000 subscribers',
                'Advanced analytics',
                '24-hour support response time',
                'Marketing automations',
            ],
            'featured' => false,
            'cta' => 'Buy plan',
        ],
        [
            'name' => 'Enterprise',
            'id' => 'enterprise',
            'price' => 'Custom',
            'description' => 'Dedicated support and infrastructure for your company.',
            'features' => [
                'Unlimited products',
                'Unlimited subscribers',
                'Advanced analytics',
                '1-hour, dedicated support response time',
                'Marketing automations',
                'Custom reporting tools',
            ],
            'featured' => true,
            'cta' => 'Contact sales',
        ],
    ],

];
