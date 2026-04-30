<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KeyResult;
use Illuminate\Http\Request;

class OkrController extends Controller
{
    public function updateKeyResult(Request $request, $id)
    {
        $request->validate([
            'current_value' => 'required|numeric|min:0',
        ]);

        $keyResult = KeyResult::findOrFail($id);
        $keyResult->update([
            'current_value' => $request->current_value,
        ]);

        return back()->with('success', 'Progress updated successfully.');
    }
}
