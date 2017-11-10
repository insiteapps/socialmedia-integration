<?php


namespace InsiteApps\Social;

use DataExtension;


class SocialMediaPageExtension extends DataExtension
{
    
    private static $has_many = array(
        "SocialMedia" => "SocialMedia",
    );
}

class SocialMediaPageControllerExtension extends DataExtension
{
    
    function getSocialMedia()
    {
        return $this->SocialMedia();
    }
    
    function SiteSocialMedia()
    {
        return $this->SocialMedia();
    }
    
    function HeaderTopSocialMedia()
    {
        return \SocialMedia::get()->filter([
            "HeaderTop" => true,
        ]);
    }
    
}

