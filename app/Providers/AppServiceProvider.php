<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use DB;

use App\WebsiteInformation;
use App\AdminPanelInformation;
use App\Menu;
use App\MenuAction;
use App\SocialLinks;
use App\Match;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

        //Link for Add New Button
        View::composer('*',function($addLink){
            $actionLink = 'admin.index';
            $routeName = \Route::currentRouteName();

            if ($routeName)
            {
                $userMenus = Menu::where('menu_link',$routeName)->first();
                if ($userMenus)
                {
                    $userMenuAction = MenuAction::where('parent_menu_id',@$userMenus->id)->where('menu_type',1)->first();
                // dd($userMenuAction);

                    if(@$userMenuAction->action_link)
                    {
                        $actionLink = @$userMenuAction->action_link;
                    }
                }
                
            }
            $addLink->with('addNewLink',$actionLink);
        });

        //Link for Go Back
        View::composer('*',function($backLink){
            $link = "'admin.index'";
            $routeName = \Route::currentRouteName();

            if ($routeName)
            {
                $userMenuAction = MenuAction::where('action_link',@$routeName)->first();
                if ($userMenuAction)
                {
                    $userMenu = Menu::where('id',@$userMenuAction->parent_menu_id)->first();
                    if ($userMenu)
                    {
                        $link = $userMenu->menu_link;
                    }
                }
            }

            $backLink->with('goBackLink',@$link); 
        });

        //Link Admin Panel information
        View::composer('*',function($adminInfo){
            $adminInformation = AdminPanelInformation::first();
            $adminInfo->with('adminInformation',$adminInformation);
        });

        //Link Frontend information
        View::composer('*',function($siteInfo){
            $website_information = WebsiteInformation::first();
            $siteInfo->with('website_information',$website_information);
        });

        //Link For Social Info
        View::composer('*',function($socialInfo){
            $social_link_list = SocialLinks::where('status',1)->get();
            $socialInfo->with('social_link_list',$social_link_list);
        });

        //Code for update betting live,upcoming,closed status by date
        View::composer('*',function(){

            //change status for upcoming match
            Match::whereDate('date_time','>', Carbon::today())
            ->update([
                'live' => 0
            ]);

            //change status for which match are live today
            Match::whereDate('date_time', Carbon::today())
            ->update([
                'live' => 1
            ]);

            //change status for which match are continuous long time manual
            Match::whereDate('date_time','<', Carbon::today())
                ->where('continuing_status',1)
                ->update([
                    'live' => 1
                ]);

            //change status for which match are closed
            Match::whereDate('date_time','<', Carbon::today())
                ->where(function($query){
                    $query->where('continuing_status',0)->orWhere('continuing_status',NULL);
                })
                ->update([
                    'live' => 2
                ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
