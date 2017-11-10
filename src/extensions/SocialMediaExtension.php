<?php


namespace InsiteApps\Social;

use DataExtension;
use GridFieldConfig_RecordEditor;
use GridFieldSortableRows;
use GridField;
use FieldList;


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
    function SocialMediaList($type = null)
    {
        $filter = $type ? [$type => true] : [];
        
        return \SocialMedia::get()->filter($filter);
    }
    
    
}
