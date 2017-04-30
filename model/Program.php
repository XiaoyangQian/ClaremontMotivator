<?php

class Program extends BaseModel
{
    public static $table = "programs";
    public static $primaryKey = "program_id";
    public static $cols = [
        'program_id', 'user_id1', 'user_id2', 'start_date'
    ];

    public function segments()
    {
        return ProgramSegment::findAll(['program_id' => $this->program_id]);
    }

    /**
     * @return array segmentDict[$user_id][$day_id] : ProgramSegment
     */
    public function segmentDict($user_id, $partner_id)
    {
        $segments = $this->segments();
        $segments_dict = [];

        $my_segments_dict = [];
        $partner_segments_dict = [];

        foreach ($segments as $segment) {
            if ($segment->user_id == $user_id) {
                $my_segments_dict[$segment->day_id] = $segment;
            } else if ($segment->user_id == $partner_id) {
                $partner_segments_dict[$segment->day_id] = $segment;
            }
        }

        $segments_dict[$user_id] = $my_segments_dict;
        $segments_dict[$partner_id] = $partner_segments_dict;
        return $segments_dict;
    }
}