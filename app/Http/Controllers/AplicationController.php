<?php

namespace App\Http\Controllers;

use App\Models\Aplication;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AplicationController extends Controller
{

    public $months = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $aplications = Aplication::with('area')->get();
        return view('aplications.index', compact('aplications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::orderByRaw('id = 1 ASC, id')->get();
        return view('aplications.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'otherArea' => Rule::requiredIf($request->area_id == 1),
            'subject' => 'required',
            'name' => 'required',
            'direction' => 'required',
            'phone' => 'numeric|required',
            'petition' => 'required',
            'inePdf' => 'required|mimes:pdf',
            'curpPdf' => 'required|mimes:pdf',
            'proofAddressPdf' => 'required|mimes:pdf',
        ], [
            'otherArea.required' => 'Tiene que especificar el área encargada.',
            'subject.required' => 'El ASUNTO es requerido.',
            'name.required' => 'El NOMBRE COMPLETO es requerido.',
            'direction.required' => 'El DIRECCION es requerido.',
            'phone.numeric' => 'El TELEFONO debe ser númerico.',
            'phone.required' => 'El TELEFONO es requerido.',
            'petition.required' => 'La PETICION es requerida.',
            'inePdf.required' => 'El archivo pdf de INE es necesario',
            'curpPdf.required' => 'El archivo pdf de CURP es necesario',
            'proofAddressPdf.required' => 'El archivo pdf de COMPROBANTE DE DOMICILIO es necesario',
            'inePdf.mimes' => 'El archivo de INE debe de ser PDF',
            'curpPdf.mimes' => 'El archivo de CURP debe de ser PDF',
            'proofAddressPdf.mimes' => 'El archivo de COMPROBANTE DE DOMICILIO debe de ser PDF',
        ]);

        $inePdf = $request->file('inePdf')->store('public/files');
        $curpPdf = $request->file('curpPdf')->store('public/files');
        $proofAddressPdf = $request->file('proofAddressPdf')->store('public/files');

        $tracking =  rand(100000, 999999);
        while (Aplication::where('tracking', $tracking)->count() > 0) {

            $tracking =  rand(100000, 999999);
        }

        $aplication = new Aplication();
        $aplication->tracking = $tracking;
        $aplication->area_id = $request->area_id;
        $aplication->otherArea = $request->otherArea;
        $aplication->subject = $request->subject;
        $aplication->name = $request->name;
        $aplication->direction = $request->direction;
        $aplication->phone = $request->phone;
        $aplication->petition = $request->petition;
        $aplication->inePdf = $inePdf;
        $aplication->curpPdf = $curpPdf;
        $aplication->proofAddressPdf = $proofAddressPdf;

        $aplication->save();

        return redirect()->route('aplications.create')
            ->with('success', 'Solicitud guardada correctamente.')
            ->with('tracking', $tracking);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aplication $aplication)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $areas = Area::orderByRaw('id = 1 ASC, id')->get();
        return view('aplications.edit', compact('areas', 'aplication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $request->validate([
            'otherArea' => Rule::requiredIf($request->area_id == 1),
            'subject' => 'required',
            'name' => 'required',
            'direction' => 'required',
            'phone' => 'numeric|required',
            'petition' => 'required',
            'inePdf' => 'mimes:pdf',
            'curpPdf' => 'mimes:pdf',
            'proofAddressPdf' => 'mimes:pdf',
        ], [
            'otherArea.required' => 'Tiene que especificar el área encargada.',
            'subject.required' => 'El ASUNTO es requerido.',
            'name.required' => 'El NOMBRE COMPLETO es requerido.',
            'direction.required' => 'El DIRECCION es requerido.',
            'phone.numeric' => 'El TELEFONO debe ser númerico.',
            'phone.required' => 'El TELEFONO es requerido.',
            'petition.required' => 'La PETICION es requerida.',
            'inePdf.mimes' => 'El archivo de INE debe de ser PDF',
            'curpPdf.mimes' => 'El archivo de CURP debe de ser PDF',
            'proofAddressPdf.mimes' => 'El archivo de COMPROBANTE DE DOMICILIO debe de ser PDF',
        ]);

        $aplication = Aplication::find($id);

        $aplication->area_id = $request->area_id;
        $aplication->otherArea = $request->otherArea;
        $aplication->subject = $request->subject;
        $aplication->name = $request->name;
        $aplication->direction = $request->direction;
        $aplication->phone = $request->phone;
        $aplication->petition = $request->petition;
        $aplication->status = $request->status;

        if ($request->inePdf) {
            Storage::delete($aplication->inePdf);
            $inePdf = $request->file('inePdf')->store('public/files');
            $aplication->inePdf = $inePdf;
        }

        if ($request->curpPdf) {
            Storage::delete($aplication->curpPdf);
            $curpPdf = $request->file('curpPdf')->store('public/files');
            $aplication->curpPdf = $curpPdf;
        }

        if ($request->proofAddressPdf) {
            Storage::delete($aplication->proofAddressPdf);
            $proofAddressPdf = $request->file('proofAddressPdf')->store('public/files');
            $aplication->proofAddressPdf = $proofAddressPdf;
        }

        $aplication->save();
        return redirect()->back()->with('success', 'Cambios guardados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aplication $aplication)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        Storage::delete($aplication->inePdf);
        Storage::delete($aplication->curpPdf);
        Storage::delete($aplication->proofAddressPdf);
        $aplication->delete();
        return redirect()->back()
            ->with('info', 'Solicitud eliminada correctamente.');
    }

    public function resumen(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $month = date('n');
        $year = date('Y');
        $aplications = [];

        if ($request->month) {
            $month = $request->month;
            $year = $request->year;
        }

        $areas = Area::all();

        foreach ($areas as $area) {
            $aplication = array(
                'area' => $area->name,
                'aplications' => Aplication::where('area_id', $area->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->count(),
                'received' => Aplication::where('status', 'Recibido')->where('area_id', $area->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->count(),
                'attended' => Aplication::where('status', 'Atendido')->where('area_id', $area->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->count(),
            );
            $aplications[] = $aplication;
        }

        $keys = array_column($aplications, 'aplications');
        array_multisort($keys, SORT_DESC, $aplications);

        $recibidas = Aplication::where('status', 'Recibido')->whereYear('created_at', $year)->whereMonth('created_at', $month)->count();
        $atendidas = Aplication::where('status', 'Atendido')->whereYear('created_at', $year)->whereMonth('created_at', $month)->count();
        $months = $this->months;
        return view('aplications.resume', compact('aplications', 'recibidas', 'atendidas', 'months', 'month', 'year'));
    }

    public function generatepdf(Request $request)
    {
        $aplication = $request->tracking ? Aplication::where('tracking', $request->tracking)->first() : Aplication::find($request->id);
        $data = [
            'aplication' => $aplication,
            'day' => date('d', strtotime($aplication->created_at)),
            'month' => $this->months[date('n', strtotime($aplication->created_at)) - 1],
            'year' => date('Y', strtotime($aplication->created_at)),
        ];

        $pdf = PDF::loadView('aplications.pdf', $data);
        return $pdf->stream();
    }

    public function getpdf(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $pdf = Aplication::where('id', $request->id)->first();

        switch ($request->pdf) {
            case 'inePdf':
                $name = 'INE.pdf';
                $file = $pdf->inePdf;
                break;
            case 'curpPdf':
                $name = 'CURP.pdf';
                $file = $pdf->curpPdf;
                break;
            case 'proofAddressPdf':
                $name = 'COMPROBANTE DOMICILIO.pdf';
                $file = $pdf->proofAddressPdf;
                break;
        }

        if (Storage::exists($file)) {
            return Storage::download($file, $name);
        } else {
            return redirect()->back()
                ->with('error', 'El ' . $name . ' no está cargado para esta solicitud. Consultar con el Administrador');
        }
    }

    public function tracking(Request $request)
    {
        $information = FALSE;
        $error = FALSE;
        $created_at = "";
        $updated_at = "";
        $status = "";
        $area = "";
        $tracking = 0;

        if ($request->tracking) {
            $aplication = Aplication::where('tracking', $request->tracking)->first();

            if (!$aplication) {
                $error = TRUE;
                $information = FALSE;
            } else {
                $error = FALSE;
                $information = TRUE;
                $created_at = $aplication->created_at;
                $updated_at = $aplication->updated_at;
                $status =  $aplication->status;
                $area = $aplication->area_id == 1 ? $aplication->area->name . '(' . $aplication->otherArea . ')'  : $aplication->area->name;
                $tracking = $request->tracking;
            }
        }

        return view('aplications.show', compact('error', 'information', 'created_at', 'status', 'area', 'tracking', 'updated_at'));
    }
}
