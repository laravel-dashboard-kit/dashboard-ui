# LDK Package DashboardUI <!-- omit in toc -->

- [Requirement](#requirement)
  - [Routes](#routes)
- [Dashboard Theme Structure](#dashboard-theme-structure)
  - [Layouts](#layouts)
    - [Global properties](#global-properties)
  - [Components](#components)
    - [Widgets](#widgets)
- [Resources](#resources)

## Requirement

### Routes

- **/logout**: `POST`

## Dashboard Theme Structure

Your theme should include the following structure

### Layouts

- full
- horizontal
- blank

#### Global properties

`header`: `= false` to hide header
`menu`: `= false` to hide menu

---

### Components

- badge
  - `color`: primary, secondary, success, danger, warning, info, light, dark. Default is **light**
  - `pill`: get rounded shape
- form
  - `action`: the url to submit
  - `method`: default is `POST`
- form-input
  - **where `$slot` is the label and placeholder**
  - `name`
  - `required`
  - `<x-slot name="before></x-slot>`
  - `icon-before`
  - `<x-slot name="after></x-slot>`
  - `icon-after`
  - `mask`: add text below the input
  - `dir`: rtl or ltr
- form-label
  - `required`: default false
- form-submit
- card
  - `title`
  - `subtitle`
  - `image`
  - `align`: center, left, right
- button
  - `color`: default **info**
  - `size`: default **normal**
  - `expand`: default **normal**
  - `href`: convert to **<a> anchor tag**
- login
  - **$slot** will be added on the extra section
  - `action`: form action to submit
  - `title`
  - `subtitle`
  - `email-input-name`
  - `password-input-name`
  - `remember-checkbox-name`
- row
- col
  - `size`
  - `md`
  - `lg`
- flex
  - `x`: in flex direction: start, end, center, between, around
  - `y`: in opposite flex direction start, end, center, baseline, stretch

#### Widgets

- progress bar
  - `value`: value of progress bar
  - `color`

## Resources

- [Laravel Package](https://laravelpackage.com/)
- [Orchestra](https://packages.tools/testbench/getting-started/introduction.html)
- [Canvas](https://github.com/orchestral/canvas)
