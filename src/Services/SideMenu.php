<?php

namespace LDK\DashboardUI\Services;

use Illuminate\Support\Str;

final class SideMenu
{
    protected $item = [];
    protected $after = false;
    protected $before = false;

    /**
     * Rest dashboard ui side menu
     *
     * @return self
     */
    public function reset()
    {
        config(['dashboard-ui.side-menu' => []]);

        return $this;
    }

    /**
     * Push item to dashboard ui side menu config key
     *
     * @param array $item
     * @return self
     */
    public function push(array $item): self
    {
        $key = Str::slug($item['title']);

        if ($this->before || $this->after) {
            if ($this->before) {
                $position = array_search($this->before, array_keys(config('dashboard-ui.side-menu')), true);
            } else {
                $position = array_search($this->after, array_keys(config('dashboard-ui.side-menu')), true);
                $position++;
            }

            $new_config = array_slice(config('dashboard-ui.side-menu'), 0, $position, true) +
            [$key => $item] +
            array_slice(config('dashboard-ui.side-menu'), $position, count(config('dashboard-ui.side-menu'))-$position, true);

            config(['dashboard-ui.side-menu' => $new_config]);
            $this->before = $this->after = false;

            return $this;
        }

        // NORMAL PUSHING ------
        config(["dashboard-ui.side-menu.${key}" => $item]);

        return $this;
    }

    /**
     * Add item to nav
     *
     * @return self
     */
    public function add(): self
    {
        $this->push($this->item);
        $this->item = [];

        return $this;
    }

    /**
     * Add before any given nav title
     *
     * @param string $title
     * @return self
     */
    public function before(string $title): self
    {
        $this->before = Str::slug($title);

        return $this->add();
    }

    /**
     * Add after any given nav title
     *
     * @param string $title
     * @return self
     */
    public function after(string $title): self
    {
        $this->after = Str::slug($title);

        return $this->add();
    }

    public function title(string $title): self
    {
        $this->item['title'] = $title;

        return $this;
    }

    public function subtitle(string $subtitle): self
    {
        $this->item['subtitle'] = $subtitle;

        return $this;
    }

    public function icon(string $icon): self
    {
        $this->item['icon'] = $icon;

        return $this;
    }

    /**
     * Set link url
     *
     * @param string $url
     * @param array $attributes
     * @return self
     */
    public function url(string $url, array $attributes = []): self
    {
        $this->item['url'] = $attributes + [
            'href' => $url
        ];

        return $this;
    }

    /**
     * Set url by route name
     *
     * @param string $route_name
     * @param array $options
     * @param array $attributes
     * @return self
     */
    public function route(string $route_name, $options = [], $attributes = []): self
    {
        return $this->url(route($route_name, $options), $attributes);
    }

    /**
     * Set item type
     *
     * @param string $type
     * @return self
     */
    public function type(string $type): self
    {
        $this->item['type'] = $type;

        return $this;
    }
}
