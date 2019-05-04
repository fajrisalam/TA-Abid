<?php

namespace TCG\Voyager\Widgets;

use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use App\Karyawan;
use App\Log;
use DB;


class AbsenDimmer extends BaseDimmer
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
        $count = Log::whereDate('created_at', DB::raw('CURDATE()'))
            ->where('id_arduino', 99)
            ->where('status', 1)
            ->distinct('id_karyawan')->count('id_karyawan');
        $string = trans_choice('voyager::dimmer.absen', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-file-text',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.absen_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager::dimmer.absen_link'),
                'link' => route('voyager.pages.index'),
            ],
            'image' => asset('img/dimmer/absen.jpg'),
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
