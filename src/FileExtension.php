<?php

namespace DFT\SilverStripe\FileIcons;

use LogicException;
use SilverStripe\Assets\File;
use SilverStripe\Core\Config\Config;
use SilverStripe\ORM\DataExtension;

class FileExtension extends DataExtension
{
    private static $casting = [
        'IconClasses' => 'Varchar'
    ];

    /** @return File */
    public function getOwner()
    {
        return parent::getOwner();
    }

    /**
     * Return FontAwesome icon classes based
     * on the current files type 
     */
    public function getIconClasses(): string
    {
        $owner = $this->getOwner();
        $extension = $owner->getExtension();
        $default = Config::inst()->get(
            File::class,
            'default_icon'
        );
        $icons = Config::inst()->get(
            File::class,
            'extension_icon_map'
        );

        if (!is_array($icons)) {
            throw new LogicException('Icon map needs to be an array');
        }

        foreach ($icons as $icon_name => $icon_data) {
            $possible_extensions = $icon_data['extensions'];

            if (in_array($extension, $possible_extensions)) {
                return (string)$icon_data['icon'];
            }
        }

        return (string)$default;
    }
}