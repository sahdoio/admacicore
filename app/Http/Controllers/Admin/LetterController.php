<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LetterTemplate;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function letter($id)
    {
        $member = Member::find($id);
        return view('admin.letter.letter', [
            'page' => 'letter',
            'page_title' => 'Carta de Recomendação',
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
            $pdf = $pdf->loadView('admin.letter.letter_template', $data);
            $output = 'Carta_Recomendacao_Membro_' . $member->name . '_' . $member->lastaname . '_' . time() . '.pdf';

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
            $pdf = $pdf->loadView('admin.letter.letter_template', $data);
            $output = 'Carta_Recomendacao_Membro_' . $member->name . '_' . $member->lastaname . '_' . time() . '.pdf';
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
        return view('admin.letter.letter_template', [
            'page' => 'letter',
            'page_title' => 'Carta de Recomendação',
            'member' => $member
        ]);
    }

    /**
     * @param $letter_template_id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function templateUpdate($letter_template_id, Request $request)
    {
        $letterTemplate = LetterTemplate::find($letter_template_id);

        if ($letterTemplate && $request->html) {
            $letterTemplate->html = $request->html;
            $letterTemplate->save();
        }

        return response()->json([
            'status' => 'ok',
            'message' => 'success',
        ]);
    }
}
