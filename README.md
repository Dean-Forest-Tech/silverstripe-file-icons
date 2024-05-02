# SilverStripe File Icons

Attempt to generate an icon string based on the extension of a file.

By default, this returns a relevent FontAwesome icon class.

NOTE: This module does not install any icon libraries, it only allows you to more easily assign an icon to files in your themes.

## Install

Install via composer:

    composer require "dft/silverstripe-file-icons"

## Usage

Once installed, you can add use the following in your templates:

    $File.IconClasses

For example, if you wanted to generate a bootstrap button with FontAwesome icon, you could use:

    <% with $File %>
    <a class="btn btn-primary">
        <i class="{$IconClasses}"></i>
        Download {$Title}
    </a>
    <% end_with %>

## Changing Icons

All icons are mapped via YML config (_config/fileicons.yml), you can map custom classes by overwriting the default config provided by this module.