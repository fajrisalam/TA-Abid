<?php

namespace TCG\Voyager\Widgets;

use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use App\Log;
use DB;

class LogDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Log::whereDate('created_at', DB::raw('CURDATE()'))->count();
        $string = trans_choice('voyager::dimmer.log', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-file-text',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.log_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager::dimmer.log_link'),
                'link' => route('voyager.logs.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return app('VoyagerAuth')->user()->can('browse', Voyager::model('Page'));
    }
}
