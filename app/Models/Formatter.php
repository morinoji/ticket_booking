<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Http\Request;
use OwenIt\Auditing\Contracts\Auditable;

class Formatter extends Model
{

    public function getLimitRequest()
    {
        return 1000;
    }

    public static function formatTimeToNow($input)
    {
        $date = new DateTime($input);
        $date = $date->getTimestamp();

        $now = new DateTime();
        $now = $now->getTimestamp();

        $a = $now - $date;
        $a *= 1000;

        if ($a < 60000) {
            return floor($a / 1000) . ' giây trước';
        } else if ($a < 3600000) {
            return floor($a / 60000) . ' phút trước';
        } else if ($a >= 3600000 && $a < 86400000) {
            return floor($a / 3600000) . ' giờ trước';
        } else if ($a >= 86400000 && $a < 2592000000) {
            return floor($a / 86400000) . ' ngày trước';
        } else if ($a >= 2592000000 && $a < 31104000000) {
            return floor($a / 2592000000) . ' tháng trước';
        } else {
            return floor($a / 31104000000) . ' năm trước';
        }
    }

    public static function getOnlyDate($input, $format = null)
    {
        try {
            if (!empty($format)) {
                return date($format, strtotime($input));
            } else {
                return date('d-m-Y', strtotime($input));
            }

        } catch (\Exception $exception) {
            return null;
        }
    }

    public static function getDateTime($input, $format = null)
    {
        try {
            if (!empty($format)) {
                return date($format, strtotime($input));
            } else {
                return date('d-m-Y H:i', strtotime($input));
            }

        } catch (\Exception $exception) {
            return null;
        }
    }

    public function getOnlyTime($input)
    {
        try {
            return date('H:i', strtotime($input));
        } catch (\Exception $exception) {
            return null;
        }
    }

    public static function paginator(Request $request, $data)
    {

        $currentPage = Paginator::resolveCurrentPage();
        $col = collect($data);
        $perPage = 10;
        $currentPageItems = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $items = new Paginator($currentPageItems, count($col), $perPage);
        $items->setPath($request->url());
        $items->appends($request->all());

        // add in view
        // {!! $items->links() !!}

        return $items;
    }

    public static function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }
}
