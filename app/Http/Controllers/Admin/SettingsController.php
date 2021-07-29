<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $this->authorize('viewAdmin', 'AdminSettings');

        return view('admin/settings', [
            'settings' => Setting::orderBy('key', 'ASC')->get()
        ]);
    }

    public function edit(Request $request, $id)
    {
        $this->authorize('viewAdmin', 'AdminSettings');

        $setting = Setting::where('id', $id);

        if ($request->isMethod('post')) {
            try {
                $fields = $request->only([
                    'description',
                    'value'
                ]);
                $setting->update($fields);

                return redirect()->route('admin.settings')
                    ->with('message', 'Setting updated successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/settings-form', [
            'setting' => $setting->first()
        ]);
    }
}
