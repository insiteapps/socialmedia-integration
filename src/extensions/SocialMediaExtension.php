<?php


    namespace InsiteApps\SocialMedia;

    use SilverStripe\ORM\DataExtension;
    use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
    use SilverStripe\SiteConfig\SiteConfig;
    use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\FieldList;


    class SocialMediaExtension extends DataExtension
    {

        /**
         * @param FieldList $fields
         */
        public function updateCMSFields(FieldList $fields)
        {

            $gridFieldConfig = GridFieldConfig_RecordEditor::create();
            $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
            $gridfield = new GridField('SocialMedia', 'SocialMedia', $this->owner->SocialMedia(), $gridFieldConfig);
            $fields->addFieldToTab('Root.SocialMedia', $gridfield);
        }

        /**
         * @param null $type
         *
         * @return DataList
         */
        public function SocialMediaList($type = null)
        {
            $filter = $type ? [$type => true] : [];

            return SocialMedia::get()->filter($filter);
        }


    }


    class SocialMediaPageExtension extends DataExtension
    {

        private static $has_many = array(
            "SocialMedia" => SocialMedia::class,
        );
    }

    class SocialMediaPageControllerExtension extends DataExtension
    {

        public function getSocialMedia()
        {
            return $this->SocialMedia();
        }

        public function SiteSocialMedia()
        {
            $oSiteConfig = SiteConfig::current_site_config();
            return $oSiteConfig->SocialMedia();
        }

        public function HeaderTopSocialMedia()
        {
            return SocialMedia::get()->filter([
                "HeaderTop" => true,
            ]);
        }

    }

    class SocialMediaSiteConfigExtension extends DataExtension
    {
        private static $has_many = array(
            "SocialMedia" => SocialMedia::class,
        );
    }
