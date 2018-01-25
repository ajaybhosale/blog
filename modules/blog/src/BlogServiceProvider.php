<?php

/**
 * BlogServiceProvider service provider for publish images, css and js.
 *
 * @name       BlogServiceProvider
 * @category   ServiceProvider
 * @package    Blog
 * @license    Silicus http://www.silicus.com/
 * @version    GIT: $Id$
 * @link       None
 * @filesource
 */

namespace Modules\Blog;

use Illuminate\Support\ServiceProvider;

/**
 * BlogServiceProvider for publish images, css, js
 *
 * @name BlogServiceProvider.php
 * @category ServiceProvider
 * @package    BlogServiceProvider
 *
 * @license Silicus http://www.silicus.com
 * @version Release:<v.1>
 * @link None
 */
class BlogServiceProvider extends ServiceProvider
{

    /**
     * This function is for send migration files in migration folder.
     *
     * @name boot
     * @access public
     * @author
     *
     * @return void
     */
    public function boot()
    {
        $sourceMigration = realpath(__DIR__ . '/../migrations');
        $this->loadMigrationsFrom($sourceMigration);
        //require base_path('modules\blog\src\routes.php');
    }

}
