<?php

use App\QueryFilters\BaseFilter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Database\Eloquent\Builder;

/**
 * @throws ReflectionException
 */
function getEnumValues($enum): array
{
    $reflectionClass = new ReflectionClass($enum);
    return array_values($reflectionClass->getConstants());
}

function getMonthName(int $month, string $format)
{
    // Validate the month input
    if ($month < 1 || $month > 12) {
        return 'Invalid Month';
    }

    // Create a Carbon instance for the given month
    $date = Carbon::create(null, $month, 1);

    // Get the full month name
    $monthName = $date->format($format);

    return strtolower($monthName);
}


function constructPipes(Builder|BelongsTo $builder, array $pipes)
{
    foreach ($pipes as $pipe) {
        if (new $pipe instanceof BaseFilter) {
            continue;
        }
        throw new Error('Expected class of type App\QueryFilters\BaseFilter, supplied ' . get_class(new $pipe));
    }

    return app(Pipeline::class)->send($builder)->through($pipes)->thenReturn();
}


function sendError(string $message = 'error', int $statusCode = 400, array $errors = []): JsonResponse
{
    return response()->json([
        'status' => false,
        'message' => $message,
        'errors' => $errors
    ], $statusCode);
}

function sendSuccess(mixed $data, string $message = 'Success', int $statusCode = 200): JsonResponse
{
    return response()->json([
        'status' => true,
        'message' => $message,
        'data' => $data
    ], $statusCode);
}


function generateMonths()
{
    $currentDate = Carbon::now();

    $sixMonthsFromNow = [];
    for ($i = 0; $i < 12; $i++) {
        $currentDate->addMonth();
        $sixMonthsFromNow[] = ['value' => (clone $currentDate)->endOfMonth()->format('Y-m-d'), 'name' => (clone $currentDate)->format('F Y')];
    }


    $sixMonthsFromNow[] = ['value' => Carbon::now()->endOfMonth()->format('Y-m-d'), 'name' => Carbon::now()->format('F Y')];

    $currentDate = Carbon::now();
    $sixMonthsBeforeNow = [];
    for ($i = 0; $i < 6; $i++) {
        $currentDate->subMonth();

        $sixMonthsBeforeNow[] = ['value' => (clone $currentDate)->endOfMonth()->format('Y-m-d'), 'name' => (clone $currentDate)->format('F Y')];
    }

    $months = array_merge($sixMonthsBeforeNow, $sixMonthsFromNow);
    sort($months);

    return $months;
}


function generateTagCode($site_id, $company_id)
{
    return 'TAG/' . rand(100, 999) . '/' . 'S' . $site_id . 'C' . $company_id . '/' . \Illuminate\Support\Str::random(2);
}

function sencondsToHoursMin($seconds)
{
    $interval = \Carbon\CarbonInterval::seconds($seconds)->cascade();
    return sprintf('%sh %sm', $interval->totalHours, $interval->toArray()['minutes']);
}

function secondsToHoursMinutes($seconds)
{

    // Calculate the hours
    $hours = floor($seconds / 3600);

    // Calculate the remaining seconds
    // into minutes
    $minutes = floor(($seconds % 3600) / 60);

    return sprintf('%sh %sm', $hours, $minutes);

}
