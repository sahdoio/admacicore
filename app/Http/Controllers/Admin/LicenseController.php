<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class LicenseController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function license($id)
    {
        $member = Member::find($id);
        return view('admin.license.license', [
            'page' => 'license',
            'page_title' => 'Carteira de Membro',
            'member' => $member
        ]);
    }

    /**
     * @return mixed
     */
    public function exportOld($id)
    {
        $member = Member::find($id);

        if ($member) {
            echo "exportando...";

            $data = [
                'member' => $member
            ];

            $pdf = App::make('dompdf.wrapper');
            $pdf = $pdf->loadView('admin.license.card_template', $data);
            $output = 'Carteira_Membro_' . $member->name . '_' . $member->lastaname . '_' . time() . '.pdf';
            return $pdf->download($output);
        } else {
            return 'error';
        }
    }

    /**
     * @return mixed
     */
    public function export($id)
    {
        $member = Member::find($id);

        if ($member) {
            $data = [
                'member' => $member
            ];

            $pdf = App::make('dompdf.wrapper');
            $pdf = $pdf->loadView('admin.license.card_template', $data);
            $output = 'Carteira_Membro_' . $member->name . '_' . $member->lastaname . '_' . time() . '.pdf';
            $content = $pdf->download()->getOriginalContent();
            $path = 'media/export/' . $output;
            $status = Storage::put($path, $content);
            $public_path = url('storage/' . $path);

            return response()->json([
                'status' => 'ok',
                'path' => $public_path
            ]);
        } else {
            return 'error';
        }
    }

    /**
     * @return mixed
     */
    public function template($id)
    {
        $member = Member::find($id);
        return view('admin.license.card_template', [
            'page' => 'license',
            'page_title' => 'Carteira de Membro',
            'member' => $member
        ]);
    }
}
