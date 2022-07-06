<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess{

    public function setGateAndPolicyAccess(){
        $this->defineGateUser();
        $this->defineGateAgent();
        $this->defineGateCandidate();
        $this->defineGateDate();
        $this->defineGatePair();
        $this->defineGateChat();
        $this->defineGateLevel();
        $this->defineGatePackage();
        $this->defineGateEmployee();
        $this->defineGateRole();
        $this->defineGatePermission();
        $this->defineGateNotification();
        $this->defineGateLogo();
        $this->defineGateHistoryData();
        $this->definePackageService();
        $this->defineTopic();
        $this->defineDashboard();
    }

    public function defineDashboard(){
        Gate::define('dashboard-list','App\Policies\DashboardPolicy@view');
        Gate::define('dashboard-add','App\Policies\DashboardPolicy@create');
        Gate::define('dashboard-edit','App\Policies\DashboardPolicy@update');
        Gate::define('dashboard-delete','App\Policies\DashboardPolicy@delete');
    }

    public function defineTopic(){
        Gate::define('topic-list','App\Policies\TopicPolicy@view');
        Gate::define('topic-add','App\Policies\TopicPolicy@create');
        Gate::define('topic-edit','App\Policies\TopicPolicy@update');
        Gate::define('topic-delete','App\Policies\TopicPolicy@delete');
    }

    public function definePackageService(){
        Gate::define('package-service-list','App\Policies\PackageServicePolicy@view');
        Gate::define('package-service-add','App\Policies\PackageServicePolicy@create');
        Gate::define('package-service-edit','App\Policies\PackageServicePolicy@update');
        Gate::define('package-service-delete','App\Policies\PackageServicePolicy@delete');
    }

    public function defineGateUser(){
        Gate::define('user-list','App\Policies\UserPolicy@view');
        Gate::define('user-add','App\Policies\UserPolicy@create');
        Gate::define('user-edit','App\Policies\UserPolicy@update');
        Gate::define('user-delete','App\Policies\UserPolicy@delete');
    }

    public function defineGateAgent(){
        Gate::define('agent-list','App\Policies\AgentPolicy@view');
        Gate::define('agent-add','App\Policies\AgentPolicy@create');
        Gate::define('agent-edit','App\Policies\AgentPolicy@update');
        Gate::define('agent-delete','App\Policies\AgentPolicy@delete');
    }

    public function defineGateCandidate(){
        Gate::define('candidate-list','App\Policies\CandidatePolicy@view');
        Gate::define('candidate-add','App\Policies\CandidatePolicy@create');
        Gate::define('candidate-edit','App\Policies\CandidatePolicy@update');
        Gate::define('candidate-delete','App\Policies\CandidatePolicy@delete');
    }

    public function defineGateDate(){
        Gate::define('date-list','App\Policies\DatePolicy@view');
        Gate::define('date-add','App\Policies\DatePolicy@create');
        Gate::define('date-edit','App\Policies\DatePolicy@update');
        Gate::define('date-delete','App\Policies\DatePolicy@delete');
    }

    public function defineGatePair(){
        Gate::define('pair-list','App\Policies\PairPolicy@view');
        Gate::define('pair-add','App\Policies\PairPolicy@create');
        Gate::define('pair-edit','App\Policies\PairPolicy@update');
        Gate::define('pair-delete','App\Policies\PairPolicy@delete');
    }

    public function defineGateChat(){
        Gate::define('chat-list','App\Policies\ChatPolicy@view');
        Gate::define('chat-add','App\Policies\ChatPolicy@create');
        Gate::define('chat-edit','App\Policies\ChatPolicy@update');
        Gate::define('chat-delete','App\Policies\ChatPolicy@delete');
    }

    public function defineGateLevel(){
        Gate::define('level-list','App\Policies\LevelPolicy@view');
        Gate::define('level-add','App\Policies\LevelPolicy@create');
        Gate::define('level-edit','App\Policies\LevelPolicy@update');
        Gate::define('level-delete','App\Policies\LevelPolicy@delete');
    }

    public function defineGatePackage(){
        Gate::define('package-list','App\Policies\PackagePolicy@view');
        Gate::define('package-add','App\Policies\PackagePolicy@create');
        Gate::define('package-edit','App\Policies\PackagePolicy@update');
        Gate::define('package-delete','App\Policies\PackagePolicy@delete');
    }

    public function defineGateEmployee(){
        Gate::define('employee-list','App\Policies\EmployeePolicy@view');
        Gate::define('employee-add','App\Policies\EmployeePolicy@create');
        Gate::define('employee-edit','App\Policies\EmployeePolicy@update');
        Gate::define('employee-delete','App\Policies\EmployeePolicy@delete');
    }

    public function defineGateRole(){
        Gate::define('role-list','App\Policies\RolePolicy@view');
        Gate::define('role-add','App\Policies\RolePolicy@create');
        Gate::define('role-edit','App\Policies\RolePolicy@update');
        Gate::define('role-delete','App\Policies\RolePolicy@delete');
    }

    public function defineGatePermission(){
        Gate::define('permission-list','App\Policies\PermissionPolicy@view');
        Gate::define('permission-add','App\Policies\PermissionPolicy@create');
        Gate::define('permission-edit','App\Policies\PermissionPolicy@update');
        Gate::define('permission-delete','App\Policies\PermissionPolicy@delete');
    }

    public function defineGateNotification(){
        Gate::define('notification-list','App\Policies\NotificationPolicy@view');
        Gate::define('notification-add','App\Policies\NotificationPolicy@create');
        Gate::define('notification-edit','App\Policies\NotificationPolicy@update');
        Gate::define('notification-delete','App\Policies\NotificationPolicy@delete');
    }

    public function defineGateLogo(){
        Gate::define('logo-list','App\Policies\LogoPolicy@view');
        Gate::define('logo-add','App\Policies\LogoPolicy@create');
        Gate::define('logo-edit','App\Policies\LogoPolicy@update');
        Gate::define('logo-delete','App\Policies\LogoPolicy@delete');
    }

    public function defineGateHistoryData(){
        Gate::define('history-data-list','App\Policies\HistoryDataPolicy@view');
        Gate::define('history-data-add','App\Policies\HistoryDataPolicy@create');
        Gate::define('history-data-edit','App\Policies\HistoryDataPolicy@update');
        Gate::define('history-data-delete','App\Policies\HistoryDataPolicy@delete');
    }

}
