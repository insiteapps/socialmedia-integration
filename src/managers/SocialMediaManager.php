<?php

namespace InsiteApps\SocialMedia;

use InsiteApps;
use InsiteApps\Common\Manager;

/**
 * Class Manager
 */
class SocialMediaManager extends Manager
{

    public static function include_code(&$aRequirements)
    {
        $aRequirements["CSS"] = array_merge($aRequirements["CSS"], [
            INSITEAPPS_SOCIAL_MEDIA_DIR . "/css/SocialMedia.css"
        ]);

    }
}
