<?php
namespace InstagramAPI\Checkpoint;

class Checkpoint
{
    public static function createHandler($parent){
        return new Challenge($parent);
    }
}
 