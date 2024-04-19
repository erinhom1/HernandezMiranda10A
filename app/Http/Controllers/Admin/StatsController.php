<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Stats;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   

        // Fetch data for the charts
        $chart1Data = DB::table('salidasentradas')
            ->select(DB::raw('DATE(salida) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('DATE(salida)'))
            ->get();

        $chart2Data = DB::table('salidasentradas')
        ->select(DB::raw('MONTH(salida) as month'), DB::raw('COUNT(*) as count'))
        ->whereMonth('salida', 10) // October
        ->orWhereMonth('salida', 11) // November
        ->groupBy('month')
        ->get();
        
        $chart3Data = DB::table('salidasentradas')
        ->select(DB::raw('HOUR(entrada) as hour'), DB::raw('COUNT(*) as count'))
        ->whereMonth('entrada', 11) // November
        ->groupBy('hour')
        ->get();

        $chart4Data = DB::table('salidasentradas')
        ->join('automoviles', 'salidasentradas.Automovil', '=', 'automoviles.NumSerie')
        ->join('marca', 'automoviles.Marca', '=', 'marca.codigo') // Corrected join condition
        ->select('Marca.Nombre', DB::raw('COUNT(*) as count'))
        ->whereMonth('salida', 11) // November
        ->groupBy('automoviles.Marca')
        ->get();


        // Pass the data to the view
        return view('stats.index', [
            'chart1Data' => $chart1Data,
            'chart2Data' => $chart2Data,
            'chart3Data' => $chart3Data,
            'chart4Data' => $chart4Data,


        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function getData(Request $request)
    {
        try {
            // Assuming you have a date parameter in the request
            $selectedDate = $request->input('date');

            // Your logic to fetch data based on the selected date
            $yourData = DB::table('salidasentradas')
                ->select(DB::raw('DATE(salida) as date'), DB::raw('COUNT(*) as count'))
                ->whereDate('salida', $selectedDate)
                ->groupBy(DB::raw('DATE(salida)'))
                ->get();

            // Return the data as JSON
            return response()->json(['data' => $yourData]);
        } catch (\Exception $e) {
            // Handle exceptions and return an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function obtenerDatos()
    {
        $datos = \DB::table('salidasentradas')->get()->toArray();
        $datosJson = json_encode($datos, JSON_HEX_QUOT | JSON_HEX_APOS);
    
        $process = proc_open('python C:\\laragon\\www\\Upark\\salidasEntradas.py', [0 => ["pipe", "r"], 1 => ["pipe", "w"], 2 => ["pipe", "w"]], $pipes);
    
        if (!is_resource($process)) return view('stats.index', ['datos' => []]);
    
        fwrite($pipes[0], $datosJson);
        fclose($pipes[0]);
    
        $resultado = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        //dd($resultado);
        $error = stream_get_contents($pipes[2]);
        fclose($pipes[2]);
    
        proc_close($process);
    
        if (!empty($error)) {
            error_log("Error al ejecutar el script de Python: $error");
            return view('stats.index', ['datos' => []]);
        }
        
        return view('stats.index', ['datos' => json_decode($resultado, true)]);
    }
    
}
