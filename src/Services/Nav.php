<?php

namespace LDK\DashboardUI\Services;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;

final class Nav
{
    protected $item = [];
    protected $items = [];
    protected $append = false;
    protected $after = false;
    protected $before = false;

    /**
     * Rest nav ui
     *
     * @return self
     */
    public function reset()
    {
        config(['dashboard-ui.nav' => []]);

        return $this;
    }

    /**
     * Push item to nav ui config
     *
     * @param array $item
     * @return self
     */
    public function push(array $item): self
    {
        $key = $this->append ?
            "dashboard-ui.nav.{$this->append}.items" :
            Str::slug($item['title']);

        // APPEND TO TITLE -----
        if ($this->append && config($key)) {
            Config::push($key, $item);
            $this->append = false;

            return $this;
        }

        if ($this->before || $this->after) {
            if ($this->before) {
                $position = array_search($this->before, array_keys(config('dashboard-ui.nav')), true);
            } else {
                $position = array_search($this->after, array_keys(config('dashboard-ui.nav')), true);
                $position++;
            }

            $new_config = array_slice(config('dashboard-ui.nav'), 0, $position, true) +
            [$key => $item] +
            array_slice(config('dashboard-ui.nav'), $position, count(config('dashboard-ui.nav'))-$position, true);

            config(['dashboard-ui.nav' => $new_config]);
            $this->before = $this->after = false;

            return $this;
        }

        // ADD TO ITEMS --------
        if (isset($this->items['items'])) {
            $this->items['items'][$key] = $item;
            return $this;
        }

        // NORMAL PUSHING ------
        config(["dashboard-ui.nav.${key}" => $item]);

        return $this;
    }

    /**
     * Add item to nav
     *
     * @return self
     */
    public function add(): self
    {
        if (count($this->item) < 2) {
            throw new Exception("Nav item should have 2 elements at least");
        }

        $this->push($this->item);
        $this->item = [];

        return $this;
    }

    /**
     * Add to any given nav title
     *
     * @param string $title
     * @return self
     */
    public function append(string $title): self
    {
        $this->append = Str::slug($title);

        return $this->add();
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

    /**
     * Add divider item
     *
     * @return self
     */
    public function addDivider(): self
    {
        return $this->type('divider')->add();
    }

    /**
     * Add items
     *
     * @param string $method
     * @param mixed $params
     * @return self
     */
    public function addItems(string $method = null, $params = null): self
    {
        $this->item = $this->items;
        $this->items = [];

        if ($method && method_exists($this, $method)) {
            return $this->$method($params);
        }

        return $this->add();
    }

    /**
     * Attempt to add items
     *
     * @return self
     */
    public function items(): self
    {
        $this->items = $this->item;
        $this->items['items'] = [];
        $this->item = [];

        return $this;
    }

    public function title(string $title): self
    {
        $this->item['title'] = $title;

        return $this;
    }

    public function icon(string $icon): self
    {
        $this->item['icon'] = $icon;

        return $this;
    }

    public function url($url): self
    {
        $this->item['url'] = $url;

        return $this;
    }

    /**
     * Set url by route name
     *
     * @param string $route_name
     * @param mixed $options
     * @return self
     */
    public function route(string $route_name, $options = []): self
    {
        return $this->url(route($route_name, $options));
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
