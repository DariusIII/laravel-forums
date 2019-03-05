<?php

namespace DariusIII\Forum;

class Comment extends BaseModel
{
    // validation
    protected $rules = [
        'DiscussionID' => 'required|exists:GDN_Discussion,DiscussionID',
        // 'Body'         => none,
        'Format'       => 'max:20',
        'Flag'         => 'boolean',
        'Score'        => 'numeric',
        // 'Attributes'   => none,
    ];

    // auditing
    use AuditingTrait;

    // definitions
    protected $table = 'GDN_Comment';
    protected $primaryKey = 'CommentID';

    public function getDates()
    {
        return [ 'DateInserted', 'DateUpdated', 'DateDeleted' ];
    }

    // relations
    public function discussion()
    {
        return $this->belongsTo(
            '\DariusIII\Forum\Discussion', 'DiscussionID', 'DiscussionID'
        );
    }
}
