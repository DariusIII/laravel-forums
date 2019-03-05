<?php

namespace DariusIII\Forum;

class TagDiscussion extends BaseModel
{
    // validation
    protected $rules = [
        'TagID'        => 'required|integer',
        'DiscussionID' => 'required|integer|unique_with:GDN_TagDiscussion,TagID',
        'CategoryID'   => 'required|exists:GDN_Category,CategoryID',
    ];

    // auditing
    use AuditingTrait;
    public function getAuditors()
    {
        return [ 'DateInserted', ];
    }

    // definitions
    protected $table = 'GDN_TagDiscussion';
    use NoPrimaryKeyTrait;

    public function getDates()
    {
        return [ 'DateInserted', ];
    }

    // relationships
    public function tag()
    {
        return $this->hasOne('\DariusIII\Forum\Tag', 'TagID', 'TagID');
    }

    public function discussion()
    {
        return $this->hasOne(
            '\DariusIII\Forum\Discussion', 'DiscussionID', 'DiscussionID'
        );
    }

    public function category()
    {
        return $this->hasOne(
            '\DariusIII\Forum\Category', 'CategoryID', 'CategoryID'
        );
    }
}
