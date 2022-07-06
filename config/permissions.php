<?php


return [
    'access' => [

        'dashboard-list' => 'dashboard_list',
        'dashboard-add' => 'dashboard_add',
        'dashboard-edit' => 'dashboard_edit',
        'dashboard-delete' => 'dashboard_delete',

        'user-list' => 'user_list',
        'user-add' => 'user_add',
        'user-edit' => 'user_edit',
        'user-delete' => 'user_delete',

        'chat-list' => 'chat_list',
        'chat-add' => 'chat_add',
        'chat-edit' => 'chat_edit',
        'chat-delete' => 'chat_delete',

        'employee-list' => 'employee_list',
        'employee-add' => 'employee_add',
        'employee-edit' => 'employee_edit',
        'employee-delete' => 'employee_delete',

        'role-list' => 'role_list',
        'role-add' => 'role_add',
        'role-edit' => 'role_edit',
        'role-delete' => 'role_delete',

        'permission-list' => 'permission_list',
        'permission-add' => 'permission_add',
        'permission-edit' => 'permission_edit',
        'permission-delete' => 'permission_delete',

        'notification-list' => 'notification_list',
        'notification-add' => 'notification_add',
        'notification-edit' => 'notification_edit',
        'notification-delete' => 'notification_delete',

        'logo-list' => 'logo_list',
        'logo-add' => 'logo_add',
        'logo-edit' => 'logo_edit',
        'logo-delete' => 'logo_delete',

        'history-data-list' => 'history_data_list',
        'history-data-add' => 'history_data_add',
        'history-data-edit' => 'history_data_edit',
        'history-data-delete' => 'history_data_delete',

    ],
    'table_module'=>[
        'dashboard',
        'user',
        'chat',
        'employee',
        'role',
        'permission',
        'notification',
        'logo',
        'history_data',
    ],

    'table_module_name'=>[
        'Dashboard',
        'Khách hàng',
        'Chat',
        'Nhân viên',
        'Vai trò nhân viên',
        'Cấp quyền',
        'Thông báo',
        'Logo',
        'Lịch sử dữ liệu',
    ],

    'module_children'=>[
        'list',
        'add',
        'edit',
        'delete',
    ]
];
