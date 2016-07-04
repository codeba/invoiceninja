<?php namespace App\Models;

use Utils;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

/**
 * Class Task
 */
class Task extends EntityModel
{
    use SoftDeletes;
    use PresentableTrait;

    /**
     * @var string
     */
    protected $presenter = 'App\Ninja\Presenters\TaskPresenter';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo('App\Models\Account');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User')->withTrashed();
    }

    /**
     * @return mixed
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client')->withTrashed();
    }

    /**
     * @param $task
     * @return string
     */
    public static function calcStartTime($task)
    {
        $parts = json_decode($task->time_log) ?: [];

        if (count($parts)) {
            return Utils::timestampToDateTimeString($parts[0][0]);
        } else {
            return '';
        }
    }

    /**
     * @return string
     */
    public function getStartTime()
    {
        return self::calcStartTime($this);
    }

    /**
     * @param $task
     * @return int
     */
    public static function calcDuration($task)
    {
        $duration = 0;
        $parts = json_decode($task->time_log) ?: [];

        foreach ($parts as $part) {
            if (count($part) == 1 || !$part[1]) {
                $duration += time() - $part[0];
            } else {
                $duration += $part[1] - $part[0];
            }
        }

        return $duration;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return self::calcDuration($this);
    }

    /**
     * @return int
     */
    public function getCurrentDuration()
    {
        $parts = json_decode($this->time_log) ?: [];
        $part = $parts[count($parts)-1];

        if (count($part) == 1 || !$part[1]) {
            return time() - $part[0];
        } else {
            return 0;
        }
    }

    /**
     * @return bool
     */
    public function hasPreviousDuration()
    {
        $parts = json_decode($this->time_log) ?: [];
        return count($parts) && (count($parts[0]) && $parts[0][1]);
    }

    /**
     * @return float
     */
    public function getHours()
    {
        return round($this->getDuration() / (60 * 60), 2);
    }
}
