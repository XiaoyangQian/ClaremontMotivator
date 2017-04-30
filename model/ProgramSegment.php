<?php

class ProgramSegment extends BaseModel
{
    public static $table = "programsegments";
    public static $primaryKey = "program_segment_id";
    public static $cols = [
        'program_segment_id', 'program_id', 'day_id', 'user_id', 'finished', 'title'
    ];
}