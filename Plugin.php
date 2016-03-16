<?php namespace Fes\Profile;

use Backend;
use System\Classes\PluginBase;
use RainLab\User\Models\User as UserModel;
use RainLab\User\Controllers\Users as UsersController;
use Fes\Profile\Models\Profile as ProfileModel;

/**
 * Profile Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Profile',
            'description' => 'No description provided yet...',
            'author'      => 'Fes',
            'icon'        => 'icon-leaf'
        ];
    }

    public function boot()
    {
        UserModel::extend(function($model) {
            $model->hasOne['profile'] = ['Fes\Profile\Models\Profile'];
        });

        UsersController::extendFormFields(function($form, $model, $context) {

            if (! $model instanceof UserModel) {
                return;
            }

            if (! $model->exists) {
                return;
            }

            ProfileModel::getFromUser($model);

            $form->addTabFields([

                'profile[headline]' => [
                    'label' => 'Headline',
                    'tab' => 'Profile',
                ],
                'profile[about_me]' => [
                    'label' => 'About me',
                    'tab' => 'Profile',
                    'type' => 'textarea'
                ],

            ]);

        });

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Fes\Profile\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'fes.profile.some_permission' => [
                'tab' => 'Profile',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'profile' => [
                'label'       => 'Profile',
                'url'         => Backend::url('fes/profile/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['fes.profile.*'],
                'order'       => 500,
            ],
        ];
    }

}
