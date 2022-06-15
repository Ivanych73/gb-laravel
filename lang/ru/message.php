<?php

return [
    'admin' => [
        'author' => [
            'create' => [
                'success' => 'Новый автор успешно добавлен',
                'fail' => 'Ошибка при добавлении нового автора'
            ],
            'update' => [
                'success' => 'Данные об авторе успешно обновлены',
                'fail' => 'Ошибка обновления данных об авторе'
            ]
        ],
        'category' => [
            'create' => [
                'success' => 'Новая категория успешно добавлена',
                'fail' => 'Ошибка добавления новой категории'
            ],
            'update' => [
                'success' => 'Категория успешно обновлена',
                'fail' => 'Ошибка обновления категории'
            ]
        ],
        'feedback' => [
            'update' => [
                'success' => 'Отзыв успешно обновлен',
                'fail' => 'Ошибка обновления отзыва'
            ]
        ],
        'news' => [
            'create' => [
                'success' => 'Новая новость успешно добавлена',
                'fail' => 'Ошибка добавления новости'
            ],
            'update' => [
                'success' => 'Новость успешно обновлена',
                'fail' => 'Ошибка обновления новости'
            ]
        ],
        'order' => [
            'update' => [
                'success' => 'Заказ успешно обновлен',
                'fail' => 'Ошибка обновления заказа'
            ]
        ],
        'user' => [
            'update' => [
                'success' => 'Данные пользователя успешно обновлены',
                'fail' => 'Ошибка обновления данных пользователя'
            ]
        ],
        'source' => [
            'create' => [
                'success' => 'Новый источник успешно добавлен',
                'fail' => 'Ошибка добавления источника'
            ],
            'update' => [
                'success' => 'Источник успешно обновлен',
                'fail' => 'Ошибка обновления источника'
            ]
        ],
    ],
    'user' => [
        'form' => [
            'feedback' => [
                'create' => [
                    'success' => 'Ваш отзыв успешно сохранен',
                    'fail' => 'Ошибка сохранения отзыва'
                ]
            ],
            'order' => [
                'create' => [
                    'success' => 'Ваш заказ успешно сохранен',
                    'fail' => 'Ошибка сохранения заказа'
                ]
            ]
        ],
        'auth' => [
            'register' => [
                'success' => 'Ваши данные успешно сохранены',
                'fail' => 'Ошибка сохранения данных'
            ],
            'update' => [
                'success' => 'Ваши данные успешно обновлены',
                'fail' => 'Ошибка обновления данных'
            ],
            'login' => [
                'fail' => [
                    'noexternalauth' => 'Такой способ аутентификации не поддерживается'
                ]
            ]
        ]
    ]
];
