<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use App\Models\Reading;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

use Barryvdh\DomPDF\Facade\Pdf; // Add this if you're using barryvdh/laravel-dompdf

class ReadingController extends Controller
{

    public function index($id)
    {
        $panel = Panel::findOrFail($id);
        $readings = Reading::where('panel_id', $id)->orderBy('reading_date', 'desc')->get();

        return view('readings.index', compact('panel', 'readings'));
    }
    //
    public function create($panelId)
    {
        $panel = Panel::findOrFail($panelId);
        return view('readings.create', compact('panel'));
    }

    public function store(Request $request, $panelId)
    {
        $request->validate([
            'reading_date' => 'required|date',
            'energy_kwh' => 'required|numeric|min:0',
        ]);

        Reading::create([
            'panel_id' => $panelId,
            'reading_date' => $request->reading_date,
            'energy_kwh' => $request->energy_kwh,
        ]);

        return redirect()->route('panels.index', $panelId)->with('success', 'Reading added!');
    }


    public function exportCsv(): StreamedResponse
    {
        $readings = Reading::with('panel')->orderBy('reading_date')->get();

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=readings.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function () use ($readings) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Panel Serial', 'Reading Date', 'Energy (kWh)']);

            foreach ($readings as $reading) {
                fputcsv($handle, [
                    $reading->panel->serial_number,
                    $reading->reading_date,
                    $reading->energy_kwh,
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }




    public function exportPdf()
    {
        $readings = Reading::with('panel')->orderBy('reading_date')->get();

        $pdf = Pdf::loadView('readings.pdf', compact('readings'));

        // Generate unique filename
        $fileName = 'readings_' . now()->format('Ymd_His') . '.pdf';

        // Save the file to storage/app/public/reports/
        $pdf->save(storage_path('app/public/reports/' . $fileName));

        return response()->download(storage_path('app/public/reports/' . $fileName));
    }
}
