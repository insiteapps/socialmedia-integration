<?php

class SocialMedia extends DataObject
{
    
    private static $db = array(
        "Name"      => "Varchar(255)",
        //"FaIcon" => "Varchar(255)",
        "Link"      => "Varchar(255)",
        "HeaderTop" => "Boolean",
        //"Footer" => "Boolean",
        "SortOrder" => "Int",
    );
    
    private static $has_one = array(
        
        "SiteConfig" => "SiteConfig",
        "Page"       => "Page",
        "Icon"       => "FittedImage",
    );
    
    public function getCMSFields()
    {
        $f = parent::getCMSFields();
        $f->removeByName(array("SortOrder", "SiteConfigID", "PageID"));
        $f->addFieldToTab("Root.Main", DropdownField::create("Name")
            ->setSource(self::availableNames())
            ->setEmptyString("----"), "Link");
        $icon = UploadField::create("Icon");
        //$icon->setAllowedFileCategories('image/supported');
        $icon->setAllowedFileCategories('image');
        $icon->setAllowedMaxFileNumber(1);
        $icon->setFolderName('Uploads/SocialMedia/');
        $f->addFieldToTab("Root.Icon", $icon);
        
        return $f;
    }
    
    function availableNames()
    {
        $names = array(
            "Facebook",
            "Twitter",
            "RSS",
            "Youtube",
            'Vimeo',
            "LinkedIn",
            "Flickr",
            "Google-Plus",
            "TripAdvisor",
            'Pinterest',
            'Flickr',
        );
        $aNames = [];
        /**/
        $usedNames = [];//SocialMedia::get()->column("Name");
        $field_names = array_diff($names, $usedNames);
        $aNames = array_combine(array_values($field_names), array_values($field_names));
        if ($this->ID) {
            $aNames[ $this->Name ] = $this->Name;
        }
        
        return $aNames;
    }
    
    private static $summary_fields = array(
        'Name',
        'Link',
    
    );
    
    function onBeforeWrite()
    {
        parent::onBeforeWrite();
        $url = $this->Link;
        if ($url) {
            if (strtolower(substr($url, 0, 8)) != 'https://' && strtolower(substr($url, 0, 7)) != 'http://') {
                $url = 'http://' . $url;
            }
            $this->Link = $url;
        }
    }
    
}
