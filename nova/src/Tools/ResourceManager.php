<?php

namespace Laravel\Nova\Tools;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuGroup;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class ResourceManager extends Tool
{
    /**
     * Perform any tasks that need to happen on tool registration.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Build the menu that renders the navigation links for the tool.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function menu(Request $request)
    {
        return with(Nova::groupedResourcesForNavigation($request), function ($resources) {
            $resources = $resources->count() > 1
                ? $this->groupedMenu($resources)
                : $this->unGroupedMenu($resources);

            return tap(MenuSection::make(__('Resources'), $resources), function ($section) use ($resources) {
                if ($resources->count() > 1) {
                    $section->collapsable();
                }
            });
        });
    }

    /**
     * Return an ungrouped set of menu items.
     *
     * @param  \Illuminate\Support\Collection  $resources
     * @return \Illuminate\Support\Collection
     */
    public function unGroupedMenu($resources)
    {
        return $resources->flatten()->map(function ($resource) {
            return MenuItem::resource($resource);
        });
    }

    /**
     * Return a grouped set of menu items.
     *
     * @param  \Illuminate\Support\Collection  $resources
     * @return \Illuminate\Support\Collection
     */
    public function groupedMenu($resources)
    {
        return $resources->map(function ($group, $key) {
            return MenuGroup::make($key, $group->map(function ($resource) {
                return MenuItem::resource($resource);
            }));
        });
    }
}
